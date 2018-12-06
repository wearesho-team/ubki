<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements\ArgumentsTrait;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;
use Wearesho\Bobra\Ubki\Data\Collections;
use Wearesho\Bobra\Ubki\Data\Elements;

/**
 * Trait Credential
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data\Elements\ArgumentsTrait
 *
 * @property-read Ubki\Tests\Fakers\BaseFaker $faker
 */
trait Credential
{
    use Address,
        Document,
        Work,
        Photo,
        LegalPerson,
        NaturalPerson,
        LinkedPerson
    {
        Address::arguments as protected addressArguments;
        Document::arguments as protected documentArguments;
        Work::arguments as protected workArguments;
        Photo::arguments as protected photoArguments;
        LegalPerson::arguments as protected legalArguments;
        NaturalPerson::arguments as protected naturalArguments;
        LinkedPerson::arguments as protected linkedArguments;
    }

    protected function arguments(): array
    {
        return [
            Ubki\Dictionaries\Language::RUS(),
            Ubki\Tests\Unit\Data\Elements\CredentialTest::NAME,
            Ubki\Tests\Unit\Data\Elements\CredentialTest::PATRONYMIC,
            Ubki\Tests\Unit\Data\Elements\CredentialTest::SURNAME,
            Carbon::parse(Ubki\Tests\Unit\Data\Elements\CredentialTest::BIRTH_DATE),
            $this->faker->collection->type(Collections\IdentifiedPersons::class)
                ->fill(10, $this->faker->element->with($this->naturalArguments())->make(Elements\NaturalPerson::class))
                ->fill(10, $this->faker->element->with($this->legalArguments())->make(Elements\LegalPerson::class))
                ->get(),
            $this->faker->collection->type(Collections\Documents::class)
                ->fill(40, $this->faker->element->with($this->documentArguments())->make(Elements\Document::class))
                ->get(),
            $this->faker->collection->type(Collections\Addresses::class)
                ->fill(30, $this->faker->element->with($this->addressArguments())->make(Elements\Address::class))
                ->get(),
            Ubki\Tests\Unit\Data\Elements\CredentialTest::INN,
            $this->faker->collection->type(Collections\Works::class)
                ->fill(15, $this->faker->element->with($this->workArguments())->make(Elements\Work::class))
                ->get(),
            $this->faker->collection->type(Collections\Photos::class)
                ->fill(100, $this->faker->element->with($this->photoArguments())->make(Elements\Photo::class))
                ->get(),
            $this->faker->collection->type(Collections\LinkedPersons::class)
                ->fill(5, $this->faker->element->with($this->linkedArguments())->make(Elements\LinkedPerson::class))
                ->get(),
        ];
    }
}
