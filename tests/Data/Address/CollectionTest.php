<?php

namespace Wearesho\Bobra\Ubki\Tests\Data\Address;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki;

/**
 * Class EntityTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Collection
 */
class CollectionTest extends Ubki\Tests\Extend\CollectionTestCase
{
    protected const TYPE = Ubki\Data\Address\Entity::class;

    /** @var Ubki\Data\Address\Collection */
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

    /** @var Ubki\Data\CityType[]|null */
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
        $this->collection = new Ubki\Data\Address\Collection();
        $languages = Ubki\Data\Language::toArray();
        $languageKeys = array_keys($languages);
        $languageValues = array_values($languages);
        $addressTypes = Ubki\Data\Address\Type::toArray();
        $addressTypesKeys = array_keys($addressTypes);
        $addressTypesValues = array_values($addressTypes);
        $cityTypes = Ubki\Data\CityType::toArray();
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
            $this->collection->append(new Ubki\Data\Address\Entity(
                Carbon::getTestNow(),
                new Ubki\Data\Language($this->languages[$index][1]),
                new Ubki\Data\Address\Type($this->types[$index][1]),
                $country,
                $this->cities[$index],
                $this->streets[$index],
                $this->houses[$index],
                $this->indexes[$index],
                $this->states[$index],
                $this->areas[$index],
                $this->cityTypes[$index][1] ? new Ubki\Data\CityType($this->cityTypes[$index][1]) : null,
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
         * @var Ubki\Data\Address\Entity $address
         */
        foreach ($this->collection as $index => $address) {
            $this->assertEquals($time, $address->getCreatedAt());
            $this->assertEquals(new Ubki\Data\Language($this->languages[$index][1]), $address->getLanguage());
            $this->assertEquals(new Ubki\Data\Address\Type($this->types[$index][1]), $address->getType());
            $this->assertEquals($this->countries[$index], $address->getCountry());
            $this->assertEquals($this->cities[$index], $address->getCity());
            $this->assertEquals($this->houses[$index], $address->getHouse());
            $this->assertEquals($this->indexes[$index], $address->getIndex());
            $this->assertEquals($this->states[$index], $address->getState());
            $this->assertEquals($this->areas[$index], $address->getArea());
            $this->assertEquals(
                $this->cityTypes[$index][1] ? new Ubki\Data\CityType($this->cityTypes[$index][1]) : null,
                $address->getCityType()
            );
            $this->assertEquals($this->corpuses[$index], $address->getCorpus());
            $this->assertEquals($this->fullAddresses[$index], $address->getFullAddress());
        }
    }
}
