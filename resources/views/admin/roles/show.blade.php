@extends('admin.layouts.master')
@section('content')
@section('title', 'Show  Role')

<div class="content-wrapper">
    <section class="content-header">
        @include('admin.layouts.alert')
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-4">
                    <h1> Role</h1>
                </div>
                <div class="col-sm-3">
                    <a class="btn btn-success btn-sm" href="{{ url('/admin/roles') }}">Back</a>
                    @can('user-edit')
                        <a class="btn btn-primary btn-sm" href="{{ url('/admin/roles/' . $role->id . '/edit') }}">Edit</a>
                    @endcan
                    @can('user-delete')
                        <form method="POST" action="{{ url('/admin/roles' . '/' . $role->id) }}" accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete role" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                            </form>
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

                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Show Table</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $role->id }}</td>
                                    </tr>
                                    <tr><th> Title </th><td> {{ $role->name }} </td></tr>
                                    <tr><th> Permission </th><td>@if (!empty($rolePermissions))
                                        @foreach ($rolePermissions as $permission)
                                            <label class="badge badge-primary">{{ $permission->name }}</label>
                                        @endforeach
                                    @endif </td></tr>
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
