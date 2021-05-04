<?php
// Active la gestion des erreurs
error_reporting(E_ALL & E_STRICT);
ini_set('display_errors', '1');
ini_set('log_errors', '0');
ini_set('error_log', './');

// Selon la structure d'accueil de l'appli, on adapte 
// les constantes de connexion à la BDD
switch ($_SERVER['HTTP_HOST']) {
    case 'localhost':
        define('HOST', 'localhost');
        define('PORT', 3306);
        define('DATA', 'greta60');
        define('USER', 'root');
        define('PASS', 'root');
        break;
    case 'baobab-svr5': // Fictif
        define('HOST', 'baobab-svr5');
        define('DATA', 'baobab-sql5');
        define('USER', 'baobab-usr1');
        define('PASS', 'aR5*hgt+7uIopp$');
        break;
    default:
        // do nothing
}
