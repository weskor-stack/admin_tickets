<form action="{{ route('tool-assigneds.update', $toolAssigned->tool_id) }}" method="post" enctype="multipart/form-data">
    {{ method_field('patch') }}
    {{ csrf_field() }}
    <div class="modal fade" id="dialogo8{{ $toolAssigned->tool_id }}">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- cabecera del diálogo -->
                    <div class="modal-header">
                        <h4 class="modal-title">{{ __('Edit Tool') }}</h4>
                    </div>
                <!-- cuerpo del diálogo -->
                    <div class="modal-body">
                        <div class="card-body">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>{{ __('Tools') }}:</strong>
                                <input type="text" class="form-control" widht="100%" placeholder="{{ $toolAssigned->tool->name }}" disabled>
                                {{ Form::text('tool_id', $toolAssigned->tool_id, ['class' => 'form-control' . ($errors->has('tool_id') ? ' is-invalid' : ''), 'placeholder' => 'Tool Id','hidden']) }}
                                {!! $errors->first('tool_id', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>{{ __('Quantity') }}:</strong>
                                {{ Form::text('quantity', $toolAssigned->quantity, ['class' => 'form-control' . ($errors->has('quantity') ? ' is-invalid' : ''), 'placeholder' => 'Quantity']) }}
                                {!! $errors->first('quantity', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>

                        <br>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <button type="submit" class="btn btn-primary btn-lg">{{ __('Edit') }}</button>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12" hidden>
                            <div class="form-group">
                                <strong>{{ __('Unit measure') }}:</strong>
                                {{ Form::text('unit_measure', " ", ['class' => 'form-control' . ($errors->has('unit_measure') ? ' is-invalid' : ''), 'placeholder' => 'Unit Measure']) }}
                                {!! $errors->first('unit_measure', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12" hidden>
                            <div class="form-group">
                                <strong>{{ __('Usage') }}:</strong>
                                {{ Form::text('usage', " ", ['class' => 'form-control' . ($errors->has('usage') ? ' is-invalid' : ''), 'placeholder' => 'Usage']) }}
                                {!! $errors->first('usage', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12" hidden>
                            <div class="form-group">
                                <strong>{{ __('Service order') }}:</strong>
                                {{ Form::text('service_order_id', $toolAssigned->service_order_id, ['class' => 'form-control' . ($errors->has('usage') ? ' is-invalid' : ''), 'placeholder' => 'service_order_id']) }}
                                {!! $errors->first('usage', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12" hidden>
                            <div class="form-group">
                                <strong>{{ __('User id') }}:</strong>
                                {{ Form::text('user_id', 0) }}
                                {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>
                        
                        

                        </div>                                                           
                    </div>
                                                                
                <!-- pie del diálogo -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                    </div>
                    
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </div>
</form>