<div>
    <div class="row">
        <div class="col-md-8">
            <div class="table-responsive">
                <table class="table table-sm table-bordered">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Funcionario</th>
                            <th>Tipo Trabajador</th>
                            <th>Asume</th>
                            <th>Se Retira</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($shift->users as $user)
                        <tr>
                            <td>
                                <a
                                    href="{{ route('samu.shift.user.edit', $user->pivot->id)}}"
                                    class="btn btn-sm btn-outline-primary"
                                >
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                {{ $user->officialFullName }}
                            </td>
                            <td>
                                {{ $user->pivot->jobType->name }}
                            </td>
                            <td>
                                {{ $user->pivot->assumes_at }}
                            </td>
                            <td>
                                {{ $user->pivot->leaves_at }}
                            </td>
                            <td class="text-center">
                                @if($shift->status == true)
                                    <button
                                        class="btn btn-danger btn-sm"
                                        wire:click="delete({{ $user->pivot->id }})"
                                    >
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
        <div class="col-md-4">
            <div class="row mb-2">
                <fieldset class="form-group col">
                    <label for="user-id">Usuario</label>
                    <select
                        class="form-select @error('user_id') is-invalid @enderror"
                        wire:model="user_id"
                        required="required"
                        id="user-id"
                    >
                        <option value="">Selecciona un usuario</option>
                        @foreach($users as $user => $id)
                            <option value="{{ $id }}">{{ strtoupper($user) }}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <div class="text-danger">
                            <small>{{ $message }}</small>
                        </div>
                    @enderror
                </fieldset>
            </div>
            <div class="row mb-2">
                <fieldset class="form-group col">
                    <label for="job-type-id">Tipo Trabajador</label>
                    <select
                        class="form-select @error('job_type_id') is-invalid @enderror"
                        wire:model="job_type_id"
                        id="job-type-id"
                    >
                        <option value="">
                            Selecciona tipo trabajador
                        </option>
                        @foreach($job_types as $jt)
                            <option value="{{ $jt->id }}">{{ $jt->name }}</option>
                        @endforeach
                    </select>
                    @error('job_type_id')
                        <div class="text-danger">
                            <small>{{ $message }}</small>
                        </div>
                    @enderror
                </fieldset>
            </div>
            <div class="row g-2 mb-2">
                <fieldset class="col">
                    <label for="assumes-at">Asume</label>
                    <input
                        type="datetime-local"
                        class="form-control @error('assumes_at') is-invalid @enderror"
                        wire:model="assumes_at"
                        id="assumes-at"
                    >
                    @error('assumes_at')
                        <div class="text-danger">
                            <small>{{ $message }}</small>
                        </div>
                    @enderror
                </fieldset>
                <fieldset class="form-group col">
                    <label for="leaves-at">Se retira</label>
                    <input
                        type="datetime-local"
                        class="form-control @error('leaves_at') is-invalid @enderror"
                        wire:model="leaves_at"
                        id="leaves-at"
                    >
                    @error('leaves_at')
                        <div class="text-danger">
                            <small>{{ $message }}</small>
                        </div>
                    @enderror
                </fieldset>
            </div>
            <div class="row">
                <div class="d-grid gap-2">
                    <button class="btn btn-success btn-block" wire:click="store()">
                        <i class="fas fa-plus"></i> Agregar Personal
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
