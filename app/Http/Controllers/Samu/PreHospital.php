<?php

namespace App\Http\Controllers\Samu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Samu\Procedure;
use App\Models\Samu\Alteration;
use App\Models\Samu\MorbidHistory;
use App\Models\Samu\Medicine;
use App\Models\Samu\GlasgowScale;
use App\Models\Samu\MobileType;

class PreHospital extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $procedures = Procedure::all();
        $morbidHistories = MorbidHistory::all();
        $medicines = Medicine::all();
        $types = MobileType::pluck('name','id');

        $alterations = Alteration::all();
        $array_alterations = array();
        foreach($alterations as $alteration){
            $array_alterations[$alteration->type] = 0;
        }

        $glasgow_scales = GlasgowScale::all();
        $array_glasgow_scales = array();
        foreach($glasgow_scales as $glasgow_scale){
            $array_glasgow_scales[$glasgow_scale->age_range][$glasgow_scale->type] = 0;
        }

        return view('samu.pre-hospital.index',compact('procedures','alterations','array_alterations','morbidHistories','medicines'
                                                    ,'glasgow_scales','array_glasgow_scales','types'));
    }
}
