@extends('admin.layouts.master')
@section('content')
@section('title', 'Settings')

<div class="content-wrapper">
    <section class="content-header">
        @include('admin.layouts.alert')
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Settings List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        @can('user-create')
                            <div>
                                <a href="{{  url('/settings/create') }}" class="btn btn-primary btn-sm text-white mb-0 me-0"
                                    type="button"> <i class="fa fa-plus"></i> Add new
                                    Settings</a>
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
                            <h3 class="card-title">Settings List</h3>

                            <div class="card-tools">
                                    {!! Form::open(['method' => 'GET', 'url' => '/settings', 'role' => 'search'])  !!}

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
                            <th>#</th><th>Name</th><th>Value</th><th>Actions</th>

                        </tr>
                    </thead>
                    <tbody>

                      @foreach($settings as $item)
                            <tr>
                                <td>{{ (($settings->currentPage() - 1 ) * $settings->perPage() ) + $loop->iteration }}</td>

                                <td>{{ $item->name }}</td>

                                @if($item->type=='file')

                                <td> <a target="blank" href="{{ asset( $item->value) }}" > <img src="{{ asset( $item->value) }}" alt=""> </a></td>
    
                                @else
    
                                <td>{{ $item->value }}</td>
    
                                @endif
                                <td>
                                    @can('setting-edit')
                                    <a href="{{ url('/settings/' . $item->id . '/edit') }}" title="Edit setting"><button class="btn btn-primary btn-sm"><i class="fa fa-pen" aria-hidden="true"></i> Edit</button></a>
                                    @endcan

                         

                                </td>
                            </tr>
                        @endforeach

                
                        </tbody>
                        </table>
                           <br>
                        <div class="pagination-wrapper"> {!! $settings->appends(['search' => Request::get('search')])->render() !!} </div>

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
