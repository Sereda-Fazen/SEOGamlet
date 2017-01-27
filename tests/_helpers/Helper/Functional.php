<?php
namespace Helper;
// here you can define custom actions
// all public methods declared in helper class will be available in $I

class Functional extends \Codeception\Module
{

    public function getUrl()
    {
        $url = $this->getModule('PhpBrowser')->getUri();
        $url->comment($url);
    }
    
}
