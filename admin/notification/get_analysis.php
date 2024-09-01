
<?php

include "../../connect.php";
include '../../functions.php';

$oneSignalid =filterRequest("id");

$ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications/$oneSignalid?app_id=9c37a804-6bb8-4055-96f4-a56308ae8b63");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
                                                   'Authorization: Basic YTBiZmZhY2QtYjJkYS00Zjc4LWI5MWUtMTg2MTA0ZTJkNzhh'));
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        // curl_setopt($ch, CURLOPT_POST, TRUE);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'erorr';
        }else {
     



        }
        curl_close($ch);
