<?php

namespace App\Enums;

enum Triage: string
{
    case R1 = 'r1';
    case R2 = 'r2';
    case R3 = 'r3';
    case R4 = 'r4';


    public function label(): string
    {
        return match ($this) {
            self::R1 => 'red',
            self::R2 => 'orange',
            self::R3 => 'yellow',
            self::R4 => 'green',
        };
    }
}
