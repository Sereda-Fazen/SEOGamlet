<?php
use Page\PageScreens;
/**
 * @group www.sasrx.com
 */

class SasrxCest
{

    public function SasrxHome(\AcceptanceTester $I)
    {
        $I->amOnUrl(PageScreens::$sasrx);
        $I->wait(2);
        $I->dontSeeVisualChanges('SasrxHome', PageScreens::$body, ['span > div:nth-of-type(4)', 'span > div:nth-of-type(3)',
            'div.centercolumn > div:nth-of-type(8) > span > div:nth-of-type(2) > div:first-child > div',
            '#pre-footer >div', '.hero_700',
            'div.hero_lower3', 'span > div:nth-of-type(3) > div > p']);

    }
    public function SasrxCatalog(\AcceptanceTester $I)
    {
        $I->amOnUrl(PageScreens::$sasrx);
        $I->click('//*[@class="topprod-items"]//a');
        $I->waitForElement('.products-grid.row');
        $I->wait(2);
        $I->dontSeeVisualChanges('SasrxCatalog', PageScreens::$body, ['.celebros-pages','ul.products-grid.row','#pre-footer >div',
            'dt.nav-collapsed.title_Normal > span','.ui-slider-tooltip.ui-widget-content.ui-corner-all']);
    }

    public function SasrxProductCard(\AcceptanceTester $I)
    {
        $I->click('//*[@class="product-image"]//img');
        $I->waitForElement('//*[@class="centercolumn4"]');
        $I->wait(2);
        $I->dontSeeVisualChanges('SasrxProductCard', PageScreens::$body,['.itemNumber','#ctl00_CustomerMainContent_lblDesc2','.ajax__tab_panel','ul#recentlyViewed-list-Horizontal','td > table > tbody > tr:nth-of-type(3) > td:first-child','#ctl00_CustomerMainContent_lbltitle','#pre-footer >div']);
    }
}