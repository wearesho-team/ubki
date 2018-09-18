<?php

namespace Wearesho\Bobra\Ubki\Tests\Validation\Rules;

use Wearesho\Bobra\Ubki\Infrastructure\Element;
use Wearesho\Bobra\Ubki\Infrastructure\ElementInterface;
use Wearesho\Bobra\Ubki\Validation\RuleCollection;
use Wearesho\Bobra\Ubki\Validation\Rules\Number;

use PHPUnit\Framework\TestCase;

/**
 * Class NumberTest
 * @package Wearesho\Bobra\Ubki\Tests\Validation\Rules
 * @coversDefaultClass Number
 * @internal
 */
class NumberTest extends TestCase
{
    public const CORRECT_NUMBER_FIRST = '12345';
    public const CORRECT_NUMBER_SECOND = 54321;
    public const INVALID_NUMBER_FIRST = '1234';
    public const INVALID_NUMBER_SECOND = 543210;

    /** @var Element */
    protected $element;

    public function testCorrectNumber(): void
    {
        $this->element = new class(
            NumberTest::CORRECT_NUMBER_FIRST,
            NumberTest::CORRECT_NUMBER_SECOND
        ) extends Element implements ElementInterface
        {
            /** @var string */
            protected $numberFirst;

            /** @var int */
            protected $numberSecond;

            public function __construct(string $numberFirst, int $numberSecond)
            {
                $this->numberFirst = $numberFirst;
                $this->numberSecond = $numberSecond;

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
                    new Number(5, [
                        'numberFirst',
                        'numberSecond',
                    ])
                ]);
            }

            public function getNumberFirst(): string
            {
                return $this->numberFirst;
            }

            public function getNumberSecond(): int
            {
                return $this->numberSecond;
            }
        };

        $this->assertEquals(
            static::CORRECT_NUMBER_FIRST,
            $this->element->getNumberFirst()
        );
        $this->assertEquals(
            static::CORRECT_NUMBER_SECOND,
            $this->element->getNumberSecond()
        );
    }

    /**
     * @expectedException \Wearesho\Bobra\Ubki\Validation\ValidationException
     * @expectedExceptionMessage Number must be in 5 digits length
     */
    public function testInvalidNumber(): void
    {
        $this->element = new class(
            NumberTest::INVALID_NUMBER_FIRST,
            NumberTest::INVALID_NUMBER_SECOND
        ) extends Element implements ElementInterface
        {
            /** @var string */
            protected $numberFirst;

            /** @var int */
            protected $numberSecond;

            public function __construct(string $numberFirst, int $numberSecond)
            {
                $this->numberFirst = $numberFirst;
                $this->numberSecond = $numberSecond;

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
                    new Number(5, [
                        'numberFirst',
                        'numberSecond',
                    ])
                ]);
            }

            public function getNumberFirst(): string
            {
                return $this->numberFirst;
            }

            public function getNumberSecond(): int
            {
                return $this->numberSecond;
            }
        };
    }
}
