<?php

namespace Wearesho\Bobra\Ubki\Tests\Block;

use Carbon\Carbon;

use PHPUnit\Framework\TestCase;

use Wearesho\Bobra\Ubki\Block;
use Wearesho\Bobra\Ubki\Data;

/**
 * Class IdentifyingTest
 * @internal
 * @package Wearesho\Bobra\Ubki\Tests\Block
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
                new Data\Credential\Identifier\Collection([
                    new Data\Credential\Identifier\Natural\Entity(
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
                new Data\Credential\Document\Collection([
                    new Data\Credential\Document\Entity(
                        static::$informationDate,
                        static::$language,
                        Data\Credential\Document\Type::PASSPORT('пасспорт'),
                        'УМ',
                        '123123',
                        'Issue by someone',
                        Carbon::parse('2014-03-12')
                    )
                ]),
                new Data\Credential\Address\Collection([
                    new Data\Credential\Address\Entity(
                        static::$informationDate,
                        static::$language,
                        Data\Credential\Address\Type::HOME('домашний'),
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
                new Data\Credential\Work\Collection([
                    new Data\Credential\Work\Entity(
                        static::$informationDate,
                        static::$language,
                        'some ergpou',
                        'SHO',
                        Data\Credential\Work\Rank::SPECIALIST(),
                        1,
                        10000.00
                    )
                ])
            )
        );
    }

    public function testType(): void
    {
        $this->assertEquals(
            Block\Identifying::ID,
            $this->identifyingComponent->getId()
        );
    }

    public function testGetCredential(): void
    {
        $this->assertEquals(
            (new Block\Identifying(
                new Data\Credential\Entity(
                    static::$language,
                    'Roman',
                    'Andreevich',
                    'Varkuta',
                    static::$birthDate,
                    new Data\Credential\Identifier\Collection([
                        new Data\Credential\Identifier\Natural\Entity(
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
                    new Data\Credential\Document\Collection([
                        new Data\Credential\Document\Entity(
                            static::$informationDate,
                            static::$language,
                            Data\Credential\Document\Type::PASSPORT('пасспорт'),
                            'УМ',
                            '123123',
                            'Issue by someone',
                            Carbon::parse('2014-03-12')
                        )
                    ]),
                    new Data\Credential\Address\Collection([
                        new Data\Credential\Address\Entity(
                            static::$informationDate,
                            static::$language,
                            Data\Credential\Address\Type::HOME('домашний'),
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
                    new Data\Credential\Work\Collection([
                        new Data\Credential\Work\Entity(
                            static::$informationDate,
                            static::$language,
                            'some ergpou',
                            'SHO',
                            Data\Credential\Work\Rank::SPECIALIST(),
                            1,
                            10000.00
                        )
                    ])
                )
            ))->getCredential(),
            $this->identifyingComponent->getCredential()
        );
    }
}
