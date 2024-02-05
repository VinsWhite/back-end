<?php
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Contacts - delete</title>
</head>
<body>
    <main>
        <a href="./insert.php" class="btn btn-danger mt-2 ms-3">Torna indietro</a>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>