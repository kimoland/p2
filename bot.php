<?php
define('API_KEY','1529135125:AAESTjd32qwoLcH8qEU7fJFdRGKmFzyPjBY');
$admin = 710732845;
$channels = "@KimoLand";
$token = API_KEY;
$host_folder = 'https://kimoss8.herokuapp.com';
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
    
    function getChatMember($chat_id,$user_id){
  $url = 'https://api.telegram.org/bot'.API_KEY.'/getChatMember?chat_id='.$chat_id.'&user_id='.$user_id;
  $result = file_get_contents($url);
  $result = json_decode ($result);
  $result = $result->result->status;
  return $result;
    }
    function EditMessageText($chat_id,$message_id,$text,$parse_mode,$disable_web_page_preview,$keyboard){
     bot('editMessagetext',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
    'text'=>$text,
    'parse_mode'=>$parse_mode,
    'disable_web_page_preview'=>$disable_web_page_preview,
    'reply_markup'=>$keyboard
    ]);
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
$mossage_id = $update->message->message_id;
$chatid = $update->callback_query->message->chat->id;
$chat_id = $update->message->chat->id;
$fromid = $update->callback_query->message->from->id;
$from_id = $update->message->from->id;;
$msg_id = $update->message->message_id;
$name = $update->message->from->first_name;
$username = $update->message->from->username;
$textmessage = isset($update->message->text)?$update->message->text:'';
$usm = file_get_contents("data/users.txt");
$step = file_get_contents("data/".$from_id."/step.txt");
$members = file_get_contents('data/users.txt');
$ban = file_get_contents('banlist.txt');
$uvip = file_get_contents('data/vips.txt');
$chanell = '$channels';
$message_id = $update->callback_query->message->message_id;
$truechannel = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$channels&user_id=".$from_id));
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

elseif ($textmessage == '🔙 برگشت')
{save("data/$from_id/step.txt","none");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"سلام😃👋\n\n- به ربات ساز حرفه ای تلگرام خوش آمدید🌹\n- به راحتی برای خود یک ربات تلگرامی رایگان بسازید🎯\n- برای ساخت ربات جدید دکمه ساخت ربات را بزنید🤖\n🎗 @Samyar13bot🎗",
'parse_mode'=>'Html',
'reply_markup'=>json_encode(['keyboard'=>
[
[['text'=>"🎯ساخت ربات"],['text'=>"🎗ربات های من"]],
[['text'=>"📋راهنما"],['text'=>"🗑حذف ربات"],['text'=>"🔰قوانین"]],
[['text'=>" 📢کانال ما"],['text'=>"📜ارسال نظر"]]
],
'resize_keyboard'=>false
                            ])
                               ]
        )
    );
}
elseif ($textmessage == '📋راهنما')
{
SendMessage($chat_id,"برای ساخت ربات جدید روی دکمه 🤖 ساخت ربات بزنید.\n\nبرای حذف ربات روی دکمه ❌ حذف ربات بزنید.\n\nبرای دیدن تعداد ربات ها خود روی دکمه 🚀 ربات های من بزنید.\n🤖@Samyar13bot🎗");
}
elseif ($textmessage == '/back')
{save("data/$from_id/step.txt","none");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"سلام😃👋\n\n- به ربات ساز حرفه ای تلگرام خوش آمدید🌹\n- به راحتی برای خود یک ربات تلگرامی رایگان بسازید🎯\n- برای ساخت ربات جدید دکمه ساخت ربات را بزنید🤖\n🎗 @Samyar13bot🎗",
'parse_mode'=>'Html',
'reply_markup'=>json_encode(['keyboard'=>
[
[['text'=>"🎯ساخت ربات"],['text'=>"🎗ربات های من"]],
[['text'=>"📋راهنما"],['text'=>"🗑حذف ربات"],['text'=>"🔰قوانین"]],
[['text'=>" 📢کانال ما"],['text'=>"📜ارسال نظر"]]
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
elseif ($textmessage == '/update')
{
SendMessage($chat_id,"ربات با موفقیت بروزرسانی شد");
}
elseif ($textmessage == '/update')
{
SendMessage($chat_id,"ربات با موفقیت بروزرسانی شد");
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

elseif($tch != 'member' && $tch != 'creator' && $tch != 'administrator'){
	SendMessage($chat_id,"📛 برای حمایت از ما و همچنان ربات ابتدا وارد کانال زیر بشید 👇

🆔$channels

✅ سپس روی JOIN بزنید و به ربات برگشته عبارت 👇

🔸 /start

✴️ رو بزنید تا دکمه های ربات نمایش داده بشن👌","html","true",$button_remove);
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
'text'=>"سلام😃👋\n\n- به ربات ساز حرفه ای تلگرام خوش آمدید🌹\n- به راحتی برای خود یک ربات تلگرامی رایگان بسازید🎯\n- برای ساخت ربات جدید دکمه ساخت ربات را بزنید🤖\n🎗 @Samyar13bot",
'parse_mode'=>'Html',
'reply_markup'=>json_encode(['keyboard'=>
[
[['text'=>"🎯ساخت ربات"],['text'=>"🎗ربات های من"]],
[['text'=>"📋راهنما"],['text'=>"🗑حذف ربات"],['text'=>"🔰قوانین"]],
[['text'=>" 📢کانال ما"],['text'=>"📜ارسال نظر"]]
],
'resize_keyboard'=>false
                            ])
                               ]
        )
    );
}
elseif ($textmessage == '📢کانال ما') {

{SendMessage($chat_id,"کانال تیم برنامه نویسی ما \n $channels");}
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
                ['text'=>"فروارد به همه🚀"]
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
'text'=>"به منوی ساخت ربات خوش آمدید👾\nلطفا یک دکمه را انتخاب کنید.🤖",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode([
            'keyboard'=>[
              [
                ['text'=>"بخش ویژه🏆"]
              ],
              [
                ['text'=>"بخش رایگان🎯"]
              ],
              [
                ['text'=>"🔙 برگشت"]
              ]
           ]
        ])
     ]));
 }
elseif ($textmessage == '🔙 برگشت به منو')
{save("data/$from_id/step.txt","none");
var_dump(makereq('sendMessage',[
'chat_id'=>$update->message->chat->id,
'text'=>"به منوی ساخت ربات خوش آمدید👾\nلطفا یک دکمه را انتخاب کنید.🤖",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode([
            'keyboard'=>[
              [
                ['text'=>"بخش ویژه🏆"]
              ],
              [
                ['text'=>"بخش رایگان🎯"]
              ],
              [
                ['text'=>"🔙 برگشت"]
              ]
           ]
        ])
     ]));
 }
elseif ($textmessage == 'بخش ویژه🏆')
if (strpos($uvip , "$from_id") !== false  ) {
var_dump(makereq('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"نوع ربات را انتخاب کنید.😃",
        'parse_mode'=>'MarkDown',
        'reply_markup'=>json_encode([
            'keyboard'=>[
              [
                ['text'=>"پیام رسان ویژه📬"]
              ],
          [
                ['text'=>"کوتاه کننده لینک ویژه🔗"]
              ],
              [
         ['text'=>"یوزر اینفو ویژهℹ️"]
              ],
          [
['text'=>"ماشین حساب ویژه🖌"]
],
[
['text'=>"دستیار متن ویژه📋"]
],
[
['text'=>"🅾ایکس او ویژه❎"]
],
[
['text'=>"ایمیل جعلی ویژه📧"]
],
[
['text'=>"مخفی ساز متن ویژه🔍"]
],
[
['text'=>"آپلودر ویژه📤"]
],
[
['text'=>"فال حافظ ویژه📜"]
],
[
            ['text'=>"🔙 برگشت به منو"]
          ]
            ]
        ])
    ]));
 }
else
{
$textvip = '⚜️ متاسفانه حساب شما رایگان است.
➖➖➖➖➖➖➖➖➖➖➖
🔸مزایا اکانت ویژه :

1⃣ ساخت ربات PHP بدون تبلیغات
ساخت ربات های🤖 :
1-پیامرسان ویژه🎗
2-ایمیل جعلی ویژه🎯
3-ایکس او ویژه🎪
4-ماشین حساب ویژه🏵
5-یوزر اینفو ویژه📜
6-دستیار متن ویژه📝
7-کوتاه کننده لینک ویژه🔗
8-مخفی ساز متن ویژه🔍
9-آپلودر ویژه📤
10-فال حافظ ویژه📜
2⃣ پاسخگویی سریعتر در پشتیبانی
3⃣ در اولویت بودن آپدیت ها برای اکانت های ویژه

💰 قیمت ویژه شدن اکانت شما در ربات فقط و فقط 2000 تومان میباشد.

جهت پرداخت به آیدی زیر مراجعه کنید
*@kurdishhacker*';
SendMessage($chat_id,$textvip);
}
elseif ($textmessage == 'بخش رایگان🎯')
{
var_dump(makereq('sendMessage',[
        'chat_id'=>$update->message->chat->id,
        'text'=>"نوع ربات را انتخاب کنید.😃",
        'parse_mode'=>'MarkDown',
        'reply_markup'=>json_encode([
            'keyboard'=>[
             
              [
                ['text'=>"ویوگیر"],['text'=>"بازدیدگیر شکلاتی"]
              ],
              [
                ['text'=>"تغییر نام فایل ها"],['text'=>"فروشگاه"]
              ],
              
              [
                ['text'=>"🅾ایکس او❎"],['text'=>"📿صلوات شمار"]
              ],
              
              
          [
                ['text'=>"یوزر اینفوℹ️"],['text'=>"ماشین حساب🖌"]
              ],
              [
         ['text'=>"زمان⏰"],['text'=>"کوتاه کننده لینک🌀"]
              ],
          [
['text'=>"دستیار متن🖊"],['text'=>"متن عاشقانه💝"]
],
[
['text'=>"چک کننده کدهای php🔍"],['text'=>"🤖تفریحی"]
],
[
['text'=>"فال حافظ📜"],['text'=>"پیامرسان💬"]
],
[
            ['text'=>"🔙 برگشت به منو"]
          ]
            ]
        ])
    ]));
 }
elseif ($textmessage == 'پیامرسان💬')
{
$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 100 && $from_id != '263500706')
{SendMessage($chat_id,"🚫هر نفر تنها قادر به ساخت صد ربات است🚫\nبرای ساخت ربات بیشتر با @loghmanazari مکاتبه کنید.");
return;
}
save("data/$from_id/step.txt","create bot23");
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
elseif ($textmessage == 'بازدیدگیر شکلاتی')
{
$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 100 && $from_id != '263500706')
{SendMessage($chat_id,"🚫هر نفر تنها قادر به ساخت صد ربات است🚫\nبرای ساخت ربات بیشتر با @loghmanazari مکاتبه کنید.");
return;
}
save("data/$from_id/step.txt","create bot50");
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
elseif ($textmessage == 'تغییر نام فایل ها')
{
$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 100 && $from_id != '263500706')
{SendMessage($chat_id,"🚫هر نفر تنها قادر به ساخت صد ربات است🚫\nبرای ساخت ربات بیشتر با @loghmanazari مکاتبه کنید.");
return;
}
save("data/$from_id/step.txt","create bot51");
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
elseif ($textmessage == 'فروشگاه')
{
$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 100 && $from_id != '263500706')
{SendMessage($chat_id,"🚫هر نفر تنها قادر به ساخت صد ربات است🚫\nبرای ساخت ربات بیشتر با @loghmanazari مکاتبه کنید.");
return;
}
save("data/$from_id/step.txt","create bot52");
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
elseif ($textmessage == 'پیام رسان ویژه📬')
if (strpos($uvip , "$from_id") !== false  ) {
$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 100 && $from_id != '263500706')
{SendMessage($chat_id,"🚫هر نفر تنها قادر به ساخت صد ربات است🚫\nبرای ساخت ربات بیشتر با @loghmanazari مکاتبه کنید.");
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
else
{
SendMessage($chat_id,"شما کاربر ویژه🏆نیستید☹️");
}
elseif ($textmessage == 'کوتاه کننده لینک ویژه🔗')
if (strpos($uvip , "$from_id") !== false  ) {
$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 100 && $from_id != '263500706')
{SendMessage($chat_id,"🚫هر نفر تنها قادر به ساخت صد ربات است🚫\nبرای ساخت ربات بیشتر با @loghmanazari مکاتبه کنید.");
return;
}
save("data/$from_id/step.txt","create bot12");
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
else
{
SendMessage($chat_id,"شما کاربر ویژه🏆نیستید☹️");
}
elseif ($textmessage == 'یوزر اینفو ویژهℹ️')
if (strpos($uvip , "$from_id") !== false  ) {
$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 100 && $from_id != '263500706')
{SendMessage($chat_id,"🚫هر نفر تنها قادر به ساخت صد ربات است🚫\nبرای ساخت ربات بیشتر با @loghmanazari مکاتبه کنید.");
return;
}
save("data/$from_id/step.txt","create bot13");
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
else
{
SendMessage($chat_id,"شما کاربر ویژه🏆نیستید☹️");
}
elseif ($textmessage == 'ماشین حساب ویژه🖌')
if (strpos($uvip , "$from_id") !== false  ) {
$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 100 && $from_id != '263500706')
{SendMessage($chat_id,"🚫هر نفر تنها قادر به ساخت صد ربات است🚫\nبرای ساخت ربات بیشتر با @loghmanazari مکاتبه کنید.");
return;
}
save("data/$from_id/step.txt","create bot14");
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
else
{
SendMessage($chat_id,"شما کاربر ویژه🏆نیستید☹️");
}
elseif ($textmessage == 'دستیار متن ویژه📋')
if (strpos($uvip , "$from_id") !== false  ) {
$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 100 && $from_id != '263500706')
{SendMessage($chat_id,"🚫هر نفر تنها قادر به ساخت صد ربات است🚫\nبرای ساخت ربات بیشتر با @loghmanazari مکاتبه کنید.");
return;
}
save("data/$from_id/step.txt","create bot15");
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
else
{
SendMessage($chat_id,"شما کاربر ویژه🏆نیستید☹️");
}
elseif ($textmessage == '🅾ایکس او ویژه❎')
if (strpos($uvip , "$from_id") !== false  ) {
$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 100 && $from_id != '263500706')
{SendMessage($chat_id,"🚫هر نفر تنها قادر به ساخت صد ربات است🚫\nبرای ساخت ربات بیشتر با @loghmanazari مکاتبه کنید.");
return;
}
save("data/$from_id/step.txt","create bot16");
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
else
{
SendMessage($chat_id,"شما کاربر ویژه🏆نیستید☹️");
}
elseif ($textmessage == 'ایمیل جعلی ویژه📧')
if (strpos($uvip , "$from_id") !== false  ) {
$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 100 && $from_id != '263500706')
{SendMessage($chat_id,"🚫هر نفر تنها قادر به ساخت صد ربات است🚫\nبرای ساخت ربات بیشتر با @loghmanazari مکاتبه کنید.");
return;
}
save("data/$from_id/step.txt","create bot17");
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
else
{
SendMessage($chat_id,"شما کاربر ویژه🏆نیستید☹️");
}
elseif ($textmessage == 'مخفی ساز متن ویژه🔍')
if (strpos($uvip , "$from_id") !== false  ) {
$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 100 && $from_id != '263500706')
{SendMessage($chat_id,"🚫هر نفر تنها قادر به ساخت صد ربات است🚫\nبرای ساخت ربات بیشتر با @loghmanazari مکاتبه کنید.");
return;
}
save("data/$from_id/step.txt","create bot18");
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
else
{
SendMessage($chat_id,"شما کاربر ویژه🏆نیستید☹️");
}
elseif ($textmessage == 'آپلودر ویژه📤')
{
SendMessage($chat_id,"درحال تعمیر...🔩");
}
elseif ($textmessage == 'wuehe8wjw8')
if (strpos($uvip , "$from_id") !== false  ) {
$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 100 && $from_id != '263500706')
{SendMessage($chat_id,"🚫هر نفر تنها قادر به ساخت صد ربات است🚫\nبرای ساخت ربات بیشتر با @loghmanazari مکاتبه کنید.");
return;
}
save("data/$from_id/step.txt","create bot19");
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
else
{
SendMessage($chat_id,"شما کاربر ویژه🏆نیستید☹️");
}
elseif ($textmessage == 'فال حافظ ویژه📜')
if (strpos($uvip , "$from_id") !== false  ) {
$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 100 && $from_id != '263500706')
{SendMessage($chat_id,"🚫هر نفر تنها قادر به ساخت صد ربات است🚫\nبرای ساخت ربات بیشتر با @loghmanazari مکاتبه کنید.");
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
else
{
SendMessage($chat_id,"شما کاربر ویژه🏆نیستید☹️");
}
elseif ($textmessage == 'فال حافظ📜')
{
$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 100 && $from_id != '263500706')
{SendMessage($chat_id,"🚫هر نفر تنها قادر به ساخت صد ربات است🚫\nبرای ساخت ربات بیشتر با @loghmanazari مکاتبه کنید.");
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
elseif ($textmessage == '🅾ایکس او❎')
{$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 100 && $from_id != '263500706')
{SendMessage($chat_id,"🚫هر نفر تنها قادر به ساخت صد ربات است🚫\nبرای ساخت ربات بیشتر با @loghmanazari مکاتبه کنید.");
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
elseif ($textmessage == 'یوزر اینفوℹ️')
{$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 100 && $from_id != '263500706')
{SendMessage($chat_id,"🚫هر نفر تنها قادر به ساخت صد ربات است🚫\nبرای ساخت ربات بیشتر با @loghmanazari مکاتبه کنید.");
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
elseif ($textmessage == 'ماشین حساب🖌')
{$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 100 && $from_id != '263500706')
{SendMessage($chat_id,"🚫هر نفر تنها قادر به ساخت صد ربات است🚫\nبرای ساخت ربات بیشتر با @loghmanazari مکاتبه کنید.");
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
elseif ($textmessage == 'زمان⏰')
{$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 100 && $from_id != '263500706')
{SendMessage($chat_id,"🚫هر نفر تنها قادر به ساخت صد ربات است🚫\nبرای ساخت ربات بیشتر با @loghmanazari مکاتبه کنید.");
return;
}
save("data/$from_id/step.txt","create bot5");
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
elseif ($textmessage == '📿صلوات شمار')
{$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 100 && $from_id != '263500706')
{SendMessage($chat_id,"🚫هر نفر تنها قادر به ساخت صد ربات است🚫\nبرای ساخت ربات بیشتر با @loghmanazari مکاتبه کنید.");
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
elseif ($textmessage == 'متن عاشقانه💝')
{$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 100 && $from_id != '263500706')
{SendMessage($chat_id,"🚫هر نفر تنها قادر به ساخت صد ربات است🚫\nبرای ساخت ربات بیشتر با @loghmanazari مکاتبه کنید.");
return;
}
save("data/$from_id/step.txt","create bot9");
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
elseif ($textmessage == 'دستیار متن🖊')
{$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 100 && $from_id != '263500706')
{SendMessage($chat_id,"🚫هر نفر تنها قادر به ساخت صد ربات است🚫\nبرای ساخت ربات بیشتر با @loghmanazari مکاتبه کنید.");
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
elseif ($textmessage == 'چک کننده کدهای php🔍')
{$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 100 && $from_id != '263500706')
{SendMessage($chat_id,"🚫هر نفر تنها قادر به ساخت صد ربات است🚫\nبرای ساخت ربات بیشتر با @loghmanazari مکاتبه کنید.");
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
elseif ($textmessage == 'کوتاه کننده لینک🌀')
{$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 100 && $from_id != '263500706')
{SendMessage($chat_id,"🚫هر نفر تنها قادر به ساخت صد ربات است🚫\nبرای ساخت ربات بیشتر با @loghmanazari مکاتبه کنید.");
return;
}
save("data/$from_id/step.txt","create bot7");
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
elseif ($textmessage == '🤖تفریحی')
{$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 100 && $from_id != '263500706')
{SendMessage($chat_id,"🚫هر نفر تنها قادر به ساخت صد ربات است🚫\nبرای ساخت ربات بیشتر با @loghmanazari مکاتبه کنید.");
return;
}
save("data/$from_id/step.txt","create bot25");
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
elseif ($textmessage == 'ویوگیر')
{$tedad = file_get_contents("data/$from_id/tedad.txt");
if ($tedad >= 100 && $from_id != '263500706')
{SendMessage($chat_id,"🚫هر نفر تنها قادر به ساخت صد ربات است🚫\nبرای ساخت ربات بیشتر با @loghmanazari مکاتبه کنید.");
return;
}
save("data/$from_id/step.txt","create bot26");
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
else
{SendMessage($chat_id,"❗️دستور اشتباه است❗️");}
$txxt = file_get_contents('data/users.txt');
    $pmembersid= explode("\n",$txxt);
    if (!in_array($chat_id,$pmembersid)){
      $aaddd = file_get_contents('data/users.txt');
      $aaddd .= $chat_id."\n";
      file_put_contents('data/users.txt',$aaddd);
    }
?>
