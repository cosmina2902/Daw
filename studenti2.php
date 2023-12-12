<?php
mysql_connect("localhost","root","") or die ("Nu se
poate conecta la serverul MySQL");
mysql_select_db("evidenta") or die("Nu se poate selecta baza
de date");
$media=$_POST['media'];
// ştergere efectivă
$query =mysql_query("DELETE FROM studenti where media < $media");
echo "OK, am sters.";
mysql_close ();
?> 
