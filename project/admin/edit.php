<html>
<head>
<title>:: Доска объявлений :: Добавить новое объявление</title>
</head>
<link rel="stylesheet" type="text/css" href="../sty.css">
<body>

<?php

  require_once "config.php";
  $query = "UPDATE board SET msg = '".$_POST['msg']."' WHERE id_msg = ".$_POST['id_msg'];
  if(mysql_query($query))
  {
      echo "<HTML><HEAD>\n";
      echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=admin.php?start=".$_POST['start']."'>\n";
      echo "</HEAD></HTML>\n";
  }
  else echo("Ошибка при обращении к доске объявлений");

?>

</body>

</html>