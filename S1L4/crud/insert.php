<?php

    include_once('../partials/header.php');

    session_start();

    //INSERIMENTO DATI IN TABELLA
    if (isset($_POST['email']) && isset($_POST['age']) && isset($_POST['city']) && isset($_POST['password'])) {
        $infoUser = [
            'email' => $_POST['email'],
            'age' => $_POST['age'],
            'city' => $_POST['city'],
            'password' => $_POST['password'],
        ];

        require_once '../config/config.php';

        $mysqli = new mysqli($config['hostname'], $config['username'], $config['password'], "myDatabase");

        // Verifica la connessione al database
        if ($mysqli->connect_error) {
            die("Error connection to the database: " . $mysqli->connect_error);
        }

        // Preparazione della query SQL con i dati ottenuti dalla richiesta POST
        $sql = "INSERT INTO contacts (email, age, city, passW) VALUES (?, ?, ?, ?)";
        

        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("siss", $infoUser['email'], $infoUser['age'], $infoUser['city'], $infoUser['password']);

        // Eseguiamo la query
        if ($stmt->execute()) {
            echo "Registration completed successfuly! You can login now!";
        } else {
            echo "Error when inserting data: " . $stmt->error;
        }

        // Chiusura della connessione e dell'istruzione
        $stmt->close();
        $mysqli->close();
    }
?>

    <main>
        <div class="container mt-5">
            <?php 
                if(isset($_SESSION["email"]) && isset($_SESSION['password'])) {
                    echo "<a href='../profile.php' class='btn btn-secondary'>Profile</a>";
                }
            ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Email</th>
                        <th scope="col">Age</th>
                        <th scope="col">City</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    // Connessione al database
                    require_once '../config/config.php';
                    $mysqli = new mysqli($config['hostname'], $config['username'], $config['password'], "myDatabase");

                    // Verifica la connessione al database
                    if ($mysqli->connect_error) {
                        die("Error connection to the database: " . $mysqli->connect_error);
                    }

                    // Query per recuperare i dati dalla tabella "contacts"
                    $result = $mysqli->query("SELECT * FROM contacts");

                    // Itera attraverso i risultati e stampa ogni riga nella tabella HTML
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<th scope='row'>" . $row['id'] . "</th>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['age'] . "</td>";
                        echo "<td>" . $row['city'] . "</td>";
                        echo "<td><a href='delete.php?id=" . $row['id'] . "'><i class='bi bi-trash'></i></a> <a href='update.php?id=" . $row['id'] . "'><i class='bi bi-pencil-square'></i></a></td>";
                        echo "</tr>";
                    } 

                    // Chiusura della connessione
                    $mysqli->close();
                    ?>
                </tbody>
            </table>
            <?php 
                if(isset($_SESSION["email"]) && isset($_SESSION['password'])) {
                    echo "<a href='../index.php' class='btn btn-danger mt-2 ms-3'>Log Out</a>";
                } else {
                    echo "<a href='../index.php' class='btn btn-danger mt-2 ms-3'>Go back</a>";
                }
            ?>
        </div>
    </main>

<?php include_once('../partials/footer.php') ?>