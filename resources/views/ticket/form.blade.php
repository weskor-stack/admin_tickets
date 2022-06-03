<div class="box box-info padding-1">
    <div class="box-body">
        
        
        <div class="form-group">
            {{ Form::label('Subject') }}
            {{ Form::text('subject', $ticket->subject, ['class' => 'form-control' . ($errors->has('subject') ? ' is-invalid' : ''), 'placeholder' => 'Subject']) }}
            {!! $errors->first('subject', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Problem') }}
            {{ Form::text('problem', $ticket->problem, ['class' => 'form-control' . ($errors->has('problem') ? ' is-invalid' : ''), 'placeholder' => 'Problem']) }}
            {!! $errors->first('problem', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        
        <div class="form-group">
            {{ Form::label('Customer') }}
            {{ Form::select('customer_id', $customer, $ticket->customer_id, ['class' => 'form-select' . ($errors->has('customer_id') ? ' is-invalid' : ''), 'placeholder' => 'Customer']) }}
            {!! $errors->first('customer_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Contact') }}
            {{ Form::select('contact_id', $contact, $ticket->contact_id, ['class' => 'form-select' . ($errors->has('contact_id') ? ' is-invalid' : ''), 'placeholder' => 'Contact']) }}
            {!! $errors->first('contact_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('Priority') }}
            {{ Form::select('priority_id', $priority, $ticket->priority_id, ['class' => 'form-select' . ($errors->has('priority_id') ? ' is-invalid' : ''), 'placeholder' => 'Priority']) }}
            {!! $errors->first('service_order_id', '<div class="invalid-feedback">:message</div>') !!}
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
        <a class="btn btn-danger btn-lg" href="{{ route('tickets.index') }}"> Cancel</a>
    </div>
</div>