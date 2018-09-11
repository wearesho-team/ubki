<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

use Wearesho\Bobra\Ubki\Data\BLocks;
use Wearesho\Bobra\Ubki\Infrastructure\ElementInterface;

/**
 * Interface DataDocumentInterface
 * @package Wearesho\Bobra\Ubki\Push\Export
 */
interface DataDocumentInterface extends ElementInterface
{
    public const TAG = 'ubkidata';

    public function getTech(); // TODO: need implement

    public function getIdentification(): Blocks\Identification;

    public function getCreditDeals(): ?Blocks\CreditsInformation;

    public function getCourtDecisions(): ?Blocks\CourtDecisionsInformation;

    public function getCreditRequests(): ?Blocks\CreditsRegistersInformation;

    public function getContacts(): ?Blocks\ContactsInformation;
}
