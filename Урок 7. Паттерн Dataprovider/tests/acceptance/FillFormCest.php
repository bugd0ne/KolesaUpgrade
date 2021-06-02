<?php

use Codeception\Example;
use Page\Acceptance\FormPage;

/**
 * class with test for filling form
 */
class FillFormCest
{

    /**
     * test checkig filling form with payment method that is "Credit card"
     * @dataProvider getProduct
     * @dataProvider getMonth
     */
    public function checkCreditCardPaymentmethod(AcceptanceTester $I, Example $dataProduct, Example $dataMonth)
    {
        $I->amOnPage('');
        $I->fillField(FormPage::$firstNameInput, 'John');
        $I->fillField(FormPage::$lastNameInput, 'Doe');
        $I->fillField(FormPage::$emailInput, 'john.doe@hotmail.com');
        $I->fillField(FormPage::$phoneNumberInput, '+4 (495) 345-234');
        $I->fillField(FormPage::$streetAddressInput, '23 Washington street');
        $I->fillField(FormPage::$streetAddress2Input, null);
        $I->fillField(FormPage::$cityInput, 'Caracas');
        $I->fillField(FormPage::$stateInput, 'Caracas');
        $I->fillField(FormPage::$postalCodeInput, '64753');
        $I->click(sprintf(FormPage::$memberCheckBox, $dataProduct['product']));
        $I->click(FormPage::$creditRadioButton);
        $I->fillField(FormPage::$ccFirstNameInput, 'John');
        $I->fillField(FormPage::$ccLastNameInput, 'Doe');
        $I->fillField(FormPage::$ccNumberInput, '555 444 333 2222');
        $I->fillField(FormPage::$ccSecurityCodeInput, '111');
        // $I->selectOption(FormPage::$ccExpirationMonthSelect, sprintf(FormPage::$ccExpirationMonthOption, $dataMonth['month']));
        $I->selectOption(FormPage::$ccExpirationMonthSelect, 'February');
        $I->selectoption(FormPage::$ccExpirationYearSelect, '2024');
        $I->fillField(FormPage::$ccStreetAddressInput, '23 Washington street');
        $I->fillField(FormPage::$ccStreetAddress2Input, null);
        $I->fillField(FormPage::$ccCityInput, 'Caracas');
        $I->fillField(FormPage::$ccStateInput, 'Caracas');
        $I->fillField(FormPage::$ccPostalCodeInput, '64753');
        $I->selectoption(FormPage::$ccCountrySelect, 'Peru');
        $I->click(FormPage::$registerButton);
        $I->waitForText('Good job');

    }

    /**
     * dataprovider function fro getting product to check
     */
    protected function getProduct(){
        
        $products = [
            ['product' => '#input_32_1004'],
            ['product' => '#input_32_1002']
        ];

        shuffle($products);
        return array_slice($products, 0, 1);
    }

    /*
    protected function getMonth(){
        $months = [
            ['month' => 'January'],
            ['month' => 'February'],
            ['month' => 'March'],
            ['month' => 'April'],
            ['month' => 'May'],
            ['month' => 'June'],
            ['month' => 'July'],
            ['month' => 'August'],
            ['month' => 'September'],
            ['month' => 'October'],
            ['month' => 'November'],
            ['month' => 'December']
        ];

        shuffle($months);
        return array_slice($months, 0, 1);
    }

    protected function getYear (){
        $months = [
            ['year' => '2021'],
            ['year' => '2022'],
            ['year' => '2023'],
            ['year' => '2023'],
            ['year' => '2024'],
            ['year' => '2025'],
            ['year' => '2026'],
            ['year' => '2027'],
            ['year' => '2028'],
            ['year' => '2029'],
            ['year' => '2030'],
        ];

        shuffle($years);
        return array_slice($years, 0, 1);
    }
    */
}
