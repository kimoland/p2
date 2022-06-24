<?php 

ob_start();
/* Token Bot */
define('API_KEY','1529135125:AAESTjd32qwoLcH8qEU7fJFdRGKmFzyPjBY');
/* Admin List */
$fileadmins = file_get_contents("administrative/admin.txt");
$arrayadmins = array($fileadmins);
$admin = "710732845";
$adminlist = "710732845";
$kanal = "@KimoLand";
$GetINFObot = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getMe"));
$UserNameBot = $GetINFObot->result->username;
/* Tabee Save */
function save($filename,$TXTdata){
	$myfile = fopen($filename, "w") or die("Unable to open file!");
	fwrite($myfile, "$TXTdata");
	fclose($myfile);
	}
/* Tabee getFileList */
function getFileList($folderName, $fileType = "")
{
    if (substr($folderName, strlen($folderName) - 1) != "/") {
        $folderName .= '/';
    }

	$c=0;
    foreach (glob($folderName . '*' . $fileType) as $filename) {
        if (is_dir($filename)) {
            $type = 'folder';
        } else {
            $type = 'file';
        }
        $c++;
    }
	return $c;

}
/* Tabee numberformat */
function numberformat($str, $sep = ',')
{
    $result = '';
    $c = 0;
    $num = strlen("$str");
    for ($i = $num - 1; $i >= 0; $i--) {
        if ($c == 3) {
            $result = $sep . $result;
            $result = $str[$i] . $result;
            $c = 0;
        } else {
            $result = $str[$i] . $result;
        }
        $c++;
    }
    return $result;
}
	/* Zip Aechive */
function create_zip($files = array(),$destination = '') {
    if(file_exists($destination)) { return false; }
    $valid_files = array();
    if(is_array($files)) {
        foreach($files as $file) {
            if(file_exists($file)) {
                $valid_files[] = $file;
            }
        }
    }
    if(count($valid_files)) {
        $zip = new ZipArchive();
        if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
            return false;
        }
        foreach($valid_files as $file) {
            $zip->addFile($file,$file);
        }
        $zip->close();
        return file_exists($destination);
    }
    else
    {
        return false;
    }
} 
/* Button */
$button_manage = json_encode(['keyboard'=>[
[['text'=>'🤗ویژه کردن ربات ساز😎']],
    [['text'=>'ویژه کردن تغییر نام فایل📝'],['text'=>'💬ویژه کردن چت ناشناس']],
    [['text'=>'✉️ویژه کردن تبچی'],['text'=>'🔑ویژه کردن ضد لینک']],
    [['text'=>'⚜️ویژه کردن ربات فروشگاه ساز'],['text'=>'ویژه کردن بنردهی']],
[['text'=>'⚜️ویژه کردن ربات ویوگیر️'],['text'=>'⚜️ویژه کردن ربات پیام رسان']],
[['text'=>'⭕️لغو حساب ویژه'],['text'=>'🤖ربات دوم']],
[['text'=>'❌حذف ربات'],['text'=>'📡لیست افراد بلاک شده']],
[['text'=>'📭پیام همگانی'],['text'=>'📮فوروارد همگانی']],
[['text'=>'📟تبلیغات'],['text'=>'☢کد رایگان']],
[['text'=>'↩️منوی اصلی']],
],'resize_keyboard'=>true]);
$button_vip_code = json_encode(['keyboard'=>[
[['text'=>'🔝ویژه کردن ویوگیر🔝']],
[['text'=>'🔝ویژه کردن پیام رسان🔝']],
[['text'=>'↩️منوی اصلی']],
],'resize_keyboard'=>true]);
$button_official_admin = json_encode(['keyboard'=>[
[['text'=>'🛠ساخت ربات🛠'],['text'=>"❌حذف ربات"]],
[['text'=>"🤖 ویژه کردن رایگان🔱"],['text'=>"🎁استفاده از کد🎁"]],
[['text'=>'⚜حساب ویژه'],['text'=>'📈آمار کاربران'],['text'=>'⚠️راهنما']],
[['text'=>'🔹قوانین'],['text'=>'🤖پشتیبانی'],['text'=>'♻️ویژگی ها']],
[['text'=>'🔫گزارش ربات']],
[['text'=>'👤مدیریت']],
],'resize_keyboard'=>true]);
$button_lang = json_encode(['keyboard'=>[
[['text'=>'فارسی 🇮🇷']],
],'resize_keyboard'=>true]);
$button_time = json_encode(['keyboard'=>[
[['text'=>'ساعت⏰'],['text'=>'تاریخ📆']],
[['text'=>'↩️منوی اصلی']],
],'resize_keyboard'=>true]);
$button_vide = json_encode(['keyboard'=>[
[['text'=>'🎥آموزش ساخت ربات🎥'],['text'=>'🎥آموزش حذف ربات🎥']],
[['text'=>'↩️منوی اصلی']],
],'resize_keyboard'=>true]);
$button_bazaryabi = json_encode(['keyboard'=>[
[['text'=>'🔆موجودی امتیازات'],['text'=>'💥دریافت بنر💥']],
[['text'=>'🔝ویژه کردن ربات🔝'],['text'=>'↩️منوی اصلی']],
],'resize_keyboard'=>true]);
$button_official_fa = json_encode(['keyboard'=>[
[['text'=>'🛠ساخت ربات🛠'],['text'=>"❌حذف ربات"]],
[['text'=>"🤖 ویژه کردن رایگان🔱"],['text'=>"🎁استفاده از کد🎁"]],
[['text'=>'⚜حساب ویژه'],['text'=>'📈آمار کاربران'],['text'=>'⚠️راهنما']],
[['text'=>'🔹قوانین'],['text'=>'🤖پشتیبانی'],['text'=>'♻️ویژگی ها']],
[['text'=>'🔫گزارش ربات']],
],'resize_keyboard'=>true]);
$button_back2 = json_encode(['keyboard'=>[
[['text'=>'↩️برگشت به منوی ادمین']],
],'resize_keyboard'=>true]);
$button_create = json_encode(['keyboard'=>[
[['text'=>'🤖ساختـن ربــات ســـــــــاز🤖']],
[['text'=>'💬ساخت ربات پیام رسان'],['text'=>"👁‍🗨ساخت ربات ویو گیر"]],
[['text'=>"📡ساخت ربات ویوگیر پیشرفته😎"],['text'=>"🚀ساخت ربات ضدلینک📡"]],
[['text'=>"📥ساخت ربات بنردهی📥"],['text'=>"🌇ساخت ربات عکس نوشته ساز😎"]],
[['text'=>'📝ساخت ربات تغییر نام فایلها📌'],['text'=>'⛏ساخت ربات فروشگاه ساز🛍']],
[['text'=>'🗞ساخت ربات تبچی💸'],['text'=>'💬ساخت ربات چت ناشناس🗣']],
[['text'=>'↩️منوی اصلی']],
],'resize_keyboard'=>true]);
$button_vipp = json_encode(['keyboard'=>[
[['text'=>'⛏ویژه کردن ویوگیر👁‍🗨'],['text'=>"⛏ویژه کردن پیام رسان💬"]],
[['text'=>'⛏ویژه کردن ویوگیر پیشرفته👁‍🗨'],['text'=>"⛏ویژه کردن فروشگاه ساز🛍"]],
[['text'=>'⛏ویژه کردن بنردهی📥'],['text'=>'⚜️ویژه کردن تغییر نام فایل📝']],
[['text'=>'✉️ویژه کردن تبچی🎈'],['text'=>'🔑ویژه کردن ضد لینک📟']],
[['text'=>'💬ویژه کردن چت ناشناس⚜️']],
[['text'=>'😱ویژه کردن ربات ساز😎']],
[['text'=>'↩️منوی اصلی']],
],'resize_keyboard'=>true]);
$button_official_en = json_encode(['keyboard'=>[
[['text'=>'☢Build a Robot']],
[['text'=>'⚜Special Account'],['text'=>'⚠️Help']],
[['text'=>'⛔️Rules'],['text'=>'👥Support']],
[['text'=>'❇️Facilities'],['text'=>'⭕️Report Violation']],
[['text'=>'🇦🇺 Change Language 🇮🇷']],
],'resize_keyboard'=>true]);
$button_back = json_encode(['keyboard'=>[
[['text'=>'↩️منوی اصلی']],
],'resize_keyboard'=>true]);
$button_back_en = json_encode(['keyboard'=>[
[['text'=>'↩️Back Menu']],
],'resize_keyboard'=>true]);
$button_remove = json_encode(['KeyboardRemove'=>[
],'remove_keyboard'=>true]);
/* Tabee objectToArrays */
function objectToArrays( $object ) {
				if( !is_object( $object ) && !is_array( $object ) )
				{
				return $object;
				}
				if( is_object( $object ) )
				{
				$object = get_object_vars( $object );
				}
			return array_map( "objectToArrays", $object );
			}
/* Tabee Bot OFficial */
function bot($method,$datas=[]){
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
/* Tabee Bot XYZ */
function botXYZ($method,$datas=[]){
    $url = "https://api.pwrtelegram.xyz/bot".API_KEY."/".$method;
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
/* Tabee Send Message */
function SendMessage($chatid,$text,$parsmde,$disable_web_page_preview,$keyboard){
	bot('sendMessage',[
	'chat_id'=>$chatid,
	'text'=>$text,
	'parse_mode'=>$parsmde,
	'disable_web_page_preview'=>$disable_web_page_preview,
	'reply_markup'=>$keyboard
	]);
	}
	/* Tabee Forward Message */
function ForwardMessage($chatid,$from_chat,$message_id){
	bot('ForwardMessage',[
	'chat_id'=>$chatid,
	'from_chat_id'=>$from_chat,
	'message_id'=>$message_id
	]);
	}
	/* Tabee Send Photo */
function SendPhoto($chatid,$photo,$keyboard,$caption){
	bot('SendPhoto',[
	'chat_id'=>$chatid,
	'photo'=>$photo,
	'caption'=>$caption,
	'reply_markup'=>$keyboard
	]);
	}
	/* Tabee Send Audio */
function SendAudio($chatid,$audio,$keyboard,$caption,$sazande,$title){
	bot('SendAudio',[
	'chat_id'=>$chatid,
	'audio'=>$audio,
	'caption'=>$caption,
	'performer'=>$sazande,
	'title'=>$title,
	'reply_markup'=>$keyboard
	]);
	}
	/* Tabee Send Document */
function SendDocument($chatid,$document,$keyboard,$caption){
	bot('SendDocument',[
	'chat_id'=>$chatid,
	'document'=>$document,
	'caption'=>$caption,
	'reply_markup'=>$keyboard
	]);
	}
	/* Tabee Send Sticker */
function SendSticker($chatid,$sticker,$keyboard){
	bot('SendSticker',[
	'chat_id'=>$chatid,
	'sticker'=>$sticker,
	'reply_markup'=>$keyboard
	]);
	}
	/* Tabee Send Video */
function SendVideo($chatid,$video,$caption,$keyboard,$duration){
	bot('SendVideo',[
	'chat_id'=>$chatid,
	'video'=>$video,
        'caption'=>$caption,
	'duration'=>$duration,
	'reply_markup'=>$keyboard
	]);
	}
	/* Tabee Send Voice */
function SendVoice($chatid,$voice,$keyboard,$caption){
	bot('SendVoice',[
	'chat_id'=>$chatid,
	'voice'=>$voice,
	'caption'=>$caption,
	'reply_markup'=>$keyboard
	]);
	}
	/* Tabee Send Contact */
function SendContact($chatid,$first_name,$phone_number,$keyboard){
	bot('SendContact',[
	'chat_id'=>$chatid,
	'first_name'=>$first_name,
	'phone_number'=>$phone_number,
	'reply_markup'=>$keyboard
	]);
	}
	/* Tabee Send Chat Action */
function SendChatAction($chatid,$action){
	bot('sendChatAction',[
	'chat_id'=>$chatid,
	'action'=>$action
	]);
	}
	/* Tabee Kick Chat Member */
function KickChatMember($chatid,$user_id){
	bot('kickChatMember',[
	'chat_id'=>$chatid,
	'user_id'=>$user_id
	]);
	}
	/* Tabee Leave Chat */
function LeaveChat($chatid){
	bot('LeaveChat',[
	'chat_id'=>$chatid
	]);
	}
	/* Tabee Get Chat */
function getChat($idchat){
	$json=file_get_contents('https://api.telegram.org/bot'.API_KEY."/getChat?chat_id=".$idchat);
	$data=json_decode($json,true);
	return $data["result"]["first_name"];
}
	/* Tabee Get Chat Members Count */
function GetChatMembersCount($chatid){
	bot('getChatMembersCount',[
	'chat_id'=>$chatid
	]);
	}
	/* Tabee Get Chat Member */
function GetChatMember($chatid,$userid){
	$truechannel = json_decode(file_get_contents('https://api.telegram.org/bot'.API_KEY."/getChatMember?chat_id=".$chatid."&user_id=".$userid));
	$tch = $truechannel->result->status;
	return $tch;
	}
	/* Tabee Answer Callback Query */
function AnswerCallbackQuery($callback_query_id,$text,$show_alert){
	bot('answerCallbackQuery',[
        'callback_query_id'=>$callback_query_id,
        'text'=>$text,
		'show_alert'=>$show_alert
    ]);
	}
	/* Tabee Edit Message Text */
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
	/* Tabee Edit Message Caption */
function EditMessageCaption($chat_id,$message_id,$caption,$keyboard,$inline_message_id){
	 bot('editMessageCaption',[
    'chat_id'=>$chat_id,
	'message_id'=>$message_id,
    'caption'=>$caption,
    'reply_markup'=>$keyboard,
	'inline_message_id'=>$inline_message_id
	]);
	}
/*
کانال سورس خونه ! پر از سورس هاي ربات هاي تلگرامي !
لطفا در کانال ما عضو شويد 
@source_home
https://t.me/source_home
*/
	?>
