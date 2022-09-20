<div class="row g-2">

    <fieldset class="form-group col-sm-1">
        <label for="for_mobile_code">Código *</label>
        <input
            type="text"
            class="form-control"
            id="for_mobile_code"
            name="code"
            value="{{ ( $mobile &&  $mobile->code) ? $mobile->code : '' }}"
            required
        >
    </fieldset>

    <fieldset class="form-group col-sm-3">
        <label for="for_name_mobile_name">Nombre *</label>
        <input
            type="text"
            class="form-control"
            id="for_name_mobile_name"
            name="name"
            value="{{ ($mobile && $mobile->name) ? $mobile->name : '' }}"
            required
        >
    </fieldset>

    <fieldset class="form-group col-sm-1">
        <label for="for_name_mobile_plate">Patente</label>
        <input
            type="text"
            class="form-control"
            id="for_name_mobile_plate"
            name="plate"
            value="{{ ($mobile && $mobile->plate) ? $mobile->plate : '' }}"
        >
    </fieldset>

    <fieldset class="form-group col-sm-3">
        <label for="for_name_mobile_description">Descripción</label>
        <input
            type="text"
            class="form-control"
            id="for_name_mobile_description"
            name="description"
            value="{{ ($mobile && $mobile->description) ? $mobile->description : '' }}"
        >
    </fieldset>

    <div class="mt-5 form-check col-sm-2">
        <input
            type="checkbox"
            class="form-check-input ml-3"
            id="mobile-managed"
            name="managed" {{ ($mobile && $mobile->managed) ? 'checked' : '' }}
        >
        <label class="form-check-label ml-5" for="mobile-managed">Móvil Pertenece a Samu</label>
    </div>

    <div class="mt-5 form-check col-sm-1">
        <input type="checkbox" class="form-check-input ml-3" id="mobile-status" name="status" {{ ($mobile && $mobile->status) ? 'checked' : '' }} >
        <label class="form-check-label ml-5" for="mobile-status">Activo</label>
    </div>

</div>
