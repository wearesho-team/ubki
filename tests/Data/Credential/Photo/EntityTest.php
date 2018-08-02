<?php


namespace Wearesho\Bobra\Ubki\Tests\Data\Credential\Photo;

use Carbon\Carbon;

use Wearesho\Bobra\Ubki\Data;
use Wearesho\Bobra\Ubki\Tests;

/**
 * Class EntityTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Data\Credential\Photo
 */
class EntityTest extends Tests\Extend\ElementTestCase
{
    protected const TAG = 'foto';

    /** @var Data\Credential\Photo\Entity */
    protected $element;

    protected function setUp(): void
    {
        $this->element = new Data\Credential\Photo\Entity(
            Carbon::create(2018, 12, 3, 4, 5, 6),
            base64_encode('some photo'),
            '1234567890'
        );
    }

    public function testGetInn(): void
    {
        $this->assertEquals(
            '1234567890',
            $this->element->getInn()
        );
    }

    public function testGetPhoto(): void
    {
        $this->assertEquals(
            'some photo',
            base64_decode($this->element->getPhoto())
        );
    }

    public function testGetCreatedAt(): void
    {
        $this->assertEquals(
            Carbon::create(2018, 12, 3, 4, 5, 6),
            $this->element->getCreatedAt()
        );
    }

    public function testJsonSerialize(): void
    {
        $this->assertEquals(
            [
                'createdAt' => '2018-12-03',
                'inn' => '1234567890',
                'photo' => 'some photo'
            ],
            $this->element->jsonSerialize()
        );
    }
}
