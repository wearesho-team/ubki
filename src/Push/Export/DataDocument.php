<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

use Wearesho\Bobra\Ubki;

/**
 * Class DataDocument
 * @package Wearesho\Bobra\Ubki\Push\Export
 */
class DataDocument extends Ubki\Element implements DataDocumentInterface
{
    public const TAG = 'ubkidata';

    use DataDocumentTrait;

    public function __construct(
        Ubki\Data\Block\Identification $identification,
        Ubki\Data\Block\CreditsInformation $creditsInformation,
        Ubki\Data\Block\ContactsInformation $contacts,
        Ubki\Data\Block\CourtDecisionsInformation $courtDecisions = null,
        Ubki\Data\Block\CreditsRequestsInformation $creditRequests = null
    ) {
        $this->identification = $identification;
        $this->creditDeals = $creditsInformation;
        $this->courtDecisions = $courtDecisions;
        $this->creditRequests = $creditRequests;
        $this->contacts = $contacts;
    }
}
