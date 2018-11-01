<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<script src="js/jquery-2.1.3.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.css" type="text/css" media="all" />
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="css/main.css">
<title>ログイン</title>
</head>

<body>
<header>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><i class="fab fa-skyatlas"></i>Instagram?</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <form class="navbar-form navbar-right"   name="form1" action="login_act.php" method="post">
        <div class="form-group">
            <input type="text" name="lid" class="form-control" placeholder="Email">
            <input type="password" name="lpw" class="form-control" placeholder="Password" required>
        </div>
        <button type="submit" class="btn btn-default " value="LOGIN">Sign in</button>
      </form>

    </div><!--/.nav-collapse -->
  </div><!--/.container -->
</nav>
</header> 

  <!-- lLOGINogin_act.php は認証処理用のPHPです。 -->
  <div class="container">
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" name="form1" action="login_act.php" method="post">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" name="lid" class="form-control" placeholder="Email">
                <input type="password" name="lpw" class="form-control" placeholder="Password" required>
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" value="LOGIN">Sign in</button>
            </form><!-- /form -->
            <a href="#" class="forgot-password">
                Forgot the password?
            </a>
            <button class="btn btn-lg btn-primary btn-block btn-signin facebook" type="submit" value="LOGIN">FACEBOOKでログインする</button>            
        </div><!-- /card-container -->
    </div><!-- /container -->
    
</body>
</html>