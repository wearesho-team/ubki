<?php

namespace Wearesho\Bobra\Ubki\Tests\Validation\Rules;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Infrastructure\Element;
use Wearesho\Bobra\Ubki\Infrastructure\ElementInterface;
use Wearesho\Bobra\Ubki\Validation\RuleCollection;
use Wearesho\Bobra\Ubki\Validation\Rules\RangeNumber;

/**
 * Class RangeNumberTest
 * @package Wearesho\Bobra\Ubki\Tests\Validation\Rules
 * @coversDefaultClass RangeNumber
 * @internal
 */
class RangeNumberTest extends TestCase
{
    public const CORRECT_RANGE_NUMBER = '999999';
    public const INVALID_RANGE_NUMBER = '1000000';

    /** @var Element */
    protected $element;

    public function testCorrectRangeNumber(): void
    {
        $this->element = new class(RangeNumberTest::CORRECT_RANGE_NUMBER) extends Element implements ElementInterface
        {
            /** @var string */
            protected $rangeNumber;

            public function __construct(string $rangeNumber)
            {
                $this->rangeNumber = $rangeNumber;

                parent::__construct();
            }

            public function tag(): string
            {
                return 'test';
            }

            public function jsonSerialize(): array
            {
                return [];
            }

            public function rules(): ?RuleCollection
            {
                return new RuleCollection([
                    new RangeNumber(6, ['rangeNumber',])
                ]);
            }

            public function getRangeNumber(): string
            {
                return $this->rangeNumber;
            }
        };

        $this->assertEquals(
            static::CORRECT_RANGE_NUMBER,
            $this->element->getRangeNumber()
        );
    }

    /**
     * @expectedException \Wearesho\Bobra\Ubki\Validation\ValidationException
     * @expectedExceptionMessage Number must be in range between 1 and 6 digits
     */
    public function testInvalidRangeNumber(): void
    {
        $this->element = new class(RangeNumberTest::INVALID_RANGE_NUMBER) extends Element implements ElementInterface
        {
            /** @var string */
            protected $rangeNumber;

            public function __construct(string $rangeNumber)
            {
                $this->rangeNumber = $rangeNumber;

                parent::__construct();
            }

            public function tag(): string
            {
                return 'test';
            }

            public function jsonSerialize(): array
            {
                return [];
            }

            public function rules(): ?RuleCollection
            {
                return new RuleCollection([
                    new RangeNumber(6, ['rangeNumber',])
                ]);
            }

            public function getRangeNumber(): string
            {
                return $this->rangeNumber;
            }
        };
    }
}
