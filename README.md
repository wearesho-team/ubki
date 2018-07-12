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

Основные переменные:

- **UBKI_USERNAME** - имя пользования
- **UBKI_PASSWORD** - пароль
- **UBKI_AUTH_URL** - URL для авторизации

Для конфига ```Push\EnvironmentConfig``` дополнительно используются переменные:

- **UBKI_PUSH_URL** - URL для передачи информации
- **UBKI_REGISTRY_URL** - URL для запроса статусов передачи

Для конфига ```Pull\EnvironmentConfig``` дополнительно используются переменные:

- **UBKI_PULL_URL** - URL для получения информации

**Важно!** при отсутствии в окружении `username` или `password` сервис выдаст ошибку

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
