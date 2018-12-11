<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data;

use PHPUnit\Framework\TestCase;
use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki\Data\Collections;

/**
 * Class CollectionsTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data
 */
class CollectionsTest extends TestCase
{
    /**
     * @param BaseCollection $collection
     *
     * @dataProvider providerCollections
     */
    public function testType(BaseCollection $collection): void
    {
        $type = $collection->type();
        $this->assertTrue(interface_exists($type) || class_exists($type));
    }

    public function providerCollections(): array
    {
        return [
            [new Collections\Addresses()],
            [new Collections\Comments()],
            [new Collections\Contacts()],
            [new Collections\CourtDecisions()],
            [new Collections\CreditDeals()],
            [new Collections\CreditDeals()],
            [new Collections\CreditRequests()],
            [new Collections\DealLifes()],
            [new Collections\Documents()],
            [new Collections\IdentifiedPersons()],
            [new Collections\InsuranceDeals()],
            [new Collections\InsuranceEvents()],
            [new Collections\LinkedPersons()],
            [new Collections\Photos()],
            [new Collections\Trace()],
            [new Collections\Works()],
        ];
    }
}
