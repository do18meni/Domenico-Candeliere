<?php

require 'classi/Persona.php';
require 'classi/Docente.php';
require 'classi/Materia.php';
require 'classi/Voto.php';

$docente1 = new Docente('Mario', 'Rossi', '1987-04-17');
$materia = new Materia('Matematica', $docente1);
$voto = new Voto(7, '2022-03-30', $materia);


/*
$docente2 = $voto->getMateria()->getDocente();

echo "nome docente1: " . $docente1->getNome() . PHP_EOL;
echo "nome docente2: " . $docente2->getNome() . PHP_EOL;

$docente1->setNome('Giuseppe');

echo "nome docente1: " . $docente1->getNome() . PHP_EOL;
echo "nome docente2: " . $docente2->getNome() . PHP_EOL;
*/
