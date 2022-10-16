<div class="row">
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-9">
                <input readonly placeholder="Role name" name="name" value="{{  $role->name ?? old('name') }}"  type="name" class=" @error('name') is-invalid @enderror form-control"  >
                                                @error('name')
                                                
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
            </div>
        </div>
    </div>
   
</div>

<div class="row">
    @error('permission')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
    @foreach($permission as $value)
  
    <div class="col-md-4">

        <div class="form-group">
            <div class="form-check form-check-primary">
                <label class="form-check-label">
                    <input name="permission[]" type="checkbox" value="{{$value->id}}" class="form-check-input  @error('permission') is-invalid @enderror " {{in_array($value->id, $rolePermissions) ? 'checked' : 'false'}}>
                    {{ Str::title(Str::replace('-',' ',Str::replace('_',' ',$value->name))) }}
                <i class="input-helper"></i></label>
            </div>
          
        </div>
    </div>
@endforeach
    </div>


<div class="row">

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

</div>