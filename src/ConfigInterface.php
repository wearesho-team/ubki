<?php

namespace Wearesho\Bobra\Ubki;

/**
 * Interface ConfigInterface
 * @package Wearesho\Bobra\Ubki
 */
interface ConfigInterface
{
    public const PRODUCTION_AUTH_URL = 'https://secure.ubki.ua/b2_api_xml/ubki/auth';
    public const PRODUCTION_PULL_URL = 'https://secure.ubki.ua/b2_api_xml/ubki/xml';
    public const PRODUCTION_PUSH_URL = ''; // todo: fill this const

    public const TEST_AUTH_URL = 'https://secure.ubki.ua:4040/b2_api_xml/ubki/auth';
    public const TEST_PULL_URL = 'https://secure.ubki.ua:4040/b2_api_xml/ubki/xml';
    public const TEST_PUSH_URL = 'https://secure.ubki.ua:4040/upload/data/xml';

    public function getUsername(): string;

    public function getPassword(): string;

    public function getAuthUrl(): string;

    public function getPullUrl(): string;

    public function getPushUrl(): string;
}
