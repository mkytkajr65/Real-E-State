<?php
class Post
{
	public $user_id;
	public $post;
	public $saves;
	public $created_at;

	private $db;

	public function __construct($user_id = null) {

		$this->db = DB::getInstance();

		if ($user_id) {
			$data = $this->db->get('users_posts', array('user_id', '=', $user_id));

			if ($data->count()) {
				$this->user_id = $data->first()->user_id;
				$this->post = $data->first()->post;
				$this->saves = $data->first()->saves;
				$this->created_at = $data->first()->created_at;
			}
		}
	}

	public function create($fields = array()) {
		if (!$this->db->insert('users_posts', $fields)) {
			throw new Exception("There was an error creating the track");
		}
	}

	public function displayForProfile()
	{
		$postUser = new User($this->user_id);
		include 'includes/miniPost.php';
	}
}
?>