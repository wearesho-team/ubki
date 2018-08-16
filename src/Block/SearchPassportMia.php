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

    // todo: refactor after implementation MVD element
    public function __construct($search)
    {
        $this->search = $search;
    }

    public function getSearch()
    {
        return $this->search;
    }
}
