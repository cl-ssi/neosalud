<div class="row">

      <div class="col-md">
          <label for="for_type">Tipo</label>
          <select id="for_type" name="type" class="form-control" wire:model.lazy="type" @if($required_enabled) required @endif>
              <option></option>
              <option {{ $type == "Médico" ? 'selected' : '' }}>Médico</option>
              <option {{ $type == "No médico" ? 'selected' : '' }}>No médico</option>
          </select>
      </div>

      <div class="col-md">
        @if($specialties != null)
              <label for="for_specialty_id">Especialidad</label>
              <select id="for_specialty_id" name="specialty_id" class="form-control" wire:model.lazy="specialty_id" @if($required_enabled) required @endif>
                  <option></option>
                  @foreach($specialties as $specialty)
                    <option value="{{$specialty->id}}" {{ $specialty_id == $specialty->id ? 'selected' : '' }}>{{$specialty->specialty_name}}</option>
                  @endforeach
              </select>
        @endif

        @if($professions != null)
              <label for="for_profession_id">Profesión</label>
              <select id="for_profession_id" name="profession_id" class="form-control" wire:model.lazy="profession_id" @if($required_enabled) required @endif>
                  <option></option>
                  @foreach($professions as $profession)
                    <option value="{{$profession->id}}" {{ $profession_id == $profession->id ? 'selected' : '' }}>{{$profession->profession_name}}</option>
                  @endforeach
              </select>
        @endif

        @if($specialties == null && $professions == null)
          <label for="for_profession_id">&nbsp;</label>
          <select class="form-control">
              <option></option>
          </select>
        @endif

      </div>

      <div class="col-md">
          <label for="for_user_id">Funcionario</label>
          <select id="for_user_id" name="user_id" class="form-control" wire:model.lazy="user_id" @if($required_enabled) required @endif>
              <option></option>
              @if($users != null)
              @foreach($users as $user)
                <option value="{{$user->id}}" {{ $user_id == $user->id ? 'selected' : '' }}>{{$user->OfficialFullName}}</option>
              @endforeach
              @endif
          </select>
      </div>

      @if($contract_enable)
      <div class="col-md">
          <label for="for_contract_id">Contrato</label>
          <select id="for_contract_id" name="contract_id" class="form-control" @if($required_enabled) required @endif>
              <option></option>
              @if($contracts != null)
              @foreach($contracts as $contract)
                <option value="{{$contract->id}}">{{$contract->law}} - {{$contract->weekly_hours}}hrs - {{$contract->year}}</option>
              @endforeach
              @endif
          </select>
      </div>
      @endif

</div>
