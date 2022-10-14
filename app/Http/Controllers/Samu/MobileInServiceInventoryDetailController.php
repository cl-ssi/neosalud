<?php

namespace App\Http\Controllers\Samu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Samu\MobileInService;
use App\Models\Samu\MobileInServiceInventory;
use App\Models\Samu\MobileInServiceInventoryDetail;
use App\Models\Samu\Medicine;
use App\Models\Samu\Supply;
use App\Models\Samu\Shift;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class MobileInServiceInventoryDetailController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(MobileInService $mobileInService)
    {
        $medicines = Medicine::all();
        $supplies = Supply::all();
        $mis = $mobileInService;
        return view('samu.mobileinserviceinventories.create', compact('mis','medicines','supplies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\MobileInService\MobileInServiceStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(count($request->medicines_values) > 0 || count($request->supplies_values) > 0){
            $mobileInServiceInventory = new MobileInServiceInventory($request->All());
            $mobileInServiceInventory->creation_date = Carbon::now();;
            $mobileInServiceInventory->creator_id = Auth::id();
            $mobileInServiceInventory->save();
        }

        $cont = 0;
        if(count($request->medicines_values) > 0){
            foreach($request->medicines_values as $key => $medicines_value){
                if($medicines_value){
                    $mobileInServiceInventoryDetail = new MobileInServiceInventoryDetail($request->All());
                    $mobileInServiceInventoryDetail->inventory_id = $mobileInServiceInventory->id;
                    $mobileInServiceInventoryDetail->medicine_id = $request->medicines_id[$key];
                    $mobileInServiceInventoryDetail->value = $medicines_value;
                    $mobileInServiceInventoryDetail->observation = $request->medicine_observations[$key];
                    $mobileInServiceInventoryDetail->save();

                    $cont = $cont + 1;
                }else{
                    $mobileInServiceInventoryDetail = new MobileInServiceInventoryDetail($request->All());
                    $mobileInServiceInventoryDetail->inventory_id = $mobileInServiceInventory->id;
                    $mobileInServiceInventoryDetail->medicine_id = $request->medicines_id[$key];
                    $mobileInServiceInventoryDetail->value = 0;
                    $mobileInServiceInventoryDetail->observation = $request->medicine_observations[$key];
                    $mobileInServiceInventoryDetail->save();

                    $cont = $cont + 1;
                }
            }
        }

        if(count($request->supplies_values) > 0){
            foreach($request->supplies_values as $key => $supply_value){
                if($supply_value){
                    $mobileInServiceInventoryDetail = new MobileInServiceInventoryDetail($request->All());
                    $mobileInServiceInventoryDetail->inventory_id = $mobileInServiceInventory->id;
                    $mobileInServiceInventoryDetail->supply_id = $request->supplies_id[$key];
                    $mobileInServiceInventoryDetail->value = $supply_value;
                    $mobileInServiceInventoryDetail->observation = $request->supplies_observations[$key];
                    $mobileInServiceInventoryDetail->save();

                    $cont = $cont + 1;
                }else{
                    $mobileInServiceInventoryDetail = new MobileInServiceInventoryDetail($request->All());
                    $mobileInServiceInventoryDetail->inventory_id = $mobileInServiceInventory->id;
                    $mobileInServiceInventoryDetail->supply_id = $request->supplies_id[$key];
                    $mobileInServiceInventoryDetail->value = 0;
                    $mobileInServiceInventoryDetail->observation = $request->supplies_observations[$key];
                    $mobileInServiceInventoryDetail->save();

                    $cont = $cont + 1;
                }
            }
        }

        if($cont > 0)
        {
            session()->flash('success', 'Se creó el inventario correctmanete');
            return redirect()->route('samu.mobileinserviceinventory.index');
        }
        else
        {
            $request->session()->flash('danger', 'No se pudo crear el inventario.');

            return redirect()->back()->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Samu\MobileInService  $mobileInService
     * @return \Illuminate\Http\Response
     */
    public function edit(MobileInService $mobileInService)
    {
        $medicines = Medicine::all();
        $supplies = Supply::all();
        $mis = $mobileInService;
        return view('samu.mobileinserviceinventories.edit', compact('mis','medicines','supplies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\MobileInService\MobileInServiceUpdateRequest  $request
     * @param  \App\Models\Samu\MobileInService  $mobileInService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MobileInService $mobileInService)
    {
        // Se elimina info anterior
        foreach($mobileInService->inventory->details as $detail){
            $detail->delete();
        }

        // se ingresa info
        $cont = 0;
        if(count($request->medicines_values) > 0){
            foreach($request->medicines_values as $key => $medicines_value){
                if($medicines_value){
                    $mobileInServiceInventoryDetail = new MobileInServiceInventoryDetail($request->All());
                    $mobileInServiceInventoryDetail->inventory_id = $mobileInService->inventory->id;
                    $mobileInServiceInventoryDetail->medicine_id = $request->medicines_id[$key];
                    $mobileInServiceInventoryDetail->value = $medicines_value;
                    $mobileInServiceInventoryDetail->observation = $request->medicine_observations[$key];
                    $mobileInServiceInventoryDetail->save();

                    $cont = $cont + 1;
                }else{
                    $mobileInServiceInventoryDetail = new MobileInServiceInventoryDetail($request->All());
                    $mobileInServiceInventoryDetail->inventory_id = $mobileInService->inventory->id;
                    $mobileInServiceInventoryDetail->medicine_id = $request->medicines_id[$key];
                    $mobileInServiceInventoryDetail->value = 0;
                    $mobileInServiceInventoryDetail->observation = $request->medicine_observations[$key];
                    $mobileInServiceInventoryDetail->save();

                    $cont = $cont + 1;
                }
            }
        }

        if(count($request->supplies_values) > 0){
            foreach($request->supplies_values as $key => $supply_value){
                if($supply_value){
                    $mobileInServiceInventoryDetail = new MobileInServiceInventoryDetail($request->All());
                    $mobileInServiceInventoryDetail->inventory_id = $mobileInService->inventory->id;
                    $mobileInServiceInventoryDetail->supply_id = $request->supplies_id[$key];
                    $mobileInServiceInventoryDetail->value = $supply_value;
                    $mobileInServiceInventoryDetail->observation = $request->supplies_observations[$key];
                    $mobileInServiceInventoryDetail->save();

                    $cont = $cont + 1;
                }else{
                    $mobileInServiceInventoryDetail = new MobileInServiceInventoryDetail($request->All());
                    $mobileInServiceInventoryDetail->inventory_id = $mobileInService->inventory->id;
                    $mobileInServiceInventoryDetail->supply_id = $request->supplies_id[$key];
                    $mobileInServiceInventoryDetail->value = 0;
                    $mobileInServiceInventoryDetail->observation = $request->supplies_observations[$key];
                    $mobileInServiceInventoryDetail->save();

                    $cont = $cont + 1;
                }
            }
        }

        if($cont > 0)
        {
            session()->flash('success', 'Se creó el inventario correctmanete');
            return redirect()->route('samu.mobileinserviceinventory.index');
        }
        else
        {
            $request->session()->flash('danger', 'No se pudo crear el inventario.');

            return redirect()->back()->withInput();
        }
    }

    public function confirm_inventory(MobileInService $mobileInService)
    {
        $mobileInService->inventory->approbation_date = Carbon::now();;
        $mobileInService->inventory->approbator_id = Auth::id();
        $mobileInService->inventory->save();

        session()->flash('success', 'Se ha confirmado el inventario');
        return redirect()->route('samu.mobileinserviceinventory.index');
    }
    

}

