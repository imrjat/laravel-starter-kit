<div class="row">
    <div class="col-sm-3">
        <!-- text input -->
        <div class="form-group">
            <label>Name</label>
            <input placeholder="Enter Full name" name="name" value="{{ $user->name ?? old('name') }}" type="name"
                class=" @error('name') is-invalid @enderror form-control">
            @error('name')

                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label>Email</label>
            <input placeholder="Enter Email" name="email" value="{{ $user->email ?? old('email') }}" type="email"
                class=" @error('email') is-invalid @enderror form-control">
            @error('email')

                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group {{ $errors->has('avatar') ? 'has-error' : '' }}">
            <label>{{ 'User Photo' }} @if (isset($user->avatar))
                    <a target="blank"
                        href="{{ asset($user->avatar) }}">View</a>
                @endif
            </label>
            <input name="avatar" type="file"
                class=" @error('avatar') is-invalid @enderror form-control">
            @error('avatar')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            <label>Password</label>
            <input placeholder="Enter Password" name="password" value="{{ $user->soft_password ?? old('password') }}" type="text"
                class=" @error('password') is-invalid @enderror form-control">
            @error('password')

                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label>Select Role</label>
            <select name="roles[]" class="form-control  select2 @error('roles') is-invalid @enderror " multiple>
                @foreach ($roles as $role_key => $role)
                    <option {{ isset($userRole) && in_array($role_key, $userRole) ? 'selected' : '' }}
                        value="{{ $role_key }}">{{ strtoupper($role) }}</option>

                @endforeach
            </select>

            @error('roles')

                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="col-sm-3">
        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="1">Active</option>
                <option value="0">Disabled</option>
            </select>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <button type="submit" class="btn btn-primary font-weight-medium auth-form-btn">Submit</button>
    </div>
</div>
