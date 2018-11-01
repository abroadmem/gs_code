<?php
//共通に使う関数を記述

function h($a)
{
    return htmlspecialchars($a, ENT_QUOTES);
}

function db_con()
{
    try {
        return new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost', 'root', ''); //XAMP
        //return new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost', 'root', 'root'); //MAMP
    } catch (PDOException $e) {
        exit('DB_CONECTION_ERROR:' . $e->getMessage());
    }
}

function sqlError($stmt)
{
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("SQL_ERROR:" . $error[2]);
}

function chkSsid(){
    if(!isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"] != session_id() ) {
        exit("LoginError");
    }else{
        session_regenerate_id(true);
        $_SESSION["chk_ssid"] = session_id();    
    }
}

function image_analythis($imageUrl){
  $uribase = 'https://westus.api.cognitive.microsoft.com/vision/v1.0/analyze?visualFeatures=Description&language=en';
  $api_key ='5c1196affec349e0b243c78389040a3c';
  $post_data = array(
     "url" => $imageUrl
  );
  
  $ch = curl_init($uribase);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));//Post URL
//   curl_setopt($ch, CURLOPT_POSTFIELDS,$image_binary);//Post Binaryfile
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
     'Content-Type: application/json',
     'Content-Type: application/octet-stream',
     'Ocp-Apim-Subscription-Key:'.$api_key
  ));
  curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
  $image_json_string = curl_exec($ch);
  curl_close($ch);
  
  $image_json = json_decode($image_json_string);
  $image_description = $image_json->{"description"}->{"captions"}[0]->{"text"};
  $image_tags = $image_json->{"description"}->{"tags"};
  error_log(print_r("image_json_string is... ",true));
  error_log(print_r($image_json_string,true));

  return $image_tags;
  
  //--------------FaceAPI
//   $url = 'https://westus.api.cognitive.microsoft.com/vision/v1.0/analyze?visualFeatures=Faces&language=en';
//   $ch = curl_init($url);
//   curl_setopt($ch, CURLOPT_POST, true);
//   curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
//   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//   //curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($post_data));
//   curl_setopt($ch, CURLOPT_POSTFIELDS,$image_binary);
//   curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//   //   'Content-Type: application/json',
//      'Content-Type: application/octet-stream',
//      'Ocp-Apim-Subscription-Key:'.$api_key
//   ));
//   curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
//   $image_json_string = curl_exec($ch);
//   curl_close($ch);
//   $image_json = json_decode($image_json_string);
  
//   $image_age = $image_json->{"faces"}[0]->{"age"};
//   error_log(print_r("age is... " . $image_age ,true));
  
  //--------------------------------------------------------------------------------
//   $ch2 = curl_init("https://api.cognitive.microsoft.com/sts/v1.0/issueToken");
//   curl_setopt($ch2, CURLOPT_POST, true);
//   curl_setopt($ch2, CURLOPT_CUSTOMREQUEST, 'POST');
//   curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
//   curl_setopt($ch2,CURLOPT_SSL_VERIFYPEER, false);
//   curl_setopt($ch2, CURLOPT_HTTPHEADER, array(
//                'Content-Type: application/json',
//                'Accept: application/jwt',
//                'content-length: 0',
//                'Ocp-Apim-Subscription-Key: 0f0aa513404c4b81a891defc6808e50e',
//                )
//            );
  
  
//   $key_response = curl_exec($ch2);
//   curl_close($ch2);
//   $header_size = curl_getinfo($ch2, CURLINFO_HEADER_SIZE);
//   $header = substr($key_response, 0, $header_size);
//   $ms_accesstoken = substr($key_response, $header_size);
  
//   $word = $image_description;
//   $to = "ja";
//   $category ="generalnn";
//   $url = "https://api.microsofttranslator.com/v2/http.svc/Translate?appid=Bearer%20". $ms_accesstoken . "&text=" . urlencode($word) . "&to=". $to. "&category=" . $category;
  
//   $response = file_get_contents($url);
//   preg_match('/>(.+?)<\/string>/', $response, $text_ja);
//   error_log(print_r("text is... ",true));
//   error_log(print_r($text_ja[1],true));
  
//   $say_text = "たぶん".$text_ja[1] . "かな";
  
//   if (empty($image_age)) {
//       $say_text = "たぶん".$text_ja[1]. "かな♪";
//   }else{
//       $say_text = "たぶん".$text_ja[1]."の画像ね♪年齢は".$image_age."歳ぐらいに見えるわ。";
//   }

//   return $say_text;
}
