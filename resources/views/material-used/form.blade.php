<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

            <strong>{{__('Key')}}</strong>
            
            <br><br>

            <select class="form-select select2" id="material_id" name="material_id" style="width:100%" required>
                <option value="">--{{ __('Select material')}}--</option>
                @if($materialUseds->isEmpty())
                    @foreach ($materials2 as $item)
                        <option value="{{$item->material_id}}" data-stock="{{$item->material->stock}}" data-unity="{{$item->material->unitMeasure->name}}" data-quantity="{{ $item->quantity }}">{{$item->material->key}} - {{$item->material->name}}</option>
                    @endforeach
                @else
                    @foreach ($material2 as $item)
                        <option value="{{$item->material_id}}" data-stock="{{$item->material->stock}}" data-unity="{{$item->material->unitMeasure->name}}" data-quantity="{{ $item->quantity }}">{{$item->material->key}} - {{$item->material->name}}</option>
                    @endforeach
                @endif
            </select>

            

            <script>
                var value_input;
                $('select').on('change', function() {
                    var data = this.value;
                    var quantity = $(this).find(':selected').data('quantity');
                    $("#quantity").val(quantity);
                    document.getElementById("quantity").value = quantity;
                });                           
            </script>

            <br>
        </div>
        <div class="form-group">
            <strong>{{ __('Quantity')}}</strong> <br>

            <input class="form-control" type="number" name="quantity" id="quantity" data-decimals="1" step="0.1" min="0" required>            
        </div>
        
        <div class="form-group" hidden>
            {{ Form::label('service id') }}
            {{ Form::text('service_id', $service->service_id, ['class' => 'form-control' . ($errors->has('service_id') ? ' is-invalid' : ''), 'placeholder' => 'service_order_id']) }}
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
        <button type="submit" class="btn btn-success btn-lg"><i class="material-icons" style="font-size:20px">thumb_up</i>&nbsp; {{ __('Accept')}}</button>
        <!--<a class="btn btn-danger btn-lg" href="{{ route('material-assigneds.index') }}"> Cancel</a>-->
    </div>
</div>