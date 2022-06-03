<div class="box box-info padding-1">
    <div class="box-body">
        
        
        <div class="form-group">
            {{ Form::label('Key:') }}
            {{ Form::text('key', $tool->key, ['class' => 'form-control' . ($errors->has('key') ? ' is-invalid' : ''), 'placeholder' => 'Key']) }}
            {!! $errors->first('key', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Name:') }}
            {{ Form::text('name', $tool->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Unit measure:') }}
            {{ Form::text('unit_measure', $tool->unit_measure, ['class' => 'form-control' . ($errors->has('unit_measure') ? ' is-invalid' : ''), 'placeholder' => 'Unit Measure']) }}
            {!! $errors->first('unit_measure', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Stock:') }}
            {{ Form::text('stock', $tool->stock, ['class' => 'form-control' . ($errors->has('stock') ? ' is-invalid' : ''), 'placeholder' => 'Stock']) }}
            {!! $errors->first('stock', '<div class="invalid-feedback">:message</div>') !!}
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
        <a class="btn btn-danger btn-lg" href="{{ route('tools.index') }}"> Cancel</a>
    </div>
</div>