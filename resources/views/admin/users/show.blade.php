@extends('admin.layouts.master')
@section('content')
@section('title', 'System Users')

<div class="content-wrapper">
    <section class="content-header">
        @include('admin.layouts.alert')
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-4">
                    <h1>User</h1>
                </div>
                <div class="col-sm-3">
                    <a class="btn btn-success btn-xs" href="{{ route('users.show', $user->id) }}">Show</a>
                    @can('user-edit')
                        <a class="btn btn-primary btn-xs" href="{{ route('users.edit', $user->id) }}">Edit</a>
                    @endcan
                    @can('user-delete')
                        {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline']) !!}
                        {!! Form::submit('Delete', ['onclick' => 'return confirm(&quot; : Are you sure are you want to delete this? &quot;)', 'class' => 'btn btn-danger btn-xs']) !!}

                        {!! Form::close() !!}
                    @endcan
                </div>
                <div class="col-sm-5">
                  
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <!-- /.card -->

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Bordered Table</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">

                                <tbody>
                                    <tr>
                                        <th>#Id</th>
                                        <td>{{ $user->id }}</td>

                                    </tr>
                                    <tr>
                                        <th>Name</th>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Password</th>
                                        <td>{{ $user->soft_password }}</td>
                                    </tr>

                                    <tr>
                                        <th>Roles</th>
                                        <td>
                                            @if (!empty($user->getRoleNames()))
                                                @foreach ($user->getRoleNames() as $val)
                                                    <label class="badge badge-dark">{{ $val }}</label>
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

                    </div>

                </div>
            </div>
        </div>
    </section>
</div>


@endsection
