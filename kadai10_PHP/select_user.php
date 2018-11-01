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
    $view .= '<table class="table table-striped">';   
    $view .= '<tr><th>ID</th><th>ICON</th><th>NAME</th><th>ADMIN</th><th>ACTIVE</th><th>LAST LOGIN</th><th>EDIT</th><th>DELETE</th>';           
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<tr>';
        $view .= '<td><a>';
        $view .= $result["userid"] . " "  . "<br>";
        $view .= '</a></td>';
        $view .= '<td><img class="profile-img-icon-adminpage"  src="';
        if($result["icon"]){
          $view .= $result["icon"];
        }else{
          $view .= '//ssl.gstatic.com/accounts/ui/avatar_2x.png';
        }
        $view .= '" /></td>';        
        $view .= '<td><a href="detail_user.php?userid=' . $result["userid"] . '">';
        $view .= $result["name"] . " "  . "<br>";
        $view .= '</a></td>';
        $view .= '<td>';
        if($result["kanri_flg"] == "1" ){
          $view .= '★';        
        }else{
          $view .= '-';                  
        }
        $view .= '</td>';
        $view .= '<td>0</td>';
        $view .= '<td>0</td>';                
        $view .= '<td><a href="detail_user.php?userid=' . $result["userid"] . '">[Edit]</a></td>';
        $view .= '<td><a href="delete_user.php?userid=' . $result["userid"] . '">[Delete]</a></td>';
        $view .= '</tr>';
    }
    $view .= '</table>';              

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
<title>管理者ポータル ユーザ一覧</title>

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
        <li><a href="select_user.php">Users</a></li>        
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


<input type="button" value="音声認識開始" onclick="recognition.start();"/>
<input type="button" value="音声認識終了" onclick="recognition.stop();"/>
<div id="state">停止中</div>
<div id="recognizedText"></div>

    <div id="content"></div>    
    <script src="app.js"></script>
<!-- Main[End] -->

</body>
</html>
