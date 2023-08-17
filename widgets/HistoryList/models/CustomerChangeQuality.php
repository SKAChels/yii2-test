<?php

namespace app\widgets\HistoryList\models;

use app\models\customer\Customer;

class CustomerChangeQuality extends Common
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
            'oldValue' => Customer::getQualityTextByQuality($historyItem->getDetailOldValue('quality')),
            'newValue' => Customer::getQualityTextByQuality($historyItem->getDetailNewValue('quality')),
        ];
    }

    public function getBody(): string
    {
        $historyItem = $this->historyItem;

        return "{$this->historyItem->eventText} " .
            (Customer::getQualityTextByQuality($historyItem->getDetailOldValue('quality')) ?? 'not set') . ' to ' .
            (Customer::getQualityTextByQuality($historyItem->getDetailNewValue('quality')) ?? 'not set');
    }
}