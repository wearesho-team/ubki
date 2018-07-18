<?php

namespace Wearesho\Bobra\Ubki\Block;

/**
 * Class Photo
 * @package Wearesho\Bobra\Ubki\Block
 */
class Photo
{
    public const TAG = 'foto';

    public const CREATED_AT = 'vdate';
    public const INN = 'inn';
    public const FOTO = 'foto';

    /**
     * Created date of this block
     * vdate attribute
     * @var \DateTimeInterface
     */
    protected $createdAt;

    /**
     * Subject's INN
     * inn attribute
     * @var int
     */
    protected $inn;

    /**
     * Subject's photo (converted with base64 method)
     * foto tag
     * @var string
     */
    protected $foto;

    /**
     * Photo constructor.
     *
     * @param \DateTimeInterface $createdAt
     * @param int                $inn
     * @param string             $foto
     */
    public function __construct(
        \DateTimeInterface $createdAt,
        int $inn,
        string $foto
    ) {
        $this->createdAt = $createdAt;
        $this->inn = $inn;
        $this->foto = $foto;
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getInn(): int
    {
        return $this->inn;
    }

    public function getFoto(): string
    {
        return $this->foto;
    }
}
