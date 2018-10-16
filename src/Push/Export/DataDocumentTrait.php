<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

use Wearesho\Bobra\Ubki\Blocks;
use Wearesho\Bobra\Ubki\ElementTrait;

/**
 * Trait DataDocumentTrait
 * @package Wearesho\Bobra\Ubki\Push\Export
 */
trait DataDocumentTrait
{
    use ElementTrait;

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

    public function jsonSerialize(): array
    {
        return [
            'identification' => $this->identification->jsonSerialize(),
            'creditsInformation' => $this->creditDeals ? $this->creditDeals->jsonSerialize() : null,
            'courtDecisionsInformation' => $this->courtDecisions ? $this->courtDecisions->jsonSerialize() : null,
            'creditRequestsInformation' => $this->creditRequests ? $this->creditRequests->jsonSerialize() : null,
            'insuranceReportsInformation' => $this->insuranceReports ? $this->insuranceReports->jsonSerialize() : null,
            'contactsInformation' => $this->contacts ? $this->contacts->jsonSerialize() : null,
        ];
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
}
