@extends('admin.layouts.master')
@section('content')
@section('title', 'Update Setting Details')
<div class="content-wrapper">
    <section class="content-header">
       
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">PROFILE INFORMATION                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                       <form method="POST" action="{{ route('update_records') }}" enctype="multipart/form-data">
                           
                            {{ csrf_field() }}
                                @include ('admin.settings.form', ['formMode' => 'edit'])

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection


