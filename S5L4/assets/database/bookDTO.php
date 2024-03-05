<?php 
// DTO --> Data Transfer Object

class bookDTO {
    private PDO $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function createBook(string $titolo, string $autore, int $annoPubblicazione) {
        try {
            $stmt = $this->conn->prepare("INSERT INTO books (titolo, autore, annoPubblicazione) VALUES (:titolo, :autore, :annoPubblicazione)");
        // Associa i valori ai parametri della query
        $stmt->bindParam(':titolo', $titolo);
        $stmt->bindParam(':autore', $autore);
        $stmt->bindParam(':annoPubblicazione', $annoPubblicazione);

        // Esegue la query
        $stmt->execute();

        return 'tutto andato a buon fine';
        } catch (PDOException $e){
            echo "Errore durante l'inserimento del libro: " . $e->getMessage();
        }
        
    }
    // operazione di lettura 
    public function readBook($bookId) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM books WHERE id = :id");
    
            // Associa il valore dell'ID del libro al parametro della query
            $stmt->bindParam(':id', $bookId);
    
            $stmt->execute();
            $book = $stmt->fetch(PDO::FETCH_ASSOC);
    
            // Ritorna l'array contenente le informazioni del libro
            return $book;
        } catch (PDOException $e) {
            echo "Errore durante la lettura del libro: " . $e->getMessage();
            return false;
        }
    }
    
}
