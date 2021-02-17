<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once __dir__.'/phpmodular/PHPModular.php';

$modular = new PHPModular();

$modular->use(__dir__.'/mymodules');

$modular->load('profile', ['name' => 'hrishikesh', 'desc'=>'hi there'], name: 'n1');
$modular->load('profile', ['name' => 'hrishi', 'desc'=>'hi hellllo'], name: 'n2');
//$modular->unload('n1');
$modular->render();