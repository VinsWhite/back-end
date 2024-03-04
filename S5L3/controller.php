<?php 

    require_once('config.php');

    $mysqli = new mysqli(
        $config['hostname'],
        $config['username'],
        $config['password']);

    if($mysqli->connect_error) { die($mysqli->connect_error); } 

    // CREAZIONE DEL DATABASE
    $sql = "CREATE DATABASE IF NOT EXISTS classiPHP";
    if(!$mysqli->query($sql)) { die($mysqli->connect_error); }

    // Utilizzo il mio database
    $sql = 'USE classiPHP;';
    $mysqli->query($sql);

    // Creazione della tabella user
    $sql = 'CREATE TABLE IF NOT EXISTS user (
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        email VARCHAR(255) NOT NULL,
        nam VARCHAR(50) NOT NULL,
        lastname VARCHAR(50) NOT NULL,
        passW VARCHAR(20) NOT NULL
    )';
    
    if(!$mysqli->query($sql)) { die($mysqli->connect_error); }

?>