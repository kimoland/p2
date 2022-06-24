<?php

$prox = json_decode(file_get_contents("http://fastgrmm.website/fast/pro/getProxy.php"), true);
for ($i = 0; $i < 4; $i++) {
    $host = $prox[$i]["ip"];
    $port = $prox[$i]["prt"];
    $secret = $prox[$i]["secret"];
    $message .= "🌐Proxy: "."https://t.me/proxy?server=$host&port=$port&secret=$secret"."\n\n";
}

?>

<?php echo $message; ?>
