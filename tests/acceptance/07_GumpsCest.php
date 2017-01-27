<?php
use Page\PageScreens;
/**
 * @group gumps
 */

class GumpsCest
{

    public function GumpsHome(\AcceptanceTester $I)
    {
        $I->amOnUrl(PageScreens::$gumps);
        $I->waitForElement('#emailsignupPopupBorder > a.button.btn-close');
        $I->click('#emailsignupPopupBorder > a.button.btn-close');
        $I->wait(2);
        $I->dontSeeVisualChanges('GumpsHome', PageScreens::$body,['div.freeship img',
            'div.row','#thawteseal']);
    }

    public function GumpsCatalog(AcceptanceTester $I){
        $I->amOnUrl(PageScreens::$gumps.'/what-s-new');
        $I->wait(2);
        $I->dontSeeVisualChanges('GumpsCatalog',PageScreens::$body,['div.freeship img','div.main-wrapper > div:nth-of-type(2) > div > div > p > a > img',
            '.banner-small','#thawteseal']);
    }

    public function GumpsCatalogItems(AcceptanceTester $I){
        $I->click('.banner-small li p');
        $I->wait(2);
        try {
            $I->dontSeeVisualChanges('GumpsCatalogItems', PageScreens::$body, ['div.prodcat-level1 a','div.products.clearfix', 'ul.linkList.page-num', '#sblock > div:nth-of-type(4) > div.paging.wraps']);
        } catch (Exception $e){
            $I->dontSeeVisualChanges('GumpsCatalogItems', PageScreens::$body, ['div.prodcat-level1 a',
                'div.optional-promo','div.products.clearfix', 'ul.linkList.page-num', '#sblock > div:nth-of-type(4) > div.paging.wraps','#thawteseal']);
        }
    }

    public function GumpsItem(AcceptanceTester $I){
        $I->click('.name');
        $I->waitForElement('.image-box');
        $I->wait(4);
        try {
            $I->dontSeeVisualChanges('GumpsItem', PageScreens::$body, ['div > div:first-child > div:nth-of-type(2) > div > div:nth-of-type(3) > canvas',
                'div.productDescription',
                '#product_breadcrumb',
                '#product_header',
                'p.defaultprice',
                'div.product-name',
                'div.produrecom.wrap','#thawteseal']);
        } catch (Exception $e){
            $I->dontSeeVisualChanges('GumpsItem', PageScreens::$body, ['div > div:first-child > div:nth-of-type(2) > div > div:nth-of-type(3) > canvas',
                'div.productDescription',
                '#product_breadcrumb',
                '#product_header',
                'p.defaultprice',
                'div.product-name',
                'div.produrecom.wrap',
                '#product_shipping_info','#thawteseal','div#s7viewer_swatches']);




        }
    }

    public function GumpsAddToCart(AcceptanceTester $I){
        try{$I->waitForElement('[name="thyeXdnFPApLhaxBqMZaTswqvn_Quantity"]');
            $I->fillField('[name="thyeXdnFPApLhaxBqMZaTswqvn_Quantity"]','1');
        } catch (Exception $e){}

        $I->click('//*[@name="add"]');
        $I->wait(2);

        //
        $I->moveMouseOver('[name="Shopping Bag"]');
        $I->waitForElement('#minibag');
        $I->wait(2);
        try {
            $I->dontSeeVisualChanges('GumpsMiniCart', PageScreens::$body, ['div > div:first-child > div:nth-of-type(2) > div > div:nth-of-type(3) > canvas',
                'div.productDescription', '#product_breadcrumb',
                '#product_header',
                'p.defaultprice',
                'div.product-name',
                'div.produrecom.wrap',
                'div.poppr',
                'div.subtorials',
                '#thawteseal']);
        } catch (Exception $e){
            $I->dontSeeVisualChanges('GumpsMiniCart', PageScreens::$body, ['div > div:first-child > div:nth-of-type(2) > div > div:nth-of-type(3) > canvas',
                'div.productDescription', '#product_breadcrumb',
                '#product_header',
                'p.defaultprice',
                'div.product-name',
                'div.produrecom.wrap',
                'div.poppr',
                'div.subtorials',
                '#thawteseal',
                '#product_shipping_info','#thawteseal','div#s7viewer_swatches']);
        }
        $I->waitForElement('a.btn-checkout.startcheckout');
        $I->click('a.btn-checkout.startcheckout');
    }

    public function GumpsCheckout(AcceptanceTester $I){

        try {
            $I->waitForElement('[name="ContinueForm"] > input.continue.fl_right');
            $I->click('[name="ContinueForm"] > input.continue.fl_right');
        } catch (Exception $e){}
        $I->waitForElement('div.formfield-box.value');
        $I->wait(2);
        $I->dontSeeVisualChanges('GumpsCheckout', PageScreens::$body, ['div.info-box','div.image-box img','div.formfield-box.value',
        'div.formfield-row.wrap.total-price.total.holder > div.formfield-box.value','.link-box.wrap','div.default-choices.wrap','div.footer-box']);
    }

}