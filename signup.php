	<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="content-language" content="ru"/>
    <meta name="description" content="Профиль пользователя" />
    <meta name="keywords" content="Ваше имя:, Ваша @почта, Ваш пароль:" />
    <meta name="author" content="ВЛАДИСЛАВ ГЕННАДЬЕВИЧ ФРАСИНЮК"/>
    <meta name="copyright" content="ВЛАДИСЛАВ ГЕННАДЬЕВИЧ ФРАСИНЮК"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <link rel="stylesheet" href="css/bootstrap.min.css"></link> 
    <link rel="stylesheet" href="css/style_join.css"></link>
    <title>Регистрация</title>

</head>
<body>
  <?php
  require ('db.php');

  $data = $_POST;
  if( isset($data['do_signup']))
  { 
    //регистрируем здесь
    $errors = array();
  } 
    if( trim ($data['login']) == '')
  {
      $errors[] = '';

  }
    
    if( trim($data['email']) == '')
  {
      $errors[] = 'Будьте любезны, введите ваш @email';
  }

  
    if( ($data['password']) == '')
  {
      $errors[] = 'Будьте любезны, введите ваш пароль';
  }

    
    if( ($data['password_2']) != $data['password'] )
  {
      $errors[] = 'Пароли не совпали, попробуйте снова';
  }

  if( R::count('users', 'email = ?', array($data['email'])) > 0 )
  {
      $errors[] = 'Следует ввести ваш личный Email';
  }

  

    if( empty($errors))
  {   
    //Для массива с данными
    $user = R::dispense('users');
    $user->login = $data['login'];
    $user->email = $data['email'];
    $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
    //$user->join_date = time();
    R::store($user);
    echo '<div style="color: green;">Упешная регистрация. Поздравляем! Можете выполнить<a href="/login.php" class="btn btn-outline-success btn-sm ml-1" role="button">Вход</a> в систему или:<a href="index.php" class="btn btn-outline-primary btn-sm ml-1" role="button">На главную</a></div><hr>';
  }
    else
  {
    echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
  }


?>

		<!-- Скрытые поля. -->
		<input type="hidden" name="project_name" value="Project_TRLogic">
		<input type="hidden" name="admin_email" value="vlaxbal@vlaxonius.ml">
		<input type="hidden" name="form_subject" value="Зарегистрирован новый пользователь">
		<!-- Скрытые поля. Конец -->

    <div class="form">
	<form method="POST">
  <div class="form-group">
    <label for="formGroupExampleInput">Ваше имя:</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Введите ваше имя" name="login" value="<?php echo @$data['login']; ?>" required>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput">Ваша @почта:</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Введите ваше имя" name="email" value="<?php echo @$data['email']; ?>" required>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Ваш пароль:</label>
    <input type="password" class="form-control" id="formGroupExampleInput2" placeholder="Введите ваш пароль" name="password" value="<?php echo @$data['password']; ?>" required>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Повторно введите ваш пароль:</label>
    <input type="password" class="form-control" id="formGroupExampleInput2" placeholder="Введите ваш пароль" name="password_2" value="<?php echo @$data['password_2']; ?>" required>
  </div>
	
  <div class="col">
     <div class="row ">
      <button type="submit" class="btn btn-primary reg_btn" name="do_signup">Зарегистрироваться</button>
    </div>
    </div></br>
   </form>
  </div>
  	
  	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="js/script.js"></script>
    
 </body>
</html>