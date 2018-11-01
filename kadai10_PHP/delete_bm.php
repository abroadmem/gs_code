<?php
$postid = $_GET["postid"];
include "funcs.php";
$pdo = db_con();
$sql = "DELETE FROM gs_bm_table WHERE postid=:postid";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':postid', $postid, PDO::PARAM_INT); //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();
if ($status == false) {
    sqlError($stmt);
} else {
    header("Location: main.php");
    exit;
}
