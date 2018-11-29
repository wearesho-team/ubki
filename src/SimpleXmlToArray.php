<?php

namespace Wearesho\Bobra\Ubki;

/**
 * Trait SimpleXmlToArray
 * @package Wearesho\Bobra\Ubki
 */
trait SimpleXmlToArray
{
    /**
     * @param \SimpleXMLElement $element
     *
     * @return \SimpleXMLElement[]|array
     */
    private function simpleXmlToArray(\SimpleXMLElement $element): array
    {
        $items = [];

        foreach ($element as $node) {
            $items[] = $node;
        }

        return $items;
    }
}
