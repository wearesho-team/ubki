<?php

namespace Wearesho\Bobra\Ubki\Tests\Pull;

use Wearesho\Bobra\Ubki\Pull\IdentificationData;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\References\Language;

/**
 * Class IdentificationDataTest
 * @package Wearesho\Bobra\Ubki\Tests\Pull
 * @coversDefaultClass IdentificationData
 * @internal
 */
class IdentificationDataTest extends TestCase
{
    protected const INN = 'testInn';

    /** @var IdentificationData */
    protected $fakeIdentificationData;

    protected function setUp(): void
    {
        $this->fakeIdentificationData = new IdentificationData(
            Language::RUS(),
            static::INN
        );
    }

    public function testGetLanguage(): void
    {
        $this->assertEquals(
            Language::RUS(),
            $this->fakeIdentificationData->getLanguage()
        );
    }

    public function testGetInn(): void
    {
        $this->assertEquals(
            static::INN,
            $this->fakeIdentificationData->getInn()
        );
    }
}
