<?php

namespace Wearesho\Bobra\Ubki\Tests\Unit\Data;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Wearesho\Bobra\Ubki;

/**
 * Class ElementsTest
 * @package Wearesho\Bobra\Ubki\Tests\Unit\Data
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
        /** @var Ubki\Infrastructure\Element $element */
        $element = new $element(...array_values($data));

        foreach ($data as $attributeName => $expectValue) {
            $this->assertEquals($expectValue, $element->{'get' . $attributeName}());
        }
        $this->assertArraySubset($data, $element->jsonSerialize());
    }

    public function providerData(): array
    {
        return [
            [
                Ubki\Data\Elements\Address::class,
                [
                    'createdAt' => Carbon::make('2018-03-12'),
                    'language' => Ubki\Dictionaries\Language::ENG(),
                    'addressType' => Ubki\Dictionaries\AddressType::HOME(),
                    'country' => 'testCountry',
                    'city' => 'testCity',
                    'street' => 'testStreet',
                    'house' => 'testHouse',
                    'index' => 'testIndex',
                    'state' => 'testState',
                    'area' => 'testArea',
                    'cityType' => Ubki\Dictionaries\CityType::TOWN(),
                    'corpus' => 'testCorpus',
                    'flat' => 'testFlat',
                    'fullAddress' => 'testFullAddress',
                ],
            ],
            [
                Ubki\Data\Elements\Balance::class,
                [
                    'value' => 1234.56,
                    'date' => Carbon::make('2018-03-12'),
                    'time' => 'time',
                ]
            ],
            [
                Ubki\Data\Elements\Comment::class,
                [
                    'text' => 'testText',
                    'id' => 'testId',
                ]
            ],
            [
                Ubki\Data\Elements\Contact::class,
                [
                    'createdAt' => Carbon::make('2018-02-12'),
                    'value' => 'value',
                    'type' => Ubki\Dictionaries\ContactType::HOME(),
                    'inn' => static::INN,
                ]
            ],
            [
                Ubki\Data\Elements\CourtDecision::class,
                [
                    'id' => 'testId',
                    'inn' => static::INN,
                    'date' => Carbon::make('2018-03-12'),
                    'subjectStatus' => Ubki\Dictionaries\CourtSubjectStatus::PLAINTIFF(),
                    'courtDealType' => Ubki\Dictionaries\CourtDealType::PROBLEM_LOANS(),
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
                Ubki\Data\Elements\Credential::class,
                [
                    'language' => Ubki\Dictionaries\Language::ENG(),
                    'name' => 'testName',
                    'patronymic' => 'testPatronymic',
                    'surname' => 'testSurname',
                    'birthDate' => Carbon::make('1984-03-12'),
                    'identifiers' => new Ubki\Data\Collections\IdentifiedPersons(),
                    'documents' => new Ubki\Data\Collections\Documents(),
                    'addresses' => new Ubki\Data\Collections\Addresses(),
                    'inn' => static::INN,
                    'works' => new Ubki\Data\Collections\Works(),
                    'photos' => new Ubki\Data\Collections\Photos(),
                    'linkedPersons' => new Ubki\Data\Collections\LinkedPersons(),
                ],
            ],
            [
                Ubki\Data\Elements\CreditDeal::class,
                [
                    'id' => 'testId',
                    'language' => Ubki\Dictionaries\Language::ENG(),
                    'name' => 'testName',
                    'surname' => 'testSurname',
                    'birthDate' => Carbon::make('2018-03-12'),
                    'type' => Ubki\Dictionaries\CreditDealType::ACQUISITION_FIXED_ASSETS(),
                    'collateral' => Ubki\Dictionaries\CollateralType::R_1(),
                    'repaymentProcedure' => Ubki\Dictionaries\RepaymentProcedure::CREDIT_LIMIT(),
                    'currency' => Ubki\Dictionaries\Currency::BYN(),
                    'initialAmount' => 2000.30,
                    'subjectRole' => Ubki\Dictionaries\SubjectRole::BORROWER(),
                    'collateralCost' => 2300.12,
                    'dealLifes' => new Ubki\Data\Collections\DealLifes(),
                    'inn' => static::INN,
                    'patronymic' => 'testPatronymic',
                    'source' => 'testSource',
                ],
            ],
            [
                Ubki\Data\Elements\CreditRequest::class,
                [
                    'date' => Carbon::make('2018-03-12'),
                    'inn' => static::INN,
                    'id' => 'testId',
                    'decision' => Ubki\Dictionaries\Decision::POSITIVE(),
                    'reason' => Ubki\Dictionaries\RequestReason::REQUEST_ONLINE_CREDIT(),
                    'organization' => 'testOrganization',
                ],
            ],
            [
                Ubki\Data\Elements\DealLife::class,
                [
                    'id' => 'testId',
                    'periodMonth' => 1,
                    'periodYear' => 2018,
                    'issueDate' => Carbon::make('2015-03-12'),
                    'endDate' => Carbon::make('2018-03-12'),
                    'status' => Ubki\Dictionaries\DealStatus::ANNULLED(),
                    'limit' => 10000.00,
                    'mandatoryPayment' => 123.45,
                    'currentDebt' => 123.56,
                    'currentOverdueDebt' => 123.45,
                    'overdueTime' => 12,
                    'paymentIndication' => Ubki\Dictionaries\Flag::YES(),
                    'delayIndication' => Ubki\Dictionaries\Flag::NO(),
                    'trancheIndication' => Ubki\Dictionaries\Flag::YES(),
                    'paymentDate' => Carbon::make('2017-09-12'),
                    'actualEndDate' => Carbon::make('2018-03-12'),
                ],
            ],
            [
                Ubki\Data\Elements\Document::class,
                [
                    'createdAt' => Carbon::make('2018-03-12'),
                    'language' => Ubki\Dictionaries\Language::ENG(),
                    'type' => Ubki\Dictionaries\DocumentType::ATTESTAT(),
                    'serial' => 'AF',
                    'number' => '123456',
                    'issue' => 'testIssue',
                    'issueDate' => Carbon::make('2012-03-12'),
                    'termin' => Carbon::make('2020-03-12'),
                ],
            ],
            [
                Ubki\Data\Elements\IdentificationPerson::class,
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
                Ubki\Data\Elements\InsuranceDeal::class,
                [
                    'inn' => static::INN,
                    'id' => 'testId',
                    'informationDate' => Carbon::make('2010-03-12'),
                    'startDate' => Carbon::make('2015-03-12'),
                    'endDate' => Carbon::make('2020-03-12'),
                    'type' => Ubki\Dictionaries\InsuranceDealType::OSAGO(),
                    'status' => Ubki\Dictionaries\DealStatus::ANNULLED(),
                    'events' => new Ubki\Data\Collections\InsuranceEvents(),
                    'actualEndDate' => Carbon::make('2018-03-12'),
                ],
            ],
            [
                Ubki\Data\Elements\InsuranceEvent::class,
                [
                    'requestDate' => Carbon::make('2010-02-12'),
                    'decision' => Ubki\Dictionaries\InsuranceDecisionStatus::POSITIVE(),
                    'decisionDate' => Carbon::make('2013-03-12'),
                ],
            ],
            [
                Ubki\Data\Elements\LegalPerson::class,
                [
                    'createdAt' => Carbon::make('2018-03-12'),
                    'language' => Ubki\Dictionaries\Language::ENG(),
                    'name' => 'testName',
                    'ergpou' => 'testErgpou',
                    'form' => 1,
                    'economyBranch' => 'testEconomyBranch',
                    'activityType' => 'testActivityType',
                    'edrRegistrationDate' => Carbon::make('2018-03-12'),
                    'taxRegistrationDate' => Carbon::make('2018-03-12'),
                ],
            ],
            [
                Ubki\Data\Elements\LinkedPerson::class,
                [
                    'name' => 'testName',
                    'role' => Ubki\Dictionaries\LinkedIdentifierRole::FOUNDER(),
                    'issueDate' => Carbon::make('2018-03-12'),
                    'ergpou' => 'testErgpou'
                ]
            ],
            [
                Ubki\Data\Elements\NaturalPerson::class,
                [
                    'createdAt' => Carbon::make('2018-03-12'),
                    'language' => Ubki\Dictionaries\Language::ENG(),
                    'name' => 'testName',
                    'surname' => 'testName',
                    'birthDate' => Carbon::make('1984-03-12'),
                    'gender' => Ubki\Dictionaries\Gender::MAN(),
                    'inn' => static::INN,
                    'patronymic' => 'testPatronymic',
                    'familyStatus' => Ubki\Dictionaries\FamilyStatus::CIVIL(),
                    'education' => Ubki\Dictionaries\Education::ACADEMIC(),
                    'nationality' => Ubki\Dictionaries\Nationality::ARMENIA(),
                    'registrationSpd' => Ubki\Dictionaries\RegistrationSpd::BUSINESS(),
                    'socialStatus' => Ubki\Dictionaries\SocialStatus::OTHER(),
                    'childrenCount' => 5,
                ],
            ],
            [
                Ubki\Data\Elements\NegativeRatingFactors::class,
                [
                    'count' => 1,
                    'description' => 'testDescription',
                    'comments' => new Ubki\Data\Collections\Comments(),
                ],
            ],
            [
                Ubki\Data\Elements\PositiveRatingFactors::class,
                [
                    'count' => 1,
                    'description' => 'testDescription',
                    'comments' => new Ubki\Data\Collections\Comments(),
                ],
            ],
            [
                Ubki\Data\Elements\Photo::class,
                [
                    'createdAt' => Carbon::make('2018-03-12'),
                    'uri' => 'testUri',
                    'inn' => static::INN,
                ],
            ],
            [
                Ubki\Data\Elements\RatingDescription::class,
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
                Ubki\Data\Elements\RatingScore::class,
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
                Ubki\Data\Elements\RegistryTimes::class,
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
                Ubki\Data\Elements\Work::class,
                [
                    'createdAt' => Carbon::make('2010-03-12'),
                    'language' => Ubki\Dictionaries\Language::ENG(),
                    'ergpou' => 'testErgpou',
                    'name' => 'testName',
                    'rank' => Ubki\Dictionaries\IdentifierRank::DIRECTOR(),
                    'experience' => 10,
                    'income' => 1234.56,
                ],
            ],
            [
                Ubki\Data\Elements\RequestData::class,
                [
                    'type' => Ubki\Dictionaries\RequestType::DELETE(),
                    'reason' => Ubki\Dictionaries\RequestReason::REQUEST_ONLINE_CREDIT(),
                    'date' => Carbon::make('2018-03-12'),
                    'id' => 'testId',
                    'initiator' => Ubki\Dictionaries\RequestInitiator::SKI(),
                ],
            ],
            [
                Ubki\Data\Blocks\ContactsInformation::class,
                [
                    'contacts' => new Ubki\Data\Collections\Contacts()
                ],
            ],
            [
                Ubki\Data\Blocks\CourtDecisionsInformation::class,
                [
                    'decisions' => new Ubki\Data\Collections\CourtDecisions(),
                ],
            ],
            [
                Ubki\Data\Blocks\CreditRating::class,
                [
                    'score' => new Ubki\Data\Elements\RatingScore(
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
                    'description' => new Ubki\Data\Elements\RatingDescription(
                        10,
                        20,
                        'testDescription',
                        10,
                        'testExpires',
                        '200',
                        Carbon::make('2018-03-12')
                    ),
                    'comments' => new Ubki\Data\Collections\Comments(),
                    'positiveFactors' => new Ubki\Data\Elements\PositiveRatingFactors(
                        10,
                        'description',
                        new Ubki\Data\Collections\Comments()
                    ),
                    'negativeFactors' => new Ubki\Data\Elements\NegativeRatingFactors(
                        10,
                        'description',
                        new Ubki\Data\Collections\Comments()
                    ),
                ],
            ],
            [
                Ubki\Data\Blocks\CreditsInformation::class,
                [
                    'deals' => new Ubki\Data\Collections\CreditDeals(),
                ],
            ],
            [
                Ubki\Data\Blocks\CreditsRequestsInformation::class,
                [
                    'creditRequests' => new Ubki\Data\Collections\CreditRequests(),
                    'registryTimes' => new Ubki\Data\Elements\RegistryTimes(1, 2, 3, 4, 5, 6, 7)
                ],
            ],
            [
                Ubki\Data\Blocks\Identification::class,
                [
                    'credential' => new Ubki\Data\Elements\Credential(
                        Ubki\Dictionaries\Language::ENG(),
                        'testName',
                        'testPatronymic',
                        'testSurname',
                        Carbon::make('2018-03-12'),
                        new Ubki\Data\Collections\IdentifiedPersons(),
                        new Ubki\Data\Collections\Documents(),
                        new Ubki\Data\Collections\Addresses(),
                        static::INN
                    ),
                ],
            ],
            [
                Ubki\Data\Blocks\InsurancesInformation::class,
                [
                    'deals' => new Ubki\Data\Collections\InsuranceDeals(),
                ],
            ],
            [
                Ubki\Data\Elements\Tech::class,
                [
                    'trace' => new Ubki\Data\Collections\Trace(),
                    'id' => 'testId',
                    'balance' => new Ubki\Data\Elements\Balance(1123.45, Carbon::make('2018-03-12'), 'time'),
                ],
            ],
            [
                Ubki\Data\Elements\Step::class,
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

        new Ubki\Data\Elements\DealLife(
            'testId',
            1,
            2018,
            Carbon::make('2015-03-12'),
            Carbon::make('2018-03-12'),
            Ubki\Dictionaries\DealStatus::CLOSE(),
            10000.00,
            123.45,
            123.56,
            123.45,
            12,
            Ubki\Dictionaries\Flag::YES(),
            Ubki\Dictionaries\Flag::NO(),
            Ubki\Dictionaries\Flag::YES(),
            Carbon::make('2017-09-12')
        );
    }
}
