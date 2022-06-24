<?php
/*
کانال سورس خونه ! پر از سورس هاي ربات هاي تلگرامي !
لطفا در کانال ما عضو شويد 
@source_home
https://t.me/source_home
*/
ini_set("log_errors" , "off");
ob_start();
include 'Class.php';
// Variable Source
$update = json_decode(file_get_contents('php://input'));
$data = $update->callback_query->data;
$chatid = $update->callback_query->message->chat->id;
$chat_id = $update->message->chat->id;
$fromid = $update->callback_query->message->from->id;
$from_id = $update->message->from->id;
 //========================
$forward_id = $update->message->forward_from->id;
$first = $update->message->from->first_name;
$username = $update->message->from->username;
$text = $update->message->text;
$message_id = $update->message->message_id;
$m = $gold - 20;
$txt = $update->callback_query->message->text;
$messageid = $update->callback_query->message->message_id;
$block = file_get_contents("administrative/block-list.txt");
$feed = 267785153;
$banall = file_get_contents("administrative/banall-member/banall.txt");
$command = file_get_contents('administrative/user/'.$from_id."/command.txt");
$vipbot = file_get_contents('administrative/user/'.$from_id."/vipp.txt");
$idtxt = file_get_contents("administrative/access/robots.txt");
$idpushe = file_get_contents("Bot/$idtxt/other/access/mum.txt");
$tokentxt = file_get_contents("administrative/tokensadmins/token/$idtxt.txt");
$create = file_get_contents('administrative/user/'.$from_id."/create.txt");
$cre = file_get_contents('administrative/user/'.$from_id."/cre.txt");
$karbarash = file_get_contents('administrative/user/'.$from_id."/gold.txt");
$gold = file_get_contents('administrative/user/'.$from_id."/gold.txt");
$goldacc = file_get_contents('administrative/user/'.$from_id."/goldacc.txt");
$wait = file_get_contents('administrative/user/'.$from_id."/wait.txt");
$codefree = file_get_contents('administrative/user/'.$from_id."/codefree.txt");
$Member = file_get_contents('administrative/access/mum.txt');
$url_s2a = file_get_contents("administrative/user/".$from_id."/url_s2a.txt");
$text_s2a = file_get_contents("administrative/user/".$from_id."/text_s2a.txt");
$listtbots = file_get_contents("administrative/user/".$from_id."/create.txt");
$from_chat_msg_id = $update->message->forward_from_message_id;
$from_chat_username = $update->message->forward_from_chat->username;
$bot = file_get_contents('administrative/user/'.$from_id."/bot.txt");
$datetime = json_decode(file_get_contents("http://api.norbert-team.ir/date-time/"));
$time = file_get_contents("http://provps.ir/td/?td=time");
$date = file_get_contents("http://robot.teleagent.ir/date/");
$stickerid = $update->message->sticker->file_id;
$videoid = $update->message->video->file_id;
$nan = file_get_contents("administrative/admins.txt");
$idtxt = file_get_contents("administrative/access/robots.txt");
$idpushe = file_get_contents("Bot/$idtxt/other/access/mum.txt");
$voiceid = $update->message->voice->file_id;
$textmessage = isset($update->message->text)?$update->message->text:'';
$membersvip = file_get_contents("administrative/user/$from_id/gold.txt");
$fileid = $update->message->document->file_id;
$photoid = $update->message->photo->file_id;
$musicid = $update->message->audio->file_id;
$truechannel = json_decode(file_get_contents("https://api.telegram.org/bot1529135125:AAESTjd32qwoLcH8qEU7fJFdRGKmFzyPjBY/getChatMember?chat_id=@KimoLand&user_id=".$from_id));
$tch = $truechannel->result->status;
$message_id = $update->message->message_id;
$message_id_call = $update->callback_query->message->message_id;
$ban_all = file_get_contents("administrative/user/banall.txt");
$banels = file_get_contents("administrative/banall-member/banall.txt");
//=========
    if (strpos($banall , "$from_id") !== false) {
	return false;
	}
	elseif (strpos($block , "$from_id") !== false) {
	return false;
	}
	elseif ($from_id != $chat_id and $chat_id != $feed) {
	LeaveChat($chat_id);
	}
	elseif (strpos($banall , "$from_id") !== false  ) {
  SendMessage($chat_id,"کاربر عزیز شما از ربات بلاک شدید🚫","html","true");
 }
	//===============
	//===============
	elseif(preg_match('/^\/([Ss]tart)(.*)/',$text)){
	preg_match('/^\/([Ss]tart)(.*)/',$text,$match);
	$match[2] = str_replace(" ","",$match[2]);
	$match[2] = str_replace("\n","",$match[2]);
	if($match[2] != null){
	if (strpos($Member , "$from_id") == false){
	if($match[2] != $from_id){
	if (strpos($gold , "$from_id") == false){
	$txxt = file_get_contents('administrative/user/'.$match[2]."/gold.txt");
    $pmembersid= explode("\n",$txxt);
    if (!in_array($from_id,$pmembersid)){
      $aaddd = file_get_contents('administrative/user/'.$match[2]."/gold.txt");
		save('administrative/user/'.$match[2]."/gold.txt",$aaddd+1);
    }
	SendMessage($match[2],"یک نفر با لینک اختصاصی شما وارد ربات شد و شما یک امتیاز گرفتید✔️
زمان : $time
تاریخ : $date","html","true",$button_official_fa);
	}
	}
	}
	}
	mkdir('administrative/user/'.$from_id);
	if($from_id == $Member){
	SendMessage($chat_id,"سلــام $first 👋😉
🔹 به سرویس ربات ساز فونیکس در تاریخ $date و ساعت $time خوش آمدید 🌹.
🔸 با استفاده از این سرویس شما میتوانید رباتی جهت ارائه پشتیبانی به کاربران ربات، کانال، گروه یا وبسایت خود ایجاد کنید.
🔹برای ساخت ربات از دکمه ی ساخت ربات استفاده نمایید.
@Source_Home","html","true",$button_official_admin);
	}else{
	SendMessage($chat_id,"سلــام $first 👋😉
🔹 به سرویس ربات ساز فونیکس در تاریخ $date و ساعت $time خوش آمدید 🌹.
🔸 با استفاده از این سرویس شما میتوانید رباتی جهت ارائه پشتیبانی به کاربران ربات، کانال، گروه یا وبسایت خود ایجاد کنید.
🔹برای ساخت ربات از دکمه ی ساخت ربات استفاده نمایید.
@Source_Home","html","true",$button_official_fa);
	}
	}
	
	//===============
	elseif($tch != 'member' && $tch != 'creator' && $tch != 'administrator'){
	SendMessage($chat_id,"🔸برای حمایت از ما و همچنان از ربات ابتدا وارد کانال زیر شوید👇
🆔 @Source_Home
🔹روی عبارت join بزنید سپس به ربات برگشته و گزینه
🔸 /start
🔹را ارسال کنید تا دکمه های ربات نمایش داده شوند.","html","true",$button_remove);
	}
	
	
	//===============
	elseif($text == '↩️منوی اصلی'){
  save('administrative/user/'.$from_id."/command.txt","none");
  if($from_id == $admin){
  SendMessage($chat_id,"🏠به صفحه اصلی برگشتیم.
🙏لطفا یکی از گزینه های زیر را انتخاب نمایید.","html","true",$button_official_admin);
  }else{
  SendMessage($chat_id,"🏠به صفحه اصلی برگشتیم.
🙏لطفا یکی از گزینه های زیر را انتخاب نمایید.","html","true",$button_official_fa);
  }
  }
  
  //===============
	
		elseif($text == '↩️برگشت به منوی ادمین'){
  save('administrative/user/'.$from_id."/command.txt","none");
  if($from_id == $admin){
  SendMessage($chat_id,"به منوی ادمین خوش امدید ","html","true",$button_manage);
  }else{
  SendMessage($chat_id,"کاربر عزیز شما ادمین نیستید","html","true",$button_official_fa);
  }
  }
  //===============
    elseif($text == '🎁استفاده از کد🎁'){
  SendMessage($chat_id,"لطفا نوع رباتی که میخواهید ویژه شود را انتخاب کنید✔️","html","true",$button_vip_code);
  }
  //===============
  elseif (strpos($text,"🔝ویژه کردن ویوگیر🔝") !== false) {
  save('administrative/user/'.$from_id."/command.txt","code pv 123");
  SendMessage($chat_id,"کد رایگان را ارسال کنید✔️","html","true",$button_back);
}
//===============
elseif (strpos($text,"🔝ویژه کردن پیام رسان🔝") !== false) {
  save('administrative/user/'.$from_id."/command.txt","code pv 123");
  SendMessage($chat_id,"کد رایگان را ارسال کنید✔️","html","true",$button_back);
}
  //===============
	elseif($command == 'code pv 123'){
  if($codefree == 'true' and $from_id != $admin){
  SendMessage($chat_id,"📛شما قبلا یک بار از این امکان استفاده کردید","html","true");
  }else{
  if(file_exists("administrative/code/$text.txt")){
  $code = file_get_contents("administrative/code/$text.txt");
  if($code == 'true'){
  SendMessage($chat_id,"کدی که فرستادی استفاده شده😕","html","true");
  }else{
  save('administrative/user/'.$from_id."/command.txt","code free");
  save('administrative/user/'.$from_id."/wait.txt",$text);
  SendMessage($chat_id,"الا آیدی رباتتان را بدون @ بفرست.
لطفا به حروف کوچک و بزرگ آیدی دقت کنید🤗","html","true",$button_back);
  }
  }else{
  SendMessage($chat_id,"کدی که فرستادی اصلا وجود نداره😂","html","true");
  }
  }
  }
	//===============
	elseif($command == 'code free'){
	$code = file_get_contents("administrative/code/$wait.txt");
	if($code == 'true'){
	save('administrative/user/'.$from_id."/command.txt","none");
	SendMessage($chat_id,"کدی که فرستادی استفاده شده😕","html","true",$button_official_fa);
	}else{
	$text = str_replace("@",'',$text);
	if(file_exists("Bot/$text")){
	$vip = file_get_contents("Bot/$text/data/bottype.txt");
	if($vip == 'gold'){
	save('administrative/user/'.$from_id."/command.txt","none");
	SendMessage($chat_id,"رباتی که آیدیشو فرستادی قبلا هم ویژه بوده.","html","true",$button_official_fa);
	}else{
	save("administrative/code/$wait.txt","true");
	save('administrative/user/'.$from_id."/command.txt","none");
	save('administrative/user/'.$from_id."/codefree.txt","true");
	save("Bot/$text/data/bottype.txt","gold");
	SendMessage($chat_id,"😍تبریک میگم رباتت ویژه شد.","html","true",$button_official_fa);
	SendMessage($admin,"کاربری از کد رایگان استفاده کرد مشخصاتش👇
	$first $from_id $wait","html","true");
	SendMessage($kanal,"***************
😎اطلاعات استفاده کننده از کد👇

👤نام : $first
🆔 آیدی عددی : $from_id
🎁کد استفاده شده : $wait
🤖آیدی ربات : @$text
⏰زمان استفاده از کد : $time
📆تاریخ استفاده از کد : $date
***************
🆑 @Source_Home
🤖 @Source_Home","html","true");
	}
	}else{
	save('administrative/user/'.$from_id."/command.txt","code free");
	SendMessage($chat_id,"⭕️ ربات وجود ندارد.
	✳️ به حروف کوچیک و بزرگ آیدی دقت کنید.","html","true",$button_back);
	}
	}
	}
  //===============
  elseif($text == '❌حذف ربات' and $from_id){
  save('administrative/user/'.$from_id."/command.txt","hesabb");
  bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"لطفا یکی از ربات خود را از گزینه های زیر انتخاب نمایید✔️
⚠️توجه شما فقط میتوانید آخرین ربات خود را حذف کنید.",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'keyboard'=>[
              [['text'=>"$listtbots"]],
              [['text'=>"↩️منوی اصلی"]]
              ],
              "resize_keyboard"=>true,
              "one_time_keyboard" => true
        ])
 ]);
}
  elseif($command == 'hesabb' and $from_id){
  unlink("Bot/".$text."/index.php");
  unlink("Bot/".$text."/Class.php");
  unlink("administrative/user/".$from_id."/create.txt");
  SendMessage($chat_id,"ربات شما با موفقیت حذف شد👍","html","true",$button_back);
  }
  //===============
  elseif($text == '⚠️راهنما'){
  SendMessage($chat_id,"1⃣ ابتدا به ربات ( @BotFather ) مراجعه کنید
2⃣ دستور /newbot رو ارسال کنید
3⃣ یک نام برای ربات ارسال کنید
4⃣ پس از ارسال نام،یک یوزرنیم ارسال کنید
❌ توجه کنین قبل 
یوزرنیم نباید (@) بزارین و حتما باید در آخر یوزرنیم ارسالی کلمه bot با حروف کوچیک یا بزرگ (فرقی نداره) وجود داشته باشه
5⃣ اگر با پیغام زیر برخورد کردید
Sorry, this username is already taken. Please try something different.
یعنی قبلا یکی این یوزرنیم رو ثبت کرده یوزرنیم دیگری وارد کنید. اگر این پیغام رو دریافت نکردید یعنی کار حل است
6⃣ حالا به این ربات مراجعه کنید و دکمه (🛠
ساخت ربات🛠) رو بزنید
7⃣ سپس پیام آخری که از ربات ( @BotFather ) دریافت کردید رو اون جایی که مثل این یه متن نوشته👇

369762599:AAFeMVVjM8KSYz_-1f-6nowsl22-0gGAr36
کپی کن و بفرست به
@Source_Home 😁
8⃣ ربات شما با موفقیت ثبت شد.

🆔 @Source_Home
#آموزش_ساخت_ربات","html","true");
  }
  //===============
  elseif($text == '/time'){
  SendMessage($chat_id,"ساعت هم اکنون: $time

تاریخ هم اکنون: $date","html","true");
  }
    //===============
  elseif($text == 'حذف ربات' and $from_id == $admin){
  save('administrative/user/'.$from_id."/command.txt","hesab");
  SendMessage($chat_id,"🔱 یوزرنیم بات رو بدون @ وارد کنید","html","true",$button_back);
  }
  elseif($command == 'hesab' and $from_id == $admin){
  unlink("Bot/".$text."/index.php");
  unlink("Bot/".$text."/Class.php");
  SendMessage($chat_id,"حذف شد","html","true",$button_back);
  }
  //===============
  /*elseif($text == ''){
 
  }*/
  //===============
  elseif($text == '⚜حساب ویژه' and $from_id){
SendMessage($chat_id,"⚜برای خرید حساب ویژه از روش زیر استفاده کنید👇 
مراجعه به ربات پشتیبان
@Source_Home
-----------------------------
🔰تعرفه ها
ربات ربات ساز 7000تومان
👁‍🗨ربات ویو گیر پیشرفت  6000 تومان
ربات چت ناشناس 5000 تومان
بقیه ربات ها 4000 تومان","html","true");
  }
  //===============
  elseif($command == 'gold acc 20'){
	if(file_exists("Bot/$text")){
	save("Bot/$text/other/setting/bot_type.txt","gold");
	save('administrative/user/'.$from_id."/command.txt","none");
	save('administrative/user/'.$from_id."/goldacc.txt","true");
	SendMessage($chat_id,"✅ حساب ربات ویژه شد","html","true",$button_official_fa);
	}else{
  SendMessage($chat_id,"🤖 آیدی بات رو بدون @ وارد کنید.آیدی وارد شده اشتباه است
⭕️ به کوچیک و بزرگی حروف دقت کنید","html","true");
  }
  }
  //===============
  elseif($text == '🤖پشتیبانی'){
  SendMessage($chat_id,"🔸دوست عزیز تمام نظراتتون رو میتونید به ربات زیر بفرستید.
ما 24 ساعته پاسخگوی شما هستیم و برای حل مشکل شما آماده ایم👇
🆔 @Source_Home","html","true");
  }
  //===============
  elseif($text == '🔹قوانین'){
  SendMessage($chat_id,"💯قوانین ساخت ربات:

🔹 همه مطالب باید تابع قوانین جمهوری اسلامی ایران باشد.
🔹 رعایت ادب و احترام به کاربران.
🔹 ساخت هرگونه ربات در ضمیمه +18 خلاف قوانین ربات میباشد و در صورت مشاهده ربات مورد نظر مسدود و همچنین مدیر ربات از تمامی ربات ها بلاک میشود.
🔹 مسئولیت پیام های رد و بدل شده در هر ربات با مدیر آن میباشد و ما هیچگونه مسئولیتی نداریم.
🔹 در صورت مشاهده استفاده از قابلیت های ربات در جهات منفی به شدت برخورد میشود.
🔹 اگر به هر دلیلی درخواست های ربات شما به سرور ما بیش از حد معمول باشد (و حساب ربات ویژه نباشد) چند باری به شما اخطار داده میشود اگر این اخطار ها نادیده گرفته شوند ربات شما مسدود و به هیچ عنوان از محدودیت خارج نمیشود.
🔹 بعد از پرداخت مبلغ جهت ویژه کردن رباتتان وجه به هیچ عنوان باز نمیگردد مگر اینکه ربات شما مشکل داشته باشد.","html","true");
  }
  //===============
    elseif($text == '🤖 ویژه کردن رایگان🔱'){
  SendMessage($chat_id,"به بخش ( ویژه کردن رایگان) خوش آمدید😊
شما میتوانید با دعوت دوستان خود به ربات ساز امتیاز جمع آوری کرده و ربات خود را ویژه کنید.

برای دریافت بنر خود و ارسال به دوستان دکمه (💥دریافت بنر💥) را بزنید.

برای اطلاع از امتیازات خود روی دکمه (🔆موجودی امتیازات) بزنید.","html","true",$button_bazaryabi);
  } 
  //===============
  elseif($text == '♻️ویژگی ها'){
   sendMessage($chat_id,"🔸ویژگی ربات های ساخته شده با ربات ساز ما:
1-بدون هیچ گونه تبلیغات🚫
2-سرعت بالا🚀
3-پشتیبانی حرفه ای و 24 ساعته💪
4-بدون قطعی و کندی🤝
5-امکان ارسال پیام همگانی📮
6-امکان آمار لحظه ای📊
7-پنل مدیریت حرفه ای✅
8-قیمت مناسب💶
🆔 @Source_Home");  
   }
   
  //===============
  
   elseif($text == '💥دریافت بنر💥'){
  sendMessage($chat_id,"🛠ربات خود را بسازید😱
✈️با سرعت عالی🚀
💬پیام رسان پیشرفته
👁‍🗨ویو گیر اختصاصی
📟ضد لینک حرفه ای
🛍فروشگاه ساز
⛏تبچی ساز
🗞تبچی حرفه ای
📥بنردهی
🤖ساخت ربات ساز
https://telegram.me/Source_Home?start=$from_id");  
 }
  //===============
  elseif($text == 'spam'){
$txxt = file_get_contents('administrative/banall-member/banall.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($text,$pmembersid)){
  $aaddddd = file_get_contents('administrative/banall-member/banall.txt');
  $aaddddd .= $from_id."\n";
  file_put_contents('administrative/banall-member/banall.txt',$aaddddd);
  SendMessage($chat_id,"کاربر گرامی شما به دلیل اسپم زدن ربات ساز ما از این ربات بلاک شدید⛔️🚫️","html","true");
  }
}
//===============
  elseif($text == 'Spam'){
$txxt = file_get_contents('administrative/banall-member/banall.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($text,$pmembersid)){
  $aaddddd = file_get_contents('administrative/banall-member/banall.txt');
  $aaddddd .= $from_id."\n";
  file_put_contents('administrative/banall-member/banall.txt',$aaddddd);
  SendMessage($chat_id,"کاربر گرامی شما به دلیل اسپم زدن ربات ساز ما از این ربات بلاک شدید⛔️🚫","html","true");
  }
}

//===============
  elseif($text == 'SPAM'){
$txxt = file_get_contents('administrative/banall-member/banall.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($text,$pmembersid)){
  $aaddddd = file_get_contents('administrative/banall-member/banall.txt');
  $aaddddd .= $from_id."\n";
  file_put_contents('administrative/banall-member/banall.txt',$aaddddd);
  SendMessage($chat_id,"کاربر گرامی شما به دلیل اسپم زدن ربات ساز ما از این ربات بلاک شدید⛔️🚫","html","true");
  }
}

//===============
  elseif($text == '@Spam'){
$txxt = file_get_contents('administrative/banall-member/banall.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($text,$pmembersid)){
  $aaddddd = file_get_contents('administrative/banall-member/banall.txt');
  $aaddddd .= $from_id."\n";
  file_put_contents('administrative/banall-member/banall.txt',$aaddddd);
  SendMessage($chat_id,"کاربر گرامی شما به دلیل اسپم زدن ربات ساز ما از این ربات بلاک شدید⛔️🚫","html","true");
  }
}

//===============
  elseif($text == '@SPAM'){
$txxt = file_get_contents('administrative/banall-member/banall.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($text,$pmembersid)){
  $aaddddd = file_get_contents('administrative/banall-member/banall.txt');
  $aaddddd .= $from_id."\n";
  file_put_contents('administrative/banall-member/banall.txt',$aaddddd);
  SendMessage($chat_id,"کاربر گرامی شما به دلیل اسپم زدن ربات ساز ما از این ربات بلاک شدید⛔️🚫","html","true");
  }
}

//===============
  elseif($text == 'spambot'){
$txxt = file_get_contents('administrative/banall-member/banall.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($text,$pmembersid)){
  $aaddddd = file_get_contents('administrative/banall-member/banall.txt');
  $aaddddd .= $from_id."\n";
  file_put_contents('administrative/banall-member/banall.txt',$aaddddd);
  SendMessage($chat_id,"کاربر گرامی شما به دلیل اسپم زدن ربات ساز ما از این ربات بلاک شدید⛔️🚫","html","true");
  }
}

//===============
  elseif($text == 'Spambot'){
$txxt = file_get_contents('administrative/banall-member/banall.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($text,$pmembersid)){
  $aaddddd = file_get_contents('administrative/banall-member/banall.txt');
  $aaddddd .= $from_id."\n";
  file_put_contents('administrative/banall-member/banall.txt',$aaddddd);
  SendMessage($chat_id,"کاربر گرامی شما به دلیل اسپم زدن ربات ساز ما از این ربات بلاک شدید⛔️🚫","html","true");
  }
}

//===============
  elseif($text == 'SpamBot'){
$txxt = file_get_contents('administrative/banall-member/banall.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($text,$pmembersid)){
  $aaddddd = file_get_contents('administrative/banall-member/banall.txt');
  $aaddddd .= $from_id."\n";
  file_put_contents('administrative/banall-member/banall.txt',$aaddddd);
  SendMessage($chat_id,"کاربر گرامی شما به دلیل اسپم زدن ربات ساز ما از این ربات بلاک شدید⛔️🚫","html","true");
  }
}

//===============
  elseif($text == '@spambot'){
$txxt = file_get_contents('administrative/banall-member/banall.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($text,$pmembersid)){
  $aaddddd = file_get_contents('administrative/banall-member/banall.txt');
  $aaddddd .= $from_id."\n";
  file_put_contents('administrative/banall-member/banall.txt',$aaddddd);
  SendMessage($chat_id,"کاربر گرامی شما به دلیل اسپم زدن ربات ساز ما از این ربات بلاک شدید⛔️🚫","html","true");
  }
}

//===============
  elseif($text == '@SpamBot'){
$txxt = file_get_contents('administrative/banall-member/banall.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($text,$pmembersid)){
  $aaddddd = file_get_contents('administrative/banall-member/banall.txt');
  $aaddddd .= $from_id."\n";
  file_put_contents('administrative/banall-member/banall.txt',$aaddddd);
  SendMessage($chat_id,"کاربر گرامی شما به دلیل اسپم زدن ربات ساز ما از این ربات بلاک شدید⛔️🚫","html","true");
  }
}

//===============
  elseif($text == '@Spambot'){
$txxt = file_get_contents('administrative/banall-member/banall.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($text,$pmembersid)){
  $aaddddd = file_get_contents('administrative/banall-member/banall.txt');
  $aaddddd .= $from_id."\n";
  file_put_contents('administrative/banall-member/banall.txt',$aaddddd);
  SendMessage($chat_id,"کاربر گرامی شما به دلیل اسپم زدن ربات ساز ما از این ربات بلاک شدید⛔️🚫","html","true");
  }
}
//===============
  elseif($text == '@SPAMBOT'){
$txxt = file_get_contents('administrative/banall-member/banall.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($text,$pmembersid)){
  $aaddddd = file_get_contents('administrative/banall-member/banall.txt');
  $aaddddd .= $from_id."\n";
  file_put_contents('administrative/banall-member/banall.txt',$aaddddd);
  SendMessage($chat_id,"کاربر گرامی شما به دلیل اسپم زدن ربات ساز ما از این ربات بلاک شدید⛔️🚫","html","true");
  }
}

   //===============
   elseif($text == '🔝ویژه کردن ربات🔝'){
  SendMessage($chat_id,"لطفا نوع ربات خود را جهت ویژه کردن انتخاب نمایید✔️","html","true",$button_vipp);
  }
  //
  elseif($text == '🔆موجودی امتیازات'){
  SendMessage($chat_id,"🔘کل امتیازات شما: $gold

  با زدن به روی دکمه (🔝ویژه کردن ربات🔝) ربات خود را ویژه کنید.","html","true","$button_bazaryabi");
  }
  		elseif($text == '⛏ویژه کردن پیام رسان💬'){
		if($karbarash > 19){
		save("administrative/user/$from_id/command.txt","viplink");
		sendMessage($chat_id,"⚠️توجه
ایدی ربات خود را بدون @ برای ربات ارسال کنید اگر با @ بفرستید جواب نمیدهد و امتیاز الکی از شما کم میشود.","html","true","$button_back");
		}else{
		SendMessage($chat_id,"متاسفانه شما 20 امتیاز ندارید❌
🔘امتیازات شما: $karbarash
لطفا با آوردن زیر مجموعه به ربات امتیاز خود را افزایش بدید.");
		}}
		elseif($command == 'viplink'){
		$newgold = $karbarash - 19;
		save("administrative/user/$from_id/gold.txt",$newgold);
		save("administrative/user/$from_id/command.txt","none");
		save("Bot/$text/data/bottype.txt","gold");
		sendMessage($chat_id,"🎊تبریک ربات @$text شما ویژه شد.");
		}
		
		elseif($text == '⛏ویژه کردن ویوگیر👁‍🗨'){
  if($karbarash > 19){
  save("administrative/user/$from_id/command.txt","viplin");
  sendMessage($chat_id,"⚠️توجه
ایدی ربات خود را بدون @ برای ربات ارسال کنید اگر با @ بفرستید جواب نمیدهد و امتیاز الکی از شما کم میشود.","html","true","$button_back");
  }else{
  SendMessage($chat_id,"متاسفانه شما 20 امتیاز ندارید❌
🔘امتیازات شما: $karbarash
لطفا با آوردن زیر مجموعه به ربات امتیاز خود را افزایش بدید.");
  }}
  elseif($command == 'viplin'){
  $newgold = $karbarash - 19;
  save("Bot/$text/data/bottype.txt","gold");
  save("administrative/user/$from_id/gold.txt",$newgold);
  save("administrative/user/$from_id/command.txt","none");
  sendMessage($chat_id,"🎊تبریک ربات @$text شما ویژه شد.");
  }
  elseif($text == '⛏ویژه کردن ویوگیر پیشرفته👁‍🗨'){
		if($karbarash > 19){
		save("administrative/user/$from_id/command.txt","viplink3");
		sendMessage($chat_id,"⚠️توجه
ایدی ربات خود را بدون @ برای ربات ارسال کنید اگر با @ بفرستید جواب نمیدهد و امتیاز الکی از شما کم میشود.","html","true","$button_back");
		}else{
		SendMessage($chat_id,"متاسفانه شما 20 امتیاز ندارید❌
🔘امتیازات شما: $karbarash
لطفا با آوردن زیر مجموعه به ربات امتیاز خود را افزایش بدید.");
		}}
		elseif($command == 'viplink3'){
		$newgold = $karbarash - 19;
		save("administrative/user/$from_id/gold.txt",$newgold);
		save("administrative/user/$from_id/command.txt","none");
		save("Bot/$text/data/bottype.txt","gold");
		sendMessage($chat_id,"🎊تبریک ربات @$text شما ویژه شد.");
		}
		elseif($text == '⛏ویژه کردن بنردهی📥'){
  if($karbarash > 19){
  save("administrative/user/$from_id/command.txt","viplink38");
  sendMessage($chat_id,"⚠️توجه
ایدی ربات خود را بدون @ برای ربات ارسال کنید اگر با @ بفرستید جواب نمیدهد و امتیاز الکی از شما کم میشود.","html","true","$button_back");
  }else{
  SendMessage($chat_id,"متاسفانه شما 20 امتیاز ندارید❌
🔘امتیازات شما: $karbarash
لطفا با آوردن زیر مجموعه به ربات امتیاز خود را افزایش بدید.");
  }}
  elseif($command == 'viplink38'){
  $newgold = $karbarash - 19;
  save("administrative/user/$from_id/gold.txt",$newgold);
  save("administrative/user/$from_id/command.txt","none");
  save("Bot/$text/bot_type_ads.txt","gold");
  sendMessage($chat_id,"🎊تبریک ربات @$text شما ویژه شد.");
  }
  elseif($text == '💬ویژه کردن چت ناشناس⚜️'){
  if($karbarash > 19){
  save("administrative/user/$from_id/command.txt","viplink38");
  sendMessage($chat_id,"⚠️توجه
ایدی ربات خود را بدون @ برای ربات ارسال کنید اگر با @ بفرستید جواب نمیدهد و امتیاز الکی از شما کم میشود.","html","true","$button_back");
  }else{
  SendMessage($chat_id,"متاسفانه شما 20 امتیاز ندارید❌
🔘امتیازات شما: $karbarash
لطفا با آوردن زیر مجموعه به ربات امتیاز خود را افزایش بدید.");
  }}
  elseif($command == 'viplink38'){
  $newgold = $karbarash - 19;
  save("administrative/user/$from_id/gold.txt",$newgold);
  save("administrative/user/$from_id/command.txt","none");
  save("Bot/$text/bot_type_ads.txt","gold");
  sendMessage($chat_id,"🎊تبریک ربات @$text شما ویژه شد.");
  }
		elseif($text == '⛏ویژه کردن فروشگاه ساز🛍'){
    if($karbarash > 19){
    save("administrative/user/$from_id/command.txt","viplink4");
    sendMessage($chat_id,"⚠️توجه
ایدی ربات خود را بدون @ برای ربات ارسال کنید اگر با @ بفرستید جواب نمیدهد و امتیاز الکی از شما کم میشود.","html","true","$button_back");
    }else{
    SendMessage($chat_id,"متاسفانه شما 20 امتیاز ندارید❌
🔘امتیازات شما: $karbarash
لطفا با آوردن زیر مجموعه به ربات امتیاز خود را افزایش بدید.");
    }}
    elseif($command == 'viplink4'){
    $newgold = $karbarash - 19;
    save("administrative/user/$from_id/gold.txt",$newgold);
    save("administrative/user/$from_id/command.txt","none");
    save("Bot/$text/botttype.txt","gold");
    sendMessage($chat_id,"🎊تبریک ربات @$text شما ویژه شد.");
    }
    elseif($text == '⚜️ویژه کردن تغییر نام فایل📝'){
    if($karbarash > 19){
    save("administrative/user/$from_id/command.txt","viplink44");
    sendMessage($chat_id,"⚠️توجه
ایدی ربات خود را بدون @ برای ربات ارسال کنید اگر با @ بفرستید جواب نمیدهد و امتیاز الکی از شما کم میشود.","html","true","$button_back");
    }else{
    SendMessage($chat_id,"متاسفانه شما 20 امتیاز ندارید❌
🔘امتیازات شما: $karbarash
لطفا با آوردن زیر مجموعه به ربات امتیاز خود را افزایش بدید.");
    }}
    elseif($command == 'viplink44'){
    $newgold = $karbarash - 19;
    save("administrative/user/$from_id/gold.txt",$newgold);
    save("administrative/user/$from_id/command.txt","none");
    save("Bot/$text/bot_type_ads.txt","gold");
    sendMessage($chat_id,"🎊تبریک ربات @$text شما ویژه شد.");
    }
    elseif($text == '✉️ویژه کردن تبچی🎈'){
    if($karbarash > 19){
    save("administrative/user/$from_id/command.txt","viplink4411");
    sendMessage($chat_id,"⚠️توجه
ایدی ربات خود را بدون @ برای ربات ارسال کنید اگر با @ بفرستید جواب نمیدهد و امتیاز الکی از شما کم میشود.","html","true","$button_back");
    }else{
    SendMessage($chat_id,"متاسفانه شما 20 امتیاز ندارید❌
🔘امتیازات شما: $karbarash
لطفا با آوردن زیر مجموعه به ربات امتیاز خود را افزایش بدید.");
    }}
    elseif($command == 'viplink4411'){
    $newgold = $karbarash - 19;
    save("administrative/user/$from_id/gold.txt",$newgold);
    save("administrative/user/$from_id/command.txt","none");
    save("Bot/$text/bot_type_ads.txt","gold");
    sendMessage($chat_id,"🎊تبریک ربات @$text شما ویژه شد.");
    }
    elseif($text == '🔑ویژه کردن ضد لینک📟'){
    if($karbarash > 19){
    save("administrative/user/$from_id/command.txt","viplink44116");
    sendMessage($chat_id,"⚠️توجه
ایدی ربات خود را بدون @ برای ربات ارسال کنید اگر با @ بفرستید جواب نمیدهد و امتیاز الکی از شما کم میشود.","html","true","$button_back");
    }else{
    SendMessage($chat_id,"متاسفانه شما 20 امتیاز ندارید❌
🔘امتیازات شما: $karbarash
لطفا با آوردن زیر مجموعه به ربات امتیاز خود را افزایش بدید.");
    }}
    elseif($command == 'viplink44116'){
    $newgold = $karbarash - 19;
    save("administrative/user/$from_id/gold.txt",$newgold);
    save("administrative/user/$from_id/command.txt","none");
    save("Bot/$text/bot_type_ads.txt","gold");
    sendMessage($chat_id,"🎊تبریک ربات @$text شما ویژه شد.");
    }
    elseif($text == '😱ویژه کردن ربات ساز😎'){
    if($karbarash > 299){
    save("administrative/user/$from_id/command.txt","viplink44116o");
    sendMessage($chat_id,"⚠️توجه
آیدی ربات خود را دقیق و بدون @ ارسال نمایید.
اگر با توضیحات بالا مطابقت نداشته باشد امتیاز الکی از شما کسر میشود و ربات ویژه نمیشود🚫","html","true","$button_back");
    }else{
    SendMessage($chat_id,"متاسفانه شما 300 امتیاز ندارید❌
🔘امتیازات شما: $karbarash
لطفا با آوردن زیر مجموعه به ربات امتیاز خود را افزایش بدید.");
    }}
    elseif($command == 'viplink44116o'){
    $newgold = $karbarash - 299;
    save("administrative/user/$from_id/gold.txt",$newgold);
    save("administrative/user/$from_id/command.txt","none");
    save("Bot/$text/botupe.txt","gold");
    sendMessage($chat_id,"🎊تبریک ربات @$text شما ویژه شد.");
    }
		
		  elseif($text == 'ساخت ربات دوم😎'){
			  if($karbarash > 9){
				  save("administrative/user/".$from_id."/gold.txt",$karbarash-9);
  unlink("administrative/user/".$from_id."/create.txt");
  SendMessage($chat_id,"ساخت ربات دوم برای شما فعال شد و 10 امتیاز از شما کم شد.
هم اکنون میتوانید با زدن دکمه (🛠ساخت ربات🛠) در منوی اصلی ربات برای خود ربات بسازید.","html","true",$button_bazaryabi);
  }else{
	  sendMessage($chat_id,"متاسفانه شما ۱۰ امتیاز ندارید❌
🔘امتیازات شما: $karbarash
لطفا با آوردن زیر مجموعه به ربات امتیاز خود را افزایش بدید.");
  }
		  }
  elseif($text == '🔫گزارش ربات'){
  save('administrative/user/'.$from_id."/command.txt","takhlof");
  SendMessage($chat_id,"🔸لطفا آیدی رباتی که با ربات ساز ما ساخته شده و تخلف کرده است را ارسال کنید.","html","true",$button_back);
  }
    //===============
    elseif($text == '??ارسال نظر'){
  save('administrative/user/'.$from_id."/command.txt","suport");
  SendMessage($chat_id,"با سلام لطفا نظر خود را ارسال کنید✔️️","html","true",$button_back);
  }
  //===============
  elseif($command == 'suport'){
  if($text){
  save('administrative/user/'.$from_id."/command.txt","none");
  SendMessage($feed,"پیام ارسال شده از کاربر👇️","html","true");
  ForwardMessage($feed,$chat_id,$message_id);
  SendMessage($chat_id,"نظر شما با موفقیت به ادمین ربات ارسال شد","html","true",$button_official_fa);
  }else{
  save('administrative/user/'.$from_id."/command.txt","takhlof");
  SendMessage($chat_id,"خطا","html","true",$button_back);
  }
  }
    //===============
  elseif($command == 'takhlof'){
	if(preg_match('/^(@)(.*)([Bb][Oo][Tt])/s',$text)){
	save('administrative/user/'.$from_id."/command.txt","none");
	SendMessage($feed,"گزارش تخلف ⬇","html","true");
	ForwardMessage($feed,$chat_id,$message_id);
	SendMessage($chat_id,"✅ ثبت شد.
	✅ به زودی به درخواست شما رسیدگی میشود","html","true",$button_official_fa);
  }else{
	save('administrative/user/'.$from_id."/command.txt","takhlof");
	SendMessage($chat_id,"⭕️ خطا !!!
	⭕️ دقت کنین یوزرنیم ربات با @ شروع شده و با کلمه (bot) پایان میابد","html","true",$button_back);
  }
  }
    elseif($text == 'ارسال' and $from_id == $admin){
  save('administrative/user/'.$from_id."/command.txt","send");
  SendMessage($chat_id,"متن را وارد کنید!","html","true",$button_back);
  }
    elseif($command == 'send'){
	save('administrative/user/'.$from_id."/command.txt","none");
	SendMessage($kanal,$text,"MarkDown","true");
	sendMessage($chat_id,"ارسال شد","html","true",$button_official_fa);
  }
    elseif($text == 'فور' and $from_id == $admin){
	save("administrative/user/".$from_id."/command.txt","fwd");
	SendMessage($chat_id,"📮 پیام مورد نظر را فوروارد کنید","html","true",$button_back);
	}
	elseif($command == 'fwd' and $from_id == $admin){
	save("administrative/user/".$from_id."/command.txt","none");
	SendMessage($chat_id,"📮 پیام شما در صف ارسال قرار گرفت.","html","true",$button_manage);
			ForwardMessage($kanal,$admin,$message_id);
		}
  //===============
     elseif($text == '↩️Back Menu'){
  SendMessage($chat_id,"↩️ return to the main menu

⏺ What can I do for you?","html","true",$button_official_fa);
  }
  //===============
  //
  elseif($text == '🛠ساخت ربات🛠'){
	SendMessage($chat_id,"😎حالا نوع ربات رو برای ساخت انتخاب کن.","html","true",$button_create);
  }
  //
  elseif($text == '💬ساخت ربات پیام رسان'){
  SendMessage($chat_id,"✅ توکن ربات مورد نظر رو ارسال کنید.
اگر نمیدونید توکن چیست به صفحه اصلی برگشته و مطالب دکمه (⚠️راهنما) را مطالعه کنید.","html","true",$button_back);
  save('administrative/user/'.$from_id."/command.txt","create botpv");
  }
  elseif($text == '👁‍🗨ساخت ربات ویو گیر'){
  SendMessage($chat_id,"✅ توکن ربات مورد نظر رو ارسال کنید.
اگر نمیدونید توکن چیست به صفحه اصلی برگشته و مطالب دکمه (⚠️راهنما) را مطالعه کنید.","html","true",$button_back);
  save('administrative/user/'.$from_id."/command.txt","create botview");
  }
  elseif($text == '📡ساخت ربات ویوگیر پیشرفته😎'){
  SendMessage($chat_id,"✅ توکن ربات مورد نظر رو ارسال کنید.
اگر نمیدونید توکن چیست به صفحه اصلی برگشته و مطالب دکمه (⚠️راهنما) را مطالعه کنید.","html","true",$button_back);
  save('administrative/user/'.$from_id."/command.txt","create tst");
  }
  elseif($text == '🚀ساخت ربات ضدلینک📡'){
  SendMessage($chat_id,"✅ توکن ربات مورد نظر رو ارسال کنید.
اگر نمیدونید توکن چیست به صفحه اصلی برگشته و مطالب دکمه (⚠️راهنما) را مطالعه کنید.","html","true",$button_back);
  save('administrative/user/'.$from_id."/command.txt","create zedelink");
  }
  elseif($text == '📥ساخت ربات بنردهی📥'){
  SendMessage($chat_id,"✅ توکن ربات مورد نظر رو ارسال کنید.
اگر نمیدونید توکن چیست به صفحه اصلی برگشته و مطالب دکمه (⚠️راهنما) را مطالعه کنید.","html","true",$button_back);
  save('administrative/user/'.$from_id."/command.txt","create banerr");
  }
  elseif($text == '🌇ساخت ربات عکس نوشته ساز😎'){
  SendMessage($chat_id,"✅ توکن ربات مورد نظر رو ارسال کنید.
اگر نمیدونید توکن چیست به صفحه اصلی برگشته و مطالب دکمه (⚠️راهنما) را مطالعه کنید.","html","true",$button_back);
  save('administrative/user/'.$from_id."/command.txt","create aksnevesh");
  }
  elseif($text == '📝ساخت ربات تغییر نام فایلها📌'){
  SendMessage($chat_id,"✅ توکن ربات مورد نظر رو ارسال کنید.
اگر نمیدونید توکن چیست به صفحه اصلی برگشته و مطالب دکمه (⚠️راهنما) را مطالعه کنید.","html","true",$button_back);
  save('administrative/user/'.$from_id."/command.txt","create editename");
  }
  elseif($text == '⛏ساخت ربات فروشگاه ساز🛍'){
  SendMessage($chat_id,"✅ توکن ربات مورد نظر رو ارسال کنید.
اگر نمیدونید توکن چیست به صفحه اصلی برگشته و مطالب دکمه (⚠️راهنما) را مطالعه کنید.","html","true",$button_back);
  save('administrative/user/'.$from_id."/command.txt","create shopsaz");
  }
  elseif($text == '🗞ساخت ربات تبچی💸'){
  SendMessage($chat_id,"✅ توکن ربات مورد نظر رو ارسال کنید.
اگر نمیدونید توکن چیست به صفحه اصلی برگشته و مطالب دکمه (⚠️راهنما) را مطالعه کنید.","html","true",$button_back);
  save('administrative/user/'.$from_id."/command.txt","create tbligcho");
  }
  elseif($text == '💬ساخت ربات چت ناشناس🗣'){
  SendMessage($chat_id,"✅ توکن ربات مورد نظر رو ارسال کنید.
اگر نمیدونید توکن چیست به صفحه اصلی برگشته و مطالب دکمه (⚠️راهنما) را مطالعه کنید.","html","true",$button_back);
  save('administrative/user/'.$from_id."/command.txt","create chatnashenas");
  }
  elseif($text == "🤖ساختـن ربــات ســـــــــاز🤖"){
  SendMessage($chat_id,"✅ توکن ربات مورد نظر رو ارسال کنید.
اگر نمیدونید توکن چیست به صفحه اصلی برگشته و مطالب دکمه (⚠️راهنما) را مطالعه کنید.","html","true",$button_back);
  save('administrative/user/'.$from_id."/command.txt","create robotsaz");
  }
  //==============
  ////////////////////////////////////
    elseif($command == 'create botview'){
  if($update->message->forward_from != null){
  $rep = strchr($text,"Use this token to access the http API:");
  $rep = str_replace("Use this token to access the http API:",'',$rep);
  $rep = str_replace("For a description of the Bot API, see this page: https://core.telegram.org/bots/api",'',$rep);
  $rep = str_replace("\n",'',$rep);
  $token = $rep;
  }else{
  $token = $text;
  }
  $userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));
  $resultb = objectToArrays($userbot);
  $username_bot = $resultb["result"]["username"];
  $id_bot = $resultb["result"]["id"];
  $first_bot = $resultb["result"]["first_name"];
  $ok = $resultb["ok"];
  if($ok != 1) {
  SendMessage($chat_id,"دوست عزیز توکن ربات شما نامعتبر است❌
لطفا یک توکن معتبر بفرستید✔️","html","true",$button_back);
  }else{
	  
	 if($username == null){
  $username = $first;
  }else{
  $username = "@".$username;
  }
	  
  if(file_exists("Bot/$username_bot")){
  $pmtext = "{✅ ربات آپدیت شد توسط 👈 ($username)}{🤖 ربات مربوطه 👈 (@$username_bot)}{⏰ زمان 👈 ($time)}{📅 تاریخ 👈 ($date)}";
  $msgid = json_decode(file_get_contents('https://api.telegram.org/botتوکن/sendMessage?parse_mode=HTML&chat_id=-1001129835882&text='.$pmtext));
  $msg_id = $msgid->result->message_id;
  save('administrative/user/'.$from_id."/command.txt","none");
  $class = file_get_contents("administrative/source/view/Class.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
  $class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/Class.php",$class);
  $index = file_get_contents("administrative/source/view/index.php");
  save("Bot/$username_bot/index.php",$index);	
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
    $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز هوشمند 
  @Source_Home 
 بروزرسانی شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://Fonix.com/Bot/$username_bot/");
  
  SendMessage($chat_id,"ربات شما با موفقیت آپدیت شد♻️
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=Source_Home
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"🏠به صفحه اصلی برگشتیم.
🙏لطفا یکی از گزینه های زیر را انتخاب نمایید.","html","true",$button_official_fa);
  }else{
	  
	  if($create == 'true' and $from_id != $admin){
		  save('administrative/user/'.$from_id."/command.txt","none");
  SendMessage($chat_id,"🌹دوست عزیز متاسفانه شما قبلا یک ربات ساخته اید و نمیتوانید بیشتر از یک ربات بسازید❌
جهت ساخت ربات بیشتر روی دکمه (🤖ربات دوم و ویژه کردن رایگان🔱) کلیک کنید.","html","true",$button_official_fa);
  }else{
	  
  $pmtext = "{✅ ربات ساخته شد توسط 👈 ($username)}{🤖 ربات مربوطه 👈 (@$username_bot)}{⏰ زمان 👈 ($time)}{📅 تاریخ 👈 ($date)}";
  $msgid = json_decode(file_get_contents('https://api.telegram.org/botتوکن/sendMessage?parse_mode=HTML&chat_id=-1001129835882&text='.$pmtext));
  $msg_id = $msgid->result->message_id;
  save('administrative/user/'.$from_id."/command.txt","none");
  save('administrative/user/'.$from_id."/create.txt","$username_bot");
  mkdir("Bot/$username_bot");
  mkdir("Bot/$username_bot/admin");
  mkdir("Bot/$username_bot/ads");
  mkdir("Bot/$username_bot/user");
  mkdir("Bot/$username_bot/admin/code");
  mkdir("Bot/$username_bot/ads/ads admin");
  mkdir("Bot/$username_bot/ads/ads msg id");
  mkdir("Bot/$username_bot/ads/ads tally");
  mkdir("Bot/$username_bot/ads/ads tedad");
  mkdir("Bot/$username_bot/ads/ads username");
  mkdir("Bot/$username_bot/ads/ads time");
  mkdir("Bot/$username_bot/ads/ads date");
  mkdir("Bot/$username_bot/data");
  save("Bot/$username_bot/data/start.txt","Hi!✋ 
  Welcome To My Bot");
  save("Bot/$username_bot/data/help.txt","راهنمایی تنظیم نشده است");
  save("Bot/$username_bot/data/channel.txt","تنظیم نشده");
  save("Bot/$username_bot/data/shop.txt","متن فروشگاه ثبت نشده است.");
  save("Bot/$username_bot/data/zir.txt","متن زیر مجموعه گیری ثبت نشده است");
  save("Bot/$username_bot/data/seen.txt","1");
  save("Bot/$username_bot/data/coinlink.txt","5");
  save("Bot/$username_bot/data/bottype.txt","free");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
  $class = file_get_contents("administrative/source/view/Class.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
  $class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/Class.php",$class);
  $index = file_get_contents("administrative/source/view/index.php");
  save("Bot/$username_bot/index.php",$index);	
  $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز هوشمند 
  @Source_Home 
 متصل شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://Fonix.com/Bot/$username_bot/");
  SendMessage($chat_id,"ربات شما با موفقیت ساخته شد💎
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=Source_Home
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"🏠به صفحه اصلی برگشتیم.
🙏لطفا یکی از گزینه های زیر را انتخاب نمایید.","html","true",$button_official_fa);
  
  $txxt = file_get_contents('administrative/access/robots.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($username_bot,$pmembersid)){
  $aaddd = file_get_contents('administrative/access/robots.txt');
  $aaddd .= $username_bot."\n";
  file_put_contents('administrative/access/robots.txt',$aaddd);
  }
  }
  }
  }
  }
  ////////////////////////////////////
  elseif($command == 'create chatnashenas'){
  if($update->message->forward_from != null){
  $rep = strchr($text,"Use this token to access the http API:");
  $rep = str_replace("Use this token to access the http API:",'',$rep);
  $rep = str_replace("For a description of the Bot API, see this page: https://core.telegram.org/bots/api",'',$rep);
  $rep = str_replace("\n",'',$rep);
  $token = $rep;
  }else{
  $token = $text;
  }
  $userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));
  $resultb = objectToArrays($userbot);
  $username_bot = $resultb["result"]["username"];
  $id_bot = $resultb["result"]["id"];
  $first_bot = $resultb["result"]["first_name"];
  $ok = $resultb["ok"];
  if($ok != 1) {
  SendMessage($chat_id,"دوست عزیز توکن ربات شما نامعتبر است❌
لطفا یک توکن معتبر بفرستید✔️","html","true",$button_back);
  }else{
   
  if($username == null){
  $username = $first;
  }else{
  $username = "@".$username;
  }
   
  if(file_exists("Bot/$username_bot")){
  $pmtext = "{✅ ربات آپدیت شد توسط 👈 ($username)}{🤖 ربات مربوطه 👈 (@$username_bot)}{⏰ زمان 👈 ($time)}{📅 تاریخ 👈 ($date)}";
  $msgid = json_decode(file_get_contents('https://api.telegram.org/botتوکن/sendMessage?parse_mode=HTML&chat_id=-1001129835882&text='.$pmtext));
  $msg_id = $msgid->result->message_id;
  save('administrative/user/'.$from_id."/command.txt","none");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
  save("Bot/$username_bot/uzerbot.txt","$username_bot");
  $class = file_get_contents("administrative/source/Chatnashenas/index.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/index.php",$class); 
    $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز هوشمند 
  @Source_Home 
 بروزرسانی شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://Fonix.com/Bot/$username_bot/index.php");
  
  SendMessage($chat_id,"ربات شما با موفقیت آپدیت شد♻️
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=Source_Home
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"🏠به صفحه اصلی برگشتیم.
🙏لطفا یکی از گزینه های زیر را انتخاب نمایید.","html","true",$button_official_fa);
  }else{
   
   if($create == 'true' and $from_id != $admin){
    save('administrative/user/'.$from_id."/command.txt","none");
  SendMessage($chat_id,"🌹دوست عزیز متاسفانه شما قبلا یک ربات ساخته اید و نمیتوانید بیشتر از یک ربات بسازید❌
جهت ساخت ربات بیشتر روی دکمه (🤖ربات دوم و ویژه کردن رایگان🔱) کلیک کنید.","html","true",$button_official_fa);
  }else{
   
  $pmtext = "{✅ ربات ساخته شد توسط 👈 ($username)}{🤖 ربات مربوطه 👈 (@$username_bot)}{⏰ زمان 👈 ($time)}{📅 تاریخ 👈 ($date)}";
  $msgid = json_decode(file_get_contents('https://api.telegram.org/botتوکن/sendMessage?parse_mode=HTML&chat_id=-1001129835882&text='.$pmtext));
  $msg_id = $msgid->result->message_id;
  save('administrative/user/'.$from_id."/command.txt","none");
  save('administrative/user/'.$from_id."/create.txt","$username_bot");
  mkdir("Bot/$username_bot");
mkdir("Bot/$username_bot/data");
mkdir("Bot/$username_bot/user");
save("Bot/$username_bot/uzerbot.txt","$username_bot");
save("Bot/$username_bot/data/txvvip.txt","🤖Create Your Robot😃
🤖ربات خود را بسازید😃👇
🆔 @Source_Home
✊️با سرور قوی و پرسرعت💪");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
 $class = file_get_contents("administrative/source/Chatnashenas/index.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/index.php",$class); 
  $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز هوشمند 
  @Source_Home 
 متصل شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://Fonix.com/Bot/$username_bot/index.php");
  SendMessage($chat_id,"ربات شما با موفقیت ساخته شد💎
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=Source_Home
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"🏠به صفحه اصلی برگشتیم.
🙏لطفا یکی از گزینه های زیر را انتخاب نمایید.","html","true",$button_official_fa);
  
  $txxt = file_get_contents('administrative/access/robots.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($username_bot,$pmembersid)){
  $aaddd = file_get_contents('administrative/access/robots.txt');
  $aaddd .= $username_bot."\n";
  file_put_contents('administrative/access/robots.txt',$aaddd);
  }
  }
  }
  }
  }
  ////////////////////////////////////
  elseif($command == 'create zedelink'){
  if($update->message->forward_from != null){
  $rep = strchr($text,"Use this token to access the http API:");
  $rep = str_replace("Use this token to access the http API:",'',$rep);
  $rep = str_replace("For a description of the Bot API, see this page: https://core.telegram.org/bots/api",'',$rep);
  $rep = str_replace("\n",'',$rep);
  $token = $rep;
  }else{
  $token = $text;
  }
  $userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));
  $resultb = objectToArrays($userbot);
  $username_bot = $resultb["result"]["username"];
  $id_bot = $resultb["result"]["id"];
  $first_bot = $resultb["result"]["first_name"];
  $ok = $resultb["ok"];
  if($ok != 1) {
  SendMessage($chat_id,"دوست عزیز توکن ربات شما نامعتبر است❌
لطفا یک توکن معتبر بفرستید✔️","html","true",$button_back);
  }else{
   
  if($username == null){
  $username = $first;
  }else{
  $username = "@".$username;
  }
   
  if(file_exists("Bot/$username_bot")){
  $pmtext = "{✅ ربات آپدیت شد توسط 👈 ($username)}{🤖 ربات مربوطه 👈 (@$username_bot)}{⏰ زمان 👈 ($time)}{📅 تاریخ 👈 ($date)}";
  $msgid = json_decode(file_get_contents('https://api.telegram.org/botتوکن/sendMessage?parse_mode=HTML&chat_id=-1001129835882&text='.$pmtext));
  $msg_id = $msgid->result->message_id;
  save('administrative/user/'.$from_id."/command.txt","none");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
  $class = file_get_contents("administrative/source/zeee/Class.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
$class = str_replace("[*[idbot]*]",$username_bot,$class);
  save("Bot/$username_bot/Class.php",$class); 
    $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز هوشمند 
  @Source_Home 
 بروزرسانی شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://Fonix.com/Bot/$username_bot/Class.php");
  
  SendMessage($chat_id,"ربات شما با موفقیت آپدیت شد♻️
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=Source_Home
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"🏠به صفحه اصلی برگشتیم.
🙏لطفا یکی از گزینه های زیر را انتخاب نمایید.","html","true",$button_official_fa);
  }else{
   
   if($create == 'true' and $from_id != $admin){
    save('administrative/user/'.$from_id."/command.txt","none");
  SendMessage($chat_id,"🌹دوست عزیز متاسفانه شما قبلا یک ربات ساخته اید و نمیتوانید بیشتر از یک ربات بسازید❌
جهت ساخت ربات بیشتر روی دکمه (🤖ربات دوم و ویژه کردن رایگان🔱) کلیک کنید.","html","true",$button_official_fa);
  }else{
   
  $pmtext = "{✅ ربات ساخته شد توسط 👈 ($username)}{🤖 ربات مربوطه 👈 (@$username_bot)}{⏰ زمان 👈 ($time)}{📅 تاریخ 👈 ($date)}";
  $msgid = json_decode(file_get_contents('https://api.telegram.org/botتوکن/sendMessage?parse_mode=HTML&chat_id=-1001129835882&text='.$pmtext));
  $msg_id = $msgid->result->message_id;
  save('administrative/user/'.$from_id."/command.txt","none");
  save('administrative/user/'.$from_id."/create.txt","$username_bot");
  mkdir("Bot/$username_bot");
mkdir("Bot/$username_bot/data");
save("Bot/$username_bot/data/txvvip.txt","🤖Create Your Robot😃
🤖ربات خود را بسازید😃👇
🆔 @Source_Home
✊️با سرور قوی و پرسرعت💪");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
 $class = file_get_contents("administrative/source/zeee/Class.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
$class = str_replace("[*[idbot]*]",$username_bot,$class);
  save("Bot/$username_bot/Class.php",$class); 
$claaas = file_get_contents("administrative/source/zeee/index.php");
save("Bot/$username_bot/index.php",$claaas); 
  $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز هوشمند 
  @Source_Home 
 متصل شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://Fonix.com/Bot/$username_bot/Class.php");
  SendMessage($chat_id,"ربات شما با موفقیت ساخته شد💎
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=Source_Home
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"🏠به صفحه اصلی برگشتیم.
🙏لطفا یکی از گزینه های زیر را انتخاب نمایید.","html","true",$button_official_fa);
  
  $txxt = file_get_contents('administrative/access/robots.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($username_bot,$pmembersid)){
  $aaddd = file_get_contents('administrative/access/robots.txt');
  $aaddd .= $username_bot."\n";
  file_put_contents('administrative/access/robots.txt',$aaddd);
  }
  }
  }
  }
  }
  ////////////////////////////////////
  elseif($command == 'create banerr'){
  if($update->message->forward_from != null){
  $rep = strchr($text,"Use this token to access the http API:");
  $rep = str_replace("Use this token to access the http API:",'',$rep);
  $rep = str_replace("For a description of the Bot API, see this page: https://core.telegram.org/bots/api",'',$rep);
  $rep = str_replace("\n",'',$rep);
  $token = $rep;
  }else{
  $token = $text;
  }
  $userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));
  $resultb = objectToArrays($userbot);
  $username_bot = $resultb["result"]["username"];
  $id_bot = $resultb["result"]["id"];
  $first_bot = $resultb["result"]["first_name"];
  $ok = $resultb["ok"];
  if($ok != 1) {
  SendMessage($chat_id,"دوست عزیز توکن ربات شما نامعتبر است❌
لطفا یک توکن معتبر بفرستید✔️","html","true",$button_back);
  }else{
   
  if($username == null){
  $username = $first;
  }else{
  $username = "@".$username;
  }
   
  if(file_exists("Bot/$username_bot")){
  $pmtext = "{✅ ربات آپدیت شد توسط 👈 ($username)}{🤖 ربات مربوطه 👈 (@$username_bot)}{⏰ زمان 👈 ($time)}{📅 تاریخ 👈 ($date)}";
  $msgid = json_decode(file_get_contents('https://api.telegram.org/botتوکن/sendMessage?parse_mode=HTML&chat_id=-1001129835882&text='.$pmtext));
  $msg_id = $msgid->result->message_id;
  save('administrative/user/'.$from_id."/command.txt","none");
  $class = file_get_contents("administrative/source/baner/Class.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/Class.php",$class); 
$claaas = file_get_contents("administrative/source/baner/index.php");
save("Bot/$username_bot/index.php",$claaas); 
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
    $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز هوشمند 
  @Source_Home 
 بروزرسانی شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://Fonix.com/Bot/$username_bot/Class.php");
  
  SendMessage($chat_id,"ربات شما با موفقیت آپدیت شد♻️
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=Source_Home
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"🏠به صفحه اصلی برگشتیم.
🙏لطفا یکی از گزینه های زیر را انتخاب نمایید.","html","true",$button_official_fa);
  }else{
   
   if($create == 'true' and $from_id != $admin){
    save('administrative/user/'.$from_id."/command.txt","none");
  SendMessage($chat_id,"🌹دوست عزیز متاسفانه شما قبلا یک ربات ساخته اید و نمیتوانید بیشتر از یک ربات بسازید❌
جهت ساخت ربات بیشتر روی دکمه (🤖ربات دوم و ویژه کردن رایگان🔱) کلیک کنید.","html","true",$button_official_fa);
  }else{
   
  $pmtext = "{✅ ربات ساخته شد توسط 👈 ($username)}{🤖 ربات مربوطه 👈 (@$username_bot)}{⏰ زمان 👈 ($time)}{📅 تاریخ 👈 ($date)}";
  $msgid = json_decode(file_get_contents('https://api.telegram.org/botتوکن/sendMessage?parse_mode=HTML&chat_id=-1001129835882&text='.$pmtext));
  $msg_id = $msgid->result->message_id;
  save('administrative/user/'.$from_id."/command.txt","none");
  save('administrative/user/'.$from_id."/create.txt","$username_bot");
  mkdir("Bot/$username_bot");
mkdir("Bot/$username_bot/data");
mkdir("Bot/$username_bot/user");
save("Bot/$username_bot/data/txvvip.txt","🤖Create Your Robot😃
🤖ربات خود را بسازید😃👇
🆔 @Source_Home
✊️با سرور قوی و پرسرعت💪");
save("Bot/$username_bot/bot_type_ads.txt","free");
save("Bot/$username_bot/starttxt.txt","سلام خوش اومدی");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
 $class = file_get_contents("administrative/source/baner/Class.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/Class.php",$class); 
$claaas = file_get_contents("administrative/source/baner/index.php");
save("Bot/$username_bot/index.php",$claaas); 
  $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز هوشمند 
  @Source_Home 
 متصل شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://Fonix.com/Bot/$username_bot/Class.php");
  SendMessage($chat_id,"ربات شما با موفقیت ساخته شد💎
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=Source_Home
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"🏠به صفحه اصلی برگشتیم.
🙏لطفا یکی از گزینه های زیر را انتخاب نمایید.","html","true",$button_official_fa);
  
  $txxt = file_get_contents('administrative/access/robots.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($username_bot,$pmembersid)){
  $aaddd = file_get_contents('administrative/access/robots.txt');
  $aaddd .= $username_bot."\n";
  file_put_contents('administrative/access/robots.txt',$aaddd);
  }
  }
  }
  }
  }
  ////////////////////////////////////
  elseif($command == 'create shopsaz'){
  if($update->message->forward_from != null){
  $rep = strchr($text,"Use this token to access the http API:");
  $rep = str_replace("Use this token to access the http API:",'',$rep);
  $rep = str_replace("For a description of the Bot API, see this page: https://core.telegram.org/bots/api",'',$rep);
  $rep = str_replace("\n",'',$rep);
  $token = $rep;
  }else{
  $token = $text;
  }
  $userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));
  $resultb = objectToArrays($userbot);
  $username_bot = $resultb["result"]["username"];
  $id_bot = $resultb["result"]["id"];
  $first_bot = $resultb["result"]["first_name"];
  $ok = $resultb["ok"];
  if($ok != 1) {
  SendMessage($chat_id,"دوست عزیز توکن ربات شما نامعتبر است❌
لطفا یک توکن معتبر بفرستید✔️","html","true",$button_back);
  }else{
   
  if($username == null){
  $username = $first;
  }else{
  $username = "@".$username;
  }
   
  if(file_exists("Bot/$username_bot")){
  $pmtext = "{✅ ربات آپدیت شد توسط 👈 ($username)}{🤖 ربات مربوطه 👈 (@$username_bot)}{⏰ زمان 👈 ($time)}{📅 تاریخ 👈 ($date)}";
  $msgid = json_decode(file_get_contents('https://api.telegram.org/botتوکن/sendMessage?parse_mode=HTML&chat_id=-1001129835882&text='.$pmtext));
  $msg_id = $msgid->result->message_id;
  save('administrative/user/'.$from_id."/command.txt","none");
  $class = file_get_contents("administrative/source/shopsaz/Class.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/Class.php",$class); 
$claaas = file_get_contents("administrative/source/shopsaz/index.php");
save("Bot/$username_bot/bot/index.php",$claaas); 
$claaasss = file_get_contents("administrative/source/shopsaz/indexvip.php");
save("Bot/$username_bot/bot/indexvip.php",$claaasss); 
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
    $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز هوشمند 
  @Source_Home 
 بروزرسانی شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://Fonix.com/Bot/$username_bot/Class.php");
  
  SendMessage($chat_id,"ربات شما با موفقیت آپدیت شد♻️
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=Source_Home
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"🏠به صفحه اصلی برگشتیم.
🙏لطفا یکی از گزینه های زیر را انتخاب نمایید.","html","true",$button_official_fa);
  }else{
   
   if($create == 'true' and $from_id != $admin){
    save('administrative/user/'.$from_id."/command.txt","none");
  SendMessage($chat_id,"🌹دوست عزیز متاسفانه شما قبلا یک ربات ساخته اید و نمیتوانید بیشتر از یک ربات بسازید❌
جهت ساخت ربات بیشتر روی دکمه (🤖ربات دوم و ویژه کردن رایگان🔱) کلیک کنید.","html","true",$button_official_fa);
  }else{
   
  $pmtext = "{✅ ربات ساخته شد توسط 👈 ($username)}{🤖 ربات مربوطه 👈 (@$username_bot)}{⏰ زمان 👈 ($time)}{📅 تاریخ 👈 ($date)}";
  $msgid = json_decode(file_get_contents('https://api.telegram.org/botتوکن/sendMessage?parse_mode=HTML&chat_id=-1001129835882&text='.$pmtext));
  $msg_id = $msgid->result->message_id;
  save('administrative/user/'.$from_id."/command.txt","none");
  save('administrative/user/'.$from_id."/create.txt","$username_bot");
  mkdir("Bot/$username_bot");
mkdir("Bot/$username_bot/data");
mkdir("Bot/$username_bot/bots");
mkdir("Bot/$username_bot/bot");
save("Bot/$username_bot/data/txvvip.txt","🤖Create Your Robot😃
🤖ربات خود را بسازید😃👇
🆔 @Source_Home
✊️با سرور قوی و پرسرعت💪");
save("Bot/$username_bot/startt.txt","سلام خوش اومدی");
save("Bot/$username_bot/uzernameebot.txt","$username_bot");
save("Bot/$username_bot/botttype.txt");
save("Bot/$username_bot/booleans.txt");
save("Bot/$username_bot/banlist.txt");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
 $class = file_get_contents("administrative/source/shopsaz/Class.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/Class.php",$class); 
$claaas = file_get_contents("administrative/source/shopsaz/index.php");
save("Bot/$username_bot/bot/index.php",$claaas); 
$claaasss = file_get_contents("administrative/source/shopsaz/indexvip.php");
save("Bot/$username_bot/bot/indexvip.php",$claaasss); 
  $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز هوشمند 
  @Source_Home 
 متصل شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://Fonix.com/Bot/$username_bot/Class.php");
  SendMessage($chat_id,"ربات شما با موفقیت ساخته شد💎
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=Source_Home
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"🏠به صفحه اصلی برگشتیم.
🙏لطفا یکی از گزینه های زیر را انتخاب نمایید.","html","true",$button_official_fa);
  
  $txxt = file_get_contents('administrative/access/robots.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($username_bot,$pmembersid)){
  $aaddd = file_get_contents('administrative/access/robots.txt');
  $aaddd .= $username_bot."\n";
  file_put_contents('administrative/access/robots.txt',$aaddd);
  }
  }
  }
  }
  }
  ////////////////////////////////////
  elseif($command == 'create aksnevesh'){
  if($update->message->forward_from != null){
  $rep = strchr($text,"Use this token to access the http API:");
  $rep = str_replace("Use this token to access the http API:",'',$rep);
  $rep = str_replace("For a description of the Bot API, see this page: https://core.telegram.org/bots/api",'',$rep);
  $rep = str_replace("\n",'',$rep);
  $token = $rep;
  }else{
  $token = $text;
  }
  $userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));
  $resultb = objectToArrays($userbot);
  $username_bot = $resultb["result"]["username"];
  $id_bot = $resultb["result"]["id"];
  $first_bot = $resultb["result"]["first_name"];
  $ok = $resultb["ok"];
  if($ok != 1) {
  SendMessage($chat_id,"دوست عزیز توکن ربات شما نامعتبر است❌
لطفا یک توکن معتبر بفرستید✔️","html","true",$button_back);
  }else{
   
  if($username == null){
  $username = $first;
  }else{
  $username = "@".$username;
  }
   
  if(file_exists("Bot/$username_bot")){
  $pmtext = "{✅ ربات آپدیت شد توسط 👈 ($username)}{🤖 ربات مربوطه 👈 (@$username_bot)}{⏰ زمان 👈 ($time)}{📅 تاریخ 👈 ($date)}";
  $msgid = json_decode(file_get_contents('https://api.telegram.org/botتوکن/sendMessage?parse_mode=HTML&chat_id=-1001129835882&text='.$pmtext));
  $msg_id = $msgid->result->message_id;
  save('administrative/user/'.$from_id."/command.txt","none");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
    $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز هوشمند 
  @Source_Home 
 بروزرسانی شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://Fonix.com/Bot/$username_bot/Class.php");
  
  SendMessage($chat_id,"ربات شما با موفقیت آپدیت شد♻️
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=Source_Home
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"🏠به صفحه اصلی برگشتیم.
🙏لطفا یکی از گزینه های زیر را انتخاب نمایید.","html","true",$button_official_fa);
  }else{
   
   if($create == 'true' and $from_id != $admin){
    save('administrative/user/'.$from_id."/command.txt","none");
  SendMessage($chat_id,"🌹دوست عزیز متاسفانه شما قبلا یک ربات ساخته اید و نمیتوانید بیشتر از یک ربات بسازید❌
جهت ساخت ربات بیشتر روی دکمه (🤖ربات دوم و ویژه کردن رایگان🔱) کلیک کنید.","html","true",$button_official_fa);
  }else{
   
  $pmtext = "{✅ ربات ساخته شد توسط 👈 ($username)}{🤖 ربات مربوطه 👈 (@$username_bot)}{⏰ زمان 👈 ($time)}{📅 تاریخ 👈 ($date)}";
  $msgid = json_decode(file_get_contents('https://api.telegram.org/botتوکن/sendMessage?parse_mode=HTML&chat_id=-1001129835882&text='.$pmtext));
  $msg_id = $msgid->result->message_id;
  save('administrative/user/'.$from_id."/command.txt","none");
  save('administrative/user/'.$from_id."/create.txt","$username_bot");
  mkdir("Bot/$username_bot");
mkdir("Bot/$username_bot/data");
save("Bot/$username_bot/data/txvvip.txt","🤖Create Your Robot😃
🤖ربات خود را بسازید😃👇
🆔 @Source_Home
✊️با سرور قوی و پرسرعت💪");
save("Bot/$username_bot/starttxt.txt","سلام خوش اومدی");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
 $class = file_get_contents("administrative/source/aksneveshte/Class.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
  $class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/Class.php",$class); 
$claaas = file_get_contents("administrative/source/aksneveshte/index.php");
save("Bot/$username_bot/index.php",$claaas); 
  $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز هوشمند 
  @Source_Home 
 متصل شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://Fonix.com/Bot/$username_bot/Class.php");
  SendMessage($chat_id,"ربات شما با موفقیت ساخته شد💎
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=Source_Home
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"🏠به صفحه اصلی برگشتیم.
🙏لطفا یکی از گزینه های زیر را انتخاب نمایید.","html","true",$button_official_fa);
  
  $txxt = file_get_contents('administrative/access/robots.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($username_bot,$pmembersid)){
  $aaddd = file_get_contents('administrative/access/robots.txt');
  $aaddd .= $username_bot."\n";
  file_put_contents('administrative/access/robots.txt',$aaddd);
  }
  }
  }
  }
  }
  ////////////////////////////////////
  elseif($command == 'create editename'){
  if($update->message->forward_from != null){
  $rep = strchr($text,"Use this token to access the http API:");
  $rep = str_replace("Use this token to access the http API:",'',$rep);
  $rep = str_replace("For a description of the Bot API, see this page: https://core.telegram.org/bots/api",'',$rep);
  $rep = str_replace("\n",'',$rep);
  $token = $rep;
  }else{
  $token = $text;
  }
  $userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));
  $resultb = objectToArrays($userbot);
  $username_bot = $resultb["result"]["username"];
  $id_bot = $resultb["result"]["id"];
  $first_bot = $resultb["result"]["first_name"];
  $ok = $resultb["ok"];
  if($ok != 1) {
  SendMessage($chat_id,"دوست عزیز توکن ربات شما نامعتبر است❌
لطفا یک توکن معتبر بفرستید✔️","html","true",$button_back);
  }else{
   
  if($username == null){
  $username = $first;
  }else{
  $username = "@".$username;
  }
   
  if(file_exists("Bot/$username_bot")){
  $pmtext = "{✅ ربات آپدیت شد توسط 👈 ($username)}{🤖 ربات مربوطه 👈 (@$username_bot)}{⏰ زمان 👈 ($time)}{📅 تاریخ 👈 ($date)}";
  $msgid = json_decode(file_get_contents('https://api.telegram.org/botتوکن/sendMessage?parse_mode=HTML&chat_id=-1001129835882&text='.$pmtext));
  $msg_id = $msgid->result->message_id;
  save('administrative/user/'.$from_id."/command.txt","none");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
    $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز هوشمند 
  @Source_Home 
 بروزرسانی شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://Fonix.com/Bot/$username_bot/Class.php");
  
  SendMessage($chat_id,"ربات شما با موفقیت آپدیت شد♻️
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=Source_Home
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"🏠به صفحه اصلی برگشتیم.
🙏لطفا یکی از گزینه های زیر را انتخاب نمایید.","html","true",$button_official_fa);
  }else{
   
   if($create == 'true' and $from_id != $admin){
    save('administrative/user/'.$from_id."/command.txt","none");
  SendMessage($chat_id,"🌹دوست عزیز متاسفانه شما قبلا یک ربات ساخته اید و نمیتوانید بیشتر از یک ربات بسازید❌
جهت ساخت ربات بیشتر روی دکمه (🤖ربات دوم و ویژه کردن رایگان🔱) کلیک کنید.","html","true",$button_official_fa);
  }else{
   
  $pmtext = "{✅ ربات ساخته شد توسط 👈 ($username)}{🤖 ربات مربوطه 👈 (@$username_bot)}{⏰ زمان 👈 ($time)}{📅 تاریخ 👈 ($date)}";
  $msgid = json_decode(file_get_contents('https://api.telegram.org/botتوکن/sendMessage?parse_mode=HTML&chat_id=-1001129835882&text='.$pmtext));
  $msg_id = $msgid->result->message_id;
  save('administrative/user/'.$from_id."/command.txt","none");
  save('administrative/user/'.$from_id."/create.txt","$username_bot");
  mkdir("Bot/$username_bot");
mkdir("Bot/$username_bot/data");
save("Bot/$username_bot/data/txvvip.txt","🤖Create Your Robot😃
🤖ربات خود را بسازید😃👇
🆔 @Source_Home
✊️با سرور قوی و پرسرعت💪");
save("Bot/$username_bot/data/start.txt","سلام خوش اومدی");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
 $class = file_get_contents("administrative/source/editename/Class.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
  $class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/Class.php",$class); 
$claaas = file_get_contents("administrative/source/editename/index.php");
save("Bot/$username_bot/index.php",$claaas); 
  $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز هوشمند 
  @Source_Home 
 متصل شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://Fonix.com/Bot/$username_bot/Class.php");
  SendMessage($chat_id,"ربات شما با موفقیت ساخته شد💎
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=Source_Home
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"🏠به صفحه اصلی برگشتیم.
🙏لطفا یکی از گزینه های زیر را انتخاب نمایید.","html","true",$button_official_fa);
  
  $txxt = file_get_contents('administrative/access/robots.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($username_bot,$pmembersid)){
  $aaddd = file_get_contents('administrative/access/robots.txt');
  $aaddd .= $username_bot."\n";
  file_put_contents('administrative/access/robots.txt',$aaddd);
  }
  }
  }
  }
  }
  ////////////////////////////////////
  elseif($command == 'create tbligcho'){
  if($update->message->forward_from != null){
  $rep = strchr($text,"Use this token to access the http API:");
  $rep = str_replace("Use this token to access the http API:",'',$rep);
  $rep = str_replace("For a description of the Bot API, see this page: https://core.telegram.org/bots/api",'',$rep);
  $rep = str_replace("\n",'',$rep);
  $token = $rep;
  }else{
  $token = $text;
  }
  $userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));
  $resultb = objectToArrays($userbot);
  $username_bot = $resultb["result"]["username"];
  $id_bot = $resultb["result"]["id"];
  $first_bot = $resultb["result"]["first_name"];
  $ok = $resultb["ok"];
  if($ok != 1) {
  SendMessage($chat_id,"دوست عزیز توکن ربات شما نامعتبر است❌
لطفا یک توکن معتبر بفرستید✔️","html","true",$button_back);
  }else{
   
  if($username == null){
  $username = $first;
  }else{
  $username = "@".$username;
  }
   
  if(file_exists("Bot/$username_bot")){
  $pmtext = "{✅ ربات آپدیت شد توسط 👈 ($username)}{🤖 ربات مربوطه 👈 (@$username_bot)}{⏰ زمان 👈 ($time)}{📅 تاریخ 👈 ($date)}";
  $msgid = json_decode(file_get_contents('https://api.telegram.org/botتوکن/sendMessage?parse_mode=HTML&chat_id=-1001129835882&text='.$pmtext));
  $msg_id = $msgid->result->message_id;
  save('administrative/user/'.$from_id."/command.txt","none");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
  $class = file_get_contents("administrative/source/tab/Class.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
  $class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/Class.php",$class); 
$claaas = file_get_contents("administrative/source/tab/index.php");
save("Bot/$username_bot/index.php",$claaas); 
    $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز هوشمند 
  @Source_Home 
 بروزرسانی شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://Fonix.com/Bot/$username_bot/Class.php");
  
  SendMessage($chat_id,"ربات شما با موفقیت آپدیت شد♻️
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=Source_Home
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"🏠به صفحه اصلی برگشتیم.
🙏لطفا یکی از گزینه های زیر را انتخاب نمایید.","html","true",$button_official_fa);
  }else{
   
   if($create == 'true' and $from_id != $admin){
    save('administrative/user/'.$from_id."/command.txt","none");
  SendMessage($chat_id,"🌹دوست عزیز متاسفانه شما قبلا یک ربات ساخته اید و نمیتوانید بیشتر از یک ربات بسازید❌
جهت ساخت ربات بیشتر روی دکمه (🤖ربات دوم و ویژه کردن رایگان🔱) کلیک کنید.","html","true",$button_official_fa);
  }else{
   
  $pmtext = "{✅ ربات ساخته شد توسط 👈 ($username)}{🤖 ربات مربوطه 👈 (@$username_bot)}{⏰ زمان 👈 ($time)}{📅 تاریخ 👈 ($date)}";
  $msgid = json_decode(file_get_contents('https://api.telegram.org/botتوکن/sendMessage?parse_mode=HTML&chat_id=-1001129835882&text='.$pmtext));
  $msg_id = $msgid->result->message_id;
  save('administrative/user/'.$from_id."/command.txt","none");
  save('administrative/user/'.$from_id."/create.txt","$username_bot");
  mkdir("Bot/$username_bot");
mkdir("Bot/$username_bot/data");
mkdir("Bot/$username_bot/user");
mkdir("Bot/$username_bot/admin");
mkdir("Bot/$username_bot/user/$from_id");
save("Bot/$username_bot/admin/start.txt","سلام خوش اومدی");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
 $class = file_get_contents("administrative/source/tab/Class.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
  $class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/Class.php",$class); 
$claaas = file_get_contents("administrative/source/tab/index.php");
save("Bot/$username_bot/index.php",$claaas); 
  $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز هوشمند 
  @Source_Home 
 متصل شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://Fonix.com/Bot/$username_bot/Class.php");
  SendMessage($chat_id,"ربات شما با موفقیت ساخته شد💎
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=Source_Home
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"🏠به صفحه اصلی برگشتیم.
🙏لطفا یکی از گزینه های زیر را انتخاب نمایید.","html","true",$button_official_fa);
  
  $txxt = file_get_contents('administrative/access/robots.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($username_bot,$pmembersid)){
  $aaddd = file_get_contents('administrative/access/robots.txt');
  $aaddd .= $username_bot."\n";
  file_put_contents('administrative/access/robots.txt',$aaddd);
  }
  }
  }
  }
  }
  ////////////////////////////////////
  elseif($command == 'create tst'){
  if($update->message->forward_from != null){
  $rep = strchr($text,"Use this token to access the http API:");
  $rep = str_replace("Use this token to access the http API:",'',$rep);
  $rep = str_replace("For a description of the Bot API, see this page: https://core.telegram.org/bots/api",'',$rep);
  $rep = str_replace("\n",'',$rep);
  $token = $rep;
  }else{
  $token = $text;
  }
  $userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));
  $resultb = objectToArrays($userbot);
  $username_bot = $resultb["result"]["username"];
  $id_bot = $resultb["result"]["id"];
  $first_bot = $resultb["result"]["first_name"];
  $ok = $resultb["ok"];
  if($ok != 1) {
  SendMessage($chat_id,"دوست عزیز توکن ربات شما نامعتبر است❌
لطفا یک توکن معتبر بفرستید✔️","html","true",$button_back);
  }else{
   
  if($username == null){
  $username = $first;
  }else{
  $username = "@".$username;
  }
   
  if(file_exists("Bot/$username_bot")){
  $pmtext = "{✅ ربات آپدیت شد توسط 👈 ($username)}{🤖 ربات مربوطه 👈 (@$username_bot)}{⏰ زمان 👈 ($time)}{📅 تاریخ 👈 ($date)}";
  $msgid = json_decode(file_get_contents('https://api.telegram.org/botتوکن/sendMessage?parse_mode=HTML&chat_id=-1001129835882&text='.$pmtext));
  $msg_id = $msgid->result->message_id;
  save('administrative/user/'.$from_id."/command.txt","none");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
  $clslass = file_get_contents("administrative/source/see/Class.php");
  $clslass = str_replace("[*[TOKEN]*]",$token,$clslass);
$clslass = str_replace("[*[ADMIN]*]",$from_id,$clslass);
  save("Bot/$username_bot/Class.php",$clslass);
    $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز هوشمند 
  @Source_Home 
 بروزرسانی شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://Fonix.com/Bot/$username_bot/Class.php");
  
  SendMessage($chat_id,"ربات شما با موفقیت آپدیت شد♻️
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=Source_Home
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"🏠به صفحه اصلی برگشتیم.
🙏لطفا یکی از گزینه های زیر را انتخاب نمایید.","html","true",$button_official_fa);
  }else{
   
   if($create == 'true' and $from_id != $admin){
    save('administrative/user/'.$from_id."/command.txt","none");
  SendMessage($chat_id,"🌹دوست عزیز متاسفانه شما قبلا یک ربات ساخته اید و نمیتوانید بیشتر از یک ربات بسازید❌
جهت ساخت ربات بیشتر روی دکمه (🤖ربات دوم و ویژه کردن رایگان🔱) کلیک کنید.","html","true",$button_official_fa);
  }else{
   
  $pmtext = "{✅ ربات ساخته شد توسط 👈 ($username)}{🤖 ربات مربوطه 👈 (@$username_bot)}{⏰ زمان 👈 ($time)}{📅 تاریخ 👈 ($date)}";
  $msgid = json_decode(file_get_contents('https://api.telegram.org/botتوکن/sendMessage?parse_mode=HTML&chat_id=-1001129835882&text='.$pmtext));
  $msg_id = $msgid->result->message_id;
  save('administrative/user/'.$from_id."/command.txt","none");
  save('administrative/user/'.$from_id."/create.txt","$username_bot");
  mkdir("Bot/$username_bot");
mkdir("Bot/$username_bot/ads");
mkdir("Bot/$username_bot/cod");
mkdir("Bot/$username_bot/data");
mkdir("Bot/$username_bot/ads/admin");
mkdir("Bot/$username_bot/ads/cont");
mkdir("Bot/$username_bot/ads/date");
mkdir("Bot/$username_bot/ads/seen");
mkdir("Bot/$username_bot/ads/time");
mkdir("Bot/$username_bot/ads/user");
save("Bot/$username_bot/data/bottype.txt","o");
save("Bot/$username_bot/data/buy.txt","$from_id");
save("Bot/$username_bot/data/starttx.txt","سلام خوش اومدی");
save("Bot/$username_bot/data/setcoin2.txt","10");
save("Bot/$username_bot/data/setcoin.txt","1");
save("Bot/$username_bot/data/uzernamo.txt","$username_bot");
save("Bot/$username_bot/data/txvvip.txt","🤖Create Your Robot😃
🤖ربات خود را بسازید😃👇
🆔 @Source_Home
✊️با سرور قوی و پرسرعت💪");
save("Bot/$username_bot/data/coinruz.txt","10");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
 $class = file_get_contents("administrative/source/see/Class.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
$class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/Class.php",$class); 
$claaas = file_get_contents("administrative/source/see/index.php");
save("Bot/$username_bot/index.php",$claaas); 
$claaass = file_get_contents("administrative/source/see/jdf.php");
save("Bot/$username_bot/jdf.php",$claaass); 
  $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز هوشمند 
  @Source_Home 
 متصل شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://Fonix.com/Bot/$username_bot/Class.php");
  SendMessage($chat_id,"ربات شما با موفقیت ساخته شد💎
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=Source_Home
برای رفتن به پنل مدیریت در ربات دستور /panel را ارسال کنید✔️
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"🏠به صفحه اصلی برگشتیم.
🙏لطفا یکی از گزینه های زیر را انتخاب نمایید.","html","true",$button_official_fa);
  
  $txxt = file_get_contents('administrative/access/robots.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($username_bot,$pmembersid)){
  $aaddd = file_get_contents('administrative/access/robots.txt');
  $aaddd .= $username_bot."\n";
  file_put_contents('administrative/access/robots.txt',$aaddd);
  }
  }
  }
  }
  }
  ////////////////////////////////////
  elseif($command == 'create botpv'){
  if($update->message->forward_from != null){
  $rep = strchr($text,"Use this token to access the http API:");
  $rep = str_replace("Use this token to access the http API:",'',$rep);
  $rep = str_replace("For a description of the Bot API, see this page: https://core.telegram.org/bots/api",'',$rep);
  $rep = str_replace("\n",'',$rep);
  $token = $rep;
  }else{
  $token = $text;
  }
  $userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));
  $resultb = objectToArrays($userbot);
  $username_bot = $resultb["result"]["username"];
  $id_bot = $resultb["result"]["id"];
  $first_bot = $resultb["result"]["first_name"];
  $ok = $resultb["ok"];
  if($ok != 1) {
  SendMessage($chat_id,"دوست عزیز توکن ربات شما نامعتبر است❌
لطفا یک توکن معتبر بفرستید✔️","html","true",$button_back);
  }else{
	  
	 if($username == null){
  $username = $first;
  }else{
  $username = "@".$username;
  }
	  
  if(file_exists("Bot/$username_bot")){
  $pmtext = "{✅ ربات آپدیت شد توسط 👈 ($username)}{🤖 ربات مربوطه 👈 (@$username_bot)}{⏰ زمان 👈 ($time)}{📅 تاریخ 👈 ($date)}";
  $msgid = json_decode(file_get_contents('https://api.telegram.org/botتوکن/sendMessage?parse_mode=HTML&chat_id=-1001129835882&text='.$pmtext));
  $msg_id = $msgid->result->message_id;
  save('administrative/user/'.$from_id."/command.txt","none");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
    $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز هوشمند 
  @Source_Home 
 بروزرسانی شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://Fonix.com/Bot/$username_bot/");
  
  SendMessage($chat_id,"ربات شما با موفقیت آپدیت شد♻️
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=Source_Home
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"🏠به صفحه اصلی برگشتیم.
🙏لطفا یکی از گزینه های زیر را انتخاب نمایید.","html","true",$button_official_fa);
  }else{
	  
	  if($create == 'true' and $from_id != $admin){
		  save('administrative/user/'.$from_id."/command.txt","none");
  SendMessage($chat_id,"🌹دوست عزیز متاسفانه شما قبلا یک ربات ساخته اید و نمیتوانید بیشتر از یک ربات بسازید❌
جهت ساخت ربات بیشتر روی دکمه (🤖ربات دوم و ویژه کردن رایگان🔱) کلیک کنید.","html","true",$button_official_fa);
  }else{
	  
  $pmtext = "{✅ ربات ساخته شد توسط 👈 ($username)}{🤖 ربات مربوطه 👈 (@$username_bot)}{⏰ زمان 👈 ($time)}{📅 تاریخ 👈 ($date)}";
  $msgid = json_decode(file_get_contents('https://api.telegram.org/botتوکن/sendMessage?parse_mode=HTML&chat_id=-1001129835882&text='.$pmtext));
  $msg_id = $msgid->result->message_id;
  save('administrative/user/'.$from_id."/command.txt","none");
  save('administrative/user/'.$from_id."/create.txt","$username_bot");
  mkdir("Bot/$username_bot");
  mkdir("Bot/$username_bot/other");
  mkdir("Bot/$username_bot/data");
  mkdir("Bot/$username_bot/other/$from_id");
  mkdir("Bot/$username_bot/other/access");
  mkdir("Bot/$username_bot/other/button");
  mkdir("Bot/$username_bot/other/profile");
  mkdir("Bot/$username_bot/other/setting");
  mkdir("Bot/$username_bot/other/wordlist");
  mkdir("Bot/$username_bot/other/button/caption");
  mkdir("Bot/$username_bot/other/button/file");
  mkdir("Bot/$username_bot/other/button/forward");
  mkdir("Bot/$username_bot/other/button/music");
  mkdir("Bot/$username_bot/other/button/photo");
  mkdir("Bot/$username_bot/other/button/feed");
  mkdir("Bot/$username_bot/other/button/sticker");
  mkdir("Bot/$username_bot/other/button/text");
  mkdir("Bot/$username_bot/other/button/video");
  mkdir("Bot/$username_bot/other/button/voice");
  save("Bot/$username_bot/other/setting/start.txt","Hi!✋ 
  <b>Welcome To My Bot</b>");
  save("Bot/$username_bot/other/setting/send.txt","<b>Sent To My Admin!</b>");
  save("Bot/$username_bot/other/setting/sticker.txt","✅");
  save("Bot/$username_bot/other/setting/file.txt","✅");
  save("Bot/$username_bot/other/setting/aks.txt","✅");
  save("Bot/$username_bot/other/setting/music.txt","✅");
  save("Bot/$username_bot/other/setting/film.txt","✅");
  save("Bot/$username_bot/other/setting/voice.txt","✅");
  save("Bot/$username_bot/other/setting/join.txt","✅");
  save("Bot/$username_bot/other/setting/link.txt","✅");
  save("Bot/$username_bot/other/setting/forward.txt","✅");
  save("Bot/$username_bot/other/setting/pm_forward.txt","⛔️");
  save("Bot/$username_bot/other/setting/pm_resani.txt","✅");
  save("Bot/$username_bot/other/setting/on-off.txt","true");
  save("Bot/$username_bot/other/setting/profile.txt","✅");
  save("Bot/$username_bot/other/setting/contact.txt","⛔️");
  save("Bot/$username_bot/other/setting/location.txt","⛔️");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
  $class = file_get_contents("administrative/source/Class.php");
  $class = str_replace("[*[TOKEN]*]",$token,$class);
  $class = str_replace("[*[ADMIN]*]",$from_id,$class);
  save("Bot/$username_bot/Class.php",$class);
  $index = file_get_contents("administrative/source/index.php");
  save("Bot/$username_bot/index.php",$index);	
  $butt = file_get_contents("administrative/source/Button.php");
  save("Bot/$username_bot/other/Button.php",$butt);	
  $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز هوشمند 
  @Source_Home 
 متصل شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://Fonix.com/Bot/$username_bot/");
  SendMessage($chat_id,"ربات شما با موفقیت ساخته شد💎
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=Source_Home
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"🏠به صفحه اصلی برگشتیم.
🙏لطفا یکی از گزینه های زیر را انتخاب نمایید.","html","true",$button_official_fa);
  
  $txxt = file_get_contents('administrative/access/robots.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($username_bot,$pmembersid)){
  $aaddd = file_get_contents('administrative/access/robots.txt');
  $aaddd .= $username_bot."\n";
  file_put_contents('administrative/access/robots.txt',$aaddd);
  }
  }
  }
  }
  }
  ////////////////////////////////////
  elseif($command == 'create robotsaz'){
  if($update->message->forward_from != null){
  $rep = strchr($text,"Use this token to access the http API:");
  $rep = str_replace("Use this token to access the http API:",'',$rep);
  $rep = str_replace("For a description of the Bot API, see this page: https://core.telegram.org/bots/api",'',$rep);
  $rep = str_replace("\n",'',$rep);
  $token = $rep;
  }else{
  $token = $text;
  }
  $userbot = json_decode(file_get_contents('https://api.telegram.org/bot'.$token .'/getme'));
  $resultb = objectToArrays($userbot);
  $username_bot = $resultb["result"]["username"];
  $id_bot = $resultb["result"]["id"];
  $first_bot = $resultb["result"]["first_name"];
  $ok = $resultb["ok"];
  if($ok != 1) {
  SendMessage($chat_id,"دوست عزیز توکن ربات شما نامعتبر است❌
لطفا یک توکن معتبر بفرستید✔️","html","true",$button_back);
  }else{
   
  if($username == null){
  $username = $first;
  }else{
  $username = "@".$username;
  }
   
  if(file_exists("Bot/$username_bot")){
  $pmtext = "{✅ ربات آپدیت شد توسط 👈 ($username)}{🤖 ربات مربوطه 👈 (@$username_bot)}{⏰ زمان 👈 ($time)}{📅 تاریخ 👈 ($date)}";
  $msgid = json_decode(file_get_contents('https://api.telegram.org/botتوکن/sendMessage?parse_mode=HTML&chat_id=-1001129835882&text='.$pmtext));
  $msg_id = $msgid->result->message_id;
  save('administrative/user/'.$from_id."/command.txt","none");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
  save("Bot/$username_bot/uzerbot.txt","$username_bot");
   $indexasl = file_get_contents("administrative/source/Robotsaz/index.php");
$indexasl = str_replace("[*[ADMIN]*]",$from_id,$indexasl);
  save("Bot/$username_bot/index.php",$indexasl); 
  $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز هوشمند 
  @Source_Home 
 متصل شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://Fonix.com/Bot/$username_bot/");
  SendMessage($chat_id,"ربات شما با موفقیت ساخته شد💎
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=Source_Home
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"🏠به صفحه اصلی برگشتیم.
🙏لطفا یکی از گزینه های زیر را انتخاب نمایید.","html","true",$button_official_fa);
  }else{
   
   if($create == 'true' and $from_id != $admin){
    save('administrative/user/'.$from_id."/command.txt","none");
  SendMessage($chat_id,"🌹دوست عزیز متاسفانه شما قبلا یک ربات ساخته اید و نمیتوانید بیشتر از یک ربات بسازید❌
جهت ساخت ربات بیشتر روی دکمه (🤖ربات دوم و ویژه کردن رایگان🔱) کلیک کنید.","html","true",$button_official_fa);
  }else{
   
  $pmtext = "{✅ ربات ساخته شد توسط 👈 ($username)}{🤖 ربات مربوطه 👈 (@$username_bot)}{⏰ زمان 👈 ($time)}{📅 تاریخ 👈 ($date)}";
  $msgid = json_decode(file_get_contents('https://api.telegram.org/botتوکن/sendMessage?parse_mode=HTML&chat_id=-1001129835882&text='.$pmtext));
  $msg_id = $msgid->result->message_id;
  save('administrative/user/'.$from_id."/command.txt","none");
  save('administrative/user/'.$from_id."/create.txt","$username_bot");
  mkdir("Bot/$username_bot");
mkdir("Bot/$username_bot/Bot");
mkdir("Bot/$username_bot/administrative");
mkdir("Bot/$username_bot/administrative/access");
mkdir("Bot/$username_bot/administrative/user");
mkdir("Bot/$username_bot/administrative/code");
mkdir("Bot/$username_bot/administrative/banall-member");
mkdir("Bot/$username_bot/administrative/tokensadmins");
mkdir("Bot/$username_bot/administrative/tokensadmins/token");
mkdir("Bot/$username_bot/administrative/tokensadmins/admin");
mkdir("Bot/$username_bot/administrative/source");
mkdir("Bot/$username_bot/administrative/source/tab");
mkdir("Bot/$username_bot/administrative/source/view");
save("Bot/$username_bot/uzerbot.txt","$username_bot");
save("Bot/$username_bot/text_start.txt","به سرویس ربات ساز خوش اومدی");
save("Bot/$username_bot/administrative/access/text_ads_mamol.txt","🤖Create Your Robot Create😃
🤖ربات ساز خود را بسازید😃👇
🆔 @Source_Home
✊️با سرور قوی و پرسرعت💪
✌️و پنلی بسیار پیشرفته😎");
  save("administrative/tokensadmins/token/$username_bot.txt",$token);
  save("administrative/tokensadmins/admin/$username_bot.txt",$from_id);
 $indexasl = file_get_contents("administrative/source/Robotsaz/index.php");
$indexasl = str_replace("[*[ADMIN]*]",$from_id,$indexasl);
  save("Bot/$username_bot/index.php",$indexasl); 
   $indexasl1 = file_get_contents("administrative/source/Robotsaz/Class.php");
   $indexasl1 = str_replace("[*[TOKEN]*]",$token,$indexasl1);
$indexasl1 = str_replace("[*[ADMIN]*]",$from_id,$indexasl1);
  save("Bot/$username_bot/administrative/access/Class.php",$indexasl1); 
   $indexasl2 = file_get_contents("administrative/source/Robotsaz/tab/Class.php");
   save("Bot/$username_bot/administrative/source/tab/Class.php",$indexasl2); 
   $indexasl3 = file_get_contents("administrative/source/Robotsaz/view/Class.php");
   save("Bot/$username_bot/administrative/source/view/Class.php",$indexasl3); 
   $indexasl4 = file_get_contents("administrative/source/Robotsaz/view/index.php");
   save("Bot/$username_bot/administrative/source/view/index.php",$indexasl4); 
      $indexasl5 = file_get_contents("administrative/source/Robotsaz/pm/index.php");
   save("Bot/$username_bot/administrative/source/index.php",$indexasl5); 
         $indexasl6 = file_get_contents("administrative/source/Robotsaz/pm/Class.php");
   save("Bot/$username_bot/administrative/source/Class.php",$indexasl6); 
   $indexasl7 = file_get_contents("administrative/source/Robotsaz/pm/Button.php");
   save("Bot/$username_bot/administrative/source/Button.php",$indexasl7); 
  $textinstalls = "🤖ربات شما با موفقیت به سرور پرسرعت🚀 ربات ساز هوشمند 
  @Source_Home 
 متصل شد♻️
جهت شروع ربات /start را ارسال کنید.";
  file_get_contents("http://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$textinstalls");
  file_get_contents("https://api.telegram.org/bot".$token."/setwebhook?url=https://Fonix.com/Bot/$username_bot/");
  SendMessage($chat_id,"ربات شما با موفقیت ساخته شد💎
🌟🌟🌟🌟🌟به ربات ما امتیاز بدید👇
https://telegram.me/storebot?start=Source_Home
😎جهت ورود به ربات خود کلیک کنید👇","html","true",json_encode(['inline_keyboard'=>[[['text'=>"🚀ورود به ربات🚀",'url'=>"https://telegram.me/$username_bot"]],]]));
  SendMessage($chat_id,"🏠به صفحه اصلی برگشتیم.
🙏لطفا یکی از گزینه های زیر را انتخاب نمایید.","html","true",$button_official_fa);
  
  $txxt = file_get_contents('administrative/access/robots.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($username_bot,$pmembersid)){
  $aaddd = file_get_contents('administrative/access/robots.txt');
  $aaddd .= $username_bot."\n";
  file_put_contents('administrative/access/robots.txt',$aaddd);
  }
  }
  }
  }
  }
  //==========
  // Manage
  elseif($text == '👤مدیریت' and $from_id == $admin){
  save('administrative/user/'.$from_id."/command.txt","none");
  SendMessage($chat_id,"🈸 به بخش ادمین خوش اومدین","html","true",$button_manage);
  }
  elseif ($text == 'افزودن ادمین' and $from_id == $admin){
	  $s = file_get_contents("administrative/admin.txt");
	 save('administrative/user/'.$from_id."/command.txt","addadmin");
	 sendMessage($chat_id,"سلام
	 لطفا ایدی ادمین را بصورت آرایه
	 ,id
	 در فایل 
	 administrative/admin.txt
	 اضافه کنید.
	 و ایدی فرد را اینجا وارد کنید تا من خبر ادمین شدنشو بهش بدم","html","true",$button_back);
  }
  elseif($command == 'addadmin' and $from_id == $admin){
	save('administrative/user/'.$from_id."/command.txt","none");
	save('administrative/admin.txt',"$text");
	sendMessage($chat_id,"فرد موردنظر ادمین شد!");
	sendMessage($text,"تبریک شما ادمین شدید
	لطفا قوانین را رعایت کنید");
  }
  //============
  elseif($text == '☢کد رایگان' and $from_id == $admin){
  save('administrative/user/'.$from_id."/command.txt","cod free");
  SendMessage($chat_id,"☢ کد مورد نظر رو وارد کنید","html","true",$button_back2);
  }
  elseif($command == 'cod free' and $from_id == $admin){
  save("administrative/code/$text.txt","false");
  save("administrative/user/".$from_id."/command.txt","none");
  SendMessage($chat_id,"☢ کد ثبت شد.","html","true",$button_manage);
  SendMessage($kanal,"🎁کد رایگان مخصوص ویژه کردن ربات 
⚜کد یکبار مصرف
➖➖➖➖➖➖➖➖
code : $text
➖➖➖➖➖➖➖➖
❗️روش استفاده:
۱-وارد ربات @Source_Home شوید.
۲-روی گزینه 🎁استفاده از کد🎁 بزنید.
۳-نوع ربات خود را انتخاب کنید.
۴-کد $text را ارسال کنید.
۵-آیدی ربات خود را بدون @ و دقیق ارسال کنید.
تبریک ربات شما ویژه شد✔️
*******************
🆑 @Source_Home
🤖 @Source_Home","html","true");
  }
  //============
  elseif($text == '🅾️اطلاعات'){
  save("other/$from_id/command.txt","set idtaraf");
  SendChatAction($chat_id,"typing");
  SendMessage($chat_id,"<i>🅾️ ایدی عددی را وارد کنید:</i>","html","true",$button_manage);
  }
elseif($command == 'set idtaraf'){
  save("other/$from_id/command.txt","none");
 $info = json_decode(
 file_get_contents("https://api.telegram.org/bot".API_KEY."/getChat?chat_id=$text")
 );
 if ($info->ok == true)
 {
   SendMessage($chat_id,"<i>✅ آیدی حروفی :$info->result->username</i>","html","true",$button_manage);
 }
 }

  //============
  elseif($text == '⭕️لغو حساب ویژه' and $from_id == $admin){
  save('administrative/user/'.$from_id."/command.txt","laghv hesab");
  SendMessage($chat_id,"⭕️ یوزرنیم بات رو بدون @ وارد کنید","html","true",$button_back2);
  }
  elseif($command == 'laghv hesab' and $from_id == $admin){
  unlink("Bot/$text/data/bottype.txt");
  save("administrative/user/".$from_id."/command.txt","none");
  SendMessage($chat_id,"⭕️ حساب غیر ویژه شد.","html","true",$button_manage);
  SendMessage($admin,"از طرف آدمین ربات رباتی غیر ویژه شد.
آیدی آدمین:
@$username
آیدی ربات
@$text","html","true",$button_back2);
  }
  ////////////////////////
    elseif($text == '🤗ویژه کردن ربات ساز😎' and $from_id == $admin){
  save('administrative/user/'.$from_id."/command.txt","hesab goldview2311y");
  SendMessage($chat_id,"یوزرنیم بات رو بدون @ وارد کنید","html","true",$button_back2);
  }
  elseif($command == 'hesab goldview2311y' and $from_id == $admin){
  save("Bot/$text/botupe.txt","gold");
  save("administrative/user/".$from_id."/command.txt","none");
  SendMessage($chat_id,"🔱 حساب ویژه شد.","html","true",$button_manage);
    SendMessage($admin,"از طرف آدمین ربات رباتی ویژه شد.
آیدی آدمین:
@$username
آیدی ربات
@$text","html","true",$button_back2);
  }
  //============
  elseif($text == '⚜️ویژه کردن ربات فروشگاه ساز' and $from_id == $admin){
  save('administrative/user/'.$from_id."/command.txt","hesab gold5");
  SendMessage($chat_id,"🔱 یوزرنیم بات رو بدون @ وارد کنید","html","true",$button_back2);
  }
  elseif($command == 'hesab gold5' and $from_id == $admin){
  save("Bot/$text/botttype.txt","gold");
  save("administrative/user/".$from_id."/command.txt","none");
  SendMessage($chat_id,"🔱 حساب ویژه شد.","html","true",$button_manage);
  SendMessage($admin,"از طرف آدمین ربات رباتی ویژه شد.
آیدی آدمین:
@$username
آیدی ربات
@$text","html","true",$button_back2);
  }
  ////////////////////////
  elseif($text == '⚜️ویژه کردن ربات پیام رسان' and $from_id == $admin){
  save('administrative/user/'.$from_id."/command.txt","hesab gold");
  SendMessage($chat_id,"🔱 یوزرنیم بات رو بدون @ وارد کنید","html","true",$button_back2);
  }
  elseif($command == 'hesab gold' and $from_id == $admin){
  save("Bot/$text/data/bottype.txt","gold");
  save("administrative/user/".$from_id."/command.txt","none");
  SendMessage($chat_id,"🔱 حساب ویژه شد.","html","true",$button_manage);
  SendMessage($admin,"از طرف آدمین ربات رباتی ویژه شد.
آیدی آدمین:
@$username
آیدی ربات
@$text","html","true",$button_back2);
  }
  ////////////////////////
    elseif($text == '⚜️ویژه کردن ربات ویوگیر️' and $from_id == $admin){
  save('administrative/user/'.$from_id."/command.txt","hesab goldview");
  SendMessage($chat_id,"یوزرنیم بات رو بدون @ وارد کنید","html","true",$button_back2);
  }
  elseif($command == 'hesab goldview' and $from_id == $admin){
  save("Bot/$text/data/bottype.txt","gold");
  save("administrative/user/".$from_id."/command.txt","none");
  SendMessage($chat_id,"🔱 حساب ویژه شد.","html","true",$button_manage);
    SendMessage($admin,"از طرف آدمین ربات رباتی ویژه شد.
آیدی آدمین:
@$username
آیدی ربات
@$text","html","true",$button_back2);
  }
    ////////////////////////
    elseif($text == 'ویژه کردن بنردهی' and $from_id == $admin){
  save('administrative/user/'.$from_id."/command.txt","hesab goldview23");
  SendMessage($chat_id,"یوزرنیم بات رو بدون @ وارد کنید","html","true",$button_back2);
  }
  elseif($command == 'hesab goldview23' and $from_id == $admin){
  save("Bot/$text/bot_type_ads.txt","gold");
  save("administrative/user/".$from_id."/command.txt","none");
  SendMessage($chat_id,"🔱 حساب ویژه شد.","html","true",$button_manage);
    SendMessage($admin,"از طرف آدمین ربات رباتی ویژه شد.
آیدی آدمین:
@$username
آیدی ربات
@$text","html","true",$button_back2);
  }
  ////////////////////////
    elseif($text == 'ویژه کردن تغییر نام فایل📝' and $from_id == $admin){
  save('administrative/user/'.$from_id."/command.txt","hesab goldview231");
  SendMessage($chat_id,"یوزرنیم بات رو بدون @ وارد کنید","html","true",$button_back2);
  }
  elseif($command == 'hesab goldview231' and $from_id == $admin){
  save("Bot/$text/bot_type_ads.txt","gold");
  save("administrative/user/".$from_id."/command.txt","none");
  SendMessage($chat_id,"🔱 حساب ویژه شد.","html","true",$button_manage);
    SendMessage($admin,"از طرف آدمین ربات رباتی ویژه شد.
آیدی آدمین:
@$username
آیدی ربات
@$text","html","true",$button_back2);
  }
  ////////////////////////
    elseif($text == '✉️ویژه کردن تبچی' and $from_id == $admin){
  save('administrative/user/'.$from_id."/command.txt","hesab goldview2311");
  SendMessage($chat_id,"یوزرنیم بات رو بدون @ وارد کنید","html","true",$button_back2);
  }
  elseif($command == 'hesab goldview2311' and $from_id == $admin){
  save("Bot/$text/bot_type_ads.txt","gold");
  save("administrative/user/".$from_id."/command.txt","none");
  SendMessage($chat_id,"🔱 حساب ویژه شد.","html","true",$button_manage);
    SendMessage($admin,"از طرف آدمین ربات رباتی ویژه شد.
آیدی آدمین:
@$username
آیدی ربات
@$text","html","true",$button_back2);
  }
  ////////////////////////
    elseif($text == '🔑ویژه کردن ضد لینک' and $from_id == $admin){
  save('administrative/user/'.$from_id."/command.txt","hesab goldview2311");
  SendMessage($chat_id,"یوزرنیم بات رو بدون @ وارد کنید","html","true",$button_back2);
  }
  elseif($command == 'hesab goldview2311' and $from_id == $admin){
  save("Bot/$text/bot_type_ads.txt","gold");
  save("administrative/user/".$from_id."/command.txt","none");
  SendMessage($chat_id,"🔱 حساب ویژه شد.","html","true",$button_manage);
    SendMessage($admin,"از طرف آدمین ربات رباتی ویژه شد.
آیدی آدمین:
@$username
آیدی ربات
@$text","html","true",$button_back2);
  }
  ////////////////////////
    elseif($text == '💬ویژه کردن چت ناشناس' and $from_id == $admin){
  save('administrative/user/'.$from_id."/command.txt","hesab goldview2311");
  SendMessage($chat_id,"یوزرنیم بات رو بدون @ وارد کنید","html","true",$button_back2);
  }
  elseif($command == 'hesab goldview2311' and $from_id == $admin){
  save("Bot/$text/bot_type_ads.txt","gold");
  save("administrative/user/".$from_id."/command.txt","none");
  SendMessage($chat_id,"🔱 حساب ویژه شد.","html","true",$button_manage);
    SendMessage($admin,"از طرف آدمین ربات رباتی ویژه شد.
آیدی آدمین:
@$username
آیدی ربات
@$text","html","true",$button_back2);
  }
  //============
  elseif($text == '🤖ربات دوم' and $from_id == $admin){
  save('administrative/user/'.$from_id."/command.txt","Bot 2");
  SendMessage($chat_id,"🤖 پیامی از شخص مورد نظر فوروارد کنید","html","true",$button_back2);
  }
  elseif($command == 'Bot 2' and $from_id == $admin){
  unlink("administrative/user/".$forward_id."/create.txt");
  save("administrative/user/".$from_id."/command.txt","none");
  SendMessage($chat_id,"🤖 شخص مورد نظر ربات دیگری میتواند بسازد.","html","true",$button_manage);
  SendMessage($admin,"از طرف آدمین ربات فردی ربات دومش فعال شد.
آیدی آدمین:
@$username
آیدی فرد
$text","html","true",$button_back2);
  }
  //============
  elseif($text == '📈آمار کاربران'){
	  $txtt = file_get_contents('administrative/access/mum.txt');
    $member_id = explode("\n",$txtt);
    $mmemcount = count($member_id) -1;
	$mmemcount_member = numberformat("$mmemcount",',');
	$txttt = file_get_contents('administrative/access/robots.txt');
    $member_id1 = explode("\n",$txttt);
    $mmemcount1 = count($member_id1) -1;
	$mmemcount_bots = numberformat("$mmemcount1",',');
	$txtttt = file_get_contents('administrative/access/allm.txt');
    $member_id111 = explode("\n",$txtttt);
    $mmemcount111 = count($member_id111) -1;
	$mmemcount_member_all_bot = numberformat("$mmemcount111",',');
	$adminHA = getFileList('administrative/tokensadmins/admin','.txt');
	$tokenHA = getFileList('administrative/tokensadmins/token','.txt');
	$bots = file_get_contents("administrative/access/UserName.txt");
	$exbot = explode("@",$bots);
	$c = count($exbot)-2;
	$botsss = '';
	if($exbot[$c-(-1)] != null){
	$botsss = $botsss."@".$exbot[$c-(-1)];
	}if($exbot[$c] != null){
	$botsss = $botsss."@".$exbot[$c];
	}if($exbot[$c-1] != null){
	$botsss = $botsss."@".$exbot[$c-1];
	}if($exbot[$c-2] != null){
	$botsss = $botsss."@".$exbot[$c-2];
	}if($exbot[$c-3] != null){
	$botsss = $botsss."@".$exbot[$c-3];
	}if($exbot[$c-4] != null){
	$botsss = $botsss."@".$exbot[$c-4];
	}if($exbot[$c-5] != null){
	$botsss = $botsss."@".$exbot[$c-5];
	}if($exbot[$c-6] != null){
	$botsss = $botsss."@".$exbot[$c-6];
	}if($exbot[$c-7] != null){
	$botsss = $botsss."@".$exbot[$c-7];
	}if($exbot[$c-8] != null){
	$botsss = $botsss."@".$exbot[$c-8];
	}
	$botsss = str_replace("\n",' | ',$botsss);
  SendMessage($chat_id,"آخرین آمار تا ساعت ( $time ) و تاریخ ( $date ) به صورت زیر میباشد👇
  
⛏تعداد ربات های ساخته شده با ربات ساز:
  $mmemcount_bots
  👤تعداد اعضای(ممبرهای) ربات:
  $mmemcount_member
  
  🤖 @Source_Home
  ","html","true");
  }
  //============
  elseif($text == '📮فوروارد همگانی' and $from_id == $admin){
	save("administrative/user/".$from_id."/command.txt","s2a fwd");
	SendMessage($chat_id,"📮 پیام مورد نظر را فوروارد کنید","html","true",$button_back2);
	}
	elseif($command == 's2a fwd' and $from_id == $admin){
	save("administrative/user/".$from_id."/command.txt","none");
	SendMessage($chat_id,"📮 پیام شما در صف ارسال قرار گرفت.","html","true",$button_manage);
	$all_member = fopen( "administrative/access/mum.txt", 'r');
		while( !feof( $all_member)) {
 			$user = fgets( $all_member);
			ForwardMessage($user,$admin,$message_id);
		}
	}
	//===========
	elseif($text == '📭پیام همگانی' and $from_id == $admin){
	save("administrative/user/".$from_id."/command.txt","s2a");
	SendMessage($chat_id,"📭 پیامتون رو وارد کنید","html","true",$button_back2);
	}
	elseif($command == 's2a' and $from_id == $admin){
	save("administrative/user/".$from_id."/command.txt","none");
	SendMessage($chat_id,"📭 پیام شما در صف ارسال قرار گرفت.","html","true",$button_manage);
	$all_member = fopen( "administrative/access/mum.txt", 'r');
		while( !feof( $all_member)) {
 			$user = fgets( $all_member);
			if($sticker_id != null){
			SendSticker($user,$sticker_id);
			}
			elseif($video_id != null){
			SendVideo($user,$video_id,$caption);
			}
			elseif($voice_id != null){
			SendVoice($user,$voice_id,'',$caption);
			}
			elseif($file_id != null){
			SendDocument($user,$file_id,'',$caption);
			}
			elseif($music_id != null){
			SendAudio($user,$music_id,'',$caption);
			}
			elseif($photo2_id != null){
			SendPhoto($user,$photo2_id,'',$caption);
			}
			elseif($photo1_id != null){
			SendPhoto($user,$photo1_id,'',$caption);
			}
			elseif($photo0_id != null){
			SendPhoto($user,$photo0_id,'',$caption);
			}
			elseif($text != null){
			SendMessage($user,$text,"html","true");
			}
		}
	}
		elseif($text == 'همگانی بات' and $from_id == $admin){
	save("administrative/user/".$from_id."/command.txt","s2ab");
	SendMessage($chat_id,"📭 پیامتون رو وارد کنید","html","true",$button_back2);
	}
	elseif($command == 's2ab' and $from_id == $admin){
	save("administrative/user/".$from_id."/command.txt","none");
	SendMessage($chat_id,"📭 پیام شما در صف ارسال قرار گرفت.","html","true",$button_manage);
	$all_member = fopen( "administrative/access/mum.txt", 'r');
		while( !feof( $all_member)) {
 			$user = fgets( $all_member);
			if($sticker_id != null){
			SendSticker($user,$sticker_id);
			}
			elseif($video_id != null){
			SendVideo($user,$video_id,$caption);
			}
			elseif($voice_id != null){
			SendVoice($user,$voice_id,'',$caption);
			}
			elseif($file_id != null){
			SendDocument($user,$file_id,'',$caption);
			}
			elseif($music_id != null){
			SendAudio($user,$music_id,'',$caption);
			}
			elseif($photo2_id != null){
			SendPhoto($user,$photo2_id,'',$caption);
			}
			elseif($photo1_id != null){
			SendPhoto($user,$photo1_id,'',$caption);
			}
			elseif($photo0_id != null){
			SendPhoto($user,$photo0_id,'',$caption);
			}
			elseif($text != null){
			SendMessage($idpushe,$text,"html","true");
			}
		}
	}
//============
elseif($text == '📟تبلیغات' and $from_id == $admin){
	save("administrative/user/".$from_id."/command.txt","ads");
	SendMessage($chat_id,"📟 تبلیغ مورد نظر رو فوروارد کنید","html","true",$button_back2);
	}
	elseif($command == 'ads' and $from_id == $admin){
	save("administrative/user/".$from_id."/command.txt","none");
	save("administrative/access/forward-msg-id.txt",$from_chat_msg_id);
	save("administrative/access/forward-id.txt","@$from_chat_username");
	SendMessage($chat_id,"📟 تبلیغ مورد نظر ثبت شد.","html","true",$button_manage);
	}
	//============
	elseif($text == 'banels'){
  SendMessage($chat_id,"کل اعضا بن شده👇
$banels","html","true");
  }
  //===============
  elseif($text == '/bannn' and $from_id == $admin){
  save('administrative/user/'.$from_id."/command.txt","cod ban");
  SendMessage($chat_id,"ایدیشو بفرس","html","true",$button_back2);
  }
  elseif($command == 'cod ban' and $from_id == $admin){
  save("administrative/user/".$from_id."/command.txt","none");
  SendMessage($chat_id,"بلاک شد🚫","html","true",$button_manage);
  SendMessage($text,"شما از ربات بلاک شده اید🚫📛
🚷اگر اشتباه بلاک شده اید به ما خبر دهید👇
@Source_Home","html","true");
$txxt = file_get_contents('administrative/banall-member/banall.txt');
  $pmembersid= explode("\n",$txxt);
  if (!in_array($text,$pmembersid)){
  $aaddddd = file_get_contents('administrative/banall-member/banall.txt');
  $aaddddd .= $text."\n";
  file_put_contents('administrative/banall-member/banall.txt',$aaddddd);
  }
  }
    //===============
//============
elseif(preg_match('/^\/([Bbanall) (.*)/',$text) and $from_id == $admin){
	preg_match('/^\/([Bb]anall) (.*)/',$text,$match);
	$id = json_decode(file_get_contents("https://api.pwrtelegram.xyz/botتوکن/getChat?chat_id=".$match[2]));
	$user = $id->result->id;
	if($user != null){
	$txxt = file_get_contents('administrative/banall-member/banall.txt');
    $pmembersid= explode("\n",$txxt);
    if (!in_array($user,$pmembersid)){
      $aaddd = file_get_contents('administrative/banall-member/banall.txt');
      $aaddd .= $user."\n";
		file_put_contents('administrative/banall-member/banall.txt',$aaddd);
    }
	SendMessage($chat_id,"🚫 کاربر مورد نظر بن ال شد.","html","true");
	SendMessage($user,"*You Are GloballyBanned From Server.❌
Don't Message Again...❌*
➖➖➖➖➖➖➖➖➖➖`
دسترسی شما به این سرور مسدود شده است.❌
لطفا پیام ندهید...❌`","html","true");
	}else{
	SendMessage($chat_id,"متاسفانه خطایی رخ داده است.","html","true");
	}
	}
//============
 	elseif(preg_match('/^\/([Uu]n[Bb]anall) (.*)/',$text) and $from_id == $admin){
	preg_match('/^\/([Uu]n[Bb]anall) (.*)/',$text,$match);
	$id = json_decode(file_get_contents("https://api.pwrtelegram.xyz/botتوکن/getChat?chat_id=".$match[2]));
	$user = $id->result->id;
	if($user != null){
	$rep = str_replace("$user\n",'',$block);
	save("administrative/banall-member/banall.txt",$rep);
	SendMessage($chat_id,"✅کاربر مورد نظر آنبن ال  شد.","html","true");
	SendMessage($user,"✅شما آنبن ال شدین.","html","true");
	}else{
	SendMessage($chat_id,"🚫 متاسفانه خطایی رخ داده است.","html","true");
	}
	}
	//==========
	 elseif($text == '📡لیست افراد بلاک شده' and $from_id == $admin){
	
	$botsban = file_get_contents("administrative/banall-member/banall.txt");
	$exbotban = explode(">",$botsban);
	$c = count($exbotban)-2;
	$botsssban = '';
	if($exbotban[$c-(-1)] != null){
	$botsssban = $botsssban.">".$exbotban[$c-(-1)];
	}if($exbotban[$c] != null){
	$botsssban = $botsssban.">".$exbotban[$c];
	}if($exbotban[$c-1] != null){
	$botsssban = $botsssban.">".$exbotban[$c-1];
	}if($exbotban[$c-2] != null){
	$botsssban = $botsssban.">".$exbotban[$c-2];
	}if($exbotban[$c-3] != null){
	$botsssban = $botsssban.">".$exbotban[$c-3];
	}if($exbotban[$c-4] != null){
	$botsssban = $botsssban.">".$exbotban[$c-4];
	}if($exbotban[$c-5] != null){
	$botsssban = $botsssban.">".$exbotban[$c-5];
	}if($exbotban[$c-6] != null){
	$botsssban = $botsssban.">".$exbotban[$c-6];
	}if($exbotban[$c-7] != null){
	$botsssban = $botsssban.">".$exbotban[$c-7];
	}if($exbotban[$c-8] != null){
	$botsssban = $botsssban.">".$exbotban[$c-8];
	}
	$botsssban = str_replace("\n",' | ',$botsssban);
	
	SendChatAction($chat_id,"typing");
	SendMessage($chat_id,"<i>📊🕵لیست </i> <code>10</code> <i>کاربر بلاک شده: </i>
	$botsssban","html","true");
	}
	
    //============
else{
  SendMessage($chat_id,"کاربر عزیز یک بار دیگه دستور نامشخص بفرستی بن میشی🚫📛","html","true");
  SendMessage($admin,"دستور نامشخص زد👇
نام کاربر : $first
یوزرنیم : @$username
آیدی عددی : $from_id
متن نامشخص : $text","html","true");
}
mkdir('administrative/user/'.$from_id);
$txxt = file_get_contents('administrative/access/mum.txt');
    $pmembersid= explode("\n",$txxt);
    if (!in_array($chat_id,$pmembersid)){
      $aaddd = file_get_contents('administrative/access/mum.txt');
      $aaddd .= $chat_id."\n";
		file_put_contents('administrative/access/mum.txt',$aaddd);
    }
	$txxt = file_get_contents('administrative/access/UserName.txt');
    $pmembersid= explode("\n",$txxt);
    if (!in_array("@".$username,$pmembersid)){
      $aaddd = file_get_contents('administrative/access/UserName.txt');
      $aaddd .= "@".$username."\n";
	  if($username != null){
		file_put_contents('administrative/access/UserName.txt',$aaddd);
	  }
    }
    unlink("error_log");
/*
کانال سورس خونه ! پر از سورس هاي ربات هاي تلگرامي !
لطفا در کانال ما عضو شويد 
@source_home
https://t.me/source_home
*/
?>
