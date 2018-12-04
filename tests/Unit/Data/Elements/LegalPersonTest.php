<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki;

/**
 * Class LegalPersonTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Elements\LegalPerson
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

    /** @var Ubki\Data\Elements\LegalPerson */
    protected $fakeLegalIdentifier;

    protected function setUp(): void
    {
        $this->fakeLegalIdentifier = new Ubki\Data\Elements\LegalPerson(
            Carbon::parse(static::CREATED_AT),
            Ubki\Dictionaries\Language::RUS(),
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
                Ubki\Data\Interfaces\IdentifiedPerson::CREATED_AT => Carbon::parse(static::CREATED_AT),
                Ubki\Data\Interfaces\IdentifiedPerson::LANGUAGE => Ubki\Dictionaries\Language::RUS(),
                Ubki\Data\Interfaces\LegalPerson::NAME => static::NAME,
                Ubki\Data\Interfaces\LegalPerson::ERGPOU => static::ERGPOU,
                Ubki\Data\Interfaces\LegalPerson::FORM => static::FORM,
                Ubki\Data\Interfaces\LegalPerson::ECONOMY_BRANCH => static::ECONOMY_BRANCH,
                Ubki\Data\Interfaces\LegalPerson::ACTIVITY_TYPE => static::ACTIVITY_TYPE,
                Ubki\Data\Interfaces\LegalPerson::EDR_REGISTRATION_DATE =>
                    Carbon::parse(static::EDR_REGISTRATION_DATE),
                Ubki\Data\Interfaces\LegalPerson::TAX_REGISTRATION_DATE =>
                    Carbon::parse(static::TAX_REGISTRATION_DATE)
            ],
            $this->fakeLegalIdentifier->jsonSerialize()
        );
    }

    public function testTag(): void
    {
        $this->assertEquals(
            Ubki\Data\Elements\LegalPerson::LEGAL_PREFIX . Ubki\Data\Interfaces\LegalPerson::TAG,
            $this->fakeLegalIdentifier->tag()
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
            Ubki\Dictionaries\Language::RUS(),
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
