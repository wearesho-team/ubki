<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

use Wearesho\Bobra\Ubki\Blocks;

/**
 * Trait DataDocumentTrait
 * @package Wearesho\Bobra\Ubki\Push\Export
 */
trait DataDocumentTrait
{
    protected $tech;

    /** @var Blocks\Identification */
    protected $identification;

    /** @var Blocks\CreditsInformation|null */
    protected $creditDeals;

    /** @var Blocks\CourtDecisionsInformation|null */
    protected $courtDecisions;

    /** @var Blocks\CreditsRegistersInformation|null */
    protected $creditRequests;

    /** @var Blocks\InsurancesInformation|null */
    protected $insuranceReports;

    /** @var Blocks\ContactsInformation|null */
    protected $contacts;

    protected $communalPayments;

    public function getTech()
    {
        return $this->tech;
    }

    public function getIdentification(): Blocks\Identification
    {
        return $this->identification;
    }

    public function getCreditDeals(): ?Blocks\CreditsInformation
    {
        return $this->creditDeals;
    }

    public function getCourtDecisions(): ?Blocks\CourtDecisionsInformation
    {
        return $this->courtDecisions;
    }

    public function getCreditRequests(): ?Blocks\CreditsRegistersInformation
    {
        return $this->creditRequests;
    }

    public function getInsuranceReports(): ?Blocks\InsurancesInformation
    {
        return $this->insuranceReports;
    }

    public function getContacts(): ?Blocks\ContactsInformation
    {
        return $this->contacts;
    }

    public function getCommunalPayments()
    {
        return $this->communalPayments;
    }
}
