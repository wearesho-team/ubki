<?php

namespace Wearesho\Bobra\Ubki\Blocks\Entities;

use Wearesho\Bobra\Ubki\Blocks;

/**
 * Class Photo
 * @package Wearesho\Bobra\Ubki\Blocks\Entities
 */
class Photo implements Blocks\Interfaces\Photo
{
    use Blocks\Traits\Photo;

    public function __construct(\DateTimeInterface $createdAt, string $uri, ?string $inn = null)
    {
        $this->createdAt = $createdAt;
        $this->uri = $uri;
        $this->inn = $inn;
    }
}
