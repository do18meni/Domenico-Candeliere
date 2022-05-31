<?php

require '../db.php';
require '../header.php';
require '../check_auth.php';

if (!defined('TIPO_PERSONA')) {
    echo 'Questa pagina non esiste';
    exit;
} elseif (TIPO_PERSONA === 'studente') {
    define('TIPO_PERSONA_CON_ARTICOLO', 'lo studente');
    define('TIPO_PERSONA_PLURALE', 'studenti');
} elseif (TIPO_PERSONA === 'docente') {
    define('TIPO_PERSONA_CON_ARTICOLO', 'il docente');
    define('TIPO_PERSONA_PLURALE', 'docenti');
}

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $stmt = $db->prepare('SELECT * FROM ' . TIPO_PERSONA_PLURALE . ' WHERE id = ?');
    $stmt->bind_param('i', $_GET['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows === 1) {
        $datiStudente = $result->fetch_assoc();
    } else {
        // TODO: mostrare errore all'utente
        header('Location: /' . TIPO_PERSONA_PLURALE);
    }
}

if (isset($_POST['pulsante'])) {
    $stmt = $db->prepare('DELETE FROM ' . TIPO_PERSONA_PLURALE . ' WHERE id = ?');
    $stmt->bind_param('i', $datiStudente['id']);
    $stmt->execute();
    $stmt->close();

    // TODO: mostrare messaggio conferma all'utente
    header('Location: /' . TIPO_PERSONA_PLURALE);
    die;
}

?>

<style>
input {
    margin-bottom: 6px;
}
.form-group {
    max-width: 500px;
}
</style>

<div class="content">
    <h1>Elimina <?= TIPO_PERSONA ?></h1>

    <p>
        Sei sicuro di volere eliminare <?= TIPO_PERSONA_CON_ARTICOLO ?> <?= $datiStudente['nome'] . ' ' . $datiStudente['cognome'] ?>?
    </p>

    <form method="POST">
        <div class="form-group">
            <input class="form-control btn btn-danger" type="submit" name="pulsante" value="Elimina" />
        </div>
    </form>

</div>
