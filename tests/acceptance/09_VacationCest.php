<?php
use Page\PageScreens;
/**
 * @group vacation
 */

class VacationCest
{

    public function VacationHome(\AcceptanceTester $I)
    {
        $I->amOnUrl(PageScreens::$vacation);
        try{$I->waitForElement('//*[@class="ReunCloseBtn"]');
        $I->click('//*[@class="ReunCloseBtn"]');}
        catch (Exception $e){}
        $I->wait(2);
        $I->dontSeeVisualChanges('VacationHome', PageScreens::$body, [
            //header slide
            'div.bannersbox > div:nth-of-type(1) > a > img',
            //header menu
            'div.NTVHBLineCTopMenuBox a',
            //content
            'div.NLPGridTitle SecBox',
            'div.HPMiniBannerSpecialsBlock',
            'div.NLPGrid',


            'div.TopHPTitleNw',
        'div.HPMiniBannerSpecialsBlock','']);
    }

    public function VacationCatalog(\AcceptanceTester $I)
    {
        $I->amOnUrl(PageScreens::$vacation.'/budget-rentals/');
        $I->wait(2);
        $I->dontSeeVisualChanges('VacationCatalog', PageScreens::$body, ['div.center-bottom > div:nth-of-type(1) > div > a > img',
            '.divblockunitlist',
            'div.right.cssright',
            'div.center-top > div > div > div.center',
            //left menu
        '.ul_page_paramstitle.facet_rank0 a','ul.ul_page_paramstitle.facet_rank1 a']);
    }

    public function VacationHotel(\AcceptanceTester $I)
    {
        $I->click('//td[@valign="middle"]//img');
        $I->waitForElement('.sliderkit-panels');
        $I->wait(2);
        try {
            $I->dontSeeVisualChanges('VacationHotel', PageScreens::$body, ['div.BCInsBlock > span:nth-of-type(4) > a',
                '.sliderkit-panels', 'div.nameofproducttitle h1',
                'div.productinfozone', 'div.sliderkit-nav',
                'div.PropertyAmenitiesbody', '.LongDescription',
                'div.CalendarZone']);
        } catch (Exception $e){
            $I->dontSeeVisualChanges('VacationHotel', PageScreens::$body, ['div.BCInsBlock > span:nth-of-type(4) > a',
                '.sliderkit-panels', 'div.nameofproducttitle h1',
                'div.productinfozone', 'div.sliderkit-nav',
                'div.PropertyAmenitiesbody', '.LongDescription',
                'div.CalendarZone',

            '.UnitSaleBlockDown','.HaveQuestionsCallBody',
                'allAmenitieszoneleft','.AverageGuestRatingconzone']);
        }


    }
    public function VacationBookNow(AcceptanceTester $I)
    {

        //calendar
        //book in
        $I->click('//table[@class="datepickertable"]//tr//img');
        $I->waitForElement('div#ui-datepicker-div');
        $I->click('//div[@id="ui-datepicker-div"]/div/a[2]');
        $I->selectOption('//select[@class="ui-datepicker-month"]', 'Nov');
        $I->click('//div[@id="ui-datepicker-div"]/table[@class="ui-datepicker-calendar"]/tbody//td[@title= "Available"]');
        $I->click('//table[@class="datepickertable"]//tr//img');

        //book end
        $I->click('//table[@class="datepickertable"]//tr[2]//img');
        $I->waitForElement('div#ui-datepicker-div');
        $I->selectOption('//select[@class="ui-datepicker-month"]','Dec');
        $I->click('//div[@id="ui-datepicker-div"]/table[@class="ui-datepicker-calendar"]/tbody//td[@title= "Available"]');
        $I->click('//table[@class="datepickertable"]//tr//img');

        $I->waitForElement('#check_available_button_top');
        $I->click('#check_available_button_top');
        $I->waitForElement('#check_available_redirect_center');
        $I->click('#check_available_redirect_center');
        $I->waitForElement('#ctl00_ContentPlaceHolder1_LinkButton1',15);
        $I->click('#ctl00_ContentPlaceHolder1_LinkButton1');
        $I->waitForElement('.Welcomepageleftzone');
        $I->wait(2);
        $I->dontSeeVisualChanges('VacationBookNow', PageScreens::$body,['.checkoutreservationUnitInfo',
            '.checkoutreservationreservationDetails']);
    }

    public function VacationCheckout(AcceptanceTester $I){
        $I->click('//*[@title="Continue Booking"]');
        $I->waitForElement('.Welcomepageleftzone');
        $I->wait(2);
        $I->dontSeeVisualChanges('VacationCheckout',PageScreens::$body);
    }

}
