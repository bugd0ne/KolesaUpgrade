<?php
namespace Page\Acceptance;

class WishlistsPage
{
    /**
     * page with wishlists
     */
    public static $URL = '/index.php?fc=module&module=blockwishlist&controller=mywishlist';

    /**
     * qty of added products to wishlist
     */
    public static $qtyOfAddedProducts = '//td[contains(@class, "align_center")]';

    /**
     * delete all from wishlist button
     */
    public static $deleteAllProducts = '//td[@class="wishlist_delete"]/a';

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

    /**
     * function that grabs text from table where quantity of added products are
     */
    public function getQtyOfAddedProducts()
    {
        return $this->acceptanceTester->grabTextFrom(self::$qtyOfAddedProducts);
    }

    /**
     * clear wishlist
     */
    public function clearWishlist()
    {   
        $this->acceptanceTester->click(self::$deleteAllProducts);
        $this->acceptanceTester->acceptPopup();

        return $this;
    }


}
