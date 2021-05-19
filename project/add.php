<?php
require_once("admin/config.php");

$contact = $_POST['contact'];
$type = $_POST['type'];
$object = $_POST['object'];
$city = $_POST['city'];
$msg = $_POST['msg'];


if(empty($contact))
{
        echo "Âû íå ââåëè íè îäíîãî êîíòàêòà!\n <br><a href=addform.php>Íàçàä</a>";
        exit();
}
if(empty($msg))
{
        echo "Âû íå ââåëè îáúÿâëåíèå!\n <br><a href=addform.php>Íàçàä</a>";
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
        echo "Âàøå îáúÿâëåíèå óñïåøíî äîáàâëåíî";
print "<HTML><HEAD>\n";
      print "<META HTTP-EQUIV='Refresh' CONTENT='1; URL=index.php'>\n";
      print "</HEAD></HTML>\n";
}
else echo "Âàøå îáúÿâëåíèå íå äîáàâëåíî";


?>
