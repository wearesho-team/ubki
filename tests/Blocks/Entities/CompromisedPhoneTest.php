<?php

namespace Wearesho\Bobra\Ubki\Tests\Blocks\Entities;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Blocks\Entities\CompromisedPhone;
use Wearesho\Bobra\Ubki\References\Flag;

/**
 * Class CompromisedPhoneTest
 * @package Wearesho\Bobra\Ubki\Tests\Blocks\Entities
 * @coversDefaultClass CompromisedPhone
 * @internal
 */
class CompromisedPhoneTest extends TestCase
{
    protected const VALUE = 'testValue';
    protected const TYPE = 1;
    protected const COMMENT = 'testComment';
    protected const CREATED_AT = '2018-03-12';

    /** @var CompromisedPhone */
    protected $fakeCompromisedPhone;

    protected function setUp(): void
    {
        $this->fakeCompromisedPhone = new CompromisedPhone(
            Flag::YES(),
            static::VALUE,
            static::TYPE,
            static::COMMENT,
            Carbon::parse(static::CREATED_AT)
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertArraySubset(
            [
                'found' => Flag::YES()->getKey(),
                'value' => static::VALUE,
                'type' => static::TYPE,
                'comment' => static::COMMENT,
                'createdAt' => static::CREATED_AT,
            ],
            $this->fakeCompromisedPhone->jsonSerialize()
        );
    }

    public function testGetFound(): void
    {
        $this->assertEquals(
            Flag::YES(),
            $this->fakeCompromisedPhone->getFound()
        );
    }

    public function testGetCreatedAt(): void
    {
        $this->assertEquals(
            static::CREATED_AT,
            Carbon::instance($this->fakeCompromisedPhone->getCreatedAt())->toDateString()
        );
    }

    public function testGetType(): void
    {
        $this->assertEquals(
            static::TYPE,
            $this->fakeCompromisedPhone->getType()
        );
    }

    public function testGetValue(): void
    {
        $this->assertEquals(
            static::VALUE,
            $this->fakeCompromisedPhone->getValue()
        );
    }

    public function testGetComment(): void
    {
        $this->assertEquals(
            static::COMMENT,
            $this->fakeCompromisedPhone->getComment()
        );
    }
}
