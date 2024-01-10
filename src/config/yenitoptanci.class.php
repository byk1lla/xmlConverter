<?php 
namespace YeniToptancı\Classes;
include "../../vendor/db.lib.php";

$response = [];

$db = new \DB("mysql:host=localhost;dbname=Urunler;charset=utf8","root","");

class yenitoptanci{
    private $db;

    public function __constructor(){
        $this->db = $GLOBALS['db'];
    }
   public function addUrun($data){
     try{
        $db = new \DB("mysql:host=localhost;dbname=Urunler;charset=utf8","root","");
        $datacik = [];
        foreach($data as $data1){
            foreach($data1 as $key => $val){
                if(is_array($val)){
                    $datacik["Resimler"] = json_encode($val);

                }
                else{
                    $datacik[$key] = $val;
                }

            }
        }
        
        $insert = $db->insert("urun",$datacik);
        if($insert > 0){
                return true;
            
        }else{
            throw new \DBException($insert);
        }


    }
     catch(\DBException $ex){
        return $ex->getMessage();
     }
    }
  
   public function addSecenek($data){
     try{
        $db = new \DB("mysql:host=localhost;dbname=Urunler;charset=utf8","root","");
        $datacik = [];
        $bum = 0;

        foreach($data as $data1){
           foreach($data1 as $key => $val){
                if(!is_array($val)){
                    $datacik[$key] = $val;
                }
                
           }
        }
        $insert = $db->insert("secenek",$datacik);
        if($insert > 0){
            return true;
        }
        else{
            throw new \DBException("Bir Hata Meydana Geldi!");
        }
     }
     catch(\DBException $ex){
        return $ex->getMessage();
     }
    }
   
}


?>