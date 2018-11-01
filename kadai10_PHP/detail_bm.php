<?php
session_start();
$postid = $_GET["postid"];
include "funcs.php";
$pdo = db_con();

var_dump($postid);


//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE postid=:postid");
$stmt->bindValue(":postid", $postid, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    sqlError($stmt);
} else {
    $row = $stmt->fetch();
}

?>
<!DOCTYPE html>
<html lang="ja">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<script src="js/jquery-2.1.3.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.css" type="text/css" media="all" />
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="css/main.css">
<title>ブックデータ一覧</title>
</head>
<body>

<!-- Head[Start] -->
<header>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
      <i class="fab fa-skyatlas"></i>PJ name</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#about">Kotodama</a></li>
        <li><a href="#contact">Users</a></li>
      </ul>
      <div class="nav navbar-nav navbar-right">
          <li><img class="d-inline-block align-top profile-img-icon"  src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" /> </li>             
          <li><a><?=$_SESSION["name"]?></a></li>       
      </div>
      <form class="navbar-form navbar-right" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div><!--/.nav-collapse -->
  </div><!--/.container -->
</nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="update.php">
  <div class="container jumbotron">
   <fieldset>
     <label>タイトル：<input type="text" name="name" value="<?=$row["name"]?>"></label><br>
     <label>日付：<?=$row["indate"]?></label><br>
     <label><textArea name="naiyou" rows="4" cols="40"><?=$row["naiyou"]?></textArea></label><br>
     <input type="hidden" name="userid" value="<?=$row["userid"]?>">
     <input type="hidden" name="postid" value="<?=$postid?>">     
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
