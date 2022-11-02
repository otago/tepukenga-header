<?php

namespace OP\Header\Model;

use SilverStripe\ORM\DataObject;
use gorriecoe\Link\Models\Link;
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

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        if ($links = $fields->fieldByName("Root.Links.Links")) {
            $links->getConfig()->addComponent(new GridFieldOrderableRows());
        }

        if ($top_links = $fields->fieldByName("Root.TopLinks.TopLinks")) {
            $top_links->getConfig()->addComponent(new GridFieldOrderableRows());
        }

        return $fields;
    }
}
