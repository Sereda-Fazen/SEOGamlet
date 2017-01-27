<?php

namespace Page;

class RoyalRobbinsPage
{

    protected $tester;

    /**
     * Canonicals
     */

    public static $canonical = '//head/link[@rel="canonical"][@href="';
    public static $close = '"]';

    /**
     * Robots
     */

    public static $robots = '//head/meta[@name="robots"][@content="noindex,nofollow"]';



    /**
     * Title
     */

    public static $title = '//head/title[text()]';

    /**
     * Description
     */

    public static $decs = '//*[@content="';
    public static $close2 = '"]';
    
    /**
     * Nofollows
     */

    public static $nofollow = '//head/title["404"]';

    public function __construct(\FunctionalTester $I)
    {
        $this->tester = $I;
    }


}