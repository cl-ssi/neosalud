<?php

namespace App\Http\Controllers\MedicalProgrammer;

use App\Models\MedicalProgrammer\Contract;
use App\Models\MedicalProgrammer\Service;
// use App\Models\MedicalProgrammer\Rrhh;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Organization;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if ($request->get('year')) {
        //   $year = $request->get('year');
        // }else{
        //   $year = Carbon::now()->format('Y');
        // }

        $year = $request->get('year');
        $rut = $request->get('rut');
        $name = $request->get('name');

        $contracts = Contract::when($year != null, function ($q) use ($year) {
                                return $q->where('year',$year);
                              })
                             ->when($rut != null, function ($q) use ($rut) {
                               return $q->whereHas('user', function ($query) use ($rut) {
                                   return $query->whereHas('identifiers', function ($query) use ($rut) {
                                       return $query->where('value', $rut)->where('cod_con_identifier_type_id', 1);
                                     });
                                 });
                              })
                              ->when($name != null, function ($q) use ($name) {
                                return $q->whereHas('user', function ($query) use ($name) {
                                    return $query->whereHas('humanNames', function ($query) use ($name) {
                                        return $query->where('text', 'LIKE', '%' . $name . '%')
                                                     ->orwhere('fathers_family', 'LIKE', '%' . $name . '%')
                                                     ->orwhere('mothers_family', 'LKE', '%' . $name . '%');
                                      });
                                  });
                               })
                             ->paginate(50);
        return view('medical_programmer.contracts.index', compact('contracts', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      // $rrhh = Rrhh::orderBy('name','ASC')->get();
      // $users = User::all();
      $organizations = Organization::where('service',3)->get();
      $services = Service::orderBy('service_name','ASC')->get();
      return view('medical_programmer.contracts.create', compact('services','request','organizations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $contract = new Contract($request->All());
      //$contract->user_id = Auth::id();
      $contract->save();

      session()->flash('info', 'El contrato ha sido creado.');
      return redirect()->route('medical_programmer.contracts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pharmacies\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pharmacies\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $contract)
    {
      $users = User::where('id',$contract->user_id)->get();
      $services = Service::orderBy('service_name','ASC')->get();
      $organizations = Organization::where('service',3)->get();
      return view('medical_programmer.contracts.edit', compact('contract', 'users', 'services','organizations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pharmacies\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contract $contract)
    {
        $contract->fill($request->all());
        //$contract->user_id = Auth::id();
        $contract->save();

        session()->flash('info', 'El contrato ha sido editado.');
        return redirect()->route('medical_programmer.contracts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pharmacies\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contract $contract)
    {
      //se elimina la cabecera y detalles
      $contract->delete();
      session()->flash('success', 'El contrato ha sido eliminado');
      return redirect()->route('medical_programmer.contracts.index');
    }
}
