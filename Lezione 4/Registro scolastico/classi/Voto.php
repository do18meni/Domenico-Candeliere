<?php

class Voto
{
    private float $voto;
    private string $data;
    private Materia $materia;

    public function __construct(float $voto, string $data, Materia $materia) {
        $this->setVoto($voto);
        $this->setData($data);
        $this->setMateria($materia);
    }

    public function __tostring(): string {
        $message = '=== Oggetto Voto === ' . PHP_EOL;
        $message .= 'voto: ' . $this->getVoto() . PHP_EOL;
        $message .= 'data: ' . $this->getData() . PHP_EOL;
        $message .= 'materia: ' . $this->materia->getNome() . PHP_EOL;
        return $message;
    }

    public function setVoto(float $voto) {
        if ($voto < 1 || $voto > 10) {
            throw new Exception('Il voto deve essere compreso tra 1 e 10');
        }

        $this->voto = $voto;
    }

    public function setData(string $data) {
        $this->data = $data;
    }

    public function setMateria(Materia $materia) {
        $this->materia = $materia;
    }

    public function getVoto(): float {
        return $this->voto;
    }

    public function getData(): string {
        return $this->data;
    }

    public function getMateria(): Materia {
        return $this->materia;
    }
}
