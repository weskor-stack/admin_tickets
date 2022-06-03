<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('service_report_id') }}
            {{ Form::text('service_report_id', $serviceReport->service_report_id, ['class' => 'form-control' . ($errors->has('service_report_id') ? ' is-invalid' : ''), 'placeholder' => 'Service Report Id']) }}
            {!! $errors->first('service_report_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('time_entry') }}
            {{ Form::time('time_entry', $serviceReport->time_entry, ['class' => 'form-control' . ($errors->has('time_entry') ? ' is-invalid' : ''), 'placeholder' => 'Time Entry']) }}
            {!! $errors->first('time_entry', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('time_completion') }}
            {{ Form::time('time_completion', $serviceReport->time_completion, ['class' => 'form-control' . ($errors->has('time_completion') ? ' is-invalid' : ''), 'placeholder' => 'Time Completion']) }}
            {!! $errors->first('time_completion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('lunchtime') }}
            {{ Form::time('lunchtime', $serviceReport->lunchtime, ['class' => 'form-control' . ($errors->has('lunchtime') ? ' is-invalid' : ''), 'placeholder' => 'Lunchtime']) }}
            {!! $errors->first('lunchtime', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('service_hours') }}
            {{ Form::text('service_hours', $serviceReport->service_hours, ['class' => 'form-control' . ($errors->has('service_hours') ? ' is-invalid' : ''), 'placeholder' => 'Service Hours']) }}
            {!! $errors->first('service_hours', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('service_extras') }}
            {{ Form::text('service_extras', $serviceReport->service_extras, ['class' => 'form-control' . ($errors->has('service_extras') ? ' is-invalid' : ''), 'placeholder' => 'Service Extras']) }}
            {!! $errors->first('service_extras', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('duration_travel') }}
            {{ Form::text('duration_travel', $serviceReport->duration_travel, ['class' => 'form-control' . ($errors->has('duration_travel') ? ' is-invalid' : ''), 'placeholder' => 'Duration Travel']) }}
            {!! $errors->first('duration_travel', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('date_service') }}
            {{ Form::date('date_service', $serviceReport->date_service, ['class' => 'form-control' . ($errors->has('date_service') ? ' is-invalid' : ''), 'placeholder' => 'Date Service']) }}
            {!! $errors->first('date_service', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('service_id') }}
            {{ Form::text('service_id', $serviceReport->service_id, ['class' => 'form-control' . ($errors->has('service_id') ? ' is-invalid' : ''), 'placeholder' => 'Service Id']) }}
            {!! $errors->first('service_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('employee_id') }}
            {{ Form::text('employee_id', $serviceReport->employee_id, ['class' => 'form-control' . ($errors->has('employee_id') ? ' is-invalid' : ''), 'placeholder' => 'Employee Id']) }}
            {!! $errors->first('employee_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', $serviceReport->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('date_registration') }}
            {{ Form::text('date_registration', $service->date_registration, ['class' => 'form-control' . ($errors->has('date_registration') ? ' is-invalid' : ''), 'placeholder' => 'Date Registration']) }}
            {!! $errors->first('date_registration', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        <a class="btn btn-danger btn-sm" href="{{ route('service-reports.index') }}"> Cancelar</a>
    </div>
</div>