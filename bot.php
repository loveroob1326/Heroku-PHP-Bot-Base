<?php

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$message_id = $message->message_id;
$chat_id = $message->chat->id;
$text = $message->text;

define('TOKEN' , "1975042900:AAFJQPby8twN61oYhvASyaZW6ejYxmm2boU")
$admin = '799041666';

function bot($method, $data){
    $api = "https://api.telegram.org/bot". TOKEN ."/$method";
    $curl = curl_init($api);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    $res = curl_exec($curl);
    return json_decode($res);

}

if($text = "/start" || "/Start"){
    bot('SendMessage',[
        'chat_id' => $chat_id,
        'text' => "Hi Send Your Message"
    ]);
}
else{
    bot("ForwardMessage",[
        "from_chat_id" => $chat_id,
        "message_id" => $message_id,
        "chat_id" => $admin
    ]);
    bot("SendMessage",[
        "chat_id" => $chat_id,
        "text" => "Your Message Has Been Send !"
    ]);
}
