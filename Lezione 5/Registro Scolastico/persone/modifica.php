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

$datiStudente = ['id' => 0, 'nome' => '', 'cognome' => '', 'data_di_nascita' => ''];

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $stmt = $db->prepare('SELECT * FROM ' . TIPO_PERSONA_PLURALE . ' WHERE id = ?');
    $stmt->bind_param('i', $_GET['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows === 1) {
        $datiStudente = $result->fetch_assoc();
    }
}

if ($datiStudente['data_di_nascita'] !== '') {
    $datiStudente['data_di_nascita'] = date('d/m/Y', strtotime($datiStudente['data_di_nascita']));
}

if (isset($_POST['pulsante'])) {
    $data = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['data_di_nascita'])));

    if ($datiStudente['id'] === 0) {
        $stmt = $db->prepare('INSERT INTO ' . TIPO_PERSONA_PLURALE .' (nome, cognome, data_di_nascita) VALUES (?, ?, ?)');
        $stmt->bind_param('sss', $_POST['nome'], $_POST['cognome'], $data);
        $messaggio = ucfirst(TIPO_PERSONA) . ' aggiunto con successo';
    } else {
        $stmt = $db->prepare('UPDATE ' . TIPO_PERSONA_PLURALE . ' SET nome = ?, cognome = ?, data_di_nascita = ? WHERE id = ?');
        $stmt->bind_param('sssi', $_POST['nome'], $_POST['cognome'], $data, $datiStudente['id']);
        $messaggio = ucfirst(TIPO_PERSONA) .' modificato con successo';
    }

    $stmt->execute();
    $stmt->close();

    $_SESSION['messaggio'] = $messaggio;

    header('Location: /' . TIPO_PERSONA_PLURALE .'/index.php');
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
    <h1><?= ($datiStudente['id'] === 0 ? 'Aggiungi' : 'Modifica') ?> <?= TIPO_PERSONA ?></h1>

    <form method="POST">
        <div class="form-group">
            <input class="form-control" type="text" name="nome" placeholder="Nome" value="<?= $datiStudente['nome'] ?>" />
            <input class="form-control" type="text" name="cognome" placeholder="Cognome" value="<?= $datiStudente['cognome'] ?>" />
            <input class="form-control" type="text" name="data_di_nascita" placeholder="Data di nascita" value="<?= $datiStudente['data_di_nascita'] ?>" />
            <input class="form-control btn btn-success" type="submit" name="pulsante" value="Salva" />
        </div>
    </form>

</div>
