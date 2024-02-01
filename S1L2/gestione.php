<!-- TRACCIA 2/2
    Prelevare i dati da 'index.php' e stamparli in questa pagina.
    Memorizzarli in una variabile di sessione per poter stampare in 'index.php'.
-->

<?php 
    $headTable = array(
        "name" => "Nome",
        "surname" => "Cognome",
        "email" => "Email",
    );

    if(isset($_POST["name"]) && $_POST["surname"] && $_POST["email"]) {
        /* var_dump($_POST); */
        $info = array(
            "name"=> $_POST["name"],
            "surname" => $_POST["surname"],
            "email"=> $_POST["email"],
        );
    }

    //Sessione 
    session_start();
    $_SESSION['userName'] = $info['name'];
    $_SESSION['userSurName'] = $info['surname'];
    $_SESSION['userEmail'] = $info['email'];
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
    
    <main>
        <div class="container mt-4">
            <h1>Gestione del form</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <?php foreach ($headTable as $value): ?>
                            <th scope="col"><?php echo $value; ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <?php foreach ($info as $value): ?>
                            <td><?php echo $value; ?></td>
                        <?php endforeach; ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>