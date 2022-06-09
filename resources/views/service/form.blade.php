<div class="box box-info padding-1">
    <div class="box-body">
        
        
        <div class="form-group" hidden>
            {{ Form::label('Date service') }}
            {{ Form::date('date_service', date('Y-m-d'), ['class' => 'form-control' . ($errors->has('date_service') ? ' is-invalid' : ''), 'placeholder' => 'Date Service']) }}
            {!! $errors->first('date_service', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" hidden>
            {{ Form::label('Status:') }}
            {{ Form::text('status_report_id', 1, ['class' => 'form-control' . ($errors->has('status_report_id') ? ' is-invalid' : ''), 'placeholder' => 'Status']) }}
            {!! $errors->first('status_report_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group" hidden>
            {{ Form::label('service order') }}
            {{ Form::text('service_order_id', $serviceOrder->service_order_id, ['class' => 'form-control' . ($errors->has('usage') ? ' is-invalid' : ''), 'placeholder' => 'service_order_id']) }}
            {!! $errors->first('usage', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        
        <div class="form-group" hidden>
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', 0) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <br>

    </div>
    <div class="box-footer mt20" style="text-align:center">
        <button type="submit" class="btn btn-primary">{{ __('Accept')}}</button>
        <!--<a class="btn btn-danger btn-lg" href="{{ route('services.index','id='.$service->service_id) }}"> Cancel</a>-->
    </div>
</div>