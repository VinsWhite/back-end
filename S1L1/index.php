<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Esercitazione 1 - PHP</title>
</head>
<body>

    <!-- Variabili e logica PHP -->
    <?php
        //Esercizio 1
        $date = date("Y G:i:s ");
        $day = date("l");
        $month = date("F");

        //switch case dei giorni 
        switch ($day) {
            case 'Monday':
                $day = 'Lunedì ';
                break;
            
           case 'Tuesday':
                $day = 'Martedì ';
                break;
            case 'Wednesday':
                $day = 'Mercoledì ';
                break;

            case 'Thursday':
                $day = 'Giovedì ';
                break;

            case 'Friday':
                    $day = 'Venerdì ';
                    break;

            case 'Saturday':
                    $day = 'Sabato ';
                    break;

            case 'Sunday':
                    $day = 'Domenica ';
                    break;
        }

        //switch case dei mesi 
        switch ($month) {
            case 'January':
                $month = 'Gennaio ';
                break;
            
           case 'February':
                $month = 'Martedì ';
                break;

            case 'March':
                $month = 'Marzo ';
                break;

            case 'April':
                $month = 'Aprile ';
                break;

            case 'May':
                $month = 'Maggio ';
                break;

            case 'June':
                $month = 'Giugno ';
                break;

            case 'July':
                $month = 'Luglio ';
                break;

            case 'August':
                $month = 'Agosto ';
                break;

            case 'September':
                $month = 'Settembre ';
                break;

            case 'October':
                $month = 'Ottobre ';
                break;

            case 'November':
                $month = 'Novembre ';
                break;

            case 'December':
                $month = 'Dicembre ';
                break;
        }

        //Esercizio 2 
        $squadraA = array("AS Roma", "Atalanta", "Bologna", "Cagliari", "Fiorentina", "Frosinone", "Genoa", "Inter");
    
        //Esercizio 3
        $partitaA = [[], []]; // Array bidimensionale
        $matrix = ['Squadra' => ["AS Roma", "Atalanta", "Bologna", "Cagliari", "Fiorentina", "Frosinone", "Genoa", "Inter"], 'Partita' => [1,2,3]];
    ?>

    <!------------------ CORPO PRINCIPALE -----------------> 
    <!-- container -->
    <div class="container align-items-center">
        <h1 class="text-danger text-center mt-2 mb-5">Esercizi con Bootstrap + php sul server</h1>

        <!-- Esercizio 1 -->
        <div class="card bg-dark" style="width: 100%;">
            <div class="card-body text-light">
                <h5 class="card-title text-start">Oggi è:</h5>
                <p class="card-text fw-bold"><?php echo $day . $month . $date ?></p>
                <p class="text-danger">Non dimenticare di refreshare la pagina! Stiamo lavorando via server! </p>
            </div>
        </div>

        <!-- Esercizio 2 -->
        <h2 class="mt-5"> Squadre di serie A attuali </h2>
        <table class="table mt-4 border border-secondary text-center">
            <thead>
                <th scope="col">Squadre Serie A</th>
            </thead>
            <tbody>
                <?php
                    foreach ($squadraA as $squadra) {
                        echo '<tr><td>' . $squadra . '</td></tr>';
                    }
                ?>
            </tbody>
        </table>

        <!-- Esercizio 3 -->
        <!-- N.B. Ho usato la matrice solo per esercitarmi anche se non era necessaria -->

        <h2 class="mt-5">Partite di serie A previste per questa settimana </h2>
        <table class="table border border border-primary">
            <thead>
                <tr>
                    <th scope="col">Giornata</th>
                    <th scope="col">Squadra 1</th>
                    <th scope="col">Squadra 2</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row"><?= $matrix["Partita"][0]; ?></th>
                    <?php
                        for ($i=0; $i < 2 ; $i++) { 
                            echo '<td>'. $matrix["Squadra"][$i] .'</td>';
                        } 
                    ?>
                </tr>
                <tr>
                <th scope="row"><?= $matrix["Partita"][1]; ?></th>
                    <?php
                        for ($i=2; $i < 4 ; $i++) { 
                            echo '<td>'. $matrix["Squadra"][$i] .'</td>';
                        } 
                    ?>
                </tr>
                <tr>
                <th scope="row"><?= $matrix["Partita"][2]; ?></th>
                    <?php
                        for ($i=4; $i < 6 ; $i++) { 
                            echo '<td>'. $matrix["Squadra"][$i] .'</td>';
                        } 
                    ?>
                </tr>
            </tbody>
            </table>
        
    </div>

    <footer class="mt-5 border-top border-dark text-center">
        <div class="container">
            <p class="mt-3">&copy; Vincenzo S. 2024</p>
        </div>
    </footer>

    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
