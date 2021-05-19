<?php

 include "config.php";
  $query = "UPDATE board SET hide = 'hide'
            WHERE id_msg = ".$_GET["id_msg"];

  if(mysql_query($query))
  {

      echo "<HTML><HEAD>\n";
      echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=admin.php?start=".$_GET["start"]."'>\n";
      echo "</HEAD></HTML>\n";
  }
  else echo "ќшибка при обращении к доске объ€влений";

?>