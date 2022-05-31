<?php

abstract class Persona
{
    private string $nome;
    private string $cognome;
    private string $dataDiNascita;

    public function __construct(string $nome, string $cognome, string $dataDiNascita) {
        $this->setNome($nome);
        $this->setCognome($cognome);
        $this->setDataDiNascita($dataDiNascita);
    }

    public function __tostring(): string {
        $message = '=== Oggetto Persona === ' . PHP_EOL;
        $message .= 'nome: ' . $this->getNome() . PHP_EOL;
        $message .= 'cognome: ' . $this->getCognome() . PHP_EOL;
        $message .= 'data di nascita: ' . $this->getDataDiNascita() . PHP_EOL;
        return $message;
    }

    public function setNome(string $nome) {
        $this->nome = $nome;
    }

    public function setCognome(string $cognome) {
        $this->cognome = $cognome;
    }

    public function setDataDiNascita(string $dataDiNascita) {
        // TODO: validazione data di nascita
        $this->dataDiNascita = $dataDiNascita;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getCognome(): string {
        return $this->cognome;
    }

    public function getDataDiNascita(): string {
        return $this->dataDiNascita;
    }

    public function getNomeCognome(): string {
        return $this->getNome() . ' ' . $this->getCognome();
    }

    public function getConomeNome(): string {
        return $this->getCognome() . ' ' . $this->getNome();
    }
}
