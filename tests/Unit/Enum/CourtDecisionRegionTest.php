<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Enum;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Enum\CourtDecisionRegion;

/**
 * Class CourtDecisionRegionTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Enum
 * @coversDefaultClass \Wearesho\Bobra\Ubki\Enum\CourtDecisionRegion
 * @internal
 */
class CourtDecisionRegionTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(
            CourtDecisionRegion::ARMED_FORCES_CENTRAL(),
            new CourtDecisionRegion(CourtDecisionRegion::ARMED_FORCES_CENTRAL)
        );
        $this->assertEquals(CourtDecisionRegion::CHERKASY(), new CourtDecisionRegion(CourtDecisionRegion::CHERKASY));
        $this->assertEquals(
            CourtDecisionRegion::ARMED_FORCES_SOUTH(),
            new CourtDecisionRegion(CourtDecisionRegion::ARMED_FORCES_SOUTH)
        );
        $this->assertEquals(
            CourtDecisionRegion::ARMED_FORCES_WESTERN(),
            new CourtDecisionRegion(CourtDecisionRegion::ARMED_FORCES_WESTERN)
        );
        $this->assertEquals(
            CourtDecisionRegion::AUTONOMOUS_REPUBLIC_OF_CRIMEA(),
            new CourtDecisionRegion(CourtDecisionRegion::AUTONOMOUS_REPUBLIC_OF_CRIMEA)
        );
        $this->assertEquals(CourtDecisionRegion::CHERNIHIV(), new CourtDecisionRegion(CourtDecisionRegion::CHERNIHIV));
        $this->assertEquals(
            CourtDecisionRegion::CHERNIVTSI(),
            new CourtDecisionRegion(CourtDecisionRegion::CHERNIVTSI)
        );
        $this->assertEquals(
            CourtDecisionRegion::DNIPROPETROVSK(),
            new CourtDecisionRegion(CourtDecisionRegion::DNIPROPETROVSK)
        );
        $this->assertEquals(CourtDecisionRegion::DONETSK(), new CourtDecisionRegion(CourtDecisionRegion::DONETSK));
        $this->assertEquals(
            CourtDecisionRegion::IVANO_FRANKIVSK(),
            new CourtDecisionRegion(CourtDecisionRegion::IVANO_FRANKIVSK)
        );
        $this->assertEquals(CourtDecisionRegion::KHARKIV(), new CourtDecisionRegion(CourtDecisionRegion::KHARKIV));
        $this->assertEquals(CourtDecisionRegion::KHERSON(), new CourtDecisionRegion(CourtDecisionRegion::KHERSON));
        $this->assertEquals(
            CourtDecisionRegion::KHMELNYTSKYI(),
            new CourtDecisionRegion(CourtDecisionRegion::KHMELNYTSKYI)
        );
        $this->assertEquals(CourtDecisionRegion::KIEV(), new CourtDecisionRegion(CourtDecisionRegion::KIEV));
        $this->assertEquals(CourtDecisionRegion::KIEV_CITY(), new CourtDecisionRegion(CourtDecisionRegion::KIEV_CITY));
        $this->assertEquals(
            CourtDecisionRegion::KIROVOHRAD(),
            new CourtDecisionRegion(CourtDecisionRegion::KIROVOHRAD)
        );
        $this->assertEquals(CourtDecisionRegion::LUHANSK(), new CourtDecisionRegion(CourtDecisionRegion::LUHANSK));
        $this->assertEquals(CourtDecisionRegion::LVIV(), new CourtDecisionRegion(CourtDecisionRegion::LVIV));
        $this->assertEquals(CourtDecisionRegion::MYKOLAIV(), new CourtDecisionRegion(CourtDecisionRegion::MYKOLAIV));
        $this->assertEquals(CourtDecisionRegion::ODESA(), new CourtDecisionRegion(CourtDecisionRegion::ODESA));
        $this->assertEquals(CourtDecisionRegion::POLTAVA(), new CourtDecisionRegion(CourtDecisionRegion::POLTAVA));
        $this->assertEquals(CourtDecisionRegion::RIVNE(), new CourtDecisionRegion(CourtDecisionRegion::RIVNE));
        $this->assertEquals(
            CourtDecisionRegion::SEVASTOPOL_CITY(),
            new CourtDecisionRegion(CourtDecisionRegion::SEVASTOPOL_CITY)
        );
        $this->assertEquals(CourtDecisionRegion::SUMY(), new CourtDecisionRegion(CourtDecisionRegion::SUMY));
        $this->assertEquals(CourtDecisionRegion::TERNOPIL(), new CourtDecisionRegion(CourtDecisionRegion::TERNOPIL));
        $this->assertEquals(
            CourtDecisionRegion::UKRAINIAN_NAVY(),
            new CourtDecisionRegion(CourtDecisionRegion::UKRAINIAN_NAVY)
        );
        $this->assertEquals(CourtDecisionRegion::VINNYTSIA(), new CourtDecisionRegion(CourtDecisionRegion::VINNYTSIA));
        $this->assertEquals(CourtDecisionRegion::VOLYN(), new CourtDecisionRegion(CourtDecisionRegion::VOLYN));
        $this->assertEquals(
            CourtDecisionRegion::ZAKARPATTIA(),
            new CourtDecisionRegion(CourtDecisionRegion::ZAKARPATTIA)
        );
        $this->assertEquals(
            CourtDecisionRegion::ZAPORIZHZHIA(),
            new CourtDecisionRegion(CourtDecisionRegion::ZAPORIZHZHIA)
        );
        $this->assertEquals(CourtDecisionRegion::ZHYTOMYR(), new CourtDecisionRegion(CourtDecisionRegion::ZHYTOMYR));
    }
}
