<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Enum;

use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki\Enum\SearchAnswerMvd;

/**
 * Class SearchAnswerMvdTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Enum
 */
class SearchAnswerMvdTest extends TestCase
{
    public function testEnums(): void
    {
        $this->assertEquals(SearchAnswerMvd::ERROR(), new SearchAnswerMvd(SearchAnswerMvd::ERROR));
        $this->assertEquals(SearchAnswerMvd::FOUND(), new SearchAnswerMvd(SearchAnswerMvd::FOUND));
        $this->assertEquals(SearchAnswerMvd::NOT_FOUND(), new SearchAnswerMvd(SearchAnswerMvd::NOT_FOUND));
        $this->assertEquals(SearchAnswerMvd::WANTED(), new SearchAnswerMvd(SearchAnswerMvd::WANTED));
    }
}
