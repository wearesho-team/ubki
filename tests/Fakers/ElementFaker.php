<?php

namespace Wearesho\Bobra\Ubki\Tests\Fakers;

use Wearesho\Bobra\Ubki;

/**
 * Class ElementFaker
 * @package Wearesho\Bobra\Ubki\Tests\Fakers
 *
 * @method Ubki\Data\Elements\Address address(array $arguments)
 * @method Ubki\Data\Elements\Balance balance(array $arguments)
 * @method Ubki\Data\Elements\Comment comment(array $arguments)
 * @method Ubki\Data\Elements\Contact contact(array $arguments)
 * @method Ubki\Data\Elements\CourtDecision courtDecision(array $arguments)
 * @method Ubki\Data\Elements\Credential credential(array $arguments)
 * @method Ubki\Data\Elements\CreditDeal creditDeal(array $arguments)
 * @method Ubki\Data\Elements\CreditRequest creditRequest(array $arguments)
 * @method Ubki\Data\Elements\DealLife dealLife(array $arguments)
 * @method Ubki\Data\Elements\Document document(array $arguments)
 * @method Ubki\Data\Elements\IdentificationPerson identificationPerson(array $arguments)
 * @method Ubki\Data\Elements\InsuranceDeal insuranceDeal(array $arguments)
 * @method Ubki\Data\Elements\InsuranceEvent insuranceEvent(array $arguments)
 * @method Ubki\Data\Elements\LegalPerson legalPerson(array $arguments)
 * @method Ubki\Data\Elements\LinkedPerson linkedPerson(array $arguments)
 * @method Ubki\Data\Elements\NaturalPerson naturalPerson(array $arguments)
 * @method Ubki\Data\Elements\NegativeRatingFactors negativeRatingFactors(array $arguments)
 * @method Ubki\Data\Elements\Photo photo(array $arguments)
 * @method Ubki\Data\Elements\PositiveRatingFactors positiveRatingFactors(array $arguments)
 * @method Ubki\Data\Elements\RatingDescription ratingDescription(array $arguments)
 * @method Ubki\Data\Elements\RatingScore ratingScore(array $arguments)
 * @method Ubki\Data\Elements\RegistryTimes registryTimes(array $arguments)
 * @method Ubki\Data\Elements\RequestData requestData(array $arguments)
 * @method Ubki\Data\Elements\Work work(array $arguments)
 */
class ElementFaker
{
    /** @var array */
    protected $injectData;

    protected static $elements = [
        'address' => Ubki\Data\Elements\Address::class,
        'balance' => Ubki\Data\Elements\Balance::class,
        'comment' => Ubki\Data\Elements\Comment::class,
        'contact' => Ubki\Data\Elements\Contact::class,
        'courtDecision' => Ubki\Data\Elements\CourtDecision::class,
        'credential' => Ubki\Data\Elements\Credential::class,
        'creditDeal' => Ubki\Data\Elements\CreditDeal::class,
        'creditRequest' => Ubki\Data\Elements\CreditRequest::class,
        'dealLife' => Ubki\Data\Elements\DealLife::class,
        'document' => Ubki\Data\Elements\Document::class,
        'identificationPerson' => Ubki\Data\Elements\IdentificationPerson::class,
        'insuranceDeal' => Ubki\Data\Elements\InsuranceDeal::class,
        'insuranceEvent' => Ubki\Data\Elements\InsuranceEvent::class,
        'legalPerson' => Ubki\Data\Elements\LegalPerson::class,
        'linkedPerson' => Ubki\Data\Elements\LinkedPerson::class,
        'naturalPerson' => Ubki\Data\Elements\NaturalPerson::class,
        'negativeRatingFactors' => Ubki\Data\Elements\NegativeRatingFactors::class,
        'photo' => Ubki\Data\Elements\Photo::class,
        'positiveRatingFactors' => Ubki\Data\Elements\PositiveRatingFactors::class,
        'ratingDescription' => Ubki\Data\Elements\RatingDescription::class,
        'ratingScore' => Ubki\Data\Elements\RatingScore::class,
        'registryTimes' => Ubki\Data\Elements\RegistryTimes::class,
        'requestData' => Ubki\Data\Elements\RequestData::class,
        'work' => Ubki\Data\Elements\Work::class,
    ];

    public function __construct(array $injectData = [])
    {
        $this->injectData = $injectData;
    }

    public function make(string $elementName): Ubki\Infrastructure\Element
    {
        return new $elementName(...$this->injectData);
    }

    public function __call($name, $arguments)
    {
        if (!isset(static::$elements[$name])) {
            return new $name(...array_shift($arguments));
        } else {
            return new static::$elements[$name](...array_shift($arguments));
        }
    }
}
