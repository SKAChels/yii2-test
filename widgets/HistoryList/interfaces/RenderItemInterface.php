<?php

namespace app\widgets\HistoryList\interfaces;

use app\models\history\History;

interface RenderItemInterface
{
    public function __construct(History $historyItem);
    public function getViewName(): string;
    public function getRenderParams(): array;
    public function getBody(): string;
}