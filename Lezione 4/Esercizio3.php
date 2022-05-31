<?php

// titolo esercizio: lista compleanni con stampa in JSON e rispettivi classi
$nome;
$data;

class Persona {
// variabili membro
    private $nome;
    private $dataDiNascita;
// funzioni
    public function getNome(){
        return $nome;
    }
    public function setNome($n){
        $this->nome = $n;
    }
    public function getData(){
        return $data;
    }
    public function setData($d){
        $this->data = $d;
    }
}
class AgendaCompleanni{
// variabili membro
    private $listaPersone;
// funzioni
    public function addPersona($persona){
        $this->listaPersone.array_push($persona);
    }
    public function deletePersona($persona){
        for($i=0; $i<count($this->listaPersone); $i++){
            if($persona == $this->listaPersone){
                unset($this->listaPersone[$i]);
            }
        }
    }
    public function prossimoCompleanno(){
        foreach ($persone as $persona) {
            $dataDiNascita = strtotime($persona['data_di_nascita']);
            $giornoNascita = intval(date('d', $dataDiNascita));
            $meseNascita = intval(date('m', $dataDiNascita));
            $annoNascita = intval(date('Y', $dataDiNascita));
            $annoCorrente = intval(date('Y'));
            
            $compleannoAnnoCorrente = mktime(0, 0, 0, $meseNascita, $giornoNascita, $annoCorrente);

            $compleannoAnnoProssimo = strtotime('+1 year', $compleannoAnnoCorrente);

            if ($compleannoAnnoCorrente < time()) {
                // la persona ha già compiuto gli anni quest'anno
                $prossimoCompleanno = $compleannoAnnoProssimo;
                $eta = $annoCorrente - $annoNascita + 1;
            }
            else{
                // la persona non ha ancora compiuto gli anni quest'anno
                $prossimoCompleanno = $compleannoAnnoCorrente;
                $eta = $annoCorrente - $annoNascita;
            }
            if ($prossimoCompleannoGlobale === null || $prossimoCompleanno < $prossimoCompleannoGlobale) {
                $prossimoCompleannoGlobale = $prossimoCompleanno;
                $prossimaPersonaGlobale = $persona['nome'];
                $prossimaEtaGlobale = $eta;
            }
        }
    }
}

?>