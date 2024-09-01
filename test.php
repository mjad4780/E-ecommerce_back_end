<?php
include 'connect.php';
include 'functions.php';

// sendOneSignalNotification('ffffffff','ddddddd','all','none','none','https://letsenhance.io/static/03620c83508fc72c6d2b218c7e304ba5/11499/UpscalerAfter.jpg');
    // sendnotification('','ddddddd','gggggggg','https://letsenhance.io/static/03620c83508fc72c6d2b218c7e304ba5/11499/UpscalerAfter.jpg');





































// function sendOneSignalNotification($title, $message, $segment, $pageid, $pagename, $image)
// {
//     $url = 'https://onesignal.com/api/v1/notifications';

//     $fields = array(
//         'app_id' => '9c37a804-6bb8-4055-96f4-a56308ae8b63', // ضع معرف تطبيق OneSignal الخاص بك هنا
//         'included_segments' => array('All'), // إرسال الإشعار إلى جميع المستخدمين
//         'headings' => array(
//             "en" => $title // عنوان الإشعار
//         ),
//         'contents' => array(
//             "en" => $message // نص الإشعار
//         ),
//         'data' => array(
//             "pageid" => $pageid,
//             "pagename" => $pagename // بيانات إضافية يمكن تمريرها مع الإشعار
//         ),
//         'ios_attachments' => array(
//             "image" => $image // صورة مرفقة للإشعار في iOS
//         ),
//         'big_picture' => $image,  // الصورة الكبيرة للإشعار في Android
//         'android_channel_id' => 'YOUR_ANDROID_CHANNEL_ID',  // معرف قناة الإشعار في Android (اختياري)
//         'small_icon' => 'icon',  // رمز صغير للإشعار (يمكنك تخصيصه)
//         'large_icon' => 'icon',  // رمز كبير للإشعار (يمكنك تخصيصه)
//         'ios_sound' => 'default',  // الصوت المستخدم في iOS
//         'android_sound' => 'default'  // الصوت المستخدم في Android
//     );

//     $fields = json_encode($fields);
//     $headers = array(
//         'Authorization: YTBiZmZhY2QtYjJkYS00Zjc4LWI5MWUtMTg2MTA0ZTJkNzhh', // ضع مفتاح REST API الخاص بـ OneSignal هنا
//         'Content-Type: application/json'
//     );

//     $ch = curl_init();
//     curl_setopt($ch, CURLOPT_URL, $url);
//     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);

//     $result = curl_exec($ch);
//     curl_close($ch);

//     return $result;
// }
