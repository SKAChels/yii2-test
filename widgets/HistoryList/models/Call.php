<?php

namespace app\widgets\HistoryList\models;

class Call extends Common
{
    public function getRenderParams(): array
    {
        $historyItem = $this->historyItem;
        $call = $historyItem->call;

        return [
            'user' => $historyItem->user,
            'content' => $call->comment ?? '',
            'body' =>  $this->getBody(),
            'footerDatetime' => $historyItem->ins_ts,
            'footer' => isset($call->applicant) ? "Called <span>{$call->applicant->name}</span>" : null,
            'iconClass' => $this->getIconClass(),
            'iconIncome' => $this->getIconIncome(),
        ];
    }

    public function getBody(): string
    {
        $call = $this->historyItem->call;
        if ($call === null) {
            return '<i>Deleted</i>';
        }
        if (!$call->getTotalDisposition()) {
            return $call->totalStatusText;
        }
        return $call->totalStatusText . ' <span class=\'text-grey\'>' . $call->getTotalDisposition() . '</span>';
    }

    private function getIconClass(): ?string
    {
        $call = $this->historyItem->call;
        if ($call === null) {
            return null;
        }

        return $call->isAnswered() ? 'md-phone bg-green' : 'md-phone-missed bg-red';
    }

    private function getIconIncome(): bool
    {
        $call = $this->historyItem->call;
        if ($call === null) {
            return false;
        }

        return $call->isAnswered() && $call->isIncoming();
    }
}