<?php
if(isset($_GET["id"])) {
    $idToUpdate = $_GET['id'];

    require_once '../config/config.php';
    $mysqli = new mysqli($config['hostname'], $config['username'], $config['password'], "myDatabase");

    // Verifica la connessione al database
    if ($mysqli->connect_error) {
        die("Error connection to the database: " . $mysqli->connect_error);
    }

    // Update
    $sql = "UPDATE contacts 
            SET age=?, email=?, city=?, passW=? 
            WHERE id=?";
    
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("isssi", $_GET['age'], $_GET['email'], $_GET['city'], $_GET['password'], $idToUpdate);

    if ($stmt->execute()) {
        echo "Record updated successfully!";
    } else {
        echo "Error updating record: " . $stmt->error;
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
    <title>Contacts - update</title>
</head>
<body>
    <main>
        <div class="container mt-5">
            <h1 class="text-danger mb-2">Fill your contacts!</h1>
            <form method="GET" action="update.php" > 
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputAge" class="form-label">Age <span class="text-danger">*</span></label>
                    <input type="number" name="age" class="form-control" id="exampleInputAge" aria-describedby="exampleInputAge">
                </div>
                <div class="mb-3">
                    <label for="exampleInputCity" class="form-label">City <span class="text-danger">*</span></label>
                    <input type="text" name="city" class="form-control" id="exampleInputCity" aria-describedby="exampleInputCity">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password <span class="text-danger">*</span></label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-danger">Submit</button>
            </form>
            <a href="./insert.php" class="btn btn-danger mt-2 ms-3">Torna indietro</a>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>