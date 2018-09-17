<?php

namespace Wearesho\Bobra\Ubki\Validation\Rules;

use Wearesho\Bobra\Ubki\Validation\Rule;

/**
 * Class ShortSimpleText
 * @package Wearesho\Bobra\Ubki\Validation\Rules
 */
class ShortSimpleText extends Rule
{
    public function getMessage(): string
    {
        return 'Short string have invalid format or contain invalid symbols';
    }

    public function getPattern(): string
    {
        return '/(^[0-9A-Za-zйЙцЦуУкКеЕнНгГшШщЩзЗхХфФвВаАпПрРоОлЛдДжЖєЄяЯчЧсСмМиИтТьЬбБюЮэЭъЪёЁіїІЇєЄҐґЫы\s\–\—\-\.\;\:\,\/\(\)\?\`]{0,40}$)/u'; //phpcs:ignore
    }
}
