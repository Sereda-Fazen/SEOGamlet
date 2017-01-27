<?php
use Page\PageScreens;
/**
 * @group backSplash
 */

class BackSplashCest
{

    /**
     * @param AcceptanceTester
     * Make current screens
     */

    public function BackSplashHome(AcceptanceTester $I)
    {
        $I->amOnUrl(PageScreens::$backSplash);
        $I->wait(2);
        $I->dontSeeVisualChanges('BackSplashHomePage', PageScreens::$body,'div#comm100-button-514');
    }

    public function BackSplashStyles(AcceptanceTester $I){
        $I->amOnUrl(PageScreens::$backSplash.'/backsplash-styles');
        $I->wait(2);
        $I->dontSeeVisualChanges('BackSplashStyle',PageScreens::$body, ['div>#slider','.item-box.three.columns'],'div#comm100-button-514');
    }

    public function BackSplashProduct(AcceptanceTester $I){
        $I->click('//*[@class="product-grid featured-product-grid"]//a');
        $I->waitForElement('//*[@value="Get a Free Sample"]');
        $I->wait(2);
        $I->dontSeeVisualChanges('BackSplashProductCard', PageScreens::$body, ['.gallery.five.columns',
            '.short-description','.product-name',
            '.breadcrumb li strong','div#comm100-button-514']);
    }

    public function BackSplashAddToCart(AcceptanceTester $I){
        $I->click('//*[@value="Get a Free Sample"]');
        $I->waitForElement('//*[@class="productAddedToCartWindowSummary"]//input[@value="Checkout Now"]');
        $I->wait(2);
        $I->dontSeeVisualChanges('BackSplashAddToCart', PageScreens::$body, ['.productAddedToCartWindowImage img','.productAddedToCartWindowDescription',
        '.gallery.five.columns',
            '.short-description','.product-name',
            '.breadcrumb li strong','div#comm100-button-514']);
    }

    public function BackSplashCart(AcceptanceTester $I){

        $I->click('//*[@class="productAddedToCartWindowSummary"]//input[@value="Checkout Now"]');
        $I->waitForElement('//*[@class="cart responsive"]');
        $I->wait(2);
        $I->dontSeeVisualChanges('BackSplashCart', PageScreens::$body, ['.cart-item-row','.block.block-recently-viewed-products','div#comm100-button-514']);
    }

    public function BackSplashCheckout(AcceptanceTester $I){
        $I->click('//*[@class="checkout-buttons"]/button');
        $I->waitForElement('//*[@value="Checkout as Guest"]');
        $I->click('//*[@value="Checkout as Guest"]');
        $I->waitForElement('//*[@class="edit-address"]');
        $I->dontSeeVisualChanges('BackSplashCheckout', PageScreens::$body, '.mini-shopping-cart-checkout','div#comm100-button-514');
    }



    











    /*
    public function BackSplashBacksplash(AcceptanceTester $I)
    {
        $I->amOnPage('/backsplash');
        $I->wait(2);
        $I->dontSeeVisualChanges('DecostoreBacksplashPage', \Page\Page::$body);
    }

    public function decostoreItem(AcceptanceTester $I){
        $I->click('//div[@class="category-products"]//img');
        $I->wait(2);
        $I->dontSeeVisualChanges('DecostoreProductCard', \Page\Page::$body);
    }

    public function decostoreAddToCart(AcceptanceTester $I){
        $I->click('//div[@class="product-grouped clearfix"]//button');
        $I->waitForElement('//div[@class="mini-cart-checkout"]');
        $I->click('//div[@class="mini-cart-checkout"]');
        $I->waitForElement('//button[@title="Proceed to Checkout"]');
        $I->dontSeeVisualChanges('DecostoreAddToCard', \Page\Page::$body);
    }

    public function decostoreCheckout(AcceptanceTester $I)
    {
        $I->click('//button[@title="Proceed to Checkout"]');
        $I->waitForElement('//div[@class="col-2"]//button');
        $I->click('//div[@class="col-2"]//button');
        $I->wait(2);
        $I->dontSeeVisualChanges('DecostoreCheckout', \Page\Page::$body);

    }
*/






}