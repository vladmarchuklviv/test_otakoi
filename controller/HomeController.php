<?php

class Home extends App 
{
	public function __construct() 
	{
		parent::__construct();		
	}

	public function index()
	{
		$model = Post::getInstance();
		$query_posts = $model->showPost();

		$this->view->render('index', $query_posts);
	}

	public function addPost()
	{
		$this->view->render('add', null);

		if (isset($_POST['name'])) {

			$name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
			$text = trim(filter_input(INPUT_POST, 'text', FILTER_SANITIZE_STRING));
			$email = trim(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));
			$site = trim(filter_input(INPUT_POST, 'site', FILTER_SANITIZE_STRING));
			$ip = trim(filter_input(INPUT_POST, 'ip', FILTER_VALIDATE_IP));
			$browser = trim(filter_input(INPUT_POST, 'browser', FILTER_SANITIZE_STRING));
			$captcha = filter_input(INPUT_POST, 'captcha', FILTER_SANITIZE_STRING);

			if(empty($name)){
				$msg_text = "Ви не заповнили поле Ім'я, спобуйте ще";
				$error = new Error();
				$error->message($msg_text);
			} elseif(empty($text)){
				$msg_text = "Ви не заповнили поле Відгук, спобуйте ще";
				$error = new Error();
				$error->message($msg_text);
			} elseif(empty($email)){
				$msg_text = "Ви не заповнили поле Email, спобуйте ще";
				$error = new Error();
				$error->message($msg_text);
			} elseif (!isset($_SESSION['auth']['admin']) && $captcha !== $_SESSION['rand_code']) {
				if ($captcha !== $_SESSION['rand_code']) {
					$msg_text = "Ви неправильно ввели текст з картинки, будь-ласка введіть ще раз!";
					$error = new Error();
					$error->message($msg_text);
				}
			} else {
				$date = date("d.m.Y");

				$model = Post::getInstance();
				$model->addPost($name, $text, $email, $site, $ip, $browser, $date);
			}
		}
	}

	public function authUser()
	{
		if (isset($_POST['login'])) {
			$login = trim(filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING));
			$pass = trim(filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING));

			if(empty($login) || empty($pass)){
				$msg_text = "Логін і Пароль мають бути заповненні!";

				$error = new Error();
				$error->message($msg_text);
			}

			$model = User::getInstance();
			$retur = $model->authUser($login, $pass);

			//redirect();
		}
	}

	public function logoutUser()
	{
		if(isset($_SESSION['auth']['admin']) && $_SESSION['auth']['admin'] == 'admin'){
			unset($_SESSION['auth']['admin']);
			redirect();
		}
	}

	public function deletePost($id)
	{
		if (isset($_SESSION['auth']['admin'])){
			if (is_numeric($id)){
				$model = Post::getInstance();
				$model->deletePost($id);
			} else {
				$msg_text = "При видаленні сталася помилка";

				$error = new Error();
				$error->message($msg_text);
			}
		} else {
			$msg_text = "Ви не маєте доступу до можливостей адміністратора!";

			$error = new Error();
			$error->message($msg_text);
		}
	}

	public function editPost($id)
	{
		if (isset($_SESSION['auth']['admin'])){
			if (is_numeric($id)){
				if (!isset($_POST['name'])){
					$model = Post::getInstance();
					$edit_query_post = $model->editQueryPost($id);

					$this->view->render('add', $edit_query_post);

				} elseif (isset($_POST['name'])) {
					$name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
					$text = trim(filter_input(INPUT_POST, 'text', FILTER_SANITIZE_STRING));
					$email = trim(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));
					$site = trim(filter_input(INPUT_POST, 'site', FILTER_SANITIZE_STRING));

					if(empty($name)){
						$msg_text = "Ви не заповнили поле Ім'я, спобуйте ще";
						$error = new Error();
						$error->message($msg_text);
					} elseif(empty($text)){
						$msg_text = "Ви не заповнили поле Відгук, спобуйте ще";
						$error = new Error();
						$error->message($msg_text);
					} elseif(empty($email)){
						$msg_text = "Ви не заповнили поле Email, спобуйте ще";
						$error = new Error();
						$error->message($msg_text);
					} else {
						$model = Post::getInstance();
						$model->editDataPost($id, $name, $text, $email, $site);
					}
				}
			} else {
				$msg_text = "Неправильно заданий параметр редагування";

				$error = new Error();
				$error->message($msg_text);
			}
		} else {
			$msg_text = "Ви не маєте доступу до можливостей адміністратора!";

			$error = new Error();
			$error->message($msg_text);
		}
	}
}
