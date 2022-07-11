<div class="box box-info padding-1">
    <div class="box-body">
        <div class="col-auto p-5 text-center">
            <table>
                <tr style="text-align: center; font-size: 15px;  font-weight: bold; text-align: center; vertical-align: center;">
                    <td align="center" hidden><b>Día</b></td>
                    
                    <td style="width:8%"><b>{{ __('Entry')}}</b></td>
                    <td style="width:8%"><b>{{ __('Completion')}}</b></td>
                    <td style="width:8%"><b>{{ __('Lunchtime')}}</b></td>
                    <td hidden><b>{{ __('Service hour')}}</b></td>
                    <td style="width:5%"><b>{{ __('Service extra')}}</b></td>
                    <td style="width:5%"><b>{{ __('Duration travel')}}</b></td>
                    <td style="width:20%">{{ __('Date service')}}</td>
                    <td style="width:20%">{{ __('Employee')}}</td>
                </tr>
                <tr style="text-align: center">
                    <td hidden>
                        <div class="form-group">
                            {{ Form::label('service_id') }}
                            {{ Form::text('service_id', $service->service_id, ['class' => 'form-control' . ($errors->has('service_id') ? ' is-invalid' : ''), 'placeholder' => 'Service Id']) }}
                            {!! $errors->first('service_id', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </td>
                    <td style="width:5%">
                        <div class="form-group">
                            
                            <input type="text" class="form-control" name="time_entry" id="time_entry" required>
                            
                        </div>
                    </td>
                    <td style="width:5%">
                        <div class="form-group">
                            <!--{{ Form::text('time_completion', $serviceReport->time_completion, ['class' => 'form-control' . ($errors->has('time_completion') ? ' is-invalid' : ''), 'placeholder' => 'Time Completion', 'min'=>'07:00', 'max'=>'23:00','requiered']) }}
                            {!! $errors->first('time_completion', '<div class="invalid-feedback">:message</div>') !!}-->
                            <input type="text" class="form-control" name="time_completion" id="time_completion" required>
                        </div>
                    </td>
                    <td style="width:5%">
                        <div class="form-group">
                            {{ Form::time('lunchtime', $serviceReport->lunchtime, ['class' => 'form-control' . ($errors->has('lunchtime') ? ' is-invalid' : ''), 'placeholder' => 'Lunchtime', 'required']) }}
                            {!! $errors->first('lunchtime', '<div class="invalid-feedback">:message</div>') !!}
                            <!--<input type="text" class="form-control" name="time_completion" id="time_completion" required>-->
                        </div>
                    </td>
                    <td hidden>
                        <div class="form-group">
                            {{ Form::text('service_hours', $serviceReport->service_hours, ['class' => 'form-control' . ($errors->has('service_hours') ? ' is-invalid' : ''), 'placeholder' => __('Service hour')]) }}
                            {!! $errors->first('service_hours', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </td>
                    <td style="width:7%">
                         <div class="form-group">
                            <!--{{ Form::text('service_extras', $serviceReport->service_extras, ['class' => 'form-control' . ($errors->has('service_extras') ? ' is-invalid' : ''), 'placeholder' =>  __('Service extra')]) }}
                            {!! $errors->first('service_extras', '<div class="invalid-feedback">:message</div>') !!}-->

                            <select class="form-select" id="service_extras" name="service_extras" requiered>
                                <option value="0">0 hr.</option>
                                <option value="1">1 hr.</option>
                                <option value="2">2 hrs.</option>
                                <option value="3">3 hrs.</option>
                                <option value="4">4 hrs.</option>
                                <option value="5">5 hrs.</option>
                            </select>
                        </div>
                    </td>
                    <td style="width:5%">
                        <div class="form-group">
                            <!--{{ Form::text('duration_travel', $serviceReport->duration_travel, ['class' => 'form-control' . ($errors->has('duration_travel') ? ' is-invalid' : ''), 'placeholder' =>  __('Duration travel')]) }}
                            {!! $errors->first('duration_travel', '<div class="invalid-feedback">:message</div>') !!}-->

                            <select class="form-select" id="duration_travel" name="duration_travel" requiered>
                                <option value="0">0 hr.</option>
                                <option value="1">1 hr.</option>
                                <option value="2">2 hrs.</option>
                                <option value="3">3 hrs.</option>
                                <option value="4">4 hrs.</option>
                                <option value="5">5 hrs.</option>
                            </select>
                        </div>
                    </td>
                    <td style="width:20%">
                        <div class="form-group">
                            {{ Form::date('date_service', date('Y-m-d'), ['class' => 'form-control' . ($errors->has('date_service') ? ' is-invalid' : ''), 'placeholder' => 'Date Service', 'required']) }}
                            {!! $errors->first('date_service', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </td>
                    
                    <td style="width:20%">
                        <div class="form-group">
                            <!--{{ Form::select('employee_id', $employeeOrders, $serviceReport->employee_id, ['class' => 'form-select' . ($errors->has('employee_id') ? ' is-invalid' : ''), 'placeholder' => __('Employee')]) }}
                            {!! $errors->first('employee_id', '<div class="invalid-feedback">:message</div>') !!}-->
                            <select class="form-select" id="employee_id" name="employee_id" required>
                                <option value="">--{{ __('Select employee')}}--</option>
                                @foreach ($employeeOrders as $item)
                                    @if($item->service_order_id == $service->service_order_id)
                                    <option value="{{$item->employee_id}}">{{$item->employee->name}} {{$item->employee->last_name}}</option>
                                    @endif
                                @endforeach
                            </select>                            
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        
        <div class="form-group" hidden>
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', 9999) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>
    </div>
    <div class="box-footer mt20" style="text-align:center">
        <button type="submit" class="btn btn-success btn-lg" href="{{ route('services.index') }}">{{ __('Accept')}}</button>
        <!--<a class="btn btn-danger btn-lg" href="{{ route('services.index') }}"> Cancel</a>-->
    </div>
</div>