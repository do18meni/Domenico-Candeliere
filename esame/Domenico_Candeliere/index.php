<!DOCTYPE html>


<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style/navbar.css">
        
        <title>Ricettario</title>
    </head>
<body>

<?php include "navbar.php"; ?>


</body>
    
    <?php
		// Domenico Candeliere
    //prelevo i dati dalla tabella
            $getutente = "SELECT * FROM utente WHERE email = '".$login_email."' AND password = '".$login_password."'";
            
            $risultato = $conn->query($getutente);
            
            if ($risultato->num_rows > 0) {
                
                // salvo le informazioni dell'utente
                while($riga = $risultato->fetch_assoc()) {
                    var_dump($risultato);
                    $db_id = $riga["id"];
                    $db_nome = $riga["nome"];
                    $db_cognome = $riga["cognome"];
                    $db_email =  $riga["email"];
                    $db_password =  $riga["password"];
                    $_SESSION["user"] = $db_nome;
                    $_SESSION["id"] = $db_id;
                    header("Location: index.php");  
                }
            }
            else{
                echo "controlla le tue credenziali e riprova";
            }
        
	?>
    
</html>