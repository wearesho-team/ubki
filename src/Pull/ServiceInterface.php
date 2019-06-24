<?php

namespace Wearesho\Bobra\Ubki\Pull;

use Wearesho\Bobra\Ubki;

/**
 * Interface ServiceInterface
 * @package Wearesho\Bobra\Ubki\Pull
 */
interface ServiceInterface
{
    /**
     * @param Request $request
     *
     * @return Ubki\RequestResponsePair
     * @throws Ubki\Exception\Request
     * @throws Ubki\Exception\Former
     */
    public function import(Request $request): Ubki\RequestResponsePair;
}
