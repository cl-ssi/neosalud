<?php

namespace App\Http\Controllers\Samu;

use App\Http\Controllers\Controller;
use App\Http\Requests\Event\EventStoreRequest;
use App\Http\Requests\Event\EventUpdateRequest;
use App\Models\Samu\Shift;
use App\Models\Samu\Event;
use App\Models\Samu\Key;
use App\Models\Samu\Call;
use App\Models\Samu\EventCounter;
use App\Models\Samu\Mobile;
use App\Models\Samu\ReceptionPlace;
use App\Models\Commune;
use App\Models\CodConIdentifierType;
use App\Models\Organization;
use App\Services\Samu\EventService;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Gate;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* Obtener el turno actual */
        $shift = Shift::where('status',true)->first();

        if(!$shift)
        {
            session()->flash('danger', 'Debe abrir un turno primero');
            return redirect()->route('samu.welcome');
        }

        $today = now();
        $yesterday = date('Y-m-d',(strtotime ( '-1 day' , strtotime ( $today) ) ));

        $open_events = Event::where('status',true)
                        ->with('commune','call','call.associatedCalls','call.referenceCall','calls','calls.referenceCall','key','returnKey','mobile','mobileInService')
                        ->latest()
                        ->get();
        $events_today = Event::whereDate('date',$today)
                        ->with('commune','call','call.associatedCalls','call.referenceCall','calls','calls.referenceCall','key','returnKey','mobile','mobileInService')
                        ->where('status',false)
                        ->latest()
                        ->get();
        $events_yesterday = Event::whereDate('date',$yesterday)
                        ->with('commune','call','call.associatedCalls','call.referenceCall','calls','calls.referenceCall','key','returnKey','mobile','mobileInService')
                        ->latest()
                        ->get();

        $calls = Call::doesnthave('events')
                    ->with('commune','referenceCall')
                    ->where('classification','<>','OT')
                    ->latest()
                    ->get();

        return view ('samu.event.index' , compact('shift','open_events','events_today','events_yesterday','calls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Samu\Call  $call
     * @param  \App\Models\Samu\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function create(Call $call = null, Event $event = null)
    {
        /* Obtener el turno actual */
        $shift = Shift::whereStatus(true)->first();
        if(!$shift)
        {
            session()->flash('danger', 'Debe abrir un turno primero');
            return redirect()->route('samu.welcome');
        }

        $mobiles            = Mobile::whereManaged(false)->get();
        $establishments     = Organization::whereHas('samu')->pluck('id','name')->sort();
        $nextCounter        = EventCounter::getNext();
        $receptionPlaces    = ReceptionPlace::pluck('id','name')->sort();
        $identifierTypes    = CodConIdentifierType::pluck('id','text')->sort();
        $keys               = Key::orderBy('key')->get();
        $communes           = Commune::whereHas('samu')->pluck('id','name')->sort();
        $mobilesInService   = $shift->mobilesInService->where('shift_id', $shift->id)->where('status', true)->sortBy('position');

        $event = $event
        ? Event::select('id', 'observation', 'address', 'address_reference', 'commune_id', 'key_id', 'call_id')->find($event->id)
        : null;

        $inputType = $this->getInputType(null);
        $timestampFormat = $this->getTimestampFormat($inputType);

        return view('samu.event.create', compact(
            'call',
            'event',
            'shift',
            'keys',
            'establishments',
            'nextCounter',
            'mobiles',
            'mobilesInService',
            'receptionPlaces',
            'identifierTypes',
            'communes',
            'inputType',
            'timestampFormat',
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Event\EventStoreRequest  $request
     * @param  \App\Models\Samu\Call  $call|null
     * @param  \App\Models\Samu\Event  $event|null
     * @return \Illuminate\Http\Response
     */
    public function store(EventStoreRequest $request, Call $call = null, Event $event = null)
    {
        Gate::allowIf( auth()->user()->cannot('SAMU auditor')
            ? Response::allow()
            : Response::deny('Acción no autorizada para "SAMU auditor".')
        );

        $shift = Shift::whereStatus(true)->first();

        if($shift)
        {
            (new EventService())->create($event, $call, $request->validated());

            session()->flash('success', 'Se ha creado el evento');
            return redirect()->route('samu.event.index');
        }
        else
        {
            $request->session()->flash('danger', 'No se pudo registrar el evento ya que
                el turno se ha cerrado, solicite que abran un turno y luego intente guardar nuevamente.');

            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Samu\Event $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Samu\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        /* Obtener el turno actual */
        $shift = Shift::whereStatus(true)->first();
        if(!$shift)
        {
            session()->flash('danger', 'Debe abrir un turno primero');
            return redirect()->route('samu.welcome');
        }
        $establishments     = Organization::whereHas('samu')->pluck('id','name')->sort();
        $keys               = Key::orderBy('key')->get();
        $mobiles            = Mobile::where('managed',false)->get();
        $receptionPlaces    = ReceptionPlace::pluck('id','name')->sort();
        $identifierTypes    = CodConIdentifierType::pluck('id','text')->sort();
        $mobilesInService   = $event->shift->mobilesInService->where('status', true)->sortBy('position');

        /* TODO: Parametrizar */
        $communes = Commune::whereHas('samu')->pluck('id','name')->sort();
        $inputType = $this->getInputType($event);
        $timestampFormat = $this->getTimestampFormat($inputType);

        return view('samu.event.edit', compact(
            'shift',
            'establishments',
            'keys',
            'event',
            'mobiles',
            'mobilesInService',
            'receptionPlaces',
            'identifierTypes',
            'communes',
            'inputType',
            'timestampFormat',
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Event\EventUpdateRequest  $request
     * @param  \App\Models\Samu\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(EventUpdateRequest $request, Event $event)
    {
        Gate::allowIf( auth()->user()->cannot('SAMU auditor')
            ? Response::allow()
            : Response::deny('Acción no autorizada para "SAMU auditor".')
        );

        (new EventService())->update($event, $request->validated());

        session()->flash('success', 'Cometido actualizado satisfactoriamente.');
        return redirect()->route('samu.event.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Samu\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        Gate::allowIf( auth()->user()->cannot('SAMU auditor')
            ? Response::allow()
            : Response::deny('Acción no autorizada para "SAMU auditor".')
        );

        $event->mobileInService()->dissociate();
        $event->calls()->detach();
        $event->delete();

        session()->flash('danger', 'Cometido eliminado.');
        return redirect()->back();
    }

    /**
     * Reopen event
     *
     * @param  \App\Models\Samu\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function reopen(Event $event)
    {
        Gate::allowIf( auth()->user()->cannot('SAMU auditor')
            ? Response::allow()
            : Response::deny('Acción no autorizada para "SAMU auditor".')
        );

        if($event->created_at->gt(now()->subDays(30)))
        {
            $event->status = true;
            $event->save();

            session()->flash('success', 'Cometido re abierto.');
        }
        else
        {
            session()->flash('danger', 'El cometido es mayor a 30 días, no se puede reabrir.');
        }

        return redirect()->back();
    }

    /**
     * Report event
     *
     * @param  \App\Models\Samu\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function report(Event $event)
    {
        return view('samu.event.report',compact('event'));
    }

    /**
     * Get input type for the view
     *
     * @param  \App\Models\Samu\Event  $event|null
     * @return string|null
     */
    public function getInputType(Event $event = null)
    {
        if($event == null)
            $inputType = "time";
        else
        {
            if($event->date->toDateString() == now()->toDateString())
                $inputType = "time";
            else
                $inputType = "datetime-local";
        }

        return $inputType;
    }

    /**
     * Get timestamp format for the view
     *
     * @param  string  $inputType
     * @return string
     */
    public function getTimestampFormat($inputType)
    {
        $format = "Y-m-d\TH:i";
        if($inputType == "time")
            $format = "H:i";

        return $format;
    }

    public function updateCall(Request $request, Call $call)
    {
        $patient_status = $request['type'];
        if($patient_status != ''){
            $call->patient_status = $patient_status;
            $call->save();
        }
        return to_route('samu.event.index');
    }
}