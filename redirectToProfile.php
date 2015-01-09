<?php

  require_once 'core/init.php';
  Session::flash('message','You have successfully changed your profile picture!');
  Redirect::to('profile.php');

?>