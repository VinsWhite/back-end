<?php 

    session_start();

    include_once ('partials/header.php'); 
    require_once('config.php');

    $mysqli = new mysqli(
        $config['hostname'],
        $config['username'],
        $config['password']);

    if($mysqli->connect_error) { die($mysqli->connect_error); } 

    if (isset($_POST['email']) && isset($_POST['nam']) && isset($_POST['lastname']) && isset($_POST['passW'])) {
        /* var_dump($_POST); */
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['nam'] = $_POST['nam'];
        $_SESSION['lastname'] = $_POST['lastname'];
        $_SESSION['passW'] = $_POST['passW'];

    } 

    if (!isset($_SESSION['email']) && !isset($_SESSION['passW'])) {
        header('Location: index.php');
        exit; // usiamo exit() dopo l'header per evitare l'esecuzione del codice successivo
    }
?>
    
    <main class="bg-light">
        <?php include_once ('partials/navbar2.php'); ?>
    </main>
    
<?php include_once ('partials/footer.php');  ?>