<?php

namespace Todo\Models;

use DateTime;

class Task
{
    protected $id;

    protected $completed = false;

    protected $description;

    protected $due;

    /**
     * @return int
     */
    public function getId(): int
    {
        return (int)$this->id;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription(string $description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param $completed
     * @return $this
     */
    public function setCompleted($completed = true)
    {
        $this->completed = $completed;

        return $this;
    }

    /**
     * @return bool
     */
    public function isCompleted(): bool
    {
        return $this->completed;
    }

    /**
     * @param DateTime $due
     * @return $this
     */
    public function setDue(DateTime $due)
    {
        $this->due = $due;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getDue(): DateTime
    {
        if (!$this->due instanceof DateTime) {
            return new DateTime($this->due);
        }

        return $this->due;
    }
}