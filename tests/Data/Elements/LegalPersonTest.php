<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\Elements;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Data\Elements\LegalPerson;
use Wearesho\Bobra\Ubki\Dictionaries\Language;
use Wearesho\Bobra\Ubki\Data\Interfaces;

/**
 * Class LegalPersonTest
 * @package Wearesho\Bobra\Ubki\Tests\Data\Elements
 * @coversDefaultClass LegalPerson
 * @internal
 */
class LegalPersonTest extends TestCase
{
    protected const CREATED_AT = '2018-03-12';
    protected const NAME = 'testName';
    protected const ERGPOU = 'testErgpou';
    protected const FORM = 1;
    protected const ECONOMY_BRANCH = 'testBranch';
    protected const ACTIVITY_TYPE = 'testActivityType';
    protected const EDR_REGISTRATION_DATE = '2017-03-12';
    protected const TAX_REGISTRATION_DATE = '2016-03-12';

    /** @var LegalPerson */
    protected $fakeLegalIdentifier;

    protected function setUp(): void
    {
        $this->fakeLegalIdentifier = new LegalPerson(
            Carbon::parse(static::CREATED_AT),
            Language::RUS(),
            static::NAME,
            static::ERGPOU,
            static::FORM,
            static::ECONOMY_BRANCH,
            static::ACTIVITY_TYPE,
            Carbon::parse(static::EDR_REGISTRATION_DATE),
            Carbon::parse(static::TAX_REGISTRATION_DATE)
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                Interfaces\IdentifiedPerson::CREATED_AT => Carbon::parse(static::CREATED_AT),
                Interfaces\IdentifiedPerson::LANGUAGE => Language::RUS(),
                Interfaces\LegalPerson::NAME => static::NAME,
                Interfaces\LegalPerson::ERGPOU => static::ERGPOU,
                Interfaces\LegalPerson::FORM => static::FORM,
                Interfaces\LegalPerson::ECONOMY_BRANCH => static::ECONOMY_BRANCH,
                Interfaces\LegalPerson::ACTIVITY_TYPE => static::ACTIVITY_TYPE,
                Interfaces\LegalPerson::EDR_REGISTRATION_DATE => Carbon::parse(static::EDR_REGISTRATION_DATE),
                Interfaces\LegalPerson::TAX_REGISTRATION_DATE => Carbon::parse(static::TAX_REGISTRATION_DATE)
            ],
            $this->fakeLegalIdentifier->jsonSerialize()
        );
    }

    public function testGetName(): void
    {
        $this->assertEquals(
            static::NAME,
            $this->fakeLegalIdentifier->getName()
        );
    }

    public function testGetLanguage(): void
    {
        $this->assertEquals(
            Language::RUS(),
            $this->fakeLegalIdentifier->getLanguage()
        );
    }

    public function testGetForm(): void
    {
        $this->assertEquals(
            static::FORM,
            $this->fakeLegalIdentifier->getForm()
        );
    }

    public function testGetErgpou(): void
    {
        $this->assertEquals(
            static::ERGPOU,
            $this->fakeLegalIdentifier->getErgpou()
        );
    }

    public function testGetActivityType(): void
    {
        $this->assertEquals(
            static::ACTIVITY_TYPE,
            $this->fakeLegalIdentifier->getActivityType()
        );
    }

    public function testGetEconomyBranch(): void
    {
        $this->assertEquals(
            static::ECONOMY_BRANCH,
            $this->fakeLegalIdentifier->getEconomyBranch()
        );
    }

    public function testGetEdrRegistrationDate(): void
    {
        $this->assertEquals(
            static::EDR_REGISTRATION_DATE,
            Carbon::instance($this->fakeLegalIdentifier->getEdrRegistrationDate())->toDateString()
        );
    }

    public function testGetTaxRegistrationDate(): void
    {
        $this->assertEquals(
            static::TAX_REGISTRATION_DATE,
            Carbon::instance($this->fakeLegalIdentifier->getTaxRegistrationDate())->toDateString()
        );
    }

    public function testGetCreatedAt(): void
    {
        $this->assertEquals(
            static::CREATED_AT,
            Carbon::instance($this->fakeLegalIdentifier->getCreatedAt())->toDateString()
        );
    }
}
