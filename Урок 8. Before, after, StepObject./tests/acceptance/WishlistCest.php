<?php

use Page\Acceptance\AccountPage;
use Page\Acceptance\LoginPage;
use Page\Acceptance\MainPage;
use Page\Acceptance\WishlistsPage;

/**
 * Class for checking actions with and inside checklist on the site
 */
class WishlistCest
{
    /**
     * before runnig tests need to login on website
     */
    public function _before(\AcceptanceTester $I)
    {
        $loginPage = new LoginPage($I);

        $loginPage->signIn();
    }

    /**
     * const for quantity of products for adding it to wish list
     */
    public const PRODUCTS_NMB = 2;

    /**
     * checks adding aproduct to wishlist
     */
    public function checkAddToWishlist(AcceptanceTester $I)
    {
        $wishlistPage = new WishlistsPage($I);

        $I->amOnPage('');

        //add to wish step
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

        //mb another step?
        $I->click(MainPage::$userInfoButton);
        $I->seeInCurrentUrl(AccountPage::$URL);
        $I->waitForElementClickable(AccountPage::$myWishlistsButton);
        $I->click(AccountPage::$myWishlistsButton);
        $I->seeInCurrentUrl(WishlistsPage::$URL);
        $I->assertEquals($wishlistPage->getQtyOfAddedProducts(), self::PRODUCTS_NMB, "checks qty");
    }

/**
* after tests need to:
*   1. clear wish list
*   2. logout
*/
public function _after(\AcceptanceTester $I)
    {
        $wishlistPage = new WishlistsPage($I);

        $wishlistPage->clearWishlist();

        $loginPage1 = new LoginPage($I);
        
        $loginPage1->signOut();
    }
}