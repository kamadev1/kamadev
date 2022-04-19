<?php
ob_start();
define('API_KEY', '5323714196:AAGiA1nfFR72GpnEgrNffow91FUWMWiNBJo');
$admin = "467568642"; 

function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
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
function put($fayl,$nima){  
file_put_contents("$fayl","$nima");  
}  
function get($fayl){  
$get = file_get_contents("$fayl");  
return $get;  
}  
   function ty($chat_id){ 
   return bot('sendChatAction', [
   'chat_id' => $chat_id,
   'action' => 'typing',
   ]);
   } 
   function del($nomi){
   array_map('unlink', glob("$nomi"));
   }
          $replyc= json_encode([
           'resize_keyboard'=>false,
                'force_reply' => true,
                'selective' => true
            ]);
$efede = json_decode(file_get_contents('php://input'), true);

$update = json_decode(file_get_contents('php://input'));
$edname = $editm ->from->first_name;
$message = $update->message;
$mesid = $message->message_id;
$mid = $message->message_id;
$chat_id = $message->chat->id;
$forward = $update->message->forward_from;
$editm = $update->edited_message;
$fadmin = $message->from->id;
$tx = $message->text;
//callback
$data = $update->callback_query->data;
$qid = $update->callback_query->id;
$callcid = $update->callback_query->message->chat->id;
$clid = $update->callback_query->from->id;
$callmid = $update->callback_query->message->message_id;
$gid = $update->callback_query->message->chat->id;

//call_back
$data = $update->callback_query->data;
$qid = $update->callback_query->id;
$callcid = $update->callback_query->message->chat->id;
$calltext = $update->callback_query->message->text;
$clid = $update->callback_query->from->id;
$callmid = $update->callback_query->message->message_id;
$gid = $update->callback_query->message->chat->id;

//user
$id = $message->reply_to_message->from->id;   
$repmid = $message->reply_to_message->message_id; 
$repname = $message->reply_to_message->from->first_name;
$repulogin = $message->reply_to_message->from->username;
$reply = $message->reply_to_message;
$sreply = $message->reply_to_message->text;

$new_chat_members = $message->new_chat_member->id;
$lan = $message->new_chat_member->language_code;
$ism = $message->new_chat_member->first_name;
$username = $message->from->username;
$first_name = $message->from->first_name;
$is_bot = $message->new_chat_member->is_bot;

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$cid = $message->chat->id;
$text=$message->text;
$uid=$message->from->id;
$type=$message->chat->type;
$user=$message->from->username;
$mid=$message->message_id;

$first_name = $message->chat->first_name;
$fname = $message->from->first_name;
$lname = $message->from->last_name;
$u_name="$fname $lname";
$name2 = $update->callback_query->from->first_name;
$lname2 = $update->callback_query->from->last_name; 
$c_name="$name2 $lname2";

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$tx = $message->text;
$cid = $message->chat->id;
$ism = $message->from->first_name;
$inline = $update->callback_query->data;
$cid2 = $update->callback_query->message->chat->id; 
$reply = $message->reply_to_message->text;  
$step = file_get_contents("stat/$chat_id.step");
$guruhlar = file_get_contents("stat/group.list");
$userlar = file_get_contents("stat/user.list");

$rpl = json_encode([
    'recize_keyboard'=>false,
    'force_reply'=>true,
    'selective'=>true
     ]);

mkdir("stat");


if(isset($tx)){
ty($cid);
}

$mid = $message->message_id;
$edname = $editm ->from->first_name;
$forward2 = $update->message->forward_from;
$editm = $update->edited_message;
mkdir("data");
mkdir("data/$fadmin");
$starttx = "<b>👋🏻Assalomu alaykum <a href='tg://user?id=$chat_id'>$first_name</a>\n\n🤖Bu bot Uzbekiston Respublikasi Fargʻona viloyati Oltiariq tumanida joylashgan 31-IDUM maktabining rasmiy boti!</b>";
if(mb_stripos($tx,"/start")!==false){

   $baza=file_get_contents("data/users.txt");
   if(mb_stripos($baza,$chat_id) !==false){
   }else{
   $txt="\n$chat_id";
   $file=fopen("data/users.txt","a");
   fwrite($file,$txt);
   fclose($file);
   }
}

    if(stripos($tx,"/start") !== false){
  bot('sendmessage',[
    'chat_id'=>$chat_id,
   'text'=>"$starttx",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
   'inline_keyboard'=>[
    [['text'=>'📑Dars Jadvali','callback_data'=>'dars'],['text'=>'👨‍🏫Maktab Rahbarlari ','callback_data'=>'ustoz']],
    [['text'=>'👨🏻‍💻Dasturchi','callback_data'=>'adminss'],['text'=>'🏫Maktab Haqida','callback_data'=>'maktab']],
    [['text'=>'📕Botdan Foydalanish Yoʻriqnomasi','callback_data'=>'yoqriq']],
       ]
    ])
  ]);
}

if($data=="yoqriq"){
   bot('editMessageText',[
   'chat_id'=>$callcid,
        'message_id'=>$callmid,
    'text'=> "<b>🤖 Botdan foydalanish juda oson!</b>

,,<b>📑 Dars Jadvali</b>ʼʼ <i>tugmasiga bossangiz ertaga qanaqa darslar boʻlishini bilib olasiz!</i>

,,<b>👨‍🏫 Maktab Rahbarlari</b>ʼʼ <i>tugmasiga bossangiz maktab raxbarlari haqida  toʻliq malumot olasiz!</i>

,,<b>👨🏻‍💻 Dasturchi</b>ʼʼ <i>tugmasiga bossangiz bot dasturchisi haqida bilib olasiz!</i>

,,<b>🏫 Maktab Haqida</b>ʼʼ <i>tugmasiga bossangiz maktab haqida koʻproq malumotlar bilib olishingiz mumkun!</i>",
'parse_mode' => 'html',
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(
['inline_keyboard' => [
  [['text'=>'⬅️ Orqaga', 'callback_data' => "back"]],
]
]),
]);
}

if($data=="back"){
    bot('editmessagetext',[
       'chat_id'=>$callcid,
        'message_id'=>$callmid,
        'text'=>"<b>👋🏻Assalomu alaykum <a href='tg://user?id=$chat_id'>$first_name</a>\n\n🤖Bu bot Uzbekiston Respublikasi Fargʻona viloyati Oltiariq tumanida joylashgan 31-IDUM maktabining rasmiy boti!</b>",
        'parse_mode'=>'html',
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                 [['text'=>'📑Dars Jadvali','callback_data'=>'dars'],['text'=>'👨‍🏫Maktab Rahbarlari ','callback_data'=>'ustoz']],
    [['text'=>'👨🏻‍💻Dasturchi','callback_data'=>'adminss'],['text'=>'🏫Maktab Haqida','callback_data'=>'maktab']],
    [['text'=>'📕Botdan Foydalanish Yoʻriqnomasi','callback_data'=>'yoqriq']],
           ]
        ])
    ]);
}

if($data=="dars"){
    bot('editmessagetext',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
        'text'=> "<i>🗒️O'zingizga kerakli sinfni tanlang:👇🏻</i>",
'parse_mode' => 'html',
'reply_markup'=>json_encode(
['inline_keyboard' => [
[['text'=>'💼️5-sinf','callback_data'=>"5"],['text'=>'💼6-sinf', 'callback_data' => "6"]],
[['text'=>'💼7-sinf','callback_data'=>"7"],['text'=>'💼8-sinf', 'callback_data' => "8"]],
[['text'=>'💼9-sinf','callback_data'=>"9"],['text'=>'💼10-sinf', 'callback_data' => "10"]],
[['text'=>'💼11-sinf','callback_data'=>"11"]],
[['text'=>'⬅️ Orqaga', 'callback_data'=>"back"]],
]
]),
]);
}

if($data=="5a"){
    bot('editmessagetext',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
        'text'=> "<i>ℹ️️Hafta kunlaridan birini tanlang:👇🏻</i>",
'parse_mode' => 'html',
'reply_markup'=>json_encode(
['inline_keyboard' => [
[['text'=>'🗒Dushanba','callback_data'=>"dushanba"],['text'=>'🗒Seshanba', 'callback_data' => "Seshanba"]],
[['text'=>'🗒Chorshanba','callback_data'=>"Chorshanba"],['text'=>'🗒Payshanba', 'callback_data' => "Payshanba"]],
[['text'=>'🗒Juma','callback_data'=>"Juma"],['text'=>'🗒Shanba', 'callback_data' => "Shanba"]],
[['text'=>'⬅️Orqaga', 'callback_data'=>"5"]],
]
]),
]);
}
if($data=="5b"){
    bot('editmessagetext',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
        'text'=> "<i>ℹ️️Hafta kunlaridan birini tanlang:👇🏻</i>",
'parse_mode' => 'html',
'reply_markup'=>json_encode(
['inline_keyboard' => [
[['text'=>'🗒Dushanba','callback_data'=>"dushanba"],['text'=>'🗒Seshanba', 'callback_data' => "Seshanba"]],
[['text'=>'🗒Chorshanba','callback_data'=>"Chorshanba"],['text'=>'🗒Payshanba', 'callback_data' => "Payshanba"]],
[['text'=>'🗒Juma','callback_data'=>"Juma"],['text'=>'🗒Shanba', 'callback_data' => "Shanba"]],
[['text'=>'⬅️Orqaga', 'callback_data'=>"5"]],
]
]),
]);
}
if($data=="6b"){
    bot('editmessagetext',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
        'text'=> "<i>ℹ️️Hafta kunlaridan birini tanlang:👇🏻</i>",
'parse_mode' => 'html',
'reply_markup'=>json_encode(
['inline_keyboard' => [
[['text'=>'🗒Dushanba','callback_data'=>"dushanba"],['text'=>'🗒Seshanba', 'callback_data' => "Seshanba"]],
[['text'=>'🗒Chorshanba','callback_data'=>"Chorshanba"],['text'=>'🗒Payshanba', 'callback_data' => "Payshanba"]],
[['text'=>'🗒Juma','callback_data'=>"Juma"],['text'=>'🗒Shanba', 'callback_data' => "Shanba"]],
[['text'=>'⬅️Orqaga', 'callback_data'=>"6"]],
]
]),
]);
}
if($data=="6a"){
    bot('editmessagetext',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
        'text'=> "<i>ℹ️️Hafta kunlaridan birini tanlang:👇🏻</i>",
'parse_mode' => 'html',
'reply_markup'=>json_encode(
['inline_keyboard' => [
[['text'=>'🗒Dushanba','callback_data'=>"dushanba"],['text'=>'🗒Seshanba', 'callback_data' => "Seshanba"]],
[['text'=>'🗒Chorshanba','callback_data'=>"Chorshanba"],['text'=>'🗒Payshanba', 'callback_data' => "Payshanba"]],
[['text'=>'🗒Juma','callback_data'=>"Juma"],['text'=>'🗒Shanba', 'callback_data' => "Shanba"]],
[['text'=>'⬅️Orqaga', 'callback_data'=>"6"]],
]
]),
]);
}
if($data=="7a"){
    bot('editmessagetext',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
        'text'=> "<i>ℹ️️Hafta kunlaridan birini tanlang:👇🏻</i>",
'parse_mode' => 'html',
'reply_markup'=>json_encode(
['inline_keyboard' => [
[['text'=>'🗒Dushanba','callback_data'=>"dushanba"],['text'=>'🗒Seshanba', 'callback_data' => "Seshanba"]],
[['text'=>'🗒Chorshanba','callback_data'=>"Chorshanba"],['text'=>'🗒Payshanba', 'callback_data' => "Payshanba"]],
[['text'=>'🗒Juma','callback_data'=>"Juma"],['text'=>'🗒Shanba', 'callback_data' => "Shanba"]],
[['text'=>'⬅️Orqaga', 'callback_data'=>"7"]],
]
]),
]);
}
if($data=="7b"){
    bot('editmessagetext',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
        'text'=> "<i>ℹ️️Hafta kunlaridan birini tanlang:👇🏻</i>",
'parse_mode' => 'html',
'reply_markup'=>json_encode(
['inline_keyboard' => [
[['text'=>'🗒Dushanba','callback_data'=>"dushanba"],['text'=>'🗒Seshanba', 'callback_data' => "Seshanba"]],
[['text'=>'🗒Chorshanba','callback_data'=>"Chorshanba"],['text'=>'🗒Payshanba', 'callback_data' => "Payshanba"]],
[['text'=>'🗒Juma','callback_data'=>"Juma"],['text'=>'🗒Shanba', 'callback_data' => "Shanba"]],
[['text'=>'⬅️Orqaga', 'callback_data'=>"7"]],
]
]),
]);
}
if($data=="8b"){
    bot('editmessagetext',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
        'text'=> "<i>ℹ️️Hafta kunlaridan birini tanlang:👇🏻</i>",
'parse_mode' => 'html',
'reply_markup'=>json_encode(
['inline_keyboard' => [
[['text'=>'🗒Dushanba','callback_data'=>"dushanba"],['text'=>'🗒Seshanba', 'callback_data' => "Seshanba"]],
[['text'=>'🗒Chorshanba','callback_data'=>"Chorshanba"],['text'=>'🗒Payshanba', 'callback_data' => "Payshanba"]],
[['text'=>'🗒Juma','callback_data'=>"Juma"],['text'=>'🗒Shanba', 'callback_data' => "Shanba"]],
[['text'=>'⬅️Orqaga', 'callback_data'=>"8"]],
]
]),
]);
}
if($data=="8a"){
    bot('editmessagetext',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
        'text'=> "<i>ℹ️️Hafta kunlaridan birini tanlang:👇🏻</i>",
'parse_mode' => 'html',
'reply_markup'=>json_encode(
['inline_keyboard' => [
[['text'=>'🗒Dushanba','callback_data'=>"dushanba"],['text'=>'🗒Seshanba', 'callback_data' => "Seshanba"]],
[['text'=>'🗒Chorshanba','callback_data'=>"Chorshanba"],['text'=>'🗒Payshanba', 'callback_data' => "Payshanba"]],
[['text'=>'🗒Juma','callback_data'=>"Juma"],['text'=>'🗒Shanba', 'callback_data' => "Shanba"]],
[['text'=>'⬅️Orqaga', 'callback_data'=>"8"]],
]
]),
]);
}
if($data=="9b"){
    bot('editmessagetext',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
        'text'=> "<i>ℹ️️Hafta kunlaridan birini tanlang:👇🏻</i>",
'parse_mode' => 'html',
'reply_markup'=>json_encode(
['inline_keyboard' => [
[['text'=>'🗒Dushanba','callback_data'=>"dushanba"],['text'=>'🗒Seshanba', 'callback_data' => "Seshanba"]],
[['text'=>'🗒Chorshanba','callback_data'=>"Chorshanba"],['text'=>'🗒Payshanba', 'callback_data' => "Payshanba"]],
[['text'=>'🗒Juma','callback_data'=>"Juma"],['text'=>'🗒Shanba', 'callback_data' => "Shanba"]],
[['text'=>'⬅️Orqaga', 'callback_data'=>"9"]],
]
]),
]);
}
if($data=="9a"){
    bot('editmessagetext',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
        'text'=> "<i>ℹ️️Hafta kunlaridan birini tanlang:👇🏻</i>",
'parse_mode' => 'html',
'reply_markup'=>json_encode(
['inline_keyboard' => [
[['text'=>'🗒Dushanba','callback_data'=>"dushanba"],['text'=>'🗒Seshanba', 'callback_data' => "Seshanba"]],
[['text'=>'🗒Chorshanba','callback_data'=>"Chorshanba"],['text'=>'🗒Payshanba', 'callback_data' => "Payshanba"]],
[['text'=>'🗒Juma','callback_data'=>"Juma"],['text'=>'🗒Shanba', 'callback_data' => "Shanba"]],
[['text'=>'⬅️Orqaga', 'callback_data'=>"9"]],
]
]),
]);
}
if($data=="10b"){
    bot('editmessagetext',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
        'text'=> "<i>ℹ️️Hafta kunlaridan birini tanlang:👇🏻</i>",
'parse_mode' => 'html',
'reply_markup'=>json_encode(
['inline_keyboard' => [
[['text'=>'🗒Dushanba','callback_data'=>"dushanba"],['text'=>'🗒Seshanba', 'callback_data' => "Seshanba"]],
[['text'=>'🗒Chorshanba','callback_data'=>"Chorshanba"],['text'=>'🗒Payshanba', 'callback_data' => "Payshanba"]],
[['text'=>'🗒Juma','callback_data'=>"Juma"],['text'=>'🗒Shanba', 'callback_data' => "Shanba"]],
[['text'=>'⬅️Orqaga', 'callback_data'=>"10"]],
]
]),
]);
}
if($data=="10a"){
    bot('editmessagetext',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
        'text'=> "<i>ℹ️️Hafta kunlaridan birini tanlang:👇🏻</i>",
'parse_mode' => 'html',
'reply_markup'=>json_encode(
['inline_keyboard' => [
[['text'=>'🗒Dushanba','callback_data'=>"dushanba"],['text'=>'🗒Seshanba', 'callback_data' => "Seshanba"]],
[['text'=>'🗒Chorshanba','callback_data'=>"Chorshanba"],['text'=>'🗒Payshanba', 'callback_data' => "Payshanba"]],
[['text'=>'🗒Juma','callback_data'=>"Juma"],['text'=>'🗒Shanba', 'callback_data' => "Shanba"]],
[['text'=>'⬅️Orqaga', 'callback_data'=>"10"]],
]
]),
]);
}
if($data=="11b"){
    bot('editmessagetext',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
        'text'=> "<i>ℹ️️Hafta kunlaridan birini tanlang:👇🏻</i>",
'parse_mode' => 'html',
'reply_markup'=>json_encode(
['inline_keyboard' => [
[['text'=>'🗒Dushanba','callback_data'=>"dushanba"],['text'=>'🗒Seshanba', 'callback_data' => "Seshanba"]],
[['text'=>'🗒Chorshanba','callback_data'=>"Chorshanba"],['text'=>'🗒Payshanba', 'callback_data' => "Payshanba"]],
[['text'=>'🗒Juma','callback_data'=>"Juma"],['text'=>'🗒Shanba', 'callback_data' => "Shanba"]],
[['text'=>'⬅️Orqaga', 'callback_data'=>"11"]],
]
]),
]);
}
if($data=="11a"){
    bot('editmessagetext',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
        'text'=> "<i>ℹ️️Hafta kunlaridan birini tanlang:👇🏻</i>",
'parse_mode' => 'html',
'reply_markup'=>json_encode(
['inline_keyboard' => [
[['text'=>'🗒Dushanba','callback_data'=>"dushanba"],['text'=>'🗒Seshanba', 'callback_data' => "Seshanba"]],
[['text'=>'🗒Chorshanba','callback_data'=>"Chorshanba"],['text'=>'🗒Payshanba', 'callback_data' => "Payshanba"]],
[['text'=>'🗒Juma','callback_data'=>"Juma"],['text'=>'🗒Shanba', 'callback_data' => "Shanba"]],
[['text'=>'⬅️Orqaga', 'callback_data'=>"11"]],
]
]),
]);
}
if($data=="5"){
    bot('editmessagetext',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
        'text'=> "<i>🗒️O'zingizga kerakli sinfni tanlang:👇🏻</i>",
'parse_mode' => 'html',
'reply_markup'=>json_encode(
['inline_keyboard' => [
[['text'=>'5-A','callback_data'=>"5a"],['text'=>'5-B', 'callback_data' => "5b"]],
[['text'=>'⬅️Orqaga', 'callback_data'=>"dars"]],
]
]),
]);
}
if($data=="6"){
    bot('editmessagetext',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
        'text'=> "<i>🗒️O'zingizga kerakli sinfni tanlang:👇🏻</i>",
'parse_mode' => 'html',
'reply_markup'=>json_encode(
['inline_keyboard' => [
[['text'=>'6-A','callback_data'=>"6a"],['text'=>'6-B', 'callback_data' => "6b"]],
[['text'=>'⬅️Orqaga', 'callback_data'=>"dars"]],
]
]),
]);
}
if($data=="7"){
    bot('editmessagetext',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
        'text'=> "<i>🗒️O'zingizga kerakli sinfni tanlang:👇🏻</i>",
'parse_mode' => 'html',
'reply_markup'=>json_encode(
['inline_keyboard' => [
[['text'=>'7-A','callback_data'=>"7a"],['text'=>'7-B', 'callback_data' => "7b"]],
[['text'=>'⬅️Orqaga', 'callback_data'=>"dars"]],
]
]),
]);
}
if($data=="8"){
    bot('editmessagetext',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
        'text'=> "<i>🗒️O'zingizga kerakli sinfni tanlang:👇🏻</i>",
'parse_mode' => 'html',
'reply_markup'=>json_encode(
['inline_keyboard' => [
[['text'=>'8-A','callback_data'=>"8a"],['text'=>'8-B', 'callback_data' => "8b"]],
[['text'=>'⬅️Orqaga', 'callback_data'=>"dars"]],
]
]),
]);
}
if($data=="9"){
    bot('editmessagetext',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
        'text'=> "<i>🗒️O'zingizga kerakli sinfni tanlang:👇🏻</i>",
'parse_mode' => 'html',
'reply_markup'=>json_encode(
['inline_keyboard' => [
[['text'=>'9-A','callback_data'=>"9a"],['text'=>'9-B', 'callback_data' => "9b"]],
[['text'=>'⬅️Orqaga', 'callback_data'=>"dars"]],
]
]),
]);
}
if($data=="10"){
    bot('editmessagetext',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
        'text'=> "<i>🗒️O'zingizga kerakli sinfni tanlang:👇🏻</i>",
'parse_mode' => 'html',
'reply_markup'=>json_encode(
['inline_keyboard' => [
[['text'=>'10-A','callback_data'=>"10a"],['text'=>'10-B', 'callback_data' => "10b"]],
[['text'=>'⬅️Orqaga', 'callback_data'=>"dars"]],
]
]),
]);
}
if($data=="11"){
    bot('editmessagetext',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
        'text'=> "<i>🗒️O'zingizga kerakli sinfni tanlang:👇🏻</i>",
'parse_mode' => 'html',
'reply_markup'=>json_encode(
['inline_keyboard' => [
[['text'=>'11-A','callback_data'=>"11a"],['text'=>'11-B', 'callback_data' => "11b"]],
[['text'=>'⬅️Orqaga', 'callback_data'=>"dars"]],
]
]),
]);
}

if($data=="hafta"){
    bot('editmessagetext',[
        'chat_id'=>$callcid,
        'message_id'=>$callmid,
        'text'=> "<i>ℹ️️Hafta kunlaridan birini tanlang:👇🏻</i>",
'parse_mode' => 'html',
'reply_markup'=>json_encode(
['inline_keyboard' => [
[['text'=>'🗒Dushanba','callback_data'=>"dushanba"],['text'=>'🗒Seshanba', 'callback_data' => "Seshanba"]],
[['text'=>'🗒Chorshanba','callback_data'=>"Chorshanba"],['text'=>'🗒Payshanba', 'callback_data' => "Payshanba"]],
[['text'=>'🗒Juma','callback_data'=>"Juma"],['text'=>'🗒Shanba', 'callback_data' => "Shanba"]],
[['text'=>'⬅️Orqaga', 'callback_data'=>"dars"]],
]
]),
]);
}

if($data=="dushanba"){
   bot('editMessageText',[
   'chat_id'=>$callcid,
        'message_id'=>$callmid,
    'text'=> "📜 Dushanba Kuni Sizning Darsingiz Quydagilardan Iborat 👇

1️⃣ - Geografia 
2️⃣ - Algebra
3️⃣ - Geometriya
4️⃣ - Biologia
5️⃣ - Adabiot
6️⃣ - chizmachilik

⬆️ Dars Soat - 8:30 Da Boshlanadi ❗️
⬇️ Dars SOat - 13:45 Da Tugaydi ❗️",
'parse_mode' => 'html',
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(
['inline_keyboard' => [
  [['text'=>'⬅️Orqaga', 'callback_data' => "dars"]],
]
]),
]);
}
if($data=="Seshanba"){
   bot('editMessageText',[
   'chat_id'=>$callcid,
        'message_id'=>$callmid,
    'text'=> "📜 Seshanba Kuni Sizning Darsingiz Quydagilardan Iborat 👇

1️⃣ - Geografia 
2️⃣ - Algebra
3️⃣ - Geometriya
4️⃣ - Biologia
5️⃣ - Adabiot
6️⃣ - chizmachilik

⬆️ Dars Soat - 8:30 Da Boshlanadi ❗️
⬇️ Dars SOat - 13:45 Da Tugaydi ❗️",
'parse_mode' => 'html',
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(
['inline_keyboard' => [
  [['text'=>'⬅️Orqaga', 'callback_data' => "dars"]],
]
]),
]);
}
if($data=="Payshanba"){
   bot('editMessageText',[
   'chat_id'=>$callcid,
        'message_id'=>$callmid,
    'text'=> "📜 Payshanba Kuni Sizning Darsingiz Quydagilardan Iborat 👇

1️⃣ - Geografia 
2️⃣ - Algebra
3️⃣ - Geometriya
4️⃣ - Biologia
5️⃣ - Adabiot
6️⃣ - chizmachilik

⬆️ Dars Soat - 8:30 Da Boshlanadi ❗️
⬇️ Dars SOat - 13:45 Da Tugaydi ❗️",
'parse_mode' => 'html',
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(
['inline_keyboard' => [
  [['text'=>'⬅️Orqaga', 'callback_data' => "dars"]],
]
]),
]);
}
if($data=="Chorshanba"){
   bot('editMessageText',[
   'chat_id'=>$callcid,
        'message_id'=>$callmid,
    'text'=> "📜 Chorshanba Kuni Sizning Darsingiz Quydagilardan Iborat 👇

1️⃣ - Geografia 
2️⃣ - Algebra
3️⃣ - Geometriya
4️⃣ - Biologia
5️⃣ - Adabiot
6️⃣ - chizmachilik

⬆️ Dars Soat - 8:30 Da Boshlanadi ❗️
⬇️ Dars SOat - 13:45 Da Tugaydi ❗️",
'parse_mode' => 'html',
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(
['inline_keyboard' => [
  [['text'=>'⬅️Orqaga', 'callback_data' => "dars"]],
]
]),
]);
}

if($data=="Juma"){
   bot('editMessageText',[
   'chat_id'=>$callcid,
        'message_id'=>$callmid,
    'text'=> "📜 Juma Kuni Sizning Darsingiz Quydagilardan Iborat 👇

1️⃣ - Geografia 
2️⃣ - Algebra
3️⃣ - Geometriya
4️⃣ - Biologia
5️⃣ - Adabiot
6️⃣ - chizmachilik

⬆️ Dars Soat - 8:30 Da Boshlanadi ❗️
⬇️ Dars SOat - 13:45 Da Tugaydi ❗️",
'parse_mode' => 'html',
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(
['inline_keyboard' => [
  [['text'=>'⬅️Orqaga', 'callback_data' => "dars"]],
]
]),
]);
}

if($data=="Shanba"){
   bot('editMessageText',[
   'chat_id'=>$callcid,
        'message_id'=>$callmid,
    'text'=> "📜 Shanba Kuni Sizning Darsingiz Quydagilardan Iborat 👇

1️⃣ - Geografia 
2️⃣ - Algebra
3️⃣ - Geometriya
4️⃣ - Biologia
5️⃣ - Adabiot
6️⃣ - chizmachilik

⬆️ Dars Soat - 8:30 Da Boshlanadi ❗️
⬇️ Dars SOat - 13:45 Da Tugaydi ❗️",
'parse_mode' => 'html',
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(
['inline_keyboard' => [
  [['text'=>'⬅️Orqaga', 'callback_data' => "dars"]],
]
]),
]);
}
  
if($data=="adminss"){
   $soat = date('H:i', strtotime('5 hour'));
   bot('editMessageText',[
   'chat_id'=>$callcid,
        'message_id'=>$callmid,
    'text'=> "<b>️📑Ismi</b> - <i>Mahmudov Muhriddin</i>
<b>📆Tugilgan sanasi</b> - <i>30.01.2005</i>
<b>🏠Yashash manzili</b> - Fargʻona viloyati, Oltiariq tumani
<b>📚Qiziqishi</b>  - <i>Dasturchilik, Programmist</i>
<b>👨🏻‍💻 Dasturchi:</b> <a href='tg://user?id=$admin'>Mahmudov Muhriddin</a>

<b>⏰Soat:</b> <i>$soat</i>",
'parse_mode' => 'html',
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(
['inline_keyboard' => [
  [['text'=>'⬅️Orqaga', 'callback_data' => "back"]],
]
]),
]);
}

if($data=="ustoz"){
   bot('editMessageText',[
   'chat_id'=>$callcid,
        'message_id'=>$callmid,
    'text'=> "Ustozlar Bo'limi🧑‍🏫",
'parse_mode' => 'html',
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(
['inline_keyboard' => [
  [['text'=>'⬅️Orqaga', 'callback_data' => "back"]],
]
]),
]);
}
if($data=="maktab"){
   bot('editMessageText',[
  'chat_id'=>$callcid,
        'message_id'=>$callmid,
    'text'=> "<b>🏡Maktab Haqida Qisqacha:👇🏻</b>
    
<b>ℹ️Muassasa nomi:</b> <i>31-IDUM</i>
<b>📌Muassasa turi:</b> <i>Maktablar</i>
<b>📍Manzil:</b> <i>Fargʻona Viloyati, Oltiariq tumani</i>
<b>🧑‍🏫 Mas‘ul shaxsning ism-sharifi:</b> <i>Nomaʼlum</i>
<b>📞Ma‘sul shaxsning telefon raqami:</b> <i>+998-xx-xxx-xx-xx</i>",
'parse_mode' => 'html',
'reply_markup'=>json_encode(
['inline_keyboard' => [
  [['text'=>'⬅️Orqaga', 'callback_data' => "back"]],
]
]),
]);
}

if($type=="private"){
if(strpos($directs,"$cid") !==false){
}else{
file_put_contents("stat/directs.txt","$directs \n$cid");
}
} 
if($type=="supergroup" or $type=="group"){
if(strpos($groups,"$cid") !==false){
}else{
file_put_contents("stat/group.txt","$groups \n$cid");
}
}

$lichka=file_get_contents("azo.dat");
$gruppa=file_get_contents("gr.dat");
if($type=="private"){
if(strpos($lichka,"$cid") !==false){
}else{
file_put_contents("azo.dat","$lichka\n$cid");
}
} 

if($type=="supergroup" or $type=="group"){
if(strpos($gruppa,"$cid") !==false){
}else{
file_put_contents("gr.dat","$gruppa\n$cid");
}
}

if($text == "/stat" and $cid == $admin){
$lichka=file_get_contents("azo.dat");
$gruppa=file_get_contents("gr.dat");
$lich=substr_count($lichka,"\n");
$gr=substr_count($gruppa,"\n");
$um=$lich + $gr;
bot('sendMessage',[
'chat_id'=>$cid,
    'text'=> "<b>📊 Bot Statistikasi</b>
<b>👤A'zolar:</b> <i>$lich</i>",
'parse_mode'=>'html',
'reply_markup'=>$panel,
]);
}

?>