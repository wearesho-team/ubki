<?php

namespace Wearesho\Bobra\Ubki\Reestr\Bil;

use Wearesho\Bobra\Ubki\Reestr;

/**
 * Interface ResponseInterface
 *
 * @package Wearesho\Bobra\Ubki\Reestr\Bil
 */
interface ResponseInterface extends Reestr\ResponseInterface
{
    /**
     * Count of all transferred version
     *
     * @return int
     */
    public function getAl(): int;

    /**
     * Count of new versions
     *
     * @return int
     */
    public function getNw(): int;

    /**
     * Count of modified versions
     *
     * @return int
     */
    public function getEd(): int;

    /**
     * Count of errors in versions
     *
     * @return int
     */
    public function getEr(): int;

    /**
     * Count of versions-duplicates on the basis of a bureau
     *
     * @return int
     */
    public function getDb(): int;

    /**
     * Count of duplicate versions in the transmitted packet
     *
     * @return int
     */
    public function getLb(): int;

    /**
     * Count of removed versions from the bureau's database
     *
     * @return int
     */
    public function getDl(): int;
}
