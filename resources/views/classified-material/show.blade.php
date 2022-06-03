@extends('layouts.app')

@section('template_title')
    {{ $classifiedMaterial->name ?? 'Show Classified Material' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Classified Material</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('classified-materials.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Classified Material Id:</strong>
                            {{ $classifiedMaterial->classified_material_id }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $classifiedMaterial->name }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $classifiedMaterial->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Date Registration:</strong>
                            {{ $classifiedMaterial->date_registration }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
