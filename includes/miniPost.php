<?php use Carbon\Carbon;
  $postName = escapeName($postUser->data()->first_name)." ".escapeName($postUser->data()->last_name);
 ?>
<div class="row post"><!--Post Start-->
  <div class="col-md-12">
    <div class="row"> <!--Top Row-->
      <a href="profile.php?id=<?php echo $postUser->data()->id ?>">
      <img class="postImage pull-left z-important" src="<?php echo 'images/'.$postUser->picture ?>"></a>
      <div class="col-md-4 absolute">
        <div class="row">
          <div class="col-md-offset-1 col-md-11">
            <a href="profile.php?id=<?php echo $postUser->data()->id ?>">
             <?php echo $postName; ?> </a><small class="account_type"><?php echo escape($postUser->data()->account_type); ?></small>
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
        <p>
          <?php
            echo escape($this->post);
          ?>
        </p>
      </div>
    </div>
    <div class="row"> <!--Saves, Time, and Share-->
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-3">
            <label aria-label="saves">Saves</label><span class="sBlue"><?php echo " ".escape($this->saves) ?></span>
            <span>- </span><span aria-label="time posted since" class="neon"><?php echo Carbon::createFromTimeStamp(strtotime($this->created_at))->diffForHumans();?></span>
          </div>
          <div class="col-md-offset-7 col-md-2">
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