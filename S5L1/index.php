<!-- In questo esercizio preleviamo i dati da un form e li inseriamo all'interno di un database.
Al click di un secondo pulsante, viene creato un file csv (lezione del giorno).
Attravverso i commenti ho spiegato alcuni passaggi e ho scritto alcuni concetti chiavi per ripassare scrivendo. -->

<?php 
    require_once 'config.php';

    $mysqli = new mysqli(
        $config['mysql_host'],
        $config['mysql_user'],
        $config['mysql_password']);
        
        // controllo connessione
        if($mysqli->connect_error) { die($mysqli->connect_error); } 

        // creo il mio DB
        $sql = 'CREATE DATABASE IF NOT EXISTS dbcsv;';
        if(!$mysqli->query($sql)) { die($mysqli->connect_error); }

        // Seleziono il DB per poter manipolare i dati (DDL - data manipulation language)
        $sql = 'USE dbcsv;';
        $mysqli->query($sql);

        // Creo la tabella
        $sql = 'CREATE TABLE IF NOT EXISTS user ( 
            id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            name VARCHAR(255) NOT NULL, 
            surname INT UNSIGNED NOT NULL, 
            email VARCHAR(100) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL 
        )';
        if(!$mysqli->query($sql)) { die($mysqli->connect_error); }

        if(isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['password'])) {
            $user = [
                'name'=> $_POST['name'],
                'surname' => $_POST['surname'],
                'email'=> $_POST['email'],
                'password'=> $_POST['password'],
            ];
        }
        
        
        /* // inserimento dei dati
        $sql = "INSERT INTO user (name, surname, email, password) VALUES (?, ?, ?, ?)";
        
        // esecuzione con lo statement
        $stmt = $mysqli->prepare($sql);
        
        // ricorda: ssss sta per: string, string, string, string
        $stmt->bind_param("ssss", $user['name'], $user['surname'], $user['email'], $user['password']);
        
        if($stmt->execute()) {
            echo "Dati inseriti con successo nel database.";
        } else {
            echo "Si è verificato un errore durante l'inserimento dei dati nel database.";
        }

        // Chiudi lo statement
        $stmt->close(); */

        $folderPath = 'files';

        // Verifica se la cartella esiste, altrimenti creala
        if (!is_dir($folderPath)) {
            if (!mkdir($folderPath, 0755, true)) {
                die('Impossibile creare la cartella');
            }
        }

        // Percorso del file CSV all'interno della cartella
        $csvFilePath = $folderPath . '/lezione_del_giorno.csv';

        // Creazione del file CSV e scrittura dell'intestazione se il file non esiste già
        if (!file_exists($csvFilePath)) {
            $csvHeader = [$user['name'], $user['surname'], $user['email'], $user['password']];
            $fp = fopen($csvFilePath, 'w');
            if ($fp === false) {
                die('Impossibile creare il file CSV');
            }
            fputcsv($fp, $csvHeader);
            fclose($fp);
            echo "File CSV creato con successo.";
        }
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Database con file CSV</title>
</head>
<body>

    <!-- sezione principale della pagina -->
    <main class="container mt-5">
        <h1 class="text-primary">Inserisci i dati del Form!</h1>
        <p class="text-secondary opacity-75">I dati inseriti verranno inseriti in un database, poi in un file CSV</p>
        <form action="index.php" method="post">
            <div class="mb-3">
                <label for="exampleInputName1" class="form-label">Name <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control" id="exampleInputName1">
            </div>
            <div class="mb-3">
                <label for="exampleInputSurname1" class="form-label">Surname <span class="text-danger">*</span></label>
                <input type="text" name="surname" class="form-control" id="exampleInputSurname1">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address <span class="text-danger">*</span></label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password <span class="text-danger">*</span></label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </main>


    <!-- script di bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>