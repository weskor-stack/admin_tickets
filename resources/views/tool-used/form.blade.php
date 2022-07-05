<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <strong>{{ Form::label( __('Key')) }}</strong>

            <select class="form-select" id="tool_id" name="tool_id" required>
                <option value="">--{{ __('Select tool')}}--</option>
                @foreach ($tools2 as $item)
                    <option value="{{$item->tool_id}}" data-stock="{{$item->tool->stock}}" data-unity="{{$item->tool->unitMeasure->name}}" data-quantity="{{ $item->quantity }}">{{$item->tool->key}} - {{$item->tool->name}}</option>
                @endforeach
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
            {{ Form::number('quantity', $toolUsed->quantity, ['class' => 'form-control' . ($errors->has('quantity') ? ' is-invalid' : ''), 'placeholder' => __('Quantity'), 'id'=>'quantity2','step'=>'0.01', 'min'=>'0','required']) }}
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
        <button type="submit" class="btn btn-primary btn-lg">{{__('Accept')}}</button>
        <!--<a class="btn btn-danger btn-lg" href="{{ route('tool-assigneds.index') }}"> Cancel</a>-->
    </div>
</div>