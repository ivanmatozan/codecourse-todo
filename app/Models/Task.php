<?php

namespace Todo\Models;

use DateTime;

class Task
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var bool
     */
    protected $completed = false;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var DateTime
     */
    protected $due;


    public function __construct()
    {
        //
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
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
     * @param bool $completed
     * @return $this
     */
    public function setCompleted(bool $completed = true)
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
        return $this->due;
    }
}