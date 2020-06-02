<?php

namespace Wearesho\Bobra\Ubki\Tests\Authorization;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Tests\TestCase;

use Wearesho\Bobra\Ubki;

/**
 * Class ResponseTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Authorization
 */
class ResponseTest extends TestCase
{
    public function testGets(): void
    {
        $response = new Ubki\Authorization\Response(
            200,
            Carbon::parse('2017-01-01 04:00:01'),
            Carbon::parse('2017-01-01 04:15:01'),
            "login_string",
            12,
            "lastname_string",
            "firstname_string",
            "middlename_string",
            9,
            "nine_group",
            23,
            "the 23th org"
        );

        $this->assertEquals(200, $response->getSessionId());

        $this->assertEquals("login_string", $response->getLogin());

        $this->assertEquals(12, $response->getUser());

        $this->assertEquals("lastname_string", $response->getLastName());

        $this->assertEquals("firstname_string", $response->getFirstName());

        $this->assertEquals("middlename_string", $response->getMiddleName());

        $this->assertEquals(9, $response->getGroup());

        $this->assertEquals("nine_group", $response->getGroupName());

        $this->assertEquals(23, $response->getOrganization());

        $this->assertEquals("the 23th org", $response->getOrganizationName());

        $this->assertEquals(Carbon::parse('2017-01-01 04:00:01'), $response->getCreatedAt());

        $this->assertEquals(Carbon::parse('2017-01-01 04:15:01'), $response->getUpdatedAt());
    }
}
