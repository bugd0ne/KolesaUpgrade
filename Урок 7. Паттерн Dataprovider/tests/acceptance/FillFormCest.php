<?php

use Codeception\Example;
use Page\Acceptance\FormPage;
use Helper\BaseHelper;

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
        //data fro faker
        $userName = $I->initFaker()->firstName;
        $lastName = $I->initFaker()->lastName;
        $email = $I->initFaker()->email;
        $phoneKZ = $I->initFaker()->getPhoneKZ();
        $address = $I->initFaker()->address;
        $city = $I->initFaker()->city;
        $region = $I->initFaker()->region;
        $postal = $I->initFaker()->postcode;
        $creditCardNumber = $I->initFaker()->getCreditCardNumber();
        $securityCode = $I->initFaker()->getSecurityCode();


        $I->amOnPage('');
        $I->fillField(FormPage::$firstNameInput, $userName);
        $I->fillField(FormPage::$lastNameInput, $lastName);
        $I->fillField(FormPage::$emailInput, $email);
        $I->fillField(FormPage::$phoneNumberInput, $phoneKZ);
        $I->fillField(FormPage::$streetAddressInput, $address);
        $I->fillField(FormPage::$cityInput, $city);
        $I->fillField(FormPage::$stateInput, $region);
        $I->fillField(FormPage::$postalCodeInput, $postal);
        $I->click(sprintf(FormPage::$memberCheckBox, $dataProduct['product']));
        $I->click(FormPage::$creditRadioButton);
        $I->fillField(FormPage::$ccFirstNameInput, $userName);
        $I->fillField(FormPage::$ccLastNameInput, $lastName);
        $I->fillField(FormPage::$ccNumberInput, $creditCardNumber);
        $I->fillField(FormPage::$ccSecurityCodeInput, $securityCode);
        // $I->selectOption(FormPage::$ccExpirationMonthSelect, sprintf(FormPage::$ccExpirationMonthOption, $dataMonth['month']));
        $I->selectOption(FormPage::$ccExpirationMonthSelect, 'February');
        $I->selectoption(FormPage::$ccExpirationYearSelect, '2024');
        $I->fillField(FormPage::$ccStreetAddressInput, $address);
        $I->fillField(FormPage::$ccCityInput, $city);
        $I->fillField(FormPage::$ccStateInput, $region);
        $I->fillField(FormPage::$ccPostalCodeInput, $postal);
        $I->selectoption(FormPage::$ccCountrySelect, 'Russia');
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
