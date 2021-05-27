<?php

class SearchProductCest
{
    // tests
    public function searchPrintedDress(FunctionalTester $I)
    {

        // .search_query === //input[@name='search_query'] replaced with one selector
        $searchBoxCSS = "#search_query_top";
        $searchBoxXPath = "//input[@id='search_query_top']";

        // .button-search
        $buttonSearchCSS = "button[name=submit_search]";
        $buttonSearchXPath = "//button[@name='submit_search']";

        // #center_column > .product_list > .ajax_block_product > .product-container
        $elementsCSS = "ul.product_list .product-container";
        $elementsXPath = "//div[@class='product-container']";


        $I->amOnPage('');
        $I->seeElement('.search_query');
        $I->click('.search_query');
        $I->fillField("//input[@name='search_query']", "Printed Dress");
        $I->seeElement('.button-search');
        $I->click('.button-search');
        $I->seeNumberOfElements('#center_column > .product_list > .ajax_block_product > .product-container', '5');
    }
}
