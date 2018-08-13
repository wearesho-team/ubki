<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\Credential\Address;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Tests;

/**
 * Class CollectionTest
 * @package Wearesho\Bobra\Ubki\Tests\Data\Credential\Address
 *
 * @internal
 */
class CollectionTest extends Tests\Extend\CollectionTestCase
{
    protected const TYPE = Data\Credential\Address\Entity::class;

    /** @var Data\Credential\Address\Collection */
    protected $elements;

    /** @var array */
    protected $languages;

    /** @var array */
    protected $types;

    /** @var string[] */
    protected $countries;

    /** @var string[] */
    protected $cities;

    /** @var string[] */
    protected $streets;

    /** @var string[] */
    protected $houses;

    /** @var string[]|null */
    protected $indexes;

    /** @var string[]|null */
    protected $states;

    /** @var string[]|null */
    protected $areas;

    /** @var Data\CityType[]|null */
    protected $cityTypes;

    /** @var string[]|null */
    protected $corpuses;

    /** @var string[]|null */
    protected $flats;

    /** @var string[]|null */
    protected $fullAddresses;

    public static function setUpBeforeClass()
    {
        Carbon::setTestNow(Carbon::now());
    }

    protected function setUp(): void
    {
        $this->collection = new Data\Credential\Address\Collection();
        $languages = Data\Language::toArray();
        $languageKeys = array_keys($languages);
        $languageValues = array_values($languages);
        $addressTypes = Data\Credential\Address\Type::toArray();
        $addressTypesKeys = array_keys($addressTypes);
        $addressTypesValues = array_values($addressTypes);
        $cityTypes = Data\CityType::toArray();
        $cityTypesKeys = array_keys($cityTypes);
        $cityTypesValues = array_values($cityTypes);

        for ($i = 0; $i < rand(1, 100); $i++) {
            $this->languages[] = [
                $languageKeys[rand(0, 7)],
                $languageValues[rand(0, 7)],
            ];
            $this->types[] = [
                $addressTypesKeys[rand(0, 5)],
                $addressTypesValues[rand(0, 5)],
            ];
            $this->countries[] = random_bytes(rand(5, 15));
            $this->cities[] = random_bytes(rand(5, 15));
            $this->streets[] = random_bytes(rand(5, 15));
            $this->houses[] = random_bytes(rand(5, 15));
            $this->indexes[] = rand(0, 1) ? random_bytes(rand(5, 15)) : null;
            $this->states[] = rand(0, 1) ? random_bytes(rand(5, 15)) : null;
            $this->areas[] = rand(0, 1) ? random_bytes(rand(5, 15)) : null;
            $this->cityTypes[] =
                rand(0, 1)
                    ? [$cityTypesKeys[rand(0, 3)], $cityTypesValues[rand(0, 3)],]
                    : null;
            $this->corpuses[] = rand(0, 1) ? random_bytes(rand(5, 15)) : null;
            $this->flats[] = rand(0, 1) ? random_bytes(rand(5, 15)) : null;
            $this->fullAddresses[] =
                $this->countries[$i]
                . $this->cities[$i]
                . $this->streets[$i]
                . $this->houses[$i]
                . $this->indexes[$i]
                . $this->states[$i] ?? 'null'
                . $this->areas[$i] ?? 'null'
                . $this->cityTypes[$i] ?? 'null'
                . $this->corpuses[$i] ?? 'null'
                . $this->flats[$i] ?? 'null';
        }

        foreach ($this->countries as $index => $country) {
            $this->collection->append(new Data\Credential\Address\Entity(
                Carbon::getTestNow(),
                new Data\Language($this->languages[$index][1]),
                new Data\Credential\Address\Type($this->types[$index][1]),
                $country,
                $this->cities[$index],
                $this->streets[$index],
                $this->houses[$index],
                $this->indexes[$index],
                $this->states[$index],
                $this->areas[$index],
                $this->cityTypes[$index][1] ? new Data\CityType($this->cityTypes[$index][1]) : null,
                $this->corpuses[$index],
                $this->flats[$index],
                $this->fullAddresses[$index]
            ));
        }
    }

    public function testOffsetGet(): void
    {
        $time = Carbon::getTestNow();

        /**
         * @var int $index
         * @var Data\Credential\Address\Entity $address
         */
        foreach ($this->collection as $index => $address) {
            $this->assertEquals($time, $address->createdAt);
            $this->assertEquals(new Data\Language($this->languages[$index][1]), $address->language);
            $this->assertEquals(new Data\Credential\Address\Type($this->types[$index][1]), $address->type);
            $this->assertEquals($this->countries[$index], $address->country);
            $this->assertEquals($this->cities[$index], $address->city);
            $this->assertEquals($this->houses[$index], $address->house);
            $this->assertEquals($this->indexes[$index], $address->index);
            $this->assertEquals($this->states[$index], $address->state);
            $this->assertEquals($this->areas[$index], $address->area);
            $this->assertEquals(
                $this->cityTypes[$index][1] ? new Data\CityType($this->cityTypes[$index][1]) : null,
                $address->cityType
            );
            $this->assertEquals($this->corpuses[$index], $address->corpus);
            $this->assertEquals($this->fullAddresses[$index], $address->fullAddress);
        }
    }
}
