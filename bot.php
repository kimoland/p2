<?php

set_time_limit(0);

ob_start();

$API_KEY = '1529135125:AAESTjd32qwoLcH8qEU7fJFdRGKmFzyPjBY';
##------------------------------##
define('API_KEY', $API_KEY);
function bot($method, $datas = [])
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

function sendmessage($chat_id, $text)
{
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => $text,
        'parse_mode' => "MarkDown"
    ]);
}

function deletemessage($chat_id, $message_id)
{
    bot('deletemessage', [
        'chat_id' => $chat_id,
        'message_id' => $message_id,
    ]);
}

function sendaction($chat_id, $action)
{
    bot('sendchataction', [
        'chat_id' => $chat_id,
        'action' => $action
    ]);
}

function Forward($KojaShe, $AzKoja, $KodomMSG)
{
    bot('ForwardMessage', [
        'chat_id' => $KojaShe,
        'from_chat_id' => $AzKoja,
        'message_id' => $KodomMSG
    ]);
}

function sendphoto($chat_id, $photo, $action)
{
    bot('sendphoto', [
        'chat_id' => $chat_id,
        'photo' => $photo,
        'action' => $action
    ]);
}

function objectToArrays($object)
{
    if (!is_object($object) && !is_array($object)) {
        return $object;
    }
    if (is_object($object)) {
        $object = get_object_vars($object);
    }
    return array_map("objectToArrays", $object);
}


//====================ᵗᶦᵏᵃᵖᵖ======================//
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$channel_post = $update->message->channel_post;
$code = file_get_contents("data/code.txt");
$code2 = file_get_contents("data/code2.txt");
$chid = $update->channel_post->message->message_id;
$chat_id = $message->chat->id;
$message_id = $message->message_id;
$from_id = $message->from->id;
$c_id = $message->forward_from_chat->id;
$forward_id = $update->message->forward_from->id;
$forward_chat = $update->message->forward_from_chat;
$forward_chat_username = $update->message->forward_from_chat->username;
$forward_chat_msg_id = $update->message->forward_from_message_id;
@$shoklt = file_get_contents("data/$chat_id/shoklat.txt");
@$penlist = file_get_contents("data/pen.txt");
$text = $message->text;
@mkdir("data/$chat_id");
@$ali = file_get_contents("data/$chat_id/ali.txt");
@$list = file_get_contents("users.txt");
$ADMIN = 185610082;
$idbot = file_get_contents("data/idbot.txt");
$uadmin = 710732845;
$frosh = file_get_contents("data/frosh.txt");
$sharzh_h1000 = file_get_contents("data/channel.txt");
$sharzh_ir300 = file_get_contents("data/channel2.txt");
$listbon = file_get_contents("data/pen.txt");
$chatid = $update->callback_query->message->chat->id;
$data = $update->callback_query->data;
$message_id2 = $update->callback_query->message->message_id;
$fromm_id = $update->inline_query->from->id;
$fromm_user = $update->inline_query->from->username;
$inline_query = $update->inline_query;
$query_id = $inline_query->id;
//====================ᵗᶦᵏᵃᵖᵖ======================//
if ($text == "/start") {

        $user = file_get_contents('users.txt');
        $members = explode("\n", $user);
        if (!in_array($from_id, $members)) {
            $add_user = file_get_contents('users.txt');
            $add_user .= $from_id . "\n";
            file_put_contents("data/$chat_id/membrs.txt", "0");
            file_put_contents("data/$chat_id/shoklat.txt", "10");
            file_put_contents('users.txt', $add_user);
        }
        file_put_contents("data/$chat_id/ali.txt", "no");
        sendAction($chat_id, 'typing');
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "سلام دوست عزیزم😄

✳️ به ربات شارژ رایگان الماسی✨🌟💎

خوش امدی🌹
با این ربات به آسونی الماس جمع کن و شارژ دریافت کن✅",
            'parse_mode' => "MarkDown",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "💎جمع کردن الماس رایگان💎", 'callback_data' => "d"]
                    ],
                    [
['text' => "دریافت10الماس برای عضویت کانال", 'url' => "http://telegram.me/sssteam"]
                    ],
                    [
                       
                        ['text' => "😎مشخصات کاربر😎", 'callback_data' => "c"], ['text' => "💎انتقال الماس💎", 'callback_data' => "b"]
                    ],
                    [
                        ['text' => "⁉️راهنمای ربات🤔", 'callback_data' => "g"], ['text' => "📊آمار ربات💎", 'callback_data' => "am"]
                  ],
                  [
                        ['text' => "🌟دریافت شارژ رایگان🌟", 'callback_data' => "gemgem"]
                    ],
                    
                ]
            ])
        ]);
    } elseif (strpos($penlist, "$from_id")) {
        SendMessage($chat_id, "کاربر گرامی شما از سرور ما مسدود شده اید لطفا دیگر پیام نفرستید
باتشکر
اگر اشتباهی مسدود شدید به مدیریت خبر دهید تا شمارا ازاد کند
@adamimsss 👈ادمین");
    } elseif (strpos($text, '/start') !== false && $forward_chat_username == null) {
        $newid = str_replace("/start ", "", $text);
        if ($from_id == $newid) {
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "شما نمی توانید با لینک دعوت خود عضو ربات شوید و سکه ای دریافت نمی کنید✅",
            ]);
        } elseif (strpos($list, "$from_id") !== false) {
            SendMessage($chat_id, "شما قبلا در این ربات عضو شده بودید و نمی توانید با لینک اختصاصی دوستتان عضو ربات شوید");
        } else {
            sendAction($chat_id, 'typing');
            @$sho = file_get_contents("data/$newid/shoklat.txt");
            $getsho = $sho + 10;
            file_put_contents("data/$newid/shoklat.txt", $getsho);
            @$sea = file_get_contents("data/$newid/membrs.txt");
            $getsea = $sea + 1;
            file_put_contents("data/$newid/membrs.txt", $getsea);
            $user = file_get_contents('users.txt');
            $members = explode("\n", $user);
            if (!in_array($from_id, $members)) {
                $add_user = file_get_contents('users.txt');
                $add_user .= $from_id . "\n";
                file_put_contents("data/$chat_id/membrs.txt", "0");
                file_put_contents("data/$chat_id/shoklat.txt", "10");
                file_put_contents('users.txt', $add_user);
            }
            file_put_contents("data/$chat_id/ali.txt", "No");
            sendmessage($chat_id, "تبریک شما با دعوت کاربر $newid عضو ربات ما شدید❤️");
            bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' => "سلام دوست عزیزم😄

✳️ به ربات شارژ رایگان الماسی✨🌟💎

خوش امدی🌹
با این ربات به آسونی الماس جمع کن و شارژ دریافت کن✅",
                'parse_mode' => "MarkDown",
                'reply_markup' => json_encode([
                    'inline_keyboard' => [
                      [
                        ['text' => "💎جمع کردن الماس رایگان💎", 'callback_data' => "d"]
                    ],
                    [
['text' => "دریافت10الماس برای عضویت کانال", 'url' => "http://telegram.me/sssteam"]
                   ],
                   [
                        ['text' => "😎مشخصات کاربر😎", 'callback_data' => "c"], ['text' => "💎انتقال الماس💎", 'callback_data' => "b"]
                    ],
                    [
                        ['text' => "⁉️راهنمای ربات🤔", 'callback_data' => "g"], ['text' => "📊آمار ربات💎", 'callback_data' => "am"]
                  ],
                  [
                        ['text' => "🌟دریافت شارژ رایگان🌟", 'callback_data' => "gemgem"]
                        ],
                    ]
                ])
            ]);
            SendMessage($newid, "تبریک یکی با لینک اختصاصی شما وارد ربات شد و 💎10
الماس دریافت کردید");
        }
    }
    elseif ($data == "home") {
    unlink("cod/$chatid.txt");
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "کمی صبر کنید",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "no");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "
به منوی اصلی برگشتید🙂
با من به اسانی برای بنرتان بازدید دریافت کنید
لطفا از گزینه های زیر استفاده کنید✅

",
            'parse_mode' => "MarkDown",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "💎جمع کردن الماس رایگان💎", 'callback_data' => "d"]
                    ],
                    [
['text' => "دریافت10الماس برای عضویت کانال", 'url' => "https://telegram.me/joinchat/AAAAAEOpk9e-IYi6FVPJLQ"]
                    ],
                    [
                       
                        ['text' => "😎مشخصات کاربر😎", 'callback_data' => "c"], ['text' => "💎انتقال الماس💎", 'callback_data' => "b"]
                    ],
                    [
                        ['text' => "⁉️راهنمای ربات🤔", 'callback_data' => "g"], ['text' => "📊آمار ربات💎", 'callback_data' => "am"]
                  ],
                  [
                        ['text' => "🌟دریافت شارژ رایگان🌟", 'callback_data' => "gemgem"]
                    ],
                ]
            ])
        ]);


            file_put_contents("data/$chatid/ali.txt", "no");
            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "
به منوی اصلی برگشتید🙂

با من به اسانی برای خود شارژ رایگان جمع اوری کنید
لطفا یک‌گزینه انتخاب کنید✅

",
                'parse_mode' => "MarkDown",
                'reply_markup' => json_encode([
                    'inline_keyboard' => [
                    [
                        ['text' => "💎جمع کردن الماس رایگان💎", 'callback_data' => "d"]
                    ],
                    [
['text' => "دریافت10الماس برای عضویت کانال", 'url' => "http://telegram.me/sssteam"]
                    ],
                    [
                       
                        ['text' => "😎مشخصات کاربر😎", 'callback_data' => "c"], ['text' => "💎انتقال الماس💎", 'callback_data' => "b"]
                    ],
                    [
                        ['text' => "⁉️راهنمای ربات🤔", 'callback_data' => "g"], ['text' => "📊آمار ربات💎", 'callback_data' => "am"]
                  ],
                  [
                        ['text' => "🌟دریافت شارژ رایگان🌟", 'callback_data' => "gemgem"]
                    ],  
                  ]
               ])
            ]);
     } elseif ($data == "d") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "کمی صبر کنید",
            'show_alert' => false
        ]);
        bot('sendmessage', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "ربات شارژ رایگان الماسی🌟💎

به آسانی فقط با دعوت 10نفر کد شارژ اپراتور مورد نظر خودتون رو دریافت نمایید


با این ربات کسب درامد کنید🌟✅💰

برای عضو شدن کافیست فقط روی لینک زیر بزنید
این ربات 100%تضمینی است💯👇
http://telegram.me/gemsharzhsss_bot?start=$chatid
〰〰〰〰〰〰〰〰〰
ساخته شده توسط بزرگ برنامه نویسی💻🌟: @sssteam",
        ]);
        bot('sendmessage', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "سلام کاربر عزیز به بخش زیر مجموعه گیری خوش اومدی

با دعوت هر نفر 10الماس دریافت میکنی یعنی معادل دعوت 10نفر میتونی شارژ دریافت کنی

برای دعوت کافیه بنر بالا رو برای دوستات بفرستی",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "حله بریم منوی اصلی❤️", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    } elseif ($data == "gemgem") {
        file_put_contents("data/$chatid/ted.txt", "100");
        $aaa = file_get_contents("data/$chatid/ted.txt");
        $shoklt = file_get_contents("data/$chatid/shoklat.txt");
        if ($shoklt < $aaa) {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "ببخشید تعداد الماس های شما برای دریافت شارژ کافی نیست❌
تعداد الماس های شما: $sho💎",
                'show_alert' => true
            ]);
        } else {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "کمی صبر کنید",
                'show_alert' => false
            ]);
            file_put_contents("data/$chatid/ali.txt", "seen2");

            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "خوب حالا یک متن از یک چنل عمومی فروارد کنید و به این ربات بفرستید

تا ربات چنل را بعنوان پشتیبان موقت در نظربگیرد

تا اگر تقلبی در کار شما باشد ربات تشخیص دهد",
            ]);
        }
    } elseif ($data == "f") {
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "$frosh
@",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "بازگشت به منوی اصلی ", 'callback_data' => "home"]
                   ],
                ]
            ])
       ]);
    } elseif ($ali == "seen2") {
        if ($forward_chat_username != null) {
            $msg_id = bot('ForwardMessage', [
                'chat_id' => @m46sss,
                'from_chat_id' => "@$forward_chat_username",
                'message_id' => $forward_chat_msg_id
            ])->result->message_id;
            bot('sendMessage', [
                'chat_id' => @m46sss,
                'text' => "‌👆👆شارژ جدید",
                'reply_to_message_id' => $msg_id,
                'parse_mode' => "MarkDown",
                'reply_markup' => json_encode([
                    'inline_keyboard' => [
                        [
                            ['text' => "....", 'callback_data' => "33578"], ['text' => "...", 'callback_data' => "yyy44"]
                        ],
                    ]
                ])
            ]);

             $al = file_get_contents("data/$chat_id/ted.txt");
            $sho = file_get_contents("data/$chat_id/shoklat.txt");
            $getsho = $sho - $al;
            file_put_contents("data/$chat_id/shoklat.txt", $getsho);
             $don = file_get_contents("data/done.txt");
             $getdon = $don + 1;
            file_put_contents("data/done.txt", $getdon);
            file_put_contents("ads/cont/$msg_id.txt", $al);
            file_put_contents("ads/date/$msg_id.txt", $fadate);
            file_put_contents("ads/time/$msg_id.txt", $fatime);
            file_put_contents("ads/admin/$msg_id.txt", $chat_id);
            file_put_contents("ads/seen/$msg_id.txt", "0");
            file_put_contents("ads/user/$msg_id.txt", "");
            file_put_contents("data/$chat_id/ali.txt", "no");
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "خوب کاربر گرامی حالا اپراتور و مقدار شارژتون رو مشخص کنید",
                'reply_to_message_id' => $msg_id,
                'parse_mode' => "MarkDown",
                'reply_markup' => json_encode([
                    'inline_keyboard' => [
                        [
                            ['text' => "دوهزارتومانی همراه اول", 'callback_data' => "ok"]
                    ],
                    [
                        ['text' => "دوهزارتومانی ایرانسل", 'callback_data' => "spam"]
                        ],
                    ]
                ])
            ]);
        } else {
            sendmessage($chat_id, "دوست عزیز فقط کافیست یک متن از چنل به ربات بفرستید
تا شارژ را دریافت کنید");
       }
    } elseif ($data == "c") {
        @$sho = file_get_contents("data/$chatid/shoklat.txt");
        @$sea = file_get_contents("data/$chatid/membrs.txt");
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "
        
        ایدی عددی شما : $chatid
        تعداد الماس های شما💎 : $sho
        زیرمجموعه شما : $sea",
            'show_alert' => true
        ]);
    } elseif ($data == "ok") {
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "خوب کاربر عزیز کد شارژ👇
$sharzh_h1000
〰〰〰〰〰〰〰〰〰〰〰
درصورت نبودن کد از این صفحه عکس بگیرید و به ادمین بفرستید تا الماس های خود را پس بگیرید
👇ادمین👇
http://telegram.me/masigsansss_bot",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "بازگشت به منوی اصلی ", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    } elseif ($data == "spam") {
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "کدشارژ👇
$sharzh_ir300
درصورت نبودن کد شارژ از صفحه عکس بگیرید و به پیامرسان ادمین رفته و به ادمین دهید و الماس های خود را پس بگیرید
ادمین👇
http://telegram.me/masigsansss_bot ",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "بازگشت به منوی اصلی ", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    } elseif ($data == "g") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "کار با این ربات خیلی راحته
روی دکمه الماس رایگان بزنید
نفرات دعوت کنید👥
الماس جمع کنید💎✅
و شارژ دریافت کنید✨",
            'show_alert' => true
        ]);
    } elseif ($data == "b") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "کمی صبر کنید",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "for");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "لطفا پیامی از کاربری که میخواهید برایش الماس انتقال دهید بفرستید✅💎",
        ]);
    } elseif ($ali == "for") {
        if ($from_id == $forward_id) {
            SendMessage($chat_id, "شرمنده پیام خودتون را برام فروارد نکنید☹️️");
        } else {
            if (strpos($list, "$forward_id") !== false) {
                file_put_contents("data/$chat_id/ali.txt", "fore");
                file_put_contents("data/$chat_id/for.txt", $forward_id);
                bot('sendMessage', [
                    'chat_id' => $chat_id,
                    'text' => "خوب چه مقدار الماس💎 میخواهید برای کاربر $forward_id انتقال بدید😊 ",
                    'reply_markup' => json_encode([
                        'inline_keyboard' => [
                            [
                                ['text' => "ولش بریم منوی اصلی🙃", 'callback_data' => "home"]
                            ],
                        ]
                    ])
                ]);
            } else {
                SendMessage($chat_id, "شرمنده این کاربر در ربات ما عضو نمیباشد☹️");
            }
        }
    } elseif ($ali == "fore") {
        if (preg_match('/^([0-9])/', $text)) {
            if ($shoklt > $text) {
                $fr = file_get_contents("data/$chat_id/for.txt");
                $fle = file_get_contents("data/$fr/shoklat.txt");
                $fl = file_get_contents("data/$chat_id/shoklat.txt");
                $s = $text;
                $getsh = $fl - $s;
                file_put_contents("data/$chat_id/shoklat.txt", $getsh);
                SendMessage($chat_id, "الماس💎 های شما با موفقیت به کاربر مورد نظر شما انتقال داده شدند");
                $getshe = $fle + $s;
                file_put_contents("data/$fr/shoklat.txt", $getshe);
                SendMessage($fr, "تبریک کاربر $chat_id برای شما $text الماس انتقال داد💎🙃");
            } else {
                SendMessage($chat_id, "ببخشید الماس های شما کافی نیست
حداقل باید 1الماس💎
داشته باشید و‌شما ندارید");
            }
        } else {
            SendMessage($chat_id, "خوب کاربر عزیز یه عدد فقط بصورت لاتین بفرستید 😶");
        }
    }

////----
if ($chatid == $ADMIN or $chat_id == $ADMIN) {
    if ($text == "مدیریت") {
        file_put_contents("data/$chat_id/ali.txt", "no");
        sendAction($chat_id, 'typing');
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "ادمین گرامی به پنل مدیریت خود خوش امدید",
            'parse_mode' => "MarkDown",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "📊آمار📊", 'callback_data' => "am"]
                    ],
                    [
                        ['text' => "ارسال پیام به همه کاربران🙂", 'callback_data' => "send"], ['text' => "فروارد همگانی🤓", 'callback_data' => "fwd"]
                    ],
                    [
                        ['text' => "بلاک کردن کاربر🤓", 'callback_data' => "pen"], ['text' => "✅انبلاک کردن✅", 'callback_data' => "unpen"]
                    ],
                    [
                        ['text' => "تنظیم کد شارژ همراه اول", 'callback_data' => "setc"]
                    ],
                       [
                        ['text' => "الماس به کاربر", 'callback_data' => "buy"]
                  ],
                  [
                        ['text' => "تنظیم کد شارژ ایرانسل✅", 'callback_data' => "setc2"]
                  ],
                  [
                        ['text' => "❔راهنمای ادمین👤", 'callback_data' => "helpadmin"], ['text' => "⚫لیست سیاه⚫", 'callback_data' => "listbon"]
                    ]
                ]
            ])
        ]);
    } elseif ($data == "am") {
        $user = file_get_contents("users.txt");
        $member_id = explode("\n", $user);
        $member_count = count($member_id) - 1;
        @$don = file_get_contents("data/done.txt");
        @$enf = file_get_contents("data/enf.txt");
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "تعداد اعضای ربات : $member_count",

            'show_alert' => true
        ]);
    } elseif ($data == "send") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "کمی صبر کنید",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "send");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "خوب پیام خودتون را برام بفرستید تا بفرستم برای تمامی کاربران ربات",
        ]);
    } elseif ($ali == "send") {
        file_put_contents("data/$chat_id/ali.txt", "no");
        $fp = fopen("users.txt", 'r');
        while (!feof($fp)) {
            $ckar = fgets($fp);
            sendmessage($ckar, $text);
        }
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "با موفقیت برای همه کاربران ارسال شد",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "حله بریم منوی اصلی", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    } elseif ($data == "fwd") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "کمی صبر کنید",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "fwd");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "خوب پیام خود را فروارد کنید تابه همه اعضا فرستاده شود",
        ]);
    } elseif ($ali == 'fwd') {
        file_put_contents("data/$chat_id/ali.txt", "no");
        $forp = fopen("users.txt", 'r');
        while (!feof($forp)) {
            $fakar = fgets($forp);
            Forward($fakar, $chat_id, $message_id);
        }
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "با موفقیت فروارد شد.",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "حله بریم منوی اصلی", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    } elseif ($data == "pen") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "کمی صبر کنید",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "pen");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "فقط ایدی عددیشو بفرست تا بلاک بشه از ربات😡",
        ]);
    } elseif ($ali == 'pen') {
        $myfile2 = fopen("data/pen.txt", 'a') or die("Unable to open file!");
        fwrite($myfile2, "$text\n");
        fclose($myfile2);
        file_put_contents("data/$chat_id/ali.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => " با موفقیت بلاکش کردم😤
 ایدیش هم 
 $text ",
            'parse_mode' => "MarkDown",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "حله بریم منوی اصلی", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    } elseif ($data == "unpen") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "کمی صبر کنید",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "unpen");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "برای انبلاک کردن فرد کافیست ایدی عددی اون را بفرستید",
        ]);
    } elseif ($ali == 'unpen') {
        $newlist = str_replace($text, "", $penlist);
        file_put_contents("data/pen.txt", $newlist);
        file_put_contents("data/$chat_id/ali.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "حله انبلاک کردمش
 ایدیش هم 
 $text ",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "حله بریم منوی اصلی", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    } 
    elseif ($data == "setc") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "کمی صبر کنید",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "setc");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "خوب رمز(کد)شارژ را ارسال نمایید✅",
        ]);
    } elseif ($ali == 'setc') {
        file_put_contents("data/channel.txt", $text);
        file_put_contents("data/$chat_id/ali.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "کد $text
با موفقیت در دکمه شارژ همراه اول قرار گرفت✅",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "حله بریم منوی اصلی", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    } 
     elseif ($data == "setc2") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "کمی صبر کنید",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "setc2");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "خوب رمز(کد)شارژ را ارسال نمایید تا در دکمه شارژ رایگان ایرانسل قرار بگیرد",
        ]);
    } elseif ($ali == 'setc2') {
        file_put_contents("data/channel2.txt", $text);
        file_put_contents("data/$chat_id/ali.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "با موفقیت کد شارژ در دکمه ایرانسل ثبت شد",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "حله بریم منوی اصلی", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
        
        
        
        
        
    }
     elseif ($data == "buy") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "کمی صبر کنید",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "buy");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "خوب ایدی عددی کاربر را بفرست️",
        ]);
    }elseif ($ali == 'buy') {
        file_put_contents("data/buy.txt", $text);
        file_put_contents("data/$chat_id/ali.txt", "buy2");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "خوب تعداد الماس ها چقدر باشه",
            'parse_mode' => "MarkDown"
        ]);
    } elseif ($ali == 'buy2') {
    $buy = file_get_contents("data/buy.txt");
          $fle = file_get_contents("data/$buy/shoklat.txt");
               $getshe = $fle + $text;
                file_put_contents("data/$buy/shoklat.txt", $getshe);
        file_put_contents("data/$chat_id/ali.txt", "");
        bot('sendMessage', [
            'chat_id' => $buy,
            'text' => "کاربر ربات شارژ رایگان الماسی💎
از طرف مدیریت ربات  تعداد $text الماس💎 به حساب شما واریز شد😊",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "حله بریم منوی اصلی", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    }

}
?>
