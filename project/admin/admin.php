<html>
<head>
<link rel="stylesheet" type="text/css" href="../sty.css">
</head>
<body>
<a href="../index.php">�� �������</a>
<?php
/////////////////////////////////////////////
//(C) ����� ������� ����� ������ aka Chapay
/////////////////////////////////////////////
require_once ("config.php");
  if(isset($_GET['start'])) $start = $_GET['start'];
  else $start = "";
  // ��������� �����
  if (empty($start)) $start = 0;
  // ��������� ����� �� ����� ���� ������ ����
  if ($start < 0) $start = 0;
  $query = "SELECT count(*) FROM board";
  $tot = mysql_query($query);
  $query = "SELECT * FROM board ORDER BY puttime DESC LIMIT $start, $number";
  $thm = mysql_query($query);
  $count= mysql_result($tot,0);
  if ($start > 0)  echo "<a href=index.php?start=".($start-$number).">����������</A>";
  if ($count > $start + $number)  echo " <a href=index.php?start=".($start + $number).">���������</A>";
  while($board = mysql_fetch_array($thm))
  {
    // ��������� ���������� �� ���� ������
    $contact = trim($board['contact']);
    $type = trim($board['type']);
    $city = trim($board['city']);
    $object = trim($board['object']);
    $city = trim($board['city']);
    $msg = trim($board['msg']);


  switch($type)
    {
            case 1: if($board['type'] = "1") $type = "�����";
            break;
            case 2: if($board['type'] = "2") $type = "������";
            break;
            case 3: if($board['type'] = "3") $type = "����� � ������";
            break;
            case 4: if($board['type'] = "4") $type = "���� � ������";
            break;
            case 5: if($board['type'] = "5") $type = "�������";
            break;
            case 6: if($board['type'] = "6") $type = "";
    }
        switch($object)
    {
            case 1: if($board['object'] = "1") $object = "��������";
            break;
            case 2: if($board['object'] = "2") $object = "�������";
            break;
            case 3: if($board['object'] = "3") $object = "���";
            break;
            case 4: if($board['object'] = "4") $object = "����";
            break;
            case 5: if($board['object'] = "5") $object = "��������� �������";
            break;
            case 6: if($board['object'] = "6") $object = "����";
            break;
            case 7: if($board['object'] = "7") $object = "�������";
            break;
            case 8: if($board['object'] = "8") $object = "������������";
            break;
            case 9: if($board['object'] = "9") $object = "�����";
            break;
            case 10: if($board['object'] = "10") $object = "�����";
            break;
            case 11: if($board['object'] = "11") $object = "";
    }

?>
<center>
<table width='80%' class='menu_up'>
    <tr class='menu_up'>
      <td width="25%"><?php echo $contact; ?></td>
      <td width="25%"><b>��������:</b> <?php echo $type; ?> <?php echo $object; ?></td>
      <td width="25%"><b>�����:</b> <?php echo $city; ?></td>
      <td width="25%" align='right'><b>����:</b> <? echo $board['puttime']; ?></td>
    </tr>
    <tr class='menu_down'>
        <td colspan=4><? echo $msg; ?><br>
        </td>
    </tr>
<tr><td bgcolor="#ffffff" colspan=4><center><font color="#ffffff">
<?php
if($board['hide'] == 'show')
{
$showhide = "<a href=hide.php?id_msg=".$board['id_msg']."&start=$start>������</a>";
}
else
{
$showhide = "<a href=show.php?id_msg=".$board['id_msg']."&start=$start>����������</a>";
}
echo "<a href=del.php?id_msg=".$board['id_msg']."&start=$start>�������</a>&nbsp;&nbsp;";
echo "<a href=editform.php?id_msg=".$board['id_msg']."&start=$start>�������������</a>&nbsp;&nbsp;";
echo $showhide;

?>
</ceneter>
</font>
</td></tr>
</table><br>
</center>
<?php
}
?>
</body>
</html>