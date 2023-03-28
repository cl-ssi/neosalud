<div>
  <div class="row">

    {{--<fieldset class="form-group col col-md">
        <label for="">Procesos</label>
        <select class="form-control" name="process_id" wire:model="process_id">
          <option value=""></option>
           @if($processes != null)
             @foreach($processes as $process)
               <option value="{{$process->id}}">{{$process->name}}</option>
             @endforeach
           @endif
        </select>
    </fieldset>

    <fieldset class="form-group col col-md">
        <label for="">Act.Madre</label>
        <select class="form-control" name="process_id" wire:model="process_id">
          <option value=""></option>
           @if($motherActivities != null)
             @foreach($motherActivities as $motherActivity)
               <option value="{{$motherActivity->id}}">{{$motherActivity->description}}</option>
             @endforeach
           @endif
        </select>
    </fieldset>--}}

    <fieldset class="form-group col col-md">
        <label for="">Actividades</label>
        <select class="form-control" name="activity_id" wire:model="activity_id" required>
          <option value=""></option>
          @if($specialtyActivities != null)
            @foreach($specialtyActivities as $specialtyActivity)
                <option value="{{$specialtyActivity->activity->id}}">
                    <!-- {{$specialtyActivity->activity->activity_name}} -->
                    <b>{{ $specialtyActivity->activity->activity_name }}</b>
                    @if($specialtyActivity->activity->motherActivity) - [{{ $specialtyActivity->activity->motherActivity->description }}]@endif
                    @if($specialtyActivity->activity->process) - <p style="color:red;display:inline">[{{ $specialtyActivity->activity->process->name }}]</p>@endif
                </option>
             @endforeach
           @endif

           @if($professionActivities != null)
             @foreach($professionActivities as $professionActivity)
                <option value="{{$professionActivity->activity->id}}">
                    <!-- {{$professionActivity->activity->activity_name}} -->
                    <b>{{ $professionActivity->activity->activity_name }}</b>
                    @if($professionActivity->activity->motherActivity) - [{{ $professionActivity->activity->motherActivity->description }}]@endif
                    @if($professionActivity->activity->process) - <p style="color:red;display:inline">[{{ $professionActivity->activity->process->name }}]</p>@endif
                </option>
              @endforeach
            @endif
        </select>
    </fieldset>

    <fieldset class="form-group col col-md">
        <label for="">Sub-actividades</label>
        <select class="form-control" name="sub_activity_id">
          <option value=""></option>
           @if($subactivities != null)
             @foreach($subactivities as $subactivity)
               <option value="{{$subactivity->id}}">{{$subactivity->sub_activity_name}}</option>
             @endforeach
           @endif
        </select>
    </fieldset>

  </div>
</div>
