<?php

session_start();

$autorizzato = isset($_SESSION['id_utente']);

if (!$autorizzato) {
    // echo "<h2>Non sei autorizzato ad accedere a questa pagina</h2>";
    $_SESSION['redirect_uri'] = $_SERVER['REQUEST_URI'];
    header('Location: /login.php');
    die;
}
