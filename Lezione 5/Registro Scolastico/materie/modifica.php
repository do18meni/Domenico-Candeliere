<?php

require '../db.php';
require '../header.php';
require '../check_auth.php';

$datiMateria = ['id' => 0, 'nome' => '', 'docente_id' => 0];

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $stmt = $db->prepare('SELECT * FROM materie WHERE id = ?');
    $stmt->bind_param('i', $_GET['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows === 1) {
        $datiMateria = $result->fetch_assoc();
    }
}

if (isset($_POST['pulsante'])) {
    if ($datiMateria['id'] === 0) {
        $stmt = $db->prepare('INSERT INTO materie (nome, docente_id) VALUES (?, ?)');
        $stmt->bind_param('si', $_POST['nome'], $_POST['docente_id']);
        $messaggio = 'Materia aggiunta con successo';
    } else {
        $stmt = $db->prepare('UPDATE materie SET nome = ?, docente_id = ? WHERE id = ?');
        $stmt->bind_param('sii', $_POST['nome'], $_POST['docente_id'], $datiMateria['id']);
        $messaggio = 'Materia modificata con successo';
    }

    $stmt->execute();
    $stmt->close();

    $_SESSION['messaggio'] = $messaggio;

    header('Location: /materie/index.php');
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
    <h1><?= ($datiMateria['id'] === 0 ? 'Aggiungi' : 'Modifica') ?> materia</h1>

    <form method="POST">
        <div class="form-group">
            <input class="form-control" type="text" name="nome" placeholder="Nome" value="<?= $datiMateria['nome'] ?>" />

            <select name='docente_id' class="form-control" style="margin-bottom: 8px">
                <?php
                $res = $db->query('SELECT * FROM docenti');

                while ($resultArray = $res->fetch_assoc()) {
                    echo "<option ";
                    if ($datiMateria['docente_id'] === intval($resultArray['id'])) {
                        echo "selected";
                    }

                    echo " value='" . $resultArray['id'] . "'>";
                    echo $resultArray['nome'] . ' ' . $resultArray['cognome'];
                    echo "</option>";
                }
                ?>
            </select>

            <input class="form-control btn btn-success" type="submit" name="pulsante" value="Salva" />
        </div>
    </form>

</div>
