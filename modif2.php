<?php
mysql_connect("localhost","root","") or die ("Nu se
poate conecta la serverul MySQL");
mysql_select_db("persoane") or die("Nu se poate selecta baza
de date");
$nr1=$_POST['nr1'];
$nume1=$_POST['nume1'];
$varsta1=$_POST['varsta1'];
$localitate1=$_POST['localitate1'];
$nume2=$_POST['nume2'];
$varsta2=$_POST['varsta2'];

// modificare efectivă
$query =mysql_query("update tabel2 set nr=$nr1,nume='$nume1',
varsta=$varsta1,localitate='$localitate1' where nume='$nume2'
and varsta=$varsta2");

// afişare mesaj de eroare pentru date incorect introduse (dacă se doreşte)
$var=mysql_error();
echo $var;
echo "OK, am modificat!";
mysql_close ();
?> 