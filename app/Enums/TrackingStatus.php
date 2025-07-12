<?php

namespace App\Enums;

enum TrackingStatus:string
{
    case Progress = 'Andamento';
    case NOT_DELIVERY = 'Não entregue';
    case DELIVERED = 'Entregue';

    public function GetColorLabel(): string
    {
        //match é uma estrutura de controle semelhante ao switch, mas com comportamentos mais seguros e expressivos.
        return match($this)
        {
            self::Progress => 'bg-yellow-100 text-yellow-800',
            self::NOT_DELIVERY => 'bg-blue-100 text-blue-800',
            self::DELIVERED => 'bg-green-100 text-green-800',
        };
    }

    public static function fromName(string $name): ?TrackingStatus
    {
        foreach (TrackingStatus::cases() as $case) {
            if ($case->name === $name) {
                return $case;
            }
        }

        return null;
    }

    public static function toNomeValueArray(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn (object $case) => [$case->name => $case->value])
            ->toArray();
    }
}
