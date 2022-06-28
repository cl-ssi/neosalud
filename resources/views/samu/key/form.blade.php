<div class="row g-2">

    <fieldset class="form-group col-sm-1">
        <label for="for_key">Código *</label>
        <input type="text" class="form-control" id="for_key" name="key"
            value="{{ ($key && $key->key) ? $key->key : '' }}" autocomplete="off" required>
    </fieldset>

    <fieldset class="form-group col-sm-4">
        <label for="for_name">Nombre *</label>
        <input type="text" class="form-control" id="for_name" name="name"
            value="{{ ($key && $key->name) ? $key->name : '' }}" autocomplete="off" required>
    </fieldset>

</div>
