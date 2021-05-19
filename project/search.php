<html>
<head>
<title>Äîñêà îáúÿâëåíèé</title>
</head>
<link rel="stylesheet" type="text/css" href="../sty.css">
<body>


<center><a href=addform.php>Äîáàâèòü îáúÿâëåíèå</a></center>
<?php
require_once("admin/config.php");
  if(isset($_GET['start'])) $start = $_GET['start'];
  else $start = "";
  // Ñòàðòîâàÿ òî÷êà
  if (empty($start)) $start = 0;
  // Ñòàðòîâàÿ òî÷êà íå ìîæåò áûòü ìåíüøå íóëÿ
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
  if ($start > 0)  echo "<a href=search.php?start=".($start-$number).">Ïðåäûäóùèå</a>";
  if ($count > $start + $number)  echo "<a href=search.php?start=".($start + $number).">Ñëåäóþùèå</a>";
  while($board = mysql_fetch_array($brd))
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
            case 1: if($board['type'] = "1") $type = "Ïðîäàì";
            break;
            case 2: if($board['type'] = "2") $type = "Êóïëþ";
            break;
            case 3: if($board['type'] = "3") $type = "Ñíèìó â àðåíäó";
            break;
            case 4: if($board['type'] = "4") $type = "Ñäàþ â àðåíäó";
            break;
            case 5: if($board['type'] = "5") $type = "Ïîìåíÿþ";
            break;
            case 6:
                        if($board['type'] = "6") $type = "";
    }
        switch($object)
    {
            case 1: if($board['object'] = "1") $object = "êâàðòèðó";
            break;
            case 2: if($board['object'] = "2") $object = "êîìíàòó";
            break;
            case 3: if($board['object'] = "3") $object = "äîì";
            break;
            case 4: if($board['object'] = "4") $object = "äà÷ó";
            break;
            case 5: if($board['object'] = "5") $object = "çåìåëüíûé ó÷àñòîê";
            break;
            case 6: if($board['object'] = "6") $object = "îôèñ";
            break;
            case 7: if($board['object'] = "7") $object = "ìàãàçèí";
            break;
            case 8: if($board['object'] = "8") $object = "ïðîèçâîäñòâî";
            break;
            case 9: if($board['object'] = "9") $object = "ñêëàä";
            break;
            case 10: if($board['object'] = "10") $object = "ãàðàæ";
            break;
            case 11: if($board['object'] = "11") $object = "";
  }


?>


<center>
<table width='80%' class='menu_up'>
    <tr class='menu_up'>
      <td width="25%"><?php echo $contact; ?></td>
      <td width="25%"><b>Îïèñàíèå:</b> <?php echo $type; ?> <?php echo $object; ?></td>
      <td width="25%"><b>Ãîðîä:</b> <?php echo $city ?></td>
      <td width="25%" align='right'><b>Äàòà:</b> <? print $board['puttime']; ?></td>
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
