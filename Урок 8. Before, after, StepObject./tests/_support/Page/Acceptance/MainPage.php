<?php
namespace Page\Acceptance;

/**
 * class with objects on main page of the site
 */
class MainPage
{
    /**
     * selector of first product card
     */
    public static $productCard = '//ul[@id="homefeatured"]//li[contains(@class, "ajax_block_product")][%s]';

    /**
     * selector for button for quick view of product
     */
    public static $quickViewButton = '//ul[@id="homefeatured"]//li[%s]//a[@class="quick-view"]';

    /**
     * selector for iframe with info of product
     */
    public static $productCardIframe = '.fancybox-iframe';

    /**
     * selector for button which adds product to wishlist
     */
    public static $addToWishlistButton = '//a[@id="wishlist_button"]';

    /**
     * closes message about succesfully added product to wish list
     */
    public static $closeMessageButton = '//body[@id="product"]//a[@title="Close"]';

    /**
     * closes iframe windows
     */
    public static $iframeCloseButton = '#index > div.fancybox-overlay.fancybox-overlay-fixed > div > div > a';

    /**
     * button redirectiong to account page
     */
    public static $userInfoButton = '//div[@class="header_user_info"][1]';

        /**
     * @var \AcceptanceTester;
     */
    protected $acceptanceTester;

    /**
     * constructor method
     */
    public function __construct(\AcceptanceTester $I)
    {
        $this->acceptanceTester = $I;
    }
}
