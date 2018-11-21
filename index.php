<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="content-language" content="ru"/>
    <meta name="description" content="Профиль пользователя" />
    <meta name="keywords" content="Регистрация, авторизация" />
    <meta name="author" content="ВЛАДИСЛАВ ГЕННАДЬЕВИЧ ФРАСИНЮК"/>
    <meta name="copyright" content="ВЛАДИСЛАВ ГЕННАДЬЕВИЧ ФРАСИНЮК"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <link rel="stylesheet" href="css/bootstrap.min.css"></link> 
    <link rel="stylesheet" href="css/entrance.css"></link>
    <title>Главное меню</title>
</head>
<body>
    <style>
        body{
        margin: 0 0 44rem;
        overflow: hidden;
        }
        </style>
<?php
require ('db.php');
?>

<?php if( isset($_SESSION['logged_user']) ) : ?>
	<div>Авторизован!</div><br/>
	<div></div>Здравствуйте, <?php echo $_SESSION['logged_user']->login; ?>!</div>
	<hr>
	<div class="d-flex flex-shrink-1 justify-content-center"><a href="/logout.php" class="btn btn-outline-primary btn-lg btn-block ml-1" role="button">Выйти</a></div>
<?php else : ?>
	<br>

<div class="wrap">
      <a href="/login.php" class="button">Авторизация</a>
      <a href="/signup.php" class="button_2">Регистрация</a>
    </div>

<?php endif; ?>

</body>
</html>
