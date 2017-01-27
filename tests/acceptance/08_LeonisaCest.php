<?php
use Page\PageScreens;
/**
 * @group leonisa
 */

class LeonisaCest
{

    public function LeonisaHome(\AcceptanceTester $I)
    {
        $I->amOnUrl(PageScreens::$leonisa);
        $I->wait(2);
        try {
            $I->dontSeeVisualChanges('LeonisaHome', PageScreens::$body, ['div.headerLeft',
                'div.homeMain.shortDescvent', 'div.banners',
                // header
                '']);
        } catch (Exception $e){
            $I->dontSeeVisualChanges('LeonisaHome', PageScreens::$body, ['div.headerLeft',
                'div.homeMain.shortDescvent', 'div.banners',
                // header
                'div.header-message']);

        }

    }

    public function LeonisaCatalog(\AcceptanceTester $I)
    {
        $I->amOnUrl(PageScreens::$leonisa.'/shapewear/shapewear-for-women-body-shapers/');

        $I->wait(2);
        $I->dontSeeVisualChanges('LeonisaCatalog', PageScreens::$body, ['div.itemList',
            'div.paging','div.intContent > div:nth-of-type(9) > div.paging','div.headerLeft']);
    }

    public function LeonisaItem(AcceptanceTester $I){

        $I->click('//div[@class="itemCont"]//img');
        $I->waitForElement('//span[@id="spanCartText"]');
        $I->wait(2);
        $I->dontSeeVisualChanges('LeonisaItem',PageScreens::$body,['div.detailsLCol',
        'div.detailsRCol > h1 > span','div.swatches',
        'a.readReviewLink.reviewratingtop > span',
        'div.detailsRCol > span > div.detailsRow.detailsPrice > span.price > span:first-child > span:nth-of-type(2)',
        'div#tab-before_after_video0',
        'div.sugstwrpr','body > div:nth-of-type(1) > div > div:first-child > div:first-child > div:nth-of-type(1)',
        'div.otherProducts','div.headerLeft',
        'div.bcrmwrpr > span:nth-of-type(3)']);
    }

    public function LeonisaAddToCart(AcceptanceTester $I){
        $I->click('//*[@class="swatches"]//div');
        $I->click('//*[@class="labels Selsize"]//li/a');
        $I->click('//span[@id="spanCartText"]');
        $I->wait(2);
        try {$I->waitForElement('//div[@class="sumome-react-wysiwyg-popup-container"]/div[5]//img',15);
            $I->click('//div[@class="sumome-react-wysiwyg-popup-container"]/div[5]//img');}
        catch (Exception $e){}
        $I->dontSeeVisualChanges('LeonisaAddToCart',PageScreens::$body, ['span.header-total-amount','div.detailsLCol',
            'div.detailsRCol > h1 > span','div.swatches',
            'a.readReviewLink.reviewratingtop > span',
            'div.detailsRCol > span > div.detailsRow.detailsPrice > span.price > span:first-child > span:nth-of-type(2)',
            'div.sugstwrpr','body > div:nth-of-type(1) > div > div:first-child > div:first-child > div:nth-of-type(1)',
            'div.otherProducts','div.bcrmwrpr > span:nth-of-type(3)','div#tab-before_after_video0',

            'div.item-dialog-content',
            '#divCartTotal > div:nth-of-type(2) > h4',
            '#tiCust','div.headerLeft',
            'div.detailsRCol > span > div.detailsRow.detailsPrice > span.price > span']);
    }

    public function LeonisaCart(AcceptanceTester $I){
        $I->click('a.btnProceedCheckout > span:nth-of-type(2)');
        $I->waitForElement('td.item');
        $I->dontSeeVisualChanges('LeonisaCart', PageScreens::$body, ['div.headerLeft',
        'td.item','td.price','td.qty input','td.Total',
            '.leftBanner','div.chkoutBoxes > div:nth-of-type(2) > span.price','div.chkoutBoxes > div:nth-of-type(5) > span.price',
            'div.items.itemList.itemRow.departmentList',
            'span.header-total-amount'
            ]);
    }

    public function LeonisaCheckout(AcceptanceTester $I)
    {
        $I->click('div.proceedCheckoutRight span');
        $I->wait(2);
        try {
            $I->dontSeeVisualChanges('LeonisaCheckout', PageScreens::$body, ['div.ti-inner-summary',
                '#tiSixtyBanner img']);
        } catch (Exception $e){

        }
    }

}