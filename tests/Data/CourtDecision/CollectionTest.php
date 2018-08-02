<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\CourtDecision;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Tests;

/**
 * Class CollectionTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Data\CourtDecision
 */
class CollectionTest extends Tests\Extend\CollectionTestCase
{
    protected const TYPE = Data\CourtDecision\Entity::class;

    /** @var Data\CourtDecision\Collection */
    protected $collection;

    /** @var string[] */
    protected $fakeIds;

    /** @var string[] */
    protected $fakeInns;

    /** @var Carbon[] */
    protected $fakeDates;

    /** @var string[] */
    protected $fakeDatesString;

    /** @var int[] */
    protected $fakeSubjectStatuses;

    /** @var int[] */
    protected $fakeCourtDealTypes;

    /** @var string[] */
    protected $fakeCourtNames;

    /** @var int[] */
    protected $fakeDocumentTypes;

    /** @var string[] */
    protected $fakeDocumentTypeReferences;

    /** @var string[] */
    protected $fakeLegalFacts;

    /** @var string[] */
    protected $fakeLegalFactReferences;

    /** @var Carbon[] */
    protected $fakeCreatedAts;

    /** @var string[] */
    protected $fakeCreatedAtsString;

    /** @var string[] */
    protected $fakeAreas;

    /** @var string[] */
    protected $fakeAreaReferences;

    protected function setUp(): void
    {
        $count = rand(1, 10);

        for ($i = 0; $i < $count; $i++) {
            $this->fakeIds[] = rand(1000000, 9999999) . rand(1000000, 9999999);
            $this->fakeInns[] = rand(10000, 99999) . rand(10000, 99999);
            $this->fakeDates[] = Carbon::create(rand(1998, 2020), rand(1, 12), rand(1, 30));
            $this->fakeDatesString[] = $this->fakeDates[$i]->toDateString();
            $this->fakeSubjectStatuses[] = rand(1, 10);
            $this->fakeCourtDealTypes[] = rand(1, 10);
            $this->fakeCourtNames[] = random_bytes(rand(1, 100));
            $this->fakeDocumentTypes[] = (string)rand(1, 20);
            $this->fakeDocumentTypeReferences[] = random_bytes(rand(1, 250));
            $this->fakeLegalFacts[] = (string)rand(1, 100);
            $this->fakeLegalFactReferences[] = random_bytes(rand(1, 250));
            $this->fakeCreatedAts[] = Carbon::create(rand(1998, 2020), rand(1, 12), rand(1, 30));
            $this->fakeCreatedAtsString[] = $this->fakeCreatedAts[$i]->toDateString();
            $this->fakeAreas[] = (string)rand(1, 100);
            $this->fakeAreaReferences[] = random_bytes(rand(1, 250));
        }

        $this->collection = new Data\CourtDecision\Collection();

        foreach ($this->fakeIds as $index => $fakeId) {
            $this->collection->append(new Data\CourtDecision\Entity(
                $fakeId,
                $this->fakeInns[$index],
                $this->fakeDates[$index],
                $this->fakeSubjectStatuses[$index],
                $this->fakeCourtDealTypes[$index],
                $this->fakeCourtNames[$index],
                $this->fakeDocumentTypes[$index],
                $this->fakeDocumentTypeReferences[$index],
                $this->fakeLegalFacts[$index],
                $this->fakeLegalFactReferences[$index],
                $this->fakeCreatedAts[$index],
                $this->fakeAreas[$index],
                $this->fakeAreaReferences[$index]
            ));
        }
    }

    public function testValues(): void
    {
        /**
         * @var int $index
         * @var Data\CourtDecision\Entity $item
         */
        foreach ($this->collection as $index => $item) {
            $date = Carbon::instance($item->getDate());
            $createdAt = Carbon::instance($item->getCreatedAt());

            $this->assertEquals(
                $this->fakeIds[$index],
                $item->getId()
            );
            $this->assertEquals(
                $this->fakeInns[$index],
                $item->getInn()
            );
            $this->assertEquals(
                $this->fakeDates[$index],
                $date
            );
            $this->assertEquals(
                $this->fakeDatesString[$index],
                $date->toDateString()
            );
            $this->assertEquals(
                $this->fakeSubjectStatuses[$index],
                $item->getSubjectStatus()
            );
            $this->assertEquals(
                $this->fakeCourtDealTypes[$index],
                $item->getCourtDealType()
            );
            $this->assertEquals(
                $this->fakeCourtNames[$index],
                $item->getCourtName()
            );
            $this->assertEquals(
                $this->fakeDocumentTypes[$index],
                $item->getDocumentType()
            );
            $this->assertEquals(
                $this->fakeDocumentTypeReferences[$index],
                $item->getDocumentTypeReference()
            );
            $this->assertEquals(
                $this->fakeLegalFacts[$index],
                $item->getLegalFact()
            );
            $this->assertEquals(
                $this->fakeLegalFactReferences[$index],
                $item->getLegalFactReference()
            );
            $this->assertEquals(
                Carbon::instance($this->fakeCreatedAts[$index]),
                $createdAt
            );
            $this->assertEquals(
                $this->fakeCreatedAtsString[$index],
                $createdAt->toDateString()
            );
            $this->assertEquals(
                $this->fakeAreas[$index],
                $item->getArea()
            );
            $this->assertEquals(
                $this->fakeAreaReferences[$index],
                $item->getAreaReference()
            );
        }
    }
}
