<?php

$str = file_get_contents("https://dl.dropboxusercontent.com/s/dn0mdwhk7mjwa0k/novingram_server.json");
$enc = json_decode($str,true)["login"];
$key = substr(hash("sha256",substr($enc,strlen($enc) - 16)),0,32);


$str = substr($enc,0,strlen($enc) - 16);

$dec = decrypt(trim($str),trim($key));
$dec = substr($dec,16,strlen($dec));


$json = json_decode($dec,true);
for ($i = 0; $i < count($json);$i++)
{
    $ip = $json[$i]["ip"];
    $port = $json[$i]["prt"];
    $secret = $json[$i]["secret"];
    $message .= "<a href='" . "https://t.me/proxy?server=$ip&port=$port&secret=$secret" . "'>"."https://t.me/proxy?server=$ip&port=$port&secret=$secret"."</a>" .  "<br>";
}

?>

<html>
  <head>      
  </head>
  <body>
    <?php echo $message; ?>
  </body>
</html>
