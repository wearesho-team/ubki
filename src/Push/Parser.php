<?php

namespace Wearesho\Bobra\Ubki\Push;

/**
 * Class Parser
 * @package Wearesho\Bobra\Ubki\Push
 */
class Parser
{
    public function parseErrors(string $responseXml): ErrorCollection
    {
        return new ErrorCollection(array_map(
            function (\SimpleXMLElement $item): Error {
                $attributes = $item->attributes();

                return new Error(
                    (int)$attributes[Error::ATTR_BLOCK_ID],
                    (string)$attributes[Error::ATTR_TAG],
                    (string)$attributes[Error::ATTR_ATTRIBUTE],
                    (string)$attributes[Error::ATTR_TYPE],
                    (string)$attributes[Error::ATTR_MESSAGE],
                    empty((string)$attributes[Error::PASSED_STRINGS])
                        ? null
                        : (int)$attributes[Error::PASSED_STRINGS],
                    empty((string)$attributes[Error::ERROR_STRINGS])
                        ? null
                        : (int)$attributes[Error::ERROR_STRINGS]
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
        $items = [];
        $xml = simplexml_load_string($body);
        $xmlItems = $xml->{Error::ROOT}
            ->{Error::PARENT_TAG}
            ->{Error::TAG};

        foreach ($xmlItems as $xmlItem) {
            $items[] = $xmlItem;
        }

        return $items;
    }
}
