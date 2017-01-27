<?php
use Page\PageScreens;
/**
 * @group sasrxMedical
 */

class SasrxMedicalCest
{

    public function SasrxMedicalHome(\AcceptanceTester $I)
    {
        $I->amOnUrl(PageScreens::$sasrxMedical);
        $I->wait(2);
        $I->dontSeeVisualChanges('SasrxMedicalHome', PageScreens::$body, ['#sliderFrame',
        'span > div:nth-of-type(2)',
        'span > div:nth-of-type(7)','span > div:nth-of-type(5)',
        'div.vawdHome > a:first-child > img']);
    }
    
    public function SasrxMedicalCatalog(\AcceptanceTester $I)
    {
        $I->amOnUrl(PageScreens::$sasrxMedical.'/e2wNewItemSearch.aspx?searchText=propofol');
        $I->wait(2);
        $I->dontSeeVisualChanges('SasrxMedicalCatalog', PageScreens::$body, ['#GridView-Item','span.SearchResult','div.vawdHome > a:first-child > img']);
    }

    public function SasrxMedicalItem(AcceptanceTester $I){
        $I->click('.grid-img img');
        $I->waitForElement('.cart-button');
        $I->wait(2);
        $I->dontSeeVisualChanges('SasrxMedicalItem',PageScreens::$body,['div.vawdHome > a:first-child > img',
            'li.product > span','#ctl00_CustomerMainContent_lbltitle','tbody > tr:nth-of-type(2) > td:first-child > div:nth-of-type(1)',
            '#ctl00_CustomerMainContent_lblFeatures','#ctl00_CustomerMainContent_Image1',
            'td.item','tr.GridRow > td:nth-of-type(3) > span','div.ajax__tab_body > div:first-child > div.tabPanel']);
    }

}