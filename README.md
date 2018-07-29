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

Push (экспорт): [Push\ConfigInterface](./src/Push/ConfigInterface.php)

Pull (импорт): [Pull\ConfigInterface](./src/Pull/ConfigInterface.php) (в разработке)

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

На импорт данных (в разработке):
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

### Пример использования: 

*Рекомендуется использовать контейнер внедрения зависимостей.*

Пример отправки запроса в реестр для получения статуса об отправленных отчетах:

```php
<?php

use Wearesho\Bobra\Ubki;

$authProvider = new Ubki\Authorization\Provider(
    new \GuzzleHttp\Client(), // любой клиент, имплементирующий \GuzzleHttp\ClientInterface
    new Psr\Log\NullLogger() // любой логгер, имплементирующий \Psr\Log\LoggerInterface
);

$service = new Ubki\Push\Registry\Service(
    new Ubki\Push\EnvironmentConfig("UBKI_"),
    $authProvider,
    new \GuzzleHttp\Client(), // любой клиент, имплементирующий \GuzzleHttp\ClientInterface
    new Psr\Log\NullLogger() // любой логгер, имплементирующий \Psr\Log\LoggerInterface
);

$request = new Ubki\Push\Registry\Rep\Request(...);
$response = $service->send($request);
```

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
