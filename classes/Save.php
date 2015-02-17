<?php

class Save {

	public $id;
	public $post_id;
	public $user_id;
	public $created_at;

	private $db;

	public function create($fields = array()) {
		$this->db = DB::getInstance();
		if (!$this->db->insert('saves', $fields)) {
			throw new Exception("There was an error recording the likes");
		}
	}
}




?>