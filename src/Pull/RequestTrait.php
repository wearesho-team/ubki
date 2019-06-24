<?php

namespace Wearesho\Bobra\Ubki\Pull;

use Wearesho\Bobra\Ubki;

/**
 * Trait RequestTrait
 * @package Wearesho\Bobra\Ubki\Pull
 */
trait RequestTrait
{
    /** @var Ubki\Data\RequestHead */
    protected $head;

    /** @var Element\RequestContentInterface */
    protected $body;

    public function getHead(): Ubki\Data\RequestHead
    {
        return $this->head;
    }

    public function getBody(): Element\RequestContentInterface
    {
        return $this->body;
    }

    protected function validateReason(
        Request\Head $requestData,
        Element\RequestContentInterface $content
    ): void {
        if ($requestData->getReason()->equals(Ubki\Dictionary\RequestReason::REQUEST_ONLINE_CREDIT())) {
            $identification = $content->getIdentification();

            if (\is_null($content->getContacts())
                || \is_null($content->getDocuments())
                || \is_null($identification->getName())
                || \is_null($identification->getPatronymic())
                || \is_null($identification->getSurname())
                || \is_null($identification->getBirthDate())
            ) {
                throw new \InvalidArgumentException(
                    "Contact, documents and identification attributes required if reason is REQUEST_ONLINE_CREDIT"
                );
            }
        }
    }
}
