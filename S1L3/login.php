<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Accedi!</title>
</head>
<body>

    <div class="container" style="margin-top: 10em">

        <head>
            <h1 class="text-danger">Accedi all'area riservata!</h1>
        </head>

        <main>
            <form method="POST" action="gestione.php" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleInputEmail2" class="form-label">Email address</label>
                    <input type="email" name="loginEmail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword2" class="form-label">Password</label>
                    <input type="password" name="loginPassword" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="d-flex flex-column">
                    <button type="submit"  class="btn btn-warning">Accedi!</button>
                    <a href="register.php">Oppure registrati se non lo hai ancora fatto</a>
                </div>    
            </form>
        </main> 
    
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>