<?php
    include "bd.php";
    $id = $_POST['id'];
	$obl_name = $_POST['obl_name'];
	$FIO = $_POST['FIO'];
	$id_name = $_POST['id_obl'];
	$city_name = $_POST['city_name'];
	$opis = $_POST['opis'];
	$URL_picture = $_POST['URL_picture'];

	
if( isset( $_POST['plusObl'] ) ) {
	$flag = 1;
	$bd_geography = mysqli_query($link, 'SELECT * FROM `oblasty`');
	while ($oblasty = mysqli_fetch_array($bd_geography)) {
			if($oblasty['obl_name']==$obl_name){	//Проверка наличия области		 
				$flag = 0;
			}
	}	
	if($flag == 1){
		//занесение данных в таблицу
					$result = mysqli_query($link, "INSERT INTO `oblasty` (`obl_name`, `FIO`) VALUES ('$obl_name','$FIO')");
					$vivod1 = "Данные успешно добавлены ✔";
	}
	else{
		$vivod1 = 'Данная область уже присутствует в базе';
	}
}

if( isset( $_POST['plusCity'] ) ) {
	$flag = 1;
	$bd_geography = mysqli_query($link, 'SELECT * FROM `city`');
	while ($city = mysqli_fetch_array($bd_geography)) {
			if($city['city_name']==$city_name){	//Проверка наличия города		 
				$flag = 0;
			}
	}	
	if($flag == 1){
		//занесение данных в таблицу
		$a = 1;
		
		$bd_geography = mysqli_query($link, "SELECT * FROM `oblasty` where `obl_name`='$id_name'");
	    $oblasty = mysqli_fetch_array($bd_geography);
		$a = $oblasty['id'];
		$result = mysqli_query($link, "INSERT INTO `city` (`id_obl`,`city_name`, `opis`,`URL_picture`) VALUES ('$a','$city_name','$opis','$URL_picture')");
		$vivod2 = "Данные успешно добавлены ✔";
	}
	else{
		$vivod2 = 'Данный город уже есть в базе';
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type"  charset="utf-8" />
	<title>Добавление информации</title>
	<meta name="description" content="Сайт c базой данных по областям и городам"> 
	<link href="css.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div id='body'>
		<header>
			  <ul>
				<li id='menu'><a href="index.php">  Главная</a></li>
				<li id='menu'><a href="#">  Добавление информации</a></li>
				<li id='menu'><a href="inf.php">  Просмотр информации</a></li>
			  </ul>
			<h1>Добавить инфоррмацию о городе или области</h1>
		</header>
        <div class="container">
			<form method="POST" action="">
				<div class="form-row">
					 <label for="obl_name"><b>Название области:</b></label> <input type="text" name="obl_name" style="font-size: 12pt;" id="obl_name" required >
				  </div>
				  <br>
				  <div class="form-row">
					 <label for="FIO"><b>Губернатор:</b></label> <input type="text" name="FIO"  style="font-size: 12pt;" id="FIO" required >
				  </div>
				  <p class='form-row'><input class='button' type="submit" name="plusObl" style="font-size: 12pt;" value="Добавить область"></p>
				  <p class='vivod'><?php echo $vivod1; ?></p>
				  <br>
			</form>
			<form method="POST" action="">
					<div class="form-row">
					 <label for="id_obl"><b>Название области:</b></label>
					
					<?php echo "<select name='id_obl' size='1' style='font-size: 12pt;'>";     //список существующих областей
					 echo "<option selected='selected' style='font-size: 12pt; value='0''>Выберете область</option>";
					 $bd_geography = mysqli_query($link, 'SELECT * FROM `oblasty`');           
					 while ($oblasty = mysqli_fetch_array($bd_geography)) {
							echo "<option value='{$oblasty['obl_name']}'style='font-size: 12pt;'>{$oblasty['obl_name']}</option>"; 
					 }
					 echo "</select>";
					 ?>
					 
				  </div>
				  <div class="form-row">
					 <label for="city_name"><b>Название города: </b></label> <input type="text" name="city_name"  style="font-size: 12pt;" id="city_name" required >
				  </div>
				  <br>
				  <div class="form-row">
					 <label for="opis"><b>Описание:</b></label> <input type="text" name="opis"  style="font-size: 12pt;" id="opis" required >
				  </div>
				  <br>
				  <div class="form-row">
					 <label for="URL_picture"><b>URL картинки:</b></label> <input type="text" name="URL_picture" style="font-size: 12pt;" id="URL_picture" required >
				  </div>
				  <p class='form-row'><input class='button' type="submit" name="plusCity" style="font-size: 12pt;" value="Добавить город"></p>
				  <p class='vivod'><?php echo $vivod2; 
				  mysqli_close($link);?></p>
			</form>
			
		</div>
	<footer class='footer'>
		<div align="center" valign="bottom" style="padding-top:6px;" class="copyright">МГТУ им Г.И.Носова &copy; 2019 Шадрина Вероника</div>
	</footer>
	</div>
</body>
</html>