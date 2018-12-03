<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

use Wearesho\Bobra\Ubki\Data\Blocks;

/**
 * Class DataDocument
 * @package Wearesho\Bobra\Ubki\Push\Export
 */
class DataDocument implements DataDocumentInterface
{
    use DataDocumentTrait;

    public function __construct(
        Blocks\Identification $identification,
        Blocks\CreditsInformation $creditsInformation,
        Blocks\ContactsInformation $contacts,
        Blocks\CourtDecisionsInformation $courtDecisions = null,
        Blocks\CreditsRegistersInformation $creditRequests = null
    ) {
        $this->identification = $identification;
        $this->creditDeals = $creditsInformation;
        $this->courtDecisions = $courtDecisions;
        $this->creditRequests = $creditRequests;
        $this->contacts = $contacts;
    }
}
