@extends('layouts.app')

@section('title', 'agenda')

@section('content')


<form method="POST" class="form-horizontal" action="{{ route('some.open_tprogrammer') }}">
@csrf
@method('POST')

<div class="form-row">

  <div class="form-group col-md-9">
    @livewire('medical_programmer.select-med-prog-employee',['type'         => $request->type,
                                                             'specialty_id' => $request->specialty_id,
                                                             'profession_id'=> $request->profession_id,
                                                             'user_id'      => $request->user_id,
                                                             'required_enabled' => 0])
  </div>

  <div class="form-group col-md-3">
    <label for="inputEmail4">&nbsp;</label>
    <button type="submit" class="btn btn-primary form-control"> <i class="fa fa-search"></i> Buscar</button>
  </div>

</div>

</form>

<hr>

@if($programmingProposals)
  @if($programmingProposals->count() > 0)
    <h4>{{$programmingProposals->first()->user->OfficialFullName}}</h4>

    <div class="table-responsive">
      <table class="table table-responsive">
        <tr>
          <td>
            <span data-feather="square" style="color:#85C1E9"></span> No aperturados
          </td>
          <td>
            <span data-feather="square" style="color:#58E995"></span> Aperturados
          </td>
          <td>
            <span data-feather="square" style="color:#F5B7B1"></span> Ausentismos
          </td>
          <td>
            <span data-feather="square" style="color:#EAEBAB"></span> Sin rendimiento
          </td>

        </tr>
      </table>
    </div>
  @endif
@endif

<form method="POST" class="form-horizontal" action="{{ route('some.openAgenda') }}">
@csrf
@method('POST')

<div class="form-row">

  <div class="form-group col-md-6">
    <label for="inputEmail4">&nbsp;</label>
  </div>

@if($programmingProposals)
  @if($programmingProposals->count() > 0)
    <input type="hidden" name="type" value="{{$request->type}}">
    <input type="hidden" name="specialty_id" value="{{$request->specialty_id}}">
    <input type="hidden" name="profession_id" value="{{$request->profession_id}}">
    <input type="hidden" name="user_id" value="{{$programmingProposals->first()->user_id}}">
  @endif
@endif

  <div class="form-group col-4 col-md-2">
    <label for="inputEmail4">Desde</label>
    <input type="date" name="from" class="form-control">
  </div>

  <div class="form-group col-4 col-md-2">
    <label for="inputEmail4">Hasta</label>
    <input type="date" name="to" class="form-control">
  </div>

  <div class="form-group col-4 col-md-2">
    <label for="inputEmail4">&nbsp;</label>
    <button type="submit" class="btn btn-success form-control"
      onclick="return confirm('Las actividades que no tengan un rendimiento asignado no se podrán aperturar ¿Desea continuar?');">
      <i class="fa fa-folder-open"></i> Aperturar
    </button>
  </div>

</div>

</form>



<html lang='en'>
  <head>
    <meta charset='utf-8' />
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.7.0/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.7.0/main.min.js'></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'timeGridWeek',
            allDaySlot: false,
            firstDay: 1,

            defaultDate: '{{Carbon\Carbon::parse($request->date)->format('d-m-Y')}}',
            slotMinTime: "08:00:00",

            // slotDuration: "00:10:00",
            // slotMaxTime: "17:30:00",
            timeFormat: 'HH:mm',
            locale: 'es',
            slotLabelFormat:
            {
              hour: 'numeric',
              minute: '2-digit',
              omitZeroMinute: false,
              hour12:false,
              meridiem: 'short'
            },

            events: [

              // ficha
              @foreach($programmed_days as $programmed_day)
                @if($programmed_day['data']->subactivity)
                  {
                  title: '{{$programmed_day['data']->subactivity->sub_activity_name}}',
                  start: '{{$programmed_day['start_date']}}',
                  end: '{{$programmed_day['end_date']}}',
                  color: '#{{$programmed_day['color']}}'
                  },
                @else
                  {
                  title: '{{$programmed_day['data']->activity->activity_name}}',
                  start: '{{$programmed_day['start_date']}}',
                  end: '{{$programmed_day['end_date']}}',
                  color: '#{{$programmed_day['color']}}'
                  },
                @endif
              @endforeach

              @foreach($absences as $absence)
                {
                title: '{{$absence->title}}',
                start: '{{$absence->start}}',
                end: '{{$absence->end}}',
                color: '{{$absence->color}}'
                },
              @endforeach


            ]
        });

        calendar.render();
      });



    </script>
  </head>
  <body>
    <div id='calendar'></div>
  </body>
</html>
@endsection

@section('custom_js')

@endsection
