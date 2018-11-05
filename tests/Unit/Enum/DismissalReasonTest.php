<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Enum;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Enum\DismissalReason;

/**
 * Class DismissalReasonTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Enum
 * @coversDefaultClass DismissalReason
 * @internal
 */
class DismissalReasonTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(DismissalReason::ARTICLE_28(), new DismissalReason(DismissalReason::ARTICLE_28));
        $this->assertEquals(
            DismissalReason::ARTICLE_36_PARAGRAPH_1(),
            new DismissalReason(DismissalReason::ARTICLE_36_PARAGRAPH_1)
        );
        $this->assertEquals(
            DismissalReason::ARTICLE_36_PARAGRAPH_2(),
            new DismissalReason(DismissalReason::ARTICLE_36_PARAGRAPH_2)
        );
        $this->assertEquals(
            DismissalReason::ARTICLE_36_PARAGRAPH_3(),
            new DismissalReason(DismissalReason::ARTICLE_36_PARAGRAPH_3)
        );
        $this->assertEquals(
            DismissalReason::ARTICLE_36_PARAGRAPH_6_TYPE_1(),
            new DismissalReason(DismissalReason::ARTICLE_36_PARAGRAPH_6_TYPE_1)
        );
        $this->assertEquals(
            DismissalReason::ARTICLE_36_PARAGRAPH_6_TYPE_2(),
            new DismissalReason(DismissalReason::ARTICLE_36_PARAGRAPH_6_TYPE_2)
        );
        $this->assertEquals(
            DismissalReason::ARTICLE_36_PARAGRAPH_7(),
            new DismissalReason(DismissalReason::ARTICLE_36_PARAGRAPH_7)
        );
        $this->assertEquals(
            DismissalReason::ARTICLE_36_PARAGRAPH_6_TYPE_3(),
            new DismissalReason(DismissalReason::ARTICLE_36_PARAGRAPH_6_TYPE_3)
        );
        $this->assertEquals(
            DismissalReason::ARTICLE_36_PARAGRAPH_8(),
            new DismissalReason(DismissalReason::ARTICLE_36_PARAGRAPH_8)
        );
        $this->assertEquals(
            DismissalReason::ARTICLE_38_TYPE_1(),
            new DismissalReason(DismissalReason::ARTICLE_38_TYPE_1)
        );
        $this->assertEquals(
            DismissalReason::ARTICLE_38_TYPE_2(),
            new DismissalReason(DismissalReason::ARTICLE_38_TYPE_2)
        );
        $this->assertEquals(
            DismissalReason::ARTICLE_38_TYPE_3(),
            new DismissalReason(DismissalReason::ARTICLE_38_TYPE_3)
        );
        $this->assertEquals(
            DismissalReason::ARTICLE_38_TYPE_4(),
            new DismissalReason(DismissalReason::ARTICLE_38_TYPE_4)
        );
        $this->assertEquals(
            DismissalReason::ARTICLE_38_TYPE_5(),
            new DismissalReason(DismissalReason::ARTICLE_38_TYPE_5)
        );
        $this->assertEquals(
            DismissalReason::ARTICLE_38_TYPE_6(),
            new DismissalReason(DismissalReason::ARTICLE_38_TYPE_6)
        );
        $this->assertEquals(
            DismissalReason::ARTICLE_38_TYPE_7(),
            new DismissalReason(DismissalReason::ARTICLE_38_TYPE_7)
        );
        $this->assertEquals(
            DismissalReason::ARTICLE_38_TYPE_8(),
            new DismissalReason(DismissalReason::ARTICLE_38_TYPE_8)
        );
        $this->assertEquals(
            DismissalReason::ARTICLE_38_TYPE_9(),
            new DismissalReason(DismissalReason::ARTICLE_38_TYPE_9)
        );
        $this->assertEquals(DismissalReason::ARTICLE_39(), new DismissalReason(DismissalReason::ARTICLE_39));
        $this->assertEquals(
            DismissalReason::ARTICLE_40_PARAGRAPH_1_TYPE_1(),
            new DismissalReason(DismissalReason::ARTICLE_40_PARAGRAPH_1_TYPE_1)
        );
        $this->assertEquals(
            DismissalReason::ARTICLE_40_PARAGRAPH_1_TYPE_2(),
            new DismissalReason(DismissalReason::ARTICLE_40_PARAGRAPH_1_TYPE_2)
        );
        $this->assertEquals(
            DismissalReason::ARTICLE_40_PARAGRAPH_1_TYPE_3(),
            new DismissalReason(DismissalReason::ARTICLE_40_PARAGRAPH_1_TYPE_3)
        );
        $this->assertEquals(
            DismissalReason::ARTICLE_40_PARAGRAPH_1_TYPE_4(),
            new DismissalReason(DismissalReason::ARTICLE_40_PARAGRAPH_1_TYPE_4)
        );
        $this->assertEquals(
            DismissalReason::ARTICLE_40_PARAGRAPH_1_TYPE_5(),
            new DismissalReason(DismissalReason::ARTICLE_40_PARAGRAPH_1_TYPE_5)
        );
        $this->assertEquals(
            DismissalReason::ARTICLE_40_PARAGRAPH_2_TYPE_1(),
            new DismissalReason(DismissalReason::ARTICLE_40_PARAGRAPH_2_TYPE_1)
        );
        $this->assertEquals(
            DismissalReason::ARTICLE_40_PARAGRAPH_2_TYPE_2(),
            new DismissalReason(DismissalReason::ARTICLE_40_PARAGRAPH_2_TYPE_2)
        );
        $this->assertEquals(
            DismissalReason::ARTICLE_40_PARAGRAPH_2_TYPE_3(),
            new DismissalReason(DismissalReason::ARTICLE_40_PARAGRAPH_2_TYPE_3)
        );
        $this->assertEquals(
            DismissalReason::ARTICLE_40_PARAGRAPH_3(),
            new DismissalReason(DismissalReason::ARTICLE_40_PARAGRAPH_3)
        );
        $this->assertEquals(
            DismissalReason::ARTICLE_40_PARAGRAPH_4(),
            new DismissalReason(DismissalReason::ARTICLE_40_PARAGRAPH_4)
        );
        $this->assertEquals(
            DismissalReason::ARTICLE_40_PARAGRAPH_5(),
            new DismissalReason(DismissalReason::ARTICLE_40_PARAGRAPH_5)
        );
        $this->assertEquals(
            DismissalReason::ARTICLE_40_PARAGRAPH_6(),
            new DismissalReason(DismissalReason::ARTICLE_40_PARAGRAPH_6)
        );
        $this->assertEquals(
            DismissalReason::ARTICLE_40_PARAGRAPH_7(),
            new DismissalReason(DismissalReason::ARTICLE_40_PARAGRAPH_7)
        );
        $this->assertEquals(
            DismissalReason::ARTICLE_40_PARAGRAPH_8(),
            new DismissalReason(DismissalReason::ARTICLE_40_PARAGRAPH_8)
        );
        $this->assertEquals(
            DismissalReason::ARTICLE_41_PARAGRAPH_1(),
            new DismissalReason(DismissalReason::ARTICLE_41_PARAGRAPH_1)
        );
        $this->assertEquals(
            DismissalReason::ARTICLE_41_PARAGRAPH_2(),
            new DismissalReason(DismissalReason::ARTICLE_41_PARAGRAPH_2)
        );
        $this->assertEquals(
            DismissalReason::ARTICLE_41_PARAGRAPH_3(),
            new DismissalReason(DismissalReason::ARTICLE_41_PARAGRAPH_3)
        );
        $this->assertEquals(
            DismissalReason::ARTICLE_43_PARAGRAPH_1(),
            new DismissalReason(DismissalReason::ARTICLE_43_PARAGRAPH_1)
        );
        $this->assertEquals(DismissalReason::DEATH(), new DismissalReason(DismissalReason::DEATH));
    }
}
