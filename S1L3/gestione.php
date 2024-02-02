
<?php 
    /* $headTable = array(
        "name" => "Nome",
        "surname" => "Cognome",
        "email" => "Email",
    ); */


    //Sessione 
    session_start();
    //controllo e registrazione
    if(isset($_POST["credenziali_email"]) && $_POST["credenziali_password"]) {
        $credenziali = array(
            "email" => $_POST["credenziali_email"],
            "password" => $_POST["credenziali_password"],
        );
    
        $_SESSION['credenziali'] = $credenziali;
    }

    if(isset($_POST["loginEmail"]) && $_POST["loginPassword"]) {
        $login = array(
            "email" => $_POST["loginEmail"],
            "password" => $_POST["loginPassword"],
        );
    
        $_SESSION['login'] = $login;
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Gestione del form</title>
</head>
<body>

    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand text-primary fw-bold" href="#">FORM</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    <!-- <a class="nav-link" href="register.php">Registrati</a>
                    <a class="nav-link" href="login.php">Accedi</a> -->
                    <?php
                       if(isset($_SESSION['credenziali'])) {
                        print_r("<a class='nav-link fw-bold'> Benvenuto! </a>");
                        print_r("<a class='nav-link text-danger fw-bold' href='register.php'> Esci </a>");
                       } else if (isset($_SESSION['login'])) {
                        print_r("<a class='nav-link fw-bold'> Bentornato! </a>");
                        print_r("<a class='nav-link text-danger fw-bold' href='login.php'> Esci </a>");
                       } else {
                        print_r("<a class='nav-link' href='register.php'>Registrati</a>");
                        print_r("<a class='nav-link' href='login.php'>Accedi</a>");
                       }
                    ?>
                </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="container mt-4">
            <h1>Gestione del form</h1>
            <?php
                if(isset($_SESSION['credenziali']) || isset($_SESSION['login']) ) {
                    print_r('<p>Questi sono la tua email e password: <?php print_r($_SESSION["credenziali"])?></p>');
                } else {
                    echo "Dai su! Accedi o registrati!";
                }
            ?>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>