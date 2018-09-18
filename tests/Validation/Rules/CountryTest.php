<?php

namespace Wearesho\Bobra\Ubki\Tests\Validation\Rules;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Infrastructure\Element;
use Wearesho\Bobra\Ubki\Infrastructure\ElementInterface;
use Wearesho\Bobra\Ubki\Validation\RuleCollection;
use Wearesho\Bobra\Ubki\Validation\Rules\CorrectCountryName;

/**
 * Class CountryTest
 * @package Wearesho\Bobra\Ubki\Tests\Validation\Rules
 * @coversDefaultClass CorrectCountryName
 * @internal
 */
class CountryTest extends TestCase
{
    public const CORRECT_COUNTRY_NAME = 'Ukraine';
    public const INVALID_COUNTRY_NAME = 'Invalid country\'';

    /** @var Element */
    protected $element;

    public function testCorrectCountryName(): void
    {
        $this->element = new class(CountryTest::CORRECT_COUNTRY_NAME) extends Element implements ElementInterface
        {
            /** @var string */
            protected $country;

            public function __construct(string $country)
            {
                $this->country = $country;

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
                    new CorrectCountryName(['country',])
                ]);
            }

            public function getCountry(): string
            {
                return $this->country;
            }
        };

        $this->assertEquals(
            static::CORRECT_COUNTRY_NAME,
            $this->element->getCountry()
        );
    }

    /**
     * @expectedException \Wearesho\Bobra\Ubki\Validation\ValidationException
     * @expectedExceptionMessage Country name have invalid format
     */
    public function testInvalidCountryName(): void
    {
        $this->element = new class(CountryTest::INVALID_COUNTRY_NAME) extends Element implements ElementInterface
        {
            /** @var string */
            protected $country;

            public function __construct(string $country)
            {
                $this->country = $country;

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
                    new CorrectCountryName(['country',])
                ]);
            }

            public function getCountry(): string
            {
                return $this->country;
            }
        };
    }
}
