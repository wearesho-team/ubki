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
Для конфигурирования сервисов используется интерфейс
[ConfigInterface](./src/ConfigInterface.php).
Также доступны реализации:

### Config
```php
<?php

use Wearesho\Bobra\Ubki;

$config = new Ubki\Config(
    'username',
    'password',
    $mode = Ubki\Config::MODE_TEST // по-умолчанию
);
$config->setMode(Ubki\Config::MODE_PRODUCTION); // Использовать продакшн адреса
$config->setMode(Ubki\Config::MODE_TEST); // Использовать тестовые адреса
```

### EnvironmentConfig
```php
<?php

use Wearesho\Bobra\Ubki;

$config = new Ubki\EnvironmentConfig("PREFIX_");
```
будут использованы переменные окружения:
- **UBKI_USERNAME** - имя пользования
- **UBKI_PASSWORD** - пароль
- **UBKI_AUTH_URL** - URL для авторизации, по-умолчанию продакшн
- **UBKI_PUSH_URL** - URL для передачи информации, по-умолчанию - продакшн
- **UBKI_PULL_URL** - URL для получения информации, по-умолчанию - продакшн

## Использование
*Рекомендуется использовать контейнер внедрения зависимостей*

**Библиотека находится в разработке**
1. Авторизация (Auth)
2. Получение данных (Pull)
3. Отправка данных (Push)

## Требования
- PHP >=7.1
- Реализация PSR-6 Cache для сохранения ключей авторизации

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

## Автор
- [Alexander <horat1us> Letnikow](mailto:reclamme@gmail.com)

## Лицензия
[MIT](./LICENSE)  
Является частью [bobra.io](https://bobra.io/)
