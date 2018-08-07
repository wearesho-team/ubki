<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\Credential\LinkedPerson;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Data\Credential;
use Wearesho\Bobra\Ubki\Tests;

/**
 * Class EntityTest
 * @package Wearesho\Bobra\Ubki\Tests\Data\Credential\LinkedPerson
 *
 * @internal
 */
class EntityTest extends Tests\Extend\ElementTestCase
{
    protected const TAG = 'linked';

    /** @var Credential\LinkedPerson\Entity */
    protected $element;

    protected function setUp(): void
    {
        $this->element = new Credential\LinkedPerson\Entity(
            'name',
            Credential\LinkedPerson\Role::FOUNDER('Учредитель'),
            Carbon::create(2018, 9, 30, 12, 24, 25),
            '123123123'
        );
    }

    public function testGetErgpou(): void
    {
        $this->assertEquals('123123123', $this->element->ergpou);
    }

    public function testGetIssueDate(): void
    {
        $this->assertEquals(
            Carbon::create(2018, 9, 30, 12, 24, 25),
            Carbon::instance($this->element->issueDate)
        );
        $this->assertEquals(
            '2018-09-30 12:24:25',
            Carbon::instance($this->element->issueDate)->toDateTimeString()
        );
    }

    public function testGetName(): void
    {
        $this->assertEquals('name', $this->element->name);
    }

    public function testGetRole(): void
    {
        $this->assertEquals(Credential\LinkedPerson\Role::FOUNDER('Учредитель'), $this->element->role);
    }

    public function testJsonSerialize(): void
    {
        $this->assertEquals(
            [
                'name' => 'name',
                'role' => 'Учредитель',
                'issueDate' => '2018-09-30',
                'ergpou' => '123123123'
            ],
            $this->element->jsonSerialize()
        );
    }
}
