<html>
<head>
<link rel="stylesheet" type="text/css" href="../sty.css">
</head>
<body>
<a href="../index.php">На главную</a>
<?php
/////////////////////////////////////////////
//(C) Автор скрипта Денис Шашкин aka Chapay
/////////////////////////////////////////////
require_once ("config.php");
  if(isset($_GET['start'])) $start = $_GET['start'];
  else $start = "";
  // Стартовая точка
  if (empty($start)) $start = 0;
  // Стартовая точка не может быть меньше нуля
  if ($start < 0) $start = 0;
  $query = "SELECT count(*) FROM board";
  $tot = mysql_query($query);
  $query = "SELECT * FROM board ORDER BY puttime DESC LIMIT $start, $number";
  $thm = mysql_query($query);
  $count= mysql_result($tot,0);
  if ($start > 0)  echo "<a href=index.php?start=".($start-$number).">Предыдущие</A>";
  if ($count > $start + $number)  echo " <a href=index.php?start=".($start + $number).">Следующие</A>";
  while($board = mysql_fetch_array($thm))
  {
    // Извлекаем переменные из базы данных
    $contact = trim($board['contact']);
    $type = trim($board['type']);
    $city = trim($board['city']);
    $object = trim($board['object']);
    $city = trim($board['city']);
    $msg = trim($board['msg']);


  switch($type)
    {
            case 1: if($board['type'] = "1") $type = "Куплю";
            break;
            case 2: if($board['type'] = "2") $type = "Продам";
            break;
            case 3: if($board['type'] = "3") $type = "Сниму в аренду";
            break;
            case 4: if($board['type'] = "4") $type = "Сдаю в аренду";
            break;
            case 5: if($board['type'] = "5") $type = "Поменяю";
            break;
            case 6: if($board['type'] = "6") $type = "";
    }
        switch($object)
    {
            case 1: if($board['object'] = "1") $object = "квартиру";
            break;
            case 2: if($board['object'] = "2") $object = "Комнату";
            break;
            case 3: if($board['object'] = "3") $object = "Дом";
            break;
            case 4: if($board['object'] = "4") $object = "Дачу";
            break;
            case 5: if($board['object'] = "5") $object = "Земельный участок";
            break;
            case 6: if($board['object'] = "6") $object = "Офис";
            break;
            case 7: if($board['object'] = "7") $object = "Магазин";
            break;
            case 8: if($board['object'] = "8") $object = "Производство";
            break;
            case 9: if($board['object'] = "9") $object = "Склад";
            break;
            case 10: if($board['object'] = "10") $object = "Гараж";
            break;
            case 11: if($board['object'] = "11") $object = "";
    }

?>
<center>
<table width='80%' class='menu_up'>
    <tr class='menu_up'>
      <td width="25%"><?php echo $contact; ?></td>
      <td width="25%"><b>Описание:</b> <?php echo $type; ?> <?php echo $object; ?></td>
      <td width="25%"><b>Город:</b> <?php echo $city; ?></td>
      <td width="25%" align='right'><b>Дата:</b> <? echo $board['puttime']; ?></td>
    </tr>
    <tr class='menu_down'>
        <td colspan=4><? echo $msg; ?><br>
        </td>
    </tr>
<tr><td bgcolor="#ffffff" colspan=4><center><font color="#ffffff">
<?php
if($board['hide'] == 'show')
{
$showhide = "<a href=hide.php?id_msg=".$board['id_msg']."&start=$start>Скрыть</a>";
}
else
{
$showhide = "<a href=show.php?id_msg=".$board['id_msg']."&start=$start>Отобразить</a>";
}
echo "<a href=del.php?id_msg=".$board['id_msg']."&start=$start>Удалить</a>&nbsp;&nbsp;";
echo "<a href=editform.php?id_msg=".$board['id_msg']."&start=$start>Редактировать</a>&nbsp;&nbsp;";
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