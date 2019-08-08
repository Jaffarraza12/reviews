<?php
//Access-Control-Allow-Origin header with wildcard.
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

error_reporting(4);
$server = 'http://localhost/reviews/';
//$server = 'https://reviews.appertunity.net/';
$url = $server.'public/api/question';


$data = array (
        'time' => $_REQUEST['time'],
        'product' => $_REQUEST['product']
);

$params = '';
foreach($data as $key=>$value)
    $params .= $key.'='.$value.'&';

$params = trim($params, '&');

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url.'?'.$params ); //Url together with parameters
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Return data instead printing directly in Browser
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT , 9); //Timeout after 7 seconds
curl_setopt($ch, CURLOPT_USERAGENT , "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
curl_setopt($ch, CURLOPT_HEADER, 0);

$result = curl_exec($ch);
curl_close($ch);

if(curl_errno($ch))  //catch if curl error exists and show it
    echo 'Curl error: ' . curl_error($ch);
else
    echo $result;


