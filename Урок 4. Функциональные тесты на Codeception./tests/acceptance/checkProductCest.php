<?php

class checkProductCest
{
    // check product named "Bloose"
    public function checkProductBloose(AcceptanceTester $I)
    {
        $I->amOnPage('');
        $I->moveMouseOver('#homefeatured > li:nth-child(2) > div > div.left-block > div > a.product_img_link > img');
        $I->waitForElement('#homefeatured > li:nth-child(2) > div > div.left-block > div > a.quick-view');
        $I->click('#homefeatured > li:nth-child(2) > div > div.left-block > div > a.quick-view');
        $I->switchToIFrame('.fancybox-iframe');
        $I->seeElement('#product > div > div > div.pb-center-column.col-xs-12.col-sm-4 > h1');
        codecept_debug($I->grabTextFrom('#product > div > div > div.pb-center-column.col-xs-12.col-sm-4 > h1'));

    }
}
