<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data;

use PHPUnit\Framework\TestCase;
use Wearesho\BaseCollection;
use Wearesho\Bobra\Ubki\Data\Collection;

/**
 * Class CollectionsTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Head
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
        $this->assertTrue(\interface_exists($type) || \class_exists($type));
    }

    public function providerCollections(): array
    {
        return [
            [new Collection\Address()],
            [new Collection\Comment()],
            [new Collection\Contact()],
            [new Collection\CourtDecision()],
            [new Collection\CreditDeal()],
            [new Collection\CreditDeal()],
            [new Collection\CreditRequest()],
            [new Collection\DealLife()],
            [new Collection\Document()],
            [new Collection\IdentifiedPerson()],
            [new Collection\InsuranceDeal()],
            [new Collection\InsuranceEvent()],
            [new Collection\LinkedPerson()],
            [new Collection\Photo()],
            [new Collection\Trace()],
            [new Collection\Work()],
        ];
    }
}
