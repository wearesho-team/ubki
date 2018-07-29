<?php

namespace Wearesho\Bobra\Ubki\Push;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki\Data;

/**
 * Class Parser
 * @package Wearesho\Bobra\Ubki\Push
 */
class Parser
{
    public function parseResponse(string $xml)
    {
        $document = simplexml_load_string($xml);

        $stepsXml = $document
            ->{Tag::EXPORT_ROOT}
            ->trace
            ->step;
        $stepCollection = new Data\Step\Collection();

        foreach ($stepsXml as $stepXml) {
            $attributes = $stepXml->attributes();
            $stepCollection->append(new Data\Step\Entity(
                (string)$attributes['name'],
                Carbon::parse($attributes['stm']),
                Carbon::parse($attributes['ftm'])
            ));
        }
    }
}
