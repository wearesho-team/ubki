<?php

namespace Wearesho\Bobra\Ubki\Data\Elements;

use Wearesho\Bobra\Ubki;

/**
 * Class LegalPerson
 * @package Wearesho\Bobra\Ubki\Data\Elements
 */
class LegalPerson extends IdentifiedPerson implements Ubki\Data\Interfaces\LegalPerson
{
    use Ubki\Data\Traits\LegalPerson;

    public function __construct(
        \DateTimeInterface $createdAt,
        Ubki\Dictionaries\Language $language,
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
