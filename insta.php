<?php

//Kod @Clever_Coders kanali orqali tarqatildi!
//Faqat Isntagram Rasm Va Video larini yuklaydi Reels videolarni yuklay olmaydi!!!
set_time_limit(0);

$url = $_GET["url"];
$g = file_get_contents("https://keeppost.com/");
$j = explode ("build_key",$g);
$build_key = str_replace(['value="','"'],['',''],explode("type",$j[1])[0]);
$k = explode ("build_id",$g);
$build_id = str_replace(['value="','"'],['',''],explode("type",$k[1])[0]); 
$Curl_Session = curl_init('https://keeppost.com/process.php');
curl_setopt ($Curl_Session, CURLOPT_POST, 1);
curl_setopt ($Curl_Session, CURLOPT_POSTFIELDS, "url=".trim($url)."&build_id=".trim($build_id)."&build_key=".trim($build_key));
curl_setopt ($Curl_Session, CURLOPT_FOLLOWLOCATION, 1);
curl_exec ($Curl_Session);
curl_close ($Curl_Session);
// By @Clever_Coders @Ahzee



?>