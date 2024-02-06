<?php 
    include_once('partials/header.php');

    if(isset($_POST['email']) && isset($_POST['password'])){

        require_once('./config/config.php');
        $mysqli = new mysqli($config['hostname'], $config['username'], $config['password'], "myDatabase");

        // Verifica la connessione al database
        if ($mysqli->connect_error) {
            die("Error connection to the database: " . $mysqli->connect_error);
        }

        $email = $mysqli->real_escape_string($_POST['email']);
        $password = $mysqli->real_escape_string($_POST['password']);

        // Query per verificare le credenziali
        $sql = "SELECT * FROM contacts WHERE email = '$email' AND passW = '$password'";
        $result = $mysqli->query($sql);

        // Verifica se sono presenti righe corrispondenti
        if ($result && $result->num_rows > 0) {
            
            session_start();
            $_SESSION["email"] = $email;
            $_SESSION["password"] = $password;

            header("Location: ./crud/insert.php");
            exit(); 
        } else {
            echo '<script>alert("Login invalid. Try again.");</script>';
        }
    }

?>

    <main>
        <div class="container mt-5">
            <h1 class="text-danger mb-2">Login!</h1>
            <form method="POST" action="login.php" enctype="multipart/form-data"> 
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password <span class="text-danger">*</span></label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <button type="submit" class="btn btn-danger">Login in now</button>
                    <a href="./crud/insert.php" class="btn btn-warning mt-2 ms-3">Continue without login</a>
                </div>
                <p class="mt-4">New customers? <a href="index.php">Register now!</a></p>
            </form>
        </div>
    </main>

<?php include_once('partials/footer.php') ?>