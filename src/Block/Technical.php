<?php

namespace Wearesho\Bobra\Ubki\Block;

use Wearesho\Bobra\Ubki;

/**
 * Class Technical
 * @package Wearesho\Bobra\Ubki\Block
 */
class Technical extends Ubki\BaseBlock
{
    // attribute
    public const REQUEST_ID = 'reqid';

    /** @var Ubki\Collection\Step */
    protected $steps;

    /**
     * Out UBKI's id
     * @var string
     */
    protected $requestId;

    /** @var Balance */
    protected $balance;

    public function __construct(
        Ubki\Collection\Step $steps,
        string $requestId,
        Balance $balance
    ) {
        $this->steps = $steps;
        $this->requestId = $requestId;
        $this->balance = $balance;
    }

    public function tag(): string
    {
        return 'tech';
    }

    public function getSteps(): Ubki\Collection\Step
    {
        return $this->steps;
    }

    public function getRequestId(): string
    {
        return $this->requestId;
    }

    public function getBalance(): Balance
    {
        return $this->balance;
    }
}
