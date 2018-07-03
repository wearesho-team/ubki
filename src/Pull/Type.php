<?php

namespace Wearesho\Bobra\Ubki\Pull;

use MyCLabs\Enum\Enum;

/**
 * Class Type
 * @package Wearesho\Bobra\Ubki\Pull
 */
final class Type extends Enum
{
    public const CONTACTS = '04'; // Отчет контакты;
    public const AFS = '06'; // Отчет модуля АФС;
    public const RATING = '08'; // Только рейтинг УБКИ;
    public const DEFAULT = '09'; // Стандартный кредитный отчет (без Приватбанка);
    public const DEFAULT_PRIVATBANK = '10'; // Стандартный кредитный отчет (c Приватбанком);
    public const SCORE = '11'; // Отчет кредитный балл;
    public const IDENTIFICATION = '12'; // Отчет идентификация;
    public const PASSPORT_MVD = '13'; // Сервис проверки паспорта в МВД;
    public const COMPANY_DEFAULT = '14'; // Стандартный кредитный отчет юрлица (без Приватбанка);
    public const COMPANY_DEFAULT_PRIVATBANK = '15'; // Стандартный кредитный отчет юрлица (c Приватбанком);
    public const AFS_UBKI = '16'; // AFS UBKI;
    public const PHOTO_VERIFICATION = '17'; // Отчёт фото-верификация;
    public const EXIST_CHECK = '19'; // Запрос наличия КИ (служебный шаблон);
    public const VERIFICATION = '21'; // Верификация субъекта по ФИО+ДР+паспорт с проверкой паспорта в МВД
    public const GOVERNMENT = '22'; // Поиск ведомостей из государственных реестров
    public const DECISION = '23'; // Передача кредитного решения по запросу
}
