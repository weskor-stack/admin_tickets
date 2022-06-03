<div class="box box-info padding-1">
    <div class="box-body">
        
        
        <div class="form-group">
            {{ Form::label('Fecha del servicio') }}
            {{ Form::date('date_service', $service->date_service, ['class' => 'form-control' . ($errors->has('date_service') ? ' is-invalid' : ''), 'placeholder' => 'Date Service']) }}
            {!! $errors->first('date_service', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        
        <div class="form-group" hidden>
            {{ Form::label('Estado:') }}
            {{ Form::text('status_report_id', 1, ['class' => 'form-control' . ($errors->has('status_report_id') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('status_report_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" hidden>
            {{ Form::label('service order') }}
            {{ Form::text('service_order_id', $serviceOrder->service_order_id, ['class' => 'form-control' . ($errors->has('usage') ? ' is-invalid' : ''), 'placeholder' => 'service_order_id']) }}
            {!! $errors->first('usage', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Prioridad') }}
            {{ Form::select('priority_id', $priority, $service->priority_id, ['class' => 'form-select' . ($errors->has('priority_id') ? ' is-invalid' : ''), 'placeholder' => 'Prioridad']) }}
            {!! $errors->first('service_order_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" hidden>
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', 0) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <br>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-sm btn-primary">Aceptar</button>
        <a class="btn btn-danger btn-sm" href="{{ route('services.index') }}"> Cancelar</a>
    </div>
</div>