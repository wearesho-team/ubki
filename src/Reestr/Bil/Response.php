<?php

namespace Wearesho\Bobra\Ubki\Reestr\Bil;

use Wearesho\Bobra\Ubki\Reestr;

/**
 * Class Response
 *
 * @package Wearesho\Bobra\Ubki\Reestr\Bil
 */
class Response extends Reestr\Response implements ResponseInterface
{
    use ResponseTrait;

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
        int $al,
        int $nw,
        int $ed,
        int $er,
        int $db,
        int $lb,
        int $dl
    ){
        $this->al = $al;
        $this->nw = $nw;
        $this->ed = $ed;
        $this->er = $er;
        $this->db = $db;
        $this->lb = $lb;
        $this->dl = $dl;

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
}
