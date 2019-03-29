<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

use Wearesho\Bobra\Ubki\Data\Block;

/**
 * Trait DataDocumentTrait
 * @package Wearesho\Bobra\Ubki\Push\Export
 */
trait DataDocumentTrait
{
    /** @var Block\Identification */
    protected $identification;

    /** @var Block\CreditsInformation */
    protected $creditDeals;

    /** @var Block\CourtDecisionsInformation|null */
    protected $courtDecisions;

    /** @var Block\CreditsRequestsInformation|null */
    protected $creditRequests;

    /** @var Block\ContactsInformation */
    protected $contacts;

    public function getIdentification(): Block\Identification
    {
        return $this->identification;
    }

    public function getCreditDeals(): Block\CreditsInformation
    {
        return $this->creditDeals;
    }

    public function getCourtDecisions(): ?Block\CourtDecisionsInformation
    {
        return $this->courtDecisions;
    }

    public function getCreditRequests(): ?Block\CreditsRequestsInformation
    {
        return $this->creditRequests;
    }

    public function getContacts(): Block\ContactsInformation
    {
        return $this->contacts;
    }
}
