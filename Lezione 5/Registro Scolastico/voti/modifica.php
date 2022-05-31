<?php

require '../db.php';
require '../header.php';
require '../check_auth.php';

$datiVoto = ['id' => 0, 'data' => '', 'studente_id' => 0, 'materia_id' => 0];

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $stmt = $db->prepare('SELECT * FROM voti WHERE id = ?');
    $stmt->bind_param('i', $_GET['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows === 1) {
        $datiVoto = $result->fetch_assoc();
    }
}

if ($datiVoto['data'] !== '') {
    $datiVoto['data'] = date('d/m/Y', strtotime($datiVoto['data']));
}

if (isset($_POST['pulsante'])) {
    $data = date('Y-m-d', strtotime(str_replace('/', '-', $_POST['data'])));

    if ($datiVoto['id'] === 0) {
        $stmt = $db->prepare('INSERT INTO voti (voto, data, studente_id, materia_id) VALUES (?, ?, ?, ?)');
        $stmt->bind_param('isii', $_POST['voto'], $data, $_POST['studente_id'], $_POST['materia_id']);
        $messaggio = 'Voto aggiunto con successo';
    } else {
        $stmt = $db->prepare('UPDATE voti SET voto = ?, data = ?, studente_id = ?, materia_id = ? WHERE id = ?');
        $stmt->bind_param('isiii', $_POST['voto'], $data, $_POST['studente_id'], $_POST['materia_id'], $datiVoto['id']);
        $messaggio = 'Voto modificato con successo';
    }

    $stmt->execute();
    $stmt->close();

    $_SESSION['messaggio'] = $messaggio;

    header('Location: /voti/index.php');
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
    <h1><?= ($datiVoto['id'] === 0 ? 'Aggiungi' : 'Modifica') ?> voto</h1>

    <form method="POST">
        <div class="form-group">
            <input class="form-control" type="number" min="1" max="10" name="voto" placeholder="Voto" value="<?= $datiVoto['voto'] ?>" />
            <input class="form-control" type="text  " min="1" max="10" name="data" placeholder="Data" value="<?= $datiVoto['data'] ?>" />

            <select name='studente_id' class="form-control" style="margin-bottom: 8px">
                <?php
                $res = $db->query('SELECT * FROM studenti');

                while ($resultArray = $res->fetch_assoc()) {
                    echo "<option ";
                    if ($datiVoto['studente_id'] === intval($resultArray['id'])) {
                        echo "selected";
                    }

                    echo " value='" . $resultArray['id'] . "'>";
                    echo $resultArray['nome'] . ' ' . $resultArray['cognome'];
                    echo "</option>";
                }
                ?>
            </select>

            <select name='materia_id' class="form-control" style="margin-bottom: 8px">
                <?php
                $res = $db->query('SELECT * FROM materie');

                while ($resultArray = $res->fetch_assoc()) {
                    echo "<option ";
                    if ($datiVoto['materia_id'] === intval($resultArray['id'])) {
                        echo "selected";
                    }

                    echo " value='" . $resultArray['id'] . "'>";
                    echo $resultArray['nome'];
                    echo "</option>";
                }
                ?>
            </select>

            <input class="form-control btn btn-success" type="submit" name="pulsante" value="Salva" />
        </div>
    </form>

</div>
