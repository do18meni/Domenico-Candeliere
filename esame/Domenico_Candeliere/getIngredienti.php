<?php
include 'db_connection.php';
session_start();
//prelevo i dati dalla tabella
$getutente = "SELECT * FROM ingrediente WHERE id_utente = '".$_SESSION["id"]."'";
            
$risultato = $conn->query($getutente);
            
if ($risultato->num_rows > 0) {
    echo "<select name='ingrediente'>";
        
    // salvo le informazioni dell'utente
    while($riga = $risultato->fetch_assoc()) {
         echo "<option value='".$riga["id"]."'>".$riga['nome']."</option>";
    }
    echo "</select>";
}
else{
    echo "controlla le tue credenziali e riptova";
}
 

?>