<?php

use Codeception\Example;
use Page\Acceptance\HabrFlowPage;
use Page\Acceptance\HabrMainPage;

/**
 * Class with tests for flows 
 */
class FlowMenuCest
{
    /**
     * test checks opening flow (one ~ two from tab menu)
     * @param Example $data
     * @dataProvider getDataForFlow
     */
    public function checkFlowForOpening(AcceptanceTester $I, Example $data)
    {
        $I->amOnPage('');
        $I->waitForElementVisible(sprintf(HabrMainPage::$flowLinkButton, $data['flow']));
        $I->waitForElementClickable(sprintf(HabrMainPage::$flowLinkButton, $data['flow']));
        $I->click(sprintf(HabrMainPage::$flowLinkButton, $data['flow']));
        $I->seeInCurrentUrl(sprintf(HabrFlowPage::$URL, $data['flow']));
        $I->waitForText(sprintf($data['flowName']), 2, HabrFlowPage::$pageHeader);
    }

/**
 * array of associative arrays which is contain of parts of flows link and headers of flows
 */
    protected function getDataForFlow(){

        $flows = [
            ['flow' => '/flows/develop/', 'flowName' => 'Разработка'],
            ['flow' => '/flows/admin/', 'flowName' => 'Администрирование'],
            ['flow' => '/flows/design/', 'flowName' => 'Дизайн'],
            ['flow' => '/flows/management/', 'flowName' => 'Менеджмент'],
            ['flow' => '/flows/marketing/', 'flowName' => 'Маркетинг'],
            ['flow' => '/flows/popsci/', 'flowName' => 'Научпоп']
        ];

        shuffle($flows);
        return array_slice($flows, 0, 2);
    }
}