<?php mysql_connect("localhost","root","") or die ("Nu
se poate conecta la serverul MySQL");
mysql_select_db("evidenta") or die("Nu se poate selecta baza
de date");

$nume=$_POST['nume'];
$prenume=$_POST['prenume'];
$grupa=$_POST['grupa'];
$nota1=$_POST['nota1'];
$nota2=$_POST['nota2'];

// adăugare cu parametrii
$query=mysql_query("insert into studenti (nume,prenume,grupa,nota1,nota2) values('$nume','$prenume',$grupa,$nota1,$nota2)");

echo "Inserare reusita!!!";

// selectarea şi afişarea doar a înregistrării adăugate

$query=mysql_query("update studenti set media=(nota1+nota2)/2 where nume='$nume'");
$query=mysql_query("select * from studenti");

//calculeaza nr. de inregistrari returnate prin interogare
$nr_inreg=@mysql_num_rows($query);

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
else{
echo"<center>";
echo "Nu s-a gasit nici o inregistrare!!!";
echo"</center>";
}
echo '<a HREF="http://localhost/daw/tema1LAB3.html">
Renunt si revin...</a>';
mysql_close();
?> 