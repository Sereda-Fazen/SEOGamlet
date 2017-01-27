<?php
use Page\PageScreens;
/**
 * @group hilt
 */

class HiltCest
{

    public function HiltHome(\AcceptanceTester $I)
    {
        $I->amOnUrl(PageScreens::$hilt);
        $I->click('div.RUPopUpBlock > div.RUPopUpCont > a.ReunCloseBtn');
        $I->wait(2);
        $I->dontSeeVisualChanges('HiltHome', PageScreens::$body, ['','']);
    }
    public function HiltCatalog(\AcceptanceTester $I)
    {
        $I->amOnUrl(PageScreens::$hilt.'/budget-rentals');
        $I->wait(2);
        $I->dontSeeVisualChanges('HiltCatalog', PageScreens::$body, ['.divblockunitlist','.left.left div.left']);
    }

    public function HiltHotel(\AcceptanceTester $I)
    {
        $I->click('//div[@class="SelDatesBox"]//img');
        $I->waitForElement('.sliderkit-panels');
        $I->wait(2);
        $I->dontSeeVisualChanges('HiltHotel', PageScreens::$body,['div.BCInsBlock > span:nth-of-type(4) > a',
            '.sliderkit-panels','div.nameofproducttitle h1',
            'div.productinfozone','div.sliderkit-nav',
            'div.PropertyAmenitiesbody','.LongDescription',
            'div.CalendarZone']);
    }

    public function HiltBookNow(AcceptanceTester $I)
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
        $I->waitForElement('#ctl00_ContentPlaceHolder1__lnk_skip',15);
        $I->click('#ctl00_ContentPlaceHolder1__lnk_skip');
        $I->waitForElement('.Welcomepageleftzone');
        $I->wait(2);
        $I->dontSeeVisualChanges('HiltBookNow', PageScreens::$body,['.checkoutreservationUnitInfo',
            '.checkoutreservationreservationDetails']);
    }

    public function HiltCheckout(AcceptanceTester $I){
        $I->click('//*[@title="Continue Booking"]');
        $I->waitForElement('//div[@class="Welcomepageleftzone"]');
        $I->wait(2);
        $I->dontSeeVisualChanges('HiltCheckout',PageScreens::$body);
    }
}