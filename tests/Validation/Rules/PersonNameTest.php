<?php

namespace Wearesho\Bobra\Ubki\Tests\Validation\Rules;

use Wearesho\Bobra\Ubki\Infrastructure\Element;
use Wearesho\Bobra\Ubki\Infrastructure\ElementInterface;
use Wearesho\Bobra\Ubki\Validation\RuleCollection;
use Wearesho\Bobra\Ubki\Validation\Rules\PersonName;

use PHPUnit\Framework\TestCase;

/**
 * Class PersonNameTest
 * @package Wearesho\Bobra\Ubki\Tests\Validation\Rules
 * @coversDefaultClass PersonName
 * @internal
 */
class PersonNameTest extends TestCase
{
    public const CORRECT_NAME = 'Roman';
    public const CORRECT_SURNAME = 'Varkuta';
    public const CORRECT_PATRONYMIC = 'Ivanov';
    public const INVALID_NAME = 'Roman !';
    public const INVALID_SURNAME = 'Varkuta !';
    public const INVALID_PATRONYMIC = 'Ivanov !';

    /** @var Element */
    protected $element;

    public function testCorrectPersonName(): void
    {
        $this->element = new class(
            PersonNameTest::CORRECT_NAME,
            PersonNameTest::CORRECT_SURNAME,
            PersonNameTest::CORRECT_PATRONYMIC
        ) extends Element implements ElementInterface
        {
            /** @var string */
            protected $name;

            /** @var string */
            protected $surname;

            /** @var string */
            protected $patronymic;

            public function __construct(string $name, string $surname, string $patronymic)
            {
                $this->name = $name;
                $this->surname = $surname;
                $this->patronymic = $patronymic;

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
                    new PersonName([
                        'name',
                        'surname',
                        'patronymic',
                    ])
                ]);
            }

            public function getName(): string
            {
                return $this->name;
            }

            public function getSurname(): string
            {
                return $this->surname;
            }

            public function getPatronymic(): string
            {
                return $this->patronymic;
            }
        };

        $this->assertEquals(
            static::CORRECT_NAME,
            $this->element->getName()
        );
        $this->assertEquals(
            static::CORRECT_SURNAME,
            $this->element->getSurname()
        );
        $this->assertEquals(
            static::CORRECT_PATRONYMIC,
            $this->element->getPatronymic()
        );
    }

    /**
     * @expectedException \Wearesho\Bobra\Ubki\Validation\ValidationException
     * @expectedExceptionMessage Person have incorrect name
     */
    public function testInvalidPersonName(): void
    {
        $this->element = new class(
            PersonNameTest::INVALID_NAME,
            PersonNameTest::INVALID_SURNAME,
            PersonNameTest::INVALID_PATRONYMIC
        ) extends Element implements ElementInterface
        {
            /** @var string */
            protected $name;

            /** @var string */
            protected $surname;

            /** @var string */
            protected $patronymic;

            public function __construct(string $name, string $surname, string $patronymic)
            {
                $this->name = $name;
                $this->surname = $surname;
                $this->patronymic = $patronymic;

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
                    new PersonName([
                        'name',
                        'surname',
                        'patronymic',
                    ])
                ]);
            }

            public function getName(): string
            {
                return $this->name;
            }

            public function getSurname(): string
            {
                return $this->surname;
            }

            public function getPatronymic(): string
            {
                return $this->patronymic;
            }
        };
    }
}
