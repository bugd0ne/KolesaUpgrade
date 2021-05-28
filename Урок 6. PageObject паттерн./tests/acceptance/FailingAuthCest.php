<?php

/**
 * Class for checking failing authorization
 */
class FailingAuthCest
{
    /**
    * Checking failed auth for locked user
    */
    public function lockedUserAuth(AcceptanceTester $I)
    {
        $I->amOnPage('#user-name');
        $I->fillField('#user-name','locked_out_user');
        $I->fillField('#password','secret_sauce');
        $I->click('login-button');
        $I->waitForElementVisible('.error-message-container');
        $I->click('.error-button');
        $I->dontSee('.error-message-container');
    }
}
