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
            Carbon::parse('2018-09-30'),
            '123123123'
        );
    }

    public function testGetErgpou(): void
    {
        $expected = '123123123';
        $this->assertEquals($expected, $this->element->ergpou);
        $this->assertEquals($expected, $this->element->getErgpou());
    }

    public function testGetIssueDate(): void
    {
        $expected = Carbon::parse('2018-09-30');
        $this->assertEquals($expected, Carbon::instance($this->element->issueDate));
        $this->assertEquals($expected, Carbon::instance($this->element->getIssueDate()));
    }

    public function testGetName(): void
    {
        $expected = 'name';
        $this->assertEquals($expected, $this->element->name);
        $this->assertEquals($expected, $this->element->getName());
    }

    public function testGetRole(): void
    {
        $expected = Credential\LinkedPerson\Role::FOUNDER('Учредитель');
        $this->assertEquals($expected, $this->element->role);
        $this->assertEquals($expected, $this->element->getRole());
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
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
