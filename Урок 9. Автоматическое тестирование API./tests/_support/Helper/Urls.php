<?php
namespace Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class Urls extends \Codeception\Module
{
    /**
     * value for POST request
     */
    public static $POST = '/human';

    /**
     * value for GET request
     */
    public static $GET = '/people';

    /**
     * value for PUT request
     */
    public static $PUT = '/human?_id=';

    /**
     * value for PUT request
     */
    public static $DELETE = '/human?_id=';
}
