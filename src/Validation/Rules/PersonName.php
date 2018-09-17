<?php

namespace Wearesho\Bobra\Ubki\Validation\Rules;

use Wearesho\Bobra\Ubki\Validation\Rule;

/**
 * Class PersonName
 * @package Wearesho\Bobra\Ubki\Validation\Rules
 */
class PersonName extends Rule
{
    public function getMessage(): string
    {
        return 'Person have incorrect name';
    }

    final public function getPattern(): string
    {
        return "/^[0-9a-zA-ZйЙцЦуУкКеЕнНгГшШщЩзЗхХфФвВаАпПрРоОлЛдДжЖєЄяЯчЧсСмМиИтТьЬбБюЮэЭъЪёЁіїІЇєЄҐґЫы\´\s\\\"\'\–\—\-\´\`\.\,\&\;\(\)]{1,80}$/u"; //phpcs:ignore
    }
}
