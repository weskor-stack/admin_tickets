<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label( __('customer_id')) }}
            {{ Form::text('customer_id', $customer->customer_id, ['class' => 'form-control' . ($errors->has('customer_id') ? ' is-invalid' : ''), 'placeholder' => __('customer_id'), 'maxlength' => 10, 'minlength'=>10, 'required']) }}
            <!--<input type="text" name="customer_id" id="customer_id" class="form-control" maxlength="10" minlength="10" placeholder="{{ __('customer_id') }}" required>-->
            {!! $errors->first('customer_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label( __('key')) }}
            {{ Form::text('key', $customer->key, ['class' => 'form-control' . ($errors->has('key') ? ' is-invalid' : ''), 'placeholder' => __('key'), 'maxlength' => 5, 'minlength' => 5, 'Require']) }}
            {!! $errors->first('key', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label( __('Name')) }}
            {{ Form::text('name', $customer->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => __('Name'), 'maxlength' => 50,'Require']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label(__('address')) }}
            {{ Form::text('address', $customer->address, ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => __('address'), 'maxlength' => 100,'Require']) }}
            {!! $errors->first('address', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('email') }}
            {{ Form::text('email', $customer->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email', 'maxlength' => 50,'Require']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label( __('phone')) }}
            <input type="tel" class="form-control" name="phone" id="phone" require>
            <!--{{ Form::text('phone', $customer->phone, ['class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : ''), 'placeholder' => __('123-456-78-90'),'maxlength' => 13, 'pattern'=>'[0-9]{3}-[0-9]{2}-[0-9]{3}', 'Require']) }}
            {!! $errors->first('phone', '<div class="invalid-feedback">:message</div>') !!}-->

        </div>
        <div class="form-group" hidden>
            {{ Form::label( __('status_id')) }}
            {{ Form::text('status_id',  "1", ['class' => 'form-select' . ($errors->has('status_id') ? ' is-invalid' : ''), 'placeholder' => __('status_id')]) }}
            {!! $errors->first('status_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" hidden>
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', 0, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
       <br>

    </div>
    <div class="box-footer mt20" style="text-align:center;">
        <button type="submit" class="btn btn-primary btn-lg">{{ __('Accept')}}</button>
        <!--<a class="btn btn-danger btn-lg" href="{{ route('tickets.create') }}"> {{ __('Cancel')}}</a>-->
    </div>
</div>