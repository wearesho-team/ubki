<?php

namespace Wearesho\Bobra\Ubki\Push\Registry;

use Wearesho\Bobra\Ubki\Push;

/**
 * Interface ResponseInterface
 * @package Wearesho\Bobra\Ubki\Push\Registry
 */
interface ResponseInterface
{
    /**
     * Type of request
     *
     * @return string
     */
    public function getType(): string;

    /**
     * Date of the operational day
     * format: Ymd
     *
     * @return \DateTimeInterface
     */
    public function getExportDate(): \DateTimeInterface;

    /**
     * Id from UBKI request
     *
     * @return string
     */
    public function getUbkiId(): string;

    /**
     * Id from partner request
     *
     * @return string
     */
    public function getPartnerId(): string;

    /**
     * Authorization session key
     *
     * @return string
     */
    public function getSessionId(): string;

    /**
     * State of sent report
     *
     * @return Response\State
     */
    public function getState(): Response\State;

    /**
     * Transmission operation type
     * Is specified when the request tag is passed in the reqtype attribute of the request
     *
     * @return Push\Export\Request\Type
     */
    public function getOperationType(): Push\Export\Request\Type;

    /**
     * Id of component
     * see specification
     *
     * @return int
     */
    public function getBlockId(): int;

    /**
     * Subcomponent
     *
     * @return string
     */
    public function getItem(): string;
}
