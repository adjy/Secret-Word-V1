
<?php

use swg\SecretWordGame;

require_once __DIR__ . DIRECTORY_SEPARATOR . "init_autoload.php";
?>

<!-- Démarre le buffering -->
<?php ob_start() ?>

    <?php $Game = new SecretWordGame("i love php");

    if(isset($_POST['mot'])) :
        $valRecu = str_split(htmlspecialchars(strtolower($_POST['mot'])));
        $mot = $Game->try($valRecu);
        if($mot['win'])
            $Game->generateWin();
        else
            $Game->generateInput($mot);
        ?>
    <?php else :
        $Game->generateInput( $Game->try(str_split("")));?>

    <?php endif ?>


<!-- Récupère le contenu du buffer (et le vide) -->
<?php $content=ob_get_clean() ?>


<?php $title = "Stark"; ?>
<!-- Utilisation du contenu bufferisé -->
<?php Template::render($content, $title); ?>