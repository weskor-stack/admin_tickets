<div class="box box-info padding-1">
    <div class="box-body">
        
        
        <div class="form-group">
            {{ Form::label('Name: ') }}
            {{ Form::text('name', $employee->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Last name: ') }}
            {{ Form::text('last_name', $employee->last_name, ['class' => 'form-control' . ($errors->has('last_name') ? ' is-invalid' : ''), 'placeholder' => 'Last Name']) }}
            {!! $errors->first('last_name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('E-mail: ') }}
            {{ Form::text('email', $employee->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email', 'maxlength' => 50]) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Picture: ') }}
            <br>
            <!--<input type="file" id="picture">
            {{ $employee->picture }}-->
            <img src="{{ asset('storage').'/'.$employee->picture }}" width="100" alt="">
            {{ Form::file('picture', ['class' => 'form-control' . ($errors->has('picture') ? ' is-invalid' : ''), 'placeholder' => 'Picture']) }}
            <!--{{ Form::text('picture', $employee->picture, ['class' => 'form-control' . ($errors->has('picture') ? ' is-invalid' : ''), 'placeholder' => 'Picture']) }}-->
            {!! $errors->first('picture', '<div class="invalid-feedback">:message</div>') !!}
            
        </div>
        <br>
        
        
        <div class="form-group">
            {{ Form::label('Status: ') }}
            {{ Form::select('status_id', $status, $employee->status_id, ['class' => 'form-select' . ($errors->has('status_id') ? ' is-invalid' : ''), 'placeholder' => 'Status Id']) }}
            {!! $errors->first('status_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" hidden>
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', 0) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        

    </div>
    <br>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary btn-lg">Accept</button>
        <a class="btn btn-danger btn-lg" href="{{ route('employees.index') }}"> Cancel</a>
    </div>
</div>