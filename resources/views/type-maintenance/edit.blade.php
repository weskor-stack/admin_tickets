@extends('layouts.app')

@section('template_title')
    Update Type Maintenance
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update maintenance</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('type-maintenances.update', $typeMaintenance->type_maintenance_id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('type-maintenance.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
