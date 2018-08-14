<?php


namespace Wearesho\Bobra\Ubki\Tests\Data\Identifier\Legal;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Tests;

/**
 * Class EntityTest
 * @package Wearesho\Bobra\Ubki\Tests\Data\Identifier\Legal
 *
 * @internal
 */
class EntityTest extends Tests\Data\Credential\Identifier\EntityTestCase
{
    protected const TAG = 'urident';

    /** @var Data\Credential\Identifier\Legal\Entity */
    protected $element;

    protected function setUp(): void
    {
        $this->element = new Data\Credential\Identifier\Legal\Entity(
            Carbon::parse('2020-03-12'),
            Data\Language::ENG(),
            'name',
            'ergpou',
            1,
            '1',
            '1',
            Carbon::parse('2020-03-12'),
            Carbon::parse('2020-03-12')
        );
    }

    public function testGetEdrRegistrationDate(): void
    {
        $expected = Carbon::parse('2020-03-12');
        $this->assertEquals($expected, Carbon::instance($this->element->edrRegistrationDate));
        $this->assertEquals($expected, Carbon::instance($this->element->getEdrRegistrationDate()));
    }

    public function testGetActivityType(): void
    {
        $expected = '1';
        $this->assertEquals($expected, $this->element->activityType);
        $this->assertEquals($expected, $this->element->getActivityType());
    }

    public function testGetErgpou(): void
    {
        $expected = 'ergpou';
        $this->assertEquals($expected, $this->element->ergpou);
        $this->assertEquals($expected, $this->element->getErgpou());
    }

    public function testGetForm(): void
    {
        $expected = 1;
        $this->assertEquals($expected, $this->element->form);
        $this->assertEquals($expected, $this->element->getForm());
    }

    public function testGetTaxRegistrationDate(): void
    {
        $expected = Carbon::parse('2020-03-12');
        $this->assertEquals($expected, Carbon::instance($this->element->taxRegistrationDate));
        $this->assertEquals($expected, Carbon::instance($this->element->getTaxRegistrationDate()));
    }

    public function testGetEconomyBranch(): void
    {
        $expected = '1';
        $this->assertEquals($expected, $this->element->economyBranch);
        $this->assertEquals($expected, $this->element->getEconomyBranch());
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
