<?php

 include "config.php";
  $query = "UPDATE board SET hide = 'show'
            WHERE id_msg = ".$_GET["id_msg"];

  if(mysql_query($query))
  {

      echo "<HTML><HEAD>\n";
      echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=admin.php?start=".$_GET["start"]."'>\n";
      echo "</HEAD></HTML>\n";
  }
  else echo "������ ��� ��������� � ����� ����������";

?>