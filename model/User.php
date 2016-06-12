<?php

class User
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


	public function authUser($login, $pass)
	{
		$sth = $this->pdo->prepare('SELECT *
							    FROM ot_users
							    WHERE login = ? AND pass = ?');

		$sth->execute(array($login, $pass));
		$red = $sth->fetch();

		if($red['login'] == 'admin'){
			$_SESSION['auth']['admin'] = $login;
			redirect();
		}else{
			$msg_text = "Поле Логін або Пароль було введено неправильно!";
			$error = new Error();
			$error->message($msg_text);
		}
	}
	
}