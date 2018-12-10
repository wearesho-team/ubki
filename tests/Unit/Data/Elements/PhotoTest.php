<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Class PhotoTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Elements\Photo
 * @internal
 */
class PhotoTest extends Ubki\Tests\Unit\Data\TestCase
{
    use Ubki\Tests\Unit\Data\Elements\ArgumentsTrait\Photo;

    protected const ELEMENT = Ubki\Data\Elements\Photo::class;

    public const CREATED_AT = '2018-03-12';
    public const PHOTO = 'testPhoto';
    public const INN = 'testInn';

    protected function getExpectTag(): string
    {
        return Ubki\Data\Interfaces\Photo::TAG;
    }

    protected function attributesNames(): array
    {
        return [
            'createdAt',
            'uri',
            'inn',
        ];
    }
}
