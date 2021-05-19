<html>
<head>
<title>:: Доска объявлений :: Добавить новое объявление</title>
</head>
<link rel="stylesheet" type="text/css" href="sty.css">
<body>
<form action="add.php" method=post>
<table class='menu_up' align=center>
<tr class='menu_up'>
<td colspan=2><b>Новое объявление</b>
</td>
</tr>
<tr class='menu_down'>
<td width=200 height=21>Контактное лицо:
</td>
<td height=21>
<input type=text name=contact value="">
</td>
</tr>
<tr class='menu_down'>
<td width=200 height=21 align=right>Тип операции:
</td>
<td height=21>
<select name="type" class='addform'>
<option value="1" selected>Продам</option>
<option value="2">Куплю</option>
<option value="3">Снимаю в аренду</option>
<option value="4">Сдаю в аренду</option>
<option value="5">Поменяю</option>
<option value="6">Другое</option></select></td></tr>
<tr class='menu_down'><td width=200 height=21 align=right>
Объект операции:</td>
<td height=21>
<select name="object" class='addform'>
<option value="1" selected>Квартиру</option>
<option value="2">Комнату</option>
<option value="3">Дом (коттедж)</option>
<option value="4">Дачу</option>
<option value="5">Земельный участок</option>
<option value="6">Офис</option>
<option value="7">Магазин</option>
<option value="8">Производство</option>
<option value="9">Склад</option>
<option value="10">Гараж</option>
<option value="11">Прочее</option></select></td></tr>
<tr class='menu_down'>
<td width=200 height=21>
<p align=right>Город:</td>
<td height=21>
<input type=text name=city value="">
</td></tr>
<tr class='menu_down'>
<td width=200 height=21 valign=top align=right>
Объявление:
</td>
<td  height=21><textarea name=msg value="" rows=10 cols=37></textarea></td></tr>
<tr class='menu_down'>
<td height=21 colspan=2 align=center>
<input type=submit value=Отправить name=B1> <input type=reset value=Очистить name=B2></td></tr></table></form>
  </td>
  </tr>
 </table>

</body>

</html>