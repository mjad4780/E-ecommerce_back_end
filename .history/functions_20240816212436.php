<?php

// ==========================================================
//  Copyright Reserved Wael Wael Abo Hamza (Course Ecommerce)
// ==========================================================

define("MB", 1048576);

function filterRequest($requestname)
{
  return  htmlspecialchars(strip_tags($_POST[$requestname],));
}
function filterRequest2($requestname)
{
  return htmlspecialchars(strip_tags($_POST[$requestname],$_POST[$requestname]));
}

function getAllData($table, $where = null, $values = null,$json= true)
{
    global $con;
    $data = array();
    if ($where == null) {
        $stmt = $con->prepare("SELECT  * FROM $table  ");
    }else {
        $stmt = $con->prepare("SELECT  * FROM $table WHERE   $where ");
    }
    $stmt->execute($values);
    $data = $stmt->fetchAll(PDO::FETCH_OBJ);
    $count  = $stmt->rowCount();
    if ($json ==true) {
        if ($count > 0){
            echo json_encode(array("status" => "success", "data" => $data));
        } else 
        {
                 printfailer('Sorry try agin');

        }
        return $count;
    }else {
        if ($count > 0){
         return array("status" => "success","data"=>$data); 
        } else {
       return     printfailer('Sorry try agin');

        }

    }

}
function getData($table, $where = null, $ww=false,$values = null,$json=true,)
{
    global $con;
    $data = array();
    $stmt = $con->prepare("SELECT  * FROM $table WHERE   $where ");
    $stmt->execute($values);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    $count  = $stmt->rowCount();
    if ($json ==true) {

    if ($count > 0){
        if ($ww==true ) {
        return    $data['item_id'];
            // echo json_encode(array("data" => $data['item_id']));

        }else {
        }
        echo json_encode(array("status" => "success", "data" => $data));

    } else {
        printfailer('Sorry try agin');
    }
}else {
    return $count;

}
}


function insertData($table, $data, $json = true)
{
    global $con;
    foreach ($data as $field => $v)
        $ins[] = ':' . $field;
    $ins = implode(',', $ins);
    $fields = implode(',', array_keys($data));
    $sql = "INSERT INTO $table ($fields) VALUES ($ins)";
    $stmt = $con->prepare($sql);
    foreach ($data as $f => $v) {
        $stmt->bindValue(':' . $f, $v);
    }
    $stmt->execute();

    $count = $stmt->rowCount();
    if ($json == true) {
     result($count,'Sorry try agin')   ;
  }
    return $count;
}


function updateData($table, $data, $where, $json = true)
{

    global $con;
    $cols = array();
    $vals = array();

    foreach ($data as $key => $val) {
        $vals[] = "$val";
        $cols[] = "`$key` =  ? ";
    }
    $sql = "UPDATE $table SET " . implode(', ', $cols) . " WHERE $where";

    $stmt = $con->prepare($sql);
    $stmt->execute($vals);
    $count = $stmt->rowCount();
    if ($json == true) {
        result($count,'Sorry try agin')   ;

    }
    return $count;
}

function deleteData($table, $where, $json = true)
{
    global $con;
    $stmt = $con->prepare("DELETE FROM $table WHERE $where");
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($json == true) {
        result($count,'Sorry try agin')   ;

    }
    return $count;
}

function imageUpload($dir,$imageRequest)
{
  global $msgError;
  if (isset($_FILES[$imageRequest])) {
    $imagename  = rand(1000, 10000) . $_FILES[$imageRequest]['name'];
    $imagetmp   = $_FILES[$imageRequest]['tmp_name'];
    $imagesize  = $_FILES[$imageRequest]['size'];
    $allowExt   = array("jpg", "png", "gif", "mp3", "pdf");
    $strToArray = explode(".", $imagename);
    $ext        = end($strToArray);
    $ext        = strtolower($ext);
  
    if (!empty($imagename) && !in_array($ext, $allowExt)) {
      $msgError = "EXT";
    }
    if ($imagesize > 2 * MB) {
      $msgError = "size";
    }
    if (empty($msgError)) {
        move_uploaded_file($imagetmp, $dir . "/" . $imagename);

    //   move_uploaded_file($imagetmp, $dir. "/". $imagename);
      return $imagename;
    } else {
      return "fail";
    }  }else {
        return "empty";
    }

}



function deleteFile($dir, $imagename)
{
    if (file_exists($dir . "/" . $imagename)) {
        unlink($dir . "/" . $imagename);
    }
}

function checkAuthenticate()
{
    if (isset($_SERVER['PHP_AUTH_USER'])  && isset($_SERVER['PHP_AUTH_PW'])) {
        if ($_SERVER['PHP_AUTH_USER'] != "wael" ||  $_SERVER['PHP_AUTH_PW'] != "wael12345") {
            header('WWW-Authenticate: Basic realm="My Realm"');
            header('HTTP/1.0 401 Unauthorized');
            echo 'Page Not Found';
            exit;
        }
    } else {
        exit;
    }

    // End 
}

function printfailer($messege= 'none')
{
    echo json_encode(array("status"=> 700, "messege"=> $messege));
}

function printSuccess($messege= 'none')
{
    echo json_encode(array("status"=> 200, "messege"=> $messege));
}

function result($count,$messege){
if ($count>0) {
    printSuccess();
}else {
    printfailer($messege);
}

}






function sendemail($to, $title, $body){
    //هذه مسؤوله عن بعت رساله او كود الي الايميل لكن
    // لن تعمل لانه يجب رفعه علي استضافه

    $header = "From: support@gmail.com" ."\n" ."CC :mjad3711@gmail.com";

    mail($to, $title,$body, $header);
}



function sendGCM($title, $message, $topic, $pageid, $pagename,$image)
{


    $url = 'https://fcm.googleapis.com/fcm/send';

    $fields = array(
        "to" => '/topics/' . $topic,
        'priority' => 'high',
        'content_available' => true,

        'notification' => array(
            "body" =>  $message,
            "title" =>  $title,
            "click_action" => "FLUTTER_NOTIFICATION_CLICK",
            "sound" => "default",
            "imageUrl"=>$image

        ),
        'data' => array(
            "pageid" => $pageid,
            "pagename" => $pagename
        )

    );


    $fields = json_encode($fields);
    $headers = array(
        'Authorization: key=' . "AAAAN03T-ig:APA91bFxlKS53s8DBMlMGzmbFsOaGP3b5xVf-1gS6YbJMM84r_Oy1EPdQUNe9xLxK2VZUA1Dje9DO1A0RHhkoaolvqybWdrSPOwKh3MdWoS5ZIzsZMzjrQisVG9TP32Glzah_fTcikPq",
        'Content-Type: application/json'
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);

    $result = curl_exec($ch);
    return $result;
    curl_close($ch);
}
function insertNotify($title, $body, $userid,$topic,$pageid,$pagename)
{
    global $con;
    $stmt=$con->prepare("INSERT INTO `notification`(`notification_userid`, `notification_title`, `notification_body`,) VALUES (?,?,?)");
   $stmt->execute(array($userid,$title,$body));
   sendGCM($title,$body,$topic,$pageid,$pagename,'');
   $count =$stmt->rowCount();
   result($count,'Sorry try agin')   ;

   return $count;
}


function insertNotifyimage($title, $body, $userid,$topic,$pageid,$pagename,$image)
{
    global $con;
    $stmt=$con->prepare("INSERT INTO `notification`(`notification_userid`, `notification_title`, `notification_body`,notification_image) VALUES (?,?,?,?)");
   $stmt->execute(array($userid,$title,$body,$image));
   sendGCM($title,$body,$topic,$pageid,$pagename,$image);
   $count =$stmt->rowCount();
   result($count,'Sorry try agin')   ;

   return $count;
}
//////////////////////

function imagesUploads($dir,$imageRequest)
{
  global $msgError;
//   echo json_encode($_FILES[$imageRequest]);
//   if ( $_FILES[$imageRequest]['name'] ==[""]) {
//     return "empty";
// }else {
    if (isset($_FILES[$imageRequest]) ) {
        $images=$_FILES[$imageRequest];
        foreach ($images['name'] as $index => $image) {
          $imagename =rand(1000, 10000) . $image;
          $tmpPath = $images['tmp_name'][$index];
          $imagesize = $images['size'][$index];
          $allowExt   = array("jpg", "png", "gif", "mp3", "pdf");
          $strToArray = explode(".", $imagename);
          $ext        = end($strToArray);
          $ext        = strtolower($ext);
          $savePath = $dir . '/' . $imagename;
      if (!empty($imagename) && !in_array($ext, $allowExt)) {
              $msgError = "EXT";
            }
            if ($imagesize > 10 * MB) {
              $msgError = "size";
            }
          // Check for upload errors
    
          // Move the uploaded file to the save directory
          if (move_uploaded_file($tmpPath, $savePath)) {
            $savedImages[] = $imagename;
          } else {
            echo "Error saving image $imagename\n";
          }
        }
        return $savedImages;
     }else {
            return "empty";
        }
    //   }
 
}
function EditListDetailas($String,$imageNames,$id){
    global $con;



    foreach ($imageNames[$String] as $index => $value) {

        $C=$value;
        
        $stmt= $con->prepare(" SELECT * FROM detailas WHERE $String = ? AND item_deitalis =? ");
        $stmt-> execute(array($C ,$id));
        $count = $stmt-> rowCount();
        if ($count > 0) {
            // echo 'success';
        }else{
        $data=array(
        $String=>$C,
        'item_deitalis'=>$id,

        );
            insertData('detailas',$data,false);
       
        }
        }
}
////
function addListDetailas($String,$imageNames,$id){


    foreach ($imageNames[$String] as $index => $value) {
        $data=array(
        'item_deitalis'=>$id,
        $String=>$value,
        );
        insertData('detailas',$data,false);
       
        }
  
  }

