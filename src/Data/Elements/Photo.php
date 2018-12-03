<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Class Photo
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
class Photo extends Ubki\Infrastructure\Element implements Ubki\Data\Interfaces\Photo
{
    use Ubki\Data\Traits\Photo;

    public function __construct(\DateTimeInterface $createdAt, string $uri, string $inn = null)
    {
        $this->createdAt = $createdAt;
        $this->uri = $uri;
        $this->inn = $inn;
    }
}
