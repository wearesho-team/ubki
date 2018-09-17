<?php

namespace Wearesho\Bobra\Ubki\Validation\Rules;

use Wearesho\Bobra\Ubki\Validation\Rule;

/**
 * Class LongSimpleText
 * @package Wearesho\Bobra\Ubki\Validation\Rules
 */
class LongSimpleText extends Rule
{
    public function getMessage(): string
    {
        return 'Long string have invalid format or contain invalid symbols';
    }

    final public function getPattern(): string
    {
        return '/(^[0-9A-Za-zйЙцЦуУкКеЕнНгГшШщЩзЗхХфФвВаАпПрРоОлЛдДжЖєЄяЯчЧсСмМиИтТьЬбБюЮэЭъЪёЁіїІЇєЄҐґЫы\s\\\"\–\—\-\.\;\:\,\`\№\(\)\&\+]{0,250}$)/u'; //phpcs:ignore
    }
}
