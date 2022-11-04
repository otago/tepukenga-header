<?php

namespace OP\Header\Extensions;

use OP\Header\Model\Header;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\ORM\DataExtension;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;
use gorriecoe\Link\Models\Link as ModelsLink;
use SilverStripe\Forms\TextField;

class Link extends DataExtension
{
    private static $db = [
        'Sort' => 'Int',
        'Subtitle' => 'Varchar(255)',
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

    private static $summary_fields = [
        'Title',
        'Subtitle',
    ];

    private static $default_sort = 'Sort ASC';

    public function updateCMSFields(FieldList $fields)
    {
        $fields->addFieldToTab(
            'Root.Main',
            TextField::create('Subtitle'),
            'Type'
        );

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
