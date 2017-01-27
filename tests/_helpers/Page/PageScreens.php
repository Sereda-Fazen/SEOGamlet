<?php
namespace Page;

class PageScreens
{

    public static $body = 'body';

    /**
     * sites
     */

    public static $moreBeer = 'https://morebeer.com';
    public static $sasrx = 'https://sasrx.com';
    public static $royal = 'https://royalrobbins.com';
    public static $decoStore = 'https://diydecorstore.com';
    public static $backSplash = 'http://www.backsplashideas.com';
    public static $garrettWade = 'http://www.garrettwade.com';
    public static $gumps = 'http://www.gumps.com';
    
    public static $leonisa = 'http://www.leonisa.com';
    
    public static $vacation = 'https://www.vacationrentalpros.com';
    public static $marco = 'https://www.marcopromotionalproducts.com';
    public static $sasrxMedical = 'https://www.sasrxmedical.com';
    public static $goEverWhereRobbins = 'https://goeverywhere.royalrobbins.com';
    public static $hilt = 'https://www.hiltonheadvacation.com';
    public static $marcoMobile = 'https://m.marcopromotionalproducts.com';
    public static $vacationMobile = 'https://m.vacationrentalpros.com/';
    
    protected $tester;

    public function __construct(\AcceptanceTester $I)
    {
        $this->tester = $I;
    }

    public function productCard(){
        $I = $this->tester;

    }

}
