<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
error_reporting(0);

if($_SERVER['REQUEST_METHOD']==='POST') {  // REQUIRE POST OR DIE
    $post = json_decode(file_get_contents('php://input'), true);
    if($post['date']){
      $post['date'] = date('Y-m-d h:i:s',strtotime($post['date']));
    }

    $qryString = '';
    foreach($post as $key => $val){
        $qryString .= $key.'='.$val.'&';
    }
    //$server = 'http://localhost/reviews/';
    $server = 'https://reviews.appertunity.net/';
    $url = $server.'public/api/product-register';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $qryString );
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);  // DO NOT RETURN HTTP HEADERS
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  // RETURN THE CONTENTS OF THE CALL
    $Rec_Data = curl_exec($ch);
    echo $Rec_Data;
    curl_close($ch);
}
