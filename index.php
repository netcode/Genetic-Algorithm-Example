<?php
set_time_limit(0);
ini_set("memory_limit", "256M");
require_once './lib/ga.php';
//echo mt_rand() % 100;
//exit();
//CREAMOS UN NUEVO OBJETO GA
//exit('222');
$ga = new GA(1);

//ESTABLECEMOS EL OBJETIVO
$ga->setObjective(0, 1080);

//INICIALIZAMOS EL OBJETO
$ga->startUp(0);

//EMPEZAMOS LA EVOLUCIÓN
$bests = $ga->start(0);

?>