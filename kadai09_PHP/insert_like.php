<?php
//1. POSTデータ取得
$postid = $_GET["postid"];
$userid = $_GET["userid"];

//2. DB接続します
include "funcs.php";
$pdo = db_con();

//３．データ登録SQL作成
$sql = "INSERT INTO gs_bm_like_table(userid, postid)VALUES(:userid,:postid)";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':userid', $userid, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':postid', $postid, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)

$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
    sqlError($stmt);
} else {
    //５．index.phpへリダイレクト
    header("Location: main.php");
    exit;
}