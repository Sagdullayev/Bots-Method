<?php
#👇🏿 ushbu joyga telegramdagi @BotFather robotidan olingan token ma'lumotini yozing.
$api = "your api token";

function bot($method,$datas=[]){
	global $api;
    $url = "https://api.telegram.org/bot".$api."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}



$update      = json_decode(file_get_contents('php://input'));
if(isset($update->message)){
$cid  = $update->message->chat->id;
$fid  = $update->message->from->id;
$text  = $update->message->text;
$name = $update->message->first_name;
$user = $update->message->from->username;
$mid  = $update->message->message_id;
$name  = $update->message->from->first_name;
$message = $update->message;
}

if(isset($update->callback_query)){
  $cid = $update->callback_query->message->chat->id;
  $qid = $update->callback_query->id;
  $fid = $update->callback_query->from->id;  
  $data = $update->callback_query->data;  
  $mid2 = $update->callback_query->message->message_id;
  $mid = $update->callback_query->message->message_id;
}



if($text == "text"){
  bot("SendMessage",[
    "chat_id"=>$cid,
    "text"=>"Hi,Welcome bot\nCreated by - sagdullayev",
    ]);
}
  
 if($text == "video"){
  bot("SendVideo",[
    "chat_id"=>$cid,
    "video"=>"video url",
    ]);
}
if($text == "photo"){
  bot("SendPhoto",[
    "chat_id"=>$cid,
    "photo"=>"photo url",
    ]);
}
if($text == "audio"){
  bot("SendAudio",[
    "chat_id"=>$cid,
    "audio"=>"audio url",
    ]);
}
  
  
  
