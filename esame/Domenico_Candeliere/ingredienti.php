

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style/navbar.css">
        <link rel="stylesheet" href="style/ricette.css">                
        
        <title>I tuoi ingredienti</title>
    </head>
    <body>

        <?php include "navbar.php"; ?>
        
        <button class="card" onclick="newIng()">
            <h1>+</h1>Aggiungi ingrediente
        </button>
        <div id="form-container" class="card"></div>
        
        <?php
        
        //prelevo i dati dalla tabella
        $getutente = "SELECT * FROM ingrediente WHERE id_utente = '".$_SESSION["id"]."'";
            
        $risultato = $conn->query($getutente);
            
        if ($risultato->num_rows > 0) {
            // salvo le informazioni dell'utente
            while($riga = $risultato->fetch_assoc()) {
                 echo "<div class='card'>
                        <p>".$riga['nome']."</p>
                        <p>Unità di misura: ".$riga['unita_misura']."</p>
                        <button>modifica</button>
                        <button>elimina</button>
                    </div>";
            }
        }
        else{
            echo "Non hai anora ingredienti";
        }
        
        ?>

    </body>
    
    <script>
        function newIng(){
            
            let form_container = document.getElementById("form-container");
            form_container.style.display = "inline-block";
            let form = document.createElement("form");
            form.setAttribute("class","card");
            let br = document.createElement("br");
            form.setAttribute("method", "post");

            let nome = document.createElement("input");
            let nome_l = document.createElement("label");
            nome_l.innerText = "Nome ingrediente";
            nome.setAttribute("type", "text");
            nome.setAttribute("placeholder", "Nome ingrediente");
            nome.setAttribute("name", "nome");

            let um = document.createElement("input");
            let um_l = document.createElement("label");
            um_l.innerText = "Unità di misura";
            um.setAttribute("type", "text");
            um.setAttribute("placeholder", "Unità di misura");
            um.setAttribute("name", "um");
            
            let submit = document.createElement("button");
            submit.innerText = "Aggiungi";
            submit.setAttribute("type", "submit")
            submit.setAttribute("name", "newIng")

            form_container.appendChild(form);
            form.appendChild(nome_l);
            form.appendChild(nome);
            form.appendChild(um_l);
            form.appendChild(um);
            form.appendChild(br);
            form.appendChild(submit);
            
        }
    </script>
    
    <?php
		
    if(array_key_exists("newIng", $_POST)){
        
        $nome_ingrediente = $_POST["nome"];
        $um = $_POST["um"];
        
        $sql = "INSERT ingrediente (nome, unita_misura, id_utente) VALUES ('$nome_ingrediente', '$um', '".$_SESSION["id"]."')";

        if ($conn->query($sql) === TRUE) {
            echo "Ingrediente aggiunto con successo";
        }
        else {
            echo "Errore nella registrazione";
        }
        
    }

    ?>
    
</html>