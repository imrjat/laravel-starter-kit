@extends('admin.layouts.master')
@section('content')
@section('title', 'System Users')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>System Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">

                        <div>
                            <a href="{{ route('users.index') }}" class="btn btn-info btn-xs text-white mb-0 me-0"
                                type="button"> <i class="fa fa-arrow-left"></i> Back</a>

                        </div>

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
                            <h3 class="card-title">Create New User</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            {!! Form::open(['route' => 'users.store', 'method' => 'POST']) !!}

                            @include('admin.users.form')

                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection