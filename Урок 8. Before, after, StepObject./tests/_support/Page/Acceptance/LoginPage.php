<?php
namespace Page\Acceptance;

/**
 * page with elements for log in to site
 */
class LoginPage
{
    /**
     * hardcoded email for login
     */
    public const EMAIL = 'wekijaw203@flmcat.com';

    /**
     * hardcoded password for login
     */
    public const PASSWD = 'XJNFxep^Q$Rc';

    /**
     * url of login page
     */
    public static $URL = '/index.php?controller=authentication&back=my-account';

    /**
     * selector for input of user email
     */
    public static $emailInput = '//input[@id="email"]';

    /**
     * selector for input of user password
     */
    public static $passwordInput = '//input[@id="passwd"]';

    /**
     * selector button which sumbits log in
     */
    public static $signInButton = '//button[@id="SubmitLogin"]';

    /**
     * sign out button
     */
    public static $signOutButton = '//a[@class="logout"]';

    /**
     * sign in using hardcoded user
     */
    public function signIn()
    {
        $this->acceptanceTester->amOnPage(LoginPage::$URL);
        $this->acceptanceTester->fillField(self::$emailInput, self::EMAIL);
        $this->acceptanceTester->fillField(self::$passwordInput, self::PASSWD);
        $this->acceptanceTester->click(self::$signInButton);
        $this->acceptanceTester->seeInCurrentUrl('/index.php?controller=my-account');

        return $this;
    }
    
    /**
     * log out from current user
     */
    public function signOut()
    {
        $this->acceptanceTester->click(self::$signOutButton);

        return $this;
    }

    /**
     * @var \AcceptanceTester;
     */
    protected $acceptanceTester;

    public function __construct(\AcceptanceTester $I)
    {
        $this->acceptanceTester = $I;
    }
}
