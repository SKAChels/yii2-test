<?php

namespace app\widgets\HistoryList\models;

use app\models\history\History;
use app\widgets\HistoryList\interfaces\RenderItemInterface;

class Common implements RenderItemInterface
{
    protected $historyItem;

    public function __construct(History $historyItem)
    {
        $this->historyItem = $historyItem;
    }

    public function getViewName(): string
    {
        return '_item_common';
    }

    public function getRenderParams(): array
    {
        return [
            'user' => $this->historyItem->user,
            'body' => $this->historyItem->eventText,
            'bodyDatetime' => $this->historyItem->ins_ts,
            'iconClass' => 'fa-gear bg-purple-light'
        ];
    }

    public function getBody(): string
    {
        return $this->historyItem->eventText;
    }
}