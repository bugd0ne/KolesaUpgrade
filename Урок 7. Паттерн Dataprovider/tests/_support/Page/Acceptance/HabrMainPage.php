<?php
namespace Page\Acceptance;

class HabrMainPage
{
    /**
     * selector of flow link button
     * %s is used for substitute string value of a part of whole URL
     */
    public static $flowLinkButton = ('//*[contains(@href, "%s")]');

}
