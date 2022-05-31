<?php

session_start();

require_once 'costanti.php';
require_once 'funzioni.php';

$db = mysqli_connect('localhost', 'root', 'password', 'jac_01');

$codiceFiscale = calcolaCodiceFiscale($_POST['nome'], $_POST['cognome'], $_POST['data_di_nascita'], $_POST['sesso'], $_POST['comune']);
$data = date('Y-m-d H:i:s');

$stmt = $db->prepare('INSERT INTO codici (codice, datetime_creazione) VALUES (?, ?)');
$stmt->bind_param('ss', $codiceFiscale, $data);
$stmt->execute();
$stmt->close();

$_SESSION['codice'] = $codiceFiscale;
// setcookie('codice', $codiceFiscale);

?>

<h2>
    Il tuo codice fiscale è:
    <?php echo $codiceFiscale; ?>
</h2>

<a href="./" >Torna alla home</a>
<a href="./visualizza.php" >Visualizza codici generati</a>
