<?php
require_once ("config.php");
$query = "DELETE FROM board WHERE id_msg=".$_GET["id_msg"];
if(mysql_query($query))
{
print "<HTML><HEAD>\n";
      print "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=admin.php?start=".$_GET['start']."'>\n";
      print "</HEAD></HTML>\n";
}
  else echo "Îøèáêà ïðè îáðàùåíèè ê äîñêå îáúÿâëåíèé";
?>
