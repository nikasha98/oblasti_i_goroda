<?php include "bd.php";?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type"  charset="utf-8" />
	  <title>Города и области</title>
  <meta name="description" content="Сайт c базой данных по областям и городам"> 
	<link href="css.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div id='body'>
		<header>
			  <ul>
				<li id='menu'><a href="#">  Главная</a></li>
				<li id='menu'><a href="form.php">  Добавление информации</a></li>
				<li id='menu'><a href="inf.php">  Просмотр информации</a></li>
			  </ul>
			<img src='obl.jpg' class='heder'>
			<h1>Области и города</h1>
		</header>	
        <div class='cont'>     
		  <?php $bd_geography = mysqli_query($link, 'SELECT * FROM `oblasty`');   //созадем вывод табличек из базы
		  while ($oblasty = mysqli_fetch_array($bd_geography)) {
				   $id = $oblasty['id'];
                   echo "<div style=' width:100%; display: inline-flex; margin-top:10px; border:#FFFFFF solid 2px;'>
						   <p style='margin: 8px;'> Название области: {$oblasty['obl_name']}<br>
						   <p style='margin: 8px;'> Имя губернатора: {$oblasty['FIO']}<br> </p>";
				   $query = mysqli_query($link, "SELECT * FROM `city` WHERE city.id_obl='$id'");
				   	    echo "<table border=1>
							<tr>
							   <td> Название городa</td>
							   <td> Описание</td>
							   <td> Картинка</td>	 
							</tr>";
				    while ($city = mysqli_fetch_array($query)) {
						echo "<tr>
							   <td> {$city['city_name']}</td>
							   <td> {$city['opis']}</td>
					<td> <img src='{$city['URL_picture']}'></td>
							</tr>";
					}
					echo "</table></div><br>";
				}
				mysqli_close($link);
		   ?>
		</div>
		<br>
	<footer class='footer'>
		<div align="center" valign="bottom" style="padding-top:12px;" class="copyright">МГТУ им Г.И.Носова &copy; 2019 Шадрина Вероника</div>
	</footer>
	</div>
</body>
</html>