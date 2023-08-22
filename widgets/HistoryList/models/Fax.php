<?php

namespace app\widgets\HistoryList\models;

use Yii;
use yii\helpers\Html;

class Fax extends Common
{
    public function getRenderParams(): array
    {
        $historyItem = $this->historyItem;
        $fax = $historyItem->fax;

        return [
            'user' => $historyItem->user,
            'body' => $this->getBody() . $this->getBodyDocument(),
            'footer' => Yii::t('app', '{type} was sent to {group}', [
                'type' => $fax ? $fax->getTypeText() : 'Fax',
                'group' => isset($fax->creditorGroup) ? Html::a($fax->creditorGroup->name, ['creditors/groups'], ['data-pjax' => 0]) : ''
            ]),
            'footerDatetime' => $historyItem->ins_ts,
            'iconClass' => 'fa-fax bg-green'
        ];
    }

    private function getBodyDocument(): string
    {
        if (!isset($fax->document)) {
            return '';
        }

        return ' - ' . Html::a(
                Yii::t('app', 'view document'),
                $this->historyItem->fax->document->getViewUrl(),
                [
                    'target' => '_blank',
                    'data-pjax' => 0
                ]
            );
    }
}