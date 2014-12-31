<?php $actual_link = str_replace("/", '', $_SERVER['REQUEST_URI']) ?>
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
        <li <?php echo ($actual_link==="register.php") ? "class='active'" : ''; ?>><a href="register.php">Register</a></li>
        <li <?php echo ($actual_link==="login.php") ? "class='active'" : ''; ?>><a href="login.php">Log In</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>