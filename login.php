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
    <link href="css/login.css" rel="stylesheet">

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

      if(Input::exists())
      {
        if(Token::check(Input::get('token')))
        {
          $validation = new Validate();
          $validation->check($_POST, array(
              'email' => array('required' => true, 'email' => 'true'),
              'password' => array('required' => true)
            ));
        }
      }
    ?>
     <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-10 center-block loginArea">
              <div class="row">
                <div class="col-md-5 center-block">
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
                        $login = $user->login(Input::get('email'), Input::get('password'), $remember);
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
                      <label for="email">Email</label>
                      <input type="text" class="form-control login" name="email" id="email" placeholder="Enter email" value="<?php
                      echo escape(Input::get('email'));
                   ?>">
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control login" name="password" id="password" placeholder="Password">
                    </div>
                    <div class="checkbox">
                      <label>
                        <input name="remember" id="remember" type="checkbox"> Remember Me
                      </label>
                    </div>
                    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>" >
                    <button type="submit" class="btn btn-primary entireWidth coolButton">Log In</button>
                  </form>
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
  </body>
</html>