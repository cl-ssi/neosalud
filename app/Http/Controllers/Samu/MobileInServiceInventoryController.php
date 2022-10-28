<?php

namespace App\Http\Controllers\Samu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Samu\MobileInService;
use App\Models\Samu\MobileInServiceInventory;
use App\Models\Samu\Medicine;
use App\Models\Samu\Supply;
use App\Models\Samu\Shift;

class MobileInServiceInventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $openShift = Shift::whereStatus(true)
            ->with('mobilesInService','mobilesInService.crew','mobilesInService.mobile','mobilesInService.type','mobilesInService.shift')
            ->first();

        if(!$openShift)
        {
            session()->flash('danger', 'Debe abrir un turno primero');
            return redirect()->route('samu.welcome');
        }

        // $lastShift = Shift::with('mobilesInService','mobilesInService.crew','mobilesInService.mobile','mobilesInService.type','mobilesInService.shift')
        //     ->find($openShift->id - 1);

        return view('samu.mobileinserviceinventories.index', compact('openShift'));
    }

}
