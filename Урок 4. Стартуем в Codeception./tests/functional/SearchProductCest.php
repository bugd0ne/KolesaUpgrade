<?php

class SearchProductCest
{
    // tests
    public function searchPrintedDress(FunctionalTester $I)
    {
        $I->amOnPage('');
        $I->seeElement('.search_query');
        $I->click('.search_query');
        $I->fillField("//input[@name='search_query']", "Printed Dress");
        $I->seeElement('.button-search');
        $I->click('.button-search');
        $I->seeNumberOfElements('#center_column > .product_list > .ajax_block_product > .product-container', '5');
    }
}
