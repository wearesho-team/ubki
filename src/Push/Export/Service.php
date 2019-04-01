<?php

namespace Wearesho\Bobra\Ubki\Push\Export;

use GuzzleHttp;
use Psr\Log;
use Spatie\ArrayToXml\ArrayToXml;
use Wearesho\Bobra\Ubki;

/**
 * Class Service
 * @package Wearesho\Bobra\Ubki\Push\Export
 *
 * @property Ubki\Push\ConfigInterface $config;
 */
class Service extends Ubki\Service implements ServiceInterface
{
    public const PARTNER_ID = 'reqidout';
    public const REQUEST_INITIATOR = 'reqsource';
    public const REQUEST_VERSION = 'version';
    public const COMPONENT = 'comp';
    public const COMPONENT_ID = 'id';

    public function __construct(
        Ubki\Push\ConfigInterface $config,
        Ubki\Authorization\ProviderInterface $authProvider,
        GuzzleHttp\ClientInterface $client,
        Log\LoggerInterface $logger = null
    ) {
        parent::__construct($config, $authProvider, $client, $logger);
    }

    /**
     * @param RequestInterface $request
     *
     * @return Ubki\RequestResponsePair
     * @throws Ubki\Exception\Request
     */
    public function export(RequestInterface $request): Ubki\RequestResponsePair
    {
        return $this->send($this->config->getPushUrl(), $request);
    }

    /**
     * @param Request|Ubki\RequestInterface $request
     * @param string $sessionId
     *
     * @return string
     * @throws Ubki\Exception
     */
    protected function formBody(Ubki\RequestInterface $request, string $sessionId): string
    {
        /** @var Request $request */
        $head = $request->getHead();
        $body = $request->getBody();
        $params = [
            Service::UBKI => [
                Service::ATTRIBUTES => [
                    Service::SESSION_ID => $sessionId,
                ],
                Service::REQUEST_ENVELOPE => [
                    Service::REQUEST_XML => [
                        Service::REQUEST => [
                            Service::ATTRIBUTES => [
                                Service::REQUEST_VERSION => $head->getVersion(),
                                Service::REQUEST_TYPE => $this->fetchEnum($head->getType()),
                                Service::REQUEST_REASON => $this->fetchEnum($head->getReason()),
                                Service::REQUEST_DATE => $this->convertDate($head->getDate()),
                                Service::PARTNER_ID => $head->getId(),
                                Service::REQUEST_INITIATOR => $this->fetchEnum($head->getInitiator())
                            ],
                            Service::UBKI_DATA => [
                                Service::COMPONENT => \array_merge(
                                    $this->formCredential($body->getCredential()),
                                    $this->formCredits($body->getCreditDeals()),
                                    $this->formCourtDecisions($body->getCourtDecisions()),
                                    $this->formCreditRequests($body->getCreditRequests(), $body->getRegistryTimes()),
                                    $this->formContacts($body->getContacts())
                                )
                            ]
                        ],
                    ],
                ],
            ],
        ];

        return ArrayToXml::convert($params, Service::DOC, true, 'utf-8');
    }

    protected function formCredential(Ubki\Data\Credential $credential): array
    {
        return $this->formComponent(Ubki\Block::IDENTIFICATION, [
            Ubki\Data\Credential::TAG => \array_filter([
                Service::ATTRIBUTES => [
                    Ubki\Data\Credential::LANGUAGE => $this->fetchEnum($credential->getLanguage()),
                    Ubki\Data\Credential::INN => $credential->getInn(),
                    Ubki\Data\Credential::SURNAME => $credential->getSurname(),
                    Ubki\Data\Credential::NAME => $credential->getName(),
                    Ubki\Data\Credential::PATRONYMIC => $credential->getPatronymic(),
                    Ubki\Data\Credential::BIRTH_DATE => $this->convertDate($credential->getBirthDate()),
                ],
                Ubki\Data\NaturalPerson::TAG => $this->collect(function (Ubki\Data\NaturalPerson $person): array {
                    return [
                        Service::ATTRIBUTES => [
                            Ubki\Data\NaturalPerson::CREATED_AT => $this->convertDate($person->getCreatedAt()),
                            Ubki\Data\NaturalPerson::LANGUAGE => $this->fetchEnum($person->getLanguage()),
                            Ubki\Data\NaturalPerson::INN => $person->getInn(),
                            Ubki\Data\NaturalPerson::NAME => $person->getName(),
                            Ubki\Data\NaturalPerson::PATRONYMIC => $person->getPatronymic(),
                            Ubki\Data\NaturalPerson::SURNAME => $person->getSurname(),
                            Ubki\Data\NaturalPerson::BIRTH_DATE => $this->convertDate($person->getBirthDate()),
                            Ubki\Data\NaturalPerson::GENDER => $this->fetchEnum($person->getGender()),
                            Ubki\Data\NaturalPerson::FAMILY_STATUS => $this->fetchEnum($person->getFamilyStatus()),
                            Ubki\Data\NaturalPerson::EDUCATION => $this->fetchEnum($person->getEducation()),
                            Ubki\Data\NaturalPerson::NATIONALITY => $this->fetchEnum($person->getNationality()),
                            Ubki\Data\NaturalPerson::REGISTRATION_SPD => $this->fetchEnum(
                                $person->getRegistrationSpd()
                            ),
                            Ubki\Data\NaturalPerson::SOCIAL_STATUS => $this->fetchEnum($person->getSocialStatus()),
                            Ubki\Data\NaturalPerson::CHILDREN_COUNT => $person->getChildrenCount(),
                        ]
                    ];
                }, $credential->getIdentifiers()->getNaturals()),
                Ubki\Data\LegalPerson::TAG => $this->collect(function (Ubki\Data\LegalPerson $person): array {
                    return [
                        Service::ATTRIBUTES => [
                            Ubki\Data\LegalPerson::CREATED_AT => $this->convertDate($person->getCreatedAt()),
                            Ubki\Data\LegalPerson::LANGUAGE => $this->fetchEnum($person->getLanguage()),
                            Ubki\Data\LegalPerson::ERGPOU => $person->getErgpou(),
                            Ubki\Data\LegalPerson::NAME => $person->getName(),
                            Ubki\Data\LegalPerson::FORM => $this->fetchEnum($person->getOwnership()),
                            Ubki\Data\LegalPerson::ECONOMY_BRANCH => $this->fetchEnum($person->getEconomyBranch()),
                            Ubki\Data\LegalPerson::ACTIVITY_TYPE => $person->getActivityType(),
                            Ubki\Data\LegalPerson::EDR_REGISTRATION_DATE => $this->convertDate(
                                $person->getEdrRegistrationDate()
                            ),
                            Ubki\Data\LegalPerson::TAX_REGISTRATION_DATE => $this->convertDate(
                                $person->getTaxRegistrationDate()
                            ),
                        ]
                    ];
                }, $credential->getIdentifiers()->getLegals()),
                Ubki\Data\LinkedPerson::TAG => $this->collect(function (Ubki\Data\LinkedPerson $person): array {
                    return [
                        Service::ATTRIBUTES => [
                            Ubki\Data\LinkedPerson::NAME => $person->getName(),
                            Ubki\Data\LinkedPerson::ERGPOU => $person->getErgpou(),
                            Ubki\Data\LinkedPerson::ISSUE_DATE => $this->convertDate($person->getIssueDate()),
                            Ubki\Data\LinkedPerson::ROLE => $this->fetchEnum($person->getRole()),
                        ]
                    ];
                }, $credential->getLinkedPersons()),
                Ubki\Data\Work::TAG => $this->collect(function (Ubki\Data\Work $work): array {
                    return [
                        Service::ATTRIBUTES => [
                            Ubki\Data\Work::CREATED_AT => $this->convertDate($work->getCreatedAt()),
                            Ubki\Data\Work::LANGUAGE => $this->fetchEnum($work->getLanguage()),
                            Ubki\Data\Work::RANK => $this->fetchEnum($work->getRank()),
                            Ubki\Data\Work::ERGPOU => $work->getErgpou(),
                            Ubki\Data\Work::NAME => $work->getName(),
                            Ubki\Data\Work::EXPERIENCE => $work->getExperience(),
                            Ubki\Data\Work::INCOME => $work->getIncome(),
                        ]
                    ];
                }, $credential->getWorks()),
                Ubki\Data\Document::TAG => $this->collect(function (Ubki\Data\Document $document): array {
                    return [
                        Service::ATTRIBUTES => [
                            Ubki\Data\Document::CREATED_AT => $this->convertDate($document->getCreatedAt()),
                            Ubki\Data\Document::LANGUAGE => $this->fetchEnum($document->getLanguage()),
                            Ubki\Data\Document::TYPE => $this->fetchEnum($document->getType()),
                            Ubki\Data\Document::ISSUE_DATE => $this->convertDate($document->getIssueDate()),
                            Ubki\Data\Document::NUMBER => $document->getNumber(),
                            Ubki\Data\Document::SERIAL => $document->getSerial(),
                            Ubki\Data\Document::TERMIN => $this->convertDate($document->getTermin()),
                            Ubki\Data\Document::ISSUE => $document->getIssue(),
                        ]
                    ];
                }, $credential->getDocuments()),
                Ubki\Data\Address::TAG => $this->collect(function (Ubki\Data\Address $address): array {
                    return [
                        Service::ATTRIBUTES => [
                            Ubki\Data\Address::CREATED_AT => $this->convertDate($address->getCreatedAt()),
                            Ubki\Data\Address::LANGUAGE => $this->fetchEnum($address->getLanguage()),
                            Ubki\Data\Address::TYPE => $this->fetchEnum($address->getAddressType()),
                            Ubki\Data\Address::INDEX => $address->getIndex(),
                            Ubki\Data\Address::HOUSE => $address->getHouse(),
                            Ubki\Data\Address::AREA => $address->getArea(),
                            Ubki\Data\Address::STATE => $address->getState(),
                            Ubki\Data\Address::CITY => $address->getCity(),
                            Ubki\Data\Address::FLAT => $address->getFlat(),
                            Ubki\Data\Address::FULL_ADDRESS => $address->getFullAddress(),
                            Ubki\Data\Address::CORPUS => $address->getCorpus(),
                            Ubki\Data\Address::CITY_TYPE => $this->fetchEnum($address->getCityType()),
                            Ubki\Data\Address::STREET => $address->getStreet(),
                            Ubki\Data\Address::COUNTRY => $address->getCountry(),
                        ]
                    ];
                }, $credential->getAddresses()),
                Ubki\Data\Photo::TAG => $this->collect(function (Ubki\Data\Photo $photo): array {
                    return [
                        Service::ATTRIBUTES => [
                            Ubki\Data\Photo::CREATED_AT => $this->convertDate($photo->getCreatedAt()),
                            Ubki\Data\Photo::INN => $photo->getInn(),
                            Ubki\Data\Photo::PHOTO => $photo->getUri(),
                        ]
                    ];
                }, $credential->getPhotos())
            ])
        ]);
    }

    protected function formCredits(Ubki\Data\Collection\CreditDeal $deals): array
    {
        return $this->formComponent(Ubki\Block::CREDITS, [
            Ubki\Data\CreditDeal::TAG => $this->collect(function (Ubki\Data\CreditDeal $deal): array {
                return [
                    Service::ATTRIBUTES => [
                        Ubki\Data\CreditDeal::LANGUAGE => $this->fetchEnum($deal->getLanguage()),
                        Ubki\Data\CreditDeal::TYPE => $this->fetchEnum($deal->getType()),
                        Ubki\Data\CreditDeal::SURNAME => $deal->getSurname(),
                        Ubki\Data\CreditDeal::BIRTH_DATE => $this->convertDate($deal->getBirthDate()),
                        Ubki\Data\CreditDeal::NAME => $deal->getName(),
                        Ubki\Data\CreditDeal::INN => $deal->getInn(),
                        Ubki\Data\CreditDeal::PATRONYMIC => $deal->getPatronymic(),
                        Ubki\Data\CreditDeal::ID => $deal->getId(),
                        Ubki\Data\CreditDeal::CURRENCY => $this->fetchEnum($deal->getCurrency()),
                        Ubki\Data\CreditDeal::COLLATERAL => $this->fetchEnum($deal->getCollateral()),
                        Ubki\Data\CreditDeal::COLLATERAL_COST => $deal->getCollateralCost(),
                        Ubki\Data\CreditDeal::INITIAL_AMOUNT => $deal->getInitialAmount(),
                        Ubki\Data\CreditDeal::REPAYMENT_PROCEDURE => $this->fetchEnum($deal->getRepaymentProcedure()),
                        Ubki\Data\CreditDeal::SOURCE => $deal->getSource(),
                        Ubki\Data\CreditDeal::SUBJECT_ROLE => $this->fetchEnum($deal->getSubjectRole()),
                    ],
                    Ubki\Data\DealLife::TAG => $this->collect(function (Ubki\Data\DealLife $period): array {
                        return [
                            Service::ATTRIBUTES => [
                                Ubki\Data\DealLife::ID => $period->getId(),
                                Ubki\Data\DealLife::ISSUE_DATE => $this->convertDate($period->getIssueDate()),
                                Ubki\Data\DealLife::STATUS => $this->fetchEnum($period->getStatus()),
                                Ubki\Data\DealLife::ACTUAL_END_DATE => $this->convertDate($period->getActualEndDate()),
                                Ubki\Data\DealLife::CURRENT_DEBT => $period->getCurrentDebt(),
                                Ubki\Data\DealLife::DELAY_INDICATION => $this->fetchEnum($period->getDelayIndication()),
                                Ubki\Data\DealLife::END_DATE => $this->convertDate($period->getEndDate()),
                                Ubki\Data\DealLife::LIMIT => $period->getLimit(),
                                Ubki\Data\DealLife::MANDATORY_PAYMENT => $period->getMandatoryPayment(),
                                Ubki\Data\DealLife::OVERDUE_TIME => $period->getOverdueTime(),
                                Ubki\Data\DealLife::CURRENT_OVERDUE_DEBT => $period->getCurrentOverdueDebt(),
                                Ubki\Data\DealLife::PAYMENT_DATE => $this->convertDate($period->getPaymentDate()),
                                Ubki\Data\DealLife::PAYMENT_INDICATION => $this->fetchEnum(
                                    $period->getPaymentIndication()
                                ),
                                Ubki\Data\DealLife::PERIOD_MONTH => $period->getPeriodMonth(),
                                Ubki\Data\DealLife::PERIOD_YEAR => $period->getPeriodYear(),
                                Ubki\Data\DealLife::TRANCHE_INDICATION => $this->fetchEnum(
                                    $period->getTrancheIndication()
                                ),
                            ]
                        ];
                    }, $deal->getDealLifes())
                ];
            }, $deals)
        ]);
    }

    protected function formCourtDecisions(Ubki\Data\Collection\CourtDecision $decisions): array
    {
        return $this->formComponent(Ubki\Block::COURT_DECISIONS, [
            Ubki\Data\CourtDecision::TAG => $this->collect(function (Ubki\Data\CourtDecision $decision): array {
                return [
                    Service::ATTRIBUTES => [
                        Ubki\Data\CourtDecision::INN => $decision->getInn(),
                        Ubki\Data\CourtDecision::CREATED_AT => $this->convertDate($decision->getCreatedAt()),
                        Ubki\Data\CourtDecision::ID => $decision->getId(),
                        Ubki\Data\CourtDecision::AREA => $decision->getArea(),
                        Ubki\Data\CourtDecision::DATE => $this->convertDate($decision->getDate()),
                        Ubki\Data\CourtDecision::COURT_NAME => $decision->getCourtName(),
                        Ubki\Data\CourtDecision::COURT_DEAL_TYPE => $this->fetchEnum($decision->getCourtDealType()),
                        Ubki\Data\CourtDecision::DOCUMENT_TYPE => $decision->getDocumentType(),
                        Ubki\Data\CourtDecision::LEGAL_FACT => $decision->getLegalFact(),
                        Ubki\Data\CourtDecision::SUBJECT_STATUS => $this->fetchEnum($decision->getSubjectStatus()),
                    ]
                ];
            }, $decisions)
        ]);
    }

    /**
     * @param Ubki\Data\Collection\CreditRequest $requests
     * @param Ubki\Data\RegistryTimes|null $registryTimes
     *
     * @return array
     * @throws Ubki\Exception
     */
    protected function formCreditRequests(
        Ubki\Data\Collection\CreditRequest $requests,
        ?Ubki\Data\RegistryTimes $registryTimes
    ): array {
        if (!empty($requests) && \is_null($registryTimes)) {
            throw new Ubki\Exception('Requests registry must be set if credits request is not empty');
        }

        return $this->formComponent(Ubki\Block::CREDIT_REQUESTS, [
            Ubki\Data\CreditRequest::TAG => $this->collect(function (Ubki\Data\CreditRequest $request): array {
                return [
                    Service::ATTRIBUTES => [
                        Ubki\Data\CreditRequest::DATE => $this->convertDate($request->getDate()),
                        Ubki\Data\CreditRequest::ID => $request->getId(),
                        Ubki\Data\CreditRequest::INN => $request->getInn(),
                        Ubki\Data\CreditRequest::REASON => $this->fetchEnum($request->getReason()),
                        Ubki\Data\CreditRequest::DECISION => $this->fetchEnum($request->getDecision()),
                        Ubki\Data\CreditRequest::ORGANIZATION => $request->getOrganization(),
                    ]
                ];
            }, $requests),
            Ubki\Data\RegistryTimes::TAG => [
                Service::ATTRIBUTES => [
                    Ubki\Data\RegistryTimes::BY_DAY => $registryTimes->getByDay(),
                    Ubki\Data\RegistryTimes::BY_HOUR => $registryTimes->getByHour(),
                    Ubki\Data\RegistryTimes::BY_MONTH => $registryTimes->getByMonth(),
                    Ubki\Data\RegistryTimes::BY_MORE_YEAR => $registryTimes->getByMoreYear(),
                    Ubki\Data\RegistryTimes::BY_QUARTER => $registryTimes->getByQuarter(),
                    Ubki\Data\RegistryTimes::BY_WEEK => $registryTimes->getByWeek(),
                    Ubki\Data\RegistryTimes::BY_YEAR => $registryTimes->getByYear(),
                ]
            ]
        ]);
    }

    protected function formContacts(Ubki\Data\Collection\Contact $contacts): array
    {
        return $this->formComponent(Ubki\Block::CONTACTS, [
            Ubki\Data\Contact::TAG => $this->collect(function (Ubki\Data\Contact $contact): array {
                return [
                    Service::ATTRIBUTES => [
                        Ubki\Data\Contact::CREATED_AT => $this->convertDate($contact->getCreatedAt()),
                        Ubki\Data\Contact::INN => $contact->getInn(),
                        Ubki\Data\Contact::TYPE => $this->fetchEnum($contact->getType()),
                        Ubki\Data\Contact::VALUE => $contact->getValue(),
                    ]
                ];
            }, $contacts)
        ]);
    }

    protected function formComponent(int $id, array $data)
    {
        return [
            \array_merge(
                [
                    Service::ATTRIBUTES => [
                        Service::COMPONENT_ID => $id,
                    ],
                ],
                $data
            ),
        ];
    }
}
