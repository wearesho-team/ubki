<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

use Wearesho\Bobra\Ubki\Blocks;
use Wearesho\Bobra\Ubki\ElementInterface;

/**
 * Interface DataDocumentInterface
 * @package Wearesho\Bobra\Ubki\Push\Export
 */
interface DataDocumentInterface extends ElementInterface
{
    public const TAG = 'ubkidata';

    public function getIdentification(): Blocks\Identification;

    public function getCreditDeals(): ?Blocks\CreditsInformation;

    public function getCourtDecisions(): ?Blocks\CourtDecisionsInformation;

    public function getCreditRequests(): ?Blocks\CreditsRegistersInformation;

    public function getInsuranceReports(): ?Blocks\InsurancesInformation;

    public function getContacts(): ?Blocks\ContactsInformation;
}
