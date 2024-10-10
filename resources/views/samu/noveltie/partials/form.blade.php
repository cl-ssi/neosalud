<div>
    <div class="row g-2">
        <div class="form-group col-sm-2">
            <label for="telephone">Teléfono</label>
            <input type="text"
                class="form-control"
                name="telephone"
                id="telephone"
                aria-describedby="telephone"
                value="{{ old('telephone', optional($noveltie)->telephone) }}">
        </div>
    </div>

    <br>

    <div class="row g-2">
        <fieldset class="form-group col-sm">
            <label for="for_detail">Detalle</label>
            <textarea class="form-control"
                rows="4"
                name="detail"
                required>{{ old('detail', optional($noveltie)->detail) }}</textarea>
        </fieldset>
    </div>
    <div class="row g-2">
        <label for="type">Tipo</label>
        <select
            class="form-select" 
            name="type" 
            id="type" 
            required
        >
            <option value="">Seleccione un tipo</option>
            <option value="Novedad generales"> Novedad generales</option>
            <option value="Reportes de red de urgencia"> Reportes de red de urgencia</option>
        </select>
    </div>

</div>
