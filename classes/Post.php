<?php
class Post
{
	public $id;
	public $user_id;
	public $post;
	public $saves;
	public $created_at;

	private $db;

	public function __construct($id = null) {

		$this->db = DB::getInstance();
		
		if ($id) {
			$data = $this->db->get('users_posts', array('id', '=', $id));

			if ($data->count()) {
				$this->id = $data->first()->id;
				$this->user_id = $data->first()->user_id;
				$this->post = $data->first()->post;
				$this->saves = $data->first()->saves;
				$this->created_at = $data->first()->created_at;
			}
		}
	}

	public function create($fields = array()) {
		if (!$this->db->insert('users_posts', $fields)) {
			throw new Exception("There was an error creating the post");
		}
	}

	public function userSavedPost($thisUser) {
		if (!isset($thisUser)) {
			$thisUser = new User();
		}
		if ($thisUser->getIsLoggedIn()) {
			$likeQuery = DB::getInstance()->query("SELECT * FROM saves WHERE `post_id`= ? AND `user_id`=?", array($this->id, $thisUser->data()->id));
			if ($likeQuery->count() > 0) {
				$likesPost = true;
			} else {
				$likesPost = false;
			}
		} else {
			echo "false";
			$likesPost = false;
		}
		return $likesPost;
	}

	public function displayForProfile()
	{
		include 'includes/miniPost.php';
	}

	public function find($id = null)
	{
		if($id)
		{
			$data = $this->db->get('users_posts', array('id', '=', $id));

			if($data->count())
			{
				$this->id = $data->first()->id;
				$this->user_id = $data->first()->user_id;
				$this->post = $data->first()->post;
				$this->saves = $data->first()->saves;
				$this->created_at = $data->first()->created_at;
				return true;
			}
		}
	}		
}
?>