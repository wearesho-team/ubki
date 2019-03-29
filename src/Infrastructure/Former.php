<?php

namespace Wearesho\Bobra\Ubki\Infrastructure;

/**
 * Class Former
 * @package Wearesho\Bobra\Ubki\Infrastructure
 */
abstract class Former implements FormerInterface
{
    use FormerHelperTrait;

    /** @var bool */
    protected $prettyPrint;

    /** @var \DOMDocument */
    protected $document;

    public function __construct(bool $prettyPrint = false)
    {
        $this->prettyPrint = $prettyPrint;
        $this->init();
    }

    protected function init(): void
    {
        $this->document = new \DOMDocument('1.0', 'utf-8');
        $this->document->formatOutput = $this->prettyPrint;
    }

    /**
     * @inheritdoc
     */
    abstract public function form(RequestInterface $request, string $sessionId): string;
}
