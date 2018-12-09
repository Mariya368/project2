<?php
$dbc = mysqli_connect('localhost', 'root', 'root', 'lesson');
if(!isset($_COOKIE['user_id'])) {
	if(isset($_POST['submit'])) {
		$user_username = mysqli_real_escape_string($dbc, trim($_POST['username']));
		$user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));
		if(!empty($user_username) && !empty($user_password)) {
			$query = "SELECT `user_id` , `username` FROM `signup` WHERE username = '$user_username' AND password = SHA('$user_password')";
			$data = mysqli_query($dbc,$query);
			if(mysqli_num_rows($data) == 1) {
				$row = mysqli_fetch_assoc($data);
				setcookie('user_id', $row['user_id'], time() + (60*60*24*30));
				setcookie('username', $row['username'], time() + (60*60*24*30));
				$home_url = 'http://' . $_SERVER['HTTP_HOST'];
				header('Location: '. $home_url);
			}
			else {
				echo 'Извините, вы должны ввести правильные имя пользователя и пароль';
			}
		}
		else {
			echo 'Извините вы должны заполнить поля правильно';
		}
	}
}
?> 


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title> * </title>
    <link rel="stylesheet" href="css/style.css">
    <link href="style/style.css" rel="stylesheet">
</head>
<body>


<header>
<div class="header">
    <div class="container flex-container">

      <div class="header-nav">
        <li><a href="">Характеристики</a></li>
        <li><a href="">Тест-драйв</a></li>
        <li><a href="">Видео</a></li>
      </div> 

      <ul class="logo">
        <a href="">
          <img src="images/7.png" width="700px" height="350" alt="">
        </a>
      </ul>
    </div>  

  </div>

</header>




<section>
<div class="search">
<div class="searchin">
<?php
	if(empty($_COOKIE['username'])) {
?>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<label for="username">Логин:</label>
	<input type="text" name="username">
	<label for="password">Пароль:</label>
	<input type="password" name="password">
	<button type="submit" name="submit">Вход</button>
	<a href="signup.php">Регистрация</a>
	</form>
<?php
}
else {
	?>
	<p><a href="myprofile.php">Мой профиль</a></p>
	<p><a href="exit.php">Выйти(<?php echo $_COOKIE['username']; ?>)</a></p>
<?php	
}
?>
     </div>



    </div>

</section>


<div class="goods-out"></div>
             
          



<footer class="clear">
	<p>Все права защищены</p>
</footer>





<script src="js/jquery-3.2.1.min.js"></script>
 <script src="js/main.js"></script> 
<!--<script src="js/admin.js"></script>-->
</body>
</html>
