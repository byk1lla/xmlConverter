<?php 
namespace YeniToptancı\Classes;
class Helper{
    public function xmlToArray($xml){
    $xml = file_get_contents($xml);
    $xmlObj = simplexml_load_string($xml);
    $json = json_encode($xmlObj);
    $phpArr = json_decode($json,true);
    return $phpArr;
    } 
    
    
}