<?php

namespace App\Http\Controllers\Epi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Epi\Contact;
use App\Models\Epi\SuspectCase;

class ContactPatientController extends Controller
{
    //

    public function create(request $request, SuspectCase $suspectcase)
    {       
        
        return view('patients.contact.create',compact('suspectcase','request'));
    }

    public function store(Request $request)
    {        
        $contact = new Contact($request->All());
        $contact->save();
        session()->flash('info', 'El Contacto ha sido almacenado y añadido a la ficha del paciente');
        return redirect()->route('chagas.tracings.index', ['organization' => $request->organization_id]);
        
    }

    public function destroy(Contact $contact)
    {
        //
        $contact->delete();
        session()->flash('success', 'El contacto ha sido eliminado exitosamente');
        return redirect()->back();
    }

}
