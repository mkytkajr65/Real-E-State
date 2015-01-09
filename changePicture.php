<?php
	require_once 'core/init.php';
	$currentUser = new User();

	if(Input::exists())
    {
        if(Token::check(Input::get('token')))
        {
          $validation = new Validate();
          $validation->check($_POST, array(
              'change_picture' => array(
                  'required' => true
                )
            ));

	      	if(isset($validation))
	      	{
		        if($validation->passed())
		        {
		        	if(isset($_FILES['change_picture'])){
                        $errors= array();
                        $file_name = $_FILES['change_picture']['name'];
                        $file_size =$_FILES['change_picture']['size'];
                        $file_tmp =$_FILES['change_picture']['tmp_name'];
                        $file_type=$_FILES['change_picture']['type'];  
                        $tmp = explode('.',$_FILES['change_picture']['name']); 
                        $file_ext=strtolower(end($tmp));
                        $extensions = array("jpeg","jpg","png");    
                        if(in_array($file_ext,$extensions )=== false){
                         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
                        }
                        if($file_size > 2097152){
                        	$errors[]='File size must be excately 2 MB';
                        }       
                        if(empty($errors)==true){
                            $picture = $file_name;
                            move_uploaded_file($file_tmp,"images/".$file_name);
                        }else{
                            print_r($errors);
                            die();
                        }
                      }
                      else
                      {
                        $picture = 'default.jpg';
                      }
		          	$currentUser->update(array(
		          		'picture' => $picture
		          	));
		        	$rv = array('didPass' => true);
              		echo json_encode($rv);
              		exit();
		      	}
	            else
	            {
	              $rv = array('didPass' => false, 'errors' => 'There are errors');
	              echo json_encode($rv);
	              exit();
	            }
	      	}
        }
        $rv = array('didPass' => false, 'errors' => 'There are errors');
        echo json_encode($rv);
        exit();
      }
?>