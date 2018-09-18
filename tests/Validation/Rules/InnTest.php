<?php

namespace Wearesho\Bobra\Ubki\Tests\Validation\Rules;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Infrastructure\Element;
use Wearesho\Bobra\Ubki\Infrastructure\ElementInterface;
use Wearesho\Bobra\Ubki\Validation\RuleCollection;
use Wearesho\Bobra\Ubki\Validation\Rules\Inn;

/**
 * Class InnTest
 * @package Wearesho\Bobra\Ubki\Tests\Validation\Rules
 * @coversDefaultClass Inn
 * @internal
 */
class InnTest extends TestCase
{
    public const CORRECT_INN = '1234567890';
    public const INVALID_INN = '123456789';

    /** @var Element */
    protected $element;

    public function testCorrectInn(): void
    {
        $this->element = new class(InnTest::CORRECT_INN) extends Element implements ElementInterface
        {
            /** @var string */
            protected $inn;

            public function __construct(string $inn)
            {
                $this->inn = $inn;

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
                    new Inn(['inn',])
                ]);
            }

            public function getInn(): string
            {
                return $this->inn;
            }
        };

        $this->assertEquals(
            static::CORRECT_INN,
            $this->element->getInn()
        );
    }

    /**
     * @expectedException \Wearesho\Bobra\Ubki\Validation\ValidationException
     * @expectedExceptionMessage Invalid inn number
     */
    public function testInvalidInn(): void
    {
        $this->element = new class(InnTest::INVALID_INN) extends Element implements ElementInterface
        {
            /** @var string */
            protected $inn;

            public function __construct(string $inn)
            {
                $this->inn = $inn;

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
                    new Inn(['inn',])
                ]);
            }

            public function getInn(): string
            {
                return $this->inn;
            }
        };
    }
}
