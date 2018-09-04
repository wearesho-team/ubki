<?php

namespace Wearesho\Bobra\Ubki\Tests\Pull;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Blocks\Entities\RequestData;
use Wearesho\Bobra\Ubki\Pull;
use Wearesho\Bobra\Ubki\References;

/**
 * Class RequestTest
 * @package Wearesho\Bobra\Ubki\Tests\Pull
 * @coversDefaultClass Pull\Request
 * @internal
 */
class RequestTest extends TestCase
{
    protected const DATE = '2018-03-12';
    protected const ID = 'testId';
    protected const INN = 'testInn';

    /** @var Pull\Request */
    protected $fakeRequest;

    protected function setUp(): void
    {
        $this->fakeRequest = new Pull\Request(
            new RequestData(
                References\RequestType::CREDIT_REPORT(),
                References\RequestReason::OTHER_SERVICES(),
                Carbon::parse(static::DATE),
                static::ID,
                References\RequestInitiator::PARTNER()
            ),
            new Pull\IdentificationData(
                References\Language::RUS(),
                static::INN
            )
        );
    }

    public function testGetBody(): void
    {
        $this->assertEquals(
            new Pull\IdentificationData(
                References\Language::RUS(),
                static::INN
            ),
            $this->fakeRequest->getBody()
        );
    }

    public function testGetHead(): void
    {
        $this->assertEquals(
            new RequestData(
                References\RequestType::CREDIT_REPORT(),
                References\RequestReason::OTHER_SERVICES(),
                Carbon::parse(static::DATE),
                static::ID,
                References\RequestInitiator::PARTNER()
            ),
            $this->fakeRequest->getHead()
        );
    }
}
