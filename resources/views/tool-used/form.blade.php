<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
            <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

            <strong>{{ Form::label( __('Key')) }}</strong>

            <br><br>
            
            <select class="form-select" id="tool_id" name="tool_id" style="width:100%" required>
                <option value="">--{{ __('Select tool')}}--</option>
                @if($toolUseds->isEmpty())
                    @foreach ($tools2 as $item)
                        <option value="{{$item->tool_id}}" data-stock="{{$item->tool->stock}}" data-unity="{{$item->tool->unitMeasure->name}}" data-quantity="{{ $item->quantity }}">{{$item->tool->key}} - {{$item->tool->name}}</option>
                    @endforeach
                @else
                    @foreach ($tool2 as $item)
                        <option value="{{$item->tool_id}}" data-stock="{{$item->tool->stock}}" data-unity="{{$item->tool->unitMeasure->name}}" data-quantity="{{ $item->quantity }}">{{$item->tool->key}} - {{$item->tool->name}}</option>
                    @endforeach
                @endif
            </select>

            <script>
                var value_input;
                $('select').on('change', function() {
                    var data = this.value;
                    var quantity = $(this).find(':selected').data('quantity');
                    $("#quantity").val(quantity);
                    document.getElementById("quantity2").value = quantity;
                });                           
            </script>
        </div>
        
        <div class="form-group">
            <strong>{{ Form::label( __('Quantity')) }}</strong>
            {{ Form::number('quantity', $toolUsed->quantity, ['class' => 'form-control' . ($errors->has('quantity') ? ' is-invalid' : ''), 'placeholder' => __('Quantity'), 'id'=>'quantity2','data-decimals'=>'1', 'step'=>'0.1', 'min'=>'0', 'required']) }}
            {!! $errors->first('quantity', '<div class="invalid-feedback">:message</div>') !!}
            
        </div>
        
        <div class="form-group" hidden>
            {{ Form::label('service Id') }}
            {{ Form::text('service_id', $service->service_id, ['class' => 'form-control' . ($errors->has('service_id') ? ' is-invalid' : ''), 'placeholder' => 'service_id']) }}
            {!! $errors->first('service_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <div class="form-group" hidden>
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', 9999) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>

    </div>
    <div class="box-footer mt20" style="text-align:center;">
        <button type="submit" class="btn btn-success btn-lg"><i class="material-icons" style="font-size:20px">thumb_up</i>&nbsp; {{__('Accept')}}</button>
        <!--<a class="btn btn-danger btn-lg" href="{{ route('tool-assigneds.index') }}"> Cancel</a>-->
    </div>
</div>