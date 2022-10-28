<?php

namespace App\Helpers;
use Illuminate\Support\Str;

class Run
{
    public static function getDv($run)
    {
        $run = intval($run);
        $s = 1;
        for($m=0;$run!=0;$run/=10)
            $s = (int)($s+(int)$run%10*(9-$m++%6))%11;
        $dv = chr($s ? $s+47 : 75);
        return Str::upper($dv);
    }

    public static function verify($run, $dv)
    {
        return Run::getDv($run) == Str::upper($dv);
    }
}
