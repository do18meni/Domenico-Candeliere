<?php

session_start();
unset($_SESSION['id_utente']);

header('Location: /login.php');
