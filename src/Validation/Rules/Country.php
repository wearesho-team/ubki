<?php

namespace Wearesho\Bobra\Ubki\Validation\Rules;

use Wearesho\Bobra\Ubki\Validation\Rule;

/**
 * Class Country
 * @package Wearesho\Bobra\Ubki\Validation\Rules
 */
class Country extends Rule
{
    public function getMessage(): string
    {
        return 'Country name have invalid format';
    }

    public function getPattern(): string
    {
        return '/(^[0-9A-Za-zйЙцЦуУкКеЕнНгГшШщЩзЗхХфФвВаАпПрРоОлЛдДжЖєЄяЯчЧсСмМиИтТьЬбБюЮэЭъЪёЁіїІЇєЄҐґЫы\s\–\—\-\.\;\:\,\/\(\)\?\`]{0,40}$)/u'; //phpcs:ignore
    }
}
