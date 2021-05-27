<?php

class CheckProductCest
{
    // check product named "Bloose"
    public function checkProductBloose(AcceptanceTester $I)
    {

        // #homefeatured > li:nth-child(2) > div > div.left-block > div > a.product_img_link > img
        $blouseCardCSS = "ul#homefeatured li:nth-child(2) img";
        $blouseCardXPath = "//ul[@id='homefeatured']//li[2]//img";

        // #homefeatured > li:nth-child(2) > div > div.left-block > div > a.quick-view
        $quickViewCSS = '#homefeatured li:nth-child(2) a.quick-view';
        $quickViewXPath = "//ul[@id='homefeatured']//li[2]//a[@class='quick-view']";

        // iframe selector
        $iFrameCSS = ".fancybox-iframe";
        $iFrameXPath = "//iframe[@class='fancybox-iframe']";

        // #product > div > div > div.pb-center-column.col-xs-12.col-sm-4 > h1
        $blouseHeaderCSS = "#product h1";
        $blouseHeaderXPath = "//body[@id='product']//h1";

        $I->amOnPage('');
        $I->scrollTo('#homefeatured > li:nth-child(2) > div > div.left-block > div > a.product_img_link > img');
        $I->moveMouseOver('#homefeatured > li:nth-child(2) > div > div.left-block > div > a.product_img_link > img');
        $I->waitForElementVisible('#homefeatured > li:nth-child(2) > div > div.left-block > div > a.quick-view');
        $I->click('#homefeatured > li:nth-child(2) > div > div.left-block > div > a.quick-view');
        $I->switchToIFrame('.fancybox-iframe');
        $I->seeElement('#product > div > div > div.pb-center-column.col-xs-12.col-sm-4 > h1');
        $I->waitForText("Blouse", 10, '#product > div > div > div.pb-center-column.col-xs-12.col-sm-4 > h1');
    }
}
