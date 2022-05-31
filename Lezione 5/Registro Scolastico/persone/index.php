<?php

require '../db.php';
require '../header.php';
require '../check_auth.php';

if (!defined('TIPO_PERSONA')) {
    echo 'Questa pagina non esiste';
    exit;
} elseif (TIPO_PERSONA === 'studente') {
    define('TIPO_PERSONA_PLURALE', 'studenti');
    $query = 'SELECT studenti.*, AVG(voti.voto) as media FROM studenti LEFT JOIN voti ON studenti.id = voti.studente_id GROUP BY studenti.id';

    if (isset($_GET['ordine']) && $_GET['ordine'] === 'media') {
        $query .= ' ORDER BY media DESC';
    } else {
        $query .= ' ORDER BY cognome';
    }

    $res = $db->query($query);

} elseif (TIPO_PERSONA === 'docente') {
    define('TIPO_PERSONA_PLURALE', 'docenti');
    $res = $db->query('SELECT * FROM docenti ORDER BY cognome');
}


?>

<div class="content">
    <h1>Elenco <?= TIPO_PERSONA_PLURALE ?></h1>

    <a href="/<?= TIPO_PERSONA_PLURALE ?>/modifica.php?id=0" type="button" class="btn btn-success" style="margin: 12px 4px;">Aggiungi <?= TIPO_PERSONA ?></a>

    <?php
    if (TIPO_PERSONA === 'studente') {
        if (isset($_GET['ordine']) && $_GET['ordine'] === 'media') {
            ?>
                <a href="/<?= TIPO_PERSONA_PLURALE ?>/index.php?ordine=cognome">Ordina per cognome</a>
            <?php
        } else {
            ?>
                <a href="/<?= TIPO_PERSONA_PLURALE ?>/index.php?ordine=media">Ordina per media decrescente</a>
            <?php
        }
    }
    ?>


    <?php
    if (isset($_SESSION['messaggio'])) {
        echo "<div class=\"alert alert-success\" role=\"alert\" style=\"max-width: 300px\">";
        echo $_SESSION['messaggio'];
        echo "</div>";
        unset($_SESSION['messaggio']);
    }
    ?>

    <table class="table table-bordered" style="max-width: 800px; margin: 4px">
        <tr>
            <th>Nome</th>
            <th>Cognome</th>
            <th>Data di nascita</th>
            <?php
            if (TIPO_PERSONA === 'studente') {
                echo "<th>Media dei voti</th>";
            }
            ?>
            <th>Azioni</th>
        </tr>
        <?php
            while ($riga = $res->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $riga['nome'] . "</td>";
                echo "<td>" . $riga['cognome'] . "</td>";
                echo "<td>" . date('d/m/Y', strtotime($riga['data_di_nascita'])) . "</td>";
                if (TIPO_PERSONA === 'studente') {
                    echo "<td>" . (floatval($riga['media']) === 0.0 ? '' : round($riga['media'], 2)) . "</td>";
                }
                ?>
                <td>
                    <?php
                    if (TIPO_PERSONA === 'studente') {
                        ?>
                        <a href="/voti/elenco.php?studente=<?= $riga['id'] ?>" type="button" class="btn btn-primary">Visualizza voti</a>
                        <?php
                    }
                    ?>
                    <a href="/<?= TIPO_PERSONA_PLURALE ?>/modifica.php?id=<?= $riga['id'] ?>" type="button" class="btn btn-secondary">Modifica</a>
                    <a href="/<?= TIPO_PERSONA_PLURALE ?>/elimina.php?id=<?= $riga['id'] ?>" type="button" class="btn btn-danger">Elimina</a>
                </td>
                <?php
                echo "</tr>";
            }
        ?>
    </table>
</div>
