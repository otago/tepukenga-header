<?php

namespace OP\Header\Extensions;

use OP\Header\Model\Header;
use SilverStripe\ORM\DataExtension;

class SiteConfig extends DataExtension
{
    public function getHeader()
    {
        return Header::get()->First();
    }
}
