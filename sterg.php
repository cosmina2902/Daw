<?php

mysql_connect("localhost","root","") or die ("Nu se
poate conecta la serverul MySQL");
mysql_select_db("persoane") or die("Nu se poate selecta baza
de date");

$nume=$_POST['nume'];

// căutare după câmpul nume a înregistrărilor care vor fi şterse
$query=mysql_query("select * from tabel2 where nume='$nume'");

//calculeaza nr. de inregistrari returnate prin interogare
$nr_inreg=@mysql_num_rows($query);

if ($nr_inreg>0){
 echo "<center>";
 echo "S-au gasit " . $nr_inreg . " inregistrari";
 echo"</center>";

 // creare tabelă de afişare rezultate 
 echo "<table border='2' align='center'>";
 //numarare campuri
 $coln=mysql_num_fields($query);
 echo"<tr bgcolor='silver'>";
 // realizare automată a capului de tabel (conţinând toate câmpurile)
 for ($i=0; $i<$coln; $i++){
 //numele câmpurilor ca şi cap de tabel
 $var=mysql_field_name($query,$i);
 echo "<th> $var </th>";
 }
 echo"</tr>";
 // extragere informaţii şi afişare
 while (list ($nr,$nume,$varsta,$localitate) =
 mysql_fetch_row($query)){
 print (" <tr>\n".
 " <td>$nr</td>\n".
 " <td>$nume</td>\n".
 " <td>$varsta</td>\n".
 " <td>$localitate</td>\n".
 " </tr>\n");
 }
 echo"</table>";

 // Apelarea scriptului de ştergere efectivă/anulare (cu transmitere mai departe
 // a parametrilor de intrare, în cazul de faţă ‘nume’ după care se face cautarea)

 echo '<form method="POST"
 action="http://localhost/daw/sterg2.php">';

 // ”pasare”, transmitere mai departe a parametrului nume ($nume)
 //sub numele ‘ nume1’

 echo '<input type="hidden" name="nume1"
 value='.$_POST['nume'].'>';
 echo '<input type="SUBMIT" value="Stergere efectiva
 ">';
 echo '<br>';
 echo '</form>';
 // link pt. revenire la pagina de start şi anulare ştergere
 echo '<a HREF="http://localhost/daw/stergere.html">
 Renunt si revin...</a>';
}
else
 die("Nu gasesc nici o inregistrare ...");
mysql_close();
?> 