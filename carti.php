<?php
mysql_connect("localhost","root","") or die ("Nu se
poate conecta la serverul MySQL");
mysql_select_db("evidenta") or die("Nu se poate selecta baza
de date");

// căutarea înregistrării care va fi modificată
if(isset($_POST['Afisare'])){
$query=mysql_query("select * from carti");

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
 echo "<td BGCOLOR='Pink'> $value</td>";
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
 echo"<h3>Stergerea unei carti</h3>";
 echo '<form method="POST"
 action="http://localhost/daw/carti_stergere.php">';

 // ”pasare”, transmitere mai departe a parametrului nume ($nume)
 //sub numele ‘ nume1’

 echo 'Titlul&nbsp;&nbsp;<input type="text" name="titlu"
 value='.$_POST['titlu'].'>';
 echo '&nbsp;&nbsp;<input type="SUBMIT" value="Stergere dupa titlu">';
 echo '<br>';
 echo '</form>';
 // link pt. revenire la pagina de start şi anulare ştergere
 echo '<a HREF="http://localhost/daw/TEMA2LAB3.html">
 Renunt si revin...</a>';

 echo '<br><hr>'; // trasarea unei linii
 echo"<h3>Vanzarea unei carti</h3>";
 echo '<form method="POST"
 action="http://localhost/daw/carti_vanzare.php">';
 echo 'Titlul&nbsp;&nbsp;<input type="text" name="titlu"
 value='.$_POST['titlu'].'>';
 echo"<br>";
 echo"<br>";
 echo 'Numar exemplare dorite &nbsp;&nbsp;<input type="text" name="nr_exemplare_dorite" >';
 echo '<br>';
 echo '&nbsp;&nbsp;<input type="SUBMIT"  value="Vinde">';
 echo"<br>";
 echo '</form>';

 echo '<br><hr>'; // trasarea unei linii
 echo"<h3>Afisare CArti Vandute</h3>";

 
 $query=mysql_query("select * from carti where nr_exemplare_vandute > 0");

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
  echo "<td BGCOLOR='Pink'> $value</td>";
  //memorare într-un şir (array) a datelor din articolul găsit
  $nr_val++;
  $sir[$nr_val]=$value;
  }
  echo "</tr>";
  }
  echo "</table>";
  $query = mysql_query("SELECT SUM(nr_exemplare_vandute) AS total_exemplare_vandute, SUM(pret_total_carte) AS total_incasari FROM carti WHERE nr_exemplare_vandute > 0");
    if ($query) {
        $row = mysql_fetch_assoc($query);
        $nr_exemplare_vandute = $row['total_exemplare_vandute'];
        $total_incasari = $row['total_incasari'];
        echo "S-au vandut $nr_exemplare_vandute carti.";
        echo"Iar incasarile totale au fost de $total_incasari lei";
    }
 }
 echo"<br>";
 echo '</form>';
}else echo"Nu s-a gasit nici o inregistrare in tabela";
}elseif(isset($_POST['Adauga'])){
    $titlu=$_POST['titlu'];
    $autor=$_POST['autor'];
    $editura=$_POST['editura'];
    $cod_isbn=$_POST['cod_isbn'];
    $anul_aparitiei=$_POST['anul_aparitiei'];
    $nr_exemplare_stoc=$_POST['nr_exemplare_stoc'];
    $pret=$_POST['pret'];

    // adăugare cu parametrii
    $query=mysql_query("insert into carti (titlu,autor,editura,cod_isbn,anul_aparitiei, nr_exemplare_stoc,pret) 
    values('$titlu','$autor','$editura','$cod_isbn',$anul_aparitiei, $nr_exemplare_stoc, $pret)");

    
    echo "Inserare reusita!!!";
   


}