<?php
  require_once 'core/init.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Real E-State - Log In</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/mainLayout.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php
      ini_set('display_errors',1);
      ini_set('display_startup_errors',1);
      error_reporting(-1);
      include("navbar.php");

      if(Session::exists('message'))
      {
        include("modal.php");
      }

      if(Input::exists())
      {
        if(Token::check(Input::get('token')))
        {
          $validation = new Validate();
          $validation->check($_POST, array(
              'username' => array('required' => true),
              'password' => array('required' => true)
            ));
        }
      }
    ?>
     <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-6 center-block">
            <?php
            if(Session::exists('message'))
            {
              echo Session::get('message');
            }
              if(isset($validation))
              {
                if($validation->passed())
                {
                  $user = new User();
                  $remember = (Input::get('remember') === "on") ? true : false;
                  $login = $user->login(Input::get('username'), Input::get('password'), $remember);
                  if($login)
                  {
                    Session::flash('message',"Hello! ".escape($user->data()->first_name).", you are signed in!");
                    Redirect::to('home');
                  }
                  else
                  {
                    Session::flash('message',"There is an error with your sign in.");
                    Redirect::to('current');
                  }
                }
                else
                {
                  echo "<div class='alert alert-danger' role='alert'>";
                  foreach($validation->errors() as $error)
                  {
                    echo "<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span> {$error}<br>";
                  }
                  echo "</div>";
                }
              }
            ?>
              <form action="" method="post">
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                </div>
                <div class="checkbox">
                  <label>
                    <input name="remember" id="remember" type="checkbox"> Remember Me
                  </label>
                </div>
                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>" >
                <button type="submit" class="btn btn-success entireWidth">Log In</button>
              </form>
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
  </body>
</html>