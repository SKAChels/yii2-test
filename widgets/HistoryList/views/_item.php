<?php

use app\models\history\History;
use app\widgets\HistoryList\ItemFactory;

/** @var $model History */

$item = ItemFactory::create($model);
echo $this->render($item->getViewName(), $item->getRenderParams());