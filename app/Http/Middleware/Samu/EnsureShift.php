<?php

namespace App\Http\Middleware\Samu;

use App\Models\Samu\Shift;
use Closure;
use Illuminate\Http\Request;

class EnsureShift
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $shift = Shift::latest()->first();
        if($shift->closing_at == null || $shift->status == 1)
        {
            session()->flash('danger', "El turno $shift->id debe tener definido la fecha de cierre y con estado de cerrado.");
            return redirect()->route('samu.shift.index');
        }

        return $next($request);
    }
}
