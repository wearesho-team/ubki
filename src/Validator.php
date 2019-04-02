<?php

namespace Wearesho\Bobra\Ubki;

use MyCLabs\Enum\Enum;

/**
 * Class Validator
 * @package Wearesho\Bobra\Ubki
 *
 * @method static Validator JUST_TEXT_250()
 * @method static Validator OKPO()
 * @method static Validator WORK_NAME()
 * @method static Validator TWO_NUMBER()
 * @method static Validator BIG_FLOAT()
 * @method static Validator UPPERCASE_SYMBOL()
 * @method static Validator TEXT_100()
 * @method static Validator OKPO_UNICODE()
 * @method static Validator TEXT_20()
 * @method static Validator PASSPORT_SERIES()
 * @method static Validator DOCUMENT_ISSUE()
 * @method static Validator COUNTRY()
 * @method static Validator CITY()
 * @method static Validator INDEX()
 * @method static Validator FULL_ADDRESS()
 * @method static Validator TEXT_40()
 * @method static Validator STREET()
 * @method static Validator ADDRESS_STATE()
 * @method static Validator ADDRESS_AREA()
 * @method static Validator NUM_10()
 * @method static Validator YEAR()
 * @method static Validator SHORT_NUMBER()
 * @method static Validator MONTH()
 * @method static Validator INN()
 * @method static Validator JUST_TEXT_100()
 * @method static Validator CONTACT()
 * @method static Validator DOCUMENT_NUMBER()
 * @method static Validator NAME()
 */
final class Validator extends Enum
{
    // phpcs:disable

    /** @var string Validator number 3 */
    public const JUST_TEXT_250 = '/(^[0-9A-Za-zйЙцЦуУкКеЕнНгГшШщЩзЗхХфФвВаАпПрРоОлЛдДжЖєЄяЯчЧсСмМиИтТьЬбБюЮэЭъЪёЁіїІЇєЄҐґЫы\s\\\"\–\—\-\.\;\:\,\`\№\(\)\&\+]{0,250}$)/u';

    /** @var string Validator number 10 */
    public const OKPO = '/(^\d{8}|\d{10}$)/';

    /** @var string Validator number 11 */
    public const WORK_NAME = '/^[0-9a-zA-ZйЙцЦуУкКеЕнНгГшШщЩзЗхХфФвВаАпПрРоОлЛдДжЖєЄяЯчЧсСмМиИтТьЬбБюЮэЭъЪёЁіїІЇєЄҐґЫы\s\/\Q´\"\'–—-´`.,&:;()+?№«»\E]{1,250}$/u';

    /** @var string Validator number 12 */
    public const TWO_NUMBER = '/(^\d{1,2}$)/u';

    /** @var string Validator number 13 */
    public const BIG_FLOAT = '/(^[0-9]{1,15}\.[0-9]{1,2}$)|(^[0-9]{1,15}$)|(^\-[0-9]{1,15}\.[0-9]{1,2}$)|(^\-[0-9]{1,15}$)/u';

    /** @var string Validator number 14 */
    public const UPPERCASE_SYMBOL = '/(^[A-Z]{1}$)/u';

    /** @var string Validator number 15 */
    public const TEXT_100 = '/(^[0-9A-Za-zйЙцЦуУкКеЕнНгГшШщЩзЗхХфФвВаАпПрРоОлЛдДжЖєЄяЯчЧсСмМиИтТьЬбБюЮэЭъЪёЁіїІЇєЄҐґЫы \,\.\@\#\\\"\'\:\;\–\—\-\&\!\´\№\`\(\)]{0,100}$)/u';

    /**
     * Validator number 17
     * Same as OKPO but with unicode option (/u)
     * @var string
     */
    public const OKPO_UNICODE = '/(^\d{8}|\d{10}$)/u';

    /** @var string Validator number 19 */
    public const TEXT_20 = '/^[0-9A-Za-zйЙцЦуУкКеЕнНгГшШщЩзЗхХфФвВаАпПрРоОлЛдДжЖєЄяЯчЧсСмМиИтТьЬбБюЮэЭъЪёЁіїІЇєЄҐґЫы ,\.@#\\\"\':;\-_&!\-\(\)]{0,20}$/u';

    /** @var string Validator number 20 */
    public const PASSPORT_SERIES = '/(^[0-9A-Za-zйЙцЦуНКУкКеЕнНгГшШщЩзЗхХфФвВаАпПрРоОлЛдДжЖєЄяЯчЧсСмМиИтТьЬбБюЮэЭъЪёЁіїІЇєЄҐґЫы\–\—\-]{0,10}$)/u';

    /** @var string Validator number 21 */
    public const DOCUMENT_ISSUE = '/(^[0-9A-Za-zйЙцЦуУкКеЕнНгГшШщЩзЗхХфФвВаАпПрРоОлЛдДжЖєЄяЯчЧсСмМиИтТьЬбБюЮэЭъЪёЁіїІЇєЄҐґЫы \,\.\@\#\\\"\'\:\;\–\—\-\&\!\´\№\`\(\)\/\?]{0,100}$)/u';

    /** @var string Validator number 22 */
    public const COUNTRY = '/(^[0-9A-Za-zйЙцЦуУкКеЕнНгГшШщЩзЗхХфФвВаАпПрРоОлЛдДжЖєЄяЯчЧсСмМиИтТьЬбБюЮэЭъЪёЁіїІЇєЄҐґЫы\s\–\—\-\.\;\:\,\/\(\)\?\`]{0,40}$)/u';

    /** @var string Validator number 23 */
    public const CITY = '/(^[0-9A-Za-zйЙцЦуУкКеЕнНгГшШщЩзЗхХфФвВаАпПрРоОлЛдДжЖєЄяЯчЧсСмМиИтТьЬбБюЮэЭъЪёЁіїІЇєЄҐґЫы\s\–\—\-\.\;\:\,\№\`\´\’\(\)\?]{1,80}$)+/u';

    /** @var string Validator number 24 */
    public const INDEX = '/(^[0-9\-\s]{1,20}$)/u';

    /** @var string Validator number 25 */
    public const FULL_ADDRESS = '/(^[0-9A-Za-zйЙцЦуУкКеЕнНгГшШщЩзЗхХфФвВаАпПрРоОлЛдДжЖєЄяЯчЧсСмМиИтТьЬбБюЮэЭъЪёЁіїІЇєЄҐґЫы\s\–\—\-\.\;\:\,\№\`\´\/\(\)\?]{0,1000}$)+/u';

    /** @var string Validator number 26 */
    public const TEXT_40 = '/(^[0-9А-ЯйЙцЦуУкКеЕнНгГшШщЩзЗхХфФвВаАпПрРоОлЛдДжЖєЄяЯчЧсСмМиИтТьЬбБюЮэЭъЪёЁіїІЇєЄҐґЫыa-zA-Z\s\&,\.@#\\\"\':;_\&!\-\/\(\)]{1,40}$)/';

    /** @var string Validator number 27 */
    public const STREET = '/(^[0-9йЙцЦуУкКеЕнНгГшШщЩзЗхХфФвВаАпПрРоОлЛдДжЖєЄяЯчЧсСмМиИтТьЬбБюЮэЭъЪёЁіїІЇєЄҐґЫыa-zA-Z\s\´\&,\.\@\#\\\"\':;_\&!\–\—\-\`\/\(\)\?]{1,100}$)/u';

    /** @var string Validator number 28 */
    public const ADDRESS_STATE = '/^[A-Za-zйЙцЦуУкКеЕнНгГшШщЩзЗхХфФвВаАпПрРоОлЛдДжЖєЄяЯчЧсСмМиИтТьЬбБюЮэЭъЪёЁіїІЇєЄҐґЫы\s\–\—\-\.\;\:\,\`\(\)\?]{1,40}$/u';

    /** @var string Validator number 29 */
    public const ADDRESS_AREA = '/^[A-Za-zйЙцЦуУкКеЕнНгГшШщЩзЗхХфФвВаАпПрРоОлЛдДжЖєЄяЯчЧсСмМиИтТьЬбБюЮэЭъЪёЁіїІЇєЄҐґЫы\s\–\—\-\.\;\:\,\`\(\)\?]{0,40}$/u';

    /** @var string Validator number 31 */
    public const NUM_10 = '/(^[0-9]{1,10}$)/u';

    /** @var string Validator number 32 */
    public const YEAR = '/(^[\d]{4}$)/u';

    /** @var string Validator number 33 */
    public const SHORT_NUMBER = '/(^[\d]{1,5}$)/u';

    /** @var string Validator number 34 */
    public const MONTH = '/^(1|2|3|4|5|6|7|8|9|11|12)$/';

    /** @var string Validator number 37 */
    public const INN = '/^\d{10}$/u';

    /** @var string Validator number 38 */
    public const JUST_TEXT_100 = '/(^[0-9A-Za-zйЙцЦуУкКеЕнНгГшШщЩзЗхХфФвВаАпПрРоОлЛдДжЖєЄяЯчЧсСмМиИтТьЬбБюЮэЭъЪёЁіїІЇєЄҐґЫы\s\\\"\–\—\-\.\;\:\,\`\№\(\)]{0,100}$)/u';

    /** @var string Validator number 39 */
    public const CONTACT = '/(^[0-9A-Za-zйЙцЦуУкКеЕнНгГшШщЩзЗхХфФвВаАпПрРоОлЛдДжЖєЄяЯчЧсСмМиИтТьЬбБюЮэЭъЪёЁіїІЇєЄҐґЫы\s\,\.\@\#\\\"\'\:\;\_\/\&\!\-\+]{1,40}$)/u';

    /** @var string Validator number 42 */
    public const DOCUMENT_NUMBER = '/^[0-9A-Za-zйЙцЦуУкКеЕнНгГшШщЩзЗхХфФвВаАпПрРоОлЛдДжЖєЄяЯчЧсСмМиИтТьЬбБюЮэЭъЪёЁіїІЇєЄҐґЫы ,\.@#\\\"\':;\-_&!\-\(\)\/]{0,20}$/u';

    /** @var string Validator number 43 */
    public const NAME = '/^[0-9a-zA-ZйЙцЦуУкКеЕнНгГшШщЩзЗхХфФвВаАпПрРоОлЛдДжЖєЄяЯчЧсСмМиИтТьЬбБюЮэЭъЪёЁіїІЇєЄҐґЫы\´\s\\\"\'\–\—\-\´\`\.\,\&\;\(\)]{1,80}$/u';
    
    // phpcs:enable

    public function validate(?string $value, bool $nullable = false): void
    {
        if (!$nullable && is_null($value) || !\preg_match($this->getValue(), $value)) {
            throw new Exception\Validator($this, $value);
        }
    }
}
