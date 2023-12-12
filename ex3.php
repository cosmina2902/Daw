<html>
    <body>
    <form method="POST" action="http://localhost/daw/ex3.php">
    <?php
mysql_connect("localhost","root","") or die ("Nu se
poate conecta la serverul MySQL");
mysql_select_db("persoane") or die("Nu se poate selecta baza
de date");
echo"<br><br>";

//Preluarea cu metoda POST a parametrilor transmişi de către fişierul HTML
// spre scriptul PHP

$nume=$_POST['nume'];
$varsta=$_POST['varsta'];

// Interogare cu parametri
$query=mysql_query("select * from table1 where nume='$nume'
and varsta=$varsta");
 //Calculeaza nr. de înregistrări returnate prin interogare
$nr_inreg=@mysql_num_rows($query);

if ($nr_inreg>0){
 echo "<center>";
 echo "S-au gasit " . $nr_inreg . " inregistrari";
 echo"</center>";
 //creează capul de tabel
 echo "<table border='2' align='center'>";
 echo"<tr bgcolor='silver'>";
 echo"<th>Nume</th>";
 echo"<th>Varsta</th>";
 echo"<th>Localitate</th>";
 echo"</tr>";
 // afişează înregistrările găsite în urma interogarii
 while($row=mysql_fetch_row($query)){
 echo"<tr>";
 foreach ($row as $value){
 echo "<td>$value</td>";
 }
 echo"<?tr>";
 }
 echo"</table>"; 
}
else{
 echo"<center>";
 echo "Nu s-a gasit nici o inregistrare!!!";
 echo"</center>"; }
// închide conexiunea cu serverul MySQL
mysql_close();
?>
    </body>
    </form>
</html>