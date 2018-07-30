<?php

namespace Wearesho\Bobra\Ubki\Push\Registry;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Push\Registry\Rep;

/**
 * Class Parser
 * @package Wearesho\Bobra\Ubki\Push\Registry
 */
class Parser
{
    /**
     * @param string $response
     *
     * @return ResponseCollection|Rep\Response[]
     * @throws \Exception
     */
    public function parseResponses(string $response): ResponseCollection
    {
        $reports = $this->fetchReports($response);

        if (count($reports) < 1) {
            throw new \InvalidArgumentException(
                "String have invalid content. Count of reports < 1;\nresponse body: {$response}"
            );
        }

        $responseType = $reports[0]->attributes()[Rep\Attribute::TYPE];

        switch ($responseType) {
            case Type::REP:
                return new ResponseCollection(array_map(function (\SimpleXMLElement $report): Rep\Response {
                    $attributes = $report->attributes();

                    return new Rep\Response(
                        Carbon::parse((string)$attributes[Rep\Attribute::EXPORT_DATE]),
                        (string)$attributes[Rep\Attribute::UBKI_ID],
                        (string)$attributes[Rep\Attribute::PARTNER_ID],
                        (string)$attributes[Rep\Attribute::SESSION_ID],
                        new Response\State((string)$attributes[Rep\Attribute::STATE]),
                        new Response\OperationType(
                            (string)$attributes[Rep\Attribute::OPERATION_TYPE]
                        ),
                        (int)$attributes[Rep\Attribute::BLOCK_ID],
                        (string)$attributes[Rep\Attribute::ITEM],
                        (string)$attributes[Rep\Attribute::REGISTRY_TYPE],
                        (string)$attributes[Rep\Attribute::ERROR],
                        (string)$attributes[Rep\Attribute::INN],
                        (string)$attributes[Rep\Attribute::REMARK]
                    );
                }, $reports));
            case Type::BIL: // TODO: need implement Bil request
            default:
                throw new \InvalidArgumentException("Unsupported response type: {$responseType}");
        }
    }

    /**
     * @param string $body
     *
     * @return \SimpleXMLElement[]
     */
    private function fetchReports(string $body): array
    {
        $reports = [];
        $xml = simplexml_load_string($body);
        $xmlReports = $xml->{Tag::REPORT};

        foreach ($xmlReports as $xmlReport) {
            $reports[] = $xmlReport;
        }

        return $reports;
    }
}
