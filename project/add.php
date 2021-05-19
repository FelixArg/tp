<?php
/////////////////////////////////////////////
//(C) Автор скрипта Денис Шашкин aka Chapay
/////////////////////////////////////////////
require_once("admin/config.php");

$contact = $_POST['contact'];
$type = $_POST['type'];
$object = $_POST['object'];
$city = $_POST['city'];
$msg = $_POST['msg'];


if(empty($contact))
{
        echo "Вы не ввели ни одного контакта!\n <br><a href=addform.php>Назад</a>";
        exit();
}
if(empty($msg))
{
        echo "Вы не ввели объявление!\n <br><a href=addform.php>Назад</a>";
        exit();
}

 $query = "INSERT INTO board VALUES (0,
                                     '$contact',
                                     '$type',
                                     '$object',
                                     '$city',
                                     '$msg',
                                      NOW(),
                                     'show');";
if(mysql_query($query))
{
        echo "Ваше объявление успешно добавлено";
print "<HTML><HEAD>\n";
      print "<META HTTP-EQUIV='Refresh' CONTENT='1; URL=index.php'>\n";
      print "</HEAD></HTML>\n";
}
else echo "Ваше объявление не добавлено";


?>