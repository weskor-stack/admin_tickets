<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <strong>{{__('Key')}}</strong>
            <!--{{ Form::select('material_id', $material, $materialAssigned->material_id, ['class' => 'form-select' . ($errors->has('material_id') ? ' is-invalid' : ''), 'placeholder' => 'Material Id']) }}
            {!! $errors->first('material_id', '<div class="invalid-feedback">:message</div>') !!}-->
            
            <select class="form-select" id="material_id" name="material_id" required>
                <option value="">--{{ __('Select material')}}--</option>
                @foreach ($materials as $item)
                    <option value="{{$item->material_id}}" data-stock="{{$item->stock}}" data-unity="{{$item->unit_measure}}">{{$item->key}} - {{$item->name}}</option>
                @endforeach
            </select>

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
            {{ Form::label('Unit measure') }}
            {{ Form::text('unit_measure', " ", ['class' => 'form-control' . ($errors->has('unit_measure') ? ' is-invalid' : ''), 'placeholder' => 'Unit Measure']) }}
            {!! $errors->first('unit_measure', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" hidden>
            {{ Form::label('Usage') }}
            {{ Form::text('usage', " ", ['class' => 'form-control' . ($errors->has('usage') ? ' is-invalid' : ''), 'placeholder' => 'Usage']) }}
            {!! $errors->first('usage', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group" hidden>
            {{ Form::label('service order') }}
            {{ Form::text('service_order_id', $serviceOrder->service_order_id, ['class' => 'form-control' . ($errors->has('usage') ? ' is-invalid' : ''), 'placeholder' => 'service_order_id']) }}
            {!! $errors->first('usage', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <div class="form-group" hidden>
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', 0) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <br>

    </div>
    <div class="box-footer mt20" style="text-align:center;">
        <button type="submit" class="btn btn-primary btn-lg">{{ __('Accept')}}</button>
        <!--<a class="btn btn-danger btn-lg" href="{{ route('material-assigneds.index') }}"> Cancel</a>-->
    </div>
</div>