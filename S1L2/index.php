<!-- TRACCIA 1/2 (diversa rispetto a quella del portale) 
    Passare i dati con un form alla pagina 'gestione.php'
--> 

<?php
    session_start();

    $headTable = array(
        "name" => "Nome",
        "surname" => "Cognome",
        "email" => "Email",
    );

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Validazione form</title>
</head>
<body>
    
    <main>
        <div class="container mt-4">
            <h1 class="text-center text-primary">Validazione di un form</h1>
            <form method="POST" action="gestione.php" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputName1" class="form-label">Nome <span class="text-danger">*</span></label>
                    <input type="name" name="name" class="form-control" id="exampleInputName1" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputSurName1" class="form-label">Cognome <span class="text-danger">*</span></label>
                    <input type="surname" name="surname" class="form-control" id="exampleInputSurName1" required>
                </div>
                <!-- <div class="mb-3">
                    <label for="exampleInputImg1" class="form-label">Inserisci la tua immagine</label>
                    <input type="file" name="mioFile" class="form-control" id="exampleInputImg1">
                </div> -->
                <button type="submit" class="btn btn-danger">Invia</button>
            </form>

            <section class="mt-5">
                <h2>Dati prelevati dalla Sessione</h2>
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
                            <?php if (isset($_SESSION["userName"])) : 
                                '<td>' . print_r($_SESSION["userName"]) . '</td>';
                                else:
                                    print '<td>' . "Nessun dato inserito" . '</td>';
                            endif; ?>

                            <?php if (isset($_SESSION["userSurName"])) : 
                                '<td>' . print_r($_SESSION["userSurName"]) . '</td>';
                                else:
                                    print '<td>' . "Nessun dato inserito" . '</td>';
                            endif; ?>

                            <?php if (isset($_SESSION["userEmail"])) : 
                                '<td>' . print_r($_SESSION["userEmail"]) . '</td>';
                                else:
                                    print '<td>' . "Nessun dato inserito" . '</td>';
                            endif; ?>
                        </tr>
                    </tbody>
                </table>
            </section>

        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>