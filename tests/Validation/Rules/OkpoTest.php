<?php

namespace Wearesho\Bobra\Ubki\Tests\Validation\Rules;

use Wearesho\Bobra\Ubki\Infrastructure\Element;
use Wearesho\Bobra\Ubki\Infrastructure\ElementInterface;
use Wearesho\Bobra\Ubki\Validation\RuleCollection;
use Wearesho\Bobra\Ubki\Validation\Rules\Okpo;

use PHPUnit\Framework\TestCase;

/**
 * Class OkpoTest
 * @package Wearesho\Bobra\Ubki\Tests\Validation\Rules
 * @coversDefaultClass Okpo
 * @internal
 */
class OkpoTest extends TestCase
{
    public const CORRECT_INN = '1234567890';
    public const CORRECT_OKPO = '12345678';
    public const INVALID_INN = '12345678901';
    public const INVALID_OKPO = '1234567';

    /** @var Element */
    protected $element;

    public function testCorrectOkpo(): void
    {
        $this->element = new class(
            OkpoTest::CORRECT_INN,
            OkpoTest::CORRECT_OKPO
        ) extends Element implements ElementInterface
        {
            /** @var string */
            protected $inn;

            /** @var string */
            protected $okpo;

            public function __construct(string $inn, string $okpo)
            {
                $this->inn = $inn;
                $this->okpo = $okpo;

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
                    new Okpo([
                        'inn',
                        'okpo',
                    ])
                ]);
            }

            public function getInn(): string
            {
                return $this->inn;
            }

            public function getOkpo(): string
            {
                return $this->okpo;
            }
        };

        $this->assertEquals(
            static::CORRECT_INN,
            $this->element->getInn()
        );
        $this->assertEquals(
            static::CORRECT_OKPO,
            $this->element->getOkpo()
        );
    }

    /**
     * @expectedException \Wearesho\Bobra\Ubki\Validation\ValidationException
     * @expectedExceptionMessage Value must be 8 or 10 digits length
     */
    public function testInvalidOkpo(): void
    {
        $this->element = new class(
            OkpoTest::INVALID_INN,
            OkpoTest::INVALID_OKPO
        ) extends Element implements ElementInterface
        {
            /** @var string */
            protected $inn;

            /** @var string */
            protected $okpo;

            public function __construct(string $inn, string $okpo)
            {
                $this->inn = $inn;
                $this->okpo = $okpo;

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
                    new Okpo([
                        'inn',
                        'okpo',
                    ])
                ]);
            }

            public function getInn(): string
            {
                return $this->inn;
            }

            public function getOkpo(): string
            {
                return $this->okpo;
            }
        };
    }
}
