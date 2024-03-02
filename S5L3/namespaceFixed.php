<?php 

// Namespace per generare il Form
namespace FormGenerator {

    class DivGenerator {
        private $class; // Attributo privato (lo userò solo all'interno della classe)

        function __construct($class) {
            $this->class = $class;
        }

        function startDiv() {
            return "<div class='$this->class'>";
        }

        function endDiv() {
            return "</div>";
        }
    }

    class LabelGenerator {
        private $class; // Attributi privati (li userò solo all'interno della classe)
        private $text;

        function __construct($class, $text) {
            $this->class = $class;
            $this->text = $text;
        }

        function getLabel(){
            return "<label class='$this->class'>$this->text</label>";
        }

    }

    class InputGenerator {
        private $type; // Attributi privati (li userò solo all'interno della classe)
        private $class;
        private $name;

        function __construct($type, $class, $name) {
            $this->type = $type;
            $this->class = $class;
            $this->name = $name;
        }

        function getInput() {
            return "<input type='$this->type' class='$this->class' name='$this->name'>";
        }

    }

    class ButtonGenerator {
        private $type;
        private $class;
        private $text;

        function __construct($type, $class, $text) {
            $this->type = $type;
            $this->class = $class;
            $this->text = $text;
        }

        function getButton() {
            return "<button type='$this->type' class='$this->class'>$this->text</button>";
        }

    }


    // ERRORI CHE AVEVO COMMESSO: avevo esteso classi in modo sbagliato (funzionava, ma non era logico)
    // Avevo reso pubblichi gli attributi. Non ha senso perché devo usarli solo all'interno delle classi

}