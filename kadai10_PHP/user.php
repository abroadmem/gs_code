<?php
session_start();
include "funcs.php";
chkSsid();
$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table");
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    sqlError($stmt);
} else {
    //Selectデータの数だけ自動でループしてくれる
    //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<div class="row">
        <div class="col-sm-2">
        <div class="photobox">';
        $view .= '<a href="delete_user.php?id=' . $result["id"] . '">';
        $view .= "🗑️";
        $view .= '</a>';
        $view .= '<a href="detail_user.php?id=' . $result["id"] . '">';
        $view .= $result["name"] . " "  . "<br>";
        $view .= '</a>';
        $view .= '</div></div></div>';
    }
    $view .= '<a href="index.php">';
    $view .= "+追加";
    $view .= '</a>';
}
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<script src="js/jquery-2.1.3.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.css" type="text/css" media="all" />
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="css/main.css">
<title>ユーザ一覧</title>

</head>

<body id="main">
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
        <li class="active"><a href="main.php">ブックマーク表示</a></li>
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
</header> 
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?=$view?></div>
</div>

<!-- Main[End] -->

</body>
</html>
