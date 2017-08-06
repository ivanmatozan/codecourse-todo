<?php

use Todo\Models\Task;

// Require bootstrap file
require __DIR__ . '/../app/bootstrap.php';

$task = new Task();
$task->setDescription('Learn OOP')
    ->setDue(new DateTime('+2 days'));

var_dump($task);
die();