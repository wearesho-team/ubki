<?php

namespace Wearesho\Bobra\Ubki\Tests\Block;

use Wearesho\Bobra\Ubki\Block\InsuranceReport;
use PHPUnit\Framework\TestCase;

/**
 * class InsuranceReportTest
 * @package Wearesho\Bobra\Ubki\Tests\Block
 */
class InsuranceReportTest extends TestCase
{
    /** @var InsuranceReport */
    protected $insuranceReportComponent;

    // todo: refactor after implementing Insurance report element
    protected function setUp(): void
    {
        $this->insuranceReportComponent = new InsuranceReport('Some reports');
    }

    public function testType(): void
    {
        $this->assertEquals(InsuranceReport::ID, $this->insuranceReportComponent->getId());
    }

    public function testGetReports(): void
    {
        $this->assertEquals('Some reports', $this->insuranceReportComponent->getReports());
    }
}
