<?php
$userid = $_GET["userid"];
include "funcs.php";
$pdo = db_con();
$sql = "DELETE FROM gs_user_table WHERE userid=:userid";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':userid', $userid, PDO::PARAM_INT); //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();
if ($status == false) {
    sqlError($stmt);
} else {
    header("Location: select_user.php");
    exit;
}
