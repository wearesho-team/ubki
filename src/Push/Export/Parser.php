<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

use Wearesho\Bobra\Ubki\Blocks\Collections\Steps;
use Wearesho\Bobra\Ubki\Blocks\Entities;
use Wearesho\Bobra\Ubki\SimpleXmlToArray;

/**
 * Class Parser
 * @package Wearesho\Bobra\Ubki\Push\Export
 */
class Parser
{
    use SimpleXmlToArray;

    public function parseResponse(string $response): ResponseInterface
    {
        $xml = simplexml_load_string($response)->{ResponseInterface::ROOT};
        $stateAttributes = $xml->{ResponseInterface::ERROR_COLLECTION}->attributes();
        $internalErrorAttributes = $xml->{ResponseInterface::INTERNAL_TAG}->attributes();

        return new Response(
            new Entities\Trace(
                new Steps(array_map(function (\SimpleXMLElement $step) {
                    $attributes = $step->attributes();

                    return new Entities\Step(
                        (string)$attributes[Entities\Step::NAME],
                        (string)$attributes[Entities\Step::START],
                        (string)$attributes[Entities\Step::END]
                    );
                }, $this->simpleXmlToArray($xml->{Entities\Trace::TAG}->{Entities\Step::TAG})))
            ),
            (string)$stateAttributes[ResponseInterface::ID],
            (string)$stateAttributes[ResponseInterface::STATUS],
            (string)$internalErrorAttributes[ResponseInterface::INTERNAL_ERROR],
            (string)$internalErrorAttributes[ResponseInterface::INTERNAL_MESSAGE],
            new ErrorCollection(array_map(function (\SimpleXMLElement $error) {
                $attributes = $error->attributes();

                return new Error(
                    (int)$attributes[Error::BLOCK_ID],
                    (string)$attributes[Error::ERRORED_TAG],
                    (string)$attributes[Error::ATTRIBUTE],
                    (string)$attributes[Error::TYPE],
                    (string)$attributes[Error::MESSAGE],
                    (int)$attributes[Error::PASSED_STRINGS],
                    (int)$attributes[Error::ERROR_STRINGS]
                );
            }, $this->simpleXmlToArray($xml->{ResponseInterface::ERROR_COLLECTION}->{Error::TAG})))
        );
    }
}
