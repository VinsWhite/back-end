<?php 

    include_once ('partials/header.php');
    // includiamo ed utilizziamo le classi
    include ('namespace.php');
    use Space\ButtonGenerator as BG;
    use Space\FormInputGenerator as FG;

    $emailGenerator = new FG('email', 'form-control', 'exampleInputEmail1', 'Inserisci email...', 'email');
    $nameGenerator = new FG('text', 'form-control', 'exampleInputName1', 'Inserisci il tuo nome...', 'nam');
    $lastnameGenerator = new FG('text', 'form-control', 'exampleInputLastName1', 'Inserisci il tuo cognome...', 'lastname');
    $passwordGenerator = new FG('password', 'form-control', 'examplePassword1', 'Insersci password...', 'passW');
    $buttonGenerator = new BG('submit', 'btn btn-secondary', 'submitButton');
?>

    <!-- Lo so, il form è bruttissimo, ma ho fatto di corsa --> 
    <main class="container mt-5">
        <h1 class="text-warning-emphasis">Form di registrazione!</h1>
        <p class="text-black-50">Inserisci le tue informazioni qui sotto</p>
        <form action="controller.php" method="post">
            <div class="mb-3 mt-4">
                <?php echo $emailGenerator->inputEmailField(); ?>
            </div>
            <div class="mb-3 mt-4">
                <?php echo $nameGenerator->inputNameField(); ?>
            </div>
            <div class="mb-3 mt-4">
                <?php echo $lastnameGenerator->inputLastnameField(); ?>
            </div>
            <div class="mb-3 mt-4">
                <?php echo $passwordGenerator->inputPasswordField(); ?>
            </div>
            <?php echo $buttonGenerator->buttonField(); ?>
        </form>
    </main>

<?php include_once('partials/footer.php') ?>