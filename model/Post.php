<?php

class Post
{
	static private $instance = null;

	private function __construct()
	{
		$dsn = "mysql:host=".HOST.";dbname=".DB.";charset=utf8";
		$opt = array(
		    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
		    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		);
		$this->pdo = new PDO($dsn, USER, PASS, $opt);
	}

	private function __clone() {}
	private function __wakeup() {}

	static function getInstance() 
	{
		if (self::$instance == null) {
			self::$instance = new self();
		}
		return self::$instance;
	}
	

	public function showPost()
	{
		$query = $this->pdo->query('SELECT * FROM ot_posts ORDER BY date DESC')->fetchAll(PDO::FETCH_ASSOC);
		return $query;
	}

	public function addPost($name, $text, $email, $site, $ip, $browser, $date)
	{
		$sql = "INSERT INTO ot_posts(
		`name`,
	    `text`,
	    `email`,
	    `site`,
	    `date`,
	    `ip`,
	    `browser`) VALUES (
	    :name, 
	    :text, 
	    :email, 
	    :site,
	    :date, 
	    :ip,
	    :browser)";
	                                  
		$stmt = $this->pdo->prepare($sql);
		                                              
		$stmt->bindParam(':name', $name, PDO::PARAM_STR);       
		$stmt->bindParam(':text', $text, PDO::PARAM_STR); 
		$stmt->bindParam(':email', $email, PDO::PARAM_STR); 
		$stmt->bindParam(':site', $site, PDO::PARAM_STR); 
		$stmt->bindParam(':date', $date, PDO::PARAM_STR);
		$stmt->bindParam(':ip', $ip, PDO::PARAM_STR);   
		$stmt->bindParam(':browser', $browser, PDO::PARAM_STR); 
		                                      
		$stmt->execute();

		redirect();
	}

	public function deletePost($id)
	{
		$sql = "DELETE FROM ot_posts WHERE id = :id LIMIT 1";
		$stmt = $this->pdo->prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);   
		$stmt->execute();

		redirect();
	}

	public function editQueryPost($id)
	{
		$stmt = $this->pdo->prepare("SELECT * FROM ot_posts WHERE id=? LIMIT 1");
		$stmt->execute(array($id));
		$edit_query_post = $stmt->fetch();

		return $edit_query_post;
	}

	public function editDataPost($id, $name, $text, $email, $site)
	{
		$sql = "UPDATE `ot_posts` SET 
	            `name` = :name, 
	            `text` = :text,
	            `email` = :email,  
	            `site` = :site  
	            WHERE `id` = :id";

			$stmt = $this->pdo->prepare($sql);        
			$stmt->bindParam(':name', $name, PDO::PARAM_STR);   
			$stmt->bindParam(':text', $text, PDO::PARAM_STR);  
			$stmt->bindParam(':email', $email, PDO::PARAM_STR);
			$stmt->bindParam(':site', $site, PDO::PARAM_STR); 
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);  
			$stmt->execute(); 

			redirect();
	}


}