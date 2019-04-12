<?php

namespace Wearesho\Bobra\Ubki\Push;

use Horat1us\SimpleXML\Parse;
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
        return new Error\Collection(\array_map(
            function (\SimpleXMLElement $item): Error\Entity {
                return new Error\Entity(
                    (int)$item[Error\Entity::ATTR_BLOCK_ID],
                    (string)$item[Error\Entity::ATTR_TAG],
                    (string)$item[Error\Entity::ATTR_ATTRIBUTE],
                    (string)$item[Error\Entity::ATTR_TYPE],
                    (string)$item[Error\Entity::ATTR_MESSAGE],
                    empty((string)$item[Error\Entity::PASSED_STRINGS])
                        ? null
                        : (int)$item[Error\Entity::PASSED_STRINGS],
                    empty((string)$item[Error\Entity::ERROR_STRINGS])
                        ? null
                        : (int)$item[Error\Entity::ERROR_STRINGS]
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
            Parse::string($body)
                ->{Error\Entity::ROOT}
                ->{Error\Entity::PARENT_TAG}
                ->{Error\Entity::TAG}
        );
    }
}
