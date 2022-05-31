<?php

$db = mysqli_connect('localhost', 'root', 'password', 'jac_01');

//$codiceFiscale = $_POST['codice_fiscale'];
$codiceFiscale = 'ZZZYY","2022-02-02 02:02:00"); INSERT INTO codici(codice, datetime_creazione) VALUES("ciao", "2020-01-01 00:00:00") -- -- Y99A11A123A';
$data = '2022-04-06 15:21:11';

$stringaQuery = 'INSERT INTO codici (codice, datetime_creazione) VALUES ("' . $codiceFiscale . '", "' . $data . '")';
$db->query($stringaQuery);

$stmt = $db->prepare('INSERT INTO codici (codice, datetime_creazione) VALUES (?, ?)');
$stmt->bind_param('ss', $codiceFiscale, $data);
$stmt->execute();
$stmt->close();



?>

<h2>  </h2>
