# УБКИ Интеграция PHP
[![Latest Stable Version](https://poser.pugx.org/wearesho-team/ubki/v/stable.png)](https://packagist.org/packages/wearesho-team/ubki)
[![Total Downloads](https://poser.pugx.org/wearesho-team/ubki/downloads.png)](https://packagist.org/packages/wearesho-team/ubki)
[![Build Status](https://travis-ci.org/wearesho-team/ubki.svg?branch=master)](https://travis-ci.org/wearesho-team/ubki)
[![codecov](https://codecov.io/gh/wearesho-team/ubki/branch/master/graph/badge.svg)](https://codecov.io/gh/wearesho-team/ubki)

[УБКИ](https://ubki.ua)  
[Changelog](./CHANGELOG.md)  

## Установка
используя [composer](https://packagist.org):
```bash
composer require wearesho-team/ubki
```

## Конфигурация
Для конфигурирования нужного сервиса используется соответствующий ```ConfigInterface```:

- Push (экспорт): [Push\ConfigInterface](./src/Push/ConfigInterface.php)
- Pull (импорт): [Pull\ConfigInterface](./src/Pull/ConfigInterface.php)

Также для каждого сервиса требуется провайдер ```Authorization\Provider``` для авторизации.

### Config

На выгрузку данных / отправку запроса в реестр:
```php
<?php

use Wearesho\Bobra\Ubki;

$config = new Ubki\Push\Config(
    'username',
    'password',
    $mode = Ubki\Authorization\ConfigInterface::MODE_TEST // или MODE_PRODUCTION
);
```

На импорт данных:
```php
<?php

use Wearesho\Bobra\Ubki;

$config = new Ubki\Pull\Config(
    'username',
    'password',
    $mode = Ubki\Authorization\ConfigInterface::MODE_TEST // или MODE_PRODUCTION
);
```

### EnvironmentConfig

Для каждого сервиса `Push`/`Pull` имплементирован свой `EnvironmentConfig`, 
который будет подтягивать переменные из окружения.

Если же они по стандарту не установлены, 
то они будут взяты по дефолтному значению из имплементированного им интерфейса `ConfigInterface`.

Основные переменные (зависят от типа сервиса):

Сервис для экспорта:

| Environment variable | Required |       Default value in production mode      |            Default value in test mode            |         Value type        |
|:--------------------:|:--------:|:-------------------------------------------:|:------------------------------------------------:|:-------------------------:|
|  UBKI_PUSH_USERNAME  |    yes   |                                             |                                                  |           string          |
|  UBKI_PUSH_PASSWORD  |    yes   |                                             |                                                  |           string          |
|    UBKI_PUSH_MODE    |    no    |                      0                      |                          0                       |      integer (0...1)      |
|  UBKI_PUSH_AUTH_URL  |    no    | [Auth production url](https://secure.ubki.ua/b2_api_xml/ubki/auth) | [Auth test url](https://secure.ubki.ua:4040/b2_api_xml/ubki/auth) |    string (url format)    |
|     UBKI_PUSH_URL    |    no    |                                             |                                                  |    string (url format)    |
| UBKI_PUSH_REGISTRY_URL |    no    | [Registry production url](https://secure.ubki.ua/upload/in/reestrs.php) | [Registry test url](https://secure.ubki.ua:4040/upload/in/reestrs.php) |    string (url format)    |

Сервис для импорта:

| Environment variable | Required |       Default value in production mode      |            Default value in test mode            |         Value type        |
|:--------------------:|:--------:|:-------------------------------------------:|:------------------------------------------------:|:-------------------------:|
|  UBKI_PULL_USERNAME  |    yes   |                                             |                                                  |           string          |
|  UBKI_PULL_PASSWORD  |    yes   |                                             |                                                  |           string          |
|    UBKI_PULL_MODE    |    no    |                       0                     |                         0                        |      integer (0...1)      |
|  UBKI_PULL_AUTH_URL  |    no    | [Auth production url](https://secure.ubki.ua/b2_api_xml/ubki/auth) | [Auth test url](https://secure.ubki.ua:4040/b2_api_xml/ubki/auth) |    string (url format)    |
|     UBKI_PULL_URL    |    no    |                                             |                                                  |    string (url format)    |

## Пример использования:

Все сервисы используют интерфейсы:
- Клиента guzzle
```php
<?php

$client = new GuzzleHttp\Client();
// или любой другой клиент, имплементирующий GuzzleHttp\ClientInterface
```
- Psr-логгера
```php
<?php

$logger = new \Psr\Log\NullLogger();
// или любой другой логгер, имплементирующий LoggerInterface
```
- Встроенного провайдера авторизации
```php
<?php

use Wearesho\Bobra\Ubki;
use chillerlan\SimpleCache;

/** @var \GuzzleHttp\ClientInterface $client */
/** @var \Psr\Log\LoggerInterface $logger */

$authProvider = new Ubki\Authorization\Provider($client, $logger);
// или используейте кэш-провайдер для сохранения ключа сессии
$cacheDriver = new SimpleCache\Cache(new SimpleCache\Drivers\MemoryCacheDriver());
$authProvider = new Ubki\Authorization\CacheProvider($cacheDriver, $client, $logger);
```

Все сервисы возвращают [RequestResponsePair](./src/RequestResponsePair.php):
```php
<?php

/** @var \Wearesho\Bobra\Ubki\RequestResponsePair $requestResponsePair */

$requestResponsePair->getRequest(); // Тело запроса в виде строки
$requestResponsePair->getResponse(); // Тело ответа в виде строки
```

*Рекомендуется использовать контейнер внедрения зависимостей.*

### Запрос в реестр статусов (Push\Registry)

Пример отправки запроса в реестр для получения статуса об отправленных отчетах:

```php
<?php

use Wearesho\Bobra\Ubki;

/** @var Ubki\Push\ConfigInterface $config */
/** @var \GuzzleHttp\ClientInterface $client */
/** @var \Psr\Log\LoggerInterface $logger */
/** @var Ubki\Authorization\ProviderInterface $authProvider */

$service = new Ubki\Push\Registry\Service(
    $config,
    $authProvider,
    $client,
    $logger
);

$request = new Ubki\Push\Registry\Rep\Request(
    $operationDate = new \DateTime('now'),
    $ubkiId = 'ubki_id',
    $partnerId = 'partner_id'
);

$pair = $service->registry($request);
```

## Импорт отчетов (Pull)
- Инстанцирование конфига:
```php
<?php

use Wearesho\Bobra\Ubki;

$config = new Ubki\Pull\Config('username', 'password', Ubki\Pull\ConfigInterface::MODE_PRODUCTION);
// или используйте конфиг окружения
$config = new Ubki\Pull\EnvironmentConfig($prefix = 'UBKI_PULL_');
```

- Инстанцирование сервиса:
```php
<?php

use Wearesho\Bobra\Ubki;

/** @var Ubki\Pull\ConfigInterface $config */
/** @var \GuzzleHttp\ClientInterface $client */
/** @var \Psr\Log\LoggerInterface $logger */
/** @var Ubki\Authorization\ProviderInterface $authProvider */

$service = new Ubki\Pull\Service($config, $authProvider, $client, $logger);
```
- Запрос в УБКИ на импорт отчета:
```php
<?php

use Wearesho\Bobra\Ubki;

/** @var Ubki\Pull\ServiceInterface $service */

$request = new Ubki\Pull\Request(
    $headData = new Ubki\Pull\Request\Head(
        $type = Ubki\Pull\Report\Type::CREDIT_REPORT(),
        $reason = Ubki\Dictionary\RequestReason::REQUEST_ONLINE_CREDIT(),
        $date = new DateTime('now'),
        $id = 'id',
        $initiator = Ubki\Dictionary\RequestInitiator::PARTNER()
    ),
    $content = new Ubki\Pull\Element\RequestContent(
        $language = Ubki\Dictionary\Language::RUS(),
        $identificationData = new Ubki\Pull\Element\Identification(
            $inn = '123456790', // Всегда обязательный
            $name = 'name',
            $patronymic = 'patronymic',
            $surname = 'surname',
            $birthDate = new \DateTime('1984-03-12')
        ),
        $contacts = new Ubki\Pull\Collection\Contact([
            new Ubki\Pull\Element\Contact(
                Ubki\Dictionary\Contact::EMAIL(),
                $value = 'example@gmail.com'
            ),
        ]),
        $documents = new Ubki\Pull\Collection\Document([
            new Ubki\Pull\Element\Document(
                Ubki\Dictionary\Document::PASSPORT(),
                $serial = 'МТ',
                $number = '123456'
            ),
        ])
    )
);

$pair = $service->import($request);
```

## Экспорт отчетов
- Инстанцирование конфига:
```php
<?php

use Wearesho\Bobra\Ubki;

$config = new Ubki\Push\Config('username', 'password', Ubki\Push\ConfigInterface::MODE_PRODUCTION);
// или используйте конфиг окружения
$config = new Ubki\Push\EnvironmentConfig($prefix = 'UBKI_PUSH_');
```

- Инстанцирование сервиса
```php
<?php

use Wearesho\Bobra\Ubki;

/** @var Ubki\Push\ConfigInterface $config */
/** @var \GuzzleHttp\ClientInterface $client */
/** @var \Psr\Log\LoggerInterface $logger */
/** @var Ubki\Authorization\ProviderInterface $authProvider */

$service = new Ubki\Push\Export\Service(
    $config,
    $authProvider,
    $client,
    $logger
);
```
- Запрос в убки с экспортируемым отчетом
```php
<?php

use Wearesho\Bobra\Ubki;

/** @var Ubki\Push\Export\ServiceInterface $service */

// основные данные отчета
$headData = new Ubki\Push\Export\Request\Head(
    Ubki\Push\Export\Request\Type::EXPORT(),
    Ubki\Dictionary\RequestReason::EXPORT(),
    new DateTime('now'),
    'id',
    Ubki\Dictionary\RequestInitiator::PARTNER()
);

$report = new Ubki\Push\Export\Request\Body(
    // Композиция данных идентификации лица
    new Ubki\Data\Credential(
        Ubki\Dictionary\Language::RUS(),
        'name',
        'patronymic',
        'surname',
        $birthDate = new DateTime('1984-03-12'),
        // Коллекция стандартных данных идентификации лица
        new Ubki\Data\Collection\IdentifiedPerson([
            // Данные идентификация физического лица
            new Ubki\Data\NaturalPerson(
                $createdAt = new DateTime('now'),
                Ubki\Dictionary\Language::RUS(),
                'name',
                'surname',
                $birthDate = new DateTime('1984-03-12'),
                Ubki\Dictionary\Gender::MAN(),
                $inn = '1234567890',
                'patronymic',
                Ubki\Dictionary\FamilyStatus::MARRIED(),
                Ubki\Dictionary\Education::HIGH(),
                Ubki\Dictionary\Nationality::UKRAINE(),
                Ubki\Dictionary\RegistrationSpd::PHYSICAL(),
                Ubki\Dictionary\SocialStatus::PENSIONER(),
                $childrenCoun = 2
            ),
            // Данные идентификация юридического лица
            new Ubki\Data\LegalPerson(
                $createdAt = new DateTime('now'),
                Ubki\Dictionary\Language::RUS(),
                'name',
                'egrpou',
                Ubki\Dictionary\Ownership::BRANCH(),
                Ubki\Dictionary\EconomyBranch::BUILDING(),
                'activity_type',
                $edrRegistrationDate = new DateTime('1984-03-12'),
                $taxRegistrationDate = new DateTime('1984-03-12')
            ),
        ]),
        // Различные документы лица
        new Ubki\Data\Collection\Document([
            new Ubki\Data\Document(
                $createdAt = new DateTime('now'),
                Ubki\Dictionary\Language::RUS(),
                Ubki\Dictionary\Document::PASSPORT(),
                $serial = 'МТ',
                $number = '1234567890',
                'issueBy',
                $issueDate = new DateTime('1984-03-12'),
                $termin = new DateTime('2020-03-12')
            ),
        ]),
        // Места проживания лица
        new Ubki\Data\Collection\Address([
            new Ubki\Data\Address(
                $createdAt = new DateTime('now'),
                Ubki\Dictionary\Language::RUS(),
                Ubki\Dictionary\Address::HOME(),
                'country',
                'city',
                'street',
                'house',
                'index',
                'state',
                'area',
                Ubki\Dictionary\City::TOWN(),
                'corpus',
                'flat',
                'fullAddress'
            ),
        ]),
        $inn = '123467890',
        // Места работы лица
        new Ubki\Data\Collection\Work([
            new Ubki\Data\Work(
                $createdAt = new DateTime('now'),
                Ubki\Dictionary\Language::RUS(),
                'egrpou',
                'name',
                Ubki\Dictionary\IdentifierRank::DIRECTOR(),
                $experience = 10, // стаж в полных годах
                $income = 2500.00 // зарплата по документам
            ),
        ]),
        // Фотографии заемщика
        new Ubki\Data\Collection\Photo([
            new Ubki\Data\Photo(
                $createdAt = new DateTime('now'),
                'uri', // фото, закодированное в base64
                $inn = '1234567890'
            ),
        ]),
        // Поручители
        new Ubki\Data\Collection\LinkedPerson([
            new Ubki\Data\LinkedPerson(
                'name',
                Ubki\Dictionary\LinkedIdentifierRole::DIRECTOR(),
                $issueDate = new DateTime('now'),
                'egrpou'
            ),
        ])
    ),
    // Коллекция кредитных сделок
    new Ubki\Data\Collection\CreditDeal([
        new Ubki\Data\CreditDeal(
            'id',
            Ubki\Dictionary\Language::RUS(),
            'name',
            'surname',
            $birthDate = new DateTime('1984-03-12'),
            Ubki\Dictionary\CreditDeal::COMMERCIAL_CREDIT(),
            Ubki\Dictionary\Collateral::LEGAL(),
            Ubki\Dictionary\RepaymentProcedure::CREDIT_LIMIT(),
            Ubki\Dictionary\Currency::UAH(),
            $initialAmount = 10000.00,
            Ubki\Dictionary\SubjectRole::BORROWER(),
            $collateralCost = 10000.00,
            // Жиненный цикл сделки
            new Ubki\Data\Collection\DealLife([
                new Ubki\Data\DealLife(
                    'id', // должно быть идентичным id сделки
                    $periodMonth = 2,
                    $periodYear = 2018,
                    $issueDate = new DateTime('now'),
                    $endDate = new DateTime('2020-03-12'),
                    Ubki\Dictionary\DealStatus::OPEN(),
                    $limit = 10000.00,
                    $mandatoryPayment = 200.00,
                    $currentDebt = 0,
                    $currentDebtOverdue = 0,
                    $overdueTime = 0,
                    $paymentIndication = Ubki\Dictionary\Flag::YES(),
                    $delayIndication = Ubki\Dictionary\Flag::YES(),
                    $trancheIndication = Ubki\Dictionary\Flag::YES(),
                    $paymentDate = new DateTime('now'),
                    // должно быть обязательно указано при статусе "закрыта"
                    $actualEndDate = new DateTime('2018-03-12')
                ),
            ]),
            $inn = '1234567890',
            'patronymic',
            'source'
        ),
    ]),
    // Коллекция контактов лица
    new Ubki\Data\Collection\Contact([
        new Ubki\Data\Contact(
            $createdAt = new DateTime('now'),
            '+380000000000',
            Ubki\Dictionary\Contact::MOBILE(),
            $inn = '1234567890'
        ),
    ]),
    // Коллекция судебных решений
    new Ubki\Data\Collection\CourtDecision([
        new Ubki\Data\CourtDecision(
            'id',
            $inn = '1234567890',
            $date = new DateTime('now'),
            Ubki\Dictionary\CourtSubject::DEFENDANT(),
            Ubki\Dictionary\CourtDeal::CIVIL(),
            'courtName',
            'documentType',
            'documentTypeReference',
            'legalFact',
            'legalFactReference',
            $createdAt = new DateTime('now'),
            'area',
            'areaReference'
        ),
    ])
);

$request = new Ubki\Push\Export\Request($headData, $report);

$service->export($request);
```

## Справочники УБКИ
- [Документация УБКИ](https://sites.google.com/ubki.ua/doc/справочники)
- [Реализация библиотеки](src/Dictionary)

**Библиотека находится в разработке**
1. Авторизация (Authorization)
[Документация API](https://docs.google.com/document/d/1Tp70OOEgr0UKhXndCfqrdCUhauirTRPiv2S146gTooA/edit)

2. Получение данных (Pull)

3. Отправка данных (Push)

4. Отправка запроса на статусы передачи (Push\Registry)

## Требования
- PHP >=7.1
- Реализация PSR-16 Simple Cache для сохранения ключей авторизации

## Разработка
Требования к написанию кода в репозитории:
- Все изменения загружаются посредством создания отдельного Pull Request
- Весь код должен соответствовать PSR-2.
Для проверки рекомендуется использовать `composer lint`.
Для исправления форматирования `composer phpcbf`.
- Для любого функционала, кроме зависимостей, должны быть написаны тесты с покрытием 100%
- Для сетевых запросов необходимо использовать `guzzlehttp/guzzle`
- Для работы со временем необходимо использовать `nesbot/carbon`
- Все изменения затрагивающие публичные интерфейсы, 
добавленные в новой версии должны быть занесены в [Changelog](./CHANGELOG.md)
- Все классы тестов должны содержать `@internal` в doc блоке  

## Авторы
- [Alexander <horat1us> Letnikow](mailto:reclamme@gmail.com)
- [Roman <KartaviK> Varkuta](mailto:roman.varkuta@gmail.com)

## Лицензия
[MIT](./LICENSE)  
Является частью [bobra.io](https://bobra.io/)
