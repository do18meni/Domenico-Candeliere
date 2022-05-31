<h2>Codici fiscali generati di recente</h2>

<?php

$db = mysqli_connect('localhost', 'root', 'password', 'jac_01');

$risultato = $db->query('SELECT * FROM codici');

// $numeroRighe = $risultato->num_rows;

echo "<ul>";
while ($riga = $risultato->fetch_assoc()) {
    echo "<li>" . $riga['codice'] . "</li>" . PHP_EOL;
}
echo "</ul>"


?>
