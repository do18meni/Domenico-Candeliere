<?php
session_start();
if(!isset($_SESSION["user"])){
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style/navbar.css">
        <link rel="stylesheet" href="style/ricette.css">                
        
        <title>Ricette</title>
    </head>
    <body>

        <?php include "navbar.php"; ?>
        
        <button class="card" onclick="newRic()">
            <h1>+</h1>Aggiungi ricetta
        </button>
        <div id="form-container" class="card"></div>
        <div class="card">
            <p>nome ricetta: Carbonara</p>
            <p>difficoltà: 2</p>
            <p>porzioni: 3</p>
            <button>modifica</button>
            <button>elimina</button>
        </div>
        <div class="card">
            <p>nome ricetta: cotoletta alla milanese</p>
            <p>difficoltà: 3</p>
            <p>porzioni: 2</p>
            <button>modifica</button>
            <button>elimina</button>
        </div>
        
    </body>
    
    <script>
        function newRic(){
            
            let form_container = document.getElementById("form-container");
            form_container.style.display = "inline-block";
            let form = document.createElement("form");
            form.setAttribute("class","card");
            let br = document.createElement("br");
            form.setAttribute("method", "post");
            let select = document.createElement("div");

            let nome = document.createElement("input");
            let nome_l = document.createElement("label");
            nome_l.innerText = "Nome ricetta";
            nome.setAttribute("type", "text");
            nome.setAttribute("placeholder", "Nome ricetta");
            nome.setAttribute("name", "nome");
            
            let difficolta = document.createElement("input");
            let difficolta_l = document.createElement("label");
            difficolta_l.innerText = "Difficoltà (1-5)";
            difficolta.setAttribute("type", "number");
            difficolta.setAttribute("name", "difficolta");
            difficolta.setAttribute("min", "1");
            difficolta.setAttribute("max", "5");
            
            let descrzionePreparazione
 = document.createElement("textarea");
            let descrzionePreparazione
_l = document.createElement("label");
            descrzionePreparazione
_l.innerText = "descrzionePreparazione
";
            descrzionePreparazione
.setAttribute("type", "text");
            descrzionePreparazione
.setAttribute("placeholder", "descrzionePreparazione
");
            descrzionePreparazione
.setAttribute("name", "descrzionePreparazione
");
            
            let porzioni = document.createElement("input");
            let porzioni_l = document.createElement("label");
            porzioni_l.innerText = "Porzioni";
            porzioni.setAttribute("type", "number");
            porzioni.setAttribute("name", "porzioni");
            porzioni.setAttribute("min", "1");

            let submit = document.createElement("button");
            submit.innerText = "Conferma";
            submit.setAttribute("type", "submit")
            submit.setAttribute("name", "newRic")

            form_container.appendChild(form);
            form.appendChild(nome_l);
            form.appendChild(nome);
            form.appendChild(difficolta_l);
            form.appendChild(difficolta);
            form.appendChild(descrzionePreparazione
_l);
            form.appendChild(descrzionePreparazione
);
            form.appendChild(porzioni_l);
            form.appendChild(porzioni);
            form.appendChild(select);
            form.appendChild(br);
            form.appendChild(submit);
            
        }
        
        function refreshIngr(){
            
            var xmlhttp = new XMLHttpRequest();		
			xmlhttp.open("GET","refreshIngr.php,true);
            xmlhttp.send();
					
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("ingredienti").innerHTML = this.responseText;
				}
			};
			
        }
        
    </script>
    
    <?php
		
    if(array_key_exists("newRic", $_POST)){
        
        $nomeRicetta = $_POST["nome"];
        $difficolta = $_POST["difficolta"];
        $descrzionePreparazione = $_POST["descrzionePreparazione"];
        $porzioni = $_POST["porzioni"];
        
        $sql = "INSERT ricetta (nome, difficolta, descrzionePreparazione, porzioni) VALUES ('$nomeRicetta', '$difficolta', '$descriionePreparazione', '$porzioni')";

        if ($conn->query($sql) === TRUE) {
            echo "<div class='overlay' id='pop'>
                    <div class='popup'>
                        <h2>Aggiungi ingredienti</h2>
                        <form method='post' onsubmit='refreshIngr()'>
                            <label>ingredienti</label><br>";
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
                                echo "Non hai anora ingredienti";
                            }
                        echo"<button type='submit' name='addIngr'>Aggiungi ingrediente</button>
                        </form>
                        <div id='ingredienti'></div>
                        <span id='close'>X</span>
                    </div>
                </div>

                <script>
                    document.getElementById('pop').style.display='block';
                    // chiudi il pupup quando clicchi sulla X
                    document.getElementById('close').onclick = function(e){
                        document.getElementById('pop').style.display='none';
                    }

                    // chiudi il popup quando clicchi sullo sfondo nero
                    document.getElementById('pop').onclick = function(e){
                        document.getElementById('pop').style.display='none';	
                    }
                </script>";
        }
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
    }
    
    if(array_key_exists("newRic", $_POST)){
      
        $sql = "INSERT rel_ingredienti_ricette (nome, cognome, email, password) VALUES ('$name', '$surname', '$email', '$password1')";

        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
        }
        else {
            echo "Errore nella registrazione";
        }
    }

    ?>
    
</html>