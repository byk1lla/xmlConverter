<?php 
header('Content-Type: application/json; charset=utf-8');
require "../auto/autoload.php";
$index = 0;
$response = [];
try{


$URL = htmlspecialchars($_POST["xmlSource"]);

$phpArr = $helper->xmlToArray($URL);

// https://www.yenitoptanci.com/TicimaxXmlV2/D2BBE4C50CA0405C84490729BD1BF4B9/
$toplamİndex = 0;
foreach($phpArr as $key => $value){
    
    if(is_array($value)){
        foreach($value as $key1 => $value1){
            if(is_array($value1)){
                $index = count($value1);
                $in = 0;
                for($i = 0; $i < $index; $i++){
                    $toplamİndex++;
                    $in++;
                    $userData[$i] = [];
                    $secenekData = [];
                          
                    $userData[$i][$in]["UrunKartiID"] = $value1[$i]["UrunKartiID"];
                    $userData[$i][$in]["UrunAdi"] = $value1[$i]["UrunAdi"];
                    $userData[$i][$in]["OnYazi"] = $value1[$i]["OnYazi"];
                    $userData[$i][$in]["Aciklama"] = $value1[$i]["Aciklama"];
                    $userData[$i][$in]["Marka"] = $value1[$i]["Marka"];
                    $userData[$i][$in]["MarkaID"] = $value1[$i]["MarkaID"];
                    $userData[$i][$in]["SatisBirimi"] = $value1[$i]["SatisBirimi"];
                    $userData[$i][$in]["KategoriID"] = $value1[$i]["KategoriID"];
                    $userData[$i][$in]["Kategori"] = $value1[$i]["Kategori"];
                    $userData[$i][$in]["KategoriTree"] = $value1[$i]["KategoriTree"];
                    $userData[$i][$in]["UrunUrl"] = $value1[$i]["UrunUrl"];
                    $userData[$i][$in]["Resimler"] = $value1[$i]["Resimler"];
                    
                    foreach($value1[$i]["UrunSecenek"]["Secenek"] as $secenekKey => $secenekVal){
                        $secenekData[$i][$secenekKey] = $secenekVal;
                        
                    }

                    $addSecenek = $datab->addSecenek($secenekData);
                    $add = $datab->addUrun($userData[$i]);
                    if($addSecenek > 0){
                        $response["Status"] = true;
                        $response["Message"] ="$toplamİndex Veri VeriTabanına Aktarıldı!";
                    }else{
                        $response["Status"] = false;
                        $response["Message"] =  $add;
                    }
                }
            }   
        }
    }
}
}
catch(Exception $ex){
    $response["Status"]=false;
    $response["Type"] = get_class($ex);
    $response['Message']=$ex->getMessage();
}
catch(Error $er){
    $response["Status"]=false;
    $response["Type"] = get_class($er);
    $response['Message']=$er->getMessage();
}

echo json_encode($response);
