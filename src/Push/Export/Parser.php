<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

use Horat1us\SimpleXML\Parse;
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
        $xml = Parse::string($response)->{ResponseInterface::ROOT};
        $state = $xml->{ResponseInterface::ERROR_COLLECTION};
        $internalErrors = $xml->{ResponseInterface::INTERNAL_TAG};

        return new Response(
            (string)$state[ResponseInterface::ID],
            (string)$state[ResponseInterface::STATUS],
            (string)$internalErrors[ResponseInterface::INTERNAL_ERROR],
            (string)$internalErrors[ResponseInterface::INTERNAL_MESSAGE],
            new Ubki\Push\Error\Collection(\array_map(function (\SimpleXMLElement $error) {
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
