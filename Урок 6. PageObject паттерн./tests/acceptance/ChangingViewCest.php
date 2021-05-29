<?php

use Page\Acceptance\MainPage;
use Page\Acceptance\SummerDressesPage;

//use Page\Acceptance\SummerDressesPage;

/**
 * Class for checking when view with products are changing
 */
class ChangingViewCest
{

    /**
     * Checking changing view in serch result page
     */
    public function checkChangingGridToList(AcceptanceTester $I)
    {
        $mainPage = new MainPage($I);
        $summerDressesPage = new SummerDressesPage($I);
        $I->amOnPage(MainPage::$URL);
        $mainPage->openSummerDressesPage()
                 ->onSummerDressesPage()
                 ->seeDefaultProductsView();
        $I->seeElement(SummerDressesPage::$productsGridContainer);
        $I->seeElement(SummerDressesPage::$listViewButton);
        $summerDressesPage->changeViewToList();
        $I->waitForElement(SummerDressesPage::$productsListContainer);
    }
}
