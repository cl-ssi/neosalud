<div>
@if($shift->status == true)
    <div class="row">
        <div class="col-sm-6">
            <select class="form-select" wire:model='user_id' required="required">
                <option value="">Selecciona un usuario</option>
                @foreach($users as $user => $id)
                <!-- TODO: #62 Pasar a mayúscula @AquaroTorres -->
                <option value="{{ $id }}">{{ strtoupper($user) }}</option>
                @endforeach
            </select>
            @error('user_id') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="col-sm-5">
            <select class="form-select" wire:model="job_type_id">
                <option value="">Selecciona un tipo de trabajador</option>
                @foreach($job_types as $jt)
                <option value="{{ $jt->id }}">{{ $jt->name }}</option>
                @endforeach
            </select>
            @error('job_type_id') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="col-sm-1">
            <button class="btn btn-success" wire:click="store()"><i class="fas fa-plus"></i></button>
        </div>
    </div>
@endif

@foreach($shift->users as $user)
    <div class="row m-1">
        <div class="col-sm-6 nowrap">
            <ul>
              <li>
                  {{ $user->officialFullName }}
              </li>
            </ul>
        </div>
        <div class="col-sm-4">
            {{ $user->pivot->jobType->name }}
        </div>
        <div class="col-sm-2">
            @if($shift->status == true)
                <button class="btn btn-danger btn-sm" wire:click="delete({{$user->pivot->id}})"><i class="fas fa-trash"></i></button>
            @endif
        </div>
    </div>
@endforeach

</div>
