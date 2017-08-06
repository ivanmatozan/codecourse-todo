<?php

namespace Todo\Storage;

use Todo\Models\Task;
use Todo\Storage\Contracts\TaskStorageInterface;
use PDO;

class DatabaseTaskStorage implements TaskStorageInterface
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function store(Task $task)
    {
        $stmt = $this->db->prepare("
            INSERT INTO task (description, due, completed)
            VALUES(:description, :due, :completed)
        ");

        $stmt->execute($this->buildColumns($task));

        return $this->db->lastInsertId();
    }

    public function update(Task $task)
    {
        $stmt = $this->db->prepare("
            UPDATE task 
            SET description = :description,
            due = :due,
            completed = :completed
            WHERE id = :id
        ");

        $stmt->execute($this->buildColumns($task, [
            'id' => $task->getId()
        ]));

        return $this->get($task->getId());
    }

    public function get($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM task WHERE id = :id");

        $stmt->execute([
            'id' => $id
        ]);

        return $stmt->fetchObject(Task::class);
    }

    public function all()
    {
        $stmt = $this->db->prepare("SELECT * FROM task");

        $stmt->setFetchMode(PDO::FETCH_CLASS, Task::class);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    protected function buildColumns(Task $task, $additional = [])
    {
        return array_merge([
            'description' => $task->getDescription(),
            'due' => $task->getDue()->format('Y-m-d H:i:s'),
            'completed' => $task->isCompleted()
        ], $additional);
    }
}