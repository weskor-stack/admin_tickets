<div class="box box-info padding-1">
    <div class="box-body">
        

        <div class="form-group" hidden>
            {{ Form::label('ticket_id:') }}
            @foreach ($tickets as $ticket)
            {{ Form::text('ticket_id', $ticket->ticket_id, ['class' => 'md-form md-outline input-with-post-icon datepicker' . ($errors->has('date_order') ? ' is-invalid' : ''), 'placeholder' => 'Date Order']) }}
            {!! $errors->first('date_order', '<div class="invalid-feedback">:message</div>') !!}
            @endforeach
        </div>
                
        <div class="form-group" style="text-align:center">
            {{ Form::label(__('Date')) }}
            {{ Form::date('date_order', date('Y-m-d'), ['class' => 'md-form md-outline input-with-post-icon datepicker' . ($errors->has('date_order') ? ' is-invalid' : ''), 'placeholder' => 'Date Order']) }}
            {!! $errors->first('date_order', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>
        <div class="form-group">
            <table class="table table-striped table-hover">
                <tr>
                    <td style="width:30%"></td>
                    <td>
                        <div class="form-group">
                        {{ Form::label( __('Type of maintenance')) }}<br>
                        <input type="radio" name="type_maintenance_id" id="type_maintenance_id" value="1" checked> {{ __('Preventive') }} <br>
                        <!--@if ($serviceOrder->type_maintenance_id=='1')
                        {{ Form::radio('type_maintenance_id','1',true) }}
                        @else
                        {{ Form::radio('type_maintenance_id','1') }}
                        @endif
                        {{ Form::label( __('Preventive')) }}<br>-->
                        @if ($serviceOrder->type_maintenance_id=='2')
                        {{ Form::radio('type_maintenance_id','2',true) }}
                        @else
                        {{ Form::radio('type_maintenance_id','2') }}
                        @endif
                        {{ Form::label( __('Corrective')) }}<br>
                        @if ($serviceOrder->type_maintenance_id=='3')
                        {{ Form::radio('type_maintenance_id','3'),true }}
                        @else
                        {{ Form::radio('type_maintenance_id','3') }}
                        @endif
                        {{ Form::label( __('Predictive')) }}<br>
                        @if ($serviceOrder->type_maintenance_id=='4')
                        {{ Form::radio('type_maintenance_id','4',true) }}
                        @else
                        {{ Form::radio('type_maintenance_id','4') }}
                        @endif
                        {{ Form::label( __('Including')) }}<br>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            {{ Form::label( __('Type of service')) }}<br>
                            <input type="radio" name="type_service_id" id="type_service_id" value="1" checked> {{ __('Software') }} <br>
                            <!--@if ($serviceOrder->type_service_id=='1')
                            {{ Form::radio('type_service_id','1',true) }}
                            @else
                            {{ Form::radio('type_service_id','1') }}
                            @endif
                            {{ Form::label( __('Software')) }}<br>-->
                            @if ($serviceOrder->type_service_id=='2')
                            {{ Form::radio('type_service_id','2',true) }}
                            @else
                            {{ Form::radio('type_service_id','2') }}
                            @endif
                            {{ Form::label( __('Mechanic')) }}<br>
                            @if ($serviceOrder->type_service_id=='3')
                            {{ Form::radio('type_service_id','3',true) }}
                            @else
                            {{ Form::radio('type_service_id','3') }}
                            @endif
                            {{ Form::label( __('Electronic')) }}<br>
                            @if ($serviceOrder->type_service_id=='4')
                            {{ Form::radio('type_service_id','4',true) }}
                            @else
                            {{ Form::radio('type_service_id','4') }}
                            @endif
                            {{ Form::label( __('Electric')) }}<br>
                            <!--{{ Form::select('type_service_id', $service, $serviceOrder->type_service_id, ['class' => 'form-control' . ($errors->has('type_service_id') ? ' is-invalid' : ''), 'placeholder' => 'Tipo de servicio']) }}
                            {!! $errors->first('type_service_id', '<div class="invalid-feedback">:message</div>') !!}-->
                        </div>
                    </td>
                    <td style="width:20%"></td>
                </tr>
            </table>
            
        </div>

        

        <div class="form-group" hidden>
            {{ Form::label('status_order_id') }}
            {{ Form::text('status_order_id', 1) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <div class="form-group" hidden>
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', 9999) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <br>
    </div>
    <div class="box-footer mt20" style="text-align:center;">
        <button type="submit" class="btn btn-success btn-lg"><i class="far fa-thumbs-up"></i>&nbsp{{ __('Accept')}}</button>
        <!--<a class="btn btn-danger btn-lg" href="{{ route('service-orders.index') }}"> Cancel</a>-->
    </div>
</div>


