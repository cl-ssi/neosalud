<div class="col-md-1">
    <label for="for-position">Posición</label>
    <input type="number"
        value="{{ old('position', ($mobileInService && $mobileInService->position) ? $mobileInService->position : '') }}" 
        class="form-control @error('position') is-invalid @enderror" 
        name="position" 
        id="for-position"
        required>
</div>

<div class="col-md-2">
    <label for="for-mobile-id">Móvil*</label>
    <select class="form-select @error('mobile_id') is-invalid @enderror" 
        name="mobile_id" 
        id="for-mobile-id" 
        required>
        <option></option>
        @foreach($mobiles as $mobile)
            <option value="{{ $mobile->id }}" 
                {{ optional($mobileInService)->mobile_id === $mobile->id ? 'selected' : '' }}>
                {{ $mobile->code }} - {{ $mobile->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="col-md-1">
    <label for="for-type">Tipo de móvil*</label>
    <select class="form-select @error('type_id') is-invalid @enderror" 
        name="type_id" 
        id="for-type" 
        required>
        <option></option>
        @foreach($types as $id => $name)
            <option value="{{ $id }}" 
                {{ optional($mobileInService)->type_id === $id ? 'selected' : '' }}>
                {{ $name }}
            </option>
        @endforeach
    </select>
</div>

<div class="col-md-1">
    <label for="for-o2">Oxígeno Central</label>
    <input type="text" 
        value="{{ ($mobileInService && $mobileInService->o2) ? $mobileInService->o2 : '' }}"
        class="form-control @error('o2') is-invalid @enderror" 
        name="o2" 
        id="for-o2">
</div>

<div class="col-md-6">
    <label for="for-observation">Observación</label>
    <input type="text"
        value="{{ ($mobileInService && $mobileInService->observation) ? $mobileInService->observation : '' }}" 
        class="form-control @error('observation') is-invalid @enderror" 
        name="observation" 
        id="for-observation">
</div>

@if($mobileInService)
<div class="col-md-1">
    <label class="form-check-label mb-2" for="for-status">Activo</label>
    <div class="form-check form-switch">
        <input type="checkbox" 
            class="form-check-input" 
            name="status" 
            role="switch" 
            id="for-status" 
            {{ ($mobileInService && $mobileInService->status) ? 'checked' : '' }}>
    </div>
</div>
@endif
