<?php


include "../connect.php";
include '../functions.php';

$amount =filterRequest("amount");
$currency =filterRequest("currency");

// مفتاح API الخاص بـ Stripe
$apiKey = 'sk_test_51Q2cV4G8beASrMkOyt8GSpHEqEPhr1XZ4sFEXe57s7hforlmPC0RBDEHqJ1dB6nh2y9EZvVzgKfbibO2FvsoCIRL00AMz03oYa'; // استبدل بمفتاح API الخاص بك

// إعداد بيانات الطلب لـ Payment Intent
$data = http_build_query([
    'amount' => $amount, // المبلغ بالمليمات (5000 يمثل 50.00)
    'currency' => $currency, // العملة
    'payment_method_types[]' => 'card', // نوع طريقة الدفع
]);

// تهيئة cURL
$ch = curl_init();

// إعدادات cURL لطلب POST إلى Stripe API
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_intents');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_POST, 1);

curl_setopt($ch, CURLOPT_USERPWD, $apiKey . ':');

// تنفيذ الطلب
$response = curl_exec($ch);

// التحقق من وجود أخطاء
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
} else {
    // إظهار الرد من Stripe API
    echo $response;
}

// إغلاق cURL
curl_close($ch);

