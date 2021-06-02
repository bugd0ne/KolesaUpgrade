<?php
namespace Helper;

use Faker\Provider\Base;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class CustomFakerProvider extends Base
{
    /**
     * protected var with operators phone code
     */
    protected $phoneCodes = [
        '701',
        '705',
        '707',
        '771',
        '775',
        '776',
        '777',
        '778'
    ];

    /**
     * protected var with credit card numbers (Visa)
     */
    protected $creditCards = [
        '4929204592980682',
        '4532929907803463',
        '4506306369077567',
        '4556887021548854',
        '4916096054256170'
    ];

    /**
     * Return phone number in KZ standart
     */
    public function getPhoneKZ(){
        return sprintf(
            '+7(%d)%d-%d-%d',
            $this->phoneCodes[array_rand($this->phoneCodes)],
            random_int(100, 999),
            random_int(10, 99),
            random_int(10, 99)
        );
    }

    /**
     * Return number of credit card
     */
    public function getCreditCardNumber(){
        return sprintf(
            '%s',
            $this->creditCards[array_rand($this->creditCards)]
        );
    }

    /**
     * Return 3 digit number
     */
    public function getSecurityCode(){
        return sprintf(
            '%d',
            random_int(001, 999)
        );
    }

}
