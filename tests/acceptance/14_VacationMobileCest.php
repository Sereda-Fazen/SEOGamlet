<?php
use Page\PageScreens;
/**
 * @group vacationMobile
 */

class VacationMobileCest
{

    public function VacationMobileHome(\AcceptanceTester $I)
    {
        $I->resizeWindow(768,1024);
        $I->amOnUrl(PageScreens::$vacationMobile);
        $I->wait(2);
        $I->dontSeeVisualChanges('VacationMobileHome', PageScreens::$body, ['div > table:nth-of-type(1) > tbody > tr:nth-of-type(1) > td > a > img',
            ]);
    }

    public function VacationMobileCatalog(\AcceptanceTester $I)
    {
        $I->amOnUrl(PageScreens::$vacationMobile.'/most-popular/');
        $I->wait(2);
        try{
        $I->dontSeeVisualChanges('VacationMobileCatalog', PageScreens::$body, [
            '.unitItemlistImageContmob','.rpbtablefirstrow','.mobileonlyBN']);
        } catch (Exception $e){
            $I->dontSeeVisualChanges('VacationMobileCatalog', PageScreens::$body, ['.unitItemlistImageContmob','.rpbtablefirstrow']);
        }

    }

    public function VacationMobileHotel(\AcceptanceTester $I)
    {
        $I->click('.unitItemlistImageContmob img');
        $I->waitForElement('.btnFMRNlink');
        $I->wait(2);
        try {
            $I->dontSeeVisualChanges('VacationMobileHotel', PageScreens::$body, ['div.BCInsBlock',
                'tbody > tr:first-child > td > div.nameofproducttitlemob',
                'div.mainmob > div:nth-of-type(1) > table > tbody > tr:nth-of-type(2) > td > div:nth-of-type(1)',
                '#mainImage','.imagestabscontmob','tbody > tr:nth-of-type(6) > td > div.nameofproducttitlemob',
                '.averageGuestRatingproductzonebodymob','div.productDescriptiveTextmob > span',
                '.onlytobookmob','tbody > tr:nth-of-type(10) > td > div:nth-of-type(2)'
            ]);
        } catch (Exception $e){
            $I->dontSeeVisualChanges('VacationMobileHotel', PageScreens::$body, ['div.BCInsBlock',
                'tbody > tr:first-child > td > div.nameofproducttitlemob',
                'tbody > tr:nth-of-type(2) > td > div:nth-of-type(2)','#mainImage',
                '.imagestabscontmob','.Seeslideshowcontmob','tbody > tr:nth-of-type(6) > td > div.nameofproducttitlemob',
                '.averageGuestRatingproductzonebodymob','div.productDescriptiveTextmob > span',
                '.onlytobookmob','tbody > tr:nth-of-type(10) > td > div:nth-of-type(2)']);
        }
    }

    public function VacationMobileBookNow(\AcceptanceTester $I)
    {
        $I->click('.btnFMRNlink');
        $I->waitForElement('//td[@class="check_available_button_top"]/input');
        // date
        $I->wait(2);
        $I->click('//div[@class="mainmob"]//tr[4]//img[@class="ui-datepicker-trigger"]');
        $I->waitForElement('div#ui-datepicker-div');

        $I->selectOption('(//select[@class="ui-datepicker-year"])[2]','2017');
        $I->selectOption('(//select[@class="ui-datepicker-month"])[2]','February');
        $I->click('//div[@id="ui-datepicker-div"]/table[@class="ui-datepicker-calendar"]/tbody//td[@title= "Available"]');

        //
        $I->click('//div[@class="mainmob"]//tr[6]//img[@class="ui-datepicker-trigger"]');

        $I->selectOption('(//select[@class="ui-datepicker-year"])[2]','2017');
        $I->selectOption('(//select[@class="ui-datepicker-month"])[2]','March');
        $I->click('//div[@id="ui-datepicker-div"]/table[@class="ui-datepicker-calendar"]/tbody//td[@title= "Available"]');

        $I->wait(2);
        $I->dontSeeVisualChanges('VacationMobileBookNow',PageScreens::$body,['.ForBestRatescont','tbody > tr:nth-of-type(9) > td']);
        $I->click('#check_available_button_top');
        $I->waitForElement('#check_available_redirect_center');
        $I->click('#check_available_redirect_center');
        $I->waitForElement('#ctl00_ContentPlaceHolder1_LinkButton1');
        $I->click('#ctl00_ContentPlaceHolder1_LinkButton1');
    }

    public function VacationMobileCheckout(\AcceptanceTester $I)
    {
        $I->waitForElement('.btnContinueBooking');
        $I->wait(2);
        $I->dontSeeVisualChanges('VacationMobileCheckout', PageScreens::$body,['.checkoutreservationUnitInfoImage',
            '.checkoutreservationreservationDetails',
            '.checkoutreservationUnitInfoUnitName',
            '.checkoutreservationUnitInfoCityName',
            '.checkoutreservationUnitInfoDescriptiveText',
            '.checkoutreservationUnitInfoIncludes',
            '.printemailblockGuaranteed']);
        $I->click('.btnContinueBooking');
        $I->waitForElement('.billinginfoPagetittleleftbold');
        $I->wait(2);
        $I->dontSeeVisualChanges('VacationMobileCheckout',PageScreens::$body,['.billinginfoPagetittleleftbold']);
    }


    
}