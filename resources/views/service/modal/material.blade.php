<form action="{{ route('material-useds.update', $materialUsed->material_id) }}" method="post" enctype="multipart/form-data">
    {{ method_field('patch') }}
    {{ csrf_field() }}
    <div class="modal fade" id="dialogo9{{ $materialUsed->material_id }}" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- cabecera del diálogo -->
                    <div class="modal-header">
                        <h4 class="modal-title">{{ __('Edit Material') }}</h4>
                    </div>
                <!-- cuerpo del diálogo -->
                    <div class="modal-body">
                        <div class="card-body">
                            <b>{{ __('Stock') }}: </b><input type="text" id="text10" name="text10" style="width:70px;" value="{{$materialUsed->material->stock}}" disabled> &nbsp;&nbsp; 
                            <b>{{ __('unit_measure') }}: </b><input type="text" id="text12" name="text12" style="width:80px;" value="{{$materialUsed->material->unitMeasure->name}}"disabled><br> <br>
                            
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>{{ __('Material') }}:</strong>
                                <input type="text" class="form-control" widht="100%" placeholder="{{ $materialUsed->material->name }}" disabled>
                                {{ Form::text('material_id', $materialUsed->material_id, ['class' => 'form-control' . ($errors->has('material_id') ? ' is-invalid' : ''), 'placeholder' => 'Material Id','hidden']) }}
                                {!! $errors->first('material_id', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>{{ __('Quantity') }}:</strong>
                                {{ Form::number('quantity', $materialUsed->quantity, ['class' => 'form-control' . ($errors->has('quantity') ? ' is-invalid' : ''), 'id'=>'quantity','placeholder' => 'Quantity', 'placeholder' => __('Quantity'), 'data-decimals'=>'2', 'step'=>'0.01', 'min'=>'0', 'required']) }}
                                {!! $errors->first('quantity', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>

                        <br>

                        <div class="col-xs-12 col-sm-12 col-md-12" style="text-align:center;">
                            <button type="submit" class="btn btn-success btn-lg"><i class="far fa-thumbs-up"></i>&nbsp; {{ __('Edit') }}</button>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12" hidden>
                            <div class="form-group">
                                <strong>{{ __('Service Id') }}:</strong>
                                {{ Form::text('service_id', $materialUsed->service_id, ['class' => 'form-control' . ($errors->has('service_id') ? ' is-invalid' : ''), 'placeholder' => 'service_order_id']) }}
                                {!! $errors->first('service_id', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12" hidden>
                            <div class="form-group">
                                <strong>{{ __('User id') }}:</strong>
                                {{ Form::text('user_id', 9999) }}
                                {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>
                            
                        </div>                                                           
                    </div>
                                                                
                <!-- pie del diálogo -->
                    <div class="modal-footer" style="text-align:center;">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i>&nbsp; {{ __('Close') }}</button>
                    </div>
                    
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </div>
</form>