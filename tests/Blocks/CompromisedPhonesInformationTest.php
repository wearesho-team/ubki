<?php

namespace Wearesho\Bobra\Ubki\Tests\Blocks;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Data\Blocks\CompromisedPhone;
use Wearesho\Bobra\Ubki\Data\Elements\BlackPhone;
use Wearesho\Bobra\Ubki\References\Flag;

/**
 * Class CompromisedPhonesInformationTest
 * @package Wearesho\Bobra\Ubki\Tests\Data
 * @coversDefaultClass CompromisedPhone
 * @internal
 */
class CompromisedPhonesInformationTest extends TestCase
{
    protected const VALUE = 'testValue';
    protected const TYPE = 1;
    protected const COMMENT = 'testComment';
    protected const CREATED_AT = '2018-03-12';

    /** @var BlackPhone */
    protected $blackPhone;

    /** @var CompromisedPhone */
    protected $fakeCompromisedPhonesInformation;

    protected function setUp(): void
    {
        $this->blackPhone = new BlackPhone(
            Flag::YES(),
            static::VALUE,
            static::TYPE,
            static::COMMENT,
            Carbon::parse(static::CREATED_AT)
        );
        $this->fakeCompromisedPhonesInformation = new CompromisedPhone($this->blackPhone);
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'compromisedPhone' => [
                    'found' => Flag::YES()->getKey(),
                    'value' => static::VALUE,
                    'type' => static::TYPE,
                    'comment' => static::COMMENT,
                    'createdAt' => static::CREATED_AT,
                ],
            ],
            $this->fakeCompromisedPhonesInformation->jsonSerialize()
        );
    }

    public function testGetPhone(): void
    {
        $this->assertEquals(
            $this->blackPhone,
            $this->fakeCompromisedPhonesInformation->getPhone()
        );
    }
}
