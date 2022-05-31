<?php

require '../db.php';
require '../header.php';
require '../check_auth.php';

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $stmt = $db->prepare('SELECT * FROM voti WHERE id = ?');
    $stmt->bind_param('i', $_GET['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows === 1) {
        $datiVoto = $result->fetch_assoc();
    } else {
        $_SESSION['messaggio'] = 'Il voto scelto non esiste';
        $_SESSION['tipo_messaggio'] = 'danger';
        header('Location: /voti');
    }
}

if (isset($_POST['pulsante'])) {
    $stmt = $db->prepare('DELETE FROM voti WHERE id = ?');
    $stmt->bind_param('i', $datiVoto['id']);
    $stmt->execute();
    $stmt->close();

    $_SESSION['messaggio'] = 'Voto eliminato con successo';
    header('Location: /voti');
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
    <h1>Elimina voto</h1>

    <p>
        Sei sicuro di volere eliminare il voto "<?= $datiVoto['voto']?>" del giorno <?= date('d/m/Y', strtotime($datiVoto['data'])) ?>?
    </p>

    <form method="POST">
        <div class="form-group">
            <input class="form-control btn btn-danger" type="submit" name="pulsante" value="Elimina" />
        </div>
    </form>

</div>
