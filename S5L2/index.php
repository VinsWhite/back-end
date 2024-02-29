<?php 
    require_once 'db.php';

    // Funzione per impostare la lingua nei cookie
    function setLanguageCookie($language) {
        setcookie('lang', $language, time() + (86400 * 30), '/'); // Cookie valido per 30 giorni
    }

    // Funzione per ottenere la lingua corrente dai cookie
    function getCurrentLanguage() {
        return isset($_COOKIE['lang']) ? $_COOKIE['lang'] : 'it'; // Lingua predefinita: italiano
    }

    // Controllo se è stata selezionata una lingua diversa e imposto il cookie
    if(isset($_GET['language'])) {
        $selected_language = $_GET['language'];
        if($selected_language === 'it' || $selected_language === 'en') {
            setLanguageCookie($selected_language);
            // Reindirizza l'utente alla stessa pagina senza il parametro della lingua
            header('Location: ' . strtok($_SERVER["REQUEST_URI"],'?'));
            exit();
        }
    }

    $current_language = getCurrentLanguage();

    // Ottenere le traduzioni in base alla lingua corrente
    $translations = [];
    if($current_language === 'en') {
        $translations = [
            'home' => 'Home',
            'logout' => 'Logout',
            'esplora' => 'Explore the latest trends and developments in the world of programming',
            'paragraph_hero' => 'Step into our universe of 0s and 1s, where every line of code is a story and every update is an exciting adventure into the future of technology.'
        ];
    } else {
        // Seleziona italiano come lingua predefinita
        $translations = [
            'home' => 'Home',
            'logout' => 'Esci',
            'esplora' => 'Esplora le ultime tendenze e novità nel mondo della programmazione',
            'paragraph_hero' => "Entra nel nostro universo di 0 e 1, dove ogni linea di codice è una storia e ogni aggiornamento è un'emozionante avventura nel futuro della tecnologia."
        ];
    }

    // Funzione per ottenere la traduzione in base alla chiave
    function translate($key) {
        global $translations;
        return isset($translations[$key]) ? $translations[$key] : $key;
    }

    /* echo "Lingua corrente: " . $current_language . "<br>";
    print_r($translations); */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/7.1.0/css/flag-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" href="assets/img/dev.png">
    <title>DevDispatch</title>
</head>
<body>

    <!-- HEADER DELLA PAGINA -->
    <header>
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg bg-dark border-bottom border-secondary position-sticky">
            <div class="container-fluid">
            <a class="navbar-brand text-light fw-bold" href="index.php">DEV<span class="text-warning">DISPATCH</span><i class="bi bi-newspaper ps-2"></i></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active border border-secondary rounded-2 ms-2 p-1 fw-semibold text-light" aria-current="page" href="index.php"><?php echo translate('home'); ?></a>
                </li>
                </ul>
                <span class="navbar-text">
                    <!-- <a class="nav-link active" aria-current="page" href="login.html">Login</a> -->
                    <a class="nav-link active me-2 fw-semibold text-light" aria-current="page" href="logout.php"><?php echo translate('logout'); ?></a>
                </span>
            </div>
            </div>
        </nav>
    </header>

    <!-- CORPO PRINCIPALE (MAIN) DELLA PAGINA -->
    <main class="container-fluid mt-4">

        <div class="container text-center">
            <div class="row">

                <!-- colonna colonna principale -->
                <div class="col-10">

                    <!-- sezione hero -->
                    <section class="d-flex justify-content-center">
                        <div class="card border-0 w-75 bg-body-secondary rounded-4 px-4 shadow">

                            <div class="container text-center">
                                <div class="row align-items-center">
                                    <div class="col-5">
                                        <h4 class="fw-bold pb-3 text-warning"><?php echo translate('esplora'); ?></h4> 
                                        <p><?php echo translate('paragraph_hero'); ?></p>
                                    </div>
                                    <div class="col-7 card-body">
                                        <img style="width: 18em;" src="assets/img/development.webp" alt="">
                                </div>
                            </div>

                            </div>
                        </div>
                    </section>


                    <!-- sezione notizie -->
                    <section class="mt-4">
                        <div class="container text-center">
                            <?php
                            $query = "SELECT title, 
                                            CASE WHEN ? = 'en' THEN descrip_en ELSE descrip END AS descrip, 
                                            category 
                                    FROM news";
                            $stmt = $mysqli->prepare($query);
                            $stmt->bind_param("s", $current_language);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if ($result->num_rows > 0) {
                                $count = 0;
                                while($row = $result->fetch_assoc()) {
                                    if ($count % 2 == 0) {
                                        echo '<div class="row">';
                                    }
                                    echo '<div class="col">';
                                    echo '<div class="card my-2 bg-almostLight">';
                                    echo '<div class="card-body">';
                                    echo '<h5 class="card-title fw-bold text-dark">' . $row['title'] . '</h5>';
                                    echo '<p class="card-text">' . $row['descrip'] . '</p>';
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                    if ($count % 2 == 1) {
                                        echo '</div>'; // Chiudi la riga dopo due colonne
                                    }
                                    $count++;
                                }
                                if ($count % 2 == 1) {
                                    echo '</div>'; // Chiudi l'ultima riga se il numero totale delle notizie è dispari
                                }
                            } else {
                                echo '<p>Nessuna notizia disponibile.</p>';
                            }
                            ?>
                        </div>
                    </section>




                </div>

                <!-- colonna selezione lingua -->
                <div class="col-2 text-center border-start ps-4">
                    <h3 class="fw-semibold">Lingua</h3>
                    <!-- bandierine -->
                    <div class="d-flex justify-content-around">
                        <a href="index.php?language=it" class="<?php echo ($current_language === 'it') ? 'selected-language' : ''; ?>"><span class="fi fi-it fis m-1"></span></a>
                        <a href="index.php?language=en" class="<?php echo ($current_language === 'en') ? 'selected-language' : ''; ?>"><span class="fi fi-gb fis m-1"></span></a>
                    </div>
                </div>
            </div>
        </div>
        
    </main>

    <footer class="mt-3 py-2 text-center text-light bg-dark">
        <p>&copy; Vincenzo Saccone - DevDispatch <?php echo date("Y"); ?></p>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>