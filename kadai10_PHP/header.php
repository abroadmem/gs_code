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