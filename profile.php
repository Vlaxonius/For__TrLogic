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
    <link rel="stylesheet" href="css/style.css"></link>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.1/TweenMax.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,700,700i,800,800i,900,900i" rel="stylesheet">
    <title>Профайл</title>

</head>
<body>
        
    <div class="h1"><h1>Профайл</h1></div>
  <audio autoplay>
    <source src="audio/play.mp3" type="audio/mpeg">
      <source src="" type="audio.mp3">
    Аудио не поддерживается вашим браузером
  </audio>
  

  <form>
      <!-- Скрытые поля для отправки на почту. -->
		<input type="hidden" name="project_name" value="Project_TRLogic">
		<input type="hidden" name="admin_email" value="vlaxbal@vlaxonius.ml">
		<input type="hidden" name="form_subject" value="Пользователь изменил личные данные">
		<!-- Скрытые поля для отправки на почту. Конец -->
  <div class="form-group row">
    <label for="inputName" class="col-sm-2 col-form-label condition" name="name">Ф.И.О.</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputName" placeholder="Введите ваше имя" value="<?php echo @$data['name']; ?>" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPhone" class="col-sm-2 col-form-label condition" name="phone">Номер телефона</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPhone" placeholder="Введите ваш номер телефона" value="<?php echo @$data['phone']; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputName" class="col-sm-2 col-form-label condition" name="location">Ваше место жительства</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputName" placeholder="Введите ваш адрес" value="<?php echo @$data['location']; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputName" class="col-sm-2 col-form-label condition" name="site">Добавьте ваш веб-сайт</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputName" placeholder="Пример: 'www.google.com.ua'" value="<?php echo @$data['site']; ?>" >
    </div>
  </div>
  <div class="form-group row">
    <label for="inputName" class="col-sm-2 col-form-label condition" name="url">Добавьте ссылку на свой профиль в сети</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputName" placeholder="Скопируйте сюда ссылку из браузера" value="<?php echo @$data['url']; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputDate" class="col-sm-2 col-form-label condition" name="dateb">Ваша дата рождения</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="inputDate" placeholder="Ваша дата рождения" value="<?php echo @$data['dateb']; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputName" class="col-sm-2 col-form-label condition" name="language">Добавьте языки которыми владеете</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputName" placeholder="Например: English, Español, Română..." value="<?php echo @$data['language']; ?>">
    </div>
  </div>
  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0 condition" name="sex">Ваш пол</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
          <label class="form-check-label" for="gridRadios1" name="woman">Женский</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
          <label class="form-check-label"   for="gridRadios2" name="man">Мужской</label>
        </div>
      </div>
    </div>
  </fieldset>
  <div class="form-group row">
    <div class="col-3-sm-2">
      <button type="submit" class="btn btn-success btn_dark submit_btn" name="correcting">Kорректировать профиль</button>
    </div>
    <div class="col-2-sm-2 ml-2">
      <button type="submit" class="btn btn-primary btn-light exit_btn"><a href="/logout.php">Выйти</a></button>
  </div>
  </div>
</form>

<script>
    $(document).ready(function() {

	//E-mail Ajax Send
	$("form").submit(function() { //Change
		var th = $(this);
		$.ajax({
			type: "POST",
			url: "mail.php", //Change
			data: th.serialize()
		}).done(function() {
			alert("Спасибо!");
			setTimeout(function() {
				// Done Functions
				window.location='logout.php'
				th.trigger("reset");
			}, 1000);
		});
		return false;
	});

    });
</script>

    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="mail/script.js"></script>
</body>

</html>
