<?php

namespace Wearesho\Bobra\Ubki\Push\Export\Request;

use Wearesho\Bobra\Ubki\Data;

/**
 * Class Content
 * @package Wearesho\Bobra\Ubki\Push\Export\Request
 */
class Body
{
    /** @var Data\Credential */
    protected $credential;

    /** @var Data\Collection\CreditDeal */
    protected $creditDeals;

    /** @var Data\Collection\Contact */
    protected $contacts;

    /** @var Data\Collection\CourtDecision */
    protected $courtDecisions;

    /** @var Data\Collection\CreditRequest */
    protected $creditRequests;

    /** @var Data\RegistryTimes|null */
    protected $registryTimes;

    public function __construct(
        Data\Credential $credential,
        Data\Collection\CreditDeal $creditDeals,
        Data\Collection\Contact $contacts,
        Data\Collection\CourtDecision $courtDecisions = null,
        Data\Collection\CreditRequest $creditRequests = null,
        Data\RegistryTimes $registryTimes = null
    ) {
        $this->credential = $credential;
        $this->creditDeals = $creditDeals;
        $this->contacts = $contacts;
        $this->courtDecisions = $courtDecisions ?? new Data\Collection\CourtDecision([]);
        $this->creditRequests = $creditRequests ?? new Data\Collection\CreditRequest([]);
        $this->registryTimes = $registryTimes;
    }

    public function getCredential(): Data\Credential
    {
        return $this->credential;
    }

    public function getCreditDeals(): Data\Collection\CreditDeal
    {
        return $this->creditDeals;
    }

    public function getCourtDecisions(): ?Data\Collection\CourtDecision
    {
        return $this->courtDecisions;
    }

    public function getCreditRequests(): ?Data\Collection\CreditRequest
    {
        return $this->creditRequests;
    }

    public function getContacts(): Data\Collection\Contact
    {
        return $this->contacts;
    }

    public function getRegistryTimes(): ?Data\RegistryTimes
    {
        return $this->registryTimes;
    }
}
