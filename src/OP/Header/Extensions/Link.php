<?php

namespace OP\Header\Extensions;

use OP\Header\Model\Link as ModelLink;
use SilverStripe\ORM\DataExtension;

class Link extends DataExtension
{
    private static $has_one = [
        'HeaderLink' => ModelLink::class
    ];
}
