<html>
    <body>
    <?php
mysql_connect("localhost","root","") or die ("Nu se
poate conecta la serverul MySQL");
mysql_select_db("magazin") or die("Nu se poate selecta baza
de date");
echo"<br><br>";

//Preluarea cu metoda POST a parametrilor transmişi de către fişierul HTML
// spre scriptul PHP

$nume=$_POST['nume'];



// Interogare cu parametri
$query=mysql_query("select id,nume_produs,pret,cantitate,pret*cantitate as TOTAL from produse where nume_produs='$nume'");
 //Calculeaza nr. de înregistrări returnate prin interogare
$nr_inreg=@mysql_num_rows($query);

if ($nr_inreg>0){
 echo "<center>";
 echo "S-au gasit " . $nr_inreg . " inregistrari";
 echo"</center>";
 //creează capul de tabel
 echo "<table border='2' align='center'>";
 echo"<tr bgcolor='silver'>";
 echo"<th>ID</th>";
 echo"<th>Nume</th>";
 echo"<th>pret</th>";
 echo"<th>cantitate</th>";
 echo"<th>Total</th>";
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
</html>