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
         <li <?php echo ($actual_link==="matcher.php") ? "class='active'" : ''; ?>><a href="matcher.php">Match Engine</a></li>
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
            echo "<li";
            echo ($actual_link==="profile.php") ? " class='active'" : '';
            echo "><a href='profile.php'>Profile</a></li>";
            echo "<li";

            echo ($actual_link==="settings.php") ? " class='active'" : '';
            echo "><a href='settings.php'>Settings</a></li>";

            echo "<li";
            echo ($actual_link==="logout.php") ? " class='active'" : '';
            echo "><a href='logout.php'>Log Out</a></li>";
          }
        ?>
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>