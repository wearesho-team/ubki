<?php

namespace Wearesho\Bobra\Ubki\Block;

use Wearesho\Bobra\Ubki\BaseBlock;

/**
 * Class Photo
 * @package Wearesho\Bobra\Ubki\Block
 */
class Photo extends BaseBlock
{
    // attributes
    public const CREATED_AT = 'vdate';
    public const INN = 'inn';
    public const FOTO = 'foto';

    /** @var \DateTimeInterface */
    protected $createdAt;

    /** @var int|null */
    protected $inn;

    /**
     * Subject's photo (converted with base64 method)
     * @var string
     */
    protected $foto;

    public function __construct(
        \DateTimeInterface $createdAt,
        string $foto,
        ?int $inn = null
    ) {
        $this->createdAt = $createdAt;
        $this->inn = $inn;
        $this->foto = $foto;
    }

    public function tag(): string
    {
        return 'foto';
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getInn(): ?int
    {
        return $this->inn;
    }

    public function getFoto(): string
    {
        return $this->foto;
    }
}
