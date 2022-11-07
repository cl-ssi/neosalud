<?php

namespace App\Http\Controllers\Samu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Samu\MobileInServiceInventoryTemplate;
use App\Models\Samu\MobileType;
use App\Models\Samu\Medicine;
use App\Models\Samu\Supply;

class MobileInServiceInventoryTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mobileTypes = MobileType::all();

        return view('samu.mobileinserviceinventories.templates.index', compact('mobileTypes'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(MobileType $mobileType)
    {
        $medicines = Medicine::all();
        $supplies = Supply::all();
        return view('samu.mobileinserviceinventories.templates.create', compact('mobileType','medicines','supplies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\MobileInService\MobileInServiceInventoryTemplate  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cont = 0;
        if(count($request->medicines_values) > 0){
            foreach($request->medicines_values as $key => $medicines_value){
                if($medicines_value){
                    $mobileInServiceInventoryTemplate = new MobileInServiceInventoryTemplate($request->All());
                    $mobileInServiceInventoryTemplate->medicine_id = $request->medicines_id[$key];
                    $mobileInServiceInventoryTemplate->value = $medicines_value;
                    $mobileInServiceInventoryTemplate->save();

                    $cont = $cont + 1;
                }else{
                    $mobileInServiceInventoryTemplate = new MobileInServiceInventoryTemplate($request->All());
                    $mobileInServiceInventoryTemplate->medicine_id = $request->medicines_id[$key];
                    $mobileInServiceInventoryTemplate->value = 0;
                    $mobileInServiceInventoryTemplate->save();

                    $cont = $cont + 1;
                }
            }
        }

        if(count($request->supplies_values) > 0){
            foreach($request->supplies_values as $key => $supply_value){
                if($supply_value){
                    $mobileInServiceInventoryTemplate = new MobileInServiceInventoryTemplate($request->All());
                    $mobileInServiceInventoryTemplate->supply_id = $request->supplies_id[$key];
                    $mobileInServiceInventoryTemplate->value = $supply_value;
                    $mobileInServiceInventoryTemplate->save();
                    $cont = $cont + 1;
                }else{
                    $mobileInServiceInventoryTemplate = new MobileInServiceInventoryTemplate($request->All());
                    $mobileInServiceInventoryTemplate->supply_id = $request->supplies_id[$key];
                    $mobileInServiceInventoryTemplate->value = 0;
                    $mobileInServiceInventoryTemplate->save();
                    $cont = $cont + 1;
                }
            }
        }

        if($cont > 0)
        {
            session()->flash('success', 'Se creó la plantilla correctamente');
            return redirect()->route('samu.mobileinserviceinventory.templates.index');
        }
        else
        {
            $request->session()->flash('danger', 'No se pudo crear plantilla.');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Samu\MobileInServiceInventoryTemplate  $mobileInServiceInventoryTemplate
     * @return \Illuminate\Http\Response
     */
    public function edit(MobileType $mobileType)
    {
        $medicines = Medicine::all();
        $supplies = Supply::all();
        return view('samu.mobileinserviceinventories.templates.edit', compact('mobileType','medicines','supplies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\MobileInService\MobileInServiceUpdateRequest  $request
     * @param  \App\Models\Samu\MobileInService  $mobileInService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MobileType $mobileType)
    {
        // Se elimina info anterior
        foreach($mobileType->serviceInventoryTemplates as $template){
            $template->delete();
        }

        $cont = 0;
        if(count($request->medicines_values) > 0){
            foreach($request->medicines_values as $key => $medicines_value){
                if($medicines_value){
                    $mobileInServiceInventoryTemplate = new MobileInServiceInventoryTemplate($request->All());
                    $mobileInServiceInventoryTemplate->medicine_id = $request->medicines_id[$key];
                    $mobileInServiceInventoryTemplate->value = $medicines_value;
                    $mobileInServiceInventoryTemplate->save();

                    $cont = $cont + 1;
                }else{
                    $mobileInServiceInventoryTemplate = new MobileInServiceInventoryTemplate($request->All());
                    $mobileInServiceInventoryTemplate->medicine_id = $request->medicines_id[$key];
                    $mobileInServiceInventoryTemplate->value = 0;
                    $mobileInServiceInventoryTemplate->save();

                    $cont = $cont + 1;
                }
            }
        }

        if(count($request->supplies_values) > 0){
            foreach($request->supplies_values as $key => $supply_value){
                if($supply_value){
                    $mobileInServiceInventoryTemplate = new MobileInServiceInventoryTemplate($request->All());
                    $mobileInServiceInventoryTemplate->supply_id = $request->supplies_id[$key];
                    $mobileInServiceInventoryTemplate->value = $supply_value;
                    $mobileInServiceInventoryTemplate->save();
                    $cont = $cont + 1;
                }else{
                    $mobileInServiceInventoryTemplate = new MobileInServiceInventoryTemplate($request->All());
                    $mobileInServiceInventoryTemplate->supply_id = $request->supplies_id[$key];
                    $mobileInServiceInventoryTemplate->value = 0;
                    $mobileInServiceInventoryTemplate->save();
                    $cont = $cont + 1;
                }
            }
        }

        if($cont > 0)
        {
            session()->flash('success', 'Se modificó la plantilla correctamente');
            return redirect()->route('samu.mobileinserviceinventory.templates.index');
        }
        else
        {
            $request->session()->flash('danger', 'No se pudo crear plantilla.');
            return redirect()->back()->withInput();
        }
    }
}
