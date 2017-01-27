<?php


/**
 * @group canonicals
 */

class CanonicalsCest
{

    protected $file;
    public static $url;
    public static $json;

    /**
     * @param FunctionalTester $I
     * Canonicals
     * @internal param \Codeception\Scenario $scenario
     */

    function _before(FunctionalTester $I) { // so as _beforeClass

        $this->file = __DIR__.'/../../../test.txt';
        $f = fopen($this->file, "r");
        $url_name = fgets($f);
        $domain_name = preg_replace('/.*\/\//','', $url_name);
        $domain_name = preg_replace('/\n+/','', $domain_name);
        $this->file = __DIR__.'/../../../../rules/'.$domain_name.'/canonical_url.json.cached';

        $json_data = file_get_contents($this->file);
        self::$json = json_decode($json_data,true);

    }

    function checkCanonicals(\Step\Functional\Common\Steps $I)
    {

        for ($j = 0; $j < count(self::$json['data']); $j++) {
            $I->sendRequestAndCheckCanonicals(self::$url . self::$json['data'][$j]['k'], self::$json['data'][$j]['v']);
        }
    }



}

