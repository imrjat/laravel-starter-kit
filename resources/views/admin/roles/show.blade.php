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
                    <a class="btn btn-success btn-xs" href="{{  route('roles.index') }}"> <i class="fa fa-arrow-left"> </i> Back</a>
                   
                    @can('role-edit')
                    <a href="{{route('roles.edit', $role->id ) }}" title="Edit role"><button class="btn btn-primary btn-xs"><i class="fa fa-pen" aria-hidden="true"></i> Edit</button></a>
                    @endcan

                    @can('role-delete')
                    <form method="POST" action="{{ route('roles.destroy', $role->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit"  class="btn btn-danger btn-xs" title="Delete role" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
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
