<?php

namespace EventMaster;

/**
 * The admin class
 */
class Loader
{

    /**
     * Initialize the class
     */
    function __construct()
    {
        new Admin\Menu();
        new Shortcodes\Shortcodes();
    }
}
