<?php
namespace Helper;

use Faker\Factory;

/**
 * Base Helper fir initialization Faker and custom faker provider
 */

class BaseHelper extends \Codeception\Module
{
    /**
     * init Faker function in one place
     * @param $locale
     */
    public function initFaker($locale){
        $faker = Factory::create($locale);
        $faker->addProvider(new CustomFakerProvider($faker));
        
        return $faker;
    }
}
