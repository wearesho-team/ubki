<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Dictionaries;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Dictionaries\RequestTemplate;

/**
 * Class RequestTemplateTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Dictionaries
 * @coversDefaultClass RequestTemplate
 * @internal
 */
class RequestTemplateTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(RequestTemplate::LEGAL(), new RequestTemplate(RequestTemplate::LEGAL));
        $this->assertEquals(RequestTemplate::IDENTIFICATION(), new RequestTemplate(RequestTemplate::IDENTIFICATION));
        $this->assertEquals(RequestTemplate::AFS(), new RequestTemplate(RequestTemplate::AFS));
        $this->assertEquals(RequestTemplate::BILLS(), new RequestTemplate(RequestTemplate::BILLS));
        $this->assertEquals(RequestTemplate::CONTACTS(), new RequestTemplate(RequestTemplate::CONTACTS));
        $this->assertEquals(
            RequestTemplate::INDIVIDUAL_SCORING(),
            new RequestTemplate(RequestTemplate::INDIVIDUAL_SCORING)
        );
        $this->assertEquals(RequestTemplate::LEGAL_PRIVAT(), new RequestTemplate(RequestTemplate::LEGAL_PRIVAT));
        $this->assertEquals(RequestTemplate::MVD(), new RequestTemplate(RequestTemplate::MVD));
        $this->assertEquals(
            RequestTemplate::PHOTO_VERIFICATION(),
            new RequestTemplate(RequestTemplate::PHOTO_VERIFICATION)
        );
        $this->assertEquals(RequestTemplate::PRIVAT(), new RequestTemplate(RequestTemplate::PRIVAT));
        $this->assertEquals(RequestTemplate::RATING(), new RequestTemplate(RequestTemplate::RATING));
        $this->assertEquals(RequestTemplate::STANDARD(), new RequestTemplate(RequestTemplate::STANDARD));
    }
}
