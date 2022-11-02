<?php

namespace OP\Header\Extensions;

use OP\Header\Model\Header;
use SilverStripe\ORM\DataExtension;

class Link extends DataExtension
{
    private static $has_one = [
        'Header' => Header::class,
        'TopHeader' => Header::class
    ];
}
