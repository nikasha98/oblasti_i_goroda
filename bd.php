<?php
  $host = 'localhost';  // Хост, у нас все локально
  $user = 'root';    // Имя пользователя
  $pass = ''; // Установленный пароль пользователю
  $db_name = 'bd_geography';   // Имя базы данных
  $link = mysqli_connect($host, $user, $pass, $db_name); // Соединяемся с базой

  // Ругаемся, если соединение установить не удалось
  if (!$link) {
    echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
    exit;
  }
?>