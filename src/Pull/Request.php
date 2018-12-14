<?php

namespace Wearesho\Bobra\Ubki\Pull;

use Wearesho\Bobra\Ubki;

/**
 * Class Request
 * @package Wearesho\Bobra\Ubki\Pull
 */
class Request extends Ubki\Infrastructure\Element implements RequestInterface
{
    public const TAG = 'doc';

    /** @var Ubki\Data\Elements\RequestData */
    protected $head;

    /** @var RequestContent */
    protected $body;

    public function __construct(Ubki\Data\Elements\RequestData $requestData, Request $content)
    {
        // todo: wrap into validate() function
        if ($requestData->getReason()->equals(Ubki\Dictionaries\RequestReason::REQUEST_ONLINE_CREDIT())) {
            $identification = $content->getIdentification();

            if (is_null($content->getContacts())
                || is_null($content->getDocuments())
                || is_null($identification->getName())
                || is_null($identification->getPatronymic())
                || is_null($identification->getSurname())
                || is_null($identification->getBirthDate())) {
                throw new \InvalidArgumentException(
                    "Contacts, documents and identification attributes must be not null if reason is CreditOnline"
                );
            }
        }

        $this->head = $requestData;
        $this->body = $content;
    }

    public function jsonSerialize(): array
    {
        return [];
    }

    public function getHead(): Ubki\Data\Interfaces\RequestData
    {
        return $this->head;
    }

    public function getBody(): RequestContent
    {
        return $this->body;
    }
}
