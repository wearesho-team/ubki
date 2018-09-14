<?php

namespace Wearesho\Bobra\Ubki\Validation;

use Wearesho\Bobra\Ubki\Infrastructure\Element;

/**
 * Class Rule
 * @package Wearesho\Bobra\Ubki\Validation
 */
abstract class Rule
{
    public const DATE_RULE = 1;

    /** @var array|null */
    protected $attributes;

    protected function __construct(array $attributes = null)
    {
        $this->attributes = $attributes;
    }

    abstract public function getPattern(): string;

    abstract public function getMessage(): string;

    abstract public function execute(Element &$element): bool;

    public function getAttributes(): array
    {
        $attributes = array_map(function (string $attribute) {
            return 'get' . strtoupper(substr($attribute, 0, 1)) . substr($attribute, 1);
        }, $this->attributes);

        return $attributes;
    }

//    public const NUMBER = 'number';
//    public const PATTERN = 'pattern';
//    public const TYPE = 'type';
//    public const REGEX = 'regex';
//    public const FUNC = 'func';
//
//    public const NUMERIC = 'numeric';
//
//    /**
//     * Validate birth_date and created_at dates
//     */
//    public const BDATE_VDATE = [
//        Rule::NUMBER => 1,
//        Rule::TYPE => Rule::REGEX,
//        Rule::PATTERN => '/^(19|20|21|22)\d\d-((0[1-9]|1[012])-(0[1-9]|[12]\\d)|(0[13-9]|1[012])-30|(0[13578]|1[02])-31)$/u', // phpcs:ignore
//    ];
//
//    /**
//     * Validate length of simple text
//     */
//    public const TEXT_250 = [
//        Rule::NUMBER => 3,
//        Rule::TYPE => Rule::REGEX,
//        Rule::PATTERN => '/(^[0-9A-Za-zйЙцЦуУкКеЕнНгГшШщЩзЗхХфФвВаАпПрРоОлЛдДжЖєЄяЯчЧсСмМиИтТьЬбБюЮэЭъЪёЁіїІЇєЄҐґЫы\s\\\"\–\—\-\.\;\:\,\`\№\(\)\&\+]{0,250}$)/u' // phpcs:ignore
//    ];
//
//    public const INTEGER = [
//        Rule::NUMBER => 8,
//        Rule::TYPE => Rule::FUNC,
//        Rule::PATTERN => Rule::NUMERIC,
//    ];
}
