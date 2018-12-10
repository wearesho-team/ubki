<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Blocks;

use Wearesho\Bobra\Ubki;

/**
 * Class CreditsRequestsInformationTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Blocks
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Blocks\CreditsRequestsInformation
 * @internal
 */
class CreditsRequestsInformationTest extends TestCase
{
    use ArgumentsTrait\CreditRequestsInformation;

    protected const ELEMENT = Ubki\Data\Blocks\CreditsRequestsInformation::class;

    protected function getExpectId(): int
    {
        return Ubki\Data\Blocks\CreditsRequestsInformation::ID;
    }

    protected function attributesNames(): array
    {
        return [
            'creditRequests',
            'registryTimes',
        ];
    }
}
