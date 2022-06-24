<?php

ini_set('error_logs','off');
error_reporting(0);
$telegram_ip_ranges = [
['lower' => '149.154.160.0', 'upper' => '149.154.175.255'], 
['lower' => '91.108.4.0',    'upper' => '91.108.7.255'],    
];
$ip_dec = (float) sprintf("%u", ip2long($_SERVER['REMOTE_ADDR']));
$ok=false;
foreach ($telegram_ip_ranges as $telegram_ip_range) if (!$ok) {
$lower_dec = (float) sprintf("%u", ip2long($telegram_ip_range['lower']));
$upper_dec = (float) sprintf("%u", ip2long($telegram_ip_range['upper']));
if($ip_dec >= $lower_dec and $ip_dec <= $upper_dec) $ok=true;
}
if(!$ok) die("Off"); 
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
@$sup = $sobi["sup"];
@$setadd = $meti["add"];
@$vipacc = $meti["vipacc"];
@$invite = $user["invite"];
@$step = $user['step'];
@$count = $user["syou"];
@$sbot = $user["sbot"];
@$account = $user["type"];
@$sobhan = $user["typedas"];
@$tedad = $user["tedad"];
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
[['text'=>"حساب"],['text'=>"پشتیبانی"]],
[['text'=>"دریافت"]],
]
])
 ]); 
}


elseif($text == "دریافت"){
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



elseif($text == "پشتیبانی"){
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
}
elseif($step == "poshtibani"){     
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


elseif($text == "حساب"){
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
}

elseif($text == "لیست مدیران📯" && $from_id == $dev[0]){
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
meti('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
♦️اطلاعات کاربر [$text](tg://user?id=$text)  
🔻تعداد ادد : $invite7
🔺نوع اکانت : $account7
🔻تعداد دفحات ساخت ربات : $tedad7
️", 
'parse_mode'=>"MarkDown",
]);
}

?>
