<?php

namespace OP\Header\Extensions;

use OP\Header\Model\Header;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataExtension;

class Page extends DataExtension
{
    private static $has_one = [
        'Header' => Header::class
    ];

    public function updateCMSFields(FieldList $fields)
    {
        $fields->addFieldToTab(
            "Root.Header",
            DropdownField::create(
                "HeaderID",
                "Header",
                Header::get()->map()->toArray('ID', 'Title')
            )
                ->setHasEmptyDefault(true)
                ->setDescription("Leave empty to inherit from parent page")
        );
    }

    public function getTepukengaHeader()
    {
        if ($this->owner->Header()->ID) {
            return $this->owner->Header();
        } else if ($this->owner->Parent()) {
            return $this->owner->Parent()->TepukengaHeader;
        }
    }
}
