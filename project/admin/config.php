<?php
/////////////////////////////////////////////
//(C) ����� ������� ����� ������ aka Chapay
/////////////////////////////////////////////

  $dblocation = "localhost";// ����� ��������� ������������ ����, ������ localhost, � ������ ������������� ������� ���������� � ������ ��������� ��������
  $dbname = "test";// ��� ���� ������
  $dbuser = "root";// ��� ������������ ���� ������
  $dbpasswd = "";// ������ � ���� ������
  $number = 10; // ���-�� ��������� ���������

  // ����������� � �������� ���� ������
  $dbcnx = @mysql_connect($dblocation,$dbuser,$dbpasswd);
  if (!$dbcnx)
  {
    echo( "<P>� ��������� ������ ������ ���� ������ �� ��������, ������� ���������� ����������� �������� ����������.</P>" );
    exit();
  }
  // �������� ���� ������
  if (! @mysql_select_db($dbname,$dbcnx) )
  {
    echo( "<P>� ��������� ������ ���� ������ �� ��������, ������� ���������� ����������� �������� ����������.</P>" );
    exit();
  }
mysql_query ("set character_set_client='cp1251'");
mysql_query ("set character_set_results='cp1251'");
mysql_query ("set collation_connection='cp1251_general_ci'");
  function puterror($message)
  {
    echo("<p>$message</p>");
    exit();
  }
?>