<?php

declare(strict_types=1);

namespace Wearesho\Bobra\Ubki\Data;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki;

/**
 * Class Photo
 * @package Wearesho\Bobra\Ubki\Data
 *
 * @method static Photo make(...$arguments)
 */
class Photo implements Ubki\Contract\Data\Photo, \JsonSerializable
{
    use Makeable, Tagable;

    /** @var \DateTimeInterface */
    protected $createdAt;

    /** @var string */
    protected $uri;

    /** @var string|null */
    protected $inn;

    public function __construct(\DateTimeInterface $createdAt, string $uri, string $inn = \null)
    {
        Ubki\Validator::INN()->validate($inn, \true);

        $this->createdAt = $createdAt;
        $this->uri = $uri;
        $this->inn = $inn;
    }

    public function jsonSerialize(): array
    {
        return [
            'createdAt' => Carbon::make($this->createdAt),
            'uri' => $this->uri,
            'inn' => $this->inn,
        ];
    }

    public static function tag(): string
    {
        return 'foto';
    }

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function getInn(): ?string
    {
        return $this->inn;
    }
}
