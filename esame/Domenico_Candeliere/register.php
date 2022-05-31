<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style/login.css">
        
        <title>Registrazione</title>
    </head>
<body>

<h2>Ricettario</h2>

<form method="post">
  

  <div class="container">
    <label for="nome"><b>nome</b></label>
    <input type="text" placeholder="Enter name" name="nome" required>

    <label for="cognome"><b>cognome</b></label>
    <input type="text" placeholder="Enter surname" name="cognome" required>
      
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter email" name="email" required>

    <label for="password1"><b>Password</b></label>
    <input type="password" placeholder="Enter password" name="password1" required>
    
    <label for="password2"><b>Password</b></label>
    <input type="password" placeholder="Re-Enter password" name="password2" required>
    
    <button type="submit" name="register">Registrati</button>

  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="reset" class="cancelbtn">Resetta</button>
    <span class="psw"><a href="login.php">Accedi</a></span>
  </div>
</form>

</body>
    
    <?php
		include 'db_connection.php';
		
		$name = "";
		$surname = "";
        $email = "";
		$password1 = "";
        $password2 = "";
        	
        if(array_key_exists('register', $_POST)){
            
            $name=$_POST["nome"];
			$surname=$_POST["cognome"];
			$email=$_POST["email"];
			$password1=$_POST["password1"];
			$password2=$_POST["password2"];
               
			if($password1!=$password2){
				echo '<h2 class="title is-3 " style="text-align:center">Le password non coincidono</h2>';
			}
			else{
				$getemail = "SELECT email FROM utente WHERE email = '$email'";
            	$risultato = $conn->query($getemail);
				if ($risultato->num_rows == 0) {
					$sql = "INSERT utente (nome, cognome, email, password)
                    		VALUES ('$name', '$surname', '$email', '$password1')";

                    if ($conn->query($sql) === TRUE) {
                        header("Location: index.php");
                    }
                    else {
                        echo "Errore nella registrazione";
                    }
				}
				else{
					echo '<h2>Questa mail è già associata ad un account</h2>';
				}
			}
        }
        
	?>
    
</html>