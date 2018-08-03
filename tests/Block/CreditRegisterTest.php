<?php

namespace Wearesho\Bobra\Ubki\Tests\Block;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Block;
use Wearesho\Bobra\Ubki\Data;

use PHPUnit\Framework\TestCase;

/**
 * Class CreditRegisterTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Block
 */
class CreditRegisterTest extends TestCase
{
    /** @var Block\CreditRegister */
    protected $creditRegisterComponent;

    public function testType(): void
    {
        $this->assertEquals(Block\CreditRegister::ID, $this->creditRegisterComponent->getId());
    }

    public function testGetCreditRequests(): void
    {
        $this->assertEquals(
            (new Block\CreditRegister(
                new Data\CreditRegister\Collection([
                    new Data\CreditRegister\Entity(
                        Carbon::parse('2018-03-12'),
                        '1234567890',
                        'identificator',
                        Data\CreditRegister\Decision::POSITIVE(),
                        1,
                        'BNK'
                    ),
                    new Data\CreditRegister\Entity(
                        Carbon::parse('2017-02-11'),
                        '3216549870',
                        'qwe-rty-uio-p',
                        Data\CreditRegister\Decision::NEGATIVE(),
                        2,
                        'MFO'
                    )
                ]),
                'Some trim'
            ))->getCreditRequests(),
            $this->creditRegisterComponent->getCreditRequests()
        );
    }

    public function testGetRegistryTrim(): void
    {
        $this->assertEquals('Some trim', $this->creditRegisterComponent->getRegistryTrim());
    }

    protected function setUp(): void
    {
        // todo: change string attribute to Reestrtrim element
        $this->creditRegisterComponent = new Block\CreditRegister(
            new Data\CreditRegister\Collection([
                new Data\CreditRegister\Entity(
                    Carbon::parse('2018-03-12'),
                    '1234567890',
                    'identificator',
                    Data\CreditRegister\Decision::POSITIVE(),
                    1,
                    'BNK'
                ),
                new Data\CreditRegister\Entity(
                    Carbon::parse('2017-02-11'),
                    '3216549870',
                    'qwe-rty-uio-p',
                    Data\CreditRegister\Decision::NEGATIVE(),
                    2,
                    'MFO'
                )
            ]),
            'Some trim'
        );
    }
}
