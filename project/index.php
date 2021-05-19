<html>
<head>
<title>Доска объявлений</title>
</head>
<link rel="stylesheet" type="text/css" href="sty.css">
<body>
<form action=search.php?type=$_GET['type']&object=$_GET['object'] method=get>
<table class='top' align=center>
<tr>
<td align=right><b>Операция:</b>
</td>
<td>
<select name=type class='filter'><option value=7 selected>Любой</option>
<option value=1>Продаю</option>
<option value=2>Куплю</option>
<option value=3>Сниму в аренду</option>
<option value=4>Сдаю в аренду</option>
<option value=5>Обмениваю</option>
<option value=6>Другое</option></select>
</td>
</tr>
<tr>
<td align=right><b>Объект:</b>
</td>
<td>
<select name=object class='filter'><option value=12 selected>Любой</option>
<option value=1>Квартиру</option>
<option value=2>Комнату</option>
<option value=3>Коттедж, дом</option>
<option value=4>Дачу</option>
<option value=5>Земельный участок</option>
<option value=6>Офис</option>
<option value=7>Магазин (торговую площадь)</option>
<option value=8>Производство</option>
<option value=9>Склад</option>
<option value=10>Гараж</option>
<option value=11>Прочее</option></select>
</td>
</tr>
<tr>
<td colspan=2 align=center>
<input type=submit value='Поиск' class='input'>
</td>
</tr>
</table>
</form>
<center><a href=addform.php>Добавить объявление</a> <a href="admin/admin.php">На страницу администрирования</a></center>
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
  $query = "SELECT count(*) FROM board
               WHERE hide = 'show'";
  $shults = mysql_query($query);
  $query = "SELECT * FROM board
            WHERE hide = 'show'
             ORDER BY puttime DESC LIMIT $start, $number";
  $brd = mysql_query($query);
  $count = mysql_result($shults,0);
  if ($start > 0)  echo "<a href=index.php?start=".($start-$number).">Предыдущие</a>";
  if ($count > $start + $number)  echo "<a href=index.php?start=".($start + $number).">Следующие</a>";
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
      <td width="25%" align='right'><b>Дата:</b> <? echo $board['puttime']; ?></td>
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