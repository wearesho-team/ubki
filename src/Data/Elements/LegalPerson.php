<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Wearesho\Bobra\Ubki\Dictionaries;
use Wearesho\Bobra\Ubki\Data;

/**
 * Class LegalPerson
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
class LegalPerson extends IdentifiedPerson implements Data\Interfaces\LegalPerson
{
    use Data\Traits\LegalPerson;

    public function __construct(
        \DateTimeInterface $createdAt,
        Dictionaries\Language $language,
        string $name,
        string $ergpou = null,
        int $form = null,
        string $economyBranch = null,
        string $activityType = null,
        \DateTimeInterface $edrRegistrationDate = null,
        \DateTimeInterface $taxRegistrationDate = null
    ) {
        $this->ergpou = $ergpou;
        $this->form = $form;
        $this->economyBranch = $economyBranch;
        $this->activityType = $activityType;
        $this->edrRegistrationDate = $edrRegistrationDate;
        $this->taxRegistrationDate = $taxRegistrationDate;

        parent::__construct($createdAt, $language, $name);
    }
}
