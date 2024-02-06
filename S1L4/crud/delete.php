<?php
    include_once('../partials/header.php');
    if(isset($_GET["id"])) {
        $idToDelete = $_GET['id'];

        require_once '../config/config.php';
        $mysqli = new mysqli($config['hostname'], $config['username'], $config['password'], "myDatabase");

        // Verifica la connessione al database
        if ($mysqli->connect_error) {
            die("Error connection to the database: " . $mysqli->connect_error);
        }

        // Delete
        $sql = "DELETE FROM contacts WHERE id = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("i", $idToDelete);
        if ($stmt->execute()) {
            echo "Record deleted successfully!";
        } else {
            echo "Error deleting record: " . $stmt->error;
        }
    
        $stmt->close();
        $mysqli->close();
    }
?>

    <main>
        <a href="./insert.php" class="btn btn-danger mt-2 ms-3">Go back</a>
    </main>

<?php include_once('../partials/footer.php') ?>