<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

use Wearesho\Bobra\Ubki;

/**
 * Interface DataDocumentInterface
 * @package Wearesho\Bobra\Ubki\Push\Export
 */
interface DataDocumentInterface extends Ubki\ElementInterface
{
    public function getIdentification(): Ubki\Data\Block\Identification;

    public function getCreditDeals(): ?Ubki\Data\Block\CreditsInformation;

    public function getCourtDecisions(): ?Ubki\Data\Block\CourtDecisionsInformation;

    public function getCreditRequests(): ?Ubki\Data\Block\CreditsRequestsInformation;

    public function getContacts(): ?Ubki\Data\Block\ContactsInformation;
}
