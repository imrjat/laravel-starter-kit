@extends('admin.layouts.master')
@section('content')
@section('title', 'Roles')

<div class="content-wrapper">
    <section class="content-header">
        @include('admin.layouts.alert')
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Roles List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        @can('role-create')
                            <div>
                                <a href="{{   route('roles.create') }}" class="btn btn-primary btn-xs text-white mb-0 me-0"
                                    type="button"> <i class="fa fa-plus"></i> Add new
                                    Roles</a>
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
                            <h3 class="card-title">Total <b>{{$roles->total() }}</b> records</h3>

                            <div class="card-tools">
                                    {!! Form::open(['method' => 'GET', 'url' => route('roles.index'), 'role' => 'search'])  !!}

                                <div class="input-group input-group-sm" style="width: 150px;">

                                    <input type="text" name="search" class="form-control float-right"
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
                            <th>#</th><th>Title</th><th>Actions</th>

                        </tr>
                    </thead>
                    <tbody>

                      @foreach($roles as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <a href="{{route('roles.show', $item->id) }}" title="View role"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                    @can('role-edit')
                                    <a href="{{route('roles.edit', $item->id ) }}" title="Edit role"><button class="btn btn-primary btn-xs"><i class="fa fa-pen" aria-hidden="true"></i> Edit</button></a>
                                    @endcan

                                    @can('role-delete')
                                    <form method="POST" action="{{ route('roles.destroy', $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit"  class="btn btn-danger btn-xs" title="Delete role" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                                    </form>
                                    @endcan

                                </td>
                            </tr>
                        @endforeach

                
                        </tbody>
                        </table>
                           <br>
                        <div class="pagination-wrapper"> {!! $roles->appends($_GET)->links() !!} </div>

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
