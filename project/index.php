<html>
<head>
<title>����� ����������</title>
</head>
<link rel="stylesheet" type="text/css" href="sty.css">
<body>
<form action=search.php?type=$_GET['type']&object=$_GET['object'] method=get>
<table class='top' align=center>
<tr>
<td align=right><b>��������:</b>
</td>
<td>
<select name=type class='filter'><option value=7 selected>�����</option>
<option value=1>������</option>
<option value=2>�����</option>
<option value=3>����� � ������</option>
<option value=4>���� � ������</option>
<option value=5>���������</option>
<option value=6>������</option></select>
</td>
</tr>
<tr>
<td align=right><b>������:</b>
</td>
<td>
<select name=object class='filter'><option value=12 selected>�����</option>
<option value=1>��������</option>
<option value=2>�������</option>
<option value=3>�������, ���</option>
<option value=4>����</option>
<option value=5>��������� �������</option>
<option value=6>����</option>
<option value=7>������� (�������� �������)</option>
<option value=8>������������</option>
<option value=9>�����</option>
<option value=10>�����</option>
<option value=11>������</option></select>
</td>
</tr>
<tr>
<td colspan=2 align=center>
<input type=submit value='�����' class='input'>
</td>
</tr>
</table>
</form>
<center><a href=addform.php>�������� ����������</a> <a href="admin/admin.php">�� �������� �����������������</a></center>
<?php
/////////////////////////////////////////////
//(C) ����� ������� ����� ������ aka Chapay
/////////////////////////////////////////////
require_once("admin/config.php");
  if(isset($_GET['start'])) $start = $_GET['start'];
  else $start = "";
  // ��������� �����
  if (empty($start)) $start = 0;
  // ��������� ����� �� ����� ���� ������ ����
  if ($start < 0) $start = 0;
  $query = "SELECT count(*) FROM board
               WHERE hide = 'show'";
  $shults = mysql_query($query);
  $query = "SELECT * FROM board
            WHERE hide = 'show'
             ORDER BY puttime DESC LIMIT $start, $number";
  $brd = mysql_query($query);
  $count = mysql_result($shults,0);
  if ($start > 0)  echo "<a href=index.php?start=".($start-$number).">����������</a>";
  if ($count > $start + $number)  echo "<a href=index.php?start=".($start + $number).">���������</a>";
  while($board = mysql_fetch_array($brd))
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
            case 1: if($board['type'] = "1") $type = "������";
            break;
            case 2: if($board['type'] = "2") $type = "�����";
            break;
            case 3: if($board['type'] = "3") $type = "����� � ������";
            break;
            case 4: if($board['type'] = "4") $type = "���� � ������";
            break;
            case 5: if($board['type'] = "5") $type = "�������";
            break;
            case 6:
                        if($board['type'] = "6") $type = "";
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
      <td width="25%"><b>�����:</b> <?php echo $city ?></td>
      <td width="25%" align='right'><b>����:</b> <? echo $board['puttime']; ?></td>
    </tr>
    <tr class='menu_down'>
        <td colspan=4><? echo $msg; ?><br>
        </td>
    </tr>
</table><br>
</center>
<?php
}
?>
</body>
</html>