<?php

namespace Wearesho\Bobra\Ubki\Pull;

use Wearesho\Bobra\Ubki;

/**
 * Class Request
 * @package Wearesho\Bobra\Ubki\Pull
 */
class Request extends Ubki\Element implements RequestInterface
{
    use RequestTrait;

    public const TAG = 'doc';

    public function __construct(
        Ubki\Data\Interfaces\RequestData $requestData,
        Element\RequestContentInterface $content
    ) {
        // todo: wrap into validate() function
        if ($requestData->getReason()->equals(Ubki\Dictionary\RequestReason::REQUEST_ONLINE_CREDIT())) {
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
}
