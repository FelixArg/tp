<html>
<head>
<title>Доска объявлений</title>
</head>
<link rel="stylesheet" type="text/css" href="../sty.css">
<body>


<center><a href=addform.php>Добавить объявление</a></center>
<?php
/////////////////////////////////////////////
//(C) Автор скрипта Денис Шашкин aka Chapay
/////////////////////////////////////////////
require_once("admin/config.php");
  if(isset($_GET['start'])) $start = $_GET['start'];
  else $start = "";
  // Стартовая точка
  if (empty($start)) $start = 0;
  // Стартовая точка не может быть меньше нуля
  if ($start < 0) $start = 0;
  if($_GET['type'] != 7 AND $_GET['object'] != 12)
  {
  $query = "SELECT count(*) FROM board
           WHERE hide = 'show' AND type = ".$_GET['type']." AND object = ".$_GET['object'];
  $shults = mysql_query($query);
  $query = "SELECT * FROM board
            WHERE hide = 'show' AND type = ".$_GET['type']." AND object = ".$_GET['object']."
             ORDER BY puttime DESC LIMIT $start, $number";
  $brd = mysql_query($query);
  $count = mysql_result($shults,0);
  if ($start > 0)  echo "<a href=search.php?start=".($start-$number).">Предыдущие</a>";
  if ($count > $start + $number)  echo "<a href=search.php?start=".($start + $number).">Следующие</a>";
  while($board = mysql_fetch_array($brd))
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
            case 1: if($board['type'] = "1") $type = "Продам";
            break;
            case 2: if($board['type'] = "2") $type = "Куплю";
            break;
            case 3: if($board['type'] = "3") $type = "Сниму в аренду";
            break;
            case 4: if($board['type'] = "4") $type = "Сдаю в аренду";
            break;
            case 5: if($board['type'] = "5") $type = "Поменяю";
            break;
            case 6:
                        if($board['type'] = "6") $type = "";
    }
        switch($object)
    {
            case 1: if($board['object'] = "1") $object = "квартиру";
            break;
            case 2: if($board['object'] = "2") $object = "комнату";
            break;
            case 3: if($board['object'] = "3") $object = "дом";
            break;
            case 4: if($board['object'] = "4") $object = "дачу";
            break;
            case 5: if($board['object'] = "5") $object = "земельный участок";
            break;
            case 6: if($board['object'] = "6") $object = "офис";
            break;
            case 7: if($board['object'] = "7") $object = "магазин";
            break;
            case 8: if($board['object'] = "8") $object = "производство";
            break;
            case 9: if($board['object'] = "9") $object = "склад";
            break;
            case 10: if($board['object'] = "10") $object = "гараж";
            break;
            case 11: if($board['object'] = "11") $object = "";
  }


?>


<center>
<table width='80%' class='menu_up'>
    <tr class='menu_up'>
      <td width="25%"><?php echo $contact; ?></td>
      <td width="25%"><b>Описание:</b> <?php echo $type; ?> <?php echo $object; ?></td>
      <td width="25%"><b>Город:</b> <?php echo $city ?></td>
      <td width="25%" align='right'><b>Дата:</b> <? print $board['puttime']; ?></td>
    </tr>
    <tr class='menu_down'>
        <td colspan=4><? echo $msg; ?><br>
        </td>
    </tr>
</table><br>
</center>
<?php
}}
else
{
      print "<HTML><HEAD>\n";
      print "<META HTTP-EQUIV='Refresh' CONTENT='1; URL=index.php'>\n";
      print "</HEAD></HTML>\n";
}
?>
</body>
</html>