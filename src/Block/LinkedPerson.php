<?php

namespace Wearesho\Bobra\Ubki\Block;

use Wearesho\Bobra\Ubki\BaseBlock;

/**
 * Class LinkedPerson
 * @package Wearesho\Bobra\Ubki\Block
 */
class LinkedPerson extends BaseBlock
{
    // attributes
    public const OKPO = 'okpo2';
    public const OKPO_NAME = 'okpo2_name';
    public const LINK_ROLE = 'linkrole';
    public const DATE = 'rdate';
    
    /**
     * INN/ERGPOU of linked person
     * @var int|null
     */
    protected $okpo;

    /**
     * Fio / Name of related person
     * @var string
     */
    protected $okpoName;

    /** @var int */
    protected $linkRole;

    /**
     * Date when the connection became relevant
     * @var \DateTimeInterface
     */
    protected $date;

    public function __construct(
        string $okpoName, 
        int $linkRole, 
        \DateTimeInterface $date,
        ?int $okpo = null
    ) {
        $this->okpo = $okpo;
        $this->okpoName = $okpoName;
        $this->linkRole = $linkRole;
        $this->date = $date;
    }

    public function tag(): string
    {
        return 'linked';
    }

    public function getOkpo(): ?int
    {
        return $this->okpo;
    }

    public function getOkpoName(): string
    {
        return $this->okpoName;
    }

    public function getLinkRole(): int
    {
        return $this->linkRole;
    }

    public function getDate(): \DateTimeInterface
    {
        return $this->date;
    }
}
