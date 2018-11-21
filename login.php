<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="content-language" content="ru"/>
    <meta name="description" content="Профиль пользователя" />
    <meta name="keywords" content="Ф.И.О., Номер телефона, Ваше место жительства, Добавьте ваш веб-сайт, Добавьте ссылку на свой профиль в сети , Ваша дата рождения, Добавьте языки которыми владеете, Ваш пол, Женский, Мужской" />
    <meta name="author" content="ВЛАДИСЛАВ ГЕННАДЬЕВИЧ ФРАСИНЮК"/>
    <meta name="copyright" content="ВЛАДИСЛАВ ГЕННАДЬЕВИЧ ФРАСИНЮК"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <link rel="stylesheet" href="css/bootstrap.min.css"></link> 
    <link rel="stylesheet" href="css/style_join.css"></link>
    <title>Вход</title>
</head>
<body>
    <?php
	require "db.php";
?>
<?php
	$data = $_POST;
	if( isset($data['do_login']))
	{	
		$errors = array();
		$user = R::findOne('users', 'login = ?', array($data['login']));
	}

	if( $user )
	{
		//если имя(логин) сущестует
		if( password_verify($data['password'], $user->password))
	{
		
		$_SESSION['logged_user'] =$user;
		header("Location: /profile.php");
		echo '<div style="color: green;">Вы авторизованы. Можно переходить в <a href="profile.php">профайл</a>!</div><hr>';

	
	}
		else
		
	{
		$errors[] = 'Неверный пароль. Введите пароль без ошибок';
	}		

	}	
		else
	{
		$errors[] = 'Пользователь не найден. Следует проверить имя';
	}		

		if( ! empty($errors))
	{		
		echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
	}
?>

	<div class="form">
	<form action="/login.php" method="POST">
		<!-- Скрытые поля для отправки на почту. -->
		<input type="hidden" name="project_name" value="Project_TRLogic">
		<input type="hidden" name="admin_email" value="vlaxbal@vlaxonius.ml">
		<input type="hidden" name="form_subject" value="Пользователь вошел в систему">
		<!-- Скрытые поля для отправки на почту. Конец -->
  <div class="form-group">
    <label for="formGroupExampleInput">Ваше имя:</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Введите ваше имя" name="login" value="<?php echo @$data['login']; ?>" required>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Ваш пароль:</label>
    <input type="password" class="form-control" id="formGroupExampleInput2" placeholder="Введите ваш пароль" name="password" value="<?php echo @$data['password']; ?>" required>
  </div>
   <div class="form-group">
      <button type="submit" class="btn btn-success submit_btn" name="do_login">Войти</button>
    </div>
  	</form>
  </div>
  
 </body>
</html>
