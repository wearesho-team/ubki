<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki;

/**
 * Class LinkedPersonTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Elements\LinkedPerson
 * @internal
 */
class LinkedPersonTest extends TestCase
{
    protected const NAME = 'testName';
    protected const ISSUE_DATE = '2018-03-12';
    protected const ERGPOU = 'testErgpou';

    /** @var Ubki\Data\Elements\LinkedPerson */
    protected $fakeLinkedPerson;

    protected function setUp(): void
    {
        $this->fakeLinkedPerson = new Ubki\Data\Elements\LinkedPerson(
            static::NAME,
            Ubki\Dictionaries\LinkedIdentifierRole::DIRECTOR(),
            Carbon::parse(static::ISSUE_DATE),
            static::ERGPOU
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                Ubki\Data\Interfaces\LinkedPerson::NAME => static::NAME,
                Ubki\Data\Interfaces\LinkedPerson::ROLE => Ubki\Dictionaries\LinkedIdentifierRole::DIRECTOR(),
                Ubki\Data\Interfaces\LinkedPerson::ISSUE_DATE => Carbon::parse(static::ISSUE_DATE),
                Ubki\Data\Interfaces\LinkedPerson::ERGPOU => static::ERGPOU
            ],
            $this->fakeLinkedPerson->jsonSerialize()
        );
    }

    public function testTag(): void
    {
        $this->assertEquals(
            Ubki\Data\Interfaces\LinkedPerson::TAG,
            $this->fakeLinkedPerson->tag()
        );
    }

    public function testGetErgpou(): void
    {
        $this->assertEquals(
            static::ERGPOU,
            $this->fakeLinkedPerson->getErgpou()
        );
    }

    public function testGetRole(): void
    {
        $this->assertEquals(
            Ubki\Dictionaries\LinkedIdentifierRole::DIRECTOR(),
            $this->fakeLinkedPerson->getRole()
        );
    }

    public function testGetName(): void
    {
        $this->assertEquals(
            static::NAME,
            $this->fakeLinkedPerson->getName()
        );
    }

    public function testGetIssueDate(): void
    {
        $this->assertEquals(
            static::ISSUE_DATE,
            Carbon::instance($this->fakeLinkedPerson->getIssueDate())->toDateString()
        );
    }
}
