<div class="box box-info padding-1">
    <div class="box-body">
        
        
        <div class="form-group">
            {{ Form::label( __('Name')) }}
            {{ Form::text('name', $contact->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => __('Name')]) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label( __('Last name')) }}
            {{ Form::text('last_name', $contact->last_name, ['class' => 'form-control' . ($errors->has('last_name') ? ' is-invalid' : ''), 'placeholder' => __('Last name')]) }}
            {!! $errors->first('last_name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('E-mail') }}
            {{ Form::text('email', $contact->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email', 'maxlength' => 50]) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label( __('phone')) }}
            {{ Form::text('phone', $contact->phone, ['class' => 'form-control' . ($errors->has('phone') ? ' is-invalid' : ''), 'placeholder' => __('phone'), 'maxlength' => 10]) }}
            {!! $errors->first('phone', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>
        <div class="form-group">
            
            {{ Form::label( __('Customer')) }} <br>
            <!--{{ Form::select('customer_id', $customers, $contact->customer_id, ['class' => 'form-select' . ($errors->has('customer_id') ? ' is-invalid' : ''), 'placeholder' => __('Customer')]) }}
            {!! $errors->first('customer_id', '<div class="invalid-feedback">:message</div>') !!}-->
            {{ Form::select('customer_id', $customers, $contact->customer_id, ['class' => 'form-select' . ($errors->has('customer_id') ? ' is-invalid' : ''), 'placeholder' => __('Customer'), 'require']) }}
            {!! $errors->first('customer_id', '<div class="invalid-feedback">:message</div>') !!}
            <!--<input type="text" name="customer_id2" id="customer_id" value="{{$customers}}"/>-->
            <input type="text" name="ejemplo" id="ejemplo" value="" hidden/>

            
        </div>
        <br>
        <div class="form-group" hidden>
            {{ Form::label( __('Status')) }} <br>
            {{ Form::text('status_id', "1", ['class' => 'form-select' . ($errors->has('status_id') ? ' is-invalid' : ''), 'placeholder' => __('Status')]) }}
            {!! $errors->first('status_id', '<div class="invalid-feedback">:message</div>') !!}
            
        </div>
        <div class="form-group" hidden>
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', 0) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <br>
    <div class="box-footer mt20" style="text-align:center;">
        <button type="submit" id="boton1" class="btn btn-primary btn-lg">{{ __('Accept')}}</button>
        <!--<a class="btn btn-danger btn-lg" href="{{ route('tickets.create') }}"> {{ __('Cancel')}}</a>-->
    </div>
</div>