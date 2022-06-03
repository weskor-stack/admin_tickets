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
            {{ Form::label('Date orden:') }}
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
                        {{ Form::label('Type of maintenance:') }}<br>
                        @if ($serviceOrder->type_maintenance_id=='1')
                        {{ Form::radio('type_maintenance_id','1',true) }}
                        @else
                        {{ Form::radio('type_maintenance_id','1') }}
                        @endif
                        {{ Form::label('Preventive') }}<br>
                        @if ($serviceOrder->type_maintenance_id=='2')
                        {{ Form::radio('type_maintenance_id','2',true) }}
                        @else
                        {{ Form::radio('type_maintenance_id','2') }}
                        @endif
                        {{ Form::label('Corrective') }}<br>
                        @if ($serviceOrder->type_maintenance_id=='3')
                        {{ Form::radio('type_maintenance_id','3'),true }}
                        @else
                        {{ Form::radio('type_maintenance_id','3') }}
                        @endif
                        {{ Form::label('Predictive') }}<br>
                        @if ($serviceOrder->type_maintenance_id=='4')
                        {{ Form::radio('type_maintenance_id','4',true) }}
                        @else
                        {{ Form::radio('type_maintenance_id','4') }}
                        @endif
                        {{ Form::label('Including') }}<br>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            {{ Form::label('Type of service:') }}<br>
                            @if ($serviceOrder->type_service_id=='1')
                            {{ Form::radio('type_service_id','1',true) }}
                            @else
                            {{ Form::radio('type_service_id','1') }}
                            @endif
                            {{ Form::label('Software') }}<br>
                            @if ($serviceOrder->type_service_id=='2')
                            {{ Form::radio('type_service_id','2',true) }}
                            @else
                            {{ Form::radio('type_service_id','2') }}
                            @endif
                            {{ Form::label('Mechanic') }}<br>
                            @if ($serviceOrder->type_service_id=='3')
                            {{ Form::radio('type_service_id','3',true) }}
                            @else
                            {{ Form::radio('type_service_id','3') }}
                            @endif
                            {{ Form::label('Electronic') }}<br>
                            @if ($serviceOrder->type_service_id=='4')
                            {{ Form::radio('type_service_id','4',true) }}
                            @else
                            {{ Form::radio('type_service_id','4') }}
                            @endif
                            {{ Form::label('Electric') }}<br>
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


