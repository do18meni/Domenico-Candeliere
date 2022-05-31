<?php

class Materia
{
    private string $nome;
    private Docente $docente;

    public function __construct(string $nome, Docente $docente) {
        $this->setNome($nome);
        $this->setDocente($docente);
    }

    public function __tostring(): string {
        $message = '=== Oggetto Materia === ' . PHP_EOL;
        $message .= 'nome: ' . $this->getNome() . PHP_EOL;
        $message .= 'nome docente: ' . $this->docente->getNomeCognome() . PHP_EOL;
        return $message;
    }

    public function setNome(string $nome) {
        $this->nome = $nome;
    }

    public function setDocente(Docente $docente) {
        $this->docente = $docente;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getDocente() {
        return $this->docente;
    }
}
