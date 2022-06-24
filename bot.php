<?php
define('API_KEY','1529135125:AAESTjd32qwoLcH8qEU7fJFdRGKmFzyPjBY');
$admin = 710732845;
function makereq($method,$datas=[])
    {$url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($datas));
    $res = curl_exec($ch);
    if(curl_error($ch))
  {var_dump(curl_error($ch));}
    else
  {return json_decode($res);}
    }
function apiRequest($method, $parameters)
    {if (!is_string($method))
    {error_log("Method name must be a string\n");
    return false;}
    if (!$parameters) {
    $parameters = array();}
  else if (!is_array($parameters))
  {error_log("Parameters must be an array\n");
    return false;}
  foreach ($parameters as $key => &$val)
  {if (!is_numeric($val) && !is_string($val))
  {$val = json_encode($val);}
  }
  $url = "https://api.telegram.org/bot".API_KEY."/".$method.'?'.http_build_query($parameters);
  $handle = curl_init($url);
  curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 5);
  curl_setopt($handle, CURLOPT_TIMEOUT, 60);
  return exec_curl_request($handle);
    }
$update = json_decode(file_get_contents('php://input'));
var_dump($update);
$chat_id = $update->message->chat->id;
$mossage_id = $update->message->message_id;
$from_id = $update->message->from->id;
$msg_id = $update->message->message_id;
$name = $update->message->from->first_name;
$username = $update->message->from->username;
$textmessage = isset($update->message->text)?$update->message->text:'';
$usm = file_get_contents("data/users.txt");
$step = file_get_contents("data/".$from_id."/step.txt");
$members = file_get_contents('data/users.txt');
$ban = file_get_contents('banlist.txt');
$uvip = file_get_contents('data/vips.txt');
$channel = '@kimoland';
$token = API_KEY;
$truechannel = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=@$channel&user_id=".$from_id));
$tch = $truechannel->result->status;
function SendMessage($ChatId, $TextMsg)
{
makereq('sendMessage',[
'chat_id'=>$ChatId,
'text'=>$TextMsg,
'parse_mode'=>"MarkDown"
]);
}
function SendSticker($ChatId, $sticker_ID)
{
makereq('sendSticker',[
'chat_id'=>$ChatId,
'sticker'=>$sticker_ID
]);
}
function Forward($KojaShe,$AzKoja,$KodomMSG)
{
makereq('ForwardMessage',[
'chat_id'=>$KojaShe,
'from_chat_id'=>$AzKoja,
'message_id'=>$KodomMSG
]);
}
function save($filename,$TXTdata)
{
$myfile = fopen($filename, "w") or die("Unable to open file!");
fwrite($myfile, "$TXTdata");
fclose($myfile);
}
if (strpos($ban , "$from_id") !== false  ) {
SendMessage($chat_id,"متاسفیم😔\nدسترسی شما از این سرور مسدود شده است.⚫️");
	}
elseif(isset($update->callback_query))
{$callbackMessage = '';var_dump(makereq('answerCallbackQuery',['callback_query_id'=>$update->callback_query->id,'text'=>$callbackMessage]));
$chat_id = $update->callback_query->message->chat->id;
$message_id = $update->callback_query->message->message_id;
$data = $update->callback_query->data;
if (strpos($data, "del") !== false )
{$botun = str_replace("del ","",$data);
unlink("bots/".$botun."/index.php");
save("data/$chat_id/bots.txt","");
save("data/$chat_id/tedad.txt","0");
var_dump(makereq('editMessageText',
['chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"ربات شما با موفقیت حذف شد !",
'reply_markup'=>json_encode(['inline_keyboard'=>
[[['text'=>"به کانال ما بپیوندید",'url'=>"https://telegram.me/four4team"]]]
                            ])
]                )
        );
}
	elseif($tch != 'member' && $tch != 'creator' && $tch != 'administrator'){
	SendMessage($chat_id,"📛 برای حمایت از ما و همچنان ربات ابتدا وارد کانال زیر بشید 👇

🆔 @four4team

✅ سپس روی JOIN بزنید و به ربات برگشته عبارت 👇

🔸 /start

✴️ رو بزنید تا دکمه های ربات نمایش داده بشن👌","html","true",$button_remove);
	}
else{var_dump(makereq('editMessageText',
['chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"خطا",
'reply_markup'=>json_encode(['inline_keyboard'=>
[[['text'=>"`به کانال ما بپیوندید`",'url'=>"https://telegram.me/four4team"]]]
                            ])
]                    )
             );
   }
}
elseif ($textmessage == '🔙 برگشت')
{save("data/$from_id/step.txt","none");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"`سلام😎🖐

-به ربات ساز php وحرفه ی خوش اومدید👋
-بااین سرویس هرنوع ربات به زبان php بسازید🗣
-به راحتی یک ربات به زبان php بسازید.😸
-برای ساخت به روی ساخت ربات کلیک کنید🤖
-اپدیت های همیشگی !🤥`
------------------------------------
Channel 😺: @Four4team
Robot 😾 : @creatallsBot",
'parse_mode'=>'Html',
'reply_markup'=>json_encode(['keyboard'=>
[
[['text'=>"🎯ساخت ربات"]],
[['text'=>"📋راهنما"],['text'=>"🎗ربات های من"]],
[['text'=>"🔰قوانین"],['text'=>"🗑حذف ربات"]],
[['text'=>"آمار ربات📊"]],
[['text'=>" 📢کانال ما"],['text'=>"📜ارسال نظر"]],
[['text'=>"پشیبانی✳️"],['text'=>"🎁کد هدیه"]],
[['text'=>"اموزش ساخت ربات🤖"]],
],
'resize_keyboard'=>false
                            ])
                               ]
        )
    );
}
elseif ($textmessage == '📋راهنما')
{
SendMessage($chat_id,"برای ساخت ربات جدید روی دکمه 🤖 ساخت ربات بزنید`.\n\nبرای حذف ربات روی دکمه ❌ حذف ربات بزنید.\n\nبرای دیدن تعداد ربات ها خود روی دکمه 🚀 ربات های من بزنید.\n🤖 @creatallsbot`");
}
elseif ($textmessage == 'پشیبانی✳️')
{
SendMessage($chat_id,"🔷منتظر پیشنهادادت و نظرات و انتقادات هرگونه مشکلی شما هستیم ...
کصعشر گفتن بلاک 🔕
@Mrpvbot");
}
elseif ($textmessage == '📢کانال ما')
{
SendMessage($chat_id,"کانال ما جهت دریافت اخرین اخبار ها😱😉
Join ✴️ @Four4team");
}
elseif ($textmessage == '/back')
{save("data/$from_id/step.txt","none");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"`سلام😎🖐

-به ربات ساز php وحرفه ی خوش اومدید👋
-بااین سرویس هرنوع ربات به زبان php بسازید🗣
-به راحتی یک ربات به زبان php بسازید.😸
-برای ساخت به روی ساخت ربات کلیک کنید🤖
-اپدیت های همیشگی !🤥`
------------------------------------
Channel 😺: *@Four4team*
Robot 😾 : *@creatallsBot*",
'parse_mode'=>'Html',
'reply_markup'=>json_encode(['keyboard'=>
[
[['text'=>"🎯ساخت ربات"]],
[['text'=>"📋راهنما"],['text'=>"🎗ربات های من"]],
[['text'=>"🔰قوانین"],['text'=>"🗑حذف ربات"]],
[['text'=>"آمار ربات📊"]],
[['text'=>" 📢کانال ما"],['text'=>"📜ارسال نظر"]],
[['text'=>"پشیبانی✳️"],['text'=>"🎁کد هدیه"]],
[['text'=>"اموزش ساخت ربات🤖"]],
],
'resize_keyboard'=>false
                            ])
                               ]
        )
    );
}
elseif ($textmessage == 'آمار📋' && $from_id == $admin){
$number = count(scandir("bots"))-1;
$uvis = file_get_contents('data/vips.txt');
	$usercount = 1;
	$fp = fopen( "data/users.txt", 'r');
	while( !feof( $fp)) {
    		fgets( $fp);
    		$usercount ++;
	}
$avis = -1;
	$fp = fopen( "data/vips.txt", 'r');
	while( !feof( $fp)) {
    		fgets( $fp);
    		$avis ++;
	}
	fclose( $fp);
	SendMessage($chat_id,"آمار دقیق ربات در همین ساعت ⏰\n--------------------------------\n📋تعداد اعضای ربات : $usercount\n\n🤖تعداد رباتها : $number\n\n🏆تعداد اعضای ویژه : $avis\n--------------------------------\n🏆آیدی های ویژه :\n$uvis");
	}
elseif($textmessage == '📜ارسال نظر')
{
save("data/$from_id/step.txt","feedback");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"نظر خود را ارسال کنید : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"🔙 برگشت"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
elseif ($step == 'feedback')
{
save("data/$from_id/step.txt","none");
$feed = $textmessage;
SendMessage($admin,"یک نظر جدید📜\n\n-کاربر `$from_id`🍿\n\n-آیدی `@$username`🎨\n\n`📋متن نظر : $textmessage`");
SendMessage($chat_id,"ارسال شد.");
}

elseif (strpos($textmessage , "/delvip" ) !== false ) {
if ($from_id == $admin) {
$text = str_replace("/delvip","",$textmessage);
      $newlist = str_replace($text,"",$vip);
      save("data/vips.txt",$newlist);
SendMessage($admin,"🔹کاربر$text با موفقیت از لیست اعضای ویژه حذف گردید.");
SendMessage($logch,"👤 کاربر $text از لیست اعضای ویژه حذف گردید.");
}
else {
SendMessage($chat_id,"⛔️ شما ادمین نیستید.");
}
}
elseif ($textmessage == '/creator')
{
SendMessage($chat_id,"این ربات توسط `@hardboy_021` ساخته شده است.");
}
elseif ($textmessage == '/Creator')
{
SendMessage($chat_id,"این ربات توسط `@hardboy_021` ساخته شده است.");
}
elseif ($textmessage == '/update')
{
SendMessage($chat_id,"ربات با موفقیت بروزرسانی شد");
}
elseif ($textmessage == '/update')
{
SendMessage($chat_id,"ربات با موفقیت بروزرسانی شد");
}
elseif ($textmessage == 'اموزش ساخت ربات🤖')
{
SendMessage($chat_id,"اموزش ساخت ربات🤖
----------------------------
ابتدا وارد ربات @BotFather شوید 😺
به روی newbot/ کلیک کنید😬
اسم ربات خود را وارد کنید 🤔
و بعد یوزرنیم ربات را بزنین مثلا creatallssrobot🤧
خب بعد یه پیام طولانی میاد توکن رو کپی کنید توکن چیزست مثال👇
4282782992:hsownwnksjsownnwOZhgsisnJishebkskJjsj
خب حالا وارد ربات ما شید و به روی ساخت ربات کلیک کنید ✋
تمام ....
@Four4Team");
}
elseif($textmessage == '🎗ربات های من')
{$botname = file_get_contents("data/$from_id/bots.txt");
if ($botname == "")
{SendMessage($chat_id,"شما هنوز هیچ رباتی نساخته اید !");
return;
}
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"لیست ربات های شما :",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['inline_keyboard'=>
[[['text'=>"👉 @".$botname,'url'=>"https://telegram.me/".$botname]]]
                            ])
                                ]
        )
    );
}
$inch = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@$channel&user_id=".$from_id); 
if(strpos($inch , '"status":"left"') == true ) { 
var_dump(makereq('sendMessage',[ 
        'chat_id'=>$update->message->chat->id, 
        'text'=>"با سلام😊👋 
 
🔰برای استفاده از امکانات دیگر   ربات باید در کانال ما عضو شوید تا از اخبار ها مطلع شوید. 
 
⚜پس از  اینکه عضو شدید دوباره به ربات مراجعه کرده و دستور زیر را ارسال 🔰کنید. 
 
⬇️ /start ⬇️", 
 'parse_mode'=>'MarkDown', 
        'reply_markup'=>json_encode([ 
            'inline_keyboard'=>[ 
                [ 
                    ['text'=>"ورود  چنل🔵",'url'=>"https://telegram.me/four4team"] 
                ] 
            ] 
        ]) 
    ])); 
}
elseif($textmessage == '/start')
{
if (!file_exists("data/$from_id/step.txt"))
{mkdir("data/$from_id");
save("data/$from_id/step.txt","none");
save("data/$from_id/tedad.txt","0");
save("data/$from_id/bots.txt","");
$myfile2 = fopen("data/users.txt", "a") or die("Unable to open file!"); 
fwrite($myfile2, "$from_id\n");
fclose($myfile2);
}
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"سلام😎🖐

-به ربات ساز php وحرفه ی خوش اومدید👋
-بااین سرویس هرنوع ربات به زبان php بسازید🗣
-به راحتی یک ربات به زبان php بسازید.😸
-برای ساخت به روی ساخت ربات کلیک کنید🤖
-اپدیت های همیشگی !🤥
------------------------------------
Channel 😺: *@Four4team*
Robot 😾 : *@creatallsBot*",
'parse_mode'=>'Html',
'reply_markup'=>json_encode(['keyboard'=>
[
[['text'=>"🎯ساخت ربات"]],
[['text'=>"📋راهنما"],['text'=>"🎗ربات های من"]],
[['text'=>"🔰قوانین"],['text'=>"🗑حذف ربات"]],
[['text'=>"آمار ربات📊"]],
[['text'=>" 📢کانال ما"],['text'=>"📜ارسال نظر"]],
[['text'=>"پشیبانی✳️"],['text'=>"🎁کد هدیه"]],
[['text'=>"اموزش ساخت ربات🤖"]],
],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
if($text == "آمار ربات📊"){
    $user = file_get_contents('data/user.txt');
    $member_id = explode("\n",$user);
    $member_count = count($member_id) -1;
    var_dump(makereq('sendMessage',[
      'chat_id'=>$chat_id,
      'text'=>"تعداد کل اعضا: $member_count",
      'parse_mode'=>'HTML',
      ])
    );
}
$user = file_get_contents('data/user.txt');
    $members = explode("\n",$user);
    if (!in_array($chat_id,$members)){
      $add_user = file_get_contents('data/user.txt');
      $add_user .= $chat_id."\n";
     file_put_contents('data/user.txt',$add_user);
    }
elseif ($textmessage == '🗑حذف ربات') {
if (file_exists("data/$from_id/step.txt"))
{}
$botname = file_get_contents("data/$from_id/bots.txt");
if ($botname == "")
{SendMessage($chat_id,"❗️شما هنوز هیچ رباتی نساخته اید❗️");}
else
{
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"🤖ربات مورد نظر خود را انتخاب نمایید🤖",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['inline_keyboard'=>
[[['text'=>"👉 @".$botname,'callback_data'=>"del ".$botname]]]
                            ])
                               ]
        )
    );

}
}
elseif ($textmessage == '/panel')
if ($from_id == $admin)
{
var_dump(makereq('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"سلام قربان😃👋\nبه پنل مدیریت📋 ربات خود خوش آمدید😁",
        'parse_mode'=>'MarkDown',
        'reply_markup'=>json_encode([
            'keyboard'=>[
              [
                ['text'=>"ارسال به همه📬"],['text'=>"آمار📋"]
              ],
              [
                ['text'=>"آنبلاک✅"],['text'=>"بلاک⛔️"]
              ],
              [
                ['text'=>"فروارد به همه🚀"],['text'=>"ساخت کد هدیه"]
              ],
              [
                ['text'=>"🔙 برگشت"]
              ]
            ]
        ])
    ]));
 }
else
{
SendMessage($chat_id,"برادر شما ادمین ربات نیستید😐😂");
}
elseif (strpos($textmessage , "/ban") !== false && $chat_id == $admin)
{
$bban = str_replace('/ban','',$textmessage);
if ($bban != '')
{
$myfile2 = fopen("banlist.txt", "a") or die("Unable to open file!"); 
fwrite($myfile2, "$bban\n");
fclose($myfile2);
SendMessage($chat_id,"`کاربر $bban با موفقیت مسدود شد🍃`");
SendMessage($chanell,"`کاربر $bban از سرور ربات ساز مسدود شد🍃`");
}
}
elseif (strpos($textmessage , "/unban") !== false && $chat_id == $admin)
{
$unbban = str_replace('/unban','',$textmessage);
if ($unbban != '')
{
$newlist = str_replace($unbban,"","banlist.txt");
save("banlist.txt",$newlist);
SendMessage($chat_id,"`کاربر $unbban با موفقیت از مسدودیت خارج شد🍃`");
SendMessage($chanell,"`کاربر $unbban از مسدودیت سرور ربات ساز خارج شد🍃`");
}
}
elseif ($textmessage == 'ارسال به همه📬')
if ($from_id == $admin)
{
save("data/$from_id/step.txt","sendtoall");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"پیام خود را ارسال کنید : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"🔙 برگشت"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
else
{
SendMessage($chat_id,"شما ادمین نیستید.");
}
elseif ($step == 'sendtoall')
{
SendMessage($chat_id,"پیام در حال ارسال میباشد...⏰");
save("data/$from_id/step.txt","none");
$fp = fopen( "data/users.txt", 'r');
while( !feof( $fp)) {
$ckar = fgets( $fp);
SendMessage($ckar,$textmessage);
}
SendMessage($chat_id,"پیام شما با موفقیت به تمام کاربران ارسال شد👍");
}
elseif ($textmessage == 'فروارد به همه🚀')
if ($from_id == $admin)
{
save("data/$from_id/step.txt","fortoall");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"پیام خود را ارسال کنید : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"🔙 برگشت"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
}
else
{
SendMessage($chat_id,"شما ادمین نیستید.");
}
elseif ($step == 'fortoall')
{
save("data/$from_id/step.txt","none");
		 SendMessage($chat_id,"در حال فروارد پیام شما...");
$forp = fopen( "data/users.txt", 'r');
while( !feof( $forp)) {
$fakar = fgets( $forp);
Forward($fakar, $chat_id,$mossage_id);
		 }
		 makereq('sendMessage',[
		 'chat_id'=>$chat_id,
		 'text'=>"🚀پیام شما برای تمامی کاربران فروارد شد✅",
		 ]);
	 }
elseif ($textmessage == 'بلاک⛔️')
if ($chat_id == $admin) {
SendMessage($chat_id,"برای بلاک⛔️ کردن کاربری به صورت زیر عمل کنید.👇\n/ban USERID\nبه جای USERID آیدی عددی کاربر موردنظر را بگذارید😃");
}
else
{ SendMessage($chat_id,"شما ادمین نیستید."); }
elseif ($textmessage == 'آنبلاک✅')
if ($chat_id == $admin) {
SendMessage($chat_id,"برای آنبلاک✅ کردن کاربری به صورت زیر عمل کنید.👇\n/unban USERID\nبه جای USERID آیدی عددی کاربر موردنظر را بگذارید😃");
}
else
{ SendMessage($chat_id,"شما ادمین نیستید."); }
elseif (strpos($textmessage , "/setvip" ) !== false ) {
if ($from_id == $admin) {
$text = str_replace("/setvip","",$textmessage);
$myfile2 = fopen("data/vips.txt", 'a') or die("Unable to open file!");  
fwrite($myfile2, "$text\n");
fclose($myfile2);
SendMessage($chat_id,"🔸عملیات ارتقا حساب با موفقیت انجام شد.📃\nکاربر $text به لیست اعضای ویژه🏆اضافه شد😃");
}
}
elseif ($textmessage == '🎯ساخت ربات')
{
var_dump(makereq('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"نوع ربات را انتخاب کنید.😃",
        'parse_mode'=>'MarkDown',
        'reply_markup'=>json_encode([
            'keyboard'=>[
              [
 
                ['text'=>""],['text'=>"انتی اسپم 🤖"]
              ],
              [
                ['text'=>"فایل به لینک🗳"],['text'=>"مبدل فایل👾"]
              ],
              [
                              ['text'=>"دنلود از یوتیوب📤"],['text'=>"گیتاب دنلودر⚜"]
              ],
              [
                              ['text'=>""],['text'=>"مای اپلودر⌛️"]
              ],
              [
                ['text'=>"بیوگرافی اینستا📑"],['text'=>"تبدیل فونت🈷"]
              ],
              [
                              ['text'=>"تفریحی Api❇️"],['text'=>"ربات ست وبهوک☢"]
              ],
              [
                                            ['text'=>""],['text'=>"️دنلودر عکس پروفایل تلگرام⛎"]
              ],
              [
	        ['text'=>"🔙 برگشت "]
	      ]
            ]
        ])
    ]));
 }
elseif ($textmessage == 'انتی اسپم 🤖')
{$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 100 && $from_id != '263500706')
{SendMessage($chat_id,"🚫هر نفر تنها قادر به ساخت صد ربات است🚫\nبرای ساخت ربات بیشتر با @JokerBlackCity مکاتبه کنید.");
return;
}
save("data/$from_id/step.txt","create bot");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"توکن را وارد کنید : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"🔙 برگشت"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
    }
    elseif ($textmessage == 'تفریحی Api❇️')
{$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 100 && $from_id != '263500706')
{SendMessage($chat_id,"🚫هر نفر تنها قادر به ساخت صد ربات است🚫\nبرای ساخت ربات بیشتر با @JokerBlackCity مکاتبه کنید.");
return;
}
save("data/$from_id/step.txt","create bot20");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"توکن را وارد کنید : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"🔙 برگشت"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
    }
        elseif ($textmessage == 'ربات ست وبهوک☢')
{$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 100 && $from_id != '263500706')
{SendMessage($chat_id,"🚫هر نفر تنها قادر به ساخت صد ربات است🚫\nبرای ساخت ربات بیشتر با @JokerBlackCity مکاتبه کنید.");
return;
}
save("data/$from_id/step.txt","create bot21");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"توکن را وارد کنید : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"🔙 برگشت"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
    }
    elseif ($textmessage == 'دنلود از یوتیوب📤')
{$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 100 && $from_id != '263500706')
{SendMessage($chat_id,"🚫هر نفر تنها قادر به ساخت صد ربات است🚫\nبرای ساخت ربات بیشتر با @JokerBlackCity مکاتبه کنید.");
return;
}
save("data/$from_id/step.txt","create bot4");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"توکن را وارد کنید : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"🔙 برگشت"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
    }
    elseif ($textmessage == 'مای اپلودر⌛️')
{$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 100 && $from_id != '263500706')
{SendMessage($chat_id,"🚫هر نفر تنها قادر به ساخت صد ربات است🚫\nبرای ساخت ربات بیشتر با @JokerBlackCity مکاتبه کنید.");
return;
}
save("data/$from_id/step.txt","create bot8");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"توکن را وارد کنید : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"🔙 برگشت"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
    }
        elseif ($textmessage == 'گیتاب دنلودر⚜')
{$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 100 && $from_id != '263500706')
{SendMessage($chat_id,"🚫هر نفر تنها قادر به ساخت صد ربات است🚫\nبرای ساخت ربات بیشتر با @JokerBlackCity مکاتبه کنید.");
return;
}
save("data/$from_id/step.txt","create bot44444");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"توکن را وارد کنید : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"🔙 برگشت"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
    }
    elseif ($textmessage == 'مبدل فایل👾')
{$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 100 && $from_id != '263500706')
{SendMessage($chat_id,"🚫هر نفر تنها قادر به ساخت صد ربات است🚫\nبرای ساخت ربات بیشتر با @JokerBlackCity مکاتبه کنید.");
return;
}
save("data/$from_id/step.txt","create bot3");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"توکن را وارد کنید : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"🔙 برگشت"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
    }
    elseif ($textmessage == 'فایل به لینک🗳')
{$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 100 && $from_id != '263500706')
{SendMessage($chat_id,"🚫هر نفر تنها قادر به ساخت صد ربات است🚫\nبرای ساخت ربات بیشتر با @JokerBlackCity مکاتبه کنید.");
return;
}
save("data/$from_id/step.txt","create bot2");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"توکن را وارد کنید : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"🔙 برگشت"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
    }
        elseif ($textmessage == 'بیوگرافی اینستا📑')
{$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 100 && $from_id != '263500706')
{SendMessage($chat_id,"🚫هر نفر تنها قادر به ساخت صد ربات است🚫\nبرای ساخت ربات بیشتر با @JokerBlackCity مکاتبه کنید.");
return;
}
save("data/$from_id/step.txt","create bot11");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"توکن را وارد کنید : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"🔙 برگشت"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
    }
        elseif ($textmessage == '️دنلودر عکس پروفایل تلگرام⛎')
{$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 100 && $from_id != '263500706')
{SendMessage($chat_id,"🚫هر نفر تنها قادر به ساخت صد ربات است🚫\nبرای ساخت ربات بیشتر با @JokerBlackCity مکاتبه کنید.");
return;
}
save("data/$from_id/step.txt","create bot22");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"توکن را وارد کنید : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"🔙 برگشت"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
    }
            elseif ($textmessage == 'تبدیل فونت🈷')
{$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 100 && $from_id != '263500706')
{SendMessage($chat_id,"🚫هر نفر تنها قادر به ساخت صد ربات است🚫\nبرای ساخت ربات بیشتر با @JokerBlackCity مکاتبه کنید.");
return;
}
save("data/$from_id/step.txt","create bot10");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"توکن را وارد کنید : ",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode(['keyboard'=>
[[['text'=>"🔙 برگشت"]]],
'resize_keyboard'=>true
                            ])
                               ]
        )
    );
    }
elseif($textmessage == '🎁کد هدیه' || $textmessage == '/start neman'){
  file_put_contents('data/'.$from_id."/step.txt","free code");
 makereq('SendMessage',[
     'chat_id'=>$chat_id,
     'text'=>" کد هدیه را ارسال کنید 💰 : ",
     'pars_mode'=>"MarkDown",
     'reply_markup'=>json_encode([
         'keybord'=>[
             [
                 ['text'=>"🔙 برگشت"]
             ]
             ]
         ])
     ]);
  }
  elseif($step == 'free code'){
  if(file_exists("code/$txtmsg.txt")){
  $cde = file_get_contents("code/$txtmsg.txt");
  $exp = explode("\n",$cde);
  if(in_array($from_id,$exp)){
  file_put_contents('data/'.$from_id."/step.txt","none");
  SendMessage($chat_id,"شما قبلا از این کد استفاده کرده بودید");
  }else{
  file_put_contents('data/'.$from_id."/step.txt","none");
  file_put_contents("code/$txtmsg.txt","$cde\n$from_id");
  $myfile28 = fopen("datau/vips.txt", 'a') or die("Unable to open file!");  
fwrite($myfile28, "$from_id\n");
fclose($myfile28);
  SendMessage($chat_id,"حساب شما ویژه شد");
  
  sendMessage($channel,"➖➖➖➖➖➖➖➖➖
کد با موفقیت استفاده شد✅
⏰ ساعت ↙️
⏰$time
📆تاریخ↙️
📆$date
🔶🔷🔶🔷🔶🔷🔶🔷🔶

👤 توسط 
👤Name: 
$name
💠
🆔Username: 
@$username
💠

🌐UserID: 
$from_id
💠
");
unlink("code/$txtmsg.txt");
  }
  }else{
  SendMessage($chat_id,"⚠️همچین کدی وجود ندارد");
  }
  }
 elseif ($textmessage == 'ساخت کد هدیه' && $from_id == $admin) { 
save("data/$from_id/step.txt","code"); 
    SendMessage($chat_id,"کد هدیه را ارسال کنید."); 
} 
elseif ($step == 'code') 
{ 
    file_put_contents("code/$txtmsg.txt",""); 
    SendMessage($chat_id,"کد ثبت شد"); 
    makereq('SendMessage',[
    'chat_id'=>$channel,
    'text'=>" ➖➖➖➖➖➖➖➖➖➖➖➖
🔶کد جدید ساخته شد✔️


🏷کد⬅️: 
$txtmsg


➖➖➖➖➖➖➖➖➖➖➖➖
هرکی زود کد بالا رو داخل ربات 
@CreatAllsBot
در بخش کد هدیه 🏆بزنه برندست🌀😍

🎈ساعت◀️ $time

🎈تاریخ◀️ $date ️",
'parse_mode'=>'html',
     'reply_markup'=>json_encode([
         'inline_keyboard'=>[
             [
                 ['text'=>"ورود به ربات",'url'=>"https://telegram.me/CreatAllsbot"]
             ]]
     ])
]); 
}
     if ($textmessage == '👤اطلاعات کاربر1💀') {
if ($from_id = $admin) {
  save("data/$from_id/step.txt","nummm");
  sendmessage($chat_id,"ایدی عددی کاربر را ارسال کنید");
  }
  }
  if ($step == 'nummm') {
     if (file_exists("data/$textmessage/num.txt")) {
     $num = file_get_contents("data/$textmessage/num.txt");
    $token = file_get_contents("data/$textmessage/token.txt");
    $mail = file_get_contents("data/$textmessage/mail.txt"); sendmessage($chat_id,"شماره کاربر:\n`$num`\nایدی عددی\n`$textmessage`\nتوکن اخرین ربات ساخته شده\n`$token`");
    
     }else{
     sendmessage($chat_id,"این کاربر شمارشو تایید نکرده کوس ننش");
     save("data/$from_id/step.txt","none");
     }
     }
        if ($textmessage == 'حذف اطلاعات کاربر') {
        if ($from_id = $adminn) {
        save("data/$from_id/step.txt","delf");
        sendmessage($chat_id,"لطفا مسیر را وارد کنید (از پوشه دیتا به اونور)");
        }
        }
           if ($step == 'delf') {
           if (!file_exists("data/$textmessage")) {
           sendmessage($chat_id,"همچین پوشه و یا فایلی پیدا نشد");
           save("data/$from_id/step.txt","none");
           }else{
         $t = $textmessage; if(preg_match("'(.*)(.txt)'",$textmessage)){
unlink("data/$textmessage");
sendmessage($chat_id,"فایل مورد نظر حذف شد");
save("data/$from_id/step.txt","none");
}else{
rmdir("data/$textmeesage");
sendmessage($chat_id,"پوشه مورد نظر حذف شد");
save("data/$from_id/step.txt","none");
}
}
}
?>
