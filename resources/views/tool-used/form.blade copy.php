<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('tool_used_id') }}
            {{ Form::text('tool_used_id', $toolUsed->tool_used_id, ['class' => 'form-control' . ($errors->has('tool_used_id') ? ' is-invalid' : ''), 'placeholder' => 'Tool Used Id']) }}
            {!! $errors->first('tool_used_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tool_id') }}
            {{ Form::text('tool_id', $toolUsed->tool_id, ['class' => 'form-control' . ($errors->has('tool_id') ? ' is-invalid' : ''), 'placeholder' => 'Tool Id']) }}
            {!! $errors->first('tool_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('quantity') }}
            {{ Form::text('quantity', $toolUsed->quantity, ['class' => 'form-control' . ($errors->has('quantity') ? ' is-invalid' : ''), 'placeholder' => 'Quantity']) }}
            {!! $errors->first('quantity', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('service_id') }}
            {{ Form::text('service_id', $toolUsed->service_id, ['class' => 'form-control' . ($errors->has('service_id') ? ' is-invalid' : ''), 'placeholder' => 'Service Id']) }}
            {!! $errors->first('service_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', $toolUsed->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('date_registration') }}
            {{ Form::text('date_registration', $toolUsed->date_registration, ['class' => 'form-control' . ($errors->has('date_registration') ? ' is-invalid' : ''), 'placeholder' => 'Date Registration']) }}
            {!! $errors->first('date_registration', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>