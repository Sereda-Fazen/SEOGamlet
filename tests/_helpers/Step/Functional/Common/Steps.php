<?php
namespace Step\Functional\Common;


use Exception;
use Page\RoyalRobbinsPage;

class Steps extends \FunctionalTester
{

    /**
     * @param $request
     * @param $expect
     * ROYAL ROBBINS
     */
    public function sendRequestAndCheckCanonicals ($request, $expect)
    {
        $I = $this;
        $test[0] = '/[\\\\\.]|(Z\(\?ms\))$/';
        $canonical = RoyalRobbinsPage::$canonical;
        $close = RoyalRobbinsPage::$close;

        try {
            $I->amOnPage(preg_replace($test, '', $request));
            $I->canSeeElement($canonical . $expect . $close);
            $I->expect('have a canonical tag pointing to - ' . $expect);

        } catch (Exception $e) {
            if (isset($options['timeout']) == 10) {
                exit;
            }
            $I->canSeePageNotFound();
            $I->comment('-----------------------------------------------------------');
            $I->comment('Page for checking tag canonicals is being loaded more 10 second');
            $I->comment('-----------------------------------------------------------');

        }
    }

    public function sendRequestAndCheckErrors ($request, $expect) {
        $I = $this;
        $test[0] = '/301,/';
        $test[1] = '/((http[s]?:\/\/)|(www\.))[\S]+(\.com)/';
        try {
            $I->amOnPage($request);
            $I->canSeeInCurrentUrl(preg_replace ( $test, '', $expect));
            $I->expect('errors tag pointing to the first page - '.$expect);

        } catch (Exception $e) {
            if (isset($options['timeout']) == 10) {
                exit;
            }
            $I->canSeePageNotFound();
            $I->comment('-----------------------------------------------------------');
            $I->comment('Page for checking tag - error is being loaded more 10 second');
            $I->comment('-----------------------------------------------------------');

        }
    }
    
    public function sendRequestAndCheckDescription ($request, $expect) {
        $I = $this;
        $canonical = RoyalRobbinsPage::$decs;
        $close = RoyalRobbinsPage::$close2;
        try {
            $I->amOnPage($request);
            $I->canSeeElement($canonical . $expect . $close);
            $I->expect('a description tag pointing to - ' . $expect);
        } catch (Exception $e) {
            if (isset($options['timeout']) == 10) {
                exit;
            }
            $I->canSeePageNotFound();
            $I->comment('-----------------------------------------------------------');
            $I->comment('Page for checking tag - description is being loaded more 10 second');
            $I->comment('-----------------------------------------------------------');
        }
    }

    public function sendRequestAndCheckNofollows ($request, $expect) {
        $I = $this;
        $nofollow = RoyalRobbinsPage::$nofollow;
        $test[0] = '/[\\\\\.]|(Z\(\?ms\))$/';
        try {
            $I->amOnPage(preg_replace($test, '', $request));
            $I->canSeeElement($nofollow);
            $I->expect('to have errors tag pointing to the first page - ' . $expect);
        } catch (Exception $e) {
            if (isset($options['timeout']) == 10) {
                exit;
            }
            $I->canSeePageNotFound();
            $I->comment('-----------------------------------------------------------');
            $I->comment('Page for checking tag - nofollow is being loaded more 10 second');
            $I->comment('-----------------------------------------------------------');
        }
    }

    public function sendRequestAndCheckRedirects ($request, $expect) {
        $I = $this;
        $test[0] = '/301,/';
        $test[1] = '/((http[s]?:\/\/)|(www\.))[\S]+(\.com)/';
        try {
            $I->amOnPage($request);
            $I->canSeeInCurrentUrl(preg_replace($test, '', $expect));
            $I->expect('redirects tag pointing to the first page - ' . $expect);
        } catch (Exception $e) {
            if (isset($options['timeout']) == 10) {
                exit;
            }
            $I->canSeePageNotFound();
            $I->comment('-----------------------------------------------------------');
            $I->comment('Page for checking tag - redirect is being loaded more 10 second');
            $I->comment('-----------------------------------------------------------');
        }
    }

    public function sendRequestAndCheckRobots ($request, $expect) {
        $I = $this;
        $robots = RoyalRobbinsPage::$robots;
        $test[0] = '/[\\\\\.]|(Z\(\?ms\))$/';
        try {
            $I->amOnPage(preg_replace($test, '', $request));
            $I->canSeeElement($robots);
            $I->expect('a robots tag pointing to - ' . $expect);
        } catch (Exception $e) {
            if (isset($options['timeout']) == 10) {
                exit;
            }
            $I->canSeePageNotFound();
            $I->comment('-----------------------------------------------------------');
            $I->comment('Page for checking tag - robot is being loaded more 10 second');
            $I->comment('-----------------------------------------------------------');
        }
    }

    public function sendRequestAndCheckTitles ($request, $expect) {
        $I = $this;
        $titles = RoyalRobbinsPage::$title;
        try {
            $I->amOnPage($request);
            $I->canSeeElement($titles);
            $I->canSeeInTitle($expect);
            $I->expect('titles tag pointing to the first page - ' . $expect);
        } catch (Exception $e) {
            if (isset($options['timeout']) == 10) {
                exit;
            }
            $I->canSeePageNotFound();
            $I->comment('-----------------------------------------------------------');
            $I->comment('Page for checking tag title is being loaded more 10 second');
            $I->comment('-----------------------------------------------------------');

        }
    }








    /**------------------------------------------------------------------------
     *
     */
    /*
$test = $I->grabTextFrom('body');
if (stripos($test, 'Error: Server Error') === true){
$I->comment($test);
} else {
    $I->canSeeElement($canonical . html_entity_decode($expect) . $close);
    $I->expect('have a canonical tag pointing to - ' . html_entity_decode($expect));
}
$I->comment('-------');
    */
}