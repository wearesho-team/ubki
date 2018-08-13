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

    public function testGetters(): void
    {
        parent::testGetters();

        $this->assertEquals(Carbon::parse('2020-03-12'), Carbon::instance($this->element->edrRegistrationDate));
        $this->assertEquals('1', $this->element->activityType);
        $this->assertEquals('ergpou', $this->element->ergpou);
        $this->assertEquals(1, $this->element->form);
        $this->assertEquals('1', $this->element->economyBranch);
        $this->assertEquals(Carbon::parse('2020-03-12'), Carbon::instance($this->element->taxRegistrationDate));
        $this->assertEquals('2020-03-12', Carbon::instance($this->element->taxRegistrationDate)->toDateString());
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
