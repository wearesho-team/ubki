<?php

namespace Wearesho\Bobra\Ubki\Tests\Validation\Rules;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Infrastructure\Element;
use Wearesho\Bobra\Ubki\Infrastructure\ElementInterface;
use Wearesho\Bobra\Ubki\Validation\RuleCollection;
use Wearesho\Bobra\Ubki\Validation\Rules\ShortSimpleText;

/**
 * Class ShortSimpleTextTest
 * @package Wearesho\Bobra\Ubki\Tests\Validation\Rules
 * @coversDefaultClass ShortSimpleText
 * @internal
 */
class ShortSimpleTextTest extends TestCase
{
    public const CORRECT_SIMPLE_TEXT = 'Correct text';
    public const INVALID_SIMPLE_TEXT = 'Invalid text !';

    /** @var Element */
    protected $element;

    public function testCorrectShortSimpleText(): void
    {
        $this->element = new class(ShortSimpleTextTest::CORRECT_SIMPLE_TEXT) extends Element implements ElementInterface
        {
            /** @var string */
            protected $simpleText;

            public function __construct(string $simpleText)
            {
                $this->simpleText = $simpleText;

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
                    new ShortSimpleText(['simpleText',])
                ]);
            }

            public function getSimpleText(): string
            {
                return $this->simpleText;
            }
        };

        $this->assertEquals(
            static::CORRECT_SIMPLE_TEXT,
            $this->element->getSimpleText()
        );
    }

    /**
     * @expectedException \Wearesho\Bobra\Ubki\Validation\ValidationException
     * @expectedExceptionMessage Short string have invalid format or contain invalid symbols
     */
    public function testInvalidShortSimpleText(): void
    {
        $this->element = new class(ShortSimpleTextTest::INVALID_SIMPLE_TEXT) extends Element implements ElementInterface
        {
            /** @var string */
            protected $simpleText;

            public function __construct(string $simpleText)
            {
                $this->simpleText = $simpleText;

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
                    new ShortSimpleText(['simpleText',])
                ]);
            }

            public function getSimpleText(): string
            {
                return $this->simpleText;
            }
        };
    }
}
