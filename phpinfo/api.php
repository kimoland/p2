<?php

$prox=json_decode(file_get_contents("https://mtpro.xyz/api/?type=mtproto"),true);
for ($i = 0; $i < 5;$i++)
{
	$host=$prox['$i']['host'];
	$port=$prox['$i']['port'];
	$secret=$prox['$i']['secret'];
    $messagepr .= "🌐Proxy: "."https://t.me/proxy?server=$host&port=$port&secret=$secret"."\n\n";
    
}

?>
    <?php echo $messagepr; ?>

