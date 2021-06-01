<?php
namespace Page\Acceptance;

/**
 * class with elements and methods on page with summer dresses
 */
class SummerDressesPage
{
    /**
     *  URL of page with summer dresses
     */
    public static $URL = '/index.php?id_category=11&controller=category';

    /**
     * default view of products
     */
    public static $defaultProductsView = '//li[contains(@class, "selected")]';

    /**
     * selector of button that show products in grid view
     */
    public static $gridViewButton = 'li#grid';

    /**
     * selector of products container in grid view
     */
    public static $productsGridContainer = 'ul.grid';

    /**
     * selector of button that show products in list view
     */
    public static $listViewButton = 'li#list';
    
    /**
     * selector of products container in list view
     */
    public static $productsListContainer = 'ul.list';

     /**
     * Object of acceptance tester
     * @var \AcceptanceTester
     */
    protected $acceptanceTester;

    /**
     * constructor
     */
    public function __construct(\AcceptanceTester $I){
        $this->acceptanceTester = $I;
    }

    /**
     * function which checks thta i'm on current page
     */
    public function onSummerDressesPage(){
        $this->acceptanceTester->seeInCurrentUrl(self::$URL);
        return $this;
    }

    /**
     * function which asserts default grid view on page
     */
    public function seeDefaultProductsView(){
        $this->acceptanceTester->seeElement(self::$gridViewButton);
        return $this;
    }

    /**
     * function which changes view from grid to list
     */
    public function changeViewToList(){
        $this->acceptanceTester->click(self::$listViewButton);
        return $this;
    }
}