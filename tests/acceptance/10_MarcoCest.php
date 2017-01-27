<?php
use Page\PageScreens;
/**
 * @group marco
 */

class MarcoCest
{

        public function MarcoHome(\AcceptanceTester $I)
        {
            $I->amOnUrl(PageScreens::$marco);
            $I->executeJS('

                setTimeout(function() {
                    document.getElementById("EmailSignupSlider").getElementsByClassName("EmailClose")[0].click();
                }, 3000);

      ');
            $I->wait(4);
            try {
                $I->dontSeeVisualChanges('MarcoHome', PageScreens::$body, ['#w1002463_pnlHTML', '#container2',
                    '.BSContent', '#HPTestimonials', '.BSProduct-HP',
                    '.smallGridSel2', '#w1006161_pnlDefaultBody',
                    '#w1006162_pnlDefaultBody',
                    '#LCTabDiv']);
            } catch (Exception $e){
                $I->dontSeeVisualChanges('MarcoHome', PageScreens::$body, ['#w1002463_pnlHTML','#container2',
                    '.BSContent','#HPTestimonials','.BSProduct-HP',
                    '.smallGridSel2','#w1006161_pnlDefaultBody',
                    '#w1006162_pnlDefaultBody',
                    '#LCTabDiv','#chatSlide']);
            }
        }

    public function MarcoCatalog(\AcceptanceTester $I)
    {
        $I->amOnUrl(PageScreens::$marco . '/namebadgeholders.html');
        $I->executeJS('jQuery(\'.badgeSKU\').html(jQuery(\'.badgeSKU\').html().replace(/\d+¢/igm, \'\'));');
        $I->wait(2);
        try {
            $I->dontSeeVisualChanges('MarcoCatalog', PageScreens::$body, ['a.badgetitle', '#LCTabDiv', '#w1005539_pnlHTML', 'div.HPTestimonials', '#chatSlide']);
        } catch (Exception $e){
            $I->dontSeeVisualChanges('MarcoCatalog', PageScreens::$body, ['a.badgetitle', '#LCTabDiv', '#w1005539_pnlHTML', 'div.HPTestimonials']);
        }
    }

    public function MarcoItem(\AcceptanceTester $I)
    {
        $I->click('.badgeGrid img');
        $I->waitForElement('td.ProductImage img');
        $I->click('td.ProductImage img');
        $I->waitForElement('#w3939_ibtnAddToCart');
        $I->wait(2);
        try {
            $I->dontSeeVisualChanges('MarcoItem', PageScreens::$body, ['.ProductHeaderName',
                '.contentZone.masterZone.Zone13', 'ol.BreadCrumb > li:nth-of-type(7) > span',
                '#w3934_pnlDefaultBody',
                'div.zonePadding > div:nth-of-type(9) > div > div.WidgetBody > div:nth-of-type(1) > div:nth-of-type(2) > span:nth-of-type(2)',
                'div.footerZone.masterZone > div.zonePadding > div:nth-of-type(1)',
                '.ProductDescription', '#w3945_pnlDefaultBody',
                '.swatchWrapper', '#w1002509_pnlDefaultBody',
                '#LCTabDiv',
                'div.zonePadding > div:nth-of-type(7) > div > div.WidgetBody',
                'div.HPTestimonials', '#chatSlide'
            ]);
        } catch (Exception $e){
            $I->dontSeeVisualChanges('MarcoItem', PageScreens::$body, ['.ProductHeaderName',
                '.contentZone.masterZone.Zone13', 'ol.BreadCrumb > li:nth-of-type(7) > span',
                '#w3934_pnlDefaultBody',
                'div.zonePadding > div:nth-of-type(9) > div > div.WidgetBody > div:nth-of-type(1) > div:nth-of-type(2) > span:nth-of-type(2)',
                'div.footerZone.masterZone > div.zonePadding > div:nth-of-type(1)',
                '.ProductDescription', '#w3945_pnlDefaultBody',
                '.swatchWrapper', '#w1002509_pnlDefaultBody',
                '#LCTabDiv',
                'div.zonePadding > div:nth-of-type(7) > div > div.WidgetBody',
                'div.HPTestimonials'
            ]);
        }
    }


    public function MarcoCart(AcceptanceTester $I){
        $I->click('#w3939_ibtnAddToCart');
        $I->waitForElement('#w3_pnlLoggedInBody');
        $I->wait(3);
        try {
            $I->dontSeeVisualChanges('MarcoCart', PageScreens::$body, ['div.zonePadding > div:nth-of-type(5) > div > div.WidgetBody > div:nth-of-type(3)',
                '.AlternatingRowStyle',
                '#w3_dispsubtotal', 'span.OrderTotalAmountLabel',
                '#LCTabDiv', '#chatSlide']);
        } catch (Exception $e){
            $I->dontSeeVisualChanges('MarcoCart', PageScreens::$body, ['div.zonePadding > div:nth-of-type(5) > div > div.WidgetBody > div:nth-of-type(3)',
                '.AlternatingRowStyle',
                '#w3_dispsubtotal', 'span.OrderTotalAmountLabel',
                '#LCTabDiv']);
        }
    }

    public function MarcoCheckout(AcceptanceTester $I){
        $I->reloadPage();
        $I->waitForElement('#w3_ibtnCheckOutTop');
        $I->click('#w3_ibtnCheckOutTop');
        $I->waitForElement('div.NewAccountInvitation > div.WidgetBody > div.WidgetBody > input');
        $I->fillField('input.stdDropdown.formField', 'test@gmail.com');
        $I->click('div.NewAccountInvitation > div.WidgetBody > div.WidgetBody > input');
        $I->waitForElement('div.CreateNewUser > div.WidgetBody');
        $I->wait(2);
        try {
            $I->dontSeeVisualChanges('MarcoCheckout', PageScreens::$body, '#chatSlide');
        } catch (Exception $e){
            $I->dontSeeVisualChanges('MarcoCheckout', PageScreens::$body);
        }
    }

}