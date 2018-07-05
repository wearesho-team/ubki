<?php

namespace Wearesho\Bobra\Ubki\Reestr\Rep;

use Wearesho\Bobra\Ubki\Reestr;

/**
 * Class Response
 *
 * @package Wearesho\Bobra\Ubki\Reestr\Rep
 */
class Response extends Reestr\Response implements ResponseInterface
{
    use ResponseTrait;

    const ERROR_CRITICAL = 'CRITICAL';
    const ERROR_NOTICE = 'NOTICE';

    public function __construct(
        string $todo,
        \DateTimeInterface $indate,
        string $idout,
        string $idalien,
        string $sessid,
        string $state,
        string $oper,
        int $compid,
        string $item,
        string $ertype,
        string $crytical,
        int $inn,
        string $remark
    ) {
        $this->ertype = $ertype;
        $this->crytical = $crytical;
        $this->inn = $inn;
        $this->remark = $remark;

        parent::__construct(
            $todo,
            $indate,
            $idout,
            $idalien,
            $sessid,
            $state,
            $oper,
            $compid,
            $item
        );
    }

    public function isErrorCritical(): bool
    {
        return $this->ertype === static::ERROR_CRITICAL;
    }

    public function isErrorNotice(): bool
    {
        return $this->ertype === static::ERROR_NOTICE;
    }
}