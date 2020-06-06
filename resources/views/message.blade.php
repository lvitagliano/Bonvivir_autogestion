<?php

if(!isset($_GET['text']) or !isset($_GET['phone'])){ die('Not enough data');}

$apiURL = 'https://eu13.chat-api.com/instance59526/';
$token = '669fawnbosiegk9a';

$message = $_GET['text'];
$phone = $_GET['phone'];

$data = json_encode(
    array(
        'chatId'=>$phone.'@c.us',
        'body'=>$message
    )
);
$url = $apiURL.'message?token='.$token;
$options = stream_context_create(
    array('http' =>
        array(
            'method'  => 'POST',
            'header'  => 'Content-type: application/json',
            'content' => $data
        )
    )
);
$response = file_get_contents($url,false,$options);
echo $response; exit;


?>