<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

use Wearesho\Bobra\Ubki\Data\Blocks;

/**
 * Trait DataDocumentTrait
 * @package Wearesho\Bobra\Ubki\Push\Export
 */
trait DataDocumentTrait
{
    /** @var Blocks\Identification */
    protected $identification;

    /** @var Blocks\CreditsInformation */
    protected $creditDeals;

    /** @var Blocks\CourtDecisionsInformation|null */
    protected $courtDecisions;

    /** @var Blocks\CreditsRequestsInformation|null */
    protected $creditRequests;

    /** @var Blocks\ContactsInformation */
    protected $contacts;

    public function jsonSerialize(): array
    {
        return [
            'identification' => $this->identification->jsonSerialize(),
            'creditsInformation' => $this->creditDeals->jsonSerialize(),
            'courtDecisionsInformation' => $this->courtDecisions->jsonSerialize(),
            'creditRequestsInformation' => $this->creditRequests->jsonSerialize(),
            'contactsInformation' => $this->contacts->jsonSerialize(),
        ];
    }

    public function tag(): string
    {
        return DataDocumentInterface::TAG;
    }

    public function getIdentification(): Blocks\Identification
    {
        return $this->identification;
    }

    public function getCreditDeals(): Blocks\CreditsInformation
    {
        return $this->creditDeals;
    }

    public function getCourtDecisions(): ?Blocks\CourtDecisionsInformation
    {
        return $this->courtDecisions;
    }

    public function getCreditRequests(): ?Blocks\CreditsRequestsInformation
    {
        return $this->creditRequests;
    }

    public function getContacts(): Blocks\ContactsInformation
    {
        return $this->contacts;
    }
}
