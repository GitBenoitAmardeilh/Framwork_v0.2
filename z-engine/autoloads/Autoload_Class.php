<?php

$_shop_dir = dirname(__DIR__);

/**
 * Tous les fichiers à inclure
 */

return [

    $_shop_dir.'\core\Controller.php',
    $_shop_dir.'\config\Database.php',
    $_shop_dir.'\exceptions\AppExceptions.php',
    $_shop_dir.'\exceptions\Errors.php',
    $_shop_dir.'\exceptions\Warning.php',
    $_shop_dir.'\Routing\Router.php',
    $_shop_dir.'\Routing\Route.php',
    $_shop_dir.'\log\Logger.php',

];