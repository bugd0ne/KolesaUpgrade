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
        $mainPage = new MainPage($I);
        $accountPage = new AccountPage($I);

        $I->amOnPage('');
        $I->comment("I'm adding product to wislist");
        $I->addProductToWishlist();
        $mainPage->openMyAccount();
        $accountPage->openMyWishlists();
        $I->assertEquals($wishlistPage->getQtyOfAddedProducts(), WishlistStep::PRODUCTS_NMB, "Checking equality between actual and expected");
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

        $loginPage = new LoginPage($I);
        
        $loginPage->signOut();
    }
}