<?php

namespace app\widgets\HistoryList\models;

use Yii;

class Sms extends Common
{
    public function getRenderParams(): array
    {
        $historyItem = $this->historyItem;
        $sms = $historyItem->sms;

        return [
            'user' => $historyItem->user,
            'body' => $this->getBody(),
            'footer' => $sms->isIncoming() ?
                Yii::t('app', 'Incoming message from {number}', [
                    'number' => $sms->phone_from ?? ''
                ]) : Yii::t('app', 'Sent message to {number}', [
                    'number' => $sms->phone_to ?? ''
                ]),
            'iconIncome' => $sms->isIncoming(),
            'footerDatetime' => $historyItem->ins_ts,
            'iconClass' => 'icon-sms bg-dark-blue'
        ];
    }

    public function getBody(): string
    {
        return $sms->message ?? '';
    }
}