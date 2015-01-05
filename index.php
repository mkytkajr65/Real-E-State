<?php
  require_once 'core/init.php';
  $user = new User();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Real E-State - Home</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/mainLayout.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">

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
      <div class="row">
        <div class="col-md-12">
          <div class="row" id="userRow">
              <div class="col-md-12 text-center">
                <h3><?php
                    if(!$user->getIsLoggedIn())
                    {
                      echo "Welcome! Please Log In or Make an Account!";
                    }
                    else
                    {
                       echo "Hello, {$user->data()->first_name}!";
                    }
                 ?>
                 <button type="button" class="close" ><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                </h3>
              </div>
          </div>
          <div class="row" id="firstRow">
            <div class="col-md-6 center-block text-center">
              <form action="" method="get">
                <label for="home_search" id="home_search_label">Enter Info</label>
                <input type="text" name="home_search" placeholder="Search" id="home_search">
              </form>
            </div>
          </div>
        <div class="row" id="secondRow">
          <div class="col-md-9 center-block">
            <div class="row">
              <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                  <img src="images/map-pricecircles-500x340.jpg" data-src="holder.js/300x300" alt="...">
                  <div class="caption">
                    <h3>Thumbnail label</h3>
                    <p>Cras justo odio, dapibus ac facilisis in,
                     egestas eget quam. Donec id elit non mi porta
                      gravida at eget metus. Nullam id dolor id nibh ultricies
                       vehicula ut id elit.</p>
                    <p><a href="#" class="btn btn-primary entireWidth" role="button">Button</a></p>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                  <img src="images/map-pricecircles-500x340.jpg" data-src="holder.js/300x300" alt="...">
                  <div class="caption">
                    <h3>Thumbnail label</h3>
                    <p>Cras justo odio, dapibus ac facilisis in,
                     egestas eget quam. Donec id elit non mi porta
                      gravida at eget metus. Nullam id dolor id nibh ultricies
                       vehicula ut id elit.</p>
                    <p><a href="#" class="btn btn-primary entireWidth" role="button">Button</a></p>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                  <img src="images/map-pricecircles-500x340.jpg" data-src="holder.js/300x300" alt="...">
                  <div class="caption">
                    <h3>Thumbnail label</h3>
                    <p>Cras justo odio, dapibus ac facilisis in,
                     egestas eget quam. Donec id elit non mi porta
                      gravida at eget metus. Nullam id dolor id nibh ultricies
                       vehicula ut id elit.</p>
                    <p><a href="#" class="btn btn-primary entireWidth" role="button">Button</a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row" id="thirdRow">
          <div class="col-md-12">
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
    <script src="js/slide.js"></script>
  </body>
</html>