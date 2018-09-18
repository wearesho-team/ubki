<?php

namespace Wearesho\Bobra\Ubki\Tests\Validation;

use Wearesho\Bobra\Ubki\Infrastructure\Element;
use Wearesho\Bobra\Ubki\Infrastructure\ElementInterface;
use Wearesho\Bobra\Ubki\Validation\Rule;
use Wearesho\Bobra\Ubki\Validation\RuleCollection;

use PHPUnit\Framework\TestCase;

/**
 * Class RuleTest
 * @package Wearesho\Bobra\Ubki\Tests\Validation
 * @coversDefaultClass Rule
 * @internal
 */
class RuleTest extends TestCase
{
    /** @var Element */
    protected $element;

    public function testInstance(): void
    {
        $rule = new Rule([]);
        $this->assertEquals(
            Rule::BASE_PATTERN,
            $rule->getPattern()
        );
    }

    public function testPassedUserValidation(): void
    {
        $this->element = $this->element = new class(
            mt_rand(0, 100),
            mt_rand(101, 200)
        ) extends Element implements ElementInterface
        {
            /** @var int */
            protected $first;

            /** @var int */
            protected $second;

            public function __construct(int $first, int $second)
            {
                $this->first = $first;
                $this->second = $second;

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
                    new Rule(['first', 'second',], function (int $value): bool {
                        return $value <= $this->getSecond();
                    })
                ]);
            }

            public function getFirst(): int
            {
                return $this->first;
            }

            public function getSecond(): int
            {
                return $this->second;
            }
        };

        $this->assertTrue($this->element->getFirst() > 0);
        $this->assertTrue($this->element->getSecond() > 0);
    }

    /**
     * @expectedException \Wearesho\Bobra\Ubki\Validation\ValidationException
     * @expectedExceptionMessage Validation exception
     */
    public function testInvalidUserValidation(): void
    {
        $this->element = $this->element = new class(
            mt_rand(0, 100),
            mt_rand(0, 200)
        ) extends Element implements ElementInterface
        {
            /** @var int */
            protected $first;

            /** @var int */
            protected $second;

            public function __construct(int $first, int $second)
            {
                $this->first = $first;
                $this->second = $second;

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
                    new Rule(['first', 'second',], function (int $value): bool {
                        return $value < 0;
                    })
                ]);
            }

            public function getFirst(): int
            {
                return $this->first;
            }

            public function getSecond(): int
            {
                return $this->second;
            }
        };
    }
}
