@extends('admin.layouts.master')
@section('content')
@section('title', 'System Users')

<div class="content-wrapper">
    <section class="content-header">
        @include('admin.layouts.alert')
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>System Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        @can('user-create')
                            <div>
                                <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm text-white mb-0 me-0"
                                    type="button"> <i class="fa fa-plus"></i> Add new
                                    member</a>
                            </div>
                        @endcan
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Users List</h3>

                            <div class="card-tools">
                                    {!! Form::open(['method' => 'GET', 'url' => '/users', 'role' => 'search'])  !!}

                                <div class="input-group input-group-sm" style="width: 150px;">

                                    <input type="text" name="table_search" class="form-control float-right"
                                        placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>

                                </div>
                                    {!! Form::close() !!}

                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 600px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>
                                                @if (!empty($user->getRoleNames()))
                                                    @foreach ($user->getRoleNames() as $val)
                                                        <label class="badge badge-primary">{{ $val }}</label>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td><label
                                                    class="badge badge-{{ $user->status == 'active' ? 'success' : 'danger' }}">{{ $user->status }}</label>
                                            </td>
                                            <td>
                                                <a class="btn btn-success btn-sm"
                                                    href="{{ route('users.show', $user->id) }}">Show</a>
                                                @can('user-edit')
                                                    <a class="btn btn-primary btn-sm"
                                                        href="{{ route('users.edit', $user->id) }}">Edit</a>
                                                @endcan
                                                @can('user-delete')
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline']) !!}
                                                    {!! Form::submit('Delete', ['onclick' => 'return confirm(&quot; : Are you sure are you want to delete this? &quot;)', 'class' => 'btn btn-danger btn-sm']) !!}

                                                    {!! Form::close() !!}
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>


@endsection
