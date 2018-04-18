<?php

namespace Wearesho\Bobra\Ubki\Tests\Authorization;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki;

/**
 * Class ResponseTest
 * @package Wearesho\Bobra\Ubki\Tests\Authorization
 */
class ResponseTest extends TestCase
{
    /** @var Ubki\Authorization\Response */
    protected $response;

    /**
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        $this->response = new Ubki\Authorization\Response(
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
    }

    /**
     * @return void
     */
    public function testGets()
    {
        $this->assertEquals(200, $this->response->getSessionId());

        $this->assertEquals("login_string", $this->response->getLogin());

        $this->assertEquals(12, $this->response->getUser());

        $this->assertEquals("lastname_string", $this->response->getLastName());

        $this->assertEquals("firstname_string", $this->response->getFirstName());

        $this->assertEquals("middlename_string", $this->response->getMiddleName());

        $this->assertEquals(9, $this->response->getGroup());

        $this->assertEquals("nine_group", $this->response->getGroupName());

        $this->assertEquals(23, $this->response->getOrganization());

        $this->assertEquals("the 23th org", $this->response->getOrganizationName());

        $this->assertEquals(Carbon::parse('2017-01-01 04:00:01'), $this->response->getCreatedAt());

        $this->assertEquals(Carbon::parse('2017-01-01 04:15:01'), $this->response->getUpdatedAt());
    }
}
