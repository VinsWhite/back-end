<?php
    require_once 'assets/classes/libreria.php';
    require_once 'assets/database/database.php';
    $config = require_once('assets/database/config.php');

    use Database\DB_PDO as DB;

     // Il metodo getInstance della classe Singleton ritorna una istanza
    // se è già presente altrimenti la crea e la ritorna
    $PDOConn = DB::getInstance($config); 
    $conn = $PDOConn->getConnection();

    use Libreria\Libro;
    use Libreria\DVD;

    $libro = new Libro('Harry Potter e il principe mezzosangue', '2005', 'J.K. Rowling');
    $dvd = new DVD('Harry Potter e il principe mezzosangue', '2008', 'David Yates');
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/custom-style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="icon" href="assets/img/library.jpg">
    <title>BookHaven</title>
</head>
<body>

    <!-- Libreria costruita con le classi di PHP -->
    

    <header>
        <nav class="navbar navbar-expand-lg bg-danger">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold text-light fs-3" href="index.php">BOOK HAVEN <i class="bi bi-book ps-1"></i></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link active text-light" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-light" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-light" href="#">Pricing</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container">

        <h1 class="fw-semibold mt-3">Benvenuto in Book Haven!</h1>

        <section>
            <h3 class="mt-5 pt-3 border-top ">Libri Harry Potter</h3>
            <table class="table mt-4 border border-secondary">
                <thead>
                    <tr class="border-2 border-dark">
                        <th scope="col">Titolo</th>
                        <th scope="col">Autore</th>
                        <th scope="col">Anno Pubblicazione</th>
                        <th scope="col-2">| Azioni disponibili</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $libro->titolo; ?></td>
                        <td><?php echo $libro->autore; ?></td>
                        <td><?php echo $libro->annoPubblicazione; ?></td>
                        <td class="bg-lightbrown border border-dark text-light text-center fw-semibold hoverTD">Prendi in prestito</td>
                        <td class="bg-lightbrown border border-dark text-light text-center fw-semibold hoverTD">Restituisci</td>
                    </tr>
                </tbody>
            </table>
        </section>

        <h3 class="mt-5 pt-3 border-top ">DVD Harry Potter</h3>
            <table class="table mt-2 border border-secondary">
                <thead>
                    <tr class="border-2 border-dark">
                        <th scope="col">Titolo</th>
                        <th scope="col">Autore</th>
                        <th scope="col">Anno Pubblicazione</th>
                        <th scope="col-2">| Azioni disponibili</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $dvd->titolo; ?></td>
                        <td><?php echo $dvd->regista; ?></td>
                        <td><?php echo $dvd->annoPubblicazione; ?></td>
                        <td class="bg-lightbrown border border-dark text-light text-center fw-semibold hoverTD">Prendi in prestito</td>
                        <td class="bg-lightbrown border border-dark text-light text-center fw-semibold hoverTD">Restituisci</td>
                    </tr>
                </tbody>
            </table>
        </section>

        <p class="text-secondary">Totale materiali attualmente disponibili: <?php echo $libro->contaLibri(); ?></p>
               
        <h4>Azioni eseguite:</h4>
        <p class="text-secondary">Libro prestato! Quantità disponibile: <?php $libro->presta(); echo $libro->contaLibri(); ?></p>
        <p class="text-secondary">DVD prestato! Quantità disponibile: <?php $dvd->presta(); echo $dvd->contaDVD(); ?></p>
        <p class="text-secondary">Libro prestato! Quantità disponibile: <?php $libro->presta(); echo $libro->contaLibri(); ?></p>
        <p class="text-secondary">Libro restituito! Quantità disponibile: <?php $libro->restituisci(); echo $libro->contaLibri(); ?></p>
    </main>

    <footer class="bg-dark">
        <p class="text-light py-3 pe-4 text-end mb-0">&copy; Vincenzo Saccone <?php echo date('Y');?></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>