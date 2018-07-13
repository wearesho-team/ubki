<?php

namespace Wearesho\Bobra\Ubki\Block;

use Wearesho\Bobra\Ubki\Collection;

/**
 * Class Credential
 * <cki> tag
 * @package Wearesho\Bobra\Ubki\Block
 */
class Credential
{
    public const TAG = 'cki';

    /** @var Collection\Identification */
    protected $identifications;

    /** @var Collection\Work */
    protected $works;

    /** @var Collection\Document */
    protected $documents;

    /** @var Collection\Address */
    protected $addresses;

    /** @var Collection\Photo */
    protected $photos;

    /**
     * Credential constructor.
     *
     * @param Collection\Identification $identifications
     * @param Collection\Work           $works
     * @param Collection\Document       $documents
     * @param Collection\Address        $addresses
     * @param Collection\Photo          $photos
     */
    public function __construct(
        Collection\Identification $identifications,
        Collection\Work $works,
        Collection\Document $documents,
        Collection\Address $addresses,
        Collection\Photo $photos
    ) {
        $this->identifications = $identifications;
        $this->works = $works;
        $this->documents = $documents;
        $this->addresses = $addresses;
        $this->photos = $photos;
    }

    public function getIdentifications(): Collection\Identification
    {
        return $this->identifications;
    }

    public function getWorks(): Collection\Work
    {
        return $this->works;
    }

    public function getDocuments(): Collection\Document
    {
        return $this->documents;
    }

    public function getAddresses(): Collection\Address
    {
        return $this->addresses;
    }

    public function getPhotos(): Collection\Photo
    {
        return $this->photos;
    }
}
