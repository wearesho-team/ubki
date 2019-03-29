<?php

namespace Wearesho\Bobra\Ubki\Push;

use Wearesho\Bobra\Ubki\Push\Error;
use Wearesho\Bobra\Ubki\SimpleXmlToArray;

/**
 * Class Parser
 * @package Wearesho\Bobra\Ubki\Push
 * @deprecated
 * @see \Wearesho\Bobra\Ubki\Push\Export\Parser
 */
class Parser
{
    use SimpleXmlToArray;

    public function parseErrors(string $responseXml): Error\Collection
    {
        return new Error\Collection(array_map(
            function (\SimpleXMLElement $item): Error\Entity {
                $attributes = $item->attributes();

                return new Error\Entity(
                    (int)$attributes[Error\Entity::ATTR_BLOCK_ID],
                    (string)$attributes[Error\Entity::ATTR_TAG],
                    (string)$attributes[Error\Entity::ATTR_ATTRIBUTE],
                    (string)$attributes[Error\Entity::ATTR_TYPE],
                    (string)$attributes[Error\Entity::ATTR_MESSAGE],
                    empty((string)$attributes[Error\Entity::PASSED_STRINGS])
                        ? null
                        : (int)$attributes[Error\Entity::PASSED_STRINGS],
                    empty((string)$attributes[Error\Entity::ERROR_STRINGS])
                        ? null
                        : (int)$attributes[Error\Entity::ERROR_STRINGS]
                );
            },
            $this->fetchItems($responseXml)
        ));
    }

    /**
     * @param string $body
     *
     * @return \SimpleXMLElement[]
     */
    private function fetchItems(string $body): array
    {
        return $this->simpleXmlToArray(
            simplexml_load_string($body)
                ->{Error\Entity::ROOT}
                ->{Error\Entity::PARENT_TAG}
                ->{Error\Entity::TAG}
        );
    }
}
