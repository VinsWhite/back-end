<?php

namespace Libreria {

    interface Prestito {
        public function presta(); // i metodi definiti nell'interfaccia devono essere pubblici 
        public function restituisci();
    }

    abstract class MaterialeBibliografico implements Prestito {
        protected static $contatoreMateriali = 20;
        public $titolo;
        public $annoPubblicazione;

        function __construct($titolo, $annoPubblicazione) {
            $this->titolo = $titolo;
            $this->annoPubblicazione = $annoPubblicazione;
        }

        public function presta() {
            return static::$contatoreMateriali--;
        } 

        public function restituisci() {
            return static::$contatoreMateriali++;
        }
    }

    // sottoclasse di MaterialeBibliografico
    class Libro extends MaterialeBibliografico {
        public $autore; 

        function __construct($titolo, $annoPubblicazione, $autore) {
            parent::__construct($titolo, $annoPubblicazione);
            $this->autore = $autore;
        }

        static function contaLibri() {
            return static::$contatoreMateriali;
        }
    }

    // sottoclasse di MaterialeBibliografico
    class DVD extends MaterialeBibliografico {
        public $regista; 

        function __construct($titolo, $annoPubblicazione, $regista) {
            parent::__construct($titolo, $annoPubblicazione);
            $this->regista = $regista;
        }

        static function contaDVD() {
            return static::$contatoreMateriali;
        }
    }
}
