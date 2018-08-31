<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

use Wearesho\Bobra\Ubki\Blocks;

/**
 * Interface DataDocumentInterface
 * @package Wearesho\Bobra\Ubki\Push\Export
 */
interface DataDocumentInterface
{
    public function getTech();

    public function getIdentification(): Blocks\Identification;

    public function getCreditDeals(): ?Blocks\CreditsInformation;

    public function getCourtDecisions(): ?Blocks\CourtDecisionsInformation;

    public function getCreditRequests(): ?Blocks\CreditsRegistersInformation;

    public function getInsuranceReports(): ?Blocks\InsurancesInformation;

    public function getContacts(): ?Blocks\ContactsInformation;

    public function getCommunalPayments();
}
