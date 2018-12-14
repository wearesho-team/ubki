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

$pair = $service->send($request);
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
    $headData = new Ubki\Data\Elements\RequestData(
        $type = Ubki\Dictionaries\RequestType::CREDIT_REPORT(),
        $reason = Ubki\Dictionaries\RequestReason::REQUEST_ONLINE_CREDIT(),
        $date = new DateTime('now'),
        $id = 'id',
        $initiator = Ubki\Dictionaries\RequestInitiator::PARTNER()
    ),
    $content = new Ubki\Pull\Elements\RequestContent(
        $language = Ubki\Dictionaries\Language::RUS(),
        $identificationData = new Ubki\Pull\Elements\Identification(
            $inn = '123456790', // Всегда обязательный
            $name = 'name',
            $patronymic = 'patronymic',
            $surname = 'surname',
            $birthDate = new \DateTime('1984-03-12')
        ),
        $contacts = new Ubki\Pull\Collections\Contacts([
            new Ubki\Pull\Elements\Contact(
                Ubki\Dictionaries\ContactType::EMAIL(),
                $value = 'example@gmail.com'
            ),
        ]),
        $documents = new Ubki\Pull\Collections\Documents([
            new Ubki\Pull\Elements\Document(
                Ubki\Dictionaries\DocumentType::PASSPORT(),
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
- Инстанцирование формера (опционально)
```php
<?php

use Wearesho\Bobra\Ubki;

$former = new Ubki\Push\Export\Former();
```
- Инстанцирование сервиса
```php
<?php

use Wearesho\Bobra\Ubki;

/** @var Ubki\Push\ConfigInterface $config */
/** @var \GuzzleHttp\ClientInterface $client */
/** @var \Psr\Log\LoggerInterface $logger */
/** @var Ubki\Authorization\ProviderInterface $authProvider */
/** @var Ubki\Push\Export\Former $former */

$service = new Ubki\Push\Export\Service(
    $config,
    $authProvider,
    $client,
    $logger,
    $former
);
```
- Запрос в убки с экспортируемым отчетом
```php
<?php

use Wearesho\Bobra\Ubki;

/** @var Ubki\Push\Export\ServiceInterface $service */

// основные данные отчета
$headData = new Ubki\Data\Elements\RequestData(
    Ubki\Dictionaries\RequestType::EXPORT(),
    Ubki\Dictionaries\RequestReason::EXPORT(),
    new DateTime('now'),
    'id',
    Ubki\Dictionaries\RequestInitiator::PARTNER()
);

$report = new Ubki\Push\Export\DataDocument(
    // Блок идентификации
    new Ubki\Data\Blocks\Identification(
        // Композиция данных идентификации лица
        new Ubki\Data\Elements\Credential(
            Ubki\Dictionaries\Language::RUS(),
            'name',
            'patronymic',
            'surname',
            $birthDate = new DateTime('1984-03-12'),
            // Коллекция стандартных данных идентификации лица
            new Ubki\Data\Collections\IdentifiedPersons([
                // Данные идентификация физического лица
                new Ubki\Data\Elements\NaturalPerson(
                    $createdAt = new DateTime('now'),
                    Ubki\Dictionaries\Language::RUS(),
                    'name',
                    'surname',
                    $birthDate = new DateTime('1984-03-12'),
                    Ubki\Dictionaries\Gender::MAN(),
                    $inn = '1234567890',
                    'patronymic',
                    Ubki\Dictionaries\FamilyStatus::MARRIED(),
                    Ubki\Dictionaries\Education::HIGH(),
                    Ubki\Dictionaries\Nationality::UKRAINE(),
                    Ubki\Dictionaries\RegistrationSpd::PHYSICAL(),
                    Ubki\Dictionaries\SocialStatus::PENSIONER(),
                    $childrenCoun = 2
                ),
                // Данные идентификация юридического лица
                new Ubki\Data\Elements\LegalPerson(
                    $createdAt = new DateTime('now'),
                    Ubki\Dictionaries\Language::RUS(),
                    'name',
                    'egrpou',
                    'form',
                    'economy_branch',
                    'activity_type',
                    $edrRegistrationDate = new DateTime('1984-03-12'),
                    $taxRegistrationDate = new DateTime('1984-03-12')
                ),
            ]),
            // Различные документы лица
            new Ubki\Data\Collections\Documents([
                new Ubki\Data\Elements\Document(
                    $createdAt = new DateTime('now'),
                    Ubki\Dictionaries\Language::RUS(),
                    Ubki\Dictionaries\DocumentType::PASSPORT(),
                    $serial = 'МТ',
                    $number = '1234567890',
                    'issueBy',
                    $issueDate = new DateTime('1984-03-12'),
                    $termin = new DateTime('2020-03-12')
                ),
            ]),
            // Места проживания лица
            new Ubki\Data\Collections\Addresses([
                new Ubki\Data\Elements\Address(
                    $createdAt = new DateTime('now'),
                    Ubki\Dictionaries\Language::RUS(),
                    Ubki\Dictionaries\AddressType::HOME(),
                    'country',
                    'city',
                    'street',
                    'house',
                    'index',
                    'state',
                    'area',
                    Ubki\Dictionaries\CityType::TOWN(),
                    'corpus',
                    'flat',
                    'fullAddress'
                ),
            ]),
            $inn = '123467890',
            // Места работы лица
            new Ubki\Data\Collections\Works([
                new Ubki\Data\Elements\Work(
                    $createdAt = new DateTime('now'),
                    Ubki\Dictionaries\Language::RUS(),
                    'egrpou',
                    'name',
                    Ubki\Dictionaries\IdentifierRank::DIRECTOR(),
                    $experience = 10, // стаж в полных годах
                    $income = 2500.00 // зарплата по документам
                ),
            ]),
            // Фотографии заемщика
            new Ubki\Data\Collections\Photos([
                new Ubki\Data\Elements\Photo(
                    $createdAt = new DateTime('now'),
                    'uri', // фото, закодированное в base64
                    $inn = '1234567890'
                ),
            ]),
            // Поручители
            new Ubki\Data\Collections\LinkedPersons([
                new Ubki\Data\Elements\LinkedPerson(
                    'name',
                    Ubki\Dictionaries\LinkedIdentifierRole::DIRECTOR(),
                    $issueDate = new DateTime('now'),
                    'egrpou'
                ),
            ])
        )
    ),
    // Блок информации о кредитах
    new Ubki\Data\Blocks\CreditsInformation(
        // Коллекция кредитных сделок
        new Ubki\Data\Collections\CreditDeals([
            new Ubki\Data\Elements\CreditDeal(
                'id',
                Ubki\Dictionaries\Language::RUS(),
                'name',
                'surname',
                $birthDate = new DateTime('1984-03-12'),
                Ubki\Dictionaries\CreditDealType::COMMERCIAL_CREDIT(),
                Ubki\Dictionaries\CollateralType::R_1(),
                Ubki\Dictionaries\RepaymentProcedure::CREDIT_LIMIT(),
                Ubki\Dictionaries\Currency::UAH(),
                $initialAmount = 10000.00,
                Ubki\Dictionaries\SubjectRole::BORROWER(),
                $collateralCost = 10000.00,
                // Жиненный цикл сделки
                new Ubki\Data\Collections\DealLifes([
                    new Ubki\Data\Elements\DealLife(
                        'id', // должно быть идентичным id сделки
                        $periodMonth = 2,
                        $periodYear = 2018,
                        $issueDate = new DateTime('now'),
                        $endDate = new DateTime('2020-03-12'),
                        Ubki\Dictionaries\DealStatus::OPEN(),
                        $limit = 10000.00,
                        $mandatoryPayment = 200.00,
                        $currentDebt = 0,
                        $currentDebtOverdue = 0,
                        $overdueTime = 0,
                        $paymentIndication = Ubki\Dictionaries\Flag::YES(),
                        $delayIndication = Ubki\Dictionaries\Flag::YES(),
                        $trancheIndication = Ubki\Dictionaries\Flag::YES(),
                        $paymentDate = new DateTime('now'),
                        // должно быть обязательно указано при статусе "закрыта"
                        $actualEndDate = new DateTime('2018-03-12')
                    ),
                ]),
                $inn = '1234567890',
                'patronymic',
                'source'
            ),
        ])
    ),
    // Блок ифнормации о контактах
    new Ubki\Data\Blocks\ContactsInformation(
        // Коллекция контактов лица
        new Ubki\Data\Collections\Contacts([
            new Ubki\Data\Elements\Contact(
                $createdAt = new DateTime('now'),
                '+380000000000',
                Ubki\Dictionaries\ContactType::MOBILE(),
                $inn = '1234567890'
            ),
        ])
    ),
    // Блок информации о судебных решениях
    new Ubki\Data\Blocks\CourtDecisionsInformation(
        // Коллекция судебных решений
        new Ubki\Data\Collections\CourtDecisions([
            new Ubki\Data\Elements\CourtDecision(
                'id',
                $inn = '1234567890',
                $date = new DateTime('now'),
                Ubki\Dictionaries\CourtSubjectStatus::DEFENDANT(),
                Ubki\Dictionaries\CourtDealType::CIVIL(),
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
    )
);

$request = new Ubki\Push\Export\Request($headData, $report);

$service->export($request);
```

## Справочники УБКИ
- [Документация УБКИ](https://sites.google.com/ubki.ua/doc/справочники)
- [Реализация библиотеки](./src/Dictionaries)

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
