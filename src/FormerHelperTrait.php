<?php

namespace Wearesho\Bobra\Ubki;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

/**
 * Trait FormerHelperTrait
 * @package Wearesho\Bobra\Ubki
 *
 * @property \DOMDocument $document
 */
trait FormerHelperTrait
{
    protected function createFilledElement(Ubki\ElementInterface $element): \DOMElement
    {
        return $this->setAttributes($this->document->createElement($element->tag()), $element);
    }

    protected function setAttributes(\DOMElement $xml, ElementInterface $element): \DOMElement
    {
        foreach ($element->associativeAttributes() as $name => $parameter) {
            if (!is_null($parameter)) {
                if ($parameter instanceof Ubki\Dictionary) {
                    $parameter = $parameter->getValue();
                } elseif ($parameter instanceof \DateTimeInterface) {
                    $parameter = Carbon::instance($parameter)->toDateString();
                }

                $xml->setAttribute($name, $parameter);
            }
        }

        return $xml;
    }
}
