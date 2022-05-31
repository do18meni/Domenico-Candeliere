<?php

class Registro
{
    private array $studenti = [];
    private array $materie = [];
    private array $docenti = [];

    public function aggiungiStudente(Studente $studente) {
        $this->studenti[] = $studente;
    }

    public function aggiungiMateria(Materia $materia) {
        $this->materie[] = $materia;
    }

    public function aggiungiDocente(Docente $docente) {
        $this->docenti[] = $docente;
    }

    public function getElencoVotiMateria(Materia $materia) {
        $voti = [];

        foreach ($this->studenti as $studente) {
            foreach ($studente->getVoti() as $voto) {
                if ($voto->getMateria() === $materia) {
                    $voti[] = $voto;
                }
            }
        }

        return static::formattaVoti($voti);
    }

    public function getElencoVotiStudente(Studente $studente) {
        return static::formattaVoti($studente->getVoti());
    }

    public function getElencoStudenti(bool $ordinaPerMedia = false) {
        $studenti = $this->studenti;

        usort($studenti, function (Studente $stud1, Studente $stud2) use ($ordinaPerMedia) {
            if ($ordinaPerMedia) {
                return $stud2->getMedia() - $stud1->getMedia();
            } else {
                return strcmp($stud1->getCognome(), $stud2->getCognome());
            }
        });

        return static::formattaStudenti($studenti);
    }

    private static function formattaVoti(array $voti): string {
        $risposta = 'Elenco voti:' . PHP_EOL;
        $sommaVoti = 0;

        foreach ($voti as $voto) {
            $risposta .= ' - ' . $voto->getVoto() . ', ' . $voto->getData() . ', ' . $voto->getMateria()->getNome() . PHP_EOL;
            $sommaVoti += $voto->getVoto();
        }

        $mediaVoti = $sommaVoti / count($voti);
        $risposta .= PHP_EOL . 'Media voti: ' . round($mediaVoti, 2);

        return $risposta;
    }

    private static function formattaStudenti(array $studenti) {
        $risposta = 'Elenco studenti:' . PHP_EOL;

        foreach ($studenti as $studente) {
            $risposta .= $studente->getConomeNome() . ', media: ' . $studente->getMedia() . PHP_EOL;
        }

        return $risposta;
    }
}
