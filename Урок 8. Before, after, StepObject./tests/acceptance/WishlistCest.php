<?php

use Page\Acceptance\AccountPage;
use Page\Acceptance\LoginPage;
use Page\Acceptance\MainPage;
use Page\Acceptance\WishlistsPage;
use Step\Acceptance\WishlistStep;

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
     * checks adding aproduct to wishlist
     */
    public function checkAddToWishlist(\Step\Acceptance\WishlistStep $I)
    {
        $wishlistPage = new WishlistsPage($I);

        $I->amOnPage('');
        $I->comment("I'm adding product to wislist");
        $I->addProductToWishlist();
        //mb another step?
        $I->click(MainPage::$userInfoButton);
        $I->seeInCurrentUrl(AccountPage::$URL);
        $I->waitForElementClickable(AccountPage::$myWishlistsButton);
        $I->click(AccountPage::$myWishlistsButton);
        $I->seeInCurrentUrl(WishlistsPage::$URL);
        $I->assertEquals($wishlistPage->getQtyOfAddedProducts(), WishlistStep::PRODUCTS_NMB, "checks qty");
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