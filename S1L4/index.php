<?php 

    include_once('partials/header.php');
    require_once './config/config.php';

    session_start();
    //Se sono presenti dei dati nella sessione, distruggi la sessione
    if(isset($_SESSION["email"]) && isset($_SESSION['password'])) {
        session_destroy();
    }

    $mysqli = new mysqli(
        $config['hostname'],
        $config['username'],
        $config['password']);

    if($mysqli->connect_error) { die($mysqli->connect_error); } 

    //CREAZIONE DEL DATABASE
    $sql = 'CREATE DATABASE IF NOT EXISTS myDatabase;';
    if(!$mysqli->query($sql)) { die($mysqli->connect_error); }

    //Utilizzo il mio database
    $sql = 'USE myDatabase;';
    $mysqli->query($sql);

    //Creo la tabella per inserire i dati dell'utente
    $sql = 'CREATE TABLE IF NOT EXISTS contacts (
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        age INT UNSIGNED NOT NULL, 
        city VARCHAR(255) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        passW TEXT NOT NULL
    )';

    if(!$mysqli->query($sql)) { die($mysqli->connect_error); }

?>
 
    <main>
        <div class="container mt-5">
            <h1 class="text-danger mb-2">Register!</h1>
            <form method="POST" action="./crud/insert.php" enctype="multipart/form-data"> <!-- indirizziamo i dati nella stessa pagina -->
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
                <div class="d-flex justify-content-between align-items-center">
                    <button type="submit" class="btn btn-danger">Register now</button>
                    <a href="./crud/insert.php" class="btn btn-warning mt-2 ms-3">Continue without login</a>
                </div>
                <p class="mt-4">Already have an account? <a href="login.php">Sign in!</a></p>
            </form>
        </div>
    </main>

<?php include_once('partials/footer.php') ?>