

function check_form_add(){
	if(document.getElementById("name").value == ''){
		window.alert("Ви не заповнили поле Ім`я, будь ласка зробіть це!");
		return false;
	}
	else if(document.getElementById("text").value == ''){
		window.alert("Ви не заповнили поле Відгук, будь ласка зробіть це!");
		return false;
	}
	else if(document.getElementById("email").value == ''){
		window.alert('Ви не заповнили поле Email, будь ласка зробіть це!');
		return false;
	}
	else if(document.getElementById("captcha").value == ''){
		window.alert('Ви не заповнили поле Перевірка, будь ласка зробіть це!');
		return false;
	}
	
	return true;
}

function check_form_auth() {
	if(document.getElementById("login").value == ''){
		window.alert("Ви не заповнили поле Логін, будь ласка зробіть це!");
		return false;
	}
	else if(document.getElementById("pass").value == ''){
		window.alert("Ви не заповнили поле Пароль, будь ласка зробіть це!");
		return false;
	}
	
	return true;
}