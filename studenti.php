<?php mysql_connect("localhost","root","") or die ("Nu
se poate conecta la serverul MySQL");
mysql_select_db("evidenta") or die("Nu se poate selecta baza
de date");

$media=$_POST['media'];
if(isset($_POST['Cauta'])){
// adăugare cu parametrii
$query=mysql_query("select * from studenti where media > $media");
// $query=mysql_query("insert into tabel2
// values($nr,'$nume',$varsta,'$localitate')");

echo "Cautare Reusita reusita!!!";

// selectarea şi afişarea doar a înregistrării adăugate
//$query=mysql_query("select * from tabel2 where nr=$nr");

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
echo '<form method="POST"
 action="http://localhost/daw/studenti2.php">';

 // ”pasare”, transmitere mai departe a parametrului nume ($nume)
 //sub numele ‘ nume1’

 echo '<input type="hidden" name="media"
 value='.$_POST['media'].'>';
 echo '<input type="SUBMIT" name="Stergere" value="Stergere medie mai mica decat ' . $_POST['media'] . '">';

 echo '<br>';
 echo '</form>';
 // link pt. revenire la pagina de start şi anulare ştergere
 echo '<a HREF="http://localhost/daw/tema1LAB3.html">
 Renunt si revin...</a>';
 echo"<center><h3>Nu au promovat laboratorul</h3></center>";
 $query = mysql_query("SELECT nume, prenume, grupa, media FROM studenti WHERE media < 5 ORDER BY grupa, nume");
 if ($nr_inreg>0){
    echo "<center>";
    echo "S-au gasit " . $nr_inreg . " nepromovati";
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
}
}elseif(isset($_POST['Inserare'])){
    header('Location: http://localhost/daw/inserare.html'); // Redirecționează către pagina HTML dorită
    exit;

}


mysql_close();


?> 