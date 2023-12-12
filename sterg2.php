<?php
mysql_connect("localhost","root","") or die ("Nu se
poate conecta la serverul MySQL");
mysql_select_db("persoane") or die("Nu se poate selecta baza
de date");
$nume1=$_POST['nume1'];
// ştergere efectivă
$query =mysql_query("DELETE FROM tabel2 where nume='$nume1'");
echo "OK, am sters.";
mysql_close ();
?> 
