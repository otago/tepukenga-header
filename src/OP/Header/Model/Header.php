<?php

namespace OP\Header\Model;

use SilverStripe\ORM\DataObject;
use gorriecoe\Link\Models\Link;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

class Header extends DataObject
{
    private static $db = [
        'Title' => 'Varchar(255)'
    ];

    private static $has_many = [
        'Links' => Link::class . ".Header",
        'TopLinks' => Link::class . ".TopHeader"
    ];

    private static $owns = [
        'Links',
        'TopLinks'
    ];

    private static $cascade_deletes = [
        'Links',
        'TopLinks'
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeByName("TopLinks");

        if ($this->owner->ID) {
            $links = GridField::create("Links", "Links", $this->owner->Links())
            ->setConfig(
                (new GridFieldConfig_RecordEditor())
                    ->addComponent(new GridFieldOrderableRows())
            );
            $fields->addFieldToTab("Root.Links", $links);
        }

        if ($this->owner->ID) {
            $links = GridField::create("TopLinks", "Links", $this->owner->TopLinks())
            ->setConfig(
                (new GridFieldConfig_RecordEditor())
                    ->addComponent(new GridFieldOrderableRows())
            );
            $fields->addFieldToTab("Root.Top", $links);
        }

        return $fields;
    }
}
