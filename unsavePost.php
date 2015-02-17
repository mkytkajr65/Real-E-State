<?php

require_once('core/init.php');

$user = new User();

if ($user->getIsLoggedIn()) {
	if (Input::exists()) {

		if (Input::get('post_id')) {

			$post_id = Input::get('post_id');

			$update = DB::getInstance()->query("UPDATE users_posts SET `saves`=`saves`- 1 WHERE `id`=?", array($post_id));
			if(!$update->error()) {
				$deleteSave = DB::getInstance()->query("DELETE FROM saves WHERE `post_id` = ? AND `user_id` = ?", array($post_id, $user->data()->id));
				if(!$deleteSave->error())
				{
					$targetPost = DB::getInstance()->fetchToClass("SELECT * FROM users_posts WHERE `id`=".$post_id,"Post");
					$rv = array('success' => true, 'saves' => $targetPost[0]->saves);
              		echo json_encode($rv);
              		exit();
				}
				else
				{
					$rv = array('success' => false);
					echo json_encode($rv);
	              	exit();
				}
			} else {
				$rv = array('success' => false);
				echo json_encode($rv);
              	exit();
			}
		}
	}
} else {
	$rv = array('success' => false);
	echo json_encode($rv);
  	exit();
}

?>