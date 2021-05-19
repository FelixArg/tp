<html>
<head>
<link rel="stylesheet" type="text/css" href="../sty.css">
</head>
<body>
<a href="../index.php">Íà ãëàâíóþ</a>
<?php
require_once ("config.php");
  if(isset($_GET['start'])) $start = $_GET['start'];
  else $start = "";
  // Ñòàðòîâàÿ òî÷êà
  if (empty($start)) $start = 0;
  // Ñòàðòîâàÿ òî÷êà íå ìîæåò áûòü ìåíüøå íóëÿ
  if ($start < 0) $start = 0;
  $query = "SELECT count(*) FROM board";
  $tot = mysql_query($query);
  $query = "SELECT * FROM board ORDER BY puttime DESC LIMIT $start, $number";
  $thm = mysql_query($query);
  $count= mysql_result($tot,0);
  if ($start > 0)  echo "<a href=index.php?start=".($start-$number).">Ïðåäûäóùèå</A>";
  if ($count > $start + $number)  echo " <a href=index.php?start=".($start + $number).">Ñëåäóþùèå</A>";
  while($board = mysql_fetch_array($thm))
  {
    // Èçâëåêàåì ïåðåìåííûå èç áàçû äàííûõ
    $contact = trim($board['contact']);
    $type = trim($board['type']);
    $city = trim($board['city']);
    $object = trim($board['object']);
    $city = trim($board['city']);
    $msg = trim($board['msg']);


  switch($type)
    {
            case 1: if($board['type'] = "1") $type = "Êóïëþ";
            break;
            case 2: if($board['type'] = "2") $type = "Ïðîäàì";
            break;
            case 3: if($board['type'] = "3") $type = "Ñíèìó â àðåíäó";
            break;
            case 4: if($board['type'] = "4") $type = "Ñäàþ â àðåíäó";
            break;
            case 5: if($board['type'] = "5") $type = "Ïîìåíÿþ";
            break;
            case 6: if($board['type'] = "6") $type = "";
    }
        switch($object)
    {
            case 1: if($board['object'] = "1") $object = "êâàðòèðó";
            break;
            case 2: if($board['object'] = "2") $object = "Êîìíàòó";
            break;
            case 3: if($board['object'] = "3") $object = "Äîì";
            break;
            case 4: if($board['object'] = "4") $object = "Äà÷ó";
            break;
            case 5: if($board['object'] = "5") $object = "Çåìåëüíûé ó÷àñòîê";
            break;
            case 6: if($board['object'] = "6") $object = "Îôèñ";
            break;
            case 7: if($board['object'] = "7") $object = "Ìàãàçèí";
            break;
            case 8: if($board['object'] = "8") $object = "Ïðîèçâîäñòâî";
            break;
            case 9: if($board['object'] = "9") $object = "Ñêëàä";
            break;
            case 10: if($board['object'] = "10") $object = "Ãàðàæ";
            break;
            case 11: if($board['object'] = "11") $object = "";
    }

?>
<center>
<table width='80%' class='menu_up'>
    <tr class='menu_up'>
      <td width="25%"><?php echo $contact; ?></td>
      <td width="25%"><b>Îïèñàíèå:</b> <?php echo $type; ?> <?php echo $object; ?></td>
      <td width="25%"><b>Ãîðîä:</b> <?php echo $city; ?></td>
      <td width="25%" align='right'><b>Äàòà:</b> <? echo $board['puttime']; ?></td>
    </tr>
    <tr class='menu_down'>
        <td colspan=4><? echo $msg; ?><br>
        </td>
    </tr>
<tr><td bgcolor="#ffffff" colspan=4><center><font color="#ffffff">
<?php
if($board['hide'] == 'show')
{
$showhide = "<a href=hide.php?id_msg=".$board['id_msg']."&start=$start>Ñêðûòü</a>";
}
else
{
$showhide = "<a href=show.php?id_msg=".$board['id_msg']."&start=$start>Îòîáðàçèòü</a>";
}
echo "<a href=del.php?id_msg=".$board['id_msg']."&start=$start>Óäàëèòü</a>&nbsp;&nbsp;";
echo "<a href=editform.php?id_msg=".$board['id_msg']."&start=$start>Ðåäàêòèðîâàòü</a>&nbsp;&nbsp;";
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
