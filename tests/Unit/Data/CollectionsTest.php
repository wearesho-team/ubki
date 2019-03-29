<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data;

use PHPUnit\Framework\TestCase;
use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki\Data\Collection;

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
            [new Collection\Addresses()],
            [new Collection\Comments()],
            [new Collection\Contacts()],
            [new Collection\CourtDecisions()],
            [new Collection\CreditDeals()],
            [new Collection\CreditDeals()],
            [new Collection\CreditRequests()],
            [new Collection\DealLifes()],
            [new Collection\Documents()],
            [new Collection\IdentifiedPersons()],
            [new Collection\InsuranceDeals()],
            [new Collection\InsuranceEvents()],
            [new Collection\LinkedPersons()],
            [new Collection\Photos()],
            [new Collection\Trace()],
            [new Collection\Works()],
        ];
    }
}
