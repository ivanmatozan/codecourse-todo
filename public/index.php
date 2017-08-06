<?php

use \Todo\Storage\DatabaseTaskStorage;
use \Todo\Models\Task;

// Require bootstrap file
require __DIR__ . '/../app/bootstrap.php';

$storage = new DatabaseTaskStorage($db);

$newTask = new Task();
$newTask->setDescription('Finish OOP tutorial')
    ->setDue(new DateTime('+1 hours'));

//$newTaskId = $storage->store($newTask);
//$newTask = $storage->get($newTaskId);

$task = $storage->get(3);
$task->setDescription('Updated #2 Task');
$updatedTask = $storage->update($task);

var_dump($updatedTask);
die();