<?php
mysql_connect("localhost","root","") or die ("Nu se
poate conecta la serverul MySQL");
mysql_select_db("evidenta") or die("Nu se poate selecta baza
de date");
$titlu=$_POST['titlu'];
// ştergere efectivă
$query =mysql_query("DELETE FROM carti where titlu='$titlu'");
echo "OK, am sters.";
mysql_close ();
?> 
