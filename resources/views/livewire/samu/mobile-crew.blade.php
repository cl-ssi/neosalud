<div class="row">
    <div class="col-sm-8">
        <h4>Tripulación</h4>
        <div class="table-responsive">
            <table class="table table-sm table-bordered">
                <thead class="table-light">
                    <tr>
                        <th width="54"></th>
                        <th>Nombre</th>
                        <th>Funcion</th>
                        <th>Asume</th>
                        <th>Se retira</th>
                        <th width="50"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mobileInService->crew as $tripulant)
                    <tr class="table-{{ $tripulant->pivot->crew_status }}">
                        <td>
                        @if($mobileInService->shift->status == true)
                        <a class="btn btn-outline-primary btn-sm" href="{{route('samu.mobileinservice.crewedit', $tripulant->pivot->id) }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        @endif
                        </td>
                        <td>{{ $tripulant->officialFullName }}</td>
                        <td>{{ $tripulant->pivot->jobType->name }}</td>
                        <td>{{ $tripulant->pivot->assumes_at }}</td>
                        <td>{{ $tripulant->pivot->leaves_at }}</td>
                        <td>
                        @if($mobileInService->shift->status == true)
                            <button class="btn btn-danger btn-sm" wire:click="delete({{ $tripulant->pivot->id }})">
                            <i class="fas fa-trash"></i>
                            </button>
                        @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-sm-4">
        @if($mobileInService->shift->status == true)
        <div class="row">
            <fieldset class="form-group col-sm-12 mb-1">
                <label for="for-user-id">Funcionario</label>
                <select class="form-select" wire:model='user_id' required="required">
                    <option value=""></option>
                    @foreach($users as $user => $id)
                    <option value="{{ $id }}">{{ strtoupper($user) }}</option>
                    @endforeach
                </select>
                @error('user_id') <span class="error">{{ $message }}</span> @enderror
            </fieldset>

            <fieldset class="form-group col-sm-12">
                <label for="for-job-type-id">Función</label>
                <select class="form-select" wire:model="job_type_id">
                    <option value=""></option>
                    @foreach($job_types as $jt)
                    <option value="{{ $jt->id }}">{{ $jt->name }}</option>
                    @endforeach
                </select>
                @error('job_type_id') <span class="error">{{ $message }}</span> @enderror
            </fieldset>

            <fieldset class="form-group col-sm-6">
                <label for="for-assumes-at">Asume</label>
                <input type="datetime-local" class="form-control" wire:model="assumes_at">
                @error('assumes_at') <span class="error">{{ $message }}</span> @enderror
            </fieldset>

            <fieldset class="form-group col-sm-6 mb-3">
                <label for="for-leaves-at">Se retira</label>
                <input type="datetime-local" class="form-control" wire:model="leaves_at">
                @error('leaves_at') <span class="error">{{ $message }}</span> @enderror
            </fieldset>

            <fieldset class="col-12">
                @if($mobileInService->shift->status == true)
                <button wire:click="store()" class="form-control btn btn-success"><i class="fas fa-plus"></i> Agregar tripulación</button>
                @endif
            </fieldset>
        </div>
        @endif
    </div>
</div>

{{--
<div class="row">

    <div class="col-md-8 col-12">



    </div>
    <div class="col-12 col-md-4">
        @if($mobileInService->shift->status == true)
        <div class="form-row">
            <fieldset class="col-12 mb-1">
                <label for="for-user-id">Funcionario</label>
                <select class="form-control" wire:model='user_id' required="required">
                    <option value=""></option>
                    @foreach($users as $user => $id)
                    <option value="{{ $id }}">{{ strtoupper($user) }}</option>
                    @endforeach
                </select>
                @error('user_id') <span class="error">{{ $message }}</span> @enderror
            </fieldset>

            <fieldset class="col-12">
                <label for="for-job-type-id">Función</label>
                <select class="form-control" wire:model="job_type_id">
                    <option value=""></option>
                    @foreach($job_types as $jt)
                    <option value="{{ $jt->id }}">{{ $jt->name }}</option>
                    @endforeach
                </select>
                @error('job_type_id') <span class="error">{{ $message }}</span> @enderror
            </fieldset>

            <fieldset class="col-6">
                <label for="for-assumes-at">Asume</label>
                <input type="datetime-local" class="form-control" wire:model="assumes_at">
                @error('assumes_at') <span class="error">{{ $message }}</span> @enderror
            </fieldset>

            <fieldset class="col-6 mb-3">
                <label for="for-leaves-at">Se retira</label>
                <input type="datetime-local" class="form-control" wire:model="leaves_at">
                @error('leaves_at') <span class="error">{{ $message }}</span> @enderror
            </fieldset>

            <fieldset class="col-12">
                @if($mobileInService->shift->status == true)
                <button wire:click="store()" class="form-control btn btn-success"><i class="fas fa-plus"></i> Agregar tripulación</button>
                @endif
            </fieldset>
        </div>
        @endif
    </div>
</div>

--}}
