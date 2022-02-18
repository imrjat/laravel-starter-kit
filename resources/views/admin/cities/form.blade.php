<div class="row">
<div class="col-sm-6">
    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
        <label>{{ 'Name' }}</label>
            <input placeholder="Enter name" name="name" value="{{ $city->name ?? old('name')}}"  type="text" class=" @error('name') is-invalid @enderror form-control"  >
                                               
            @error('name')  
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

</div>

<div class="row">

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

</div>


