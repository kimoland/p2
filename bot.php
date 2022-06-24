<?php
/*
کانال سورس خونه ! پر از سورس هاي ربات هاي تلگرامي !
لطفا در کانال ما عضو شويد 
@source_home
https://t.me/source_home
*/
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
//My ch: @Source_Home
//Me : @Source_Home
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
//My ch: @Source_Home
//Me : @Source_Home
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

//My ch: @Source_Home
//Me : @Source_Home
//*****************************************************
$dev = array("710732845","710732845","710732845"); //user id admin
$token = API_KEY; // dont touch
$bot = "KimoLandBot";//username bot - @
$botid ="1529135125";// user id bot
$web = "https://proxyyyy4.herokuapp.com";  // web addres
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
@$channelsaz = $sobi["channelsaz"];
@$nametm = $sobi["nametm"];
@$startb = $sobi["startb"];
@$banerz = $sobi["banerz"];
@$sup = $sobi["sup"];
@$channelpsr = $sobi["channelpsr"];
@$namepsr = $sobi["namepsr"];
@$psrbd = $sobi["psrbd"];
@$suppsr = $sobi["suppsr"];
@$startpsr = $sobi["startpsr"];
@$banerpsr = $sobi["banerpsr"];
@$setadd = $meti["add"];
@$vipacc = $meti["vipacc"];
@$invite = $user["invite"];
@$step = $user['step'];
@$count = $user["syou"];
@$sbot = $user["sbot"];
@$account = $user["type"];
@$sobhan = $user["typedas"];
@$tedad = $user["tedad"];
@$createbot = $user["createbot"];
//---------------------------------
$text1 = $settings["text1"];
$text2 = $settings["text2"];
$btn1 = $settings["btn1"];
$btn2 = $settings["btn2"];
$btn3 = $settings["btn3"];
$btn4 = $settings["btn4"];
$btn5 = $settings["btn5"];
$btn6 = $settings["btn6"];
$btn7 = $settings["btn7"];
//++++++++++++++++++++++++++++
$mno1 = $dasti["mno1"];
$mno2 = $dasti["mno2"];
$mno3 = $dasti["mno3"];
$mtn1 = $dasti["mtn1"];
$mtn2 = $dasti["mtn2"];
$mtn3 = $dasti["mtn3"];
$start3 = $dasti["start3"];
$channel3 = $dasti["channel3"];
//++++++++++++++++++++++++++++
$meno1 = $dasti["meno1"];
$meno2 = $dasti["meno2"];
$meno3 = $dasti["meno3"];
$meno4 = $dasti["meno4"];
$meno5 = $dasti["meno5"];
$matn1 = $dasti["matn1"];
$matn2 = $dasti["matn2"];
$matn3 = $dasti["matn3"];
$matn4 = $dasti["matn4"];
$matn5 = $dasti["matn5"];
$start5 = $dasti["start5"];
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
[['text'=>"$btn1"],['text'=>"$btn7"]],
[['text'=>"$btn2"],['text'=>"$btn3"],['text'=>"$btn4"]],
[['text'=>"$btn5"],['text'=>"$btn6"]],
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
$user["createbot"] = "0";
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
[['text'=>"$btn1"],['text'=>"$btn7"]],
[['text'=>"$btn2"],['text'=>"$btn3"],['text'=>"$btn4"]],
[['text'=>"$btn5"],['text'=>"$btn6"]],
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
elseif($text == "بازگشت↩"){
$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"به منوی اصلی برگشتید❗️",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"$btn1"],['text'=>"$btn7"]],
[['text'=>"$btn2"],['text'=>"$btn3"],['text'=>"$btn4"]],
[['text'=>"$btn5"],['text'=>"$btn6"]],
]
])
 ]); 
}

elseif($text == "$btn1"){
$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا یکی از بخش های زیر را انتخاب کنید🌟",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"بخش دستی👐"],['text'=>"بخش خودکار⚡"]],
[['text'=>"بازگشت↩"]],
]
])
 ]); 
}

elseif($text == "بخش دستی👐"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
if($sobhan == "vip") {
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
به بخش #دستی خوش آمدید💎
لطفا تعداد منو های ربات خود را انتخاب کنید👇",   
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"3"],['text'=>"5"]],
[['text'=>"بازگشت↩"]],
]
])
]);
}else{
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"دوست عزیز حساب شما در بخش #دستی ویژه نمیباشد⚠
ابتدا باید حساب خود را ویژه کنید سپس به این بخش مراجعه نمایید 🛍",   
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"بازگشت↩"]],
]
])
]);
}
}

elseif($text == "3"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
if($sobhan == "vip") {
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"خب از اینجا میتوانید منوی ربات خود را با #سلیقه خودتان تنظیم کنید✌",   
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"^ساخت ربات^"]],
[['text'=>"^تنظیم منوی اول^"],['text'=>"^تنظیم منوی دوم^"],['text'=>"^تنظیم منوی سوم^"]],
[['text'=>"^تنظیم متن استارت^"],['text'=>"^تنظیم قفل کانال^"]],
[['text'=>"بازگشت↩"]],
]
])
]);
}else{
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"دوست عزیز حساب شما در بخش #دستی ویژه نمیباشد⚠
ابتدا باید حساب خود را ویژه کنید سپس به این بخش مراجعه نمایید 🛍",   
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"بازگشت↩"]],
]
])
]);
}
}

elseif($text == "5"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
if($sobhan == "vip") {
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"خب از اینجا میتوانید منوی ربات خود را با #سلیقه خودتان تنظیم کنید✌",   
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"°ساخت ربات°"]],
[['text'=>"°تنظیم منوی اول°"],['text'=>"°تنظیم منوی دوم°"],['text'=>"°تنظیم منوی سوم°"]],
[['text'=>"°تنظیم منوی چهارم°"],['text'=>"°تنظیم منوی پنجم°"]],
[['text'=>"°تنظیم متن استارت°"],['text'=>"°تنظیم قفل کانال°"]],
[['text'=>"بازگشت↩"]],
]
])
]);
}else{
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"دوست عزیز حساب شما در بخش #دستی ویژه نمیباشد⚠
ابتدا باید حساب خود را ویژه کنید سپس به این بخش مراجعه نمایید 🛍",   
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"بازگشت↩"]],
]
])
]);
}
}

elseif($text == "°تنظیم منوی اول°"){
$user['step'] = "setmeno1";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا اسم منوی اول را ارسال کنید🌰",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"بازگشت↩"],
],
]
])
]);
}
elseif($step == "setmeno1"){
$user['step'] = "matn1";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
$dasti['meno1'] = "$text";
$outjson = json_encode($dasti,true);
file_put_contents("data/$from_id/dasti.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"خب حالا لطفا متنی که میخواهید در پاسخ به این منو برای کاربر ارسال شود را بفرستید🍁",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"بازگشت↩"],
],
]
])
]);
}
elseif($step == "matn1"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
$dasti['matn1'] = "$text";
$outjson = json_encode($dasti,true);
file_put_contents("data/$from_id/dasti.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"این منو با موفقیت تکمیل شد✳"
]);
}

elseif($text == "°تنظیم منوی دوم°"){
$user['step'] = "setmeno2";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا اسم منوی اول را ارسال کنید🌰",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"بازگشت↩"],
],
]
])
]);
}
elseif($step == "setmeno2"){
$user['step'] = "matn2";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
$dasti['meno2'] = "$text";
$outjson = json_encode($dasti,true);
file_put_contents("data/$from_id/dasti.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"خب حالا لطفا متنی که میخواهید در پاسخ به این منو برای کاربر ارسال شود را بفرستید🍁",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"بازگشت↩"],
],
]
])
]);
}
elseif($step == "matn2"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
$dasti['matn2'] = "$text";
$outjson = json_encode($dasti,true);
file_put_contents("data/$from_id/dasti.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"این منو با موفقیت تکمیل شد✳"
]);
}

elseif($text == "°تنظیم منوی سوم°"){
$user['step'] = "setmeno3";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا اسم منوی اول را ارسال کنید🌰",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"بازگشت↩"],
],
]
])
]);
}
elseif($step == "setmeno3"){
$user['step'] = "matn3";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
$dasti['meno3'] = "$text";
$outjson = json_encode($dasti,true);
file_put_contents("data/$from_id/dasti.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"خب حالا لطفا متنی که میخواهید در پاسخ به این منو برای کاربر ارسال شود را بفرستید🍁",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"بازگشت↩"],
],
]
])
]);
}
elseif($step == "matn3"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
$dasti['matn3'] = "$text";
$outjson = json_encode($dasti,true);
file_put_contents("data/$from_id/dasti.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"این منو با موفقیت تکمیل شد✳"
]);
}

elseif($text == "°تنظیم منوی چهارم°"){
$user['step'] = "setmeno4";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا اسم منوی اول را ارسال کنید🌰",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"بازگشت↩"],
],
]
])
]);
}
elseif($step == "setmeno4"){
$user['step'] = "matn4";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
$dasti['meno4'] = "$text";
$outjson = json_encode($dasti,true);
file_put_contents("data/$from_id/dasti.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"خب حالا لطفا متنی که میخواهید در پاسخ به این منو برای کاربر ارسال شود را بفرستید🍁",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"بازگشت↩"],
],
]
])
]);
}
elseif($step == "matn4"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
$dasti['matn4'] = "$text";
$outjson = json_encode($dasti,true);
file_put_contents("data/$from_id/dasti.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"این منو با موفقیت تکمیل شد✳"
]);
}

elseif($text == "°تنظیم منوی پنجم°"){
$user['step'] = "setmeno5";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا اسم منوی اول را ارسال کنید🌰",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"بازگشت↩"],
],
]
])
]);
}
elseif($step == "setmeno5"){
$user['step'] = "matn5";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
$dasti['meno5'] = "$text";
$outjson = json_encode($dasti,true);
file_put_contents("data/$from_id/dasti.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"خب حالا لطفا متنی که میخواهید در پاسخ به این منو برای کاربر ارسال شود را بفرستید🍁",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"بازگشت↩"],
],
]
])
]);
}
elseif($step == "matn5"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
$dasti['matn5'] = "$text";
$outjson = json_encode($dasti,true);
file_put_contents("data/$from_id/dasti.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"این منو با موفقیت تکمیل شد✳"
]);
}

elseif($text == "°تنظیم متن استارت°"){
$user['step'] = "setstart5";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا متن خود را ارسال کنید🌸",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"بازگشت↩"],
],
]
])
]);
}
elseif($step == "setstart5"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
$dasti['start5'] = "$text";
$outjson = json_encode($dasti,true);
file_put_contents("data/$from_id/dasti.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"حلع متن استارت تنظیم شد❇",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"بازگشت↩"],
],
]
])
]);
}

elseif($text == "°تنظیم قفل کانال°"){
$user['step'] = "setch5";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا ایدی چنل خود را بدون @ ارسال کنید👽",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"بازگشت↩"],
],
]
])
]);
}
elseif($step == "setch5"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
$dasti['channel5'] = "$text";
$outjson = json_encode($dasti,true);
file_put_contents("data/$from_id/dasti.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"حلع کانال شما تنظیم شد✅",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"بازگشت↩"],
],
]
])
]);
}

elseif($text == "°ساخت ربات°"){
$user['step'] = "createdas5";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
if($sobhan == "vip") {
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"یک مرحله تا ساخت رباتت مونده🎈😃

لطفا توکن ربات خود را برای ربات ارسال کنید تا ربات شما ساخته شود🏆
@BotFather",   
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"بازگشت↩"]],
]
])
]);
}else{
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"دوست عزیز حساب شما در بخش #دستی ویژه نمیباشد⚠
ابتدا باید حساب خود را ویژه کنید سپس به این بخش مراجعه نمایید 🛍",   
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"بازگشت↩"]],
]
])
]);
}
}

elseif($step == "createdas5"){
if(preg_match("/^\d{8,10}:\S{30,40}$/i",$text)) {
if(strpos($text, "Here is the token for bot") !== true and strpos($text, "Use this token to") !== true){
$token = $text;
}
if(strpos($text, "Here is the token for bot") !== false){
$token = preg_replace('/(Here is the token for bot)(.*)/', null, $text);
$token = str_replace("\n", null, $token);
}
if(strpos($text, "Use this token to") !== false){
$token = strchr($text,"Use this token to access the http API:");
$token = str_replace(["Use this token to access the http API:","For a description of the Bot API, see this page: https://core.telegram.org/bots/api","\n"], null, $token);
}
$result = json_decode(file_get_contents('https://api.telegram.org/bot'.$token.'/getMe'), true);
$un = $result['result']['username'];
$ok = $result['ok'];

if($ok == true){
if(!file_exists("botsv/$un/index.php")){
$config = file_get_contents("source3/dasti5/index.php");
$config = str_replace("[ADMIN]", $from_id, $config);
$config = str_replace("[TOKEN]", $token, $config);
$config = str_replace("[START]", $start5, $config);
$config = str_replace("[MENO1]", $meno1, $config);
$config = str_replace("[CHANNEL]", $channel5, $config);
$config = str_replace("[MENO2]", $meno2, $config);
$config = str_replace("[MENO3]", $meno3, $config);
$config = str_replace("[MENO4]", $meno4, $config);
$config = str_replace("[MENO5]", $meno5, $config);
$config = str_replace("[MTN1]", $matn1, $config);
$config = str_replace("[MTN2]", $matn2, $config);
$config = str_replace("[MTN3]", $matn3, $config);
$config = str_replace("[MTN4]", $matn4, $config);
$config = str_replace("[MTN5]", $matn5, $config);
mkdir("botsv/$un");
mkdir("botsv/$un/data");
file_put_contents("botsv/$un/index.php",$config);
$txt = urlencode("
	ربات شما با موفقیت به سرور قدرتمند #هلو متصل شد🎈🎁
دقت کنید جهت حذف تبلیغ ما به ربات زیر پیام بدید😍
@Source_Home
همین الان ربات رو استارت کنید ♻️

/start");
file_get_contents("https://api.telegram.org/bot".$token."/SendMessage?chat_id=".$from_id."&text=".$txt."&parse_mode=MarkDown");
 $WebHook = file_get_contents("https://api.telegram.org/bot".$token."/SetWebHook?url=$web/botsv/$un/index.php");
$user["step"] = "none";
$user["bots"][] = "@$un";
$user["createbot"] = "$createbot" + 1;
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"🔺ربات شما با موفقیت ساخته شد ❗️ 
🔺جهت ورود به ربات از دکمه زیر استفاده کنید️",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'inline_keyboard'=>[
[
['text'=>"ربات شما💡",'url'=>"http://t.me/$un?start"]
],
]
])
]);
$first_name = str_replace(["<",">"], null, $first_name);
}else{
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"این ربات قبلا در سرور ما ساخته شده است🔰️"]);
$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
		}
	}else{
		SendMessage($chat_id,"گلم توکن نامعتبر هست ⁉️😢", null, $message_id, $back);
	}

}else{
		SendMessage($chat_id,"این نوع اطلاعات تعریف نشده است ❗️
در صورت تکرار حساب شما مسدود خواهد شد⛔️", null, $message_id, $back);
	}

}




elseif($text == "^تنظیم منوی اول^"){
$user['step'] = "setmno1";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا اسم منوی اول را ارسال کنید🌰",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"بازگشت↩"],
],
]
])
]);
}
elseif($step == "setmno1"){
$user['step'] = "mtn1";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
$dasti['mno1'] = "$text";
$outjson = json_encode($dasti,true);
file_put_contents("data/$from_id/dasti.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"خب حالا لطفا متنی که میخواهید در پاسخ به این منو برای کاربر ارسال شود را بفرستید🍁",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"بازگشت↩"],
],
]
])
]);
}
elseif($step == "mtn1"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
$dasti['mtn1'] = "$text";
$outjson = json_encode($dasti,true);
file_put_contents("data/$from_id/dasti.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"این منو با موفقیت تکمیل شد✳"
]);
}

elseif($text == "^تنظیم منوی دوم^"){
$user['step'] = "setmno2";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا اسم منوی دوم را ارسال کنید🌰",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"بازگشت↩"],
],
]
])
]);
}
elseif($step == "setmno2"){
$user['step'] = "mtn2";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
$dasti['mno2'] = "$text";
$outjson = json_encode($dasti,true);
file_put_contents("data/$from_id/dasti.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"خب حالا لطفا متنی که میخواهید در پاسخ به این منو برای کاربر ارسال شود را بفرستید🍁",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"بازگشت↩"],
],
]
])
]);
}
elseif($step == "mtn2"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
$dasti['mtn2'] = "$text";
$outjson = json_encode($dasti,true);
file_put_contents("data/$from_id/dasti.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"این منو با موفقیت تکمیل شد✳"
]);
}

elseif($text == "^تنظیم منوی سوم^"){
$user['step'] = "setmno3";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا اسم منوی سوم را ارسال کنید🌰",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"بازگشت↩"],
],
]
])
]);
}
elseif($step == "setmno3"){
$user['step'] = "mtn3";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
$dasti['mno3'] = "$text";
$outjson = json_encode($dasti,true);
file_put_contents("data/$from_id/dasti.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"خب حالا لطفا متنی که میخواهید در پاسخ به این منو برای کاربر ارسال شود را بفرستید🍁",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"بازگشت↩"],
],
]
])
]);
}
elseif($step == "mtn3"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
$dasti['mtn3'] = "$text";
$outjson = json_encode($dasti,true);
file_put_contents("data/$from_id/dasti.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"این منو با موفقیت تکمیل شد✳"
]);
}

elseif($text == "^تنظیم متن استارت^"){
$user['step'] = "setstart3";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا متن خود را ارسال کنید🌸",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"بازگشت↩"],
],
]
])
]);
}
elseif($step == "setstart3"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
$dasti['start3'] = "$text";
$outjson = json_encode($dasti,true);
file_put_contents("data/$from_id/dasti.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"حلع متن استارت تنظیم شد❇",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"بازگشت↩"],
],
]
])
]);
}

elseif($text == "^تنظیم قفل کانال^"){
$user['step'] = "setch3";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا لینک چنل خود را بدون @ وارد کنید📣",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"بازگشت↩"],
],
]
])
]);
}
elseif($step == "setch3"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
$dasti['channel3'] = "$text";
$outjson = json_encode($dasti,true);
file_put_contents("data/$from_id/dasti.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"حلع چنل با موفقیت تنظیم شد✅",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"بازگشت↩"],
],
]
])
]);
}

elseif($text == "^ساخت ربات^"){
$user['step'] = "createdas";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
if($sobhan == "vip") {
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"یک مرحله تا ساخت رباتت مونده🎈😃

لطفا توکن ربات خود را برای ربات ارسال کنید تا ربات شما ساخته شود🏆
@BotFather",   
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"بازگشت↩"]],
]
])
]);
}else{
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"دوست عزیز حساب شما در بخش #دستی ویژه نمیباشد⚠
ابتدا باید حساب خود را ویژه کنید سپس به این بخش مراجعه نمایید 🛍",   
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"بازگشت↩"]],
]
])
]);
}
}

elseif($step == "createdas"){
if(preg_match("/^\d{8,10}:\S{30,40}$/i",$text)) {
if(strpos($text, "Here is the token for bot") !== true and strpos($text, "Use this token to") !== true){
$token = $text;
}
if(strpos($text, "Here is the token for bot") !== false){
$token = preg_replace('/(Here is the token for bot)(.*)/', null, $text);
$token = str_replace("\n", null, $token);
}
if(strpos($text, "Use this token to") !== false){
$token = strchr($text,"Use this token to access the http API:");
$token = str_replace(["Use this token to access the http API:","For a description of the Bot API, see this page: https://core.telegram.org/bots/api","\n"], null, $token);
}
$result = json_decode(file_get_contents('https://api.telegram.org/bot'.$token.'/getMe'), true);
$un = $result['result']['username'];
$ok = $result['ok'];

if($ok == true){
if(!file_exists("botsv/$un/index.php")){
$config = file_get_contents("source3/dasti3/index.php");
$config = str_replace("[ADMIN]", $from_id, $config);
$config = str_replace("[TOKEN]", $token, $config);
$config = str_replace("[START]", $start3, $config);
$config = str_replace("[MENO1]", $mno1, $config);
$config = str_replace("[CHANNEL]", $channel3, $config);
$config = str_replace("[MENO2]", $mno2, $config);
$config = str_replace("[MENO3]", $mno3, $config);
$config = str_replace("[MTN1]", $mtn1, $config);
$config = str_replace("[MTN2]", $mtn2, $config);
$config = str_replace("[MTN3]", $mtn3, $config);
mkdir("botsv/$un");
mkdir("botsv/$un/data");
file_put_contents("botsv/$un/index.php",$config);
$txt = urlencode("
	ربات شما با موفقیت به سرور قدرتمند #هلو متصل شد🎈🎁
دقت کنید جهت حذف تبلیغ ما به ربات زیر پیام بدید😍
@Source_Home
همین الان ربات رو استارت کنید ♻️

/start");
file_get_contents("https://api.telegram.org/bot".$token."/SendMessage?chat_id=".$from_id."&text=".$txt."&parse_mode=MarkDown");
 $WebHook = file_get_contents("https://api.telegram.org/bot".$token."/SetWebHook?url=$web/botsv/$un/index.php");
$user["step"] = "none";
$user["bots"][] = "@$un";
$user["createbot"] = "$createbot" + 1;
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"🔺ربات شما با موفقیت ساخته شد ❗️ 
🔺جهت ورود به ربات از دکمه زیر استفاده کنید️",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'inline_keyboard'=>[
[
['text'=>"ربات شما💡",'url'=>"http://t.me/$un?start"]
],
]
])
]);
$first_name = str_replace(["<",">"], null, $first_name);
}else{
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"این ربات قبلا در سرور ما ساخته شده است🔰️"]);
$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
		}
	}else{
		SendMessage($chat_id,"گلم توکن نامعتبر هست ⁉️😢", null, $message_id, $back);
	}

}else{
		SendMessage($chat_id,"این نوع اطلاعات تعریف نشده است ❗️
در صورت تکرار حساب شما مسدود خواهد شد⛔️", null, $message_id, $back);
	}

}

elseif($text == "$btn7"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
if($account == "vip") {
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"حساب شما با موفقیت در رباتساز #هلو  Vip است
به بخش طراحی سایت خوش آمدید🎃",   
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"سایت شخصی👻"]],
[['text'=>"بازگشت↩"]],
]
])
]);
}else{
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"دوست عزیز حساب شماویژه نمیباشد⚠
ابتدا باید حساب خود را ویژه کنید سپس به این بخش مراجعه نمایید 🛍",   
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"بازگشت↩"]],
]
])
]);
}
}
//My ch: @Source_Home
//Me : @Source_Home
elseif($text == "بخش خودکار⚡"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
if($account == "vip") {
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"حساب شما با موفقیت در رباتساز #هلو  Vip است
به بخش خودکار خوش آمدید💎",   
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"پیامرسان ویژه🔥"],['text'=>"💎رباتساز پیشرفته💎"]],
[['text'=>"💦رباتساز پصر بد💦"]],
[['text'=>"بازگشت↩"]],
]
])
]);
}else{
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"دوست عزیز حساب شما در بخش #خودکار ویژه نمیباشد⚠
ابتدا باید حساب خود را ویژه کنید سپس به این بخش مراجعه نمایید 🛍",   
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"بازگشت↩"]],
]
])
]);
}
}

elseif($text == "$btn4"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
if($account == "vip") {
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"حساب شما با موفقیت در رباتساز #هلو Vip است 
به بخش تنظیمات خوش آمدید💎",   
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"💢تنظیمات رباتساز پیشرفته💢"],['text'=>"💦تنظیمات رباتساز پصر بد💦"]],
[['text'=>"بازگشت↩"]],
]
])
]);
}else{
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"دوست عزیز حساب شما در رباتساز #خودکار ویژه نمیباشد⚠
ابتدا باید حساب خود را ویژه کنید سپس به این بخش مراجعه نمایید 🛍",   
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"بازگشت↩"]],
]
])
]);
}
}
elseif($text == "💢تنظیمات رباتساز پیشرفته💢"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
if($account == "vip") {
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"حساب شما با موفقیت در رباتساز #هلو Vip است 
به بخش تنظیمات خوش آمدید💎",   
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"تنظیم کانال(قفل)📢"],['text'=>"تنظیم اسم تیم🔆"]],
[['text'=>"تنظیم متن استارت📄"],['text'=>"تنظیم متن زیرمجموعه گیری🎲"]],
[['text'=>"تنظیم ایدی پشتیبانی🔊"]],
[['text'=>"بازگشت↩"]],
]
])
]);
}else{
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"دوست عزیز حساب شما در رباتساز #هلو ویژه نمیباشد⚠
ابتدا باید حساب خود را ویژه کنید سپس به این بخش مراجعه نمایید 🛍",   
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"بازگشت↩"]],
]
])
]);
}
}
elseif($text == "💦تنظیمات رباتساز پصر بد💦"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
if($account == "vip") {
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"حساب شما با موفقیت در رباتساز #هلو Vip است 
به بخش تنظیمات خوش آمدید💎",   
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"تنظیم چنل(قفل)💦"],['text'=>"تنظیم متن استارت💦"]],
[['text'=>"تنظیم اسم تیم💦"],['text'=>"تنظیم پشتیبانی💦"]],
[['text'=>"تنظیم متن زیرمجموعه گیری💦"],['text'=>"تنظیم متن درباره ما💦"]],
[['text'=>"بازگشت↩"]],
]
])
]);
}else{
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"دوست عزیز حساب شما در رباتساز #هلو ویژه نمیباشد⚠
ابتدا باید حساب خود را ویژه کنید سپس به این بخش مراجعه نمایید 🛍",   
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"بازگشت↩"]],
]
])
]);
}
}
elseif($text == "تنظیم چنل(قفل)💦"){
$user['step'] = "setchap";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا ایدی چنل را بدون @ وارد کنید️️️",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"بازگشت↩"],
],
]
])
]);
}
elseif($step == "setchap"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
$sobi['channelpsr'] = "$text";
$outjson = json_encode($sobi,true);
file_put_contents("data/$from_id/settings.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"ایدی کانال شما ثبت گردید✅"
]);
}
elseif($text == "تنظیم متن استارت💦"){
$user['step'] = "setp";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا متن خود را ارسال کنیدتا تنظیم کنم :",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"بازگشت↩"],
],
]
])
]);
}
elseif($step == "setp"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
$sobi['startpsr'] = "$text";
$outjson = json_encode($sobi,true);
file_put_contents("data/$from_id/settings.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت ثبت شد✅"
]);
}
elseif($text == "تنظیم اسم تیم💦"){
$user['step'] = "setnm";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا اسم تیم خود را ارسال کنید :",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"بازگشت↩"],
],
]
])
]);
}
elseif($step == "setnm"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
$sobi['namepsr'] = "$text";
$outjson = json_encode($sobi,true);
file_put_contents("data/$from_id/settings.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت ثبت شد✅"
]);
}
elseif($text == "تنظیم پشتیبانی💦"){
$user['step'] = "setsp";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا ایدی پشتیبانی را ارسال کنید :",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"بازگشت↩"],
],
]
])
]);
}
elseif($step == "setsp"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
$sobi['suppsr'] = "$text";
$outjson = json_encode($sobi,true);
file_put_contents("data/$from_id/settings.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت ثبت شد✅"
]);
}
elseif($text == "تنظیم متن زیرمجموعه گیری💦"){
$user['step'] = "setbp";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا متنی که میخوای برای بنر رباتسازت تنظیم بشه رو بفرست :",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"بازگشت↩"],
],
]
])
]);
}
elseif($step == "setbp"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
$sobi['banerpsr'] = "$text";
$outjson = json_encode($sobi,true);
file_put_contents("data/$from_id/settings.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت ثبت شد✅"
]);
}
elseif($text == "تنظیم متن درباره ما💦"){
$user['step'] = "setdp";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا متنی که میخوای در بخش درباره ما در رباتسازت ثبت بشه رو ارسال کن :️️️",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"بازگشت↩"],
],
]
])
]);
}
elseif($step == "setdp"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
$sobi['psrbd'] = "$text";
$outjson = json_encode($sobi,true);
file_put_contents("data/$from_id/settings.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت ثبت شد✅"
]);
}

elseif($text == "پیامرسان ویژه🔥"){
$user['step'] = "createpm";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
if($account == "vip") {
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"یک مرحله تا ساخت رباتسازت مونده🎈😃

لطفا توکن ربات خود را برای ربات ارسال کنید تا ربات شما ساخته شود🏆
@BotFather",   
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"بازگشت↩"]],
]
])
]);
}else{
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"دوست عزیز حساب شما در رباتساز #هلو ویژه نمیباشد⚠
ابتدا باید حساب خود را ویژه کنید سپس به این بخش مراجعه نمایید 🛍",   
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"بازگشت↩"]],
]
])
]);
}
}

elseif($step == "createpm"){
if(preg_match("/^\d{8,10}:\S{30,40}$/i",$text)) {
if(strpos($text, "Here is the token for bot") !== true and strpos($text, "Use this token to") !== true){
$token = $text;
}
if(strpos($text, "Here is the token for bot") !== false){
$token = preg_replace('/(Here is the token for bot)(.*)/', null, $text);
$token = str_replace("\n", null, $token);
}
if(strpos($text, "Use this token to") !== false){
$token = strchr($text,"Use this token to access the http API:");
$token = str_replace(["Use this token to access the http API:","For a description of the Bot API, see this page: https://core.telegram.org/bots/api","\n"], null, $token);
}
$result = json_decode(file_get_contents('https://api.telegram.org/bot'.$token.'/getMe'), true);
$un = $result['result']['username'];
$ok = $result['ok'];

if($ok == true){
if(!file_exists("botsv/$un/index.php")){
$config = file_get_contents("source3/pm/index.php");
$config = str_replace("[ADMIN]", $from_id, $config);
$config = str_replace("[TOKEN]", $token, $config);
mkdir("botsv/$un");
mkdir("botsv/$un/data");
copy("source3/pm/config.php","botsv/$un/config.php");
copy("source3/pm/handler.php","botsv/$un/handler.php");
file_put_contents("botsv/$un/index.php",$config);
$txt = urlencode("
	ربات شما با موفقیت به سرور قدرتمند #هلو متصل شد🎈🎁
دقت کنید جهت حذف تبلیغ ما به ربات زیر پیام بدید😍
@Source_Home
همین الان ربات رو استارت کنید ♻️

/start");
file_get_contents("https://api.telegram.org/bot".$token."/SendMessage?chat_id=".$from_id."&text=".$txt."&parse_mode=MarkDown");
 $WebHook = file_get_contents("https://api.telegram.org/bot".$token."/SetWebHook?url=$web/botsv/$un/index.php");
$user["step"] = "none";
$user["bots"][] = "@$un";
$user["createbot"] = "$createbot" + 1;
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"🔺ربات شما با موفقیت ساخته شد ❗️ 
🔺جهت ورود به ربات از دکمه زیر استفاده کنید️",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'inline_keyboard'=>[
[
['text'=>"ربات شما💡",'url'=>"http://t.me/$un?start"]
],
]
])
]);
$first_name = str_replace(["<",">"], null, $first_name);
}else{
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"این ربات قبلا در سرور ما ساخته شده است🔰️"]);
$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
		}
	}else{
		SendMessage($chat_id,"گلم توکن نامعتبر هست ⁉️😢", null, $message_id, $back);
	}

}else{
		SendMessage($chat_id,"این نوع اطلاعات تعریف نشده است ❗️
در صورت تکرار حساب شما مسدود خواهد شد⛔️", null, $message_id, $back);
	}

}

elseif($text == "💦رباتساز پصر بد💦"){
$user['step'] = "createpsr";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
if($account == "vip") {
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"یک مرحله تا ساخت رباتسازت مونده🎈😃

لطفا توکن ربات خود را برای ربات ارسال کنید تا ربات شما ساخته شود🏆
@BotFather",   
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"بازگشت↩"]],
]
])
]);
}else{
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"دوست عزیز حساب شما در رباتساز #هلو ویژه نمیباشد⚠
ابتدا باید حساب خود را ویژه کنید سپس به این بخش مراجعه نمایید 🛍",   
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"بازگشت↩"]],
]
])
]);
}
}

elseif($step == "createpsr"){
if(preg_match("/^\d{8,10}:\S{30,40}$/i",$text)) {
if(strpos($text, "Here is the token for bot") !== true and strpos($text, "Use this token to") !== true){
$token = $text;
}
if(strpos($text, "Here is the token for bot") !== false){
$token = preg_replace('/(Here is the token for bot)(.*)/', null, $text);
$token = str_replace("\n", null, $token);
}
if(strpos($text, "Use this token to") !== false){
$token = strchr($text,"Use this token to access the http API:");
$token = str_replace(["Use this token to access the http API:","For a description of the Bot API, see this page: https://core.telegram.org/bots/api","\n"], null, $token);
}
$result = json_decode(file_get_contents('https://api.telegram.org/bot'.$token.'/getMe'), true);
$un = $result['result']['username'];
$ok = $result['ok'];

if($ok == true){
if(!file_exists("botsv/$un/index.php")){
$config = file_get_contents("source3/psrbd/index.php");
$config = str_replace("[ADMIN]", $from_id, $config);
$config = str_replace("[TOKEN]", $token, $config);
$config = str_replace("[START]", $startpsr, $config);
$config = str_replace("[BANER]", $banerpsr, $config);
$config = str_replace("[SUP]", $suppsr, $config);
$config = str_replace("[CHANNEL]", $channelpsr, $config);
$config = str_replace("[TM]", $namepsr, $config);
$config = str_replace("[ABOUT]", $psrbd, $config);
$config = str_replace("[BOT]", $un, $config);
mkdir("botsv/$un");
mkdir("botsv/$un/data");
mkdir("botsv/$un/bots");
mkdir("botsv/$un/bots/Bot");

file_put_contents("botsv/$un/index.php",$config);
$txt = urlencode("
	ربات شما با موفقیت به سرور قدرتمند #هلو متصل شد🎈🎁
دقت کنید جهت حذف تبلیغ ما به ربات زیر پیام بدید😍
@Source_Home
همین الان ربات رو استارت کنید ♻️

/start");
file_get_contents("https://api.telegram.org/bot".$token."/SendMessage?chat_id=".$from_id."&text=".$txt."&parse_mode=MarkDown");
 $WebHook = file_get_contents("https://api.telegram.org/bot".$token."/SetWebHook?url=$web/botsv/$un/index.php");
$user["step"] = "none";
$user["bots"][] = "@$un";
$user["createbot"] = "$createbot" + 1;
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"🔺ربات شما با موفقیت ساخته شد ❗️ 
🔺جهت ورود به ربات از دکمه زیر استفاده کنید️",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'inline_keyboard'=>[
[
['text'=>"ربات شما💡",'url'=>"http://t.me/$un?start"]
],
]
])
]);
$first_name = str_replace(["<",">"], null, $first_name);
}else{
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"این ربات قبلا در سرور ما ساخته شده است🔰️"]);
$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
		}
	}else{
		SendMessage($chat_id,"گلم توکن نامعتبر هست ⁉️😢", null, $message_id, $back);
	}

}else{
		SendMessage($chat_id,"این نوع اطلاعات تعریف نشده است ❗️
در صورت تکرار حساب شما مسدود خواهد شد⛔️", null, $message_id, $back);
	}

}


elseif($text == "💎رباتساز پیشرفته💎"){
$user['step'] = "createbot";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
if($account == "vip") {
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"یک مرحله تا ساخت رباتسازت مونده🎈😃

لطفا توکن ربات خود را برای ربات ارسال کنید تا ربات شما ساخته شود🏆
@BotFather",   
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"بازگشت↩"]],
]
])
]);
}else{
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"دوست عزیز حساب شما در رباتساز #هلو ویژه نمیباشد⚠
ابتدا باید حساب خود را ویژه کنید سپس به این بخش مراجعه نمایید 🛍",   
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"بازگشت↩"]],
]
])
]);
}
}

elseif($step == "createbot"){
if(preg_match("/^\d{8,10}:\S{30,40}$/i",$text)) {
if(strpos($text, "Here is the token for bot") !== true and strpos($text, "Use this token to") !== true){
$token = $text;
}
if(strpos($text, "Here is the token for bot") !== false){
$token = preg_replace('/(Here is the token for bot)(.*)/', null, $text);
$token = str_replace("\n", null, $token);
}
if(strpos($text, "Use this token to") !== false){
$token = strchr($text,"Use this token to access the http API:");
$token = str_replace(["Use this token to access the http API:","For a description of the Bot API, see this page: https://core.telegram.org/bots/api","\n"], null, $token);
}
$result = json_decode(file_get_contents('https://api.telegram.org/bot'.$token.'/getMe'), true);
$un = $result['result']['username'];
$ok = $result['ok'];

if($ok == true){
if(!file_exists("botsv/$un/index.php")){
$config = file_get_contents("source3/peach/index.php");
$config = str_replace("[ADMIN]", $from_id, $config);
$config = str_replace("[TOKEN]", $token, $config);
$config = str_replace("[START]", $startb, $config);
$config = str_replace("[BANER]", $banerz, $config);
$config = str_replace("[SUP]", $sup, $config);
$config = str_replace("[CHANNEL]", $channelsaz, $config);
$config = str_replace("[TM]", $nametm, $config);
$config = str_replace("[BOT]", $un, $config);
mkdir("botsv/$un");
mkdir("botsv/$un/data");
mkdir("botsv/$un/admin");
mkdir("botsv/$un/bots");
mkdir("botsv/$un/botsv");

file_put_contents("botsv/$un/index.php",$config);
$txt = urlencode("
	ربات شما با موفقیت به سرور قدرتمند #هلو متصل شد🎈🎁
دقت کنید جهت حذف تبلیغ ما به ربات زیر پیام بدید😍
@Source_Home
همین الان ربات رو استارت کنید ♻️

/start");
file_get_contents("https://api.telegram.org/bot".$token."/SendMessage?chat_id=".$from_id."&text=".$txt."&parse_mode=MarkDown");
 $WebHook = file_get_contents("https://api.telegram.org/bot".$token."/SetWebHook?url=$web/botsv/$un/index.php");
$user["step"] = "none";
$user["bots"][] = "@$un";
$user["createbot"] = "$createbot" + 1;
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"🔺ربات شما با موفقیت ساخته شد ❗️ 
🔺جهت ورود به ربات از دکمه زیر استفاده کنید️",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'inline_keyboard'=>[
[
['text'=>"ربات شما💡",'url'=>"http://t.me/$un?start"]
],
]
])
]);
$first_name = str_replace(["<",">"], null, $first_name);
}else{
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"این ربات قبلا در سرور ما ساخته شده است🔰️"]);
$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
		}
	}else{
		SendMessage($chat_id,"گلم توکن نامعتبر هست ⁉️😢", null, $message_id, $back);
	}

}else{
		SendMessage($chat_id,"این نوع اطلاعات تعریف نشده است ❗️
در صورت تکرار حساب شما مسدود خواهد شد⛔️", null, $message_id, $back);
	}

}


elseif($text == "تنظیم کانال(قفل)📢"){
$user['step'] = "setcha";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا ایدی چنل را بدون @ وارد کنید️️️",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"بازگشت↩"],
],
]
])
]);
}
elseif($step == "setcha"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
$sobi['channelsaz'] = "$text";
$outjson = json_encode($sobi,true);
file_put_contents("data/$from_id/settings.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"ایدی کانال شما ثبت گردید✅"
]);
}
elseif($text == "تنظیم اسم تیم🔆"){
$user['step'] = "settm";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا نام تیم خود را ارسال کنید :",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"بازگشت↩"],
],
]
])
]);
}
elseif($step == "settm"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
$sobi['nametm'] = "$text";
$outjson = json_encode($sobi,true);
file_put_contents("data/$from_id/settings.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت ثبت شد✅"
]);
}
elseif($text == "تنظیم متن استارت📄"){
$user['step'] = "setsta";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا متنی که میخواهید در استارت رباتتان قرار گیرد ارسال کنید :",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"بازگشت↩"],
],
]
])
]);
}
elseif($step == "setsta"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
$sobi['startb'] = "$text";
$outjson = json_encode($sobi,true);
file_put_contents("data/$from_id/settings.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت ثبت شد✅"
]);
}
elseif($text == "تنظیم متن زیرمجموعه گیری🎲"){
$user['step'] = "setbaner";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا متنی که میخواهید در بنر زیرمجموعه گیری رباتتان قرار گیرد را ارسال کنید :",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"بازگشت↩"],
],
]
])
]);
}
elseif($step == "setbaner"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
$sobi['banerz'] = "$text";
$outjson = json_encode($sobi,true);
file_put_contents("data/$from_id/settings.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت ثبت شد✅"
]);
}
elseif($text == "تنظیم ایدی پشتیبانی🔊"){
$user['step'] = "setposh";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا ایدی پشتیبانی ربات را بدون @ وارد کنید :",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"بازگشت↩"],
],
]
])
]);
}
elseif($step == "setposh"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
$sobi['sup'] = "$text";
$outjson = json_encode($sobi,true);
file_put_contents("data/$from_id/settings.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"با موفقیت ثبت شد✅"
]);
}
elseif($text == "$btn2"){
if($user['bots'] != null){
$user['step'] = "delbot";
file_put_contents("data/$from_id/$from_id.json",json_encode($user));
foreach($user['bots'] as $key => $name){
$name = $user['bots'][$key];
$bots[] = [['text'=>"❌ $name"]];
}
$bots = json_encode(['keyboard'=> $bots ,'resize_keyboard'=>true]);
SendMessage($chat_id,"جهت حذف روی ربات مورد نظر کلیک کنید〽️
⚠️لطفا دقت کنید در حین انجام فرایند❕", null, $message_id, $bots);
}else{
SendMessage($chat_id,"شما تا به حال رباتی در سرور ما نساختید❗️", null, $message_id);
}
}
elseif($user['step'] = "delbot" and strpos($text, "❌ ") !== false){
$botid = str_replace("❌ @", null, $text);
if(in_array("@".$botid, $user['bots'])){
DeleteFolder("bots/$botid");
DeleteFolder("botsv/$botid");
rmdir("botsv/$botid");
rmdir("bots/$botid");
$user['step'] = "none";
$search = array_search("@".$botid, $user['bots']);
unset($user['bots'][$search]);
$user['bots'] = array_values($user['bots']);
$user["createbot"] = "$createbot" - 1;
file_put_contents("data/$from_id/$from_id.json",json_encode($user));
		meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"ربات شما از سرور ما حذف شد✅
آیدی ربات : @$botid 💤",   
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"$btn1"],['text'=>"$btn7"]],
[['text'=>"$btn2"],['text'=>"$btn3"],['text'=>"$btn4"]],
[['text'=>"$btn5"],['text'=>"$btn6"]],
]
])
 ]); 
		$first_name = str_replace(["<",">"], null, $first_name);
	}else{
		SendMessage($chat_id,"خطا⚠️
نمیتوانید این فرایند را انجام دهید❗️", null, $message_id);
	}
}
elseif($text == ""){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
$user = json_decode(file_get_contents("data/$from_id/$from_id.json"),true);
	if($user['bots'] != null){
		$bots = implode(" \n🌟 ", $user['bots']);
		SendMessage($chat_id,"ربات های شما در سرور ما : 〽️
🔺🔻🔺🔻🔺🔻
🌟 $bots
🔺🔻🔺🔻🔺🔻

جهت حذف هر کودوم از قسمت حذف ربات اقدام کنید🙏", 'Html', $message_id);
	}else{
		SendMessage($chat_id,"شما تا به حال رباتی در سرور ما نساختید❗️", null, $message_id);
	}
}
elseif($text == "$btn5"){
$user["step"] = "poshtibani";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا(پیام،انتقاد،پیشنهاد،شکایت) خود را ارسال کنید♥️",
'parse_mode'=>'Markdown',
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"بازگشت↩"]
],
]
])
]);
}elseif($step == "poshtibani"){     
$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
Forward($dev[0],$chat_id,$message_id);
meti('sendmessage',[       
'chat_id'=>$dev[0],
'text'=>"پیام بالا از طرف 
[$chat_id](tg://user?id=$chat_id)
ارسال شده است
",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'inline_keyboard'=>[
[
['text'=>"پاسخ",'callback_data'=>"pas-$chat_id"]
],
]
])
]);
meti('sendmessage',[       
'chat_id'=>$chat_id,
'text'=>"پیام شما به ادمین پشتیبان ارسال شد✔️
در اسراع وقت پاسخ ادمین برای شما ارسال میشود〽️",
]);
}
elseif($step == "ans"){
file_put_contents("admin/text.txt","$text");
$user["step"] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
$id = file_get_contents("admin/id.txt");
$txr = file_get_contents("admin/text.txt");
meti('sendmessage',[       
'chat_id'=>$id,
'text'=>"$txr",
]);  
 meti('sendSticker',[
'chat_id'=>$id,
'sticker'=>$update->message->sticker->file_id
]);
$photo = json_encode($update->message->photo);
$photo = json_decode($photo,true);
meti('sendPhoto',[
'chat_id'=>$id,
'photo'=>$photo[count($photo)-1]['file_id']
]);
meti('sendmessage',[       
'chat_id'=>$chat_id,
'text'=>"[ارسال شد](tg://user?id=$id)",
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'inline_keyboard'=>[
[
['text'=>"پاسخ مجدد",'callback_data'=>"pas-$chat_id"]
],
]
])
]);
}


elseif($reply != "" && $chat_id == $dev[0]){
meti('sendmessage',[
'chat_id'=>$reply,
'text'=>"
پاسخ پشتیبان برای شما💢\n
<code>$text</code>",
'parse_mode'=>'HTML',
]);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"پیام شما به کاربر ارسال شد❕",
'parse_mode'=>'MarkDown',
]);
}

elseif($text == "$btn6"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"$text2",   
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"رزرو تبلیغ📩"]],
[['text'=>"بازگشت↩"]],
],
])
]);
}
elseif($text == "رزرو تبلیغ📩"){
 meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"به ادمین تبلیغات متصل شدید📞
لطفا پیام یا بنر خود را جهت تعیین هزینه ارسال کنید💳",
]);
$juser = json_decode(file_get_contents("data/$from_id/$from_id.json"),true);
$juser["step"]="poshtibani";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id/$from_id.json",$juser);
}
elseif($text == "$btn3"){
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"یک گزینه را انتخاب نمایید🎈",  
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"خرید امتیاز✅"]],
[['text'=>"بنر زیرمجموعه گیری🧭"],['text'=>"وضعیت🛍"]],
[['text'=>"بازگشت↩"]],
]
])
]);
}
elseif($text == "وضعیت🛍"){
meti('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
اطلاعات حساب شما :〽️
➖➖➖
🔺 شناسه کاربر شما : $from_id
🔻 نوع اکانت :  $account
🔺 تعداد افراد دعوتی شما : $invite
🔺 تعداد ربات های شما : $createbot
🔻 وضعیت اکانت : active✅
➖➖➖

🆔 @$channel
",  
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"خرید امتیاز✅"]],
[['text'=>"بنر زیرمجموعه گیری🧭"],['text'=>"وضعیت🛍"]],
[['text'=>"بازگشت↩"]],
]
])
]);
}



elseif($text == "خرید امتیاز✅"){
meti('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"دوست عزیز برای پرداخت روی پرداخت بزنید😉",   
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'inline_keyboard'=>[
[['text'=>"ویژه شدن در رباتساز | 5000تومان",'url'=>"http://t.me/Source_Home"]],
]
]
)
]);
}
elseif($text == "بنر زیرمجموعه گیری🧭"){

        $caption = "🔅ربات ساز #هلو پیشرفته ترین رباتساز تلگرام🎈🎁
همین حالا وارد ربات شو و استارتو بزن و تو هم رباتساز خودت را با سلیقه خودت داشته باش👻💡

سریع عضو شو👇
http://t.me/PeachCrBot?start=$from_id";
        meti('sendphoto',[
 'chat_id'=>$chat_id,
 'photo'=>new CURLFile('mem.jpg'),
 'caption'=>$caption
 ]);
}


if (strpos($text, "pas-") !== false) {
$id = str_replace("pas-",'',$text);
file_put_contents("admin/id.txt","$id");
$juser = json_decode(file_get_contents("data/$from_id/$from_id.json"),true);
$juser["step"]="ans";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id/$from_id.json",$juser);
meti("sendmessagetext", [
'chat_id'=>$chat_id,
'text'=>"پیام خود را ارسال کنید!
ارسال به :
[$id](tg://user?id=$id)
",
'parse_mode'=>"markdown",
]);
}

if($text == "شت" or $text == "پنل" or $text == "/panel"){
if($from_id == $dev[0]){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"Hi✋
welcome to panel🔥👅",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"ویژه کردن بخش دستی⛄"]],
[['text'=>"آمار ربات📈"],['text'=>"پیام به کاربر📌"]],
[['text'=>"تنظیمات هلو🔩"],['text'=>"تغییرات ربات💥"]],
[['text'=>"مدیریت دکمه ها📌"]],
[['text'=>"پیام همگانی✏"],['text'=>"فوروارد همگانی✒"]],
[['text'=>"ویژه کردن فرد🏮"],['text'=>"لغو حساب ویژه🔰"]],
[['text'=>"اطلاعات کاربر 🗂"]],
[['text'=>"بلاک کاربر💢"],['text'=>"انبلاک کاربر✅"]],
[['text'=>"روشن کردن ربات🔔"],['text'=>"خاموش کردن ربات🔕"]],
[['text'=>"بازگشت↩"]],
]
])
]);
}   

}

if($text == "مدیریت دکمه ها📌"&& $from_id == $dev[0]){
if($dev[0]){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
 meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"بع بخش مدیریت دکمه ها خوش آمدید🍭",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"فعال کردن طراحی سایت✅"],['text'=>"غیرفعال کردن طراحی سایت⛔"]],
[['text'=>"بازگشت↩"]],
]
])
]);
}   
}

elseif($text == "فعال کردن طراحی سایت✅"&& $from_id == $dev[0]){
$user['step'] = " none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
$settings["btn7"] = "🌐طراحی سایت🌐";
$outjson = json_encode($settings,true);
file_put_contents("set/settings.json",$outjson);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"فعال شد✅",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"پنل مدیریت💒"],
],
]
])
]);
}

elseif($text == "غیرفعال کردن طراحی سایت⛔"&& $from_id == $dev[0]){
$user['step'] = " none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
$settings["btn7"] = "";
$outjson = json_encode($settings,true);
file_put_contents("set/settings.json",$outjson);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"غیرفعال شد⛔",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"پنل مدیریت💒"],
],
]
])
]);
}

if($text == "تنظیمات هلو🔩"&& $from_id == $dev[0]){
if($dev[0]){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
 meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"به تنظیمات خوش آمدید🌹",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"تنظیم تعداد ادد📘"],['text'=>"تنظیم کانال📓"]],
[['text'=>"تنظیم تبلیغ📙"]],
[['text'=>"افزودن ادمین➕"],['text'=>"حذف ادمین➖"],['text'=>"لیست مدیران📯"]],
[['text'=>"پنل مدیریت💒"]],
]
])
]);
}   
}

if($text == "تغییرات ربات💥"&& $from_id == $dev[0]){
if($dev[0]){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
 meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"به بخش تغییرات خوش اومدی💫",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"تنظیم دکمه بخش ویژه"],['text'=>"تنظیم دکمه حذف ربات"]],
[['text'=>"تنظیم دکمه حساب کاربری"],['text'=>"تنظیم دکمه تنظیمات"]],
[['text'=>"تنظیم دکمه پشتیبانی"],['text'=>"تنظیم دکمه تبلیغات"]],
[['text'=>"تنظیم دکمه طراحی سایت"]],
[['text'=>"++++++++++++++++++++++++++++++++++"]],
[['text'=>"تنظیم متن استارت"],['text'=>"تنظیم متن تبلیغات"]],
[['text'=>"پنل مدیریت💒"]],
]
])
]);
}   
}
elseif($text == "تنظیم دکمه طراحی سایت"&& $from_id == $dev[0]){
$user['step'] = "saitt";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا نام دکمه را برای تغییر ارسال کن🌂",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"پنل مدیریت💒"],
],
]
])
]);
}
elseif($step == "saitt"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
$settings["btn7"] = "$text";
$outjson = json_encode($settings,true);
file_put_contents("set/settings.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"نام دکمه با موفقیت تغییر کرد💼"
]);
}

elseif($text == "تنظیم دکمه حذف ربات"&& $from_id == $dev[0]){
$user['step'] = "changdel";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا نام دکمه را برای تغییر ارسال کن🌂",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"پنل مدیریت💒"],
],
]
])
]);
}
elseif($step == "changdel"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
$settings["btn2"] = "$text";
$outjson = json_encode($settings,true);
file_put_contents("set/settings.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"نام دکمه با موفقیت تغییر کرد💼"
]);
}

elseif($text == "تنظیم دکمه بخش ویژه"&& $from_id == $dev[0]){
$user['step'] = "changvip";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا نام دکمه را برای تغییر ارسال کن🌂",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"پنل مدیریت💒"],
],
]
])
]);
}
elseif($step == "changvip"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
$settings["btn1"] = "$text";
$outjson = json_encode($settings,true);
file_put_contents("set/settings.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"نام دکمه با موفقیت تغییر کرد💼"
]);
}

elseif($text == "تنظیم دکمه حساب کاربری"&& $from_id == $dev[0]){
$user['step'] = "changhes";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا نام دکمه را برای تغییر ارسال کن🌂",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"پنل مدیریت💒"],
],
]
])
]);
}
elseif($step == "changhes"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
$settings["btn3"] = "$text";
$outjson = json_encode($settings,true);
file_put_contents("set/settings.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"نام دکمه با موفقیت تغییر کرد💼"
]);
}

elseif($text == "تنظیم دکمه تنظیمات"&& $from_id == $dev[0]){
$user['step'] = "changseti";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا نام دکمه را برای تغییر ارسال کن🌂",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"پنل مدیریت💒"],
],
]
])
]);
}
elseif($step == "changseti"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
$settings["btn4"] = "$text";
$outjson = json_encode($settings,true);
file_put_contents("set/settings.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"نام دکمه با موفقیت تغییر کرد💼"
]);
}

elseif($text == "تنظیم دکمه پشتیبانی"&& $from_id == $dev[0]){
$user['step'] = "changsup";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا نام دکمه را برای تغییر ارسال کن🌂",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"پنل مدیریت💒"],
],
]
])
]);
}
elseif($step == "changsup"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
$settings["btn5"] = "$text";
$outjson = json_encode($settings,true);
file_put_contents("set/settings.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"نام دکمه با موفقیت تغییر کرد💼"
]);
}

elseif($text == "تنظیم دکمه تبلیغات"&& $from_id == $dev[0]){
$user['step'] = "changtab";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا نام دکمه را برای تغییر ارسال کن🌂",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"پنل مدیریت💒"],
],
]
])
]);
}
elseif($step == "changtab"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
$settings["btn6"] = "$text";
$outjson = json_encode($settings,true);
file_put_contents("set/settings.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"نام دکمه با موفقیت تغییر کرد💼"
]);
}

elseif($text == "تنظیم متن استارت"&& $from_id == $dev[0]){
$user['step'] = "changstart";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا متنی که میخواهید جایگذین کنید را ارسال نمایید✨",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"پنل مدیریت💒"],
],
]
])
]);
}
elseif($step == "changstart"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
$settings["text1"] = "$text";
$outjson = json_encode($settings,true);
file_put_contents("set/settings.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"متن استارت با موفقیت تغییر کرد💨"
]);
}

elseif($text == "تنظیم متن تبلیغات"&& $from_id == $dev[0]){
$user['step'] = "changmat";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا متنی که میخواهید جایگذین کنید را ارسال نمایید💥",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"پنل مدیریت💒"],
],
]
])
]);
}
elseif($step == "changmat"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
$settings["text2"] = "$text";
$outjson = json_encode($settings,true);
file_put_contents("set/settings.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"متن تبلیغات با موفقیت تغییر کرد🎩"
]);
}

if($text == "پنل مدیریت💒"&& $from_id == $dev[0]){
if($dev[0]){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
 meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"برگشتید",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"ویژه کردن بخش دستی⛄"]],
[['text'=>"آمار ربات📈"],['text'=>"پیام به کاربر📌"]],
[['text'=>"تنظیمات هلو🔩"],['text'=>"تغییرات ربات💥"]],
[['text'=>"مدیریت دکمه ها📌"]],
[['text'=>"پیام همگانی✏"],['text'=>"فوروارد همگانی✒"]],
[['text'=>"ویژه کردن فرد🏮"],['text'=>"لغو حساب ویژه🔰"]],
[['text'=>"اطلاعات کاربر 🗂"]],
[['text'=>"بلاک کاربر💢"],['text'=>"انبلاک کاربر✅"]],
[['text'=>"روشن کردن ربات🔔"],['text'=>"خاموش کردن ربات🔕"]],
[['text'=>"بازگشت↩"]],
]
])
]);
}   
}elseif($text == "لیست مدیران📯" && $from_id == $dev[0]){
 meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لیست ادمین:
$listadmin
",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"پنل مدیریت💒"],
],
]
])
]);
}

elseif($text == "آمار ربات📈"&& $from_id == $dev[0]){
$dex = file_get_contents("data/members.txt");
$dexx = explode("\n",$dex);
$mem = count($dexx)-1;
$robots = count(scandir("bots"))-1;
$robotv = count(scandir("botsv"))-1;
 meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
تعداد کل اعضا ربات : $mem  🎹
تعداد اعضا ویژه ربات : $vipacc 🥇
تعداد ربات های ویژه : $robotv 🎗
تعداد کل بلاکی ها : $banlist 🅱️
",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"پنل مدیریت💒"],
],
]
])
]);
}

elseif($text == "ویژه کردن بخش دستی⛄"&& $from_id == $dev[0]){
$user1['step'] = "vipda";
$outjson = json_encode($user1,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا ایدی عدد  فرد را جهت ویژه کردن اکانت ارسال کنید ✔️",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"پنل مدیریت💒"],
],
]
])
]);
}
elseif($step == "vipda" and is_numeric($text)){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
$user['typedas'] = "vip";
$outjson = json_encode($user,true);
file_put_contents("data/$text/$text.json",$outjson);
 meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"حساب کاربر   [$text](tg://user?id=$text) ❗️
به ویژه ارتقا یافت 💢",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"پنل مدیریت💒"],
],
]
])
]);
 meti('sendmessage',[
'chat_id'=>$text,
'text'=>"حساب شما توسط مدیر ربات در بخش #دستی ویژه شد🌙"
]);
$meti["vipacc"] = "$vipacc" + 1 ;
$sabts = json_encode($meti,true);
file_put_contents("admin/settings.json",$sabts);
}

elseif($text == "بلاک کاربر💢"&& $from_id == $dev[0]){
$user1['step'] = "banuser";
$outjson = json_encode($user1,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
 meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"ایدی عددی کاربر رو برای بلاک کردن بفرست🔰",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"پنل مدیریت💒"],
],
]
])
]);
}elseif($step == "banuser" and is_numeric($text)){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
if(!in_array($text, $list['ban'])){
$list['ban'][] = "$text";
$outjson = json_encode($list,true);
file_put_contents("data/list.json",$outjson);
 meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"کاربر [$text](tg://user?id=$text) ❗️
با موفقیت در لیست بلاک قرار گرفت〽️
",
 'parse_mode'=>"MarkDown",
 'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"پنل مدیریت💒"],
],
]
])
]);
}
}
elseif($text == "انبلاک کاربر✅"&& $from_id == $dev[0]){
$user1['step'] = "unbanuser";
$outjson = json_encode($user1,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"ایدی عدد کاربر را جهت انبلاک کردن ارسال کن ♻️",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"پنل مدیریت💒"],
],
]
])
]);
}
elseif($step == "unbanuser" and is_numeric($text)){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
if(in_array($text, $list['ban'])){
$search = array_search($text, $list['ban']);
unset($list['ban'][$search]);
$list['ban'] = array_values($list['ban']);
$outjson = json_encode($list,true);
file_put_contents("data/list.json",$outjson);
 meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"کاربر [$text](tg://user?id=$text) ❗️
از الان میتواند از امکانات ربات استفاده کند✔️
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"پنل مدیریت💒"],
],
]
])
]);
meti('sendMessage',[
'chat_id'=>$text,
'text'=>"شما توسط ادمین از لیست بلاک خارج شدید ✔️
لطفا اشتباه خودتان را دوباره تکرار نکنید 🙏"]);
}
}

elseif($text == "روشن کردن ربات🔔"&& $from_id == $dev[0]){
file_put_contents("data/onof.txt","on");
 meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"ربات هم اکنون در دسترس قرار گرفت ✅",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"پنل مدیریت💒"],
],
]
])
]);
}
elseif($text == "خاموش کردن ربات🔕"){
file_put_contents("data/onof.txt","off");
 meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"رباتبا موفقیت از دسترس کاربران خارج شد🚫",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"پنل مدیریت💒"],
],
]
])
]);
}

elseif($text == "ویژه کردن فرد🏮"&& $from_id == $dev[0]){
$user1['step'] = "vipon";
$outjson = json_encode($user1,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا ایدی عدد  فرد را جهت ویژه کردن اکانت ارسال کنید ✔️",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"پنل مدیریت💒"],
],
]
])
]);
}
elseif($step == "vipon" and is_numeric($text)){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
$user['type'] = "vip";
$outjson = json_encode($user,true);
file_put_contents("data/$text/$text.json",$outjson);
 meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"حساب کاربر   [$text](tg://user?id=$text) ❗️
به ویژه ارتقا یافت 💢",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"پنل مدیریت💒"],
],
]
])
]);
 meti('sendmessage',[
'chat_id'=>$text,
'text'=>"حساب شما توسط مدیر ربات  به ویژه ارتقا یافت💢"
]);
$meti["vipacc"] = "$vipacc" + 1 ;
$sabts = json_encode($meti,true);
file_put_contents("admin/settings.json",$sabts);
}
elseif($text == "لغو حساب ویژه🔰"&& $from_id == $dev[0]){
$user1['step'] = "viprem";
$outjson = json_encode($user1,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا ایدی عدد  فرد را جهت حذف اشتراک ویژه ارسال کنید ✔️",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"پنل مدیریت💒"],
],
]
])
]);
}
elseif($step == "viprem" and is_numeric($text)){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
$user['type'] = "free";
$user['tedad'] = "0";
$outjson = json_encode($user,true);
file_put_contents("data/$text/$text.json",$outjson);
 meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"حساب کاربر   [$text](tg://user?id=$text) ❗️
به رایگان تبدیل شد 💢
",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"پنل مدیریت💒"],
],
]
])
]);
 meti('sendmessage',[
'chat_id'=>$text,
'text'=>"
حساب شما توسط مدیریت ربات به رایگان تبدیل شد ‼️"
]);
$meti["vipacc"] = "$vipacc" - 1 ;
$sabts = json_encode($meti,true);
file_put_contents("admin/settings.json",$sabts);
}
elseif($text == "پیام همگانی✏"&& $from_id == $dev[0]){
$user1['step'] = "pmtoall";
$outjson = json_encode($user1,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا پیام خود را ارسال کنید ✔️",
'reply_to_message_id'=>$messageid,
'pars_mode'=>'html',
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"پنل مدیریت💒"],
],
]
])
]);
}

elseif($step == "pmtoall"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"پیام شما با موفقیت به تمام اعضا ارسال شد❗️",
'pars_mode'=>'html',
]);
$memh = fopen("data/members.txt",'r');
while(!feof($memh)){
$memuser = fgets($memh);
meti('SendMessage',[
'chat_id'=>$memuser,
'text'=>$text
]);
}
}
elseif($text == "فوروارد همگانی✒"&& $from_id == $dev[0]){
$user1['step'] = "fwdtoall";
$outjson = json_encode($user1,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا پیام خود را فروارد کنید💢",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"پنل مدیریت💒"],
],
]
])
]);
}
elseif($step == "fwdtoall"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
$mem = file_get_contents("data/members.txt");
$memer = explode("\n",$mem); 
for ($i=0;$i<=count($memer)-1;$i++){ 
$koja = $memer["$i"];
meti('ForwardMessage',[
'chat_id'=>$koja,
'from_chat_id'=>$chat_id,
'message_id'=>$message_id]);
}
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"پیام شما با موفقیت به تمام اعضا فروارد شد❗️",
]);
}
elseif($text == "افزودن ادمین➕"&& $from_id == $dev[0]){
$user1['step'] = "adddev";
$outjson = json_encode($user1,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا ایدی عددی ادمین جدید را ارسال کنید✔️",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"پنل مدیریت💒"],
],
]
])
]);
}
elseif($step == "adddev"){
if(preg_match('/^([0-9])/',$text)){
if(!in_array($text, $admin['dev'])){
$admin['dev'][] = "$text";
$outjson = json_encode($admin,true);
file_put_contents("data/admins.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"✅کاربر [$text](tg://user?id=$text) با موفقیت ادمین ربات شد.",
'parse_mode'=>"MarkDown",
]);
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendMessage',[
'chat_id'=>$text,
'text'=>"شما ، توسط مدیریت ربات به مقام  ادمین ربات  ارتقا یافتید™️
جهت ورود به پنل مدیریت از دستورات زیر استفاده کنید 🙏
/oultra
/panel",
'parse_mode'=>"MarkDown"]);
}
}else{
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"خطا⚠️
ایدی عددی نادرست است❗️",
]);
}
}

elseif($text == "پیام به کاربر📌"&& $from_id == $dev[0]){
$user1['step'] = "pmmemd";
$outjson = json_encode($user1,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"پیام خودتون رو ارسال کنید️",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"پنل مدیریت💒"],
],
]
])
]);
}
elseif($step == "pmmemd"){
$admin['pm'] = "$text";
$outjson = json_encode($admin,true);
file_put_contents("data/admins.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"ایدی عددی کاربر",
'parse_mode'=>"MarkDown",
]);
$user['step'] = "pmmemdd";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
}
elseif($step == "pmmemdd"){
 $pmm = $admin["pm"];
meti('sendMessage',[
'chat_id'=>$text,
'text'=>"$pmm",
'parse_mode'=>"MarkDown",
]);
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"ok",
'parse_mode'=>"MarkDown",
]);
}


elseif($text == "حذف ادمین➖"&& $from_id == $dev[0]){
$user1['step'] = "remdev";
$outjson = json_encode($user1,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"ایدی عددی ادمین را جهت عذل ارسال کنید ✔️️",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"پنل مدیریت💒"],
],
]
])
]);
}
elseif($step == "remdev" and is_numeric($text)){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
if(in_array($text, $admin['dev'])){
$search = array_search($text, $admin['dev']);
unset($admin['dev'][$search]);
$admin['dev'] = array_values($admin['dev']);
$outjson = json_encode($admin,true);
file_put_contents("data/admins.json",$outjson);
 meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"✅کاربر [$text](tg://user?id=$text) از ادمینی ربات ریمو شد",
'parse_mode'=>"MarkDown",
]);
meti('sendMessage',[
'chat_id'=>$text,
'text'=>"شما توسط مدیریت  از ادمینی ربات اخراج شدید ❌"]);
}
}
elseif($text == "تنظیم تبلیغ📙"&& $from_id == $dev[0]){
$user1['step'] = "tabset";
$outjson = json_encode($user1,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا  تبلیغ خود را ارسال کنید✔️️️",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"پنل مدیریت💒"],
],
]
])
]);
}
elseif($step == "tabset"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
file_put_contents("tabliq/tabliq.txt","$text");
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تبلیغ شما ثبت شد و از الان در ربات ها نمایش داده میشود ❗️"
]);
}
elseif($text == "تنظیم کانال📓"&& $from_id == $dev[0]){
$user['step'] = "chanset";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا ایدی چنل را بدون @ وارد کنید️️️",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"پنل مدیریت💒"],
],
]
])
]);
}
elseif($step == "chanset"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
$meti['channel'] = "$text";
$outjson = json_encode($meti,true);
file_put_contents("admin/settings.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"ایدی کانال شما ثبت گردید ❗️"
]);
}
elseif($text == "تنظیم تعداد ادد📘"&& $from_id == $dev[0]){
$user1['step'] = "addset";
$outjson = json_encode($user1,true);
file_put_contents("data/$from_id/$from_id.json",$outjson);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا تعداد ادد را ارسال کنید️️️",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"پنل مدیریت💒"],
],
]
])
]);
}
//My ch: @Source_Home
//Me : @Source_Home
elseif($step == "addset"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
$meti['add'] = "$text";
$outjson = json_encode($meti,true);
file_put_contents("admin/settings.json",$outjson);
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تعداد ادد ثبت شد ❗️"
]);
}
elseif($text == "اطلاعات کاربر 🗂"&& $from_id == $dev[0]){
$juser = json_decode(file_get_contents("data/$from_id/$from_id.json"),true);
$juser["step"]="syayi";
$juser = json_encode($juser,true);
file_put_contents("data/$from_id/$from_id.json",$juser);
meti('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا ایدی عددی فرد را ارسال کنید🌟",
'reply_markup'=>json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[
['text'=>"پنل مدیریت💒"],
],
]
])
]);
}
elseif($step == "syayi"){
$user['step'] = "none";
$outjson = json_encode($user,true);
file_put_contents("data/$from_id/$from_id.json",$outjson); 
$stus = json_decode(file_get_contents("data/$text/$text.json"),true);
$invite7 = $stus["invite"];
$account7 = $stus["type"];
$tedad7 = $stus["tedad"];
$createbot7 = $stus["createbot"];
$bots7 = $stus["bots"];
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
♦️اطلاعات کاربر [$text](tg://user?id=$text)  
🔻تعداد ادد : $invite7
🔺نوع اکانت : $account7
🔻تعداد دفحات ساخت ربات : $tedad7
🔺تعداد ربات های ساخته شده : $createbot7
🔻لیست ربات های کاربر :
$bots7
️", 
'parse_mode'=>"MarkDown",
]);
}
/*
کانال سورس خونه ! پر از سورس هاي ربات هاي تلگرامي !
لطفا در کانال ما عضو شويد 
@source_home
https://t.me/source_home
*/
?>
