<?php
define('API_KEY','1623028043:AAGGCA7NKH_Je03XRQbe4gcP6Q4psb-WgKA');
//====================(@Source_Home)======================//
#variables
$get = json_decode(file_get_contents('php://input'));
$txt_msg = $get->message->text;
$user_id = $get->message->from->id;
$msg_id = $get->message->message_id;
mkdir("data/$chat_id");
//====================(@Source_Home)======================//
#method
function MEhdiYousefi($method,$datas=[]){$url = 'https://api.telegram.org/bot'.API_KEY.'/'.$method;$ch = curl_init();curl_setopt($ch,CURLOPT_URL,$url);curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
//====================(@Source_Home)======================//
#function
function sendmsg($user_id,$txt_msg,$msg_id,$key = null) {MEhdiYousefi('sendmessage', ['chat_id'=>$user_id, 'text'=>$txt_msg, 'reply_to_message_id'=>$msg_id,'reply_markup'=>$key,]);
}
//====================(@Source_Home)======================//
$menu = json_encode([
'keyboard'=>[
[['text'=>'😈 اسپم شماره 😈']],
[['text'=>'🚦 راهنما'],['text'=>'▫️ کانال ما ▫️']],
[['text'=>'👮🏻‍♂️ پشتبانی']],
],"resize_keyboard"=>true]);
//====================(@Source_Home)======================//
$Yousefi = json_encode([
'keyboard'=>[
[['text'=>'🔙 بازگشت به منوی قبلی']],
],"resize_keyboard"=>true]);
mkdir("data");
mkdir("data/$user_id");
//====================(@Source_Home)======================//
$Mehdi = json_encode([
'keyboard'=>[
[['text'=>'5 تا تستی 😂']],
[['text'=>'🗃 30 عدد'],['text'=>'🗃 50 عدد️']],
[['text'=>'🗃 80 عدد'],['text'=>'🗃 100 عدد️']],
[['text'=>'🗃 130 عدد'],['text'=>'🗃150 عدد️']],
[['text'=>'🗃 180 عدد'],['text'=>'🗃 200 عدد️']],
[['text'=>'🔙 بازگشت به منوی قبلی']],
],"resize_keyboard"=>true]);
//====================(@Source_Home)======================//
#start
if($txt_msg == "/start" or $txt_msg == "🔙 بازگشت به منوی قبلی") {
file_put_contents("data/$user_id/sms.txt","none");
		$user = file_get_contents('Member.txt');
	$members = explode("\n",$user);
	if(!in_array($chat_id,$members)){
		$add_user = file_get_contents('Member.txt');
		$add_user .= $chat_id."\n";
		file_put_contents('Member.txt',$add_user);
	}
sendmsg($user_id,"سلام کاربر گرامی

 به ربات sms bomber خوش امدید 💚

با این ربات میتوانید به راحتی هر شماره ای را که دوست دارید پیام بصورت اسپم ارسال کنید 😁😂

🔺 مسولیت استفاده از این ربات بر عهده خودتان است 🔻

🌟 کانال ما:
🆔 @Source_Home",$msg_id,$menu);
}
//====================(@Source_Home)======================//
#spam
if($txt_msg=="😈 اسپم شماره 😈") {
file_put_contents("data/$user_id/sms.txt","none");
sendmsg($user_id,"✨ در این مرحله تعدادی پیام هایی که میخواهید به کاربر ارسال
شود را از منوی زیر انتخاب کنید:

🔻 مسولیت استفاده برعهده خودتان است 🔻",$msg_id,$Mehdi);
}
//====================(@Source_Home)======================//
if($txt_msg=="🚦 راهنما") {
sendmsg($user_id,"راهنمای استفاده از ربات:

تشکر خیلی ویژه دارم از دوست عزیزمون
@Source_Home
که api رو به ما دادن و ما هم این ربات رو ساختیم 💚


کار با ربات بسیار اسان است فقط کافی است

که شما شماره فرد مورد نظرتون رو به ربات بدبد و میزان پیام را نیز مشخص کنید

ربات بصورت خودکار به مقدار تعیین شده به شماره ارسالی شما

پیامک از سمت api ارسال خواهد کرد

موفق باشید",$msg_id,$Yousefi);
}
if($txt_msg=="▫️ کانال ما ▫️") {
sendmsg($user_id,"🌟 کانال نیک سورس 🌟

⚡️ مرجع تخصصی سورس ربات های تلگرامی

▪️⭐️ کانال ما
🆔 @Source_Home",$msg_id,$Yousefi);
}
//====================(@Source_Home)======================//
if($txt_msg=="👮🏻‍♂️ پشتبانی") {
sendmsg($user_id,"هرگونه سوال . انتقاد و پیشنهادی دارید 
خوشحال میشیم بشنویم 😃

ایدی جهت ارتباط با ما 
🆔 @Source_Home",$msg_id,$Yousefi);
}

?>
