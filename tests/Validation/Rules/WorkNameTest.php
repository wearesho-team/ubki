<?php

namespace Wearesho\Bobra\Ubki\Tests\Validation\Rules;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Infrastructure\Element;
use Wearesho\Bobra\Ubki\Infrastructure\ElementInterface;
use Wearesho\Bobra\Ubki\Validation\RuleCollection;
use Wearesho\Bobra\Ubki\Validation\Rules\WorkName;

/**
 * Class WorkNameTest
 * @package Wearesho\Bobra\Ubki\Tests\Validation\Rules
 * @coversDefaultClass WorkName
 * @internal
 */
class WorkNameTest extends TestCase
{
    public const CORRECT_WORK_NAME = 'Correct work name';
    public const INVALID_WORK_NAME = 'Invalid work name [';

    /** @var Element */
    protected $element;

    public function testCorrectWorkName(): void
    {
        $this->element = new class(WorkNameTest::CORRECT_WORK_NAME) extends Element implements ElementInterface
        {
            /** @var string */
            protected $workName;

            public function __construct(string $workName)
            {
                $this->workName = $workName;

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
                    new WorkName(['workName',])
                ]);
            }

            public function getWorkName(): string
            {
                return $this->workName;
            }
        };

        $this->assertEquals(
            static::CORRECT_WORK_NAME,
            $this->element->getWorkName()
        );
    }

    /**
     * @expectedException \Wearesho\Bobra\Ubki\Validation\ValidationException
     * @expectedExceptionMessage Value for work place name contain invalid symbols or have length more than 250
     */
    public function testInvalidWorkName(): void
    {
        $this->element = new class(WorkNameTest::INVALID_WORK_NAME) extends Element implements ElementInterface
        {
            /** @var string */
            protected $workName;

            public function __construct(string $workName)
            {
                $this->workName = $workName;

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
                    new WorkName(['workName',])
                ]);
            }

            public function getWorkName(): string
            {
                return $this->workName;
            }
        };
    }
}
