<?php
  require_once 'core/init.php';
  $user = new User(Input::get('id'));
  $currentUser = new User();
  if($currentUser->getIsLoggedIn())
  {
    //if the user is logged in then grab his own information
    if($currentUser->data()->id==Input::get('id'))
    {
      $user = $currentUser;
    }
  }
  if(!$user->exists())
  {
    Redirect::to('404');
  }
	$name = $user->data()->first_name." ".$user->data()->last_name;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Real E-State - <?php echo "{$name}'s profile"; ?></title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/mainLayout.css" rel="stylesheet">
    <link href="css/profile.css" rel="stylesheet">

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
    ?>
     <div class="container-fluid">
      <div class="row"> <!--Entire Page Row-->
        <div class="col-md-12"> 
          <div class="row"> <!--Top Row-->
            <div class="col-md-12">
              <div class="row" id=""> 
                <div class="col-md-offset-1 col-md-2"> <!--Side Column-->
                  <div class="row"> 
                    <div class="col-md-12" id="profileInfoAreaContainer">
                      <img src="images/<?php echo $user->picture ?>" class="img-responsive sBlueBorder"
                      id="profileBubble" alt="<?php echo $user->data()->first_name?>'s profile pic">
                      <div class="text-center lead" id="nameDiv">
                          <p><?php echo $name; ?></p>
                      </div>
                      <div class="lead" id="profileInfoArea">
                        <div class="profileInfo">
                          <strong class="sBlueBorder profileInfoHeader">Bio:</strong>
                          <div class="pInfoText">
                            <?php echo "\"{$user->bio}\""; ?>
                          </div>
                        </div>
                        <div class="profileInfo">
                          <strong class="sBlueBorder profileInfoHeader">Type:</strong>
                          <div class="pInfoText">
                            <?php echo $user->data()->account_type; ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-8">
                  
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