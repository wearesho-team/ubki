<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Infrastructure\Element;
use Wearesho\Bobra\Ubki\ElementTrait;
use Wearesho\Bobra\Ubki\Dictionaries;

/**
 * Class PassportMVD
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
class PassportMVD implements Element
{
    use ElementTrait;
    
    public const TAG = 'mvd';
    public const FOUND = 'found';
    public const FOUND_REFERENCE = 'foundref';
    public const DESCRIPTION = 'foundtitle';
    public const STATUS = 'status';
    public const DATE = 'stdate';
    public const SERIAL = 'pser';
    public const NUMBER = 'pnom';
    public const SURNAME = 'plname';
    public const NAME = 'pfname';
    public const PATRONYMIC = 'pmname';
    public const BIRTH_DATE = 'pbdate';

    /** @var Dictionaries\Flag */
    protected $found;

    /** @var string */
    protected $description;

    /** @var string */
    protected $status;

    /** @var Carbon */
    protected $date;

    /** @var string */
    protected $serial;

    /** @var string */
    protected $number;

    /** @var string */
    protected $surname;

    /** @var string */
    protected $name;

    /** @var string */
    protected $patronymic;

    /** @var Carbon */
    protected $birthDate;

    public function __construct(
        Dictionaries\Flag $found,
        string $description,
        string $status,
        Carbon $date,
        string $serial,
        string $number,
        string $surname,
        string $name,
        string $patronymic,
        Carbon $birthDate
    ) {
        $this->found = $found;
        $this->description = $description;
        $this->status = $status;
        $this->date = $date;
        $this->serial = $serial;
        $this->number = $number;
        $this->surname = $surname;
        $this->name = $name;
        $this->patronymic = $patronymic;
        $this->birthDate = $birthDate;
    }

    public function jsonSerialize(): array
    {
        return [
            'found' => $this->found->__toString(),
            'description' => $this->description,
            'status' => $this->status,
            'date' => $this->date->toDateString(),
            'serial' => $this->serial,
            'number' => $this->number,
            'surname' => $this->surname,
            'name' => $this->name,
            'patronymic' => $this->patronymic,
            'birthDate' => $this->birthDate->toDateString(),
        ];
    }

    public function getFound(): Dictionaries\Flag
    {
        return $this->found;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getDate(): Carbon
    {
        return $this->date;
    }

    public function getSerial(): string
    {
        return $this->serial;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPatronymic(): string
    {
        return $this->patronymic;
    }

    public function getBirthDate(): Carbon
    {
        return $this->birthDate;
    }
}
