<?php

use app\widgets\HistoryList\models\Common;

class Task extends Common
{
    public function getRenderParams(): array
    {
        $historyItem = $this->historyItem;
        $task = $historyItem->task;

        return [
            'user' => $historyItem->user,
            'body' => $this->getBody(),
            'iconClass' => 'fa-check-square bg-yellow',
            'footerDatetime' => $historyItem->ins_ts,
            'footer' => isset($task->customerCreditor->name) ? "Creditor: " . $task->customerCreditor->name : ''
        ];
    }

    public function getBody(): string
    {
        return "{$this->historyItem->eventText}: " . ($this->historyItem->task->title ?? '');
    }
}