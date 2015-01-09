<?php
  require_once 'core/init.php';
  $user = new User(Input::get('id'));
  $currentUser = new User();
  if($currentUser->getIsLoggedIn())
  {
    if($currentUser->data()->id==Input::get('id')||Input::get('id')=='')
    {
      //if the user is logged in and hes on his own profile page
      $user = $currentUser;
    }
  }
  if(!$user->exists())
  {
    Redirect::to('404');
  }
	$name = escape($user->data()->first_name)." ".escape($user->data()->last_name);
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
      if($user->getIsLoggedIn())
      {
        if($currentUser->data()->id==Input::get('id')||Input::get('id')=='')
        {
          //if the user is logged in and hes on his own profile page
          include("profilePicModal.php");
          $cursorPointer = "cursorPointer";
        }
      }
    ?>
     <div class="container-fluid">
      <div class="row"> <!--Entire Page Row-->
        <div class="col-md-12"> 
          <div class="row"> <!--Top Row-->
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12 absolute" id="profilePageHeader"></div>
                <div class="col-md-offset-1 col-md-2"> <!--Side Column-->
                  <div class="row"> 
                    <div class="col-md-12" id="profileInfoAreaContainer">
                      <div class="image">
                          <img src="images/<?php echo $user->picture ?>" class="img-responsive sBlueBorder
                          <?php
                            if($user->getIsLoggedIn())
                            {
                              if($currentUser->data()->id==Input::get('id')||Input::get('id')=='')
                              {
                                echo ' cursorPointer';
                              }
                            }
                          ?>"
                          id="profileBubble" alt="<?php echo $user->data()->first_name?>'s profile pic">
                          <?php
                            if($user->getIsLoggedIn())
                            {
                              if($currentUser->data()->id==Input::get('id')||Input::get('id')=='')
                              {
                                //if the user is logged in and hes on his own profile page
                                echo "<h2 class='editProfilePic lead hidden'><span>edit</span></h2>";
                              }
                            }
                          ?>
                      </div>
                      
                      <div class="text-center lead" id="nameDiv">
                          <p><?php echo escape($name); ?></p>
                      </div>
                      <div class="lead" id="profileInfoArea">
                        <div class="profileInfo">
                          <strong class="sBlueBorder profileInfoHeader">Bio:</strong>
                          <div class="pInfoText">
                            <?php echo "\"".escape($user->bio)."\""; ?>
                          </div>
                        </div>
                        <div class="profileInfo">
                          <strong class="sBlueBorder profileInfoHeader">Type:</strong>
                          <div class="pInfoText">
                            <?php echo escape($user->data()->account_type); ?>
                          </div>
                        </div>
                        <div class="profileInfo">
                          <strong class="sBlueBorder profileInfoHeader">Age:</strong>
                          <div class="pInfoText">
                            <?php echo escape($user->data()->age); ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-9">
                  <div class="row">
                    <div class="col-md-12" id="profileSpacing"></div>
                  </div>
                  <div class="row"> <!--Profile Wall Area-->
                    <div class="col-md-12">
                      <div class="row" id="postArea">
                        <div class="col-md-6 center-block">
                          <form action="" method="post">
                            <textarea class="form-control" id="postProfile" maxlength="300"  rows="3"></textarea>
                            <button type="submit" class="btn btn-primary entireWidth coolButton" id="postButton">Submit Post</button>
                          </form>
                        </div>
                      </div>
                      <div class="row" id="postWall">
                        <div class="col-md-8 center-block">
                          <div class="row post"><!--Post Start-->
                            <div class="col-md-12">
                              <div class="row"> <!--Top Row-->
                                <a href="profile.php?id=<?php echo $user->data()->id ?>">
                                <img class="postImage pull-left z-important" src="<?php echo 'images/'.$user->picture ?>"></a>
                                <div class="col-md-4 absolute">
                                  <div class="row">
                                    <div class="col-md-offset-1 col-md-11">
                                      <a href="profile.php?id=<?php echo $user->data()->id ?>">
                                       <?php echo $name; ?> </a><small class="account_type"><?php echo escape($user->data()->account_type); ?></small>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-offset-10 col-md-2 absolute">
                                  <div class="row">
                                    <div class="col-md-12 text-right">
                                      <span class="glyphicon glyphicon-star-empty savePost noselect" data-toggle="tooltip"
                                       data-placement="top" data-trigger='manual' title="Saved!" aria-label="save" aria-hidden="true"></span>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row lead postBody"><!--Post Body-->
                                <div class="col-md-12 text-left">
                                  <p>Foreclosures will be a factor impacting home values
                                   in the next several years. In Forest Hills Gardens,
                                    the number of foreclosures waiting to be sold is 265.3%
                                     greater than in New York, and 13% less than the national
                                      average. This higher local number may prevent Forest Hills
                                       Gardens home values from rising as quickly as other regions
                                        in New York. </p>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="row">
                                    <div class="col-md-2">
                                      <label>Saves</label><span class="sBlue"> 45</span>
                                    </div>
                                    <div class="col-md-offset-8 col-md-2">
                                      <div class="row">
                                        <div class="col-md-offset-3 col-md-9 text-right">
                                          <label>Share </label><span class="glyphicon glyphicon-share sharePost noselect"
                                           aria-label="share" data-html="true" aria-hidden="true" data-placement="top" data-toggle="popover"
                                            data-content='<a href="https://www.facebook.com" target="_blank"><img class="smallSocial" src="images/social/FB-f-Logo__blue_58.png"></a>'></span>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div><!--Post End-->
                        </div>
                      </div>
                    </div>
                  </div>
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
    <script src="js/profilePicChange.js"></script>
    <script src="js/savePost.js"></script>
    <script src="js/sharePost.js"></script>
    <?php
    if($user->getIsLoggedIn())
    {
      if($currentUser->data()->id==Input::get('id')||Input::get('id')=='')
      {
        //if the user is logged in and hes on his own profile page
        echo '<script src="js/changeProfilePic.js"></script>';
      }
    }
  ?>
  </body>
</html>