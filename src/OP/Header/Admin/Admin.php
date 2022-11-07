<?php

namespace OP\Header\Admin;

use OP\Header\Model\Header;
use SilverStripe\Admin\ModelAdmin;

class Admin extends ModelAdmin
{
    private static $menu_title = 'Headers';
    private static $url_segment = 'headers';

    private static $menu_icon_class = 'font-icon-columns';

    private static $managed_models = [
        Header::class
    ];
}
