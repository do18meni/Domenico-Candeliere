<?php

require '../db.php';
require '../header.php';
require '../check_auth.php';

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $stmt = $db->prepare('SELECT * FROM materie WHERE id = ?');
    $stmt->bind_param('i', $_GET['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows === 1) {
        $datiMateria = $result->fetch_assoc();
    } else {
        $_SESSION['messaggio'] = 'La materia scelta non esiste';
        $_SESSION['tipo_messaggio'] = 'danger';
        header('Location: /materie');
    }
}

if (isset($_POST['pulsante'])) {
    $stmt = $db->prepare('DELETE FROM materie WHERE id = ?');
    $stmt->bind_param('i', $datiMateria['id']);
    $stmt->execute();
    $stmt->close();

    $_SESSION['messaggio'] = 'Materia eliminata con successo';
    header('Location: /materie');
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
    <h1>Elimina materia</h1>

    <p>
        Sei sicuro di volere eliminare la materia <?= $datiMateria['nome']?>?
    </p>

    <form method="POST">
        <div class="form-group">
            <input class="form-control btn btn-danger" type="submit" name="pulsante" value="Elimina" />
        </div>
    </form>

</div>
