<?php

namespace Wearesho\Bobra\Ubki\Authorization;

use Carbon\Carbon;
use Psr\Http;

/**
 * Class Response
 * @package Wearesho\Bobra\Ubki\Authorization
 */
class Response
{
    /** @var string */
    protected $sessionId;
    /** @var Carbon|null */
    protected $createdAt;
    /** @var Carbon|null */
    protected $updatedAt;
    /** @var string */
    protected $login;
    /** @var int */
    protected $user;
    /** @var string */
    protected $lastName;
    /** @var string */
    protected $firstName;
    /** @var string */
    protected $middleName;
    /** @var int */
    protected $group;
    /** @var string */
    protected $groupName;
    /** @var int */
    protected $organization;
    /** @var string */
    protected $organizationName;

    /** @var Http\Message\ResponseInterface */
    protected $response;

    /** @var Http\Message\RequestInterface */
    protected $request;

    public function __construct(
        string $sessionId,
        ?Carbon $created,
        ?Carbon $updated,
        string $login,
        int $user,
        string $lastName,
        string $firstName,
        string $middleName,
        int $group,
        string $groupName,
        int $organization,
        string $organizationName,
        Http\Message\ResponseInterface $response,
        Http\Message\RequestInterface $request
    ) {
        $this->sessionId = $sessionId;
        $this->createdAt = $created;
        $this->updatedAt = $updated;
        $this->login = $login;
        $this->user = $user;
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->middleName = $middleName;
        $this->group = $group;
        $this->groupName = $groupName;
        $this->organization = $organization;
        $this->organizationName = $organizationName;
        $this->response = $response;
        $this->request = $request;
    }

    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    public function getCreatedAt(): ?Carbon
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?Carbon
    {
        return $this->updatedAt;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function getUser(): int
    {
        return $this->user;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getMiddleName(): string
    {
        return $this->middleName;
    }

    public function getGroup(): int
    {
        return $this->group;
    }

    public function getGroupName(): string
    {
        return $this->groupName;
    }

    public function getOrganization(): int
    {
        return $this->organization;
    }

    public function getOrganizationName(): string
    {
        return $this->organizationName;
    }

    public function getResponse(): Http\Message\ResponseInterface
    {
        return $this->response;
    }

    public function getRequest(): Http\Message\RequestInterface
    {
        return $this->request;
    }
}
