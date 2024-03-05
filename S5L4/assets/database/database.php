<?php 

// usiamo il pattern con la classe Singleton PDO
namespace Database {

    // la classe PDO -> php data object
    class DB_PDO {
        // variabile di connessione di tipo PDO 
        private \PDO $conn;
        private DB_PDO $instance; //istanza 

        // rendendolo privato, posso istanzare degli oggetti passando solo da getInstance
        private function __construct(array $config) {
            $this->conn = new \PDO($config['dsn'], $config['user'], $config['password']); // ho scritto \PDO perché mi riferisco all'oggetto PDO globale e non quello del namespace Database
        }

        // implementa il pattern Singleton per evitare ridondanza e stabilire continue connessioni col DB
        public static function getInstance(array $config) {
            if(!static::$instance) { // il metodo controlla se un'istanza è già stata creata
                static::$instance = new DB_PDO($config); // se no, viene creata 
            }
            return static::$instance; // altrimenti ritorna l'istanza già presente
        }
        // in questo modo, l'istanza verrà sempre richiamata quando viene richiamato il metodo getInstance


        // è necessario utilizzare una funzione (pubblica) per prelevare la connessione in quanto dichiarata privata
        // in questo modo, la variabile è protetta, non può essere modificata, ma può essere letta
        public function getConnection() {
            return $this->conn;
        }
    }
}