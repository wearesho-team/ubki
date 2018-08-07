<?php


namespace Wearesho\Bobra\Ubki\Tests\Data\Credential\Identifier\Legal;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Tests;

/**
 * Class EntityTest
 * @package Wearesho\Bobra\Ubki\Tests\Data\Credential\Identifier\Legal
 *
 * @internal
 */
class EntityTest extends Tests\Extend\ElementTestCase
{
    protected const TAG = 'urident';

    /** @var Data\Credential\Identifier\Legal\Entity */
    protected $element;

    protected function setUp(): void
    {
        $this->element = new Data\Credential\Identifier\Legal\Entity(
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
            $this->element->edrRegistrationDate
        );
    }

    public function testGetActivityType(): void
    {
        $this->assertEquals('1', $this->element->activityType);
    }

    public function testGetErgpou(): void
    {
        $this->assertEquals('ergpou', $this->element->ergpou);
    }

    public function testGetForm(): void
    {
        $this->assertEquals(1, $this->element->form);
    }

    public function testGetEconomyBranch(): void
    {
        $this->assertEquals('1', $this->element->economyBranch);
    }

    public function testGetTaxRegistrationDate(): void
    {
        $this->assertEquals(
            Carbon::create(2020, 3, 12, 10, 5, 7),
            Carbon::instance($this->element->taxRegistrationDate)
        );
        $this->assertEquals(
            '2020-03-12 10:05:07',
            Carbon::instance($this->element->taxRegistrationDate)->toDateTimeString()
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertEquals(
            [
                'createdAt' => '2020-03-12',
                'language' => 'ENG',
                'name' => 'name',
                'ergpou' => 'ergpou',
                'form' => 1,
                'economyBranch' => '1',
                'activityType' => '1',
                'edrRegistrationDate' => '2020-03-12',
                'taxRegistrationDate' => '2020-03-12'
            ],
            $this->element->jsonSerialize()
        );
    }
}
