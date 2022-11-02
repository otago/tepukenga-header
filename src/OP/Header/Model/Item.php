<?php

namespace OP\Header\Model;

use SilverStripe\ORM\DataObject;
use SilverStripe\Versioned\Versioned;

class Item extends DataObject
{
    private static $db = [
        'Title' => 'Varchar(255)'
    ];

    private static $has_one = [
        'Header' => Header::class,
        'TopHeader' => Header::class
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeByName([
            'HeaderID',
            'TopHeaderID'
        ]);

        return $fields;
    }
}
