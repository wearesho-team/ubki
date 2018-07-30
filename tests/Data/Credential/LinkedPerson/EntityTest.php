<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\Credential\LinkedPerson;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Tests;

/**
 * Class EntityTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Data\Credential\LinkedPerson
 */
class EntityTest extends Tests\Extend\ElementTestCase
{
    protected const TAG = 'linked';

    /** @var Data\Credential\LinkedPerson\Entity */
    protected $element;

    protected function setUp(): void
    {
        $this->element = new Data\Credential\LinkedPerson\Entity(
            'name',
            1,
            Carbon::create(2018, 9, 30, 12, 24, 25),
            '123123123'
        );
    }

    public function testGetErgpou(): void
    {
        $this->assertEquals('123123123', $this->element->getErgpou());
    }

    public function testGetIssueDate(): void
    {
        $this->assertEquals(
            Carbon::create(2018, 9, 30, 12, 24, 25),
            $this->element->getIssueDate()
        );
    }

    public function testGetName(): void
    {
        $this->assertEquals('name', $this->element->getName());
    }

    public function testGetRole(): void
    {
        $this->assertEquals(1, $this->element->getRole());
    }
}
