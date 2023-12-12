<?php
mysql_connect("localhost", "root", "") or die("Nu se poate conecta la serverul MySQL");
mysql_select_db("evidenta") or die("Nu se poate selecta baza de date");

$titlu = $_POST['titlu'];
$nr_exemplare_dorite = $_POST['nr_exemplare_dorite'];

$query = mysql_query("SELECT nr_exemplare_stoc, pret FROM carti WHERE titlu = '$titlu'");

if ($query) {
    $row = mysql_fetch_assoc($query);
    $nr_exemplare_stoc = $row['nr_exemplare_stoc'];
    $pret_unitar = $row['pret'];

    if ($nr_exemplare_stoc >= $nr_exemplare_dorite) {
        $pret_total = $pret_unitar * $nr_exemplare_dorite;
        $query = mysql_query("UPDATE carti SET nr_exemplare_stoc = nr_exemplare_stoc - $nr_exemplare_dorite, nr_exemplare_vandute = nr_exemplare_vandute + $nr_exemplare_dorite, pret_total_carte = pret_total_carte + $pret_total WHERE titlu = '$titlu'");
        echo "Cartea a fost vanduta!";
    } else {
        echo "Cartea nu poate fi vanduta sau nu sunt suficiente exemplare!";
    }
} else {
    echo "Eroare în interogare: " . mysql_error();
}
?>
