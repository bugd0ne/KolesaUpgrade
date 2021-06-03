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
     * @param Example $data
     * @dataProvider getDataForForm
     */
    public function checkCreditCardPaymentmethod(AcceptanceTester $I, Example $data, Example $dataMonth)
    {
        //data for faker
        $userName = $I->initFaker('ru_RU')->firstName;
        $lastName = $I->initFaker('ru_RU')->lastName;
        $email = $I->initFaker('ru_RU')->email;
        $phoneKZ = $I->initFaker('ru_RU')->getPhoneKZ();
        $address = $I->initFaker('ru_RU')->address;
        $city = $I->initFaker('ru_RU')->city;
        $region = $I->initFaker('ru_RU')->region;
        $postal = $I->initFaker('ru_RU')->postcode;
        $creditCardNumber = $I->initFaker('ru_RU')->getCreditCardNumber();
        $securityCode = $I->initFaker('ru_RU')->getSecurityCode();
        $country = $I->initFaker('en_US')->country();
        $month = $I->initFaker('en_US')->monthName();
        $year = $I->initFaker('en_US')->getExpirationYear();


        $I->amOnPage('');
        $I->fillField(FormPage::$firstNameInput, $userName);
        $I->fillField(FormPage::$lastNameInput, $lastName);
        $I->fillField(FormPage::$emailInput, $email);
        $I->fillField(FormPage::$phoneNumberInput, $phoneKZ);
        $I->fillField(FormPage::$streetAddressInput, $address);
        $I->fillField(FormPage::$cityInput, $city);
        $I->fillField(FormPage::$stateInput, $region);
        $I->fillField(FormPage::$postalCodeInput, $postal);
        $I->click(sprintf(FormPage::$memberCheckBox, $data['data']));
        $I->click(FormPage::$creditRadioButton);
        $I->fillField(FormPage::$ccFirstNameInput, $userName);
        $I->fillField(FormPage::$ccLastNameInput, $lastName);
        $I->fillField(FormPage::$ccNumberInput, $creditCardNumber);
        $I->fillField(FormPage::$ccSecurityCodeInput, $securityCode);
        $I->selectOption(FormPage::$ccExpirationMonthSelect, $month);
        $I->selectoption(FormPage::$ccExpirationYearSelect, $year);
        $I->fillField(FormPage::$ccStreetAddressInput, $address);
        $I->fillField(FormPage::$ccCityInput, $city);
        $I->fillField(FormPage::$ccStateInput, $region);
        $I->fillField(FormPage::$ccPostalCodeInput, $postal);
        $I->selectoption(FormPage::$ccCountrySelect, $country);
        $I->click(FormPage::$registerButton);
        $I->waitForText('Good job');

    }

    /**
     * dataprovider function for getting product to check in box
     */
    protected function getDataForForm(){
        
        $data = [
            ['data' => '#input_32_1004'],
            ['data' => '#input_32_1002']
        ];

        shuffle($data);
        return array_slice($data, 0, 1);
    }
}
