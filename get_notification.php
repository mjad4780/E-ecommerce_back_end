<?php

include "connect.php";
include 'functions.php';
$userid =filterRequest("id");


getAllData("notification","notification_all =1 OR notification_userid=$userid");
// admin\notification\get_notification.php