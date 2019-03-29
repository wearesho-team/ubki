<?php

namespace Wearesho\Bobra\Ubki\Data\Element;

use Wearesho\Bobra\Ubki;

/**
 * Class Photo
 * @package Wearesho\Bobra\Ubki\Data\Element
 */
class Photo extends Ubki\Infrastructure\Element implements Ubki\Data\Interfaces\Photo
{
    use Ubki\Data\Traits\Photo;

    public const TAG = 'foto';

    public function __construct(\DateTimeInterface $createdAt, string $uri, string $inn = null)
    {
        $this->createdAt = $createdAt;
        $this->uri = $uri;
        $this->inn = $inn;
    }
}
