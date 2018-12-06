<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Class CreditRequestTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Elements\CreditRequest
 * @internal
 */
class CreditRequestTest extends TestCase
{
    use ArgumentsTrait\CreditRequest;

    protected const ELEMENT = Ubki\Data\Elements\CreditRequest::class;

    public const DATE = '2018-03-12';
    public const INN = 'testInn';
    public const ID = 'testId';
    public const REASON = 1;
    public const ORGANIZATION = 'testOrganization';

    protected function jsonKeys(): array
    {
        return [
            Ubki\Data\Elements\CreditRequest::DATE,
            Ubki\Data\Elements\CreditRequest::INN,
            Ubki\Data\Elements\CreditRequest::ID,
            Ubki\Data\Elements\CreditRequest::DECISION,
            Ubki\Data\Elements\CreditRequest::REASON,
            Ubki\Data\Elements\CreditRequest::ORGANIZATION,
        ];
    }

    protected function getExpectTag(): string
    {
        return Ubki\Data\Elements\CreditRequest::TAG;
    }

    protected function attributesNames(): array
    {
        return [
            'date',
            'inn',
            'id',
            'decision',
            'reason',
            'organization',
        ];
    }
}
