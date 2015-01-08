<?php 
  $actual_link = str_replace("/", '', $_SERVER['REQUEST_URI']);
  $currentUser = new User();
 ?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Real E-State</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <?php echo ($actual_link==="index.php") ? "class='active'" : ''; ?>><a href="index.php">Home</a></li>
        <?php 
          if($currentUser->getIsLoggedIn())
          {
           echo "<li";
            echo ($actual_link==="stream.php") ? " class='active'" : '';
            echo "><a href='stream.php'>Stream</a></li>";
          }
        ?>
         <li class="navHighlight"><a href="matcher.php">Real Match &#0153;</a></li>
         <div class="col-sm-3 col-md-6 pull-right">
            <form class="navbar-form" role="search" method="get" action="search.php">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" name="query">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
            </form>
        </div>     
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php
          if(!$currentUser->getIsLoggedIn())
          {
            echo "<li";
            echo ($actual_link==="register.php") ? " class='active'" : '';
            echo "><a href='register.php'>Register</a></li>";

            echo "<li";
            echo ($actual_link==="login.php") ? " class='active'" : '';
            echo "><a href='login.php'>Log In</a></li>";
          }
          else
          {
            $userId = $currentUser->data()->id;
            echo "<li class='dropdown'>";
            echo "<a href='#'' class='dropdown-toggle' data-toggle='dropdown' role='button'
             aria-expanded='false'><span class='sBlue'>". escape($currentUser->data()->first_name)
             ." ". $currentUser->data()->last_name ."</span><span class='caret neon'></span></a>";
            echo "<ul class='dropdown-menu' role='menu'>";

            echo "<li";
            echo ($actual_link==="profile.php") ? " class='active'" : '';
            echo "><a href='profile.php?id=".escape($userId)."'>Profile</a></li>";

            echo "<li";
            echo ($actual_link==="settings.php") ? " class='active'" : '';
            echo "><a href='settings.php'>Settings</a></li>";

            echo "<li";
            echo ($actual_link==="logout.php") ? " class='active'" : '';
            echo "><a href='logout.php'>Log Out</a></li>";
            echo " </ul>
            </li>";
          }
        ?>
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>