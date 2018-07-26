<?php

namespace Wearesho\Bobra\Ubki\Tests\Block;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Block;
use Wearesho\Bobra\Ubki\Data;

/**
 * class IdentifyingTest
 * @package Wearesho\Bobra\Ubki\Tests\Component
 */
class IdentifyingTest extends TestCase
{
    /** @var Block\Identifying */
    protected $identifyingComponent;

    /** @var Carbon */
    protected static $birthDate;

    /** @var Carbon */
    protected static $informationDate;

    /** @var Data\Language */
    protected static $language;

    /** @var string */
    protected static $inn;

    public static function setUpBeforeClass(): void
    {
        static::$birthDate = Carbon::create(1998, 3, 12, 11, 30, 0);
        static::$informationDate = Carbon::create(2018, 7, 27, 0, 39, 0);
        static::$language = Data\Language::RUS('русский');
        static::$inn = '1234567890';
    }

    protected function setUp(): void
    {
        $this->identifyingComponent = new Block\Identifying(
            new Data\Credential\Entity(
                static::$language,
                'Roman',
                'Andreevich',
                'Varkuta',
                static::$birthDate,
                new Data\Identifier\Collection([
                    new Data\Identifier\Natural\Entity(
                        static::$informationDate,
                        static::$language,
                        'Roman',
                        'Varkuta',
                        static::$birthDate,
                        Data\Gender::MAN(),
                        static::$inn,
                        'Andreevich',
                        Data\FamilyStatus::SINGLE('не женат/не замужем'),
                        Data\Education::SECONDARY_TECH(),
                        Data\Nationality::UKRAINE(),
                        Data\RegistrationSpd::PHYSICAL(),
                        Data\SocialStatus::FULL_TIME(),
                        0
                    )
                ]),
                new Data\Document\Collection([
                    new Data\Document\Entity(
                        static::$informationDate,
                        static::$language,
                        Data\Document\Type::PASSPORT('пасспорт'),
                        'УМ',
                        '123123',
                        'Issue by someone',
                        Carbon::create(2014, 3, 12)
                    )
                ]),
                new Data\Address\Collection([
                    new Data\Address\Entity(
                        static::$informationDate,
                        static::$language,
                        Data\Address\Type::HOME('домашний'),
                        'Ukraine',
                        'Kharkov',
                        'Lyapunova',
                        '12',
                        '61100',
                        'Shevchenkivska',
                        'Kharkivska',
                        Data\CityType::TOWN(),
                        null,
                        '24'
                    )
                ]),
                static::$inn,
                new Data\Work\Collection([
                    new Data\Work\Entity(
                        static::$informationDate,
                        static::$language,
                        'some ergpou',
                        'SHO',
                        Data\Work\Rank::SPECIALIST(),
                        1,
                        10000.00
                    )
                ])
            )
        );
    }

    public function testType(): void
    {
        $this->assertEquals(Block\Identifying::ID, $this->identifyingComponent->getId());
    }

    public function testGetCredential(): void
    {
        $this->assertEquals(
            new Block\Identifying(
                new Data\Credential\Entity(
                    static::$language,
                    'Roman',
                    'Andreevich',
                    'Varkuta',
                    static::$birthDate,
                    new Data\Identifier\Collection([
                        new Data\Identifier\Natural\Entity(
                            static::$informationDate,
                            static::$language,
                            'Roman',
                            'Varkuta',
                            static::$birthDate,
                            Data\Gender::MAN(),
                            static::$inn,
                            'Andreevich',
                            Data\FamilyStatus::SINGLE('не женат/не замужем'),
                            Data\Education::SECONDARY_TECH(),
                            Data\Nationality::UKRAINE(),
                            Data\RegistrationSpd::PHYSICAL(),
                            Data\SocialStatus::FULL_TIME(),
                            0
                        )
                    ]),
                    new Data\Document\Collection([
                        new Data\Document\Entity(
                            static::$informationDate,
                            static::$language,
                            Data\Document\Type::PASSPORT('пасспорт'),
                            'УМ',
                            '123123',
                            'Issue by someone',
                            Carbon::create(2014, 3, 12)
                        )
                    ]),
                    new Data\Address\Collection([
                        new Data\Address\Entity(
                            static::$informationDate,
                            static::$language,
                            Data\Address\Type::HOME('домашний'),
                            'Ukraine',
                            'Kharkov',
                            'Lyapunova',
                            '12',
                            '61100',
                            'Shevchenkivska',
                            'Kharkivska',
                            Data\CityType::TOWN(),
                            null,
                            '24'
                        )
                    ]),
                    static::$inn,
                    new Data\Work\Collection([
                        new Data\Work\Entity(
                            static::$informationDate,
                            static::$language,
                            'some ergpou',
                            'SHO',
                            Data\Work\Rank::SPECIALIST(),
                            1,
                            10000.00
                        )
                    ])
                )
            ),
            $this->identifyingComponent
        );
    }
}
