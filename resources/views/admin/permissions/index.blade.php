@extends('admin.layouts.master')
@section('content')
@section('title', 'Permissions')

<div class="content-wrapper">
    <section class="content-header">
        @include('admin.layouts.alert')
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Permissions List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        @can('user-create')
                            <div>
                                <a href="{{  route('permissions.create') }}" class="btn btn-primary btn-xs text-white mb-0 me-0"
                                    type="button"> <i class="fa fa-plus"></i> Add new
                                    Permissions</a>
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
                            <h3 class="card-title">Total <b>{{$permissions->total() }}</b> records</h3>

                            <div class="card-tools">
                                    {!! Form::open(['method' => 'GET', 'url' =>  route('permissions.index') , 'role' => 'search'])  !!}

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
                            <th>#</th><th>Permission Name</th><th>Actions</th>

                        </tr>
                    </thead>
                    <tbody>

                      @foreach($permissions as $item)
                            <tr>
                                <td>{{ (($permissions->currentPage() - 1 ) * $permissions->perPage() ) + $loop->iteration }}</td>

                                <td>{{ Str::title(Str::replace('-',' ',Str::replace('_',' ',$item->name))) }}</td>
                                <td>
                                    <a href="{{  route('permissions.show', $item->id) }}" title="View permission"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                    {{-- @can('permission-edit')
                                    <a href="{{ route('permissions.edit', $item->id ) }}" title="Edit permission"><button class="btn btn-primary btn-xs"><i class="fa fa-pen" aria-hidden="true"></i> Edit</button></a>
                                    @endcan --}}

                                    {{-- @can('permission-delete')
                                    <form method="POST" action="{{ route('permissions.destroy',  $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit"  class="btn btn-danger btn-xs" title="Delete permission" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
                                    </form>
                                    @endcan --}}

                                </td>
                            </tr>
                        @endforeach

                
                        </tbody>
                        </table>
                           <br>
                        <div class="pagination-wrapper"> {!! $permissions->appends($_GET)->links() !!} </div>

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
