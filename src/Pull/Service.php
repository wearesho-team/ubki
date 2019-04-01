<?php

namespace Wearesho\Bobra\Ubki\Pull;

use Carbon\Carbon;
use GuzzleHttp;
use Psr\Log;
use Spatie\ArrayToXml\ArrayToXml;
use Wearesho\Bobra\Ubki;

/**
 * Class Service
 * @package Wearesho\Bobra\Ubki\Pull
 *
 * @property ConfigInterface $config;
 */
class Service extends Ubki\Service implements ServiceInterface
{
    public const ROOT = 'doc';
    public const IMPORT_WRAPPER = 'i';
    public const MVD = 'mvd';
    public const BLACK_PHONES = 'bphone';
    public const PHONE = 'phone';

    public function __construct(
        ConfigInterface $config,
        Ubki\Authorization\ProviderInterface $authProvider,
        GuzzleHttp\ClientInterface $client,
        Log\LoggerInterface $logger = null
    ) {
        parent::__construct($config, $authProvider, $client, $logger);
    }

    /**
     * @param Request $request
     *
     * @return Ubki\RequestResponsePair
     * @throws Ubki\Exception\Request
     */
    public function import(Request $request): Ubki\RequestResponsePair
    {
        return $this->send($this->config->getPullUrl(), $request);
    }

    /**
     * @param Request|Ubki\RequestInterface $request
     * @param string $sessionId
     *
     * @return string
     * @throws \DOMException
     */
    protected function formBody(Ubki\RequestInterface $request, string $sessionId): string
    {
        /** @var Request\Head $head */
        $head = $request->getHead();
        $requestContent = $request->getBody();
        $identification = $requestContent->getIdentification();
        $params = [
            static::UBKI => [
                static::ATTRIBUTES => [
                    static::SESSION_ID => $sessionId,
                ],
                static::REQUEST_ENVELOPE => [
                    static::REQUEST_XML => [
                        static::REQUEST => [
                            static::ATTRIBUTES => [
                                static::REQUEST_TYPE => $head->getType()->getValue(),
                                static::REQUEST_REASON => $head->getReason()->getValue(),
                                static::REQUEST_DATE => Carbon::instance($head->getDate())->toDateString(),
                            ],
                            static::IMPORT_WRAPPER => \array_merge(
                                [
                                    static::ATTRIBUTES => [
                                        static::REQUEST_LANGUAGE => $requestContent->getLanguage()->getValue(),
                                    ],
                                    Element\Identification::TAG => [
                                        static::ATTRIBUTES => [
                                            Element\Identification::INN => $identification->getInn(),
                                            Element\Identification::NAME => $identification->getName(),
                                            Element\Identification::PATRONYMIC => $identification->getPatronymic(),
                                            Element\Identification::SURNAME => $identification->getSurname(),
                                            Element\Identification::BIRTH_DATE => $identification->getBirthDate(),
                                        ],
                                    ],
                                ],
                                $this->fetchContacts($requestContent),
                                $this->fetchDocuments($requestContent),
                                [
                                    static::MVD => null,
                                    static::BLACK_PHONES => [
                                        static::ATTRIBUTES => [
                                            static::PHONE => null,
                                        ],
                                    ],
                                ]
                            ),
                        ],
                    ],
                ],
            ],
        ];

        $parser = new ArrayToXml($params, static::ROOT, true, 'utf-8');
        $document = $parser->toDom();

        $requestElm = $document->getElementsByTagName(static::REQUEST)[0];
        $requestXML = clone $document;
        $requestXML->getElementsByTagName(static::REQUEST_XML)
            ->item(0)->textContent = \base64_encode($document->saveXML($requestElm));

        return $requestXML->saveXML();
    }

    protected function fetchContacts(Element\RequestContentInterface $requestContent): array
    {
        return $this->formCollection(
            Collection\Contact::TAG,
            Element\Contact::TAG,
            $this->collect(function (Element\Contact $contact): array {
                return [
                    static::ATTRIBUTES => [
                        Element\Contact::TYPE => $contact->getType()->getValue(),
                        Element\Contact::VALUE => $contact->getValue()
                    ],
                ];
            }, $requestContent->getContacts())
        );
    }

    protected function fetchDocuments(Element\RequestContentInterface $requestContent): array
    {
        return $this->formCollection(
            Collection\Document::TAG,
            Element\Document::TAG,
            $this->collect(function (Element\Document $document): array {
                return [
                    static::ATTRIBUTES => [
                        Element\Document::TYPE => $document->getType()->getValue(),
                        Element\Document::SERIAL => $document->getSerial(),
                        Element\Document::NUMBER => $document->getNumber(),
                    ],
                ];
            }, $requestContent->getDocuments())
        );
    }
}
