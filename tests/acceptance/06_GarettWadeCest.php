<?php
use Page\PageScreens;

/**
 * @group garettWade
 */

class GarettWadeCest
{

    /**
     * @param AcceptanceTester
     * Make current screens
     */

    public function GarettWadeHome(AcceptanceTester $I)
    {


        $I->amOnUrl(PageScreens::$garrettWade);
        $I->waitForElement('i.fa.fa-times.fa-lg');
        $I->click('i.fa.fa-times.fa-lg');
        $I->wait(2);
        try {
            $I->dontSeeVisualChanges('GarettWadeHomePage', PageScreens::$body, ['ul.slides',
                'div.bannergroup > ul > li:nth-of-type(1) > a > img',
                'div.bannergroup > ul > li:nth-of-type(2) > a > img',
                'div.header-submenu > ul > li:nth-of-type(4) > a > span',
                'div.home-products-gallery-header',
            'div.home-categories-container img']);
        } catch (Exception $e){
                $I->dontSeeVisualChanges('GarettWadeHomePage',PageScreens::$body,[
                    'div.dynamic-offer-top.desktop-visible h2',
                    'ul.slides',
                    'div.bannergroup > ul > li:nth-of-type(1) > a > img',
                    'div.bannergroup > ul > li:nth-of-type(2) > a > img',
                    'div.header-submenu > ul > li:nth-of-type(4) > a > span',
                    'div.home-products-gallery-header',
                    'div.home-categories-container img'
                ]);
        }
    }
    public function GarettWadeCatalog(AcceptanceTester $I){
        $I->amOnUrl(PageScreens::$garrettWade.'/woodworking.html');
        $I->dontSeeVisualChanges('GarettWadeCatalog',PageScreens::$body, ['p.amount','.pages ol','ul.products-grid.products-grid--max-4-col.first.last.odd','div.dynamic-offer-top.desktop-visible h2',
            'div.header-submenu > ul > li:nth-of-type(4) > a > span',
            ]);
    }

    public function GarettWadeItem(AcceptanceTester $I)
    {
        $I->click('.product-image');
        $I->wait(2);
        try {
            $I->dontSeeVisualChanges('GarettWadeProductCard', PageScreens::$body, ['div.product-img-box', 'div.more-views', 'li.product', 'span.h1',
                'div.add-to-cart-wrapper', 'div.zoomContainer', 'div.header-submenu > ul > li:nth-of-type(4) > a > span']);
        } catch (Exception $e){
            $I->dontSeeVisualChanges('GarettWadeProductCard', PageScreens::$body, ['div.product-img-box', 'div.more-views', 'li.product', 'span.h1',
                'div.add-to-cart-wrapper', 'div.zoomContainer', 'div.header-submenu > ul > li:nth-of-type(4) > a > span',
                'span.burst-value > img']);
        }
    }

    public function GarettWadeAddToCart(AcceptanceTester $I){
        try{
            $I->fillField('//td[@class="qty last"]/input','1');
        } catch (Exception $e) {
            $I->fillField('//td[@class="qty"]/input', '1');
        }

        $I->waitForElement('//*[@class="add-to-box"]//button');
        $I->click('//*[@class="add-to-box"]//button');
        $I->waitForElementNotVisible('font > div:nth-of-type(3) > img');
        $I->waitForElement('.fancybox-inner');
        $I->wait(3);
        try {
            $I->dontSeeVisualChanges('GarettWadeAddToCart', PageScreens::$body, ['div.product-img-box', 'div.more-views', 'li.product',
                'span.h1', 'div.add-to-cart-wrapper', 'div.product-image > img',
                'span.product-name', 'span.price > span.price',
                'span.subtotal > span.price', 'div.product-image > a > img', 'span.product-name > a',
                'div.product-details > div.price-box > span.regular-price > p > span.price', 'div.zoomContainer', 'div.long-description div.std',
                'div.header-submenu > ul > li:nth-of-type(4) > a > span']);
        } catch (Exception $e){
            $I->dontSeeVisualChanges('GarettWadeAddToCart', PageScreens::$body, [
                'div.dynamic-offer-top.desktop-visible h2',

                'div.product-img-box', 'div.more-views', 'li.product',
                'span.h1', 'div.add-to-cart-wrapper', 'div.product-image > img',
                'span.product-name', 'span.price > span.price',
                'span.subtotal > span.price', 'div.product-image > a > img', 'span.product-name > a',
                'div.product-details > div.price-box > span.regular-price > p > span.price', 'div.zoomContainer', 'div.long-description div.std',
                'div.header-submenu > ul > li:nth-of-type(4) > a > span']);
        }
    }

    public function GarettWadeCart(AcceptanceTester $I){
        $I->click('a.view-cart-checkout');
        $I->waitForElement('//*[@title="Proceed to Checkout"]');
        $I->wait(2);
        try {
            $I->dontSeeVisualChanges('GarettWadeCart', PageScreens::$body, ['div.col-main p', 'tr.first.last.odd',
                'tr > td:nth-of-type(2) > span.price', 'strong > span.price', '#recommendation-zone-wrapper',
                'div.dynamic-offer-top.desktop-visible h2', '.bannergroup',
                'div.header-submenu > ul > li:nth-of-type(4) > a > span']);
        } catch (Exception $e){
            $I->dontSeeVisualChanges('GarettWadeCart',PageScreens::$body,[
                'div.dynamic-offer-top.desktop-visible h2',

                'div.col-main p','tr.first.last.odd',
                'tr > td:nth-of-type(2) > span.price','strong > span.price','#recommendation-zone-wrapper',
                'div.dynamic-offer-top.desktop-visible h2','.bannergroup',
                'div.header-submenu > ul > li:nth-of-type(4) > a > span']);
        }
    }

    public function GarettWadeCheckout(AcceptanceTester $I)
    {
        $I->click('//*[@title="Proceed to Checkout"]');
        $I->waitForElement('//*[@id="onepage-guest-register-button"]/span');
        $I->click('//*[@id="onepage-guest-register-button"]/span');
        $I->waitForElement('#checkout-step-billing');
        $I->wait(2);
        try {
            $I->dontSeeVisualChanges('GarettWadeCheckout', PageScreens::$body, 'div.bannergroup');
        } catch (Exception $e){
            $I->dontSeeVisualChanges('GarettWadeCheckout', PageScreens::$body, 'div.dynamic-offer-top.desktop-visible h2','div.bannergroup');
        }
    }





}
