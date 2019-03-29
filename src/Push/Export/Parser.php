<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

use Wearesho\Bobra\Ubki;

/**
 * Class Parser
 * @package Wearesho\Bobra\Ubki\Push\Export
 */
class Parser
{
    use Ubki\SimpleXmlToArray;

    public function parseResponse(string $response): ResponseInterface
    {
        $xml = simplexml_load_string($response)->{ResponseInterface::ROOT};
        $stateAttributes = $xml->{ResponseInterface::ERROR_COLLECTION}->attributes();
        $internalErrorAttributes = $xml->{ResponseInterface::INTERNAL_TAG}->attributes();

        return new Response(
            (string)$stateAttributes[ResponseInterface::ID],
            (string)$stateAttributes[ResponseInterface::STATUS],
            (string)$internalErrorAttributes[ResponseInterface::INTERNAL_ERROR],
            (string)$internalErrorAttributes[ResponseInterface::INTERNAL_MESSAGE],
            new Ubki\Push\Error\Collection(array_map(function (\SimpleXMLElement $error) {
                $attributes = $error->attributes();

                return new Ubki\Push\Error\Entity(
                    (int)$attributes[Ubki\Push\Error\Entity::ATTR_BLOCK_ID],
                    (string)$attributes[Ubki\Push\Error\Entity::ATTR_TAG],
                    (string)$attributes[Ubki\Push\Error\Entity::ATTR_ATTRIBUTE],
                    (string)$attributes[Ubki\Push\Error\Entity::ATTR_TYPE],
                    (string)$attributes[Ubki\Push\Error\Entity::ATTR_MESSAGE],
                    (int)$attributes[Ubki\Push\Error\Entity::PASSED_STRINGS],
                    (int)$attributes[Ubki\Push\Error\Entity::ERROR_STRINGS]
                );
            }, $this->simpleXmlToArray($xml->{ResponseInterface::ERROR_COLLECTION}->{Ubki\Push\Error\Entity::TAG})))
        );
    }
}
