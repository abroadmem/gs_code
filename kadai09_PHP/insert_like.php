<?php
//1. POSTデータ取得
$postid = $_GET["postid"];
$userid = $_GET["userid"];

//2. DB接続します
include "funcs.php";
$pdo = db_con();

//データの確認
$sql = "SELECT * FROM `gs_bm_like_table` WHERE userid = ".$userid."AND postid =".$postid;
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$row = mysql_num_rows($result);

if($rows==0){
//データがない場合、LIKEとして追加するーーーーーーーーーーーーーーーーー
    $sql = "INSERT INTO gs_bm_like_table(userid, postid)VALUES(:userid,:postid)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':userid', $userid, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':postid', $postid, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
    $status = $stmt->execute();
}else{
//データが存在する場合、LIKEを解除するーーーーーーーーーーーーーーーーー
    $sql = "DELETE FROM gs_bm_like_table WHERE userid=:userid AND postid=:postid";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':userid', $userid, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
    $stmt->bindValue(':postid', $postid, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
    $status = $stmt->execute();
}

if ($status == false) {
    sqlError($stmt);
} else {
    //５．index.phpへリダイレクト
    header("Location: main.php");
    exit;
}