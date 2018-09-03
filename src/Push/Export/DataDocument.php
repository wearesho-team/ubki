<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

use Wearesho\Bobra\Ubki\Blocks;

/**
 * Class DataDocument
 * @package Wearesho\Bobra\Ubki\Push\Export
 */
class DataDocument implements DataDocumentInterface
{
    use DataDocumentTrait;

    public function __construct(
        $tech,
        Blocks\Identification $identification,
        ?Blocks\CreditsInformation $creditDeals = null,
        ?Blocks\CourtDecisionsInformation $courtDecisions = null,
        ?Blocks\CreditsRegistersInformation $creditRequests = null,
        ?Blocks\InsurancesInformation $insuranceReports = null,
        ?Blocks\ContactsInformation $contacts = null,
        $communalPayments = null
    ) {
        $this->tech = $tech;
        $this->identification = $identification;
        $this->creditDeals = $creditDeals;
        $this->courtDecisions = $courtDecisions;
        $this->creditRequests = $creditRequests;
        $this->insuranceReports = $insuranceReports;
        $this->contacts = $contacts;
        $this->communalPayments = $communalPayments;
    }
}
