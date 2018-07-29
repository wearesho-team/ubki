<?php


namespace Wearesho\Bobra\Ubki\Tests\Data\Identifier\Legal;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Tests;

/**
 * Class EntityTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Data\Identifier\Legal
 */
class EntityTest extends Tests\Extend\ElementTestCase
{
    protected const TAG = 'urident';

    /** @var Data\Identifier\Legal\Entity */
    protected $element;

    protected function setUp(): void
    {
        $this->element = new Data\Identifier\Legal\Entity(
            Carbon::create(2020, 3, 12, 10, 5, 7),
            Data\Language::ENG(),
            'name',
            'ergpou',
            1,
            '1',
            '1',
            Carbon::create(2020, 3, 12, 10, 5, 7),
            Carbon::create(2020, 3, 12, 10, 5, 7)
        );
    }

    public function testGetEdrRegistrationDate(): void
    {
        $this->assertEquals(
            Carbon::create(2020, 3, 12, 10, 5, 7),
            $this->element->getEdrRegistrationDate()
        );
    }

    public function testGetActivityType(): void
    {
        $this->assertEquals('1', $this->element->getActivityType());
    }

    public function testGetErgpou(): void
    {
        $this->assertEquals('ergpou', $this->element->getErgpou());
    }

    public function testGetForm(): void
    {
        $this->assertEquals(1, $this->element->getForm());
    }

    public function testGetEconomyBranch(): void
    {
        $this->assertEquals('1', $this->element->getEconomyBranch());
    }

    public function testGetTaxRegistrationDate(): void
    {
        $this->assertEquals(
            Carbon::create(2020, 3, 12, 10, 5, 7),
            $this->element->getTaxRegistrationDate()
        );
    }
}
