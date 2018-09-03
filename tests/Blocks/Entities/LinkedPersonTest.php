<?php

namespace Wearesho\Bobra\Ubki\Tests\Blocks\Entities;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Blocks\Entities\LinkedPerson;
use Wearesho\Bobra\Ubki\References\LinkedIdentifierRole;

/**
 * Class LinkedPersonTest
 * @package Wearesho\Bobra\Ubki\Tests\Blocks\Entities
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
                'name' => static::NAME,
                'role' => LinkedIdentifierRole::DIRECTOR()->getKey(),
                'issueDate' => static::ISSUE_DATE,
                'ergpou' => static::ERGPOU
            ],
            $this->fakeLinkedPerson->jsonSerialize()
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
