<?php 

    // nome del database
    $database = "news_DB";

    // configurazione
    $config = [
        'mysql_host' => 'localhost',
        'mysql_user' => 'root',
        'mysql_password' => '',
    ];

    $mysqli = new mysqli(
        $config['mysql_host'],
        $config['mysql_user'],
        $config['mysql_password'],
    );

    // controllo degli errori
    if($mysqli->connect_error) { die($mysqli->connect_error); } 

    // creazione del database
    $sql = "CREATE DATABASE IF NOT EXISTS " . $database;
    if(!$mysqli->query($sql)) { die($mysqli->error); } 

    // selezione del database da utilizzare 
    $sql = 'USE news_DB;';
    $mysqli->query($sql);

    // creo la tabella user per immagazinare l'accesso dell'utente 
    $sql1 = "CREATE TABLE IF NOT EXISTS user (
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        username VARCHAR(50) NOT NULL UNIQUE, 
        email VARCHAR(255) NOT NULL UNIQUE, 
        passW VARCHAR(50) NOT NULL
    )";

    // creo la tabella news
    $sql2 = "CREATE TABLE IF NOT EXISTS news (
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        title VARCHAR(50) NOT NULL,
        descrip TEXT NOT NULL,
        category VARCHAR(50) NOT NULL
    )";

    $queries = [$sql1, $sql2]; 
    $errors = []; 

    /* foreach($queries as $k => $sql){
        $query = $mysqli->query($sql);

        if(!$query)
        $errors[] = "Table $k : Creation failed ($mysqli->error)";
        else
        $errors[] = "Table $k : Creation done";
    } */

    /* foreach($errors as $error) {
        echo $error . "<br>";
    } */

    // Inserimento di 3 notizie 
    $news_insert_queries = [
        "INSERT INTO news (title, descrip, category) VALUES ('Nuova versione di PHP rilasciata', 'È stata rilasciata la nuova versione di PHP con miglioramenti significativi nelle prestazioni e nuove funzionalità.', 'Development')",
        "INSERT INTO news (title, descrip, category) VALUES ('Aggiornamenti su JavaScript Frameworks', 'Le ultime novità sui principali framework JavaScript e le tendenze nel mondo dello sviluppo web.', 'Development')",
        "INSERT INTO news (title, descrip, category) VALUES ('Sviluppo di applicazioni mobile', 'Nuovi strumenti e best practice per lo sviluppo di app mobile multi-piattaforma.', 'Development')"
    ];

    /* foreach($news_insert_queries as $query) {
        if(!$mysqli->query($query)) {
            $errors[] = "News insertion failed: " . $mysqli->error;
        } else {
            $errors[] = "News insertion successful";
        }
    } */

    /* foreach($errors as $error) {
        echo $error . "<br>";
    } */

    // Aggiunta delle colonne per le traduzioni in inglese
    $sql = "ALTER TABLE news 
        ADD COLUMN title_en VARCHAR(255),
        ADD COLUMN descrip_en TEXT";

    // Esecuzione della query per aggiungere le colonne
    if(!$mysqli->query($sql)) { die($mysqli->error); } 

    $news_insert_queries = [
        "INSERT INTO news (title_en, descrip_en) VALUES ('New PHP Version Released', 'A new version of PHP has been released with significant performance improvements and new features.')",
        "INSERT INTO news (title_en, descrip_en) VALUES ('Updates on JavaScript Frameworks', 'The latest updates on major JavaScript frameworks and trends in the world of web development.')",
        "INSERT INTO news (title_en, descrip_en) VALUES ('Mobile App Development', 'New tools and best practices for developing cross-platform mobile apps.')"
    ];

?>
