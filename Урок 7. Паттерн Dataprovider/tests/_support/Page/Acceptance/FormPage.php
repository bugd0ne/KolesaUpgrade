<?php
namespace Page\Acceptance;

class FormPage
{
    /**
     * selector for input field where need to fill first name
     */
    public static $firstNameInput = '#firstName';

    /**
     * selector for input field where need to fill last name
     */
    public static $lastNameInput = '#lastName';

    /**
     * selector for input field where need to fill email
     * for example: myname@example.com
     */
    public static $emailInput = 'input[type=email]';

    /**
     * selector for input field where need to fill phone number
     */
    public static $phoneNumberInput = '#phoneNumber';

    /**
     * selector for input field where need to fill street address
     */
    public static $streetAddressInput = '#address';

    /**
     * selector for input field where need to fill 2nd street address (optionally)
     */
    public static $streetAddress2Input = '#addr_line2';

    /**
     * selector for input field where need to fill city
     */
    public static $cityInput = '#city';

    /**
     * selector for input field where need to fill State/Province (also region in CIS countries)
     */
    public static $stateInput = '#state';

    /**
     * selector for input field where need to fill Postal/Zip code
     */
    public static $postalCodeInput = '#postal';

    /**
     * selector for checkbox field with Conf. Full-Access w/Dinner (member)
     * selector gets data from getProduct dataprovider
     */
    public static $memberCheckBox = '%s';

    /**
     * selector for checkbox field with Conf. Full-Access w/Dinner (non-member)
     * selector gets data from getProduct dataprovider
     */
    public static $nonMemberCheckBox = '%s';

    /**
     * selector for credit card payment method
     */
    public static $creditRadioButton = '#input_32_paymentType_credit';

    /**
     * selector for credit card First Name
     */
    public static $ccFirstNameInput = "#input_32_cc_firstName";

    /**
     * selector for credit card Last Name
     */
    public static $ccLastNameInput = '#input_32_cc_lastName';

    /**
     * selector for credit card number
     */
    public static $ccNumberInput = '#input_32_cc_number';

    /**
     * selector for credit card seciruty code
     */
    public static $ccSecurityCodeInput = '#input_32_cc_ccv';

    /**
     * selector for getting 1 of 12 expiration month
     * selector gets data from getMonth dataprovider ???
     */
    public static $ccExpirationMonthSelect = '#input_32_cc_exp_month';

    /**
     * 
     */
    public static $ccExpirationMonthOption = '%s';

    /**
     * selector for getting expiration year from 2021 to 2030
     */
    public static $ccExpirationYearSelect = '#input_32_cc_exp_year';

    /**
     *  selector for input field where need to fill street address (Billing Address)
     */
    public static $ccStreetAddressInput = '#input_32_addr_line1';

    /**
     * selector for input field where need to fill 2nd street address (optionally) (Billing Address)
     */
    public static $ccStreetAddress2Input = '#input_32_addr_line2';

    /**
     * selector for input field where need to fill city (Billing Address)
     */
    public static $ccCityInput = '#input_32_city';

    /**
     * selector for input field where need to fill State/Province (also region for CIS counties) (Billing Address)
     */
    public static $ccStateInput = '#input_32_state';

    /**
     * selector for input field where need to fill Postal/Zip code (Billing Address)
     */
    public static $ccPostalCodeInput = '#input_32_postal';

    /**
     * selector for select field where need to select country from list (Billing Address)
     */
    public static $ccCountrySelect = '#input_32_country';

    /**
     * selector for button register
     */
    public static $registerButton = 'button[type=submit]';
}
