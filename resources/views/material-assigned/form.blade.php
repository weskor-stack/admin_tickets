<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

            <strong>{{__('Key')}}</strong>
            <!--{{ Form::select('material_id', $material, $materialAssigned->material_id, ['class' => 'form-select' . ($errors->has('material_id') ? ' is-invalid' : ''), 'placeholder' => 'Material Id']) }}
            {!! $errors->first('material_id', '<div class="invalid-feedback">:message</div>') !!}-->
            
            <select class="form-select" id="material_id" name="material_id" required>
                <option value="">--{{ __('Select material')}}--</option>
                @if($materialAssigneds->isEmpty())
                    @foreach ($materials as $item)
                        <option value="{{$item->material_id}}" data-stock="{{$item->stock}}" data-unity="{{$item->unitMeasure->name}}">{{$item->key}} - {{$item->name}}</option>
                    @endforeach
                @else
                    @foreach ($material2 as $item)
                        <option value="{{$item->material_id}}" data-stock="{{$item->stock}}" data-unity="{{$item->unitMeasure->name}}">{{$item->key}} - {{$item->name}}</option>
                    @endforeach
                @endif
            </select>

            <script>
                $(document).ready(function() {
                    $('.select2').select2({
                        closeOnSelect: false
                    });
                });
            </script>

            <br>
        </div>
        <div class="form-group">
            <strong>{{ __('Quantity')}}</strong> <br>
            <!--{{ Form::number('quantity', $materialAssigned->quantity, ['class' => 'form-control' . ($errors->has('quantity') ? ' is-invalid' : ''), 'id'=>'quantity', 'name'=>'quantity', 'placeholder' => __('Quantity'), 'data-decimals'=>'2', 'step'=>'0.1', 'min'=>'0', 'required']) }}
            {!! $errors->first('quantity', '<div class="invalid-feedback">:message</div>') !!}
            <input class="form-control" type="number" name="quantity" id="quantity" data-decimals="2" step="0.1" min="0" onkeydown="elementoCantidad(this)" value=" " required>-->

            <input class="form-control" type="number" name="quantity" id="quantity" data-decimals="2" step="0.1" min="0" required>            
        </div>
        
        <div class="form-group" hidden>
            {{ Form::label('service order') }}
            {{ Form::text('service_order_id', $serviceOrder->service_order_id, ['class' => 'form-control' . ($errors->has('usage') ? ' is-invalid' : ''), 'placeholder' => 'service_order_id']) }}
            {!! $errors->first('usage', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <div class="form-group" hidden>
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', 9999) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <br>

    </div>
    <div class="box-footer mt20" style="text-align:center;">
        <button type="submit" class="btn btn-success btn-lg">{{ __('Accept')}}</button>
        <!--<a class="btn btn-danger btn-lg" href="{{ route('material-assigneds.index') }}"> Cancel</a>-->
    </div>
</div>