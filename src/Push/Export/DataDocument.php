<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

use Wearesho\Bobra\Ubki\Data\Blocks;
use Wearesho\Bobra\Ubki\Infrastructure\Element;

/**
 * Class DataDocument
 * @package Wearesho\Bobra\Ubki\Push\Export
 */
class DataDocument extends Element implements DataDocumentInterface
{
    public const TAG = 'ubkidata';

    use DataDocumentTrait;

    public function __construct(
        Blocks\Identification $identification,
        Blocks\CreditsInformation $creditsInformation,
        Blocks\ContactsInformation $contacts,
        Blocks\CourtDecisionsInformation $courtDecisions = null,
        Blocks\CreditsRequestsInformation $creditRequests = null
    ) {
        $this->identification = $identification;
        $this->creditDeals = $creditsInformation;
        $this->courtDecisions = $courtDecisions;
        $this->creditRequests = $creditRequests;
        $this->contacts = $contacts;
    }
}
