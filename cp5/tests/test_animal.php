<?php
include_once('../class/animal.class.php');

echo '<h2>Instanciation</h2>';
$milou = new Animal();
var_dump($milou);
$milou->name = 'Milou';
// $milou->dob = '1925-05-03';
// $milou->weight = 6.54;
// $milou->female = false;
var_dump($milou);

echo '<h2>Encapsulation : getters et setters</h2>';
// $milou->setDob('toto');
$milou->setDob('1925-05-03');
// $milou->setWeight(.1);
$milou->setWeight(6.54);
$milou->setFemale('non');
var_dump($milou);

echo '<h2>Constructeur</h2>';
$pet2 = new Animal('Garfield', 'chat', '1956-12-24', 7.8, false);
var_dump($pet2);
