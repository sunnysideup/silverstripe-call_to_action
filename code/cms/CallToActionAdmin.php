<?php

class CallToActionAdmin extends ModelAdmin
{
    public static $managed_models = array('CallToAction');

    public static $url_segment = 'calltoaction';

    public static $menu_title = 'Call To Action';

    // public static $menu_priority = 2;

    /* Prevent importing of CSV */
    public $showImportForm = false;
}
