<?php
	require_once 'core/init.php';
	$currentUser = new User();
	$password = $_POST["confirm_password"];
	if(Input::get("confirm_password"))
	{
		if(Token::checkwithMultipleForms(Input::get('token')))
        {
			$validation = new Validate();
	     	$validation->check($_POST, array(
	     			'confirm_password' => array(
	                  'required' => true
	                )
	     		));
	     	if(isset($validation))
            {
                if($validation->passed())
                {
                  $user = new User();
                  $correctPass = $user->checkPassword($password);
                  if($correctPass)
                  {
                  	$rv = array('didPass' => true);
              		echo json_encode($rv);
              		exit();
                  }
                  else
                  {
                  	$rv = array('didPass' => false, 'errors' => "<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span> password not correct<br>");
              		echo json_encode($rv);
              		exit();
                  }
              	}
            }
            else
          	{
              	$rv = array('didPass' => false, 'errors' => "<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span> something went wrong<br>");
          		echo json_encode($rv);
          		exit();
          	}
	    }
	}
	$rv = array('didPass'=> false, 'errors' => "<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span> You must enter something!<br>");
    echo json_encode($rv);
    exit();
?>