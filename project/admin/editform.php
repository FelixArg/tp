<html>
<head>
<title>:: ����� ���������� :: �������������� ����������</title>
</head>
<link rel="stylesheet" type="text/css" href="../sty.css">
<body>
<?php
/////////////////////////////////////////////
//(C) ����� ������� ����� ������ aka Chapay
/////////////////////////////////////////////
  require_once "config.php";
  $id_msg = $_GET['id_msg'];
  $start = $_GET['start'];
  $query = "SELECT * FROM board
            WHERE id_msg = $id_msg";
   $brd = mysql_query($query);
  if ($brd)
  {
    // ����������� ���������� ���������� � ������������� ������
    $board = mysql_fetch_array($brd);
  }
  else echo "������ ��� ��������� � ����� ����������";
  $msg = $board['msg'];
  ?>
<center><p><a href="admin.php">��������� � ����������������� ����� ����������</a></p></center>
<form action="edit.php" method=post>
<table class='menu_up' align=center>
<tr class='menu_up'>
<td colspan=2><b>�������������� ����������</b>
</td>
</tr>
<tr class='menu_down'>
<td width=200 height=21 valign=top align=right>
����������:
</td>
<td  height=21><textarea name=msg value="" rows=10 cols=37><?php echo $msg; ?></textarea></td></tr>
<tr class='menu_down'>
<td height=21 colspan=2 align=center>
<input type=submit value=��������� name=B1>
<input type=hidden name=id_msg value=<?php echo $id_msg; ?>>
<input type=hidden name=start value=<?php echo $start; ?>></td></tr></table></form>
  </td>
  </tr>
 </table>

</body>

</html>