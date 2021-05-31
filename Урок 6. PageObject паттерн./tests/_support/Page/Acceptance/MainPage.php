<?php
namespace Page\Acceptance;
/**
 * class with elements and methods on MainPage
 */
class MainPage
{
    /**
     * URL of main page
     */
    public static $URL = '';

    /**
     * selector for menu of dreesses items
     */
    public static $dressesMenu = '#block_top_menu>ul>li:nth-child(2)';

    /**
     * selector for "Summer Dresses" item in menu
     */
    public static $summerDressesCatalog = '#block_top_menu>ul>li:nth-child(2) li:nth-child(3)';

    /**
     * Object of acceptance tester
     * @var \AcceptanceTester
     */
    protected $acceptanceTester;

    /**
     * constructor
     */
    public function __construct(\AcceptanceTester $I)
    {
        $this->acceptanceTester = $I;
    }
    
    /**
     * function which finds summer dresses tab menu the go to page SummerDressesPage
     */
    public function openSummerDressesPage(){
        $this->acceptanceTester->moveMouseOver(self::$dressesMenu);
        $this->acceptanceTester->click(self::$summerDressesCatalog);
        
        return new SummerDressesPage($this->acceptanceTester);
    }
}