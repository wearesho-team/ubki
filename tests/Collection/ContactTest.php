<?php

namespace Wearesho\Bobra\Ubki\Tests\Collection;

use Wearesho\Bobra\Ubki\Collection\Contact;

use PHPUnit\Framework\TestCase;

/**
 * Class ContactTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Collection
 */
class ContactTest extends TestCase
{
    public function testType()
    {
        $this->assertEquals(\Wearesho\Bobra\Ubki\Block\Contact::class, (new Contact())->type());
    }
}
