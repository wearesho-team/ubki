<?php

namespace Wearesho\Bobra\Ubki\Pull;

use Carbon\Carbon;
use Wearesho\Bobra\Ubki\Pull\Response\Identification;

/**
 * Class Response
 *
 * @package Wearesho\Bobra\Ubki\Pull
 */
class Response
{
    /** @var Response\ContactCollection */
    protected $contacts;

    public function __construct(\DOMDocument $report)
    {
        $contactComponent = $report->getElementById(Response\Component::CONTACTS);
        $contactTags = $contactComponent->getElementsByTagName('cont');

        $contacts = new Response\ContactCollection();

        foreach ($contactTags as $contactTag) {
            $contacts->append(new Response\Contact(
                (string)$contactTag->cval,
                (string)$contactTag->ctyperef,
                (int)$contactTag->ctype,
                Carbon::parse((string)$contactTag->vdate)
            ));
        }

        $identificationComponent = $report->getElementById(Response\Component::IDENTIFICATION);
        $credentialTag = $identificationComponent->getElementsByTagName('cki')->item(0);
        $identificationDataTags = $credentialTag->getElementsByTagName('ident');
        $worksTags = $credentialTag->getElementsByTagName('work');
        $addressesTags = $credentialTag->getElementsByTagName('addr');

        $identifications = new Response\IdentificationCollection();

        foreach ($identificationDataTags as $dataTag) {
            /** @var \DOMElement $dataTag */
            $identifications->append(new Response\Identification(
                Carbon::parse($dataTag->getAttribute(Response\Identification::CREATED_AT)),
                (int)$dataTag->getAttribute(Response\Identification::LANGUAGE),
                $dataTag->getAttribute(Response\Identification::FIRST_NAME),
                $dataTag->getAttribute(Response\Identification::LAST_NAME),
                Carbon::parse($dataTag->getAttribute(Response\Identification::BIRTH_DATE)),
                (int)$dataTag->getAttribute(Response\Identification::GENDER),
                (int)$dataTag->getAttribute(Response\Identification::INN),
                $dataTag->getAttribute(Response\Identification::MIDDLE_NAME),
                (int)$dataTag->getAttribute(Response\Identification::FAMILY_STATUS),
                (int)$dataTag->getAttribute(Response\Identification::EDUCATION),
                (int)$dataTag->getAttribute(Response\Identification::NATIONALITY),
                (int)$dataTag->getAttribute(Response\Identification::SPD_REGISTRATION),
                (int)$dataTag->getAttribute(Response\Identification::SOCIAL_STATUS),
                (int)$dataTag->getAttribute(Response\Identification::CHILDREN_COUNT)
            ));
        }
    }

    protected function getContacts(): Response\ContactCollection
    {
        return $this->contacts;
    }
}
