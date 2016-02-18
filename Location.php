<?php

class Location
{

    private $ip;
    private $json;

    function  __construct($ip = null)
    {
        if ($ip) {
            $this->ip = $ip;
        } else {
            $this->setRemoteIPAddress();
        }
        $this->url = 'http://freegeoip.net/json/'.$this->ip;
        $this->setJson();
    }

    private function setRemoteIPAddress()
    {
        if (!empty( $_SERVER['HTTP_CLIENT_IP'] )) {
            $this->ip = $_SERVER['HTTP_CLIENT_IP'];
        } else if (!empty( $_SERVER['HTTP_X_FORWARDED_FOR'] )) {
            $this->ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        $this->ip = $_SERVER['REMOTE_ADDR'];
    }

    private function setJson()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL            => $this->url,
            CURLOPT_HEADER         => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_BINARYTRANSFER => true,
        ));
        $json   = curl_exec($curl);
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        if ($status == 200) {
            $this->json = json_decode($json);
        } else {
            $this->json = false;
        }
    }

    public function getJson()
    {
        if ($this->json) {
            return $this->json;
        } else {
            return false;
        }
    }

}