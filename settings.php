<?php
  require_once 'core/init.php';
  $targetUser = new User();
  if(!$targetUser->getIsLoggedIn())
  {
    Session::flash('message','You need to be logged in.');
    Redirect::to('home');
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Real E-State - Settings</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/mainLayout.css" rel="stylesheet">
    <link href="css/settings.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php
      include("navbar.php");
      if(Session::exists('message'))
      {
        include("modal.php");
      }
      include("passwordModal.php");
    ?>
     <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row text-center">
            <div class="col-xs-12 col-md-10 center-block settingsHeader">
              <div class="col-xs-4 col-md-4"><span class="settingLink coolButton noselect">General</span></div>
              <div class="col-xs-4 col-md-4"><span class="settingLink coolButton noselect">Account</span></div>
              <div class="col-xs-4 col-md-4"><span class="settingLink coolButton noselect">Privacy</span></div>
            </div>
          </div>
        
      <div class="row">
        <div class="col-md-12">
          <div id="settings-content">
            <div class='settingGroup first'>
            <?php
              echo "<div><strong>First Name</strong> " . escape($targetUser->data()->first_name) . "</div><br>";
              echo "<div><strong>Last Name</strong> " . escape($targetUser->data()->last_name) . "</div><br>";
              echo "<div><strong>Email</strong> " . escape($targetUser->data()->email) . "</div><br>";
              echo "<div><strong>Age</strong> " . escape($targetUser->data()->age) . "</div><br>";
              echo "<div><strong>Username</strong> " . escape($targetUser->data()->username). "</div>";
            ?>
              <div class="noselect" id="editPassword"><strong class="neonBorder">edit password</strong></div>
              <div class="col-md-3 center-block editbutton noselect text-center">edit</div>
            </div>
            <div class='settingGroup otherTab'>
              <div><strong>Account Type:</strong> <?php echo escape($targetUser->data()->account_type) ?></div>
              <div class="col-md-3 center-block editbutton noselect text-center">edit</div>
            </div>
            <div class='settingGroup otherTab'>
              <div>Privacy</div>
              <div class="col-md-3 center-block editbutton noselect text-center">edit</div>
            </div>
          </div>
        </div>
      </div>
        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/modal.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/passwordModal.js"></script>
  </body>
</html>