<?php
use Page\PageScreens;
/**
 * @group decostore
 */

class DecostoreCest
{

    /**
     * @param AcceptanceTester
     * Make current screens
     */

    public function decostoreHome(AcceptanceTester $I)
    {
        $I->amOnUrl(PageScreens::$decoStore);
        $I->wait(2);
        $I->dontSeeVisualChanges('DecostoreHomePage', PageScreens::$body, ['div>.slideshow','.category-products']);
    }

    public function decostoreBacksplash(AcceptanceTester $I)
    {
        $I->amOnUrl(PageScreens::$decoStore.'/backsplash');
        $I->wait(2);
        $I->dontSeeVisualChanges('DecostoreBacksplashPage', PageScreens::$body,'ul.products-grid.first.last.odd');
    }

    public function decostoreItem(AcceptanceTester $I){
        $I->click('//div[@class="category-products"]//img');
        $I->wait(2);
        $I->dontSeeVisualChanges('DecostoreProductCard', PageScreens::$body,['.product-img-box.col-md-7','li.product','div.grouped-product-data','div.product-name','div.std',
        'ul.nav.navbar-nav > li:nth-of-type(3) > a.level-top > span']);
    }

    public function decostoreAddToCart(AcceptanceTester $I){
        $I->click('//div[@class="product-grouped clearfix"]//button');
        $I->waitForElement('//div[@class="mini-cart-checkout"]');
        $I->click('//div[@class="mini-cart-checkout"]');
        $I->waitForElement('//button[@title="Proceed to Checkout"]');
        $I->dontSeeVisualChanges('DecostoreAddToCard', PageScreens::$body,['tr.first.last.odd','#shopping-cart-totals-table span','tr > td:nth-of-type(2) > span.price',
            'ul.nav.navbar-nav > li:nth-of-type(3) > a.level-top > span']);
    }

    public function decostoreCheckout(AcceptanceTester $I)
    {
        $I->click('//button[@title="Proceed to Checkout"]');
        $I->waitForElement('//div[@class="col-2"]//button');
        $I->click('//div[@class="col-2"]//button');
        $I->wait(2);
        $I->dontSeeVisualChanges('DecostoreCheckout', PageScreens::$body);

    }







}