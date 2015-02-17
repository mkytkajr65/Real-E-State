<?php
	require_once 'core/init.php';
	$currentUser = new User();

if ($currentUser->getIsLoggedIn()) {
	if(Input::exists())
  {
    if(Token::check(Input::get('token')))
    {
      $validation = new Validate();
      $validation->check($_POST, array(
          'post_body' => array(
              'required' => true,
              'max' => 300
            )
        ));

    	if(isset($validation))
    	{
        if($validation->passed())
        {
          $post = new Post();
          try {
            $post->create(array(
              'user_id' => $currentUser->data()->id,
              'post' => Input::get('post_body'),
              'created_at' => date('Y-m-d H:i:s'),
              'saves' => 0
            ));
          } catch (Exception $e) {
            echo 'error';
            exit();
          }
            $posts = DB::getInstance()->fetchToClass("SELECT * FROM users_posts WHERE `user_id`=".$currentUser->data()->id." ORDER BY `created_at` DESC", 'Post');
            ?><div class="col-md-8 center-block">
            <?php
            foreach ($posts as $aPost)
            {
              echo $aPost->displayForProfile();
            }
            ?>
            </div>
            <?php
            exit();
        }
        else
        {
          echo 'error';
          exit();
        }
      }
      else
      {
        echo 'error';
        exit();
      }
    }
    else
    {
      echo 'error';
      exit();
    }
  }
  else
  {
    echo 'error';
    exit();
  }
}
else
{
  echo 'error';
  exit();
}
?>