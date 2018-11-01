<?php
session_start();
include "funcs.php";
chkSsid();
$pdo = db_con();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<script src="js/jquery-2.1.3.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.css" type="text/css" media="all" />
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="css/main.css">
<title>データ登録</title>
</head>
<body>

<!-- Head[Start] -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
      <i class="fab fa-skyatlas"></i>PJ name</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">ブックマーク表示</a></li>
        <li><a href="#contact">ユーザ表示</a></li>        
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
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="insert_bm.php">
  <div class="container jumbotron">
   <fieldset>
    <legend>ブックマーク</legend>
     <label>名前：<input type="text" name="name"></label><br>
     <label>URL：<input type="text" name="email"></label><br>
     <label>PhotoURL：<input type="text" name="photourl"></label><br>     
     <label><textArea name="naiyou" rows="4" cols="40"></textArea></label><br>
     <input type="file" accept="image/*" capture="camera" name="upfile" ><br>     
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
