<?php
// Imports
include_once('../inc/constants.inc.php');
include_once('../class/database.class.php');

echo '<h2>Instanciation DATABASE</h2>';
$mydb = new Database(HOST, DATA, USER, PASS);
var_dump($mydb);

echo '<h2>Méthode GETRESULT</h2>';
$sql = 'SELECT * FROM users WHERE active=?';
$params = array(1);
$data = $mydb->getResult($sql, $params);
var_dump($data);

echo '<h2>Méthode GETJSON</h2>';
$json = $mydb->getJSON($sql, $params);
echo $json;
