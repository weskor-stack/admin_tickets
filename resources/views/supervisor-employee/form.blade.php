<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Supervisor') }}
            {{ Form::select('supervisor_employee_employee_id', $employee, $supervisorEmployee->supervisor_employee_employee_id, ['class' => 'form-select' . ($errors->has('supervisor_employee_employee_id') ? ' is-invalid' : ''), 'placeholder' => 'Select supervisor']) }}
            {!! $errors->first('supervisor_employee_employee_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Employee') }}
            {{ Form::select('employee_employee_id', $employee, $supervisorEmployee->employee_employee_id, ['class' => 'form-select' . ($errors->has('employee_employee_id') ? ' is-invalid' : ''), 'placeholder' => 'Select employee']) }}
            {!! $errors->first('employee_employee_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Department') }}
            {{ Form::select('department_department_id', $department, $supervisorEmployee->department_department_id, ['class' => 'form-select' . ($errors->has('department_department_id') ? ' is-invalid' : ''), 'placeholder' => 'Select department']) }}
            {!! $errors->first('department_department_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>