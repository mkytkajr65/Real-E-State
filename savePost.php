<?php
require_once('core/init.php');
$user = new User();

if ($user->getIsLoggedIn()) {

	if (Input::exists()) {
		if (Input::get('post_id')) {
			$post_id = Input::get('post_id');

			$update = DB::getInstance()->query("UPDATE users_posts SET `saves`=`saves`+1 WHERE `id`=?", array($post_id));
			if(!$update->error()) {
				$save = new Save();
				try {
					$save->create(array(
					'post_id' => $post_id,
					'user_id' => $user->data()->id,
					'created_at' => date('Y-m-d h:i:s')
					));
				} catch (Exception $e) {
					$rv = array('success' => false);
					echo json_encode($rv);
				  	exit();
				}
				$targetPost = DB::getInstance()->fetchToClass("SELECT * FROM users_posts WHERE `id`=".$post_id,"Post");
				$rv = array('success' => true, 'saves' => $targetPost[0]->saves);
              	echo json_encode($rv);
              	exit();
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
$rv = array('success' => false);
	echo json_encode($rv);
  	exit();

?>