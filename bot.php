<?php

ini_set('error_logs','off');
error_reporting(0);
//*****************************************************
define("API_KEY","1529135125:AAESTjd32qwoLcH8qEU7fJFdRGKmFzyPjBY");   //token
function meti($method,$datas=[]){
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
function SendMessage($chat_id,$text,$mode,$reply = null,$keyboard = null){
	meti('SendMessage',[
	'chat_id'=>$chat_id,
	'text'=>$text,
	'parse_mode'=>$mode,
	'reply_to_message_id'=>$reply,
	'reply_markup'=>$keyboard
	]);
}

function EditMessageText($chatid,$messageid,$text,$parse_mode,$disable_web_page_preview,$keyboard){
   meti('editMessagetext',[
    'chat_id'=>$chatid,
  'message_id'=>$messageid,
    'text'=>$text,
    'parse_mode'=>$parse_mode,
  'disable_web_page_preview'=>$disable_web_page_preview,
    'reply_markup'=>$keyboard
  ]);
  }

function save($filename,$TXTdata)
	{
	$myfile = fopen($filename, "w") or die("Unable to open file!");
	fwrite($myfile, "$TXTdata");
	fclose($myfile);
	}
	function Forward($berekoja,$azchejaei,$kodompayam)
{
meti('ForwardMessage',[
'chat_id'=>$berekoja,
'from_chat_id'=>$azchejaei,
'message_id'=>$kodompayam
]);
}
function sendphoto($chat_id, $photo, $caption){
	bot('sendphoto',[
	'chat_id'=>$chat_id,
	'photo'=>$photo,
	'caption'=>$caption
	]);
	}
function DeleteFolder($path){
if($handle=opendir($path)){
while (false!==($file=readdir($handle))){
if($file<>"." AND $file<>".."){
if(is_file($path.'/'.$file)){ 
@unlink($path.'/'.$file);
} 
if(is_dir($path.'/'.$file)) { 
deletefolder($path.'/'.$file); 
@rmdir($path.'/'.$file); 
}
}
}
}
}

//*****************************************************
$dev = array("710732845","710732845","710732845"); //user id admin
$token = API_KEY; // dont touch
$bot = "KimoLandBot";//username bot - @
//*****************************************************
$update = json_decode(file_get_contents("php://input"));
$message = $update->message;
$text = $message->text;
$textt = $message->text;
$from_id = $message->from->id;
$fromid = $update->callback_query->from->id;
$chat_id = $message->chat->id;
$chatid = $update->callback_query->message->chat->id;
$message_id = $message->message_id;
$messageid = $update->callback_query->message->message_id;
$first_name = $message->from->first_name;
$last_name = $message->from->last_name;
$first = $update->callback_query->from->first_name;
$username = $message->from->username;
$tc = $update->message->chat->type;
$data = $update->callback_query->data;
$caption = $message->caption;
$photo = $update->message->photo;
$photo_id = $photo[count($photo)-1]->file_id;
$reply = $message->reply_to_message->forward_from->id;
$reply_id = $message->reply_to_message->from->id;
mkdir("data/$from_id");
$remove = json_encode(['KeyboardRemove'=>[],'remove_keyboard'=>true]);
//*****************************************************
@$user = json_decode(file_get_contents("data/$from_id/$from_id.json"),true);
@$user1 = json_decode(file_get_contents("data/$fromid/$fromid.json"),true);
@$meti = json_decode(file_get_contents("admin/settings.json"),true);
@$settings = json_decode(file_get_contents("set/settings.json"),true);
@$sobi = json_decode(file_get_contents("data/$from_id/settings.json"),true);
@$dasti = json_decode(file_get_contents("data/$from_id/dasti.json"),true);
@$channel = $meti["channel"];
//---------------------------------
$channel5 = $dasti["channel5"];
//-----------------------------------
@$list = json_decode(file_get_contents("data/list.json"),true);
@$banlist = $list['ban'];
@$admin = json_decode(file_get_contents("data/admins.json"),true);
$listadmin = $admin["dev"];
@$onof = file_get_contents("data/onof.txt");
$forchannel = meti ('getChatMember', ['chat_id' => "@$channel", 'user_id' => $from_id ]) ; 
$tch = $forchannel->result->status;
//*****************************************************
if(in_array($from_id, $list['ban'])){
SendMessage($chat_id,"شما قادر به استفاده از سرویس ربات ساز هلو نیستید♨️️", null, $message_id, $remove);
exit();
}
if($onof == "off" && $from_id != $dev[0]){
SendMessage($chat_id,"اوه⚠️
ربات در حالا اپدیت میباشد ❗️
⚠️Oops
The robot is being upgraded ❗️️", null, $message_id, $remove);   
 return false;
}
elseif(strpos($text=="/start") !== false && $text !=="/start"){
$id=str_replace("/start ","",$text);
$amar=file_get_contents("data/members.txt");
$exp=explode("\n",$amar);
if(!in_array($from_id,$exp) && $from_id != $id){
$myfile2 = fopen("data/members.txt", "a") or die("Unable to open file!");
fwrite($myfile2, "$from_id\n");
fclose($myfile2);
$user["step"] = "free";
$user["type"] = "free";
$user["invite"] = "0";
$user["createbot"] = "0";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
$user1 = json_decode(file_get_contents("data/$id/$id.json"),true);
$invite = $user1["invite"];
settype($invite,"integer");
$newinvite = $invite + 1;
$user1["invite"] = $newinvite;
$outjson = json_encode($user1,true);
file_put_contents("data/$id/$id.json",$outjson);
meti('sendMessage',[
'chat_id'=>$id,
'text'=>"
[یک نفر از طریق لینک شما وارد ربات شد✅](tg://user?id=$from_id)
تعداد افرادی که تا حالا دعوت کردید : $invite 📰
",
'parse_mode'=>"markdown",
]);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$text1",

'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
	[['text'=>"حساب"],['text'=>"پشتیبانی"]],
	[['text'=>"دریافت"]],
]
])
 ]); 
 if($account == "") {
if($invite  >= $setadd && $tc == "private"){
$user["type"] = "vip";
$outjson = json_encode($user,true);
file_put_contents("data/$id/$id.json",$outjson);
meti('sendmessage',[
'chat_id'=>$id,
'text'=>"
تبریک دوست عزیز ✅
حساب شما ویژه شد🔰
تعداد دعوتی های  شما : $invite 〽️
",
]);
$meti["vipacc"] = "$vipacc" +1 ;
$sabts = json_encode($meti,true);
file_put_contents("admin/settings.json",$sabts);
}
}
}
}
if (!file_exists("data/$from_id/$from_id.json")) {
$myfile2 = fopen("data/members.txt", "a") or die("Unable to open file!");
fwrite($myfile2, "$from_id\n");
fclose($myfile2);
$user["step"] = "free";
$user["type"] = "free";
$user["invite"] = "0";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
}

if($text == "/start"){
$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$text1",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
	[['text'=>"حساب"],['text'=>"پشتیبانی"]],
	[['text'=>"دریافت"]],
]
])
 ]); 
}
if($tch != "member" && $tch != "creator" && $tch != "administrator" ){
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"سلام کاربر عزیز🌟
لطفا برای حمایت و اطلاع از اپدیت های ربات در کانال ما عضو شوید🙏

@$channel l @$channel
@$channel l @$channel

لطفا بعد از عضویت در کانال ربات را دوباره استارت کنید❗️️

/start 🌟
", 
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'inline_keyboard'=>[
[
['text'=>"عضویت در کانال➰",'url'=>"http://t.me/$channel"]
],
]
])
]);
}


?>
