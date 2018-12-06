<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Class WorkTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Elements\Work
 * @internal
 */
class WorkTest extends TestCase
{
    use Ubki\Tests\Unit\Data\Elements\ArgumentsTrait\Work;

    protected const ELEMENT = Ubki\Data\Elements\Work::class;

    public const CREATED_AT = '2018-03-12';
    public const ERGPOU = 'testErgpou';
    public const EXPERIENCE = 10;
    public const INCOME = 1234.56;
    public const NAME = 'testName';

    protected function getExpectTag(): string
    {
        return Ubki\Data\Interfaces\Work::TAG;
    }

    public function jsonKeys(): array
    {
        return [
            Ubki\Data\Interfaces\Work::CREATED_AT,
            Ubki\Data\Interfaces\Work::LANGUAGE,
            Ubki\Data\Interfaces\Work::ERGPOU,
            Ubki\Data\Interfaces\Work::NAME,
            Ubki\Data\Interfaces\Work::RANK,
            Ubki\Data\Interfaces\Work::EXPERIENCE,
            Ubki\Data\Interfaces\Work::INCOME,
        ];
    }

    protected function attributesNames(): array
    {
        return [
            'createdAt',
            'language',
            'ergpou',
            'name',
            'rank',
            'experience',
            'income',
        ];
    }
}
