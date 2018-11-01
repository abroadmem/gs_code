<?php
session_start();
//1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
$name = $_POST["name"];
$email = $_POST["email"];
$naiyou = $_POST["naiyou"];
$photourl = $_POST["photourl"];
$userid = $_SESSION["userid"];

//2. DB接続します
include "funcs.php";
$pdo = db_con();

//*画像判定
$naiyou = image_analythis($photourl);
// console.log($naiyou);
var_dump($naiyou);

//３．データ登録SQL作成
$sql = "INSERT INTO gs_bm_table(name,email,photourl,naiyou,indate,userid)VALUES(:name,:email,:photourl,:naiyou,sysdate(),:userid)";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':email', $email, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':photourl', $photourl, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':naiyou', $naiyou, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':userid', $userid, PDO::PARAM_INT); //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue(':image', $upload_file, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)


$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
    sqlError($stmt);
} else {
    //５．index.phpへリダイレクト
    header("Location: main.php");
    exit;
}
