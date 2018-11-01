<?php
session_start();
include "funcs.php";
chkSsid();
$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table ORDER BY postid DESC");
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    sqlError($stmt);
} else {
    //Selectデータの数だけ自動でループしてくれる
    //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<article class="photocontainer">';
        // $view .= '<span class="photo_img">';
        if($result["photourl"] != ""){
          $view .= '<img class="photo_img" src="'.$result["photourl"].'" />';
        }else{
          $view .= '<img class="photo_img" src="https://images.pexels.com/photos/219005/pexels-photo-219005.jpeg?auto=compress&cs=tinysrgb&h=350" />';       
        }
        $view .= '<span class="text_area">';

        //ユーザ名検索
        $username_stmt = $pdo->prepare('SELECT name FROM `gs_user_table` where userid ='.$result["userid"]);
        $username_status = $username_stmt->execute();
        while ($user_result = $username_stmt->fetch(PDO::FETCH_ASSOC)) {
          $view .= '<section class="photo_title"><a href="detail_bm.php?postid=' . $result["postid"] . '"><b>'. $result["name"]."</b> by ".$user_result["name"]."</a></section><br>";
        }
        if($result["naiyou"] != "") $view .= "<a>".$result["naiyou"]."</a><br>";
        
        //いいね!カウント
        $like_stmt = $pdo->prepare('SELECT postid,COUNT(*)AS CNT FROM `gs_bm_like_table` WHERE postid = '.$result["postid"].' GROUP BY postid');
        $like_status = $like_stmt->execute();
        if($like_result = $like_stmt->fetch(PDO::FETCH_ASSOC)){
          $like_stmt = $pdo->prepare('SELECT postid,COUNT(*)AS CNT FROM `gs_bm_like_table` WHERE postid = '.$result["postid"].' GROUP BY postid');
          $like_status = $like_stmt->execute();  
          $view .= '<section class="like_comment"><a>「いいね!」';        
          while ($like_result = $like_stmt->fetch(PDO::FETCH_ASSOC)) {
             $view .= $like_result["CNT"];
          }
          $view .= '件</a></section>';  
          $like_stmt = $pdo->prepare('SELECT DISTINCT tba.postid,tba.userid, tbb.name FROM `gs_bm_like_table` AS tba INNER JOIN `gs_user_table` as tbb ON tba.userid = tbb.userid where tba.postid ='.$result["postid"]);
          $like_status = $like_stmt->execute();
          $view .= '<section class="like_comment"><a>';        
          while ($like_result = $like_stmt->fetch(PDO::FETCH_ASSOC)) {
              $view .= $like_result["name"];
              $view .= ',';
          }
          $view = rtrim($view, ",");
          $view .= 'がいいねしました</a></section>';
        }

        $view .= '<section class="like_btn"><a href="delete_bm.php?postid=' . $result["postid"] . '">';
        $view .= '🗑</a>';
        $view .= '<button class="btn btn-like"><a href="insert_like.php?postid=' . $result["postid"] .'&userid='.$_SESSION["userid"] .'">';
        $view .= "❤</a></button></section></span>";
        $view .= '</article>';
    }
    $view .= '<div><a class="addbtn" href="index.php">+POST</a></div>';
    $view .= '<div><a class="addbtn" href="logout.php"> LOG OUT</a></div>';    
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
<title>PHOTOS</title>
</head>

<body id="main">
<!-- Head[Start] -->
<header>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="main.php">
      <i class="fab fa-skyatlas"></i>Instagram?</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="main.php">Photos</a></li>
          <?php
            if($_SESSION["kanri_flg"]){
              echo '<li><a href="select_user.php">Users</a></li>';
            }
          ?>
      </ul>
      <div class="nav navbar-nav navbar-right">
          <li><img class="d-inline-block align-top profile-img-icon"  src="
          <?php
            if($_SESSION["icon"] != ""){
              echo $_SESSION["icon"];
            }else{
              echo "//ssl.gstatic.com/accounts/ui/avatar_2x.png";
            }
          ?>          
          " /> </li>
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
