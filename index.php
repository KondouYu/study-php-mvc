<?php

require __DIR__ . '/core/app.php';

$app = new App();

$app->require('/core/classes/model.php');
$app->require('/core/classes/controller.php');

$app->config();

$app->start();

?>