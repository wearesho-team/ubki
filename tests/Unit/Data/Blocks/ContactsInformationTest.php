<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Blocks;

use Wearesho\Bobra\Ubki;

/**
 * Class ContactsInformationTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Blocks
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Data\Blocks\ContactsInformation
 * @internal
 */
class ContactsInformationTest extends TestCase
{
    use ArgumentsTrait\ContactsInformation;

    protected const ELEMENT = Ubki\Data\Blocks\ContactsInformation::class;

    protected function getExpectId(): int
    {
        return Ubki\Data\Blocks\ContactsInformation::ID;
    }

    protected function attributesNames(): array
    {
        return [
            'contacts',
        ];
    }
}
