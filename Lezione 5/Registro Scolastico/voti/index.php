<?php

require '../db.php';
require '../header.php';
require '../check_auth.php';

$res = $db->query('SELECT voti.id, voti.voto, voti.data, materie.nome as nome_materia, studenti.nome as nome_studente, studenti.cognome as cognome_studente FROM voti INNER JOIN materie ON voti.materia_id = materie.id INNER JOIN studenti ON voti.studente_id = studenti.id');

?>

<div class="content">
    <h1>Elenco voti</h1>

    <a href="/voti/modifica.php?id=0" type="button" class="btn btn-success" style="margin: 12px 4px;">Aggiungi voto</a>

    <?php
    if (isset($_SESSION['messaggio'])) {
        $tipoMessaggio = $_SESSION['tipo_messaggio'] ?? 'success';
        echo "<div class=\"alert alert-" . $tipoMessaggio . "\" role=\"alert\" style=\"max-width: 300px\">";
        echo $_SESSION['messaggio'];
        echo "</div>";
        unset($_SESSION['messaggio']);
        unset($_SESSION['tipo_messaggio']);
    }
    ?>

    <table class="table table-bordered" style="max-width: 900px; margin: 4px">
        <tr>
            <th>Voto</th>
            <th>Data</th>
            <th>Studente</th>
            <th>Materia</th>
            <th>Azioni</th>
        </tr>
        <?php
            while ($riga = $res->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $riga['voto'] . "</td>";
                echo "<td>" . date('d/m/Y', strtotime($riga['data'])). "</td>";
                echo "<td>" . $riga['nome_studente'] . ' ' . $riga['cognome_studente']. "</td>";
                echo "<td>" . $riga['nome_materia'] . "</td>";
                ?>
                <td>
                    <a href="/voti/modifica.php?id=<?= $riga['id'] ?>" type="button" class="btn btn-secondary">Modifica</a>
                    <a href="/voti/elimina.php?id=<?= $riga['id'] ?>" type="button" class="btn btn-danger">Elimina</a>
                </td>
                <?php
                echo "</tr>";
            }
        ?>
    </table>
</div>
