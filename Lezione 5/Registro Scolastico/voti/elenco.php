<?php

require '../db.php';
require '../header.php';
require '../check_auth.php';

$query = 'SELECT voti.id, voti.voto, voti.data, materie.nome as nome_materia, studenti.nome as nome_studente, studenti.cognome as cognome_studente FROM voti INNER JOIN materie ON voti.materia_id = materie.id INNER JOIN studenti ON voti.studente_id = studenti.id';

if (isset($_GET['studente'])) {
    $query .= ' WHERE studenti.id = ?';
    $valore = $_GET['studente'];
} elseif (isset($_GET['materia'])) {
    $query .= ' WHERE materie.id = ?';
    $valore = $_GET['materia'];
}

$stmt = $db->prepare($query);
$stmt->bind_param('i', $valore);
$stmt->execute();
$res = $stmt->get_result();

/*
$valore = 1234;
$stmt->execute();
$res = $stmt->get_result();
*/

$stmt->close();

$sommaVoti = 0.0;
$conteggioVoti = 0;

?>

<div class="content">
    <h1>
        Elenco voti
        <?php
        if (isset($_GET['studente'])) {
            echo ' dello studente';
        } elseif (isset($_GET['materia'])) {
            echo ' della materia';
        }
        ?>
    </h1>

    <table class="table table-bordered" style="max-width: 900px; margin: 4px">
        <tr>
            <th>Voto</th>
            <th>Data</th>
            <?php
            if (isset($_GET['studente'])) {
                echo "<th>Materia</th>";
            } elseif (isset($_GET['materia'])) {
                echo "<th>Studente</th>";
            }
            ?>
        </tr>
        <?php
            while ($riga = $res->fetch_assoc()) {
                $sommaVoti += $riga['voto'];
                $conteggioVoti++;

                echo "<tr>";
                echo "<td>" . $riga['voto'] . "</td>";
                echo "<td>" . date('d/m/Y', strtotime($riga['data'])). "</td>";
                if (isset($_GET['studente'])) {
                    echo "<td>" . $riga['nome_materia'] . "</td>";
                } elseif (isset($_GET['materia'])) {
                    echo "<td>" . $riga['nome_studente'] . ' ' . $riga['cognome_studente']. "</td>";
                }
                echo "</tr>";
            }
        ?>
    </table>

    La media dei voti è
    <?php
    if ($conteggioVoti === 0) {
        echo ' n.d.';
    } else {
        echo ' ' . ($sommaVoti / $conteggioVoti);
    }
    ?>
</div>
