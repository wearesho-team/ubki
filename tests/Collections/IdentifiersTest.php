<?php

namespace Wearesho\Bobra\Ubki\Tests\Collections;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Collections\Identifiers;
use Wearesho\Bobra\Ubki\References;
use Wearesho\Bobra\Ubki\Entities;

/**
 * Class IdentifiersTest
 * @package Wearesho\Bobra\Ubki\Tests\Collections
 * @coversDefaultClass Identifiers
 * @internal
 */
class IdentifiersTest extends TestCase
{
    protected const TYPE = Entities\Identifier::class;
    protected const CREATED_AT = '2020-03-12';
    protected const NAME = 'testName';
    protected const ERGPOU = 'testErgpou';
    protected const FORM = 123;
    protected const ECONOMY_BRANCH = 'economy_branch';
    protected const ACTIVITY_TYPE = 'activity_type';
    protected const EDR_REGISTRATION_DATE = '2020-03-12';
    protected const TAX_REGISTRATION_DATE = '2020-03-12';

    /** @var Identifiers */
    protected $fakeIdentifiers;

    protected function setUp(): void
    {
        $this->fakeIdentifiers = new Identifiers([
            new Entities\LegalIdentifier(
                Carbon::parse(static::CREATED_AT),
                References\Language::ENG(),
                static::NAME,
                static::ERGPOU,
                static::FORM,
                static::ECONOMY_BRANCH,
                static::ACTIVITY_TYPE,
                Carbon::parse(static::EDR_REGISTRATION_DATE),
                Carbon::parse(static::TAX_REGISTRATION_DATE)
            )
        ]);
    }

    public function testType(): void
    {
        $this->assertInstanceOf(
            static::TYPE,
            $this->fakeIdentifiers[0]
        );
    }
}
