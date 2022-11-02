<?php

namespace OP\Header\Extensions;

use OP\Header\Model\Header;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\ORM\DataExtension;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;
use gorriecoe\Link\Models\Link as ModelsLink;

class Link extends DataExtension
{
    private static $db = [
        'Sort' => 'Int'
    ];

    private static $has_one = [
        'Header' => Header::class,
        'TopHeader' => Header::class,
        'Link' => ModelsLink::class
    ];

    private static $has_many = [
        'Links' => ModelsLink::class
    ];

    private static $owns = [
        'Links'
    ];

    private static $cascade_deletes = [
        'Links'
    ];

    private static $default_sort = 'Sort ASC';

    public function updateCMSFields(FieldList $fields)
    {
        if ($this->owner->ID) {
            $links = GridField::create("Links", "Links", $this->owner->Links())
            ->setConfig(
                (new GridFieldConfig_RecordEditor())
                    ->addComponent(new GridFieldOrderableRows())
            );
            $fields->addFieldToTab("Root.Links", $links);
        }
    }
}
