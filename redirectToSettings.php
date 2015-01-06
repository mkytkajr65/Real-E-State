<?php

  require_once 'core/init.php';
  Session::flash('message','You have successfully changed your password!');
  Redirect::to('settings.php');

?>