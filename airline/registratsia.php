<html>
<meta charset="utf-8"/>
<head>
<title>Регистрация</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div>
<?php 
$host='localhost';
$database='airline_equipment';
$user='root';
$password='';
$link=mysqli_connect($host,$user,$password,$database) or die ("Ошибка" . mysqli_error($link));
if(isset($_POST['imya'])&& isset($_POST['familia'])&& isset($_POST['email'])&& isset($_POST['parol']))
{
	$imya = $_POST['imya'];
	$familia = $_POST['familia'];
	$email = $_POST['email'];
	$parol = $_POST['parol'];
	
	if($imya && $familia && $email && $parol)
	{
		$query = "insert into polzovatel(imya,familia,email,parol) values ('$imya','$familia','$email','$parol')";
		$result = mysqli_query($link,$query) or die ("Ошибка" . mysqli_error($link));
		
		
	if ($result) {
	   mysqli_close($link); // Close the database connection
	   header("Location: index.html"); // Redirect to success page
	   exit;
	  } else {
	   die("Ошибка: " . mysqli_error($link));
	  }
	}
}
?>

</div>

<form method="POST">
<div class="form-structor">
	<div class="signup">
		<h2 class="form-title" id="signup"><span>Нет аккаута?</span>Регистрация</h2>
		<div class="form-holder">
				<input  pattern="[а-яА-ЯёЁ\s]{3,20}" class="input" type="text" name="imya" placeholder="Имя" required />
				<input pattern="[а-яА-ЯёЁ\s]{3,20}" class="input" type="text" name="familia" placeholder="Фамилия" required />
			<div style="margin-bottom:8px;">
				<input class="input" type="email" name="email" placeholder="Почта" required />
				<input type="password" name="parol" class="input" placeholder="Пароль" required />
			</div>
		</div>
		<button class="submit-btn">Зарегистрироваться</button>
		<button class="submit-btn" onclick="redirectToAvtorizatsia()" >Авторизироваться</button>
		</div>
			</div>
	</form>
	 <script>
        function redirectToAvtorizatsia() {
            window.location.href = 'avtorizatsia.php';
        }
    </script>
</body>
</html>
