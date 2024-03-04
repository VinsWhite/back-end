<?php 
    session_start();
    session_destroy();

    include_once ('partials/header.php');
    // includiamo ed utilizziamo le classi
    include ('namespaceFixed.php');
    use FormGenerator\DivGenerator as FDG; // form div generator
    use FormGenerator\LabelGenerator as FLG; // form label generator
    use FormGenerator\InputGenerator as FIG; // form input generator
    use FormGenerator\ButtonGenerator as FBG; //form button generator

    $divGenerator = new FDG('mb-3 mt-4');
    $labelEmailGenerator = new FLG('form-label', 'Indirizzo Email');
    $inputEmailGenerator = new FIG('email','form-control','email');

    $labelNameGenerator = new FLG('form-label', 'Nome');
    $inputNameGenerator = new FIG('text','form-control','nam');

    $labelLastnameGenerator = new FLG('form-label', 'Cognome');
    $inputLastnameGenerator = new FIG('text','form-control','lastname');

    $labelPasswordGenerator = new FLG('form-label', 'Password');
    $inputPasswordGenerator = new FIG('password','form-control','passW');

    $buttonGenerator = new FBG('submit', 'btn btn-secondary', 'Invio');
?>

    <!-- Lo so, il form è bruttissimo, ma ho fatto di corsa --> 
    <main class="container mt-5">
        <h1 class="text-warning-emphasis">Form di registrazione!</h1>
        <p class="text-black-50">Inserisci le tue informazioni qui sotto</p>
        <form action="newsPage.php" method="post">
            <?php echo $divGenerator->startDiv(); ?>
                <?php echo $labelEmailGenerator->getLabel(); ?>
                <?php echo $inputEmailGenerator->getInput(); ?>
            <?php echo $divGenerator->endDiv(); ?>
            
            <?php echo $divGenerator->startDiv(); ?>
                <?php echo $labelNameGenerator->getLabel(); ?>
                <?php echo $inputNameGenerator->getInput(); ?>
            <?php echo $divGenerator->endDiv(); ?>

            <?php echo $divGenerator->startDiv(); ?>
                <?php echo $labelLastnameGenerator->getLabel(); ?>
                <?php echo $inputLastnameGenerator->getInput(); ?>
            <?php echo $divGenerator->endDiv(); ?>

            <?php echo $divGenerator->startDiv(); ?>
                <?php echo $labelPasswordGenerator->getLabel(); ?>
                <?php echo $inputPasswordGenerator->getInput(); ?>
            <?php echo $divGenerator->endDiv(); ?>

            <?php echo $buttonGenerator->getButton(); ?>
        </form>
    </main>

<?php include_once('partials/footer.php') ?>