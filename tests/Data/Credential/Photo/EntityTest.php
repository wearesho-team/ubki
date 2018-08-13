<?php


namespace Wearesho\Bobra\Ubki\Tests\Data\Credential\Photo;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Tests;

/**
 * Class EntityTest
 * @package Wearesho\Bobra\Ubki\Tests\Data\Credential\Photo
 *
 * @internal
 */
class EntityTest extends Tests\Extend\ElementTestCase
{
    protected const TAG = 'foto';

    /** @var Data\Credential\Photo\Entity */
    protected $element;

    protected function setUp(): void
    {
        $this->element = new Data\Credential\Photo\Entity(
            Carbon::parse('2018-12-06'),
            base64_encode('some photo'),
            '1234567890'
        );
    }

    public function testGetters(): void
    {
        $this->assertEquals('1234567890', $this->element->inn);
        $this->assertEquals('some photo', base64_decode($this->element->photo));
        $this->assertEquals(Carbon::parse('2018-12-06'), Carbon::instance($this->element->createdAt));
        $this->assertEquals('2018-12-06', Carbon::instance($this->element->createdAt)->toDateString());
    }

    public function testJsonSerialize(): void
    {
        $this->assertEquals(
            [
                'createdAt' => '2018-12-06',
                'inn' => '1234567890',
                'photo' => base64_encode('some photo')
            ],
            $this->element->jsonSerialize()
        );
    }
}
