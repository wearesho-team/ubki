<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

use Wearesho\Bobra\Ubki;

/**
 * Interface DataDocumentInterface
 * @package Wearesho\Bobra\Ubki\Push\Export
 */
interface DataDocumentInterface extends Ubki\Infrastructure\ElementInterface
{
    public const TAG = 'ubkidata';

    public function getIdentification(): Ubki\Data\Blocks\Identification;

    public function getCreditDeals(): ?Ubki\Data\Blocks\CreditsInformation;

    public function getCourtDecisions(): ?Ubki\Data\Blocks\CourtDecisionsInformation;

    public function getCreditRequests(): ?Ubki\Data\Blocks\CreditsRegistersInformation;

    public function getContacts(): ?Ubki\Data\Blocks\ContactsInformation;
}
