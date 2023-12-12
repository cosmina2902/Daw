<html>
    <body>
    <?php
//Conectare la server
//(în cazul de faţă, server MySQL local, user – root, parola – andreea)
mysql_connect("localhost","root","") or die ("Nu se
poate conecta la serverul MySQL");
//Selecţie baza de date
mysql_select_db("persoane") or die("Nu se poate deschide baza
de date");
 //Interogare tabelă (comandă SQL)
$query=mysql_query("select * from table1 where nume='ion'");
//Creează capul de tabel (se face o afişare tabelată)
print('<table align=center BORDER="2">');
print ("<tr>");
 echo '<th BGCOLOR="Silver">Nume</th>';
 echo '<th BGCOLOR="Silver">Virsta</th>';
 echo '<th BGCOLOR="Silver">Localitate</th>';
print ("</tr>");
//Iniţializare variabilă_contor conţinând numărul de elemente (celule)
// returnate prin interogarea tabelei
$nr_val=0;

//Ciclează după nr. înregistrări/linii găsite (realizând o condiţie logică şi o
// atribuire prin returnarea elementelor unei linii/înregistrări în variabila
// şir (array) $row)
while ($row = mysql_fetch_row($query)){
// Variabila $row este un şir (array) conţinând succesiv, la un moment dat, //elementeleunei înregistrări (row[0] va conţine elemente din coloana 1 a
//liniei curente, etc)

//Creează o linie nouă în tabel
 echo" <tr>\n";
//Ciclează după elementele unei înregistrări/linii
 foreach ($row as $value) { 
    //Pune într-o celulă din tabel elementul unei înregistrări (valoarea dintr-un
// câmp al înregistrării)
// Creează o coloană nouă în linia tabelului
 echo "<td>$value</td>";
 //Incrementează variabila_contor = nr.total elemente = nr.inreg. X nr. câmpuri
  $nr_val++;
  }//închide buclă foreach
  echo "</tr>";
 }//închide buclă while
 
 //Calculează nr. de coloane returnate prin interogare
 $coln=mysql_num_fields($query);
 $nr_inreg=$nr_val/$coln; //calculează nr. de înregistrări/linii
 echo "<br>";
 echo "<center>";
 if ($nr_inreg>0) //verifică câte înregistrări s-au găsit
  echo "s-au gasit: ".$nr_inreg." inregistrari";
 // punctul (.) - rol de operator de concatenare între siruri
 else
  die ("Nu gasesc nici o inregistrare ...");
 //Comanda die închide programul şi toate conexiunile (ieşire forţată)
 echo "</center>";
 //Comanda următoare se va executa numai în caz de căutare reuşită
 mysql_close();
 ?> 
</body>
</html>