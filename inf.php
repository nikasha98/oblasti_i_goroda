
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type"  charset="utf-8" />
	<title>Просмотр инфорамции</title>
	<meta name="description" content="Сайт c базой данных по областям и городам"> 
	<link href="css.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div id='body'>
		<header>
			  <ul>
				<li id='menu'><a href="index.php">  Главная</a></li>
				<li id='menu'><a href="form.php">  Добавление информации</a></li>
				<li id='menu'><a href="#">  Просмотр Информации</a></li>
			  </ul>
			<h1>Поиск города</h1>
		</header>
        <div class="container">
			<form  action="" method="POST">
				<div class="form-row">
					 <label for="city_name"><b>Название города:</b></label>
					 <input type="text" name="city_name"  style="font-size: 12pt;" id="city_name" required >
				  </div>
				  <br>
				  <p class='form-row'><input class='button' type="submit" name="poisk" style="font-size: 12pt;" value="Найти информацию о городе"></p>

			</form>
			
		</div>
		<?php
include "bd.php";

	$city_name = $_POST['city_name'];
	$obl_id = $_POST['id_lager'];
	$opis = $_POST['opis'];
	$URL_picture = $_POST['URL_picture'];	
	if( isset( $_POST['poisk'] ) ) { // Если нажато найти	
		
			$query = mysqli_query($link, "SELECT * FROM `city` WHERE city.city_name='$city_name'");
			if (mysqli_num_rows($query) == 0) 
				echo  'Такого города нет в нашей базе ✘';
			else
		{ //проихводим вывод таблицы из базы с введенным городом
			echo "<table border=1> 
							<tr>
							   <td> Название городa</td>
							   <td> Описание</td>
							   <td> Картинка</td>	 
							</tr>";
				    $city = mysqli_fetch_array($query);
						echo "<tr>
							   <td> {$city['city_name']}</td>
							   <td> {$city['opis']}</td>
					<td> <img src='{$city['URL_picture']}'></td>
							</tr>";
					
					echo "</table></div><br>";
		
		}
		
}
mysqli_close($link);
?>
	<footer class='footer'>
		<div align="center" valign="bottom" style="padding-top:6px;" class="copyright">МГТУ им Г.И.Носова &copy; 2019 Шадрина Вероника</div>
	</footer>
	</div>
</body>
</html>