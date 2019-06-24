<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Contract\Data;

use Wearesho\Bobra\Ubki;

/**
 * Interface Rate
 * @package Wearesho\Bobra\Ubki\Contract\Data
 */
interface Rate
{
    public function getScore(): Ubki\Contract\Data\Rate\Score;

    public function getDescription(): Ubki\Contract\Data\Rate\Description;

    public function getComments(): Ubki\Data\Collection\Comment;

    public function getPositiveFactors(): Ubki\Contract\Data\Rate\Factors\Positive;

    public function getNegativeFactors(): Ubki\Contract\Data\Rate\Factors\Negative;
}
