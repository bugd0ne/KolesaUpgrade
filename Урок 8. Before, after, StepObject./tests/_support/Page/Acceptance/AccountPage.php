<?php
namespace Page\Acceptance;

class AccountPage
{
    /**
     * url of account page
     */
    public static $URL = '/index.php?controller=my-account';

    /**
     * button to redirect to wishlists
     */
    public static $myWishlistsButton = '//li[@class="lnk_wishlist"]';

    /**
     * @var \AcceptanceTester
     */
    protected $acceptanceTester;

    /**
     * constructor method
     */
    public function __construct(\AcceptanceTester $I)
    {
        $this->acceptanceTester = $I;
    }

    /**
     * function for open my wishlists
     */
    public function openMyWishlists()
    {
        $this->acceptanceTester->waitForElementClickable(self::$myWishlistsButton);
        $this->acceptanceTester->click(self::$myWishlistsButton);

        return new WishlistsPage($this->acceptanceTester);
    }
}
