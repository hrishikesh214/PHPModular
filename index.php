<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once __dir__.'/phpmodular/PHPModular.php';

$modular = new PHPModular();

$modular->use(__dir__.'/mymodules');

$modular->load('mod1', ['name' => 'John', 'color' => 'pink']);
$modular->load('mod1', ['name' => 'Hrishikesh', 'color' => 'orange']);
// $modular->unload('mod 1');
$modular->render();