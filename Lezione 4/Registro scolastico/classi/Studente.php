<?php

class Studente extends Persona
{
    private array $voti = [];

    public function aggiungiVoto(Voto $voto) {
        $this->voti[] = $voto;
    }

    public function getVoti() {
        return $this->voti;
    }

    public function getMedia(): float {
        $conteggioVoti = count($this->voti);
        $sommaVoti = 0;

        foreach ($this->voti as $voto) {
            $sommaVoti += $voto->getVoto();
        }

        return $sommaVoti / $conteggioVoti;
    }
}
