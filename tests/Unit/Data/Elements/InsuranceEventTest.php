<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Class EventTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Elements\InsuranceEvent
 * @internal
 */
class InsuranceEventTest extends TestCase
{
    use ArgumentsTrait\InsuranceEvent;

    protected const ELEMENT = Ubki\Data\Elements\InsuranceEvent::class;

    public const REQUEST_DATE = '2018-03-12';
    public const DECISION_DATE = '2018-03-12';

    protected function jsonKeys(): array
    {
        return [
            Ubki\Data\Elements\InsuranceEvent::REQUEST_DATE,
            Ubki\Data\Elements\InsuranceEvent::DECISION,
            Ubki\Data\Elements\InsuranceEvent::DECISION_DATE,
        ];
    }

    protected function getExpectTag(): string
    {
        return Ubki\Data\Elements\InsuranceEvent::TAG;
    }

    protected function attributesNames(): array
    {
        return [
            'requestDate',
            'decision',
            'decisionDate'
        ];
    }
}
