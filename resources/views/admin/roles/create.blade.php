@extends('admin.layouts.master')
@section('content')
@section('title', 'Create role')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create role</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        @can('roll-create')
                        <div>
                            <a href="{{ url('/admin/roles') }}" class="btn btn-info btn-sm text-white mb-0 me-0" type="button"> <i class="fa fa-arrow-left"></i> Back</a> 
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
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Create New role</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="POST" action="{{ url('/roles') }}" enctype="multipart/form-data">
                                
                                {{ csrf_field() }}
                                @include ('admin.roles.form', ['formMode' => 'create'])

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection


