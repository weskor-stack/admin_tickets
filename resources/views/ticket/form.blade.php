<div class="box box-info padding-1">
    <div class="box-body">
        
        
        <div class="form-group">
            {{ Form::label( __('Subject')) }}
            {{ Form::text('subject', $ticket->subject, ['class' => 'form-control' . ($errors->has('subject') ? ' is-invalid' : ''), 'placeholder' =>  __('Subject')]) }}
            {!! $errors->first('subject', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label( __('Problem')) }}
            {{ Form::text('problem', $ticket->problem, ['class' => 'form-control' . ($errors->has('problem') ? ' is-invalid' : ''), 'placeholder' => __('Problem')]) }}
            {!! $errors->first('problem', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>
        
        <div class="form-group">
            <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
            {{ Form::label( __('Customer')) }} <br>
            <!--{{ Form::text('customer_id', "", ['class' => 'form-control' . ($errors->has('customer_id') ? ' is-invalid' : ''), 'placeholder' => __('Customer')]) }}
            <a type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#dialogo1">+</a> <br>
            <a href="{{ route('customers.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">{{ __('+') }}</a>-->
            <input type="text" id="customer_id" name="customer_id" class="form-control.<?php echo ($errors->has('customer_id') ? ' is-invalid' : ''); ?>" require hidden>
            {!! $errors->first('customer_id', '<div class="invalid-feedback">:message</div>') !!}
            <script>
                $('.select2').select2();
            </script>
            <select class="form-select, " id="customer" require>
                <option selected disabled>{{ __('Select customer')}}</option>
                @foreach ($countries as $country)
                <option value="{{ $country->customer_id }}">{{ $country->name }}</option>
                @endforeach
            </select>
            <a type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#dialogo1">+</a> <br>
        </div>
        
        <br>
        <div class="form-group">
            <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
            {{ Form::label( __('Contact')) }} <br>
            <!--{{ Form::text('contact_id', $ticket->contact_id, ['class' => 'form-select, select2' . ($errors->has('contact_id') ? ' is-invalid' : ''), 'placeholder' => __('Contact')]) }}
            <a type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#dialogo2">+</a> <br>
            <a href="{{ route('contacts.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">{{ __('+') }}</a>-->
            <input type="text" id="contact_id" name="contact_id" class="form-control.<?php echo ($errors->has('contact_id') ? ' is-invalid' : ''); ?>" require hidden>
            {!! $errors->first('contact_id', '<div class="invalid-feedback">:message</div>') !!}
            <script>
                $('.select2').select2();
            </script>
            <select class="form-select," data-control="select2" id="contact" require></select>
            <a type="button" class="btn btn-outline-dark" id="add" data-toggle="modal" data-target="#dialogo2">+</a> <br>

            <script>
                
                $('#customer').on('change', function () {
                    var customer = $(this).val();
                    
                    document.getElementById('ejemplo').value= customer;
                    document.getElementByName('customer_id2')[0].value= customer;
                    alert(document.getElementByName('customer_id2')[0].value);                    
                });
            </script>
        </div>
        
        <br>
        <div>
            {{ Form::label( __('Priority')) }} 
            {{ Form::select('priority_id', $priority, $ticket->priority_id, ['class' => 'form-select' . ($errors->has('priority_id') ? ' is-invalid' : ''), 'placeholder' => __('Priority')]) }}
            {!! $errors->first('priority_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>
        <div class="form-group" hidden>
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', 0) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        

    </div>
    <br>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary btn-lg">{{ __('Accept')}}</button>
        <a class="btn btn-danger btn-lg" href="{{ route('tickets.index') }}"> {{ __('Cancel')}}</a>
    </div>
</div>