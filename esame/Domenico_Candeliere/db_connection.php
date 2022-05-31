<?php

	//_________________________CONNESSIONE_AL_DATABASE_________________________
            $servername = "localhost";
            $username = "root";
            $password = "";

            // Apri una connessione
            $GLOBALS['conn'] = new mysqli($servername, $username, $password,"ricettario");

            // Controlla per errori
            if ($GLOBALS['conn']->connect_error) {
            die("Connessione fallita: " . $GLOBALS['conn']->connect_error);
            }

?>