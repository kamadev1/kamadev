<?php
//Kod @Clever_Coders kanali orqali tarqatildi!
//Faqat Isntagram Rasm Va Video larini yuklaydi Reels videolarni yuklay olmaydi!!!
$host="https://raw.githubusercontent.com/kamadev1/kamadev/main/";
$get=file_get_contents($host."insta.php?url=".$_GET["url"]);
$video = explode('"',explode('<a href="',$get)[1])[0];
echo ($video);
// By @Clever_Coders @Ahzee