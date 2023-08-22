<?php

namespace app\models\task;

class Task extends TaskSchema
{
    /**
     * @var TaskStatus
     */
    private $taskStatus;

    /**
     * @var TaskState
     */
    private $taskState;

    public function afterFind(): void
    {
        $this->taskStatus = new TaskStatus($this->status, $this->due_date);
        $this->taskState = new TaskState($this->state ?? '');
        parent::afterFind();
    }

    public function getStatusText(): ?string
    {
        return $this->taskStatus->getStateText();
    }

    public function getStateText(): ?string
    {
        return $this->taskState->getStateText();
    }

    public function getIsOverdue(): bool
    {
        return $this->taskStatus->isOverdue();
    }

    public function getIsDone(): bool
    {
        return $this->taskStatus->isDone();
    }
}
