<?php

namespace Wearesho\Bobra\Ubki\Tests\Validation;

use Wearesho\Bobra\Ubki\Infrastructure\Element;
use Wearesho\Bobra\Ubki\Infrastructure\ElementInterface;
use Wearesho\Bobra\Ubki\Validation\Rule;
use Wearesho\Bobra\Ubki\Validation\RuleCollection;
use Wearesho\Bobra\Ubki\Validation\Rules\LongSimpleText;
use Wearesho\Bobra\Ubki\Validation\Rules\Number;
use Wearesho\Bobra\Ubki\Validation\Rules\Okpo;
use Wearesho\Bobra\Ubki\Validation\Rules\PersonName;
use Wearesho\Bobra\Ubki\Validation\Rules\RangeNumber;
use Wearesho\Bobra\Ubki\Validation\Rules\WorkName;

use PHPUnit\Framework\TestCase;

/**
 * Class RuleTest
 * @package Wearesho\Bobra\Ubki\Tests\Validation
 * @coversDefaultClass Rule
 * @internal
 */
class RuleTest extends TestCase
{
    public const TAG = 'tag';
    protected const INN = '1234567890';
    protected const OKPO = '12345678';
    protected const CORRECT_PERSON_NAME = 'CorrectPersonName';
    protected const INVALID_PERSON_NAME = 'Invalid person name contain invalid symbol ,';
    protected const CORRECT_SIMPLE_TEXT = 'Correct simple text';
    protected const INVALID_SIMPLE_TEXT = 'This text contain invalid symbol: \'';
    protected const CORRECT_WORK_NAME = 'Correct work name';
    protected const INVALID_WORK_NAME = 'Invalid work name [';
    protected const CORRECT_RANGE_NUMBER = '12345';
    protected const INVALID_RANGE_NUMBER = '123456';

    /** @var Element */
    protected $element;

    public function setUp(): void
    {
        $this->element = new class extends Element implements ElementInterface
        {
            /** @var string */
            public $longSimpleTextFirst;

            /** @var string */
            public $longSimpleTextSecond;

            /** @var string */
            public $inn;

            /** @var string */
            public $okpo;

            /** @var string */
            public $rangeNumber;

            /** @var string */
            public $personNameFirst;

            /** @var string */
            public $personNameSecond;

            /** @var string */
            public $workName;

            public function rules(): ?RuleCollection
            {
                return new RuleCollection([
                    LongSimpleText::provide(['longSimpleTextFirst', 'longSimpleTextSecond',]),
                    Number::provide(['inn',])->length(Rule::INN_LENGTH),
                    Okpo::provide(['okpo',]),
                    PersonName::provide(['personNameFirst', 'personNameSecond',]),
                    WorkName::provide(['workName',]),
                    RangeNumber::provide(['rangeNumber',])->length(5),
                ]);
            }

            public function tag(): string
            {
                return RuleTest::TAG;
            }

            public function jsonSerialize()
            {
                return [];
            }
        };
    }

    public function testLongSimpleText(): void
    {
        $this->element->longSimpleTextFirst = static::CORRECT_SIMPLE_TEXT;
        $this->element->longSimpleTextSecond = static::CORRECT_SIMPLE_TEXT;
        $this->element->validate();

        $this->assertEquals(
            static::CORRECT_SIMPLE_TEXT,
            $this->element->longSimpleTextFirst
        );
        $this->assertEquals(
            static::CORRECT_SIMPLE_TEXT,
            $this->element->longSimpleTextSecond
        );
    }

    /**
     * @expectedException \Wearesho\Bobra\Ubki\Validation\ValidationException
     * @expectedExceptionMessage Long string have invalid format or contain invalid symbols
     */
    public function testInvalidLongSimpleText(): void
    {
        $this->element->longSimpleTextFirst = static::INVALID_SIMPLE_TEXT;
        $this->element->longSimpleTextSecond = static::INVALID_SIMPLE_TEXT;
        $this->element->validate();
    }

    public function testCorrectInn(): void
    {
        $this->element->inn = static::INN;
        $this->element->validate();

        $this->assertEquals(
            static::INN,
            $this->element->inn
        );
    }

    /**
     * @expectedException \Wearesho\Bobra\Ubki\Validation\ValidationException
     * @expectedExceptionMessage Number must be in 10 digits length
     */
    public function testInvalidInn(): void
    {
        $this->element->inn = static::INN . static::INN;
        $this->element->validate();
    }

    public function testCorrectOkpo(): void
    {
        $this->element->okpo = static::OKPO;
        $this->element->validate();

        $this->assertEquals(
            static::OKPO,
            $this->element->okpo
        );

        $this->element->okpo = static::INN;
        $this->element->validate();

        $this->assertEquals(
            static::INN,
            $this->element->okpo
        );
    }

    /**
     * @expectedException \Wearesho\Bobra\Ubki\Validation\ValidationException
     * @expectedExceptionMessage Value must be 8 or 10 digits length
     */
    public function testInvalidOkpo(): void
    {
        $this->element->okpo = static::CORRECT_SIMPLE_TEXT;
        $this->element->validate();
    }

    public function testCorrectPersonName(): void
    {
        $this->element->personNameFirst = static::CORRECT_PERSON_NAME;
        $this->element->personNameSecond = static::CORRECT_PERSON_NAME;
        $this->element->validate();

        $this->assertEquals(
            static::CORRECT_PERSON_NAME,
            $this->element->personNameFirst
        );
        $this->assertEquals(
            static::CORRECT_PERSON_NAME,
            $this->element->personNameSecond
        );
    }

    /**
     * @expectedException \Wearesho\Bobra\Ubki\Validation\ValidationException
     * @expectedExceptionMessage Person have incorrect name
     */
    public function testInvalidPersonName(): void
    {
        $this->element->personNameFirst = static::INVALID_SIMPLE_TEXT;
        $this->element->validate();
    }

    public function testCorrectWorkName(): void
    {
        $this->element->workName = static::CORRECT_WORK_NAME;
        $this->element->validate();

        $this->assertEquals(
            static::CORRECT_WORK_NAME,
            $this->element->workName
        );
    }

    /**
     * @expectedException \Wearesho\Bobra\Ubki\Validation\ValidationException
     * @expectedExceptionMessage Value for work place name contain invalid symbols or have length more than 250
     */
    public function testInvalidWorkName(): void
    {
        $this->element->workName = static::INVALID_WORK_NAME;
        $this->element->validate();
    }

    public function testCorrectRangeNumber(): void
    {
        $this->element->rangeNumber = static::CORRECT_RANGE_NUMBER;
        $this->element->validate();

        $this->assertEquals(
            static::CORRECT_RANGE_NUMBER,
            $this->element->rangeNumber
        );
    }

    /**
     * @expectedException \Wearesho\Bobra\Ubki\Validation\ValidationException
     * @expectedExceptionMessage Number must be in range between 1 and 5 digits
     */
    public function testInvalidRangeNumber(): void
    {
        $this->element->rangeNumber = static::INVALID_RANGE_NUMBER;
        $this->element->validate();
    }
}
