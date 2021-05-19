<?php

  $dblocation = "localhost";// здесь пропишите расположение базы, обычно localhost, в случае возникновения проблем обратитесь к службе поддержки хостинга
  $dbname = "test";// имя базы данных
  $dbuser = "root";// имя пользователя базы данных
  $dbpasswd = "";// пароль к базе данных
  $number = 10; // кол-во выводимых сообщений

  // Соединяемся с сервером базы данных
  $dbcnx = @mysql_connect($dblocation,$dbuser,$dbpasswd);
  if (!$dbcnx)
  {
    echo( "<P>В настоящий момент сервер базы данных не доступен, поэтому корректное отображение страницы невозможно.</P>" );
    exit();
  }
  // Выбираем базу данных
  if (! @mysql_select_db($dbname,$dbcnx) )
  {
    echo( "<P>В настоящий момент база данных не доступна, поэтому корректное отображение страницы невозможно.</P>" );
    exit();
  }
mysql_query ("set character_set_client='cp1251'");
mysql_query ("set character_set_results='cp1251'");
mysql_query ("set collation_connection='cp1251_general_ci'");
  function puterror($message)
  {
    echo("<p>$message</p>");
    exit();
  }
?>
