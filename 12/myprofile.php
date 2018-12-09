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
<ul>
	<li><a href="/">Главная</a></li>
 
</ul>
</div>
      <div id="logo"></div>
      <a href="bask.php"><div id="basket"></div></a>
	</div>
	
</header>

<div class="header">
    <div class="container flex-container">

      <div class="header-nav">
        <li><a href="">Характеристики</a></li>
        <li><a href="">Тест-драйв</a></li>
        <li><a href="">Видео</a></li>
      </div> 

      <ul class="logo">
        <a href="">
          <img src="images/logo.png" alt="">
        </a>
      </ul>
    </div>  

  </div>


   


      <div class="flex-container2 categories">
                  
                  <div>
                            <h2>Каталог</h2>
                            <div>
                                
                                <div>
                                    <div>
                                        <h4 ><a href="#">Категория</a></h4>
                                    </div>
                                </div>
                                <div >
                                    <div>
                                        <h4 ><a href="#">Категория</a></h4>
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <h4><a href="#">Категория</a></h4>
                                    </div>
                                </div>
                                <div>
                                    <div>
                                        <h4><a href="#">Категория</a></h4>
                                    </div>
                                </div>
                                
                                  
                           </div>

                      </div>
          
          
                  <div class="goods-out"></div>
          
          
                      </div>










<footer class="clear">
	<p>Все права защищены</p>
</footer>





<script src="js/jquery-3.2.1.min.js"></script>
 <script src="js/main.js"></script> 
<!--<script src="js/admin.js"></script>-->
</body>
</html>
