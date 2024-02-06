<?php 

    include_once('partials/header.php');

    session_start();

    $mysqli = new mysqli(
        $config['hostname'],
        $config['username'],
        $config['password']);

    if($mysqli->connect_error) { die($mysqli->connect_error); } 

    //Creo la tabella per inserire un post
    $sql = 'CREATE TABLE IF NOT EXISTS posts (
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        title VARCHAR(255) NOT NULL,
        descrip TEXT NOT NULL,
    )';

    //DA CONTINUARE... bisogna inserire il post nel database
?>

<main>
        <div class="container mt-5">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    // Connessione al database
                    require_once 'config/config.php';
                    $mysqli = new mysqli($config['hostname'], $config['username'], $config['password'], "myDatabase");

                    // Verifica la connessione al database
                    if ($mysqli->connect_error) {
                        die("Error connection to the database: " . $mysqli->connect_error);
                    }

                    // Query per recuperare i dati dalla tabella "contacts"
                    $result = $mysqli->query("SELECT * FROM contacts");

                    // Itera attraverso i risultati e stampa ogni riga nella tabella HTML
                    /* while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<th scope='row'>" . $row['id'] . "</th>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['age'] . "</td>";
                        echo "<td>" . $row['city'] . "</td>";
                        echo "<td><a href='delete.php?id=" . $row['id'] . "'><i class='bi bi-trash'></i></a> <a href='update.php?id=" . $row['id'] . "'><i class='bi bi-pencil-square'></i></a></td>";
                        echo "</tr>";
                    }  */
                    
                    if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
                        echo "<tr>";
                        echo "<th scope='row'>" . $_SESSION['email'] . "</th>";
                        echo "<th scope='row'>" . $_SESSION['password'] . "</th>";
                        echo "<td><a href='#'><i class='bi bi-pencil-square'></i></a></td>";
                        echo "</tr>";
                    }

                    // Chiusura della connessione
                    $mysqli->close();
                    ?>
                </tbody>
            </table>
            <a href='./crud/insert.php' class='btn btn-danger mt-2 ms-3'>Go back</a>
            <h3 class="text-primary mt-5">Create a post here</h3>
            <form method="POST" action="profile.php" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleTitle" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" id="exampleTitle" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleDescription" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="exampleDescription" style="resize: none;"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </main>

<?php include_once('./partials/header.php'); ?>