<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="form-group">
                <label for="month-year-selector">Selecciona un mes y año:</label>
                <select class="form-control" wire:model="selectedMonthYear">
                    @foreach($options as $value => $label)
                    <option value="{{ $value }}">{{ $label }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>