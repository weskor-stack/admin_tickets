<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('material_used_id') }}
            {{ Form::text('material_used_id', $materialUsed->material_used_id, ['class' => 'form-control' . ($errors->has('material_used_id') ? ' is-invalid' : ''), 'placeholder' => 'Material Used Id']) }}
            {!! $errors->first('material_used_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('material_id') }}
            {{ Form::text('material_id', $materialUsed->material_id, ['class' => 'form-control' . ($errors->has('material_id') ? ' is-invalid' : ''), 'placeholder' => 'Material Id']) }}
            {!! $errors->first('material_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('quantity') }}
            {{ Form::text('quantity', $materialUsed->quantity, ['class' => 'form-control' . ($errors->has('quantity') ? ' is-invalid' : ''), 'placeholder' => 'Quantity']) }}
            {!! $errors->first('quantity', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('service_id') }}
            {{ Form::text('service_id', $materialUsed->service_id, ['class' => 'form-control' . ($errors->has('service_id') ? ' is-invalid' : ''), 'placeholder' => 'Service Id']) }}
            {!! $errors->first('service_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', $materialUsed->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('date_registration') }}
            {{ Form::text('date_registration', $materialUsed->date_registration, ['class' => 'form-control' . ($errors->has('date_registration') ? ' is-invalid' : ''), 'placeholder' => 'Date Registration']) }}
            {!! $errors->first('date_registration', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>