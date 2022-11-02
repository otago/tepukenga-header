<?php

namespace OP\Header\Model;

use SilverStripe\ORM\DataObject;
use gorriecoe\Link\Models\Link;

class Header extends DataObject
{
    private static $db = [
        'Title' => 'Varchar(255)'
    ];

    private static $has_many = [
        'Items' => Link::class . ".Header",
        'TopItems' => Link::class . ".TopHeader"
    ];
}
