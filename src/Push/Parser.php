<?php

namespace Wearesho\Bobra\Ubki\Push;

use Wearesho\Bobra\Ubki\Push\Error;

/**
 * Class Parser
 * @package Wearesho\Bobra\Ubki\Push
 */
class Parser
{
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

    private function fetchItems(string $body): array
    {
        $items = [];
        $xml = simplexml_load_string($body);
        $xmlItems = $xml->{Error\Entity::ROOT}
            ->{Error\Entity::PARENT_TAG}
            ->{Error\Entity::TAG};

        foreach ($xmlItems as $xmlItem) {
            $items[] = $xmlItem;
        }

        return $items;
    }
}
