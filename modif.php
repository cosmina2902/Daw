<?php
mysql_connect("localhost","root","") or die ("Nu se
poate conecta la serverul MySQL");
mysql_select_db("persoane") or die("Nu se poate selecta baza
de date");
$nume=$_POST['nume'];
$varsta=$_POST['varsta'];

// căutarea înregistrării care va fi modificată
$query=mysql_query("select * from tabel2 where nume='$nume'
and varsta=$varsta");

$nr_inreg=@mysql_num_rows($query);

if ($nr_inreg>0){
 echo "<center>";
 echo "S-au gasit " . $nr_inreg . " inregistrari"; 
 echo"</center>";

 echo "<table border='2' align='center'>";
 echo"<tr bgcolor='silver'>";
 $coln=mysql_num_fields($query);

 for ($i=0; $i<$coln; $i++){
 $var=mysql_field_name($query,$i);
 echo "<th> $var </th>";
 }
 echo"</tr>";

 $nr_val=0; // contor indice array
 while ($row = mysql_fetch_row($query)){
 echo"<tr>";
 foreach ($row as $value) {
 echo "<td BGCOLOR='Yellow'> $value</td>";
 //memorare într-un şir (array) a datelor din articolul găsit
 $nr_val++;
 $sir[$nr_val]=$value;
 }
 echo "</tr>";
 }
 echo "</table>";

// Rezolvarea este valabilă pentru o singură înregistrare găsită
// Pentru mai multe înregistrări găsite, modificările efectuate se aplică asupra tuturor
 echo '<br><hr>'; // trasarea unei linii

// apel script pentru modificarea efectivă
echo '<form method="POST"
action="http://localhost/daw/modif2.php">';

// transfer (ascuns) spre script a parametrilor de căutare
echo '<input type="hidden" name="nume2" value='.$sir[2].'>';
echo '<input type="hidden" name="varsta2" value='.$sir[3].'>';

// transfer spre script ca parametrii a datelor care pot fi modificate
echo '<input type="text" name="nr1"
value='.$sir[1].'>';
echo '<input type="text" name="nume1" value='.$sir[2].'>';
echo '<input type="text" name="varsta1" value='.$sir[3].'>';
echo '<input type="text" name="localitate1"
value='.$sir[4].'>';

echo '<input type="SUBMIT" value="Modifica!" >';
echo '<br>';
echo '</form>';

// link de revenire şi renunţare la modificare
echo '<a HREF="http://localhost/daw/modificare.html"> Renunţ şi
revin...</a>';
}
else
 die ("Nu gasesc nici o inregistrare ...");
 mysql_close();
 ?> 