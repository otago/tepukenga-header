<?php

namespace OP\Header\Model;

use SilverStripe\ORM\DataObject;
use SilverStripe\Versioned\Versioned;

class Header extends DataObject
{
    private static $db = [
        'Title' => 'Varchar(255)'
    ];

    private static $has_many = [
        'Items' => Item::class . ".Header",
        'TopItems' => Item::class . ".TopHeader"
    ];
}
