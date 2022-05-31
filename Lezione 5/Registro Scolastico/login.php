<?php

require 'db.php';
require 'header.php';

session_start();

if (isset($_POST['pulsante'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $db->prepare('SELECT * FROM utenti WHERE email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows === 1) {
        // l'utente è stato trovato
        $riga = $result->fetch_assoc();
        if (password_verify($password, $riga['password'])) {
            $_SESSION['id_utente'] = $riga['id'];
            header('Location: ' . $_SESSION['redirect_uri']);
        } else {
            echo 'Le credenziali non sono valide';
        }
    } else {
        // l'utente non esiste
        echo 'Le credenziali non sono valide';
    }
}

?>
<style>
.content {
    max-width: 400px;
}
input {
    margin-bottom: 8px;
}
</style>

<div class="content">
    <h1>Effettua l'accesso</h1>

    <form method="POST">
        <div class="form-group">
            <input class="form-control" type="text" name="email" placeholder="Email" />
            <input class="form-control" type="password" name="password" placeholder="Password" />
            <input class="form-control btn btn-success" type="submit" name="pulsante" value="Accedi" />
        </div>
    </form>
</div>
