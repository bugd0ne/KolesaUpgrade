<?php
namespace Step\Acceptance;

use Page\Acceptance\MainPage;

/**
 * 
 */
class WishlistStep extends \AcceptanceTester
{
    /**
     * hardcoded value for number of products we need to add to wishlist in cycle
     */
    public const PRODUCTS_NMB = 2;

    /**
     * step for adding product to wishlist
     */
    public function addProductToWishlist(){
        $I=$this;

        for($i = 1; $i <= self::PRODUCTS_NMB; $i++){
            $I->waitForElement(sprintf(MainPage::$productCard, $i));
            $I->moveMouseOver(sprintf(MainPage::$productCard, $i));
            $I->waitForElement(sprintf(MainPage::$quickViewButton, $i));
            $I->click(sprintf(MainPage::$quickViewButton, $i));
            $I->switchToIFrame(MainPage::$productCardIframe);
            // TODO: refactor this hardcoded wait
            $I->wait(5);
            $I->waitForElement(MainPage::$addToWishlistButton);
            $I->click(MainPage::$addToWishlistButton);
            $I->waitForElement(MainPage::$closeMessageButton);
            $I->waitForElementClickable(MainPage::$closeMessageButton);
            $I->click(MainPage::$closeMessageButton);
            $I->switchToIFrame();
            $I->click(MainPage::$iframeCloseButton);
            // TODO: refactor this hardcoded wait
            $I->wait(5);
        }
    }
}