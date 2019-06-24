<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Data;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

/**
 * Class LinkedPerson
 * @package Wearesho\Bobra\Ubki\Data
 *
 * @method static LinkedPerson make(...$arguments)
 */
class LinkedPerson implements Ubki\Contract\Data\LinkedPerson, \JsonSerializable
{
    use Makeable, Tagable;

    /** @var string */
    protected $name;

    /** @var Ubki\Dictionary\LinkedIdentifierRole */
    protected $role;

    /** @var \DateTimeInterface */
    protected $issueDate;

    /** @var string|null */
    protected $egrpou;

    public function __construct(
        string $name,
        Ubki\Dictionary\LinkedIdentifierRole $role,
        \DateTimeInterface $issueDate,
        string $egrpou = \null
    ) {
        Ubki\Validator::OKPO_UNICODE()->validate($egrpou, \true);
        Ubki\Validator::JUST_TEXT_250()->validate($name);

        $this->name = $name;
        $this->role = $role;
        $this->issueDate = $issueDate;
        $this->egrpou = $egrpou;
    }

    public function jsonSerialize(): array
    {
        return [
            'name' => $this->name,
            'role' => $this->role,
            'issueDate' => Carbon::make($this->issueDate),
            'egrpou' => $this->egrpou,
        ];
    }

    public static function tag(): string
    {
        return 'linked';
    }

    public function getEgrpou(): ?string
    {
        return $this->egrpou;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getRole(): Ubki\Dictionary\LinkedIdentifierRole
    {
        return $this->role;
    }

    public function getIssueDate(): \DateTimeInterface
    {
        return $this->issueDate;
    }
}
