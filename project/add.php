<?php
/////////////////////////////////////////////
//(C) ����� ������� ����� ������ aka Chapay
/////////////////////////////////////////////
require_once("admin/config.php");

$contact = $_POST['contact'];
$type = $_POST['type'];
$object = $_POST['object'];
$city = $_POST['city'];
$msg = $_POST['msg'];


if(empty($contact))
{
        echo "�� �� ����� �� ������ ��������!\n <br><a href=addform.php>�����</a>";
        exit();
}
if(empty($msg))
{
        echo "�� �� ����� ����������!\n <br><a href=addform.php>�����</a>";
        exit();
}

 $query = "INSERT INTO board VALUES (0,
                                     '$contact',
                                     '$type',
                                     '$object',
                                     '$city',
                                     '$msg',
                                      NOW(),
                                     'show');";
if(mysql_query($query))
{
        echo "���� ���������� ������� ���������";
print "<HTML><HEAD>\n";
      print "<META HTTP-EQUIV='Refresh' CONTENT='1; URL=index.php'>\n";
      print "</HEAD></HTML>\n";
}
else echo "���� ���������� �� ���������";


?>