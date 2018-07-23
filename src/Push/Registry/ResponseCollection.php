<?php

namespace Wearesho\Bobra\Ubki\Push\Registry;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Push\Registry;

/**
 * Class ResponseCollection
 *
 * @package Wearesho\Bobra\Ubki\Push\Registry
 */
class ResponseCollection extends \ArrayObject implements \JsonSerializable
{
    public function __construct(string $xml)
    {
        $reports = $this->fetchReports($xml);
        $responseType = $reports[0]->attributes()[Registry\Rep\Attribute::TYPE];

        switch ($responseType) {
            case Type::REP:
                $responses = array_map(function (\SimpleXMLElement $report): Registry\Rep\Response {
                    $attributes = $report->attributes();

                    return new Rep\Response(
                        Carbon::parse((string)$attributes[Registry\Rep\Attribute::EXPORT_DATE]),
                        (string)$attributes[Registry\Rep\Attribute::UBKI_ID],
                        (string)$attributes[Registry\Rep\Attribute::PARTNER_ID],
                        (string)$attributes[Registry\Rep\Attribute::SESSION_ID],
                        Registry\Response\State::instanceByValue((string)$attributes[Registry\Rep\Attribute::STATE]),
                        Registry\Response\OperationType::instanceByValue(
                            (string)$attributes[Registry\Rep\Attribute::OPERATION_TYPE]
                        ),
                        (int)$attributes[Registry\Rep\Attribute::BLOCK_ID],
                        (string)$attributes[Registry\Rep\Attribute::ITEM],
                        (string)$attributes[Registry\Rep\Attribute::REGISTRY_TYPE],
                        (string)$attributes[Registry\Rep\Attribute::ERROR],
                        (int)$attributes[Registry\Rep\Attribute::INN],
                        (string)$attributes[Registry\Rep\Attribute::REMARK]
                    );
                }, $reports);

                break;
            case Type::BIL: // TODO: need implement Bil request
            default:
                throw new \InvalidArgumentException("Unsupported response type: {$responseType}");
        }

        parent::__construct($responses);
    }

    /**
     * @param ResponseInterface $value
     */
    public function append($value)
    {
        $this->checkItem($value);
        parent::append($value);
    }

    /**
     * @param mixed             $index
     * @param ResponseInterface $newval
     */
    public function offsetSet($index, $newval)
    {
        $this->checkItem($newval);
        parent::offsetSet($index, $newval);
    }

    /**
     * @inheritdoc
     */
    public function jsonSerialize()
    {
        return (array)$this;
    }

    /**
     * @param mixed $value
     */
    public static function checkItem($value): void
    {
        if (!$value instanceof ResponseInterface) {
            throw new \InvalidArgumentException(
                'All items have to be instance of ' . ResponseInterface::class
            );
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
