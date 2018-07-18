<?php

namespace Wearesho\Bobra\Ubki\Block;

use Wearesho\Bobra\Ubki\Collection;

/**
 * Class Technical
 * @package Wearesho\Bobra\Ubki\Block
 */
class Technical
{
    public const TAG = 'tech';

    /** @var Collection\Step */
    protected $steps;

    /**
     * Out UBKI's id
     * reqid attribute
     * @var string
     */
    protected $requestId;

    /** @var Balance */
    protected $balance;

    /**
     * Technical constructor.
     *
     * @param Collection\Step $steps
     * @param string          $requestId
     * @param Balance         $balance
     */
    public function __construct(
        Collection\Step $steps,
        string $requestId,
        Balance $balance
    ) {
        $this->steps = $steps;
        $this->requestId = $requestId;
        $this->balance = $balance;
    }

    public function getSteps(): Collection\Step
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
