<?php

use \Todo\Storage\DatabaseTaskStorage;
use \Todo\Models\Task;

// Require bootstrap file
require __DIR__ . '/../app/bootstrap.php';

$storage = new DatabaseTaskStorage($db);
$manager = new \Todo\TaskManager($storage);

$newTask = new Task();
$newTask->setDescription('Finish OOP tutorial 2')
    ->setDue(new DateTime('+1 hours'));

$savedTask = $manager->addTask($newTask);

$task = $manager->getTask($savedTask->getId());

$updatedTask = $manager->updateTask($task->setCompleted());

$tasks = $manager->getTasks();