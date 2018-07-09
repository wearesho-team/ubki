<?php

namespace Wearesho\Bobra\Ubki\Push\Registry;

/**
 * Interface RequestInterface
 *
 * @package Wearesho\Bobra\Ubki\Push\Registry
 */
interface RequestInterface
{
    public const TYPE_BIL = 'BIL';
    public const TYPE_REP = 'REP';

    public const TAG_ROOT = 'doc';
    public const TAG_PROT = 'prot';
    public const ATTR_TODO = 'todo';
    public const ATTR_INDATE = 'indate';
    public const ATTR_IDOUT = 'idout';
    public const ATTR_IDALIEN = 'idalien';
    public const ATTR_SESSID = 'sessid';

    /**
     * Type of request
     *
     * @return string
     */
    public function getTodo(): string;

    /**
     * Date of the operational day
     * format: Ymd
     *
     * @return \DateTimeInterface
     */
    public function getIndate(): \DateTimeInterface;

    /**
     * Id from UBKI request
     *
     * @return string
     */
    public function getIdout(): string;

    /**
     * Id from partner request
     *
     * @return string
     */
    public function getIdalien(): string;
}
