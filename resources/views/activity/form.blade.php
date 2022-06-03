<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Servicio') }}
            {{ Form::select('service_id', $service, $activity->service_id, ['class' => 'form-control' . ($errors->has('service_id') ? ' is-invalid' : ''), 'placeholder' => 'Service Report Id']) }}
            {!! $errors->first('service_report_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Actividad') }}
            {{ Form::textarea('description_activity', $activity->description_activity, ['class' => 'form-control' . ($errors->has('description_activity') ? ' is-invalid' : ''), 'placeholder' => 'Description Activity']) }}
            {!! $errors->first('description_activity', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div>
            {{ Form::label('Evidencia') }}
            <table class=table align="center">
                <tr>
                    <td align="center">
                        <h5>Antes:</h5>

                        <div class="form-group">
                            <img src="{{ asset('storage').'/'.$activity->previous_evidence }}" width="100" height="100" alt="">
                            {{ Form::file('previous_evidence') }}
                            {!! $errors->first('previous_evidence', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </td>
                    <td align="center">
                        <h5>Despues:</h5>
                        <div class="form-group">
                            <img src="{{ asset('storage').'/'.$activity->subsequent_evidence }}" width="100" height="100" alt="">
                            {{ Form::file('subsequent_evidence') }}
                            {!! $errors->first('subsequent_evidence', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </td>
                    <br>
                </tr>
            </table>
        </div>
        <div class="form-group">
            <h5>Firmas:</h5>
            
            <img src="{{ asset('storage').'/'.$activity->signature_evidence }}" width="300" alt="">    
            {{ Form::file('signature_evidence') }}
            {!! $errors->first('signature_evidence', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" hidden>
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', 0) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group" >
            {{ Form::label('Empleado:') }}
            {{ $activity->service_id }}
        </div>
        <br>

    </div>
    <br>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-sm btn-primary">Aceptar</button>
        <a class="btn btn-danger btn-sm" href="{{ route('activities.index') }}"> Cancelar</a>
    </div>
</div>