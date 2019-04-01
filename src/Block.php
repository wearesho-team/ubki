<?php

namespace Wearesho\Bobra\Ubki;

/**
 * Interface Block
 * @package Wearesho\Bobra\Ubki
 */
abstract class Block extends Element implements BlockInterface
{
    public const IDENTIFICATION = 1;
    public const CREDITS = 2;
    public const COURT_DECISIONS = 3;
    public const CREDIT_REQUESTS = 4;
    public const CONTACTS = 10;

    public const TAG = 'comp';
    public const ATTR_ID = 'id';

    public const ID = null;

    public function getId(): int
    {
        return static::ID;
    }
}
