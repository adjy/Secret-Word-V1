<?php

require_once __DIR__.DIRECTORY_SEPARATOR."init_autoload.php" ;
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
