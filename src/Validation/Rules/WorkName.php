<?php

namespace Wearesho\Bobra\Ubki\Validation\Rules;

use Wearesho\Bobra\Ubki\Validation\Rule;

/**
 * Class WorkName
 * @package Wearesho\Bobra\Ubki\Validation\Rules
 */
class WorkName extends Rule
{
    public function getMessage(): string
    {
        return 'Value for work place name contain invalid symbols or have length more than 250';
    }

    public function getPattern(): string
    {
        return '/^[0-9a-zA-ZйЙцЦуУкКеЕнНгГшШщЩзЗхХфФвВаАпПрРоОлЛдДжЖєЄяЯчЧсСмМиИтТьЬбБюЮэЭъЪёЁіїІЇєЄҐґЫы\s\/\Q´\"\'–—-´`.,&:;()+?№«»\E]{1,250}$/u';//phpcs:ignore
    }
}
