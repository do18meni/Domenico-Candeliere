<?php

require '../db.php';
require '../header.php';
require '../check_auth.php';

$res = $db->query('SELECT materie.id, materie.nome, docenti.nome as \'nome_docente\', docenti.cognome as \'cognome_docente\' FROM materie INNER JOIN docenti ON materie.docente_id = docenti.id');

?>

<div class="content">
    <h1>Elenco materie</h1>

    <a href="/materie/modifica.php?id=0" type="button" class="btn btn-success" style="margin: 12px 4px;">Aggiungi materia</a>

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
            <th>Nome</th>
            <th>Docente</th>
            <th>Azioni</th>
        </tr>
        <?php
            while ($riga = $res->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $riga['nome'] . "</td>";
                echo "<td>" . $riga['nome_docente'] . ' ' . $riga['cognome_docente'] . "</td>";
                ?>
                <td>
                    <a href="/voti/elenco.php?materia=<?= $riga['id'] ?>" type="button" class="btn btn-primary">Visualizza voti</a>
                    <a href="/materie/modifica.php?id=<?= $riga['id'] ?>" type="button" class="btn btn-secondary">Modifica</a>
                    <a href="/materie/elimina.php?id=<?= $riga['id'] ?>" type="button" class="btn btn-danger">Elimina</a>
                </td>
                <?php
                echo "</tr>";
            }
        ?>
    </table>
</div>
