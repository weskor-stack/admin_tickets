<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group" hidden>
            {{ Form::label('service_order_id') }}
            {{ Form::text('service_order_id', $serviceOrder->service_order_id, ['class' => 'form-control' . ($errors->has('usage') ? ' is-invalid' : ''), 'placeholder' => 'service_order_id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <div class="form-group">
            {{ Form::label('Employee:') }}
            {{ Form::select('employee_id', $employee, $employeeOrder->employee_id, ['class' => 'form-select' . ($errors->has('employee_id') ? ' is-invalid' : ''), 'placeholder' => 'Employee']) }}
            {!! $errors->first('employee_id', '<div class="invalid-feedback">:message</div>') !!}
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
        <!--<a class="btn btn-danger btn-lg" href="{{ route('service-orders.index') }}"> Cancel</a>-->
    </div>
</div>