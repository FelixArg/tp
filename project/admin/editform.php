<html>
<head>
<title>:: Доска объявлений :: Редактирование объявления</title>
</head>
<link rel="stylesheet" type="text/css" href="../sty.css">
<body>
<?php
/////////////////////////////////////////////
//(C) Автор скрипта Денис Шашкин aka Chapay
/////////////////////////////////////////////
  require_once "config.php";
  $id_msg = $_GET['id_msg'];
  $start = $_GET['start'];
  $query = "SELECT * FROM board
            WHERE id_msg = $id_msg";
   $brd = mysql_query($query);
  if ($brd)
  {
    // Преобразуем полученную информацию в ассоциативный массив
    $board = mysql_fetch_array($brd);
  }
  else echo "Ошибка при обращении к доске объявлений";
  $msg = $board['msg'];
  ?>
<center><p><a href="admin.php">Вернуться к администрированию доски объявлений</a></p></center>
<form action="edit.php" method=post>
<table class='menu_up' align=center>
<tr class='menu_up'>
<td colspan=2><b>Редактирование объявления</b>
</td>
</tr>
<tr class='menu_down'>
<td width=200 height=21 valign=top align=right>
Объявление:
</td>
<td  height=21><textarea name=msg value="" rows=10 cols=37><?php echo $msg; ?></textarea></td></tr>
<tr class='menu_down'>
<td height=21 colspan=2 align=center>
<input type=submit value=Исправить name=B1>
<input type=hidden name=id_msg value=<?php echo $id_msg; ?>>
<input type=hidden name=start value=<?php echo $start; ?>></td></tr></table></form>
  </td>
  </tr>
 </table>

</body>

</html>