<?php
namespace Page\Acceptance;

/**
 * Page of one of the habr glow (e.g. "Development", "Design" etc.)
 */
class HabrFlowPage
{
    /**
     * variable which is used for substitute value from dataprovider to check current URL
     */
    public static $URL = '%s';

    /**
     * Selector where locates header text of flow
     */
    public static $pageHeader = '.page-header';
}
