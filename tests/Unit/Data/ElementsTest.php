<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki;

/**
 * Class ElementsTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Head
 */
class ElementsTest extends TestCase
{
    protected const INN = '1234567890';

    /**
     * @param string $element
     * @param array $data
     *
     * @dataProvider providerData
     */
    public function testElementValues(string $element, array $data)
    {
        $element = new $element(...array_values($data));

        foreach ($data as $attributeName => $expectValue) {
            $this->assertEquals($expectValue, $element->{'get' . $attributeName}());
        }
    }

    public function providerData(): array
    {
        return [
            [
                Ubki\Data\Address::class,
                [
                    'createdAt' => Carbon::make('2018-03-12'),
                    'language' => Ubki\Dictionary\Language::ENG(),
                    'addressType' => Ubki\Dictionary\Address::HOME(),
                    'country' => 'testCountry',
                    'city' => 'testCity',
                    'street' => 'testStreet',
                    'house' => 'testHouse',
                    'index' => 'testIndex',
                    'state' => 'testState',
                    'area' => 'testArea',
                    'cityType' => Ubki\Dictionary\City::TOWN(),
                    'corpus' => 'testCorpus',
                    'flat' => 'testFlat',
                    'fullAddress' => 'testFullAddress',
                ],
            ],
            [
                Ubki\Data\Balance::class,
                [
                    'value' => 1234.56,
                    'date' => Carbon::make('2018-03-12'),
                    'time' => 'time',
                ]
            ],
            [
                Ubki\Data\Comment::class,
                [
                    'text' => 'testText',
                    'id' => 'testId',
                ]
            ],
            [
                Ubki\Data\Contact::class,
                [
                    'createdAt' => Carbon::make('2018-02-12'),
                    'value' => 'value',
                    'type' => Ubki\Dictionary\Contact::HOME(),
                    'inn' => static::INN,
                ]
            ],
            [
                Ubki\Data\CourtDecision::class,
                [
                    'id' => 'testId',
                    'inn' => static::INN,
                    'date' => Carbon::make('2018-03-12'),
                    'subjectStatus' => Ubki\Dictionary\CourtSubject::PLAINTIFF(),
                    'courtDealType' => Ubki\Dictionary\CourtDeal::PROBLEM_LOANS(),
                    'courtName' => 'testCourtName',
                    'documentType' => 'testDocumentType',
                    'documentTypeReference' => 'testDocumentReference',
                    'legalFact' => 'testLegalFact',
                    'legalFactReference' => 'testLegalReference',
                    'createdAt' => Carbon::make('2019-03-12'),
                    'area' => 'testArea',
                    'areaReference' => 'testAreaReference',
                ],
            ],
            [
                Ubki\Data\Credential::class,
                [
                    'language' => Ubki\Dictionary\Language::ENG(),
                    'name' => 'testName',
                    'patronymic' => 'testPatronymic',
                    'surname' => 'testSurname',
                    'birthDate' => Carbon::make('1984-03-12'),
                    'identifiers' => new Ubki\Data\Collection\IdentifiedPerson(),
                    'documents' => new Ubki\Data\Collection\Document(),
                    'addresses' => new Ubki\Data\Collection\Address(),
                    'inn' => static::INN,
                    'works' => new Ubki\Data\Collection\Work(),
                    'photos' => new Ubki\Data\Collection\Photo(),
                    'linkedPersons' => new Ubki\Data\Collection\LinkedPerson(),
                ],
            ],
            [
                Ubki\Data\CreditDeal::class,
                [
                    'id' => 'testId',
                    'language' => Ubki\Dictionary\Language::ENG(),
                    'name' => 'testName',
                    'surname' => 'testSurname',
                    'birthDate' => Carbon::make('2018-03-12'),
                    'type' => Ubki\Dictionary\CreditDeal::ACQUISITION_FIXED_ASSETS(),
                    'collateral' => Ubki\Dictionary\Collateral::LEGAL(),
                    'repaymentProcedure' => Ubki\Dictionary\RepaymentProcedure::CREDIT_LIMIT(),
                    'currency' => Ubki\Dictionary\Currency::BYN(),
                    'initialAmount' => 2000.30,
                    'subjectRole' => Ubki\Dictionary\SubjectRole::BORROWER(),
                    'collateralCost' => 2300.12,
                    'dealLifes' => new Ubki\Data\Collection\DealLife(),
                    'inn' => static::INN,
                    'patronymic' => 'testPatronymic',
                    'source' => 'testSource',
                ],
            ],
            [
                Ubki\Data\CreditRequest::class,
                [
                    'date' => Carbon::make('2018-03-12'),
                    'inn' => static::INN,
                    'id' => 'testId',
                    'decision' => Ubki\Dictionary\Decision::POSITIVE(),
                    'reason' => Ubki\Dictionary\RequestReason::REQUEST_ONLINE_CREDIT(),
                    'organization' => 'testOrganization',
                ],
            ],
            [
                Ubki\Data\DealLife::class,
                [
                    'id' => 'testId',
                    'periodMonth' => 1,
                    'periodYear' => 2018,
                    'issueDate' => Carbon::make('2015-03-12'),
                    'endDate' => Carbon::make('2018-03-12'),
                    'status' => Ubki\Dictionary\DealStatus::ANNULLED(),
                    'limit' => 10000.00,
                    'mandatoryPayment' => 123.45,
                    'currentDebt' => 123.56,
                    'currentOverdueDebt' => 123.45,
                    'overdueTime' => 12,
                    'paymentIndication' => Ubki\Dictionary\Flag::YES(),
                    'delayIndication' => Ubki\Dictionary\Flag::NO(),
                    'trancheIndication' => Ubki\Dictionary\Flag::YES(),
                    'paymentDate' => Carbon::make('2017-09-12'),
                    'actualEndDate' => Carbon::make('2018-03-12'),
                ],
            ],
            [
                Ubki\Data\Document::class,
                [
                    'createdAt' => Carbon::make('2018-03-12'),
                    'language' => Ubki\Dictionary\Language::ENG(),
                    'type' => Ubki\Dictionary\Document::ATTESTAT(),
                    'serial' => 'AF',
                    'number' => '123456',
                    'issue' => 'testIssue',
                    'issueDate' => Carbon::make('2012-03-12'),
                    'termin' => Carbon::make('2020-03-12'),
                ],
            ],
            [
                Ubki\Data\IdentificationPerson::class,
                [
                    'name' => 'testName',
                    'inn' => static::INN,
                    'surname' => 'testName',
                    'patronymic' => 'testPatronymic',
                    'birthDate' => Carbon::make('1984-03-12'),
                    'organization' => 'testOrganization',
                ],
            ],
            [
                Ubki\Data\InsuranceDeal::class,
                [
                    'inn' => static::INN,
                    'id' => 'testId',
                    'informationDate' => Carbon::make('2010-03-12'),
                    'startDate' => Carbon::make('2015-03-12'),
                    'endDate' => Carbon::make('2020-03-12'),
                    'type' => Ubki\Dictionary\InsuranceDeal::OSAGO(),
                    'status' => Ubki\Dictionary\DealStatus::ANNULLED(),
                    'events' => new Ubki\Data\Collection\InsuranceEvent(),
                    'actualEndDate' => Carbon::make('2018-03-12'),
                ],
            ],
            [
                Ubki\Data\InsuranceEvent::class,
                [
                    'requestDate' => Carbon::make('2010-02-12'),
                    'decision' => Ubki\Dictionary\InsuranceDecision::POSITIVE(),
                    'decisionDate' => Carbon::make('2013-03-12'),
                ],
            ],
            [
                Ubki\Data\LegalPerson::class,
                [
                    'createdAt' => Carbon::make('2018-03-12'),
                    'language' => Ubki\Dictionary\Language::ENG(),
                    'name' => 'testName',
                    'ergpou' => 'testErgpou',
                    'ownership' => Ubki\Dictionary\Ownership::BRANCH(),
                    'economyBranch' => Ubki\Dictionary\EconomyBranch::BUILDING(),
                    'activityType' => 'testActivityType',
                    'edrRegistrationDate' => Carbon::make('2018-03-12'),
                    'taxRegistrationDate' => Carbon::make('2018-03-12'),
                ],
            ],
            [
                Ubki\Data\LinkedPerson::class,
                [
                    'name' => 'testName',
                    'role' => Ubki\Dictionary\LinkedIdentifierRole::FOUNDER(),
                    'issueDate' => Carbon::make('2018-03-12'),
                    'ergpou' => 'testErgpou'
                ]
            ],
            [
                Ubki\Data\NaturalPerson::class,
                [
                    'createdAt' => Carbon::make('2018-03-12'),
                    'language' => Ubki\Dictionary\Language::ENG(),
                    'name' => 'testName',
                    'surname' => 'testName',
                    'birthDate' => Carbon::make('1984-03-12'),
                    'gender' => Ubki\Dictionary\Gender::MAN(),
                    'inn' => static::INN,
                    'patronymic' => 'testPatronymic',
                    'familyStatus' => Ubki\Dictionary\FamilyStatus::CIVIL(),
                    'education' => Ubki\Dictionary\Education::ACADEMIC(),
                    'nationality' => Ubki\Dictionary\Nationality::ARMENIA(),
                    'registrationSpd' => Ubki\Dictionary\RegistrationSpd::BUSINESS(),
                    'socialStatus' => Ubki\Dictionary\SocialStatus::OTHER(),
                    'childrenCount' => 5,
                ],
            ],
            [
                Ubki\Data\NegativeRatingFactors::class,
                [
                    'count' => 1,
                    'description' => 'testDescription',
                    'comments' => new Ubki\Data\Collection\Comment(),
                ],
            ],
            [
                Ubki\Data\PositiveRatingFactors::class,
                [
                    'count' => 1,
                    'description' => 'testDescription',
                    'comments' => new Ubki\Data\Collection\Comment(),
                ],
            ],
            [
                Ubki\Data\Photo::class,
                [
                    'createdAt' => Carbon::make('2018-03-12'),
                    'uri' => 'testUri',
                    'inn' => static::INN,
                ],
            ],
            [
                Ubki\Data\RatingDescription::class,
                [
                    'creditsCount' => 10,
                    'openCreditsCount' => 10,
                    'openCreditsDescription' => 'testDescription',
                    'closedCreditsCount' => 10,
                    'expires' => 'testExpires',
                    'maxOverdue' => 10,
                    'updatedAt' => Carbon::make('2018-03-12'),
                ],
            ],
            [
                Ubki\Data\RatingScore::class,
                [
                    'inn' => static::INN,
                    'surname' => 'testSurname',
                    'name' => 'testName',
                    'patronymic' => 'testPatronymic',
                    'birthDate' => Carbon::make('1983-03-12'),
                    'score' => '100',
                    'previousScore' => '100',
                    'date' => Carbon::make('2018-03-12'),
                    'level' => 'testLevel',
                ],
            ],
            [
                Ubki\Data\RegistryTimes::class,
                [
                    'byHour' => 1,
                    'byDay' => 2,
                    'byWeek' => 3,
                    'byMonth' => 4,
                    'byQuarter' => 5,
                    'byYear' => 6,
                    'byMoreYear' => 7,
                ],
            ],
            [
                Ubki\Data\Work::class,
                [
                    'createdAt' => Carbon::make('2010-03-12'),
                    'language' => Ubki\Dictionary\Language::ENG(),
                    'ergpou' => 'testErgpou',
                    'name' => 'testName',
                    'rank' => Ubki\Dictionary\IdentifierRank::DIRECTOR(),
                    'experience' => 10,
                    'income' => 1234.56,
                ],
            ],
            [
                Ubki\Push\Export\Request\Head::class,
                [
                    'type' => Ubki\Push\Export\Request\Type::DELETE(),
                    'reason' => Ubki\Dictionary\RequestReason::REQUEST_ONLINE_CREDIT(),
                    'date' => Carbon::make('2018-03-12'),
                    'id' => 'testId',
                    'initiator' => Ubki\Dictionary\RequestInitiator::SKI(),
                ],
            ],
            [
                Ubki\Data\Block\CreditRating::class,
                [
                    'score' => new Ubki\Data\RatingScore(
                        static::INN,
                        'testSurname',
                        'testName',
                        'testPatronymic',
                        Carbon::make('2018-03-12'),
                        '100',
                        '100',
                        Carbon::make('2018-03-12'),
                        'testLevel'
                    ),
                    'description' => new Ubki\Data\RatingDescription(
                        10,
                        20,
                        'testDescription',
                        10,
                        'testExpires',
                        '200',
                        Carbon::make('2018-03-12')
                    ),
                    'comments' => new Ubki\Data\Collection\Comment(),
                    'positiveFactors' => new Ubki\Data\PositiveRatingFactors(
                        10,
                        'description',
                        new Ubki\Data\Collection\Comment()
                    ),
                    'negativeFactors' => new Ubki\Data\NegativeRatingFactors(
                        10,
                        'description',
                        new Ubki\Data\Collection\Comment()
                    ),
                ],
            ],
            [
                Ubki\Data\Tech::class,
                [
                    'trace' => new Ubki\Data\Collection\Trace(),
                    'id' => 'testId',
                    'balance' => new Ubki\Data\Balance(1123.45, Carbon::make('2018-03-12'), 'time'),
                ],
            ],
            [
                Ubki\Data\Step::class,
                [
                    'name' => 'testName',
                    'start' => Carbon::make('2018-03-12'),
                    'end' => Carbon::make('2018-03-12'),
                ],
            ],
        ];
    }

    public function testDealLifeWithInvalidActualEndDate(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        new Ubki\Data\DealLife(
            'testId',
            1,
            2018,
            Carbon::make('2015-03-12'),
            Carbon::make('2018-03-12'),
            Ubki\Dictionary\DealStatus::CLOSE(),
            10000.00,
            123.45,
            123.56,
            123.45,
            12,
            Ubki\Dictionary\Flag::YES(),
            Ubki\Dictionary\Flag::NO(),
            Ubki\Dictionary\Flag::YES(),
            Carbon::make('2017-09-12')
        );
    }
}
