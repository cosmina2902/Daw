<?php mysql_connect("localhost","root","") or die ("Nu
se poate conecta la serverul MySQL");
mysql_select_db("persoane") or die("Nu se poate selecta baza
de date");

$nr=$_POST['nr'];
$nume=$_POST['nume'];
$varsta=$_POST['varsta'];
$localitate=$_POST['localitate'];

// adăugare cu parametrii
$query=mysql_query("insert into tabel2
values($nr,'$nume',$varsta,'$localitate')");

echo "Inserare reusita!!!";

// selectarea şi afişarea doar a înregistrării adăugate
$query=mysql_query("select * from tabel2 where nr=$nr");

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
mysql_close();
?> 