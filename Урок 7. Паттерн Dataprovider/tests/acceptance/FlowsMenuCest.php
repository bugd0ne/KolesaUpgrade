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
        $I->waitForElementVisible(sprintf(HabrMainPage::$flowLinkButton, $data['flowLink']));
        $I->waitForElementClickable(sprintf(HabrMainPage::$flowLinkButton, $data['flowLink']));
        $I->click(sprintf(HabrMainPage::$flowLinkButton, $data['flowLink']));
        $I->seeInCurrentUrl(sprintf(HabrFlowPage::$URL, $data['flowLink']));
        $I->waitForText(sprintf($data['flowName']), 2, HabrFlowPage::$pageHeader);
    }

/**
 * array of associative arrays which is contain of parts of flows link and headers of flows
 */
    protected function getDataForFlow(){

        $flows = [
            ['flowLink' => '/flows/develop/', 'flowName' => 'Разработка'],
            ['flowLink' => '/flows/admin/', 'flowName' => 'Администрирование'],
            ['flowLink' => '/flows/design/', 'flowName' => 'Дизайн'],
            ['flowLink' => '/flows/management/', 'flowName' => 'Менеджмент'],
            ['flowLink' => '/flows/marketing/', 'flowName' => 'Маркетинг'],
            ['flowLink' => '/flows/popsci/', 'flowName' => 'Научпоп']
        ];

        shuffle($flows);
        return array_slice($flows, 0, 2);
    }
}