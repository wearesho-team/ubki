<?php

namespace Wearesho\Bobra\Ubki\Block;

use Wearesho\Bobra\Ubki;

/**
 * Class SearchPassportMia
 * @package Wearesho\Bobra\Ubki\Block
 */
class SearchPassportMia extends Ubki\Block
{
    public const ID = 5;

    protected $search;

    public function __construct($search)
    {
        $this->search;
    }

    public function getSearch()
    {
        return $this->search;
    }
}
