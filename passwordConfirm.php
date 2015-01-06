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
                  	Redirect::to('home');
                  	echo true;
                  }
              	}
            }
	    }
	    echo false;
	}
?>