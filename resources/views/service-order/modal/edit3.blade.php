@extends('layouts.app')

@section('template_title')
    Update Material Assigned
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar material</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('material-assigneds.update', $materialAssigned->material_id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf
                            <div class="box box-info padding-1">
                                <div class="box-body">
                                    
                                    <div class="form-group">
                                        {{ Form::label('Key') }}
                                        {{ Form::select('material_id', $material, $materialAssigned->material_id, ['class' => 'form-select' . ($errors->has('material_id') ? ' is-invalid' : ''), 'placeholder' => 'Material Id']) }}
                                        {!! $errors->first('material_id', '<div class="invalid-feedback">:message</div>') !!}
                                
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('Quantity') }}
                                        {{ Form::text('quantity', $materialAssigned->quantity, ['class' => 'form-control' . ($errors->has('quantity') ? ' is-invalid' : ''), 'placeholder' => 'Quantity']) }}
                                        {!! $errors->first('quantity', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group" hidden>
                                        {{ Form::label('Unit measure') }}
                                        {{ Form::text('unit_measure', " ", ['class' => 'form-control' . ($errors->has('unit_measure') ? ' is-invalid' : ''), 'placeholder' => 'Unit Measure']) }}
                                        {!! $errors->first('unit_measure', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group" hidden>
                                        {{ Form::label('Usage') }}
                                        {{ Form::text('usage', " ", ['class' => 'form-control' . ($errors->has('usage') ? ' is-invalid' : ''), 'placeholder' => 'Usage']) }}
                                        {!! $errors->first('usage', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>

                                    <div class="form-group" hidden>
                                        {{ Form::label('service order') }}
                                        {{ Form::text('service_order_id', $materialAssigned->service_order_id, ['class' => 'form-control' . ($errors->has('usage') ? ' is-invalid' : ''), 'placeholder' => 'service_order_id']) }}
                                        {!! $errors->first('usage', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    
                                    <div class="form-group" hidden>
                                        {{ Form::label('user_id') }}
                                        {{ Form::text('user_id', 0) }}
                                        {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    
                                    <br>

                                </div>
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary btn-lg">Accept</button>
                                    <!--<a class="btn btn-danger btn-lg" href="{{ route('material-assigneds.index') }}"> Cancel</a>-->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
