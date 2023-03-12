<?php

require_once "config.php" ;
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

require $GLOBALS['PHP_DIR']."class/Autoloader.php";
Autoloader::register();
use swg\SecretWordGame;
use swg\Template;
?>

<!-- Démarre le buffering -->
<?php ob_start() ?>

    <?php $Game = new SecretWordGame("i love php");

    if(isset($_POST['mot'])) :
		
				$word = ltrim($_POST['mot']);
				$word = rtrim($word);
		
        $valRecu = str_split(htmlspecialchars(strtolower($word)));
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


<?php $title = "home"; ?>
<!-- Utilisation du contenu bufferisé -->
<?php Template::render($content, $title); ?>