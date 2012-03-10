<?php

class Robo47_Wordpress_SensioConnectTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers Robo47_Wordpress_SensioConnect::__construct
     * @covers Robo47_Wordpress_SensioConnect::setHttp
     * @covers Robo47_Wordpress_SensioConnect::getHttp
     */
    public function test__construct()
    {
        $sensioConnect = new Robo47_Wordpress_SensioConnect();
        $this->assertInstanceOf('Robo47_Http_Curl', $sensioConnect->getHttp());
    }
    /**
     * @covers Robo47_Wordpress_SensioConnect::__construct
     * @covers Robo47_Wordpress_SensioConnect::setHttp
     * @covers Robo47_Wordpress_SensioConnect::getHttp
     */
    public function test__constructWithHttp()
    {
        $http = new Robo47_Http_MockSimple();
        $sensioConnect = new Robo47_Wordpress_SensioConnect($http);
        $this->assertSame($http, $sensioConnect->getHttp());
    }

    /**
     * @covers  Robo47_Wordpress_SensioConnect::fetchSensioProfile
     */
    public function testFetchSensioProfile()
    {
        $http = new Robo47_Http_MockSimple($this->getProfileFixture());
        $sensioConnect = new Robo47_Wordpress_SensioConnect($http);
        $this->markTestIncomplete('not fully implemented yet');
    }

    /**
     *
     * @return string
     */
    protected function getProfileFixture()
    {
        return file_get_contents(R47_SENSIOCONNECT_TEST_FIXTURES_ROOT . '/responses/profile-robo47.json');
    }
}
