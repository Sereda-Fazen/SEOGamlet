<?php
use Page\PageScreens;
/**
 * @group marcoMobile
 */

class MarcoMobileCest
{

        public function MarcoMobileHome(\AcceptanceTester $I)
        {
            $I->resizeWindow(768,1024);
            $I->amOnUrl(PageScreens::$marcoMobile);
            $I->amOnUrl(PageScreens::$marcoMobile);
            $I->wait(2);
            $I->dontSeeVisualChanges('MarcoMobileHome', PageScreens::$body,'.swipe-wrap');
        }

        public function MarcoMobileCatalog(AcceptanceTester $I)
        {
            $I->amOnUrl(PageScreens::$marcoMobile.'/Group/corporate-apparel.htm');
            $I->wait(2);
            $I->dontSeeVisualChanges('MarcoMobileCatalog', PageScreens::$body);
        }

    public function MarcoMobileApparel(AcceptanceTester $I){
        $I->amOnUrl(PageScreens::$marcoMobile.'/Group/view-all-apparel.htm');
        $I->wait(2);
        //$I->dontSeeVisualChanges('MarcoMobileApparel',PageScreens::$body,['#w1001822_tblResults tr td img',
        //    '']);
        $I->dontSeeVisualChanges('MarcoMobileApparel', PageScreens::$body, ['.CustomerVid','#StopVideoCT1','.ytp-thumbnail-overlay-image',
        '#w1001822_tblResults','#w1001822_divPagination','.GRPTestCnt',
            'w1001822_pnlResultsFooter']);
    }

    public function MarcoMobileProductCard(AcceptanceTester $I){
        $I->click('.topBorder img');
        $I->waitForElement('#w1001969_pnlDefaultBody');
        $I->wait(2);
        $I->dontSeeVisualChanges('MarcoMobileProductCard',PageScreens::$body,['h1.ProductHeaderName','#w1001950_imgMtx',
            '#w1001951_pnlInlineThumbs','#w1001956_pnlPricingBody',
        '#w1001964_349725_dropdown','#w1001960_pnlDefaultBody div',
        ]);
    }

    public function MarcoMobileAddToCart(AcceptanceTester $I){
        $I->click('#w1001958_pnlDefaultBody input');
        $I->wait(2);
        $I->dontSeeVisualChanges('MarcoMobileAddToCart',PageScreens::$body,['tbody > tr:nth-of-type(2) > td > a','tbody > tr:first-child > td:nth-of-type(2) > a','w1001824_imgProductThumbnail26365794',
            'table.CartTable > tbody > tr:nth-of-type(4) > td:nth-of-type(2)',
            'td.subSectionBottom.LineItemThumbnail.LineItemEdit',
            'div.ProductImageGallery > div.WidgetBody > h3',
            'table.CartTable > tbody > tr:nth-of-type(3) > td:nth-of-type(2)',
            'td.ItemExtendedPriceLabel','tbody > tr:nth-of-type(10) > td:nth-of-type(2) > span',
            'tbody > tr:nth-of-type(19) > td:nth-of-type(3)','td.CartSubTotal',
        'td.OrderTotalAmountLabel.CartTotal']);

    }

    public function MarcoMobileCheckout(AcceptanceTester $I)
    {
        $I->click('tr > td:nth-of-type(2) > input:nth-of-type(3)');
        $I->waitForElement('div.NewAccountInvitation > div.WidgetBody > div.WidgetBody > input');
        $I->fillField('input.stdDropdown.formField', 'test@gmail.com');
        $I->click('div.NewAccountInvitation > div.WidgetBody > div.WidgetBody > input');
        $I->waitForElement('div.CreateNewUser > div.WidgetBody');
        $I->wait(2);
        $I->dontSeeVisualChanges('MarcoMobileCheckout',PageScreens::$body);
    }

      
}