# UBKI Integration Changelog

## Dev

TODO

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
    - RequestHead;
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
