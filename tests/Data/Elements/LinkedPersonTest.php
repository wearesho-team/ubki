<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\Elements;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Data\Elements\LinkedPerson;
use Wearesho\Bobra\Ubki\Data\Interfaces;
use Wearesho\Bobra\Ubki\Dictionaries\LinkedIdentifierRole;

/**
 * Class LinkedPersonTest
 * @package Wearesho\Bobra\Ubki\Tests\Data\Elements
 * @coversDefaultClass LinkedPerson
 * @internal
 */
class LinkedPersonTest extends TestCase
{
    protected const NAME = 'testName';
    protected const ISSUE_DATE = '2018-03-12';
    protected const ERGPOU = 'testErgpou';

    /** @var LinkedPerson */
    protected $fakeLinkedPerson;

    protected function setUp(): void
    {
        $this->fakeLinkedPerson = new LinkedPerson(
            static::NAME,
            LinkedIdentifierRole::DIRECTOR(),
            Carbon::parse(static::ISSUE_DATE),
            static::ERGPOU
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                Interfaces\LinkedPerson::NAME => static::NAME,
                Interfaces\LinkedPerson::ROLE => LinkedIdentifierRole::DIRECTOR(),
                Interfaces\LinkedPerson::ISSUE_DATE => Carbon::parse(static::ISSUE_DATE),
                Interfaces\LinkedPerson::ERGPOU => static::ERGPOU
            ],
            $this->fakeLinkedPerson->jsonSerialize()
        );
    }

    public function testTag(): void
    {
        $this->assertEquals(
            Interfaces\LinkedPerson::TAG,
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
            LinkedIdentifierRole::DIRECTOR(),
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
