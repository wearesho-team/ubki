<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Infrastructure\Element;

/**
 * Class Photo
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
class Photo extends Element implements Data\Interfaces\Photo
{
    use Data\Traits\Photo;

    public function __construct(\DateTimeInterface $createdAt, string $uri, string $inn = null)
    {
        $this->createdAt = $createdAt;
        $this->uri = $uri;
        $this->inn = $inn;
    }
}
