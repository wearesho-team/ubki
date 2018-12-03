<?php

namespace Wearesho\Bobra\Ubki\Push\Registry;

/**
 * Interface Type
 * @package Wearesho\Bobra\Ubki\Push\Registry
 */
interface Type
{
    /**
     * Billing (getting the values of counters in the "Total", "New", "Corrected", "Errors", "Global duplicates",
     * "Local duplicates", "Deleted")
     */
    public const BIL = 'BIL';
    /**
     * Registry (receiving the registry of messages and errors).
     */
    public const REP = 'REP';
}
