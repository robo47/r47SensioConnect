<?php

class Robo47_Wordpress_SensioConnect
{
    /**
     * Profile Url
     */
    const PROFILEURL = 'https://connect.sensiolabs.com/profile/%s.json';

    /**
     * Profile Url
     */
    const CLUBURL = 'https://connect.sensiolabs.com/profile/%s.json';


    /**
     * @var Robo47_Http_HttpInterface
     */
    protected $http;

    /**
     *
     * @param Robo47_Http_HttpInterface $http
     */
    public function __construct(Robo47_Http_HttpInterface $http = null)
    {
        if ($http === null) {
            $http = new Robo47_Http_Curl();
        }
        $this->setHttp($http);
    }

    /**
     *
     * @return Robo47_Http_HttpInterface
     */
    public function getHttp()
    {
        return $this->http;
    }

    /**
     *
     * @param Robo47_Http_HttpInterface $http
     */
    public function setHttp(Robo47_Http_HttpInterface $http)
    {
        $this->http = $http;

        return $this;
    }

    /**
     * Fetches Profile of a user
     *
     * @return array
     */
    public function fetchSensioProfile($profile)
    {
        $url = sprintf(self::PROFILEURL, $profile);
        $code = $this->http->fetch($url);
        $json = json_decode($code, true);;

        return $json;
    }

}
