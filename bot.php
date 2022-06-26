<?php 

define('API_KEY','1529135125:AAESTjd32qwoLcH8qEU7fJFdRGKmFzyPjBY');

function Bot($method,$datas=[]){
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
function formatBytes($bytes, $precision = 2) { 
    $units = array('B', 'KB', 'MB', 'GB', 'TB'); 

    $bytes = max($bytes, 0); 
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024)); 
    $pow = min($pow, count($units) - 1); 

    // Uncomment one of the following alternatives
     $bytes /= pow(1024, $pow);
     //$bytes /= (1 << (10 * $pow)); 

    return round($bytes, $precision) . ' ' . $units[$pow]; 
} 

function sendphoto($chat_id, $photo, $caption)
{
    bot('sendphoto', [
        'chat_id' => $chat_id,
        'photo' => $photo,
        'caption' => $caption
    ]);
}

$update = json_decode(file_get_contents('php://input'));
if(isset($update->message)){
    $message = $update->message; 
    $chat_id = $message->chat->id;
    $message_id = $message->message_id;
    $textmessage = $message->text;
}
if($textmessage == '/start'){
	    bot('sendMessage',[
         'chat_id'=>$chat_id,
          'text'=>"به ربات نیم بها خوش امدید!
          
جهت نیم بها کردن لینک فایل موردنظر خود را ارسال کنید:",
	 ]);
}elseif(filter_var($textmessage, FILTER_VALIDATE_URL, FILTER_NULL_ON_FAILURE)){
    
    $data = json_decode(file_get_contents('https://ytytd.herokuapp.com/getVideo?url='.urlencode($textmessage)),true);
        $img = $data['0']['thumbnail'];
        $title = $data['0']['title'];
        $channel = $data['0']['channel'];
        $time = $data['0']['length'];
        $value = $data['1']['0']['value'];
        $size = $data['1']['0']['size'];
        $value2 = $data['1']['1']['value'];
        $size2 = $data['1']['1']['size'];
        bot('sendphoto', [
            'chat_id' => $chat_id,
            'photo' => $img,
            'caption' => "Title: $title
Channel: $channel
RunTime: $time
            ",
          'reply_markup'=> json_encode([
             'inline_keyboard'=>[
[['text'=>"$value ($size)",'url'=>"https://ytytd.herokuapp.com"]],
[['text'=>"$value2 ($size2)",'url'=>"https://ytytd.herokuapp.com"]]
]])
	 ]);

    
}

    

?>
