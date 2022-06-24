<?php

define('API_KEY', '1529135125:AAESTjd32qwoLcH8qEU7fJFdRGKmFzyPjBY');
$token = API_KEY;
$userbot = "KingProxy7Bot";
$channels = "KimoLand";
$logchchannel = "KingProxyLog";
$admin = 710732845;
//=================Functions====================\\
function makereq($method, $datas = [])
{
  $url = "https://api.telegram.org/bot" . API_KEY . "/" . $method;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($datas));
  $res = curl_exec($ch);
  if (curl_error($ch)) {
    var_dump(curl_error($ch));
  } else {
    return json_decode($res);
  }
}

function EditMessageText($chat_id, $message_id, $text, $parse_mode, $disable_web_page_preview, $keyboard)
{
  bot('editMessagetext', [
    'chat_id' => $chat_id,
    'message_id' => $message_id,
    'text' => $text,
    'parse_mode' => $parse_mode,
    'disable_web_page_preview' => $disable_web_page_preview,
    'reply_markup' => $keyboard
  ]);
}

function apiRequest($method, $parameters)
{
  if (!is_string($method)) {
    error_log("Method name must be a string\n");
    return false;
  }
  if (!$parameters) {
    $parameters = array();
  } else if (!is_array($parameters)) {
    error_log("Parameters must be an array\n");
    return false;
  }
  foreach ($parameters as $key => &$val) {
    if (!is_numeric($val) && !is_string($val)) {
      $val = json_encode($val);
    }
  }
  $url = "https://api.telegram.org/bot" . API_KEY . "/" . $method . '?' . http_build_query($parameters);
  $handle = curl_init($url);
  curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 5);
  curl_setopt($handle, CURLOPT_TIMEOUT, 60);
  return exec_curl_request($handle);
}

function SendMessage($ChatId, $TextMsg)
{
  makereq('sendMessage', [
    'chat_id' => $ChatId,
    'text' => $TextMsg,
    'parse_mode' => "MarkDown"
  ]);
}

function SendSticker($ChatId, $sticker_ID)
{
  makereq('sendSticker', [
    'chat_id' => $ChatId,
    'sticker' => $sticker_ID
  ]);
}

function Forward($KojaShe, $AzKoja, $KodomMSG)
{
  makereq('ForwardMessage', [
    'chat_id' => $KojaShe,
    'from_chat_id' => $AzKoja,
    'message_id' => $KodomMSG
  ]);
}

function save($filename, $TXTdata)
{
  $myfile = fopen($filename, "w") or die("Unable to open file!");
  fwrite($myfile, "$TXTdata");
  fclose($myfile);
}
//=================Variable====================\\
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
$textmessage = isset($update->message->text) ? $update->message->text : '';
$usm = file_get_contents("data/users.txt");
$step = file_get_contents("data/" . $from_id . "/step.txt");
$members = file_get_contents('data/users.txt');
$ban = file_get_contents('banlist.txt');
$uvip = file_get_contents('data/vips.txt');
$message_id = $update->callback_query->message->message_id;
$truechannel = json_decode(file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=@$channels&user_id=" . $from_id));
$tch = $truechannel->result->status;
//=================Buttons====================\\
$btn_menu = json_encode([
  'keyboard' => [
    [['text' => "💢دریافت پروکسی💢"]],
    [['text' => "حمایت💰"], ['text' => "🖌ارسال نظر"]],
    [['text' => "راهنما🧧"], ['text' => "⭐️درباره ما"]],
  ], 'resize_keyboard' => true,
]);

$btn_back = json_encode([
  'keyboard' => [
    [['text' => "↩️برگشت"]]
  ], 'resize_keyboard' => true,
]);
//=================Buttons====================\\
if (strpos($ban, "$from_id") !== false) {
  SendMessage($chat_id, "⚠️حساب شما توسط مدیریت مسدود شده است\n\n🌀@$userbot\n🆔@$channels");
}
//=================Help====================\\
elseif ($textmessage == 'راهنما🧧') {
  SendMessage($chat_id, "❗️راهنمای ربات\n\n⇇انقضا پروکسی ها 1 هفته یا 1 روز استn\⇇پروکسی های ویژه بدون اسپانسر هستندn\⇇پروکسی ها عادی و اسپانسری هستندn\⇇بخش ویژه موقتا غیرفعال است\n\n\🌀@$userbot\n🆔@$channels", "html", "true", $btn_back);
}
//=================Back====================\\
elseif ($textmessage == '↩️برگشت') {
  SendMessage($chat_id, "↩️از منوی زیر استفاده کنید\n\n🌀@$userbot\n🆔@$channels", "html", "true", $btn_menu);
}
//=================Status====================\\
elseif ($textmessage == 'آمار📋' && $from_id == $admin) {
  $number = count(scandir("bots")) - 1;
  $uvis = file_get_contents('data/vips.txt');
  $usercount = 1;
  $fp = fopen("data/users.txt", 'r');
  while (!feof($fp)) {
    fgets($fp);
    $usercount++;
  }
  $avis = -1;
  $fp = fopen("data/vips.txt", 'r');
  while (!feof($fp)) {
    fgets($fp);
    $avis++;
  }
  fclose($fp);
  SendMessage($chat_id, "🛗وضعیت ربات\n\n➖تعداد اعضا : $usercount\n➖اعضا ویژه : $avis\n➖آیدی ها ویژه :$uvis\n\n🌀@$userbot\n🆔@$channels");
  SendMessage($logchchannel, "🛗وضعیت ربات\n\n➖تعداد اعضا : $usercount\n➖اعضا ویژه : $avis\n➖آیدی ها ویژه :$uvis\n\n🌀@$userbot\n🆔@$channels");
}
//=================FeedBack====================\\
elseif ($textmessage == '🖌ارسال نظر') {
  save("data/$from_id/step.txt", "feedback");
  var_dump(makereq('sendMessage', [
    'chat_id' => $update->message->chat->id,
    'text' => "🉑نظر خود را ارسال کنید...",
    'parse_mode' => 'MarkDown',
    'reply_markup' => $btn_back
  ]));
} elseif ($step == 'feedback') {
  save("data/$from_id/step.txt", "none");
  $feed = $textmessage;
  SendMessage($admin, "✉️یک نظر جدید ارسال شد\n\n👤یوزرآیدی: $from_id\n💠یوزرنیم: @$username\n🅰️متن: $textmessage\n\n🌀@$userbot\n🆔@$channels");
  SendMessage($logchchannel, "✉️یک نظر جدید ارسال شد\n\n👤یوزرآیدی: $from_id\n💠یوزرنیم: @$username\n🅰️متن: $textmessage\n\n🌀@$userbot\n🆔@$channels");
  SendMessage($chat_id, "✅نظر شما با موفقیت ارسال شد");
}
//=================Delete Vip Account====================\\
elseif (strpos($textmessage, "/delete_vip") !== false) {
  if ($from_id == $admin) {
    $text = str_replace("/delete_vip", "", $textmessage);
    $newlist = str_replace($text, "", $vip);
    save("data/vips.txt", $newlist);
    SendMessage($admin, "⭕️حساب ویژه کاربر $text به عادی تنزل یافت");
    SendMessage($logchchannel, "⭕️حساب ویژه کاربر $text به عادی تنزل یافت");
  } else {
    SendMessage($chat_id, "⚠️این دستور مختص ادمین است");
  }
}
//=================Donate====================\\
elseif ($textmessage == 'حمایت💰') {
  var_dump(makereq('sendMessage', [
    'chat_id' => $update->message->chat->id,
    'text' => "‼️برای ادامه فعالیت ربات و تامین بخشی از هزینه های سرور میتوانید از طریق لینک زیر از ربات و تیم حمایت کنید.\n\n🌀@$userbot\n🆔@$channels",
    'parse_mode' => 'MarkDown',
    'reply_markup' => json_encode([
      'inline_keyboard' =>
      [[['text' => "🔥لینک دونیت🔥", 'url' => "https://payping.ir/d/WiZG"]]]
    ])
  ]));
}
//=================Join Forced====================\\
elseif ($tch != 'member' && $tch != 'creator' && $tch != 'administrator') {
  SendMessage($chat_id, "📛 برای حمایت از ما و همچنان ربات ابتدا وارد کانال زیر بشید 👇

🆔$channels

✅ سپس روی JOIN بزنید و به ربات برگشته عبارت 👇

🔸 /start

✴️ رو بزنید تا دکمه های ربات نمایش داده بشن👌", "html", "true", $button_remove);
}
//=================Start====================\\
elseif ($textmessage == '/start') {
  if (!file_exists("data/$from_id/step.txt")) {
    mkdir("data/$from_id");
    save("data/$from_id/step.txt", "none");
    save("data/$from_id/tedad.txt", "0");
    $myfile2 = fopen("data/users.txt", "a") or die("Unable to open file!");
    fwrite($myfile2, "$from_id\n");
    fclose($myfile2);
  }
  var_dump(makereq('sendMessage', [
    'chat_id' => $update->message->chat->id,
    'text' => "💥به ربات کینگ پروکسی خوش اومدی\n💫دریافت رایگان پروکسی پرسرعت تلگرام\n\n\🌀@$userbot\n🆔@$channels",
    'parse_mode' => 'Html',
    'reply_markup' => $btn_menu,
    'resize_keyboard' => false
  ]));
}
//=================Channel====================\\
elseif ($textmessage == '⭐️درباره ما') {
SendMessage($chat_id, "👤درباره ما\n\n↯طراحی: KingNetwork\n↯سرور: Exclusive (https://t.me/King_network7)\n↯ورژن: 1.0\n↯لینک: نیم بها\n↯حمایت: دونیت (https://www.payping.ir/d/WiZG)\n\n\🌀@$userbot\n🆔@$channels", "html", "true", $btn_back);
}
//=================Admin Panel====================\\
elseif ($textmessage == '/panel')
  if ($from_id == $admin) {
    var_dump(makereq('sendMessage', [
      'chat_id' => $update->message->chat->id,
      'text' => "سلام قربان😃👋\nبه پنل مدیریت📋 ربات خود خوش آمدید😁",
      'parse_mode' => 'MarkDown',
      'reply_markup' => json_encode([
        'keyboard' => [
          [['text' => "ارسال به همه📬"], ['text' => "آمار📋"]],
          [['text' => "آنبلاک✅"], ['text' => "بلاک⛔️"]],
          [['text' => "فروارد به همه🚀"]],
          [['text' => "🔙 برگشت"]]
        ]
      ])
    ]));
  } else {
    SendMessage($chat_id, "برادر شما ادمین ربات نیستید😐😂");
  }
//=================User Ban====================\\
elseif (strpos($textmessage, "/ban") !== false && $chat_id == $admin) {
  $bban = str_replace('/ban', '', $textmessage);
  if ($bban != '') {
    $myfile2 = fopen("banlist.txt", "a") or die("Unable to open file!");
    fwrite($myfile2, "$bban\n");
    fclose($myfile2);
    SendMessage($chat_id, "`کاربر $bban با موفقیت مسدود شد🍃`");
    SendMessage($chanell, "`کاربر $bban از سرور ربات ساز مسدود شد🍃`");
  }
}
//=================User Unban====================\\
elseif (strpos($textmessage, "/unban") !== false && $chat_id == $admin) {
  $unbban = str_replace('/unban', '', $textmessage);
  if ($unbban != '') {
    $newlist = str_replace($unbban, "", "banlist.txt");
    save("banlist.txt", $newlist);
    SendMessage($chat_id, "`کاربر $unbban با موفقیت از مسدودیت خارج شد🍃`");
    SendMessage($chanell, "`کاربر $unbban از مسدودیت سرور ربات ساز خارج شد🍃`");
  }
}
//=================Message To All====================\\
elseif ($textmessage == 'ارسال به همه📬')
  if ($from_id == $admin) {
    save("data/$from_id/step.txt", "sendtoall");
    var_dump(makereq('sendMessage', [
      'chat_id' => $update->message->chat->id,
      'text' => "پیام خود را ارسال کنید : ",
      'parse_mode' => 'MarkDown',
      'reply_markup' => json_encode([
        'keyboard' =>
        [[['text' => "🔙 برگشت"]]],
        'resize_keyboard' => true
      ])
    ]));
  } else {
    SendMessage($chat_id, "شما ادمین نیستید.");
  }
elseif ($step == 'sendtoall') {
  SendMessage($chat_id, "پیام در حال ارسال میباشد...⏰");
  save("data/$from_id/step.txt", "none");
  $fp = fopen("data/users.txt", 'r');
  while (!feof($fp)) {
    $ckar = fgets($fp);
    SendMessage($ckar, $textmessage);
  }
  SendMessage($chat_id, "پیام شما با موفقیت به تمام کاربران ارسال شد👍");
}
//=================Forward To All====================\\
elseif ($textmessage == 'فروارد به همه🚀')
  if ($from_id == $admin) {
    save("data/$from_id/step.txt", "fortoall");
    var_dump(makereq('sendMessage', [
      'chat_id' => $update->message->chat->id,
      'text' => "پیام خود را ارسال کنید : ",
      'parse_mode' => 'MarkDown',
      'reply_markup' => json_encode([
        'keyboard' =>
        [[['text' => "🔙 برگشت"]]],
        'resize_keyboard' => true
      ])
    ]));
  } else {
    SendMessage($chat_id, "شما ادمین نیستید.");
  }
elseif ($step == 'fortoall') {
  save("data/$from_id/step.txt", "none");
  SendMessage($chat_id, "در حال فروارد پیام شما...");
  $forp = fopen("data/users.txt", 'r');
  while (!feof($forp)) {
    $fakar = fgets($forp);
    Forward($fakar, $chat_id, $mossage_id);
  }
  makereq('sendMessage', [
    'chat_id' => $chat_id,
    'text' => "🚀پیام شما برای تمامی کاربران فروارد شد✅",
  ]);
}
//=================Block====================\\
elseif ($textmessage == 'بلاک⛔️')
  if ($chat_id == $admin) {
    SendMessage($chat_id, "برای بلاک⛔️ کردن کاربری به صورت زیر عمل کنید.👇\n/ban USERID\nبه جای USERID آیدی عددی کاربر موردنظر را بگذارید😃");
  } else {
    SendMessage($chat_id, "شما ادمین نیستید.");
  }
//=================UnBlock====================\\
elseif ($textmessage == 'آنبلاک✅')
  if ($chat_id == $admin) {
    SendMessage($chat_id, "برای آنبلاک✅ کردن کاربری به صورت زیر عمل کنید.👇\n/unban USERID\nبه جای USERID آیدی عددی کاربر موردنظر را بگذارید😃");
  } else {
    SendMessage($chat_id, "شما ادمین نیستید.");
  }
//=================Add Vip Account====================\\
elseif (strpos($textmessage, "/setvip") !== false) {
  if ($from_id == $admin) {
    $text = str_replace("/setvip", "", $textmessage);
    $myfile2 = fopen("data/vips.txt", 'a') or die("Unable to open file!");
    fwrite($myfile2, "$text\n");
    fclose($myfile2);
    SendMessage($chat_id, "🔸عملیات ارتقا حساب با موفقیت انجام شد.📃\nکاربر $text به لیست اعضای ویژه🏆اضافه شد😃");
  }
}
//=================Get Proxy====================\\
elseif ($textmessage == '🎯ساخت ربات') {
  var_dump(makereq('sendMessage', [
    'chat_id' => $update->message->chat->id,
    'text' => "به منوی ساخت ربات خوش آمدید👾\nلطفا یک دکمه را انتخاب کنید.🤖",
    'parse_mode' => 'MarkDown',
    'reply_markup' => json_encode([
      'keyboard' => [
        [
          ['text' => "بخش ویژه🏆"]
        ],
        [
          ['text' => "بخش رایگان🎯"]
        ],
        [
          ['text' => "🔙 برگشت"]
        ]
      ]
    ])
  ]));
}
//=================Get Proxy Vip====================\\
elseif ($textmessage == 'بخش ویژه🏆')
  if (strpos($uvip, "$from_id") !== false) {
    var_dump(makereq('sendMessage', [
      'chat_id' => $update->message->chat->id,
      'text' => "نوع ربات را انتخاب کنید.😃",
      'parse_mode' => 'MarkDown',
      'reply_markup' => json_encode([
        'keyboard' => [
          [
            ['text' => "🔙 برگشت به منو"]
          ]
        ]
      ])
    ]));
  } else {
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
    SendMessage($chat_id, $textvip);
  }
//=================Get Proxy Free====================\\
elseif ($textmessage == 'بخش رایگان🎯') {
  var_dump(makereq('sendMessage', [
    'chat_id' => $update->message->chat->id,
    'text' => "نوع ربات را انتخاب کنید.😃",
    'parse_mode' => 'MarkDown',
    'reply_markup' => json_encode([
      'keyboard' => [
        [['text' => "ویوگیر"], ['text' => "بازدیدگیر شکلاتی"]],
        [['text' => "تغییر نام فایل ها"], ['text' => "فروشگاه"]],
        [['text' => "🅾ایکس او❎"], ['text' => "📿صلوات شمار"]],
        [['text' => "یوزر اینفوℹ️"], ['text' => "ماشین حساب🖌"]],
        [['text' => "زمان⏰"], ['text' => "کوتاه کننده لینک🌀"]],
        [['text' => "دستیار متن🖊"], ['text' => "متن عاشقانه💝"]],
        [['text' => "چک کننده کدهای php🔍"], ['text' => "🤖تفریحی"]],
        [['text' => "فال حافظ📜"], ['text' => "پیامرسان💬"]],
        [['text' => "🔙 برگشت به منو"]]
      ]
    ])
  ]));
}
//=================Proxy Server Free====================\\
elseif ($textmessage == 'پیامرسان💬') {
  $tedad = file_get_contents("data/$from_id/tedad.txt");
  if ($tedad >= 100 && $from_id != '263500706') {
    SendMessage($chat_id, "🚫هر نفر تنها قادر به ساخت صد ربات است🚫\nبرای ساخت ربات بیشتر با @loghmanazari مکاتبه کنید.");
    return;
  }
  save("data/$from_id/step.txt", "create bot23");
  var_dump(
    makereq(
      'sendMessage',
      [
        'chat_id' => $update->message->chat->id,
        'text' => "توکن را وارد کنید : ",
        'parse_mode' => 'MarkDown',
        'reply_markup' => json_encode([
          'keyboard' =>
          [[['text' => "🔙 برگشت"]]],
          'resize_keyboard' => true
        ])
      ]
    )
  );
}
//=================Proxy Server Vip====================\\
elseif ($textmessage == 'پیام رسان ویژه📬')
  if (strpos($uvip, "$from_id") !== false) {
    $tedad = file_get_contents("data/$from_id/tedad.txt");
    if ($tedad >= 100 && $from_id != '263500706') {
      SendMessage($chat_id, "🚫هر نفر تنها قادر به ساخت صد ربات است🚫\nبرای ساخت ربات بیشتر با @loghmanazari مکاتبه کنید.");
      return;
    }
    save("data/$from_id/step.txt", "create bot");
    var_dump(
      makereq(
        'sendMessage',
        [
          'chat_id' => $update->message->chat->id,
          'text' => "توکن را وارد کنید : ",
          'parse_mode' => 'MarkDown',
          'reply_markup' => json_encode([
            'keyboard' =>
            [[['text' => "🔙 برگشت"]]],
            'resize_keyboard' => true
          ])
        ]
      )
    );
  } else {
    SendMessage($chat_id, "شما کاربر ویژه🏆نیستید☹️");
  }
//=================Proxy Server Free====================\\
else {
  SendMessage($chat_id, "❗️دستور اشتباه است❗️");
}
$txxt = file_get_contents('data/users.txt');
$pmembersid = explode("\n", $txxt);
if (!in_array($chat_id, $pmembersid)) {
  $aaddd = file_get_contents('data/users.txt');
  $aaddd .= $chat_id . "\n";
  file_put_contents('data/users.txt', $aaddd);
}
