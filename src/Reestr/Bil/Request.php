<?php

namespace Wearesho\Bobra\Ubki\Reestr\Bil;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki\Reestr;

class Request extends Reestr\Request implements RequestInterface
{
    use RequestTrait;

    const GROUP_PACK = 'PACK';
    const GROUP_COMP = 'COMP';
    const GROUP_ITEM = 'ITEM';

    public function __construct(
        string $grp,
        \DateTimeInterface $indate,
        string $idout = "",
        string $idalien = ""
    ) {
        if (!$this->validateGroup($grp)) {
            throw new \InvalidArgumentException("Grouping type have invalid value!");
        }

        $this->grp = $grp;

        if (!$this->validateIndate($indate)) {
            throw new \InvalidArgumentException("Indate have invalid format!");
        }

        parent::__construct(
            static::TYPE_BIL,
            $indate,
            $idout,
            $idalien
        );
    }

    private function validateGroup(string $group): bool
    {
        return
            $group !== static::GROUP_PACK ||
            $group !== static::GROUP_COMP ||
            $group !== static::GROUP_ITEM;
    }

    private function validateIndate(\DateTimeInterface $indate): bool
    {
        return Carbon::instance($indate)->notEqualTo($indate);
    }
}
