<?php
  require_once 'core/init.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Real E-State - Register</title>

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
              'username' => array(
                  'required' => true,
                  'min' => 2,
                  'max' => 20,
                  'unique' => 'users'
                ),
              'password' => array(
                  'required' => true,
                  'min' => 6
                ),
              'password_again' => array(
                  'required' => true,
                  'matches' => 'password'
                ),
              'first_name' => array(
                  'required' => true,
                  'min' => 2,
                  'max' => 20
                ),
              'last_name' => array(
                  'required' => true,
                  'min' => 2,
                  'max' => 30
                ),
              'age' => array(
                  'required' => true,
                  'age' => 18
                )
            ));
        }
      }
    ?>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-6 center-block">
            <div class="row">
              <div class="col-md-12">
                
                  <?php
                  if(isset($validation))
                  {
                    if($validation->passed())
                    {
                      $user = new User();

                      $salt = Hash::salt(32);

                      try
                      {
                        $user->create(array(
                            'username' => Input::get('username'),
                            'password' => Hash::make(Input::get('password'), $salt),
                            'salt' => $salt,
                            'first_name' => Input::get('first_name'),
                            'last_name' => Input::get('last_name'),
                            'age' => Input::get('age'),
                            'joined' => date('Y-m-d H:i:s'),
                            'group' => 1
                          ));

                        Session::flash('message', 'You have been registered and can now log in.');

                        Redirect::to('index.php');

                      }catch(Exception $e)
                      {
                        die($e->getMessage());
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
              </div>
            </div>
              <form action="" method="post">
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" name="username" id="username" placeholder="Enter username" value="<?php
                      echo escape(Input::get('username'));
                   ?>">
                </div>
                <div class="form-group">
                  <label for="first_name">First Name</label>
                  <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter First Name" value="<?php
                      echo escape(Input::get('first_name'));
                   ?>">
                </div>
                <div class="form-group">
                  <label for="last_name">Last Name</label>
                  <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter Last Name" value="<?php
                      echo escape(Input::get('last_name'));
                   ?>">
                </div>
                <div class="form-group">
                  <label for="age">Age</label>
                  <select id="age" name="age">
                    <?php 
                      for($value = 1; $value <= 100; $value++){ 
                          $val = (Input::get('age')==$value) ? "selected": "";
                          echo('<option '.$val.' value="' . $value . '">' . $value . '</option>');
                      }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="password_again">Password Again</label>
                  <input type="password" class="form-control" name="password_again" id="password_again" placeholder="Password Again">
                </div>
                <input type="hidden" name="token" value="<?php echo Token::generate();?>">
                <button type="submit" class="btn btn-primary entireWidth">Register</button>
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