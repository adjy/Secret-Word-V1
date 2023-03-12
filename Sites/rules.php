<?php
require __DIR__."/../config.php" ;

require $GLOBALS['PHP_DIR']."class/Autoloader.php" ;
Autoloader::register();
use swg\Template;

?>

<!-- Démarre le buffering -->
<?php ob_start() ?>

    <div class="rules-messages">
        You have to discover... The Secret ! :)
    </div>

<!-- Récupère le contenu du buffer (et le vide) -->
<?php $content=ob_get_clean() ?>


<?php $title = "Rules"; ?>
<!-- Utilisation du contenu bufferisé -->
<?php Template::render($content, $title); ?>
