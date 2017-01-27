<?php
use Page\PageScreens;
/**
 * @group www.royalrobbins.com
 */


class RoyalRobbinsCest
{


    function HomePage(AcceptanceTester $I)
    {
        $I->amOnUrl(PageScreens::$royal);
        $I->wait(2);
        $I->dontSeeVisualChanges('RoyalHomePage', PageScreens::$body, ['.slider-wrapper.active',
            '#yotpo_testimonials_btn',
            'ul.menu-manager-menu.menu-type-none.nav-primary.header-support-menu > li.last.parent > a > span',
            '.top-left-block']);
    }

    function MenPage(AcceptanceTester $I)
    {
        $I->amOnUrl(PageScreens::$royal.'/men/t-shirts');
        $I->wait(2);
        $I->dontSeeVisualChanges('RoyalMenTshirts', PageScreens::$body,['#yotpo_testimonials_btn','div.category-products','div.main > div.breadcrumbs > ul > li:nth-of-type(3) > span',
        '.top-left-block']);
    }
    function AddToCartTShirt(AcceptanceTester $I){


        $I->click('.product-data img');
        $I->waitForElement('//*[@title="Add to Cart"]');
       // $I->amOnUrl(PageScreens::$royal.'/men/t-shirts/go-everywhere-merino-crew-men');
        $I->wait(2);
        $I->dontSeeVisualChanges('RoyalAddToCart', PageScreens::$body,['#yotpo_testimonials_btn','div.product-image','li.product',
            'div.product-name h1','div.price-info','.clearfix.swatch-attr div','div.thumbnails','#select_label_clr',
        //descr
            'div.fit-types a','div.sidebar-sku-product','div.std','div.fit-types a',
            '.top-left-block'
        ]);
    }
    function ProductCart(AcceptanceTester $I)
    {
        $I->click('//*[@class="clearfix swatch-attr"]//a/span');
        $I->click('//*[@id="configurable_swatch_sizes"]/li');
        $I->click('button.button.btn-cart > span > span');
        $I->waitForElement('.minicart-wrapper');
        $I->dontSeeVisualChanges('RoyalProductCard', PageScreens::$body,['#yotpo_testimonials_btn','li.item.last.odd','.subtotal >.price','div.product-image','li.product','div.product-name h1','div.price-info','.clearfix.swatch-attr div','div.thumbnails','#select_label_clr',
            'div.sidebar-sku-product','div.std','div.fit-types a',
            // header
            '.top-left-block']);
    }
    function CartRoyal(AcceptanceTester $I) {
        $I->click('a.button.checkout-button');
        $I->waitForElement('tr.first.last.odd');
        $I->wait(2);
        $I->dontSeeVisualChanges('RoyalCart', PageScreens::$body,['#yotpo_testimonials_btn','tr.first.last.odd','tr > td:nth-of-type(2) > span.price','strong > span.price',
            'div.ambanners > p','div.col-main > p:nth-of-type(1)','div.col-main > p:nth-of-type(2)',
            //header
        '.top-left-block'
        ]);
    }
    
    function Checkout(AcceptanceTester $I)
    {
        $I->waitForElement('//button[@title="Proceed to Checkout"]');
        $I->click('//button[@title="Proceed to Checkout"]');
        $I->click('#onepage-guest-register-button > span > span');
        $I->waitForElement('#checkout-step-billing');
        $I->wait(2);
        $I->dontSeeVisualChanges('RoyalCheckout', PageScreens::$body, ['#yotpo_testimonials_btn',
        //header
            '.top-left-block']);
    }

    /**
     * GoEveryWhere RoyalRobbins
     * @param AcceptanceTester $I
     */

    function GoEveryWhereRoyal(AcceptanceTester $I){
        $I->amOnUrl(PageScreens::$goEverWhereRobbins);
        $I->wait(2);
        try {
            $I->dontSeeVisualChanges('GoEveryWhereHome', PageScreens::$body, ['.bx-wrapper',
                '#recent-posts-2 ul', '#recentcomments', '#categories-2 ul',
                '.sp-grid', 'div.top-left-block > p > a',
                '#menu-main-navigation',
                '.top-left-block']);
        } catch (Exception $e){
            $I->dontSeeVisualChanges('GoEveryWhereHome', PageScreens::$body, ['.bx-wrapper',
                '#recent-posts-2 ul', '#recentcomments', '#categories-2 ul',
                '.sp-grid', 'div.top-left-block > p > a',
                '#menu-main-navigation',
                '.top-left-block','div.feat-overlay']);
            
        }

    }

}
