<?php
/*
کانال سورس خونه ! پر از سورس هاي ربات هاي تلگرامي !
لطفا در کانال ما عضو شويد 
@source_home
https://t.me/source_home
*/
ob_start();
$API_KEY = '1623028043:AAGGCA7NKH_Je03XRQbe4gcP6Q4psb-WgKA'; //tokon rbttn ro inja jiy gzry knid
$channel = "@hslu78tvhos254"; //ID channel bdne @
$admin = '710732845'; //ID addy admin ro Source_Home.php set webhook anjm bdid
//Source_Home//
define('API_KEY', $API_KEY);
$GetINFObot = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getMe"));
$Botid = $GetINFObot->result->username;
function Source_Home($method, $datas = [])
{
    $url = "https://api.telegram.org/bot" . API_KEY . "/" . $method;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
    $res = curl_exec($ch);
    if (curl_error($ch)) {
        var_dump(curl_error($ch));
    } else {
        return json_decode($res);
    }
}

//Source_Home//

function SendDocument($chatid,$document,$caption = null){
	Source_Home('SendDocument',[
	'chat_id'=>$chatid,
	'document'=>$document,
	'caption'=>$caption
	]);
}
function CreateZip($files = array(),$destination) {
    if(file_exists($destination)){
		return false;
	}
    $valid_files = array();
    if(is_array($files)){
        foreach($files as $file){
            if(file_exists($file)){
                $valid_files[] = $file;
            }
        }
    }
    if(count($valid_files)){
        $zip = new ZipArchive();
        if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true){
            return false;
        }
        foreach($valid_files as $file){
            $zip->addFile($file,$file);
        }
        $zip->close();
        return file_exists($destination);
    }else{
        return false;
    }
}
function ForwardMessage($chatid,$from_chat,$message_id){
	Source_Home('ForwardMessage',[
	'chat_id'=>$chatid,
	'from_chat_id'=>$from_chat,
	'message_id'=>$message_id
	]);
	}
function sendAction($chat_id, $action){
    Source_Home('sendChataction',[
        'chat_id'=>$chat_id,
        'action'=>$action
    ]);
}
function sendphoto($ChatId, $photo_id,$caption){
    Source_Home('sendphoto',[
        'chat_id'=>$ChatId,
        'photo'=>$photo_id,
        'caption'=>$caption
    ]);
}
function sendvideo($chat_id,$video_id,$caption){
    Source_Home('sendvideo',[
        'chat_id'=>$chat_id,
        'video'=>$video_id,
        'caption'=>$caption
    ]);
}
function EditMessageText($chat_id, $message_id, $text, $parse_mode, $disable_web_page_preview, $keyboard){
Source_Home('editMessagetext', [
'chat_id' => $chat_id,
'message_id' => $message_id,
'text' => $text,
'parse_mode' => $parse_mode,
'disable_web_page_preview' => $disable_web_page_preview,
'reply_markup' => $keyboard
]);
}
function SendMessage($chatid, $text, $parsmde, $disable_web_page_preview, $keyboard){
Source_Home('sendMessage', [
'chat_id' => $chatid,
'text' => $text,
'parse_mode' => $parsmde,
'disable_web_page_preview' => $disable_web_page_preview,
'reply_markup' => $keyboard
]);
}

//Source_Home//
$update = json_decode(file_get_contents('php://input'));
var_dump($update);
$message = $update->message;
$from_id = $message->from->id;
$chat_id = $message->chat->id;
$chatid = $update->callback_query->message->chat->id;
$text = $message->text;
$textmassage = $message->text;
mkdir("data/$chat_id");
$Source_Home = $message->text;
$first_name‌‌ = $message->from->first_name;
$last_name = $message->from->last_name;
$username = $message->from->username;
$message_id = $update->message->message_id;
$messageid = $update->callback_query->message->message_id;
$reply = $update->message->reply_to_message;
$re_id = $update->message->reply_to_message->forward_from->id;
$photo = $update->message->photo;
$data = $update->callback_query->data;
$inline_query = $update->inline_query;
$query_id = $inline_query->id;
$forward_from = $update->message->forward_from;
$forward_from_id = $forward_from->id;
$forward_from_username = $forward_from->username;
$fromm_id = $update->inline_query->from->id;
$fatime = jdate('H:i:s');
$fadate = jdate("Y/F/d");
@$Source_Home = file_get_contents("data/$chat_id/Source_Home.txt");
//Source_Home//
$left = json_decode(file_get_contents("https://api.telegram.org/bot" . API_KEY . "/getChatMember?chat_id=$channel&user_id=$from_id"))->result->status;
//Source_Home//
$command = file_get_contents("data/$from_id/command.txt");
$ref = file_get_contents("data/$chat_id/ref.txt");
//Source_Home//
$members = file_get_contents("data/members.txt");
$memlist = explode("\n", $members);
$banlist = file_get_contents("data/banlist.txt");
$blist = explode("\n", $banlist);
//Source_Home//
if ($left == "left") {
    Source_Home('sendMessage', [
        'chat_id' => $chat_id,
        'text' => "
▫️برای فعال شدن ربات باید در کانال زیر عضو شوید 👇

🔹 $channel 

🔹 $channel

⚠️ درصورت عضو نشدن ربات فعال نمی شود ...
✅ پس از عضویت در کانال دستور /start را دوباره تکرار کنید ..
",
        'parse_mode' => 'HTML',
        'reply_markup' => json_encode([
            'inline_keyboard' => [
                [['text' => "🔻ورود به کانال🔻", 'url' => "http://telegram.me/" . str_replace("@", '', $channel)]]]])
    ]);
} else {

    if (strpos($text, '/start') !== false or $text == "▫️بازگشت به منوی اصلی▫️") {

        if (!in_array($chat_id, $memlist)) {
            if (!file_exists("data")) {
                mkdir("data");
            }
            mkdir("data/$from_id");
            $members .= $chat_id . "\n";
            file_put_contents("data/members.txt", "$members");
            file_put_contents("data/$chat_id/ref.txt", "0");

            $id = str_replace("/start ", "", $text);
            if ($id != "" && $text != "/start" && $id != $from_id) {
                SendMessage($id, "🏷 کاربر <a href='tg://user?id=$from_id'>$first_name‌</a> با لینک شما وارد ربات شد!

🔻1 نفر به زیر مجموعه های شما اضافه گردید ☑️
", "HTML");
                file_put_contents("data/$from_id/refe.txt", "$id");
                $refs = file_get_contents("data/$id/ref.txt");
                $refs = $refs + 1;
                file_put_contents("data/$id/ref.txt", "$refs");
                
            }
        }

        file_put_contents("data/$chat_id/command.txt", "none");

        Source_Home('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "
🔻سلام به ربات هک اینستا ما خوش آمدید ..

▫️شما میتوانید با استفاده از ربات ما برای خودتان پیچ اینستا داشته باشید چه به صورت هک شده چه به صورت عادی میتوانید دریافت نمایید ..

⚜ هر سوال و یا مشکلی داشتید میتوانید از طریق قسمت  | 🗣 پشتیبانی | با ما در ارتباط باشید.
🌐 کانال ما : $channel

📅 تاریخ: $fadate
⏰ ساعت: $fatime
",
            'parse_mode' => 'HTML',
            'reply_markup' => json_encode([
                'keyboard' => [
                    [['text' => "هک اینستاگرام با شماره"], ['text' => "هک اینستاگرام با آیدی"]],
                    [['text' => "هک اینستاگرام با ایمیل"]],
                    [['text' => "🌐 اطلاعات حساب"]],
                    [['text' => "🗣 پشتیبانی"], ['text' => "👥 زیرمجموعه گیری"]],
                    [['text' => "🎖خرید خدمات اینستاگرامی🎖"]],

                ],
                'resize_keyboard' => true,
            ])
        ]);
    }
  //Source_Home//
  elseif ($text == 'هک اینستاگرام با شماره') {
        Source_Home('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "
🔹کاربر گرامی $first_name‌

⚠️ به دلیل هزینه‌ های سنگین سرور و پیاده سازی دشوار سرویس پردازش این ربات ، فقط افرادی که اکانت ویژه دارند امکان استفاده از این ربات وجود دارد ..

💎 برای فعال کردن اکانت ویژه ، باید 10 نفر را با استفاده از لینک دعوت اختصاصی خودت به ربات دعوت کنی تا تمام امکانات ربات برای شما فعال گردد ..

👤 شما تا کنون $ref نفر را دعوت کرده اید ..

📣 برای دریافت لینک اختصاصی رو دکمه زیر مجموعه گیری کلید کنید👇
",
        
            ]);
        }
        
    //Source_Home//
    elseif ($text == 'هک اینستاگرام با آیدی') {
        Source_Home('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "
🔹کاربر گرامی $first_name‌

⚠️ به دلیل هزینه‌ های سنگین سرور و پیاده سازی دشوار سرویس پردازش این ربات ، فقط افرادی که اکانت ویژه دارند امکان استفاده از این ربات وجود دارد ..

💎 برای فعال کردن اکانت ویژه ، باید 10 نفر را با استفاده از لینک دعوت اختصاصی خودت به ربات دعوت کنی تا تمام امکانات ربات برای شما فعال گردد ..

👤 شما تا کنون $ref نفر را دعوت کرده اید ..

📣 برای دریافت لینک اختصاصی رو دکمه زیر مجموعه گیری کلید کنید👇
",
     
            ]);
        }
        
    //Source_Home//
    elseif ($text == 'هک اینستاگرام با ایمیل') {
        Source_Home('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "
🔹کاربر گرامی $first_name‌

⚠️ به دلیل هزینه‌ های سنگین سرور و پیاده سازی دشوار سرویس پردازش این ربات ، فقط افرادی که اکانت ویژه دارند امکان استفاده از این ربات وجود دارد ..

💎 برای فعال کردن اکانت ویژه ، باید 10 نفر را با استفاده از لینک دعوت اختصاصی خودت به ربات دعوت کنی تا تمام امکانات ربات برای شما فعال گردد ..

👤 شما تا کنون $ref نفر را دعوت کرده اید ..

📣 برای دریافت لینک اختصاصی رو دکمه زیر مجموعه گیری کلید کنید👇
",
 
            ]);
        }
        
    
 //Source_Home//
    elseif ($text == "👥 زیرمجموعه گیری") {
    	Source_Home('sendPhoto', [
            'chat_id' => $chat_id,
             'photo'=>"https://uupload.ir/files/ksmm_picsart_03-01-10.27.45.jpg",
        'caption'=>"
📣 یه ربات براتون اوردم که آیدی اینستاگرام میدی بعد رمز پیچ رو میده😍

🔖 بیا توش همه دوستات رو هک کن و اذیتشون کن😼💪

📌 همین الان رو لینک زیر کلیک کن و بریم واسه هک اینستا🤨👇

https://t.me/$Botid?start=$from_id",
]);
Source_Home('sendvideo', [
            'chat_id' => $chat_id,
            'message_id' => $message_id2,
             'video'=>"https://uupload.ir/filelink/wpQWSbBw6A5Z/kuij_animation.gif.mp4",
        'caption'=>"
⁉️ دوست داری اینستاگرام کسی رو هک کنی؟! 😼

‼️ میتونی با هک کردن پیچ بقیه اونا رو بفروشی و پول پارو کنی😍

✅ خب من یه ربات بهت معرفی میکنم که باهاش میتونی پیچ ها رو هک کنی ، کار با ربات اینطوریه که آیدی اینستا قربانی رو میدی بعد رمز رو دریافت میکنی😁💪

📌 همین الان رو لینک زیر کلیک کن و بریم واسه هک اینستا🤨👇

https://t.me/$Botid?start=$from_id",
]);
        sleep(1);
 Source_Home('sendmessage', [
            'chat_id' => $chat_id,
            'message_id'=>$message_id + 1,
            'text' => "
▫️با انتشار یکی از پست های بالا با جمع کردن حداقل 10 نفر به عنوان زیر مجموعه ، میتوانید از تمامی قسمت های ربات به صورت ویژه استفاده کنید ..
",
'reply_to_message_id'=>$message_id,
       'reply_markup' => json_encode([
                'keyboard' => [
[['text' => "▫️بازگشت به منوی اصلی▫️"]],
]
])
]); 
}
 //Source_Home//
    elseif ($text == '🌐 اطلاعات حساب') {
        Source_Home('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "
─────┅┅══┅┅─────

👤 نام : $first_name‌‌
🎟 آیدی : $chat_id
👥 زیر مجموعه ها : $ref نفر

📅 تاریخ: $fadate
⏰ ساعت: $fatime

─────┅┅══┅┅─────
",
            'parse_mode' => 'HTML',
        ]);
    }
    //Source_Home//
    elseif ($text == '🗣 پشتیبانی') {
        file_put_contents("data/$chat_id/command.txt", "support");
        Source_Home('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "📩 پیام خود را ارسال کنید :",
            'parse_mode' => 'HTML',
            'reply_markup' => json_encode([
                'keyboard' => [
                    [['text' => "▫️بازگشت به منوی اصلی▫️"]],
                ], 'resize_keyboard' => true,
            ])
        ]);
    } elseif ($command == 'support') {
        if (!in_array($chat_id, $blist)) {
            bot("forwardMessage", ['chat_id' => $admin, 'from_chat_id' => $chat_id, 'message_id' => $message_id]);
            sendmessage($chat_id, "✅ پیام شما ارسال شد.", "HTML");
        } else {
            file_put_contents("data/$chat_id/command.txt", "none");
            sendmessage($chat_id, "⛔️ شما بدلیل تخلف مسدود شده اید", "HTML");
        }
    } elseif ($chat_id == $admin and $reply) {
        if ($text == "/ban") {
            if (!in_array($re_id, $blist)) {
                file_put_contents("data/banlist.txt", "\n" . $re_id, FILE_APPEND);
                sendmessage($chat_id, "❌ کاربر مسدود شد .", "HTML");
            }
        } elseif ($text == "/unban") {
            if (in_array($re_id, $blist)) {
                $bli = str_replace("\n" . $re_id, '', $banlist);
                file_put_contents("data/banlist.txt", $bli);
                sendmessage($chat_id, "✅ کاربر آزاد شد .", "HTML");
            }
        } else {
            sendmessage($re_id, $text, "HTML");
            sendmessage($chat_id, "✅ پیام شما ارسال شد.", "HTML");
        }
    }
 //Source_Home//
 if(preg_match('/^\/([Cc][Rr][Ee][Aa][Tt][Oo][Rr])/',$Source_Home)){
 bot ('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=> '🔖 این ربات توسط @Source_Home ساخته شده است✅',
  ]);
 }
  //Source_Home//
elseif ($text == '🎖خرید خدمات اینستاگرامی🎖') {
        Source_Home('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "
🌼 جشنواره تابستانهِ خدمات مجازی اینستاگرام 🔥

🛍 جشنواره تابستانه امسال رو با کاهش قیمت ، همراه با کلی از تخفیف و هدیه های ویژه بهره مند شو😍💪🎁👇

─────┅┅══┅┅─────
🌿 فالوور فیک اینستاگرام | 30% تخفیف 🛒 + هدیه ویژه 💎

👤 هر 1000 فالور + 300 فالور هدیه 🎁 + 500 لایک هدیه 🎁 + 500 ویو ویدیو هدیه 🎁 | 10 تومن💰
🏷 کیفیت ⭐️⭐️
📊 ماندگاری⭐️⭐️⭐️
─────┅┅══┅┅─────
🌿 فالوور اینستاگرام نیمه فیک بدون آنفالو | 30% تخفیف 🛒 + هدیه ویژه 💎

👤 هر 1000 فالور + 300 فالور هدیه 🎁 + 500 لایک هدیه 🎁 + 500 ویو ویدیو هدیه 🎁 | 18 تومن💰
🏷 کیفیت ⭐️⭐️
📊 ماندگاری⭐️⭐️⭐️⭐️
─────┅┅══┅┅─────
🌿 فالوور اینستاگرام نیمه فیک ایرانی | 30% تخفیف 🛒 + هدیه ویژه 💎

👤 هر 1000 فالور + 300 فالور هدیه 🎁 + 500 لایک هدیه 🎁 + 500 ویو ویدیو هدیه 🎁 | 14 تومن💰
🏷 کیفیت ⭐️⭐️
📊 ماندگاری⭐️⭐️⭐️
─────┅┅══┅┅─────
🌿 فالوور اینستاگرام فعال ایرانی | 30% تخفیف 🛒 + هدیه ویژه 💎

👤 هر 1000 فالور + 300 فالور هدیه 🎁 + 500 لایک هدیه 🎁 + 500 ویو ویدیو هدیه 🎁 | 15 تومن💰
🏷 کیفیت ⭐️⭐️⭐️
📊 ماندگاری⭐️⭐️⭐️
─────┅┅══┅┅─────
🌿 لایک ایرانی پست اینستاگرام | 30% تخفیف 🛒 + هدیه داغ 🔥

▫️هر 1000 لایک + 500 لایک هدیه 🎁 | 5 تومن💰
🏷 کیفیت ⭐️⭐️⭐️
📊 ماندگاری⭐️⭐️⭐️⭐️⭐️
─────┅┅══┅┅─────
🌿 لایک خارجی پست اینستاگرام | 20% تخفیف 🛒 + هدیه داغ 🔥

▫️هر 1000 لایک + 500 لایک هدیه 🎁 | 3 تومن💰
🏷 کیفیت ⭐️⭐️
📊 ماندگاری⭐️⭐️⭐️⭐️⭐️
─────┅┅══┅┅─────
🌿 لایک لایو استوری اینستاگرام | 20% تخفیف 🛒 + هدیه داغ 🔥

▫️هر 1000 لایک + 200 لایک هدیه 🎁 | 16 تومن💰
🏷 کیفیت ⭐️⭐️⭐️
📊 ماندگاری⭐️⭐️⭐️⭐️
─────┅┅══┅┅─────
🌿 ویو واقعی لایو استوری اینستاگرام | 20% تخفیف 🛒 + هدیه داغ 🔥

👁‍🗨 هر 1000 ویو + 500 ویو هدیه 🎁 | 90 تومن💰
🏷 کیفیت ⭐️⭐️⭐️⭐️⭐️
📊 ماندگاری⭐️⭐️⭐️⭐️⭐️
─────┅┅══┅┅─────
🌿 ویو واقعی ویدئو اینستاگرام | 20% تخفیف 🛒 + هدیه داغ 🔥

👁‍🗨 هر 1000 ویو + 500 ویو هدیه 🎁 | 12 تومن💰
🏷 کیفیت ⭐️⭐️⭐️⭐️
📊 ماندگاری⭐️⭐️⭐️⭐️⭐️
─────┅┅══┅┅─────
🌿 ویو فیک ویدئو اینستاگرام | 45% تخفیف 🛒 + هدیه داغ 🔥

👁‍🗨 هر 1000 ویو + 500 ویو هدیه 🎁 | 4 تومن💰
🏷 کیفیت ⭐️⭐️
📊 ماندگاری⭐️⭐️⭐️⭐️⭐️
─────┅┅══┅┅─────
🌿 ویو واقعی استوری اینستاگرام | 20% تخفیف 🛒 + هدیه داغ 🔥

👁‍🗨 هر 1000 ویو + 500 ویو هدیه 🎁 | 19 تومن💰
🏷 کیفیت ⭐️⭐️⭐️⭐️
📊 ماندگاری⭐️⭐️⭐️⭐️⭐️
─────┅┅══┅┅─────
🌿 ویو فیک استوری اینستاگرام | 45% تخفیف 🛒 + هدیه داغ 🔥

👁‍🗨 هر 1000 ویو + 500 ویو هدیه 🎁 | 4500 تومن💰
🏷 کیفیت ⭐️⭐️
📊 ماندگاری⭐️⭐️⭐️⭐️⭐️
─────┅┅══┅┅─────
🌿 کامنت فیک فارسی پست اینستاگرام | 20% تخفیف 🛒 + هدیه داغ 🔥

👁‍🗨 هر 100 کامنت + 10 کامنت هدیه 🎁 | 3 تومن💰
🏷 کیفیت ⭐️⭐️
📊 ماندگاری⭐️⭐️⭐️⭐️
─────┅┅══┅┅─────
⚠️ قابل توجه شما دوستان عزیز هدیه های هر بخش بر اساس هزارتا میباشند در صورت خریداری بیش از هزارتا ، هدیه ها به ازای هر هزارتایی که خریداری میکنید برای شما دوست عزیز افزایش میابد ✔️
─────┅┅══┅┅─────
🖥 تحویل آنی تمام سفارشات پس از پرداخت ✅

💰پرداخت ها به صورت زیر انجام میگیرد👇

🎈 کارت به کارت 💳
🎈 پرداخت از طریق درگاه 💵

🔻جهت خرید و یا مشاوره با آیدی زیر در ارتباط باشید👇

🆔 @Source_Home

🔻در صورت ریپورت بودن به ربات های زیر پیغام دهید👇

🆔 @Source_Home
🆔 @Source_Home

❎ مدارک خرید و فروش در کانال زیر قرار میگیرد👇

🆔 @Source_Home

🌐 کانال خبر و حواشی های تغییر قیمت و نحوه چگونگی انجام سفارشات در کانال زیر قرار داده میشود👇

🆔 @Source_Home

🎗 مدیریت کینگ سیمپله | @Source_Home
",
        ]);
    }
//Source_Home//
if ($text == '/panel' and $chat_id == $admin) {
        Source_Home('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "
🔻به پنل مدیریت خوش آمدید
",
            'parse_mode' => 'HTML',
            'reply_markup' => json_encode([
                'keyboard' => [
                    [['text' => "📊 آمار و اطلاعات"]],
                    [['text' => "پیام همگانی"], ['text' => "فروارد همگانی"]],
                    [['text' => "🗂 پشتیبان گیری"]],
                    [['text' => "انبلاک کردن▫️"], ['text' => "▫️بلاک کردن"]],
                    [['text' => "▫️بازگشت به منوی اصلی▫️"]],
                ],
                'resize_keyboard' => true,
            ])
        ]);
    }

    //Source_Home//
     if ($text == '🗂 پشتیبان گیری' and $chat_id == $admin) {
    SendMessage($chat_id,"■ نسخه پشتیبان درحال آماده سازی است.\n■ منتظر بمانید ...", 'MarkDown', $message_id);
copy('data/members.txt','members.txt');
 $file_to_zip = array('members.txt');
 $create = CreateZip($file_to_zip, "@Source_Home.zip");
 $zipfile = new CURLFile("@Source_Home.zip");
 SendDocument($chat_id, $zipfile, "This Backup Of user\n📅 تاریخ: $fadate\n⏰ ساعت: $fatime");
 unlink('members.txt');
 unlink('@Source_Home.zip');
 unlink('updates.txt');

  
}
    //Source_Home//
    elseif ($text == "▫️بلاک کردن" and $chat_id == $admin) {
                 file_put_contents("data/$from_id/command.txt","idblock");
        Source_Home('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "
❎ خوب حالا آیدی عددی کاربر مورد نظر رو بفرست تا از ربات بلاکش کنم
",
        ]);
    } elseif ($command == 'idblock') {
        $myfile2 = fopen("data/banlist.txt", 'a') or die("Unable to open file!");
        fwrite($myfile2, "$text\n");
        fclose($myfile2);
        file_put_contents("data/$from_id/command.txt","");
        Source_Home('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "
❎ با موفقیت انجام شد ..
",
            'parse_mode' => "html",
        ]);
    }
     elseif ($text == "انبلاک کردن▫️"and $chat_id == $admin) {
        file_put_contents("data/$from_id/command.txt","idunblock");
        Source_Home('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "
❎ خوب حالا آیدی عددی کاربر مورد نظر رو بفرست تا از ربات آنبلاکش کنم
",
        ]);
    } elseif ($command == 'idunblock') {
        $newlist = str_replace($text, "", $blist);
        file_put_contents("data/banlist.txt", $newlist);
        file_put_contents("data/$from_id/command.txt","");
        Source_Home('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "
❎ با موفقیت انجام شد ..
",
        ]);
    } 
    //Source_Home//
    if ($text == 'پیام همگانی' and $chat_id == $admin) {
    Source_Home('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"آیا میخواهید پیام همگانی ارسال کنید؟",
        'reply_to_message_id'=>$message_id,
        'disable_web_page_preview'=>true,
        'parse_mode'=>"MarkDown",
        'reply_markup'=>json_encode([
           'keyboard'=>[
 [['text'=>"بله"],['text'=>"▫️بازگشت به منوی اصلی▫️"]]
 ],
  "resize_keyboard"=>true,
    ])
    ]);
    } if ($text == 'بله' and $chat_id == $admin) {
    file_put_contents("data/$from_id/command.txt","pmall");
    Source_Home('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"لطفا پیام خود را ارسال کنید تا به همه اعضا ارسال کنم",
        'reply_to_message_id'=>$message_id,
        'disable_web_page_preview'=>true,
        'parse_mode'=>"MarkDown",
        'reply_markup'=>json_encode([
           'keyboard'=>[
 [['text'=>"▫️بازگشت به منوی اصلی▫️"]]
 ],
  "resize_keyboard"=>true,
    ])
    ]);
    } elseif($command == "pmall" and $textmessage != "▫️بازگشت به منوی اصلی▫️"){
    Source_Home('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"پیام همگانی ارسال شد",
        'reply_to_message_id'=>$message_id,
        'disable_web_page_preview'=>true,
        'parse_mode'=>"MarkDown",
        'reply_markup'=>json_encode([
           'keyboard'=>[
                    [['text' => "📊 آمار و اطلاعات"]],
                    [['text' => "پیام همگانی"], ['text' => "فروارد همگانی"]],
                    [['text' => "🗂 پشتیبان گیری"]],
                    [['text' => "انبلاک کردن▫️"], ['text' => "▫️بلاک کردن"]],
                    [['text' => "▫️بازگشت به منوی اصلی▫️"]],
 ],
  "resize_keyboard"=>true,
    ])
    ]);
    file_put_contents("data/$from_id/command.txt","");
	$all_member = fopen( "data/members.txt", 'r');
		while( !feof( $all_member)) {
 			$user = fgets( $all_member);
			if($textmessage != null){
			SendMessage($user,$textmessage,"html");
			}
		}
    }
    if ($text == 'فروارد همگانی' and $chat_id == $admin) {
        Source_Home('sendMessage',[
        'chat_id' => $chat_id,
        'text' => "آیا میخواهید فروراد همگانی کنید؟",
        'reply_to_message_id'=>$message_id,
        'parse_mode' => "MarkDown",
        'disable_web_page_preview'=>true,
            'reply_markup' => json_encode([
                'keyboard' => [
                     [['text'=>"آره مطمعنم"],['text'=>"▫️بازگشت به منوی اصلی▫️"]]
                     ],
        "resize_keyboard"=>true,
    ])
    ]);
    } 
    if ($text == 'آره مطمعنم' and $chat_id == $admin) {
    file_put_contents("data/$from_id/command.txt","fwdall");
        Source_Home('sendMessage',[
        'chat_id' => $chat_id,
        'text'=>"لطفا پیام خود را ارسال کنید تا به همه اعضا فروارد کنم",
        'reply_to_message_id'=>$message_id,
        'disable_web_page_preview'=>true,
        'parse_mode'=>"MarkDown",
        'reply_markup'=>json_encode([
           'keyboard'=>[
 [['text'=>"▫️بازگشت به منوی اصلی▫️"]]
 ],
  "resize_keyboard"=>true,
    ])
    ]);
    } elseif($command == "fwdall" and $textmessage != "▫️بازگشت به منوی اصلی▫️"){
    Source_Home('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>"پیام شما به همه اعضا فروراد شد",
        'reply_to_message_id'=>$message_id,
        'disable_web_page_preview'=>true,
        'parse_mode'=>"MarkDown",
        'reply_markup'=> json_encode([
           'keyboard'=>[
                    [['text' => "📊 آمار و اطلاعات"]],
                    [['text' => "پیام همگانی"], ['text' => "فروارد همگانی"]],
                    [['text' => "🗂 پشتیبان گیری"]],
                    [['text' => "انبلاک کردن▫️"], ['text' => "▫️بلاک کردن"]],
                    [['text' => "▫️بازگشت به منوی اصلی▫️"]],
 ],
  "resize_keyboard"=>true,
    ])
    ]);
    file_put_contents("data/$from_id/command.txt","");
    $all_memberr = fopen( "data/members.txt", 'r');
		while( !feof( $all_memberr)) {
 			$userr = fgets( $all_memberr);
ForwardMessage($userr,$admin,$message_id);
		}
    }
//Source_Home//
if ($text == '📊 آمار و اطلاعات' and $chat_id == $admin) {
    sendMessage($chat_id, "📍 تعداد کل کاربران : " . count($memlist) . "\n📌 آخرین وضعیت ربات شما\n📅 تاریخ: $fadate\n⏰ ساعت: $fatime", "HTML");
}
//Source_Home//
if (file_exists("error_log")) unlink("error_log");
}
/*
کانال سورس خونه ! پر از سورس هاي ربات هاي تلگرامي !
لطفا در کانال ما عضو شويد 
@source_home
https://t.me/source_home
*/
?>
