<?php
	require_once 'core/init.php';
	$currentUser = new User();
	$pass = $_POST["password"];
	$pass_again = $_POST["password_again"];

	
	if(Input::exists())
      {
        if(Token::check(Input::get('token')))
        {
          $validation = new Validate();
          $validation->check($_POST, array(
              'password' => array(
                  'required' => true,
                  'min' => 6
                ),
              'password_again' => array(
                  'required' => true,
                  'matches' => 'password'
                )
            ));

	      	if(isset($validation))
	      	{
		        if($validation->passed())
		        {
		          $currentUser->update(array(
		          		'password' => Hash::make(Input::get('password'), $currentUser->data()->salt)
		          	));
		          echo true;
		      	}
	      	}
        }
      }
      echo false;
?>