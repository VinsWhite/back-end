<?php

namespace Space {

    // classe che si occupa di generare il button del form 
    class ButtonGenerator {
        public $type;
        public $class;
        public $id;
        
        // funzione magica (costruttore)
        function __construct($type, $class, $id) {
            $this->type = $type;
            $this->class = $class;
            $this->id = $id;
        }

        function buttonField() {
            return "<button type='$this->type' class='$this->class'>Invio</button>";
        }
    }

    // classe che si occupa di generare gli input del form
    class FormInputGenerator extends ButtonGenerator { // estendiamo la classe ButtonGenerator (che ha gli stessi attributi, eccetto per 2 in più)
        public $placeholder;
        public $name;

        // funzione magica (costruttore)
        function __construct($type, $class, $id, $placeholder, $name) {
            parent::__construct($type, $class, $id); // prelevo i dati dalla classe genitore
            $this->placeholder = $placeholder;
            $this->name = $name;
        }

        // input email
        function inputEmailField() {
            return "<input type='$this->type' class='$this->class' id='$this->id' name='$this->name' placeholder='$this->placeholder'";
        }

        // input password
        function inputPasswordField() {
            return "<input type='$this->type' class='$this->class' id='$this->id' name='$this->name' placeholder='$this->placeholder'>";
        }

        // input name
        function inputNameField() {
            return "<input type='$this->type' class='$this->class' id='$this->id' name='$this->name' placeholder='$this->placeholder'";
        }

        // input lastname
        function inputLastnameField() {
            return "<input type='$this->type' class='$this->class' id='$this->id' name='$this->name' placeholder='$this->placeholder'";
        }
    }
}

