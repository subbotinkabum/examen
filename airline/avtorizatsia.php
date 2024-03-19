<?php
$host = 'localhost';
$database = 'airline_equipment';
$user = 'root';
$password = '';
$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка" . mysqli_error($link));

if (isset($_POST['email']) && isset($_POST['parol'])) {
    $email = $_POST['email'];
    $parol = $_POST['parol'];

    $query = "SELECT * FROM polzovatel WHERE email = '$email' AND parol = '$parol'";
    $result = mysqli_query($link, $query) or die("Ошибка" . mysqli_error($link));
    
    if (mysqli_num_rows($result) == 1) {
        echo "Авторизация успешна! Добро пожаловать, $email $parol! ";
        // В этом месте можно установить сессию для авторизованного пользователя
    } else {
        echo "Неверное имя или фамилия. Пожалуйста, проверьте ваши данные. ";
    }
}
?>

<html>
<head>
  <meta charset="utf-8" />
  <title>Авторизация</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div>
	<form method="POST">
<div class="form-structor">
	<div class="signup">
		<h2 class="form-title" id="signup"><span>Нет аккаута?</span>Авторизация</h2>
		<div class="form-holder">
				<input  for="email" class="input" type="text" name="email" placeholder="Почта" required />
				<input pattern="[а-яА-ЯёЁ\s]{3,20}" for="parol" class="input" type="password" name="parol" placeholder="Пароль" required />
		</div>
		<button class="submit-btn">Войти</button>
		<button class="submit-btn" onclick="redirectToAvtorizatsia()">Зарегистрироваться</button>
		</div>
			</div>
	</form>
  </div>
  <script>
        function redirectToAvtorizatsia() {
            window.location.href = 'registratsia.php';
        }
    </script>
</body>
</html>



