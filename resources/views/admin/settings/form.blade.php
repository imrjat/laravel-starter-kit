<div class="row">

@foreach ($settings as $setting)
    
    <div class="col-sm-12">
        <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
            <label>{{ $setting->label }}</label>
                <input placeholder="Enter {{ $setting->label }}" name="{{ $setting->name }}" value="{{ $setting->value ?? old('value')}}"  type="{{ $setting->type  }}" class=" @error('name') is-invalid @enderror form-control"  >
                                                
                @error('title')  
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    @if( $setting->type =='file' && isset($setting->value))
    <div class="col-sm-6">
        <a target="blank" href="{{ asset( $setting->value) }}" > <img width="20%" src="{{ asset( $setting->value) }}" alt=""> </a>
    </div>

    @endif
@endforeach

</div>

<div class="row">

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

</div>


