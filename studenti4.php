<?php
mysql_connect("localhost","root","") or die ("Nu se
poate conecta la serverul MySQL");
mysql_select_db("evidenta") or die("Nu se poate selecta baza
de date");
// ştergere efectivă
$query = mysql_query("SELECT nume, prenume, grupa, media FROM studenti WHERE media < 5 ORDER BY grupa, nume");

$nr_inreg=@mysql_num_rows($query);
echo "S-au gasit " . $nr_inreg . " inregistrari";
if ($nr_inreg>0){
 echo "<center>";
 echo "S-au gasit " . $nr_inreg . " inregistrari";
 echo"</center>";
 echo "<table border='2' align='center'>";
 $coln=mysql_num_fields($query); //nr. de campuri
 echo"<tr bgcolor='silver'>";

 // realizare automată a capului de tabel (conţinând toate câmpurile)
 for ($i=0; $i<$coln; $i++){
 //numele câmpurilor ca şi cap de tabel
 $var=mysql_field_name($query,$i);
 echo "<th> $var </th>";
 }
 echo"</tr>";

 // afiseaza inregistrarile gasite in urma interogarii
 while($row=mysql_fetch_row($query)){
 echo"<tr>";
 foreach ($row as $value){
    echo "<td>$value</td>"; 
}
echo"</tr>";
}
echo"</table>";
}
else echo"Nu s-a gasit nicio inregistrare!";
mysql_close ();
?> 
