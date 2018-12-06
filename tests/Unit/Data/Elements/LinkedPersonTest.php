<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Class LinkedPersonTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Elements\LinkedPerson
 * @internal
 */
class LinkedPersonTest extends TestCase
{
    use Ubki\Tests\Unit\Data\Elements\ArgumentsTrait\LinkedPerson;

    protected const ELEMENT = Ubki\Data\Elements\LinkedPerson::class;

    public const NAME = 'testName';
    public const ISSUE_DATE = '2018-03-12';
    public const ERGPOU = 'testErgpou';

    public function jsonKeys(): array
    {
        return [
            Ubki\Data\Interfaces\LinkedPerson::NAME,
            Ubki\Data\Interfaces\LinkedPerson::ROLE,
            Ubki\Data\Interfaces\LinkedPerson::ISSUE_DATE,
            Ubki\Data\Interfaces\LinkedPerson::ERGPOU,
        ];
    }

    protected function attributesNames(): array
    {
        return [
            'name',
            'role',
            'issueDate',
            'ergpou'
        ];
    }

    protected function getExpectTag(): string
    {
        return Ubki\Data\Interfaces\LinkedPerson::TAG;
    }
}
