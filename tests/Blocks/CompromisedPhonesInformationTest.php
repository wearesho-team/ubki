<?php

namespace Wearesho\Bobra\Ubki\Tests\Blocks;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Blocks\CompromisedPhonesInformation;
use Wearesho\Bobra\Ubki\Blocks\Entities\CompromisedPhone;
use Wearesho\Bobra\Ubki\References\Flag;

/**
 * Class CompromisedPhonesInformationTest
 * @package Wearesho\Bobra\Ubki\Tests\Blocks
 * @coversDefaultClass CompromisedPhonesInformation
 * @internal
 */
class CompromisedPhonesInformationTest extends TestCase
{
    protected const VALUE = 'testValue';
    protected const TYPE = 1;
    protected const COMMENT = 'testComment';
    protected const CREATED_AT = '2018-03-12';

    /** @var CompromisedPhonesInformation */
    protected $fakeCompromisedPhonesInformation;

    protected function setUp(): void
    {
        $this->fakeCompromisedPhonesInformation = new CompromisedPhonesInformation(
            new CompromisedPhone(
                Flag::YES(),
                static::VALUE,
                static::TYPE,
                static::COMMENT,
                Carbon::parse(static::CREATED_AT)
            )
        );
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
            new CompromisedPhone(
                Flag::YES(),
                static::VALUE,
                static::TYPE,
                static::COMMENT,
                Carbon::parse(static::CREATED_AT)
            ),
            $this->fakeCompromisedPhonesInformation->getPhone()
        );
    }
}
