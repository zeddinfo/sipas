<?php

namespace App\StateMachines;

use Asantibanez\LaravelEloquentStateMachines\StateMachines\StateMachine;

class DisposisiStateMachine extends StateMachine
{
    const PENDING = 'pending';
    const APPROVED = 'approved';
    const DECLINED = 'declined';
    const PROCESSED = 'processed';

    const STATES = [
        self::PENDING,
        self::APPROVED,
        self::DECLINED,
        self::PROCESSED,
    ];
    public function recordHistory(): bool
    {
        return false;
    }

    public function transitions(): array
    {
        return [
            self::PENDING => [self::APPROVED, self::DECLINED],
            self::APPROVED => [self::PROCESSED],
            self::DECLINED => [self::APPROVED,self::PENDING],
        ];
    }

    public function defaultState(): ?string
    {
        return self::PENDING;
    }
}
