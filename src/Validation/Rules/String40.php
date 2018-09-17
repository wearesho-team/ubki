<?php

namespace Wearesho\Bobra\Ubki\Validation\Rules;

use Wearesho\Bobra\Ubki\Validation\Rule;

/**
 * Class String40
 * @package Wearesho\Bobra\Ubki\Validation\Rules
 */
class String40 extends Rule
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
