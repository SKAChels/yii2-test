<?php

namespace app\widgets\HistoryList\models;

use app\models\customer\Customer;

class CustomerChangeType extends Common
{
    public function getViewName(): string
    {
        return '_item_statuses_change';
    }

    public function getRenderParams(): array
    {
        $historyItem = $this->historyItem;

        return [
            'model' => $historyItem,
            'oldValue' => Customer::getTypeTextByType($historyItem->getDetailOldValue('type')),
            'newValue' => Customer::getTypeTextByType($historyItem->getDetailNewValue('type')),
        ];
    }

    public function getBody(): string
    {
        $historyItem = $this->historyItem;

        return "{$this->historyItem->eventText} " .
            (Customer::getTypeTextByType($historyItem->getDetailOldValue('type')) ?? 'not set') . ' to ' .
            (Customer::getTypeTextByType($historyItem->getDetailNewValue('type')) ?? 'not set');
    }
}