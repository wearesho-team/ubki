# UBKI Integration Changelog

## 0.3.0 Dev
### Added:
#### Exceptions
- `Exception\Former`;
- `Exception\Request`.
#### - Dependencies
- [wearesho-team/base-collection:^1.0](https://github.com/wearesho-team/base-collection)
#### - Data
- [Elements](src/Data/Element), [Interfaces](src/Data/Interfaces) and [Traits](src/Data/Traits):
    - Trace;
    - Balance;
    - Step;
    - Tech.
#### - Authorization
- Implementation of method `public getMode(): int` to [EnvironmentConfigTrait](src/Authorization/EnvironmentConfigTrait.php);
- [ValidateModeTrait](src/Authorization/ValidateModeTrait.php) for eliminating implementation duplication of 
 `protected validateMode(): void` method;
#### - Pull
- Service class, interface and trait;
- Request class, interface and trait;
- Former class and interface;
- Elements and collections for requests;
#### - Infrastructure
- Abstract Service to sending requests to UBKI;
- RequestInterface;
- BlockInterface;
- ElementTrait;
- ExceptionInterface;
- Former;
- FormerHelperTrait;
- FormerInterface;
- NullableEnum;
### Backward compatible changes:
- [Carbon\Carbon](https://github.com/briannesbitt/Carbon) updated required version from `^1.26` to `1.36`
- [MyCLabs\Enum](https://github.com/myclabs/php-enum) updated required version from `^1.5` to `1.6.4`
- Method `public getMode(): int` removed from [Push\ConfigInterface](src/Push/ConfigInterface.php)
and [Pull\ConfigInterface](src/Pull/ConfigInterface.php) to base interface
[Authorization\ConfigInterface](src/Authorization/ConfigInterface.php) for eliminating declaration duplication;
- Constants `public MODE_PRODUCTION` and `public MODE_TEST` removed from [Push\ConfigInterface](src/Push/ConfigInterface.php)
and [Pull\ConfigInterface](src/Pull/ConfigInterface.php) to trait
[Authorization\ConfigInterface](src/Authorization/ConfigInterface.php) for eliminating declaration duplication;
- Property `int $mode` and getter method `public getMode(): int` removed from [Push\ConfigTrait](src/Push/ConfigTrait.php)
and [Pull\ConfigTrait](src/Pull/ConfigTrait.php) to trait
[Authorization\ConfigTrait](src/Authorization/ConfigTrait.php) for eliminating implementation duplication;
- Method `public isProductionMode()` removed from [Push\ConfigTrait](src/Push/ConfigTrait.php) to
[Authorization\ConfigTrait](src/Authorization/ConfigTrait.php) for eliminating implementation duplication in 
[Pull\ConfigTrait](src/Pull/ConfigTrait.php);
- All collections now extends from dependency [BaseCollection](https://github.com/wearesho-team/base-collection)
- Downgrade typehint in [Element\RatingDescription](src/Data/Element/RatingDescription.php) of one property from 
`Carbon` to `\DateTimeInterface`;
- Downgrade typehint in [Element\RatingScore](src/Data/Element/RatingScore.php) of two properties from `Carbon` to
`\DateTimeInterface`;
- class `Infrastructure\Block` at now implement `Infrastructure\BlockInterface`;
### Backward incompatible changes:
- Renamed folder `Data\Elements` to `Data\Element`;
- Renamed folder `Data\Collections` to `Data\Collection`;
- Renamed folder `Data\Blocks` to `Data\Block`;
- Renamed folder `Dictionaries` to `Dictionary`;
- `UnsupportedModeException` renamed to `UnsupportedMode` and replaced to [Exception](src/Exception) folder.
To fix BC you need replace `Ubki\UnsupportedModeException` to `Ubki\Exception\UnsupportedMode`;
- Removed unnecessary implementation of `jsonSerialize(): array` method in every class that instance
of [Infrastructure\Element](src/Element.php) to [Infrastructure\Element](src/Element.php);
- Changed [Block\CreditRating](src/Data/Block/CreditRating.php) `jsonSerialize(): array` result;
- Renamed `getCreditCollection()` to `getDeals()` in class [Block\CreditsInformation](src/Data/Block/CreditsInformation.php);
- Renamed `Block\CreditRegistersInformation` to [Block\CreditsRequestsInformation](src/Data/Block/CreditsRequestsInformation.php);
- Renamed `Element\CreditRegister` to [Element\CreditRequest](src/Data/Element/CreditRequest.php);
- All constants `TAG` removed from interfaces to declared classes, that implement it interface. It was made to eliminate
mass implementation duplications of method `tag(): string`. Implementation of this method removed to abstract
[Infrastructure\Element](src/Element.php) class;
- Removed property `$previousDate` from [Element\RatingScore](src/Data/Element/RatingScore.php);
- Removed `Ubki\Element` to `Ubki\Infrastructure\Element`;
- Removed `Ubki\Push\Export\RequestException` to `Ubki\Exception\Request`;
- Removed `Infrastructure\BaseCollection` because of adding it as dependency;
- Removed `Push\Export\Converter`;
- Removed `$tech` property and getter from `Export\DataDocument`;
- Removed `Push\Export\Error` to `Push\Error\Entity`;
- Removed `Push\Export\ErrorCollection` to `Push\Error\Collection`;
- IMPORTANT! `Push\Export\Service::send(...)` method renamed to `Push\Export\Service::export(...)`;
- Removed `RequestInterface` from core folder;
- Removed `SendService` from core folder;
- Removed `SendServiceInterface` from core folder;

## 0.2.1 Unstable
### Fixed:
- [MyCLabs\Enum](https://github.com/myclabs/php-enum) version compatibility

## 0.2.0 Unstable
### Added:
#### - Data
- [Elements](src/Data/Element), [Interfaces](src/Data/Interfaces) and [Traits](src/Data/Traits)
    - Address;
    - Comment;
    - Contact;
    - CourtDecision;
    - Credential;
    - CreditDeal;
    - CreditRequest;
    - DealLife;
    - Document;
    - IdentificationPerson;
    - InsuranceDeal;
    - InsuranceEvent;
    - LegalPerson;
    - LinkedPerson;
    - NaturalPerson;
    - NegativeRatingFactors;
    - Photo;
    - PositiveRatingFactors;
    - RatingDescription;
    - RatingScore;
    - RegistryTimes;
    - RequestData;
    - Work.
#### - Push
- Error entity and collection;
- Config trait and interface;
- Custom config;
- Environment config;
- Export service:
    - Request class, trait and interface;
    - Response class, trait and interface;
    - Document data class, trait and interface;
    - Error parser;
    - Service logic;
    - Request exception;
    - Request converter.
- Registry service:
    - Base response interface and trait;
    - Base request interface and trait;
    - REP request-response:
        - Response class, trait and interface;
        - Request class;
    - Invalid operation date format exception (thrown when configured date is incorrect);
    - Invalid response xml format exception (thrown when response from UBKI service contain body in invalid format);
    - Request exception
    - Response parser;
    - Request response pair object (return by service after successful send document)
    - Operation type enum;
    - Response state enum;
    - Response collection;
    - Service class and interface;
    - Unknown error exception;
    - Unsupported request exception (if given request object was incorrectly formed).
#### - Authorization service provider
- Config interface;
- Config trait;
- Environment config trait.
#### - Library core
- Unsupported mode exception (Thrown when set mode is incorrect);
- Integrate [MyCLabs\Enum](https://github.com/myclabs/php-enum) dependency for references.
### Backward compatible changes:
- Update required version of [horat1us/environment-config](https://github.com/Horat1us/environment-config) from `^1.1` to `^1.2`;
### Backward incompatible changes:
#### - Authorization service provider
- Provider is no longer used as a separate "provider". It is configured as a "service provider".
It must be injected as dependency for Push or Pull services;
- The provider no longer contains fields for configuration. It is used as a required parameter of the methods. 
This is done to be able to use the authorization as an independent provider;
- Replace method `isProductionMode(): bool` to config trait;
- Remove argument `Ubki\ConfigInterface $config` from provider constructor;
- Add required argument to `Provider::provide()` to `Provider::provide(Ubki\ConfigInterface $config)`.
### Internal:
- Add and refactor tests.

## 0.1.0 Unstable
### Added:
#### - Authorization service
- Exception class;
- Response class;
- Provider;
- CacheProvider that extends Provider and use simple cache to store api key.
- Language interface with short codes of languages.
#### - Library core
- Base exception with public message;
- Custom config;
- Environment config;
- Tests and configurations for them.
