<?php

require 'classi/Persona.php';
require 'classi/Docente.php';
require 'classi/Studente.php';
require 'classi/Materia.php';
require 'classi/Registro.php';
require 'classi/Voto.php';

$registro = new Registro();

$docente = new Docente('Mario', 'Rossi', '1987-04-17');
$registro->aggiungiDocente($docente);

$materiaMatematica = new Materia('Matematica', $docente);
$registro->aggiungiMateria($materiaMatematica);

$materiaItaliano = new Materia('Italiano', $docente);
$registro->aggiungiMateria($materiaItaliano);

$studente1 = new Studente('Giuseppe', 'Aaa', '2004-03-27');
$registro->aggiungiStudente($studente1);

$studente2 = new Studente('Francesco', 'Rossi', '2005-04-12');
$registro->aggiungiStudente($studente2);

$voto = new Voto(7, '2022-03-30', $materiaMatematica);
$studente1->aggiungiVoto($voto);

$voto = new Voto(5, '2022-03-30', $materiaMatematica);
$studente1->aggiungiVoto($voto);

$voto = new Voto(10, '2022-03-30', $materiaMatematica);
$studente2->aggiungiVoto($voto);

$voto = new Voto(9, '2022-03-30', $materiaItaliano);
$studente2->aggiungiVoto($voto);

echo $registro->getElencoVotiStudente($studente2) . PHP_EOL;
echo PHP_EOL . "=====================" . PHP_EOL;
echo $registro->getElencoVotiMateria($materiaItaliano) . PHP_EOL;
echo PHP_EOL . "=====================" . PHP_EOL;

echo $registro->getElencoStudenti() . PHP_EOL;
echo PHP_EOL . "=====================" . PHP_EOL;
echo $registro->getElencoStudenti(true) . PHP_EOL;


// echo 'La media è ' . $studente->getMedia();
