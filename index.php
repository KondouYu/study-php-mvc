<?php

require __DIR__ . '/core/app.php';

$app = new App();

$app->require('/core/classes/Model.php');
$app->require('/core/classes/Controller.php');

$app->start();

?>