<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('service_id') }}
            {{ Form::text('service_id', $service->service_id, ['class' => 'form-control' . ($errors->has('service_id') ? ' is-invalid' : ''), 'placeholder' => 'Service Id']) }}
            {!! $errors->first('service_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('description_task') }}
            {{ Form::text('description_task', $serviceTaskSpecific->description_task, ['class' => 'form-control' . ($errors->has('description_task') ? ' is-invalid' : ''), 'placeholder' => 'Description Task']) }}
            {!! $errors->first('description_task', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('previous_evidence') }}
            {{ Form::text('previous_evidence', $serviceTaskSpecific->previous_evidence, ['class' => 'form-control' . ($errors->has('previous_evidence') ? ' is-invalid' : ''), 'placeholder' => 'Previous Evidence']) }}
            {!! $errors->first('previous_evidence', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('subsequent_evidence') }}
            {{ Form::text('subsequent_evidence', $serviceTaskSpecific->subsequent_evidence, ['class' => 'form-control' . ($errors->has('subsequent_evidence') ? ' is-invalid' : ''), 'placeholder' => 'Subsequent Evidence']) }}
            {!! $errors->first('subsequent_evidence', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('signature_evidence') }}
            {{ Form::text('signature_evidence', $serviceTaskSpecific->signature_evidence, ['class' => 'form-control' . ($errors->has('signature_evidence') ? ' is-invalid' : ''), 'placeholder' => 'Signature Evidence']) }}
            {!! $errors->first('signature_evidence', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('contact_id') }}
            {{ Form::text('contact_id', $serviceTaskSpecific->contact_id, ['class' => 'form-control' . ($errors->has('contact_id') ? ' is-invalid' : ''), 'placeholder' => 'Contact Id']) }}
            {!! $errors->first('contact_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('employee_id') }}
            {{ Form::text('employee_id', $serviceTaskSpecific->employee_id, ['class' => 'form-control' . ($errors->has('employee_id') ? ' is-invalid' : ''), 'placeholder' => 'Employee Id']) }}
            {!! $errors->first('employee_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', $serviceTaskSpecific->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('date_registration') }}
            {{ Form::text('date_registration', $serviceTaskSpecific->date_registration, ['class' => 'form-control' . ($errors->has('date_registration') ? ' is-invalid' : ''), 'placeholder' => 'Date Registration']) }}
            {!! $errors->first('date_registration', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>