<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <strong>{{ Form::label( __('Key')) }}</strong>
            <!--{{ Form::select('tool_id', $tool, $toolAssigned->tool_id, ['class' => 'form-select' . ($errors->has('tool_id') ? ' is-invalid' : ''), 'placeholder' => 'Tool']) }}
            {!! $errors->first('material_id', '<div class="invalid-feedback">:message</div>') !!}-->

            <select class="form-select" id="tool_id" name="tool_id" required>
                <option value="">--{{ __('Select tool')}}--</option>
                @foreach ($tools as $item)
                    <option value="{{$item->tool_id}}">{{$item->key}} - {{$item->name}}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <strong>{{ Form::label( __('Quantity')) }}</strong>
            {{ Form::text('quantity', $toolAssigned->quantity, ['class' => 'form-control' . ($errors->has('quantity') ? ' is-invalid' : ''), 'placeholder' => __('Quantity')]) }}
            {!! $errors->first('quantity', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" hidden>
            {{ Form::label('Unit measure:') }}
            {{ Form::text('unit_measure', "", ['class' => 'form-control' . ($errors->has('unit_measure') ? ' is-invalid' : ''), 'placeholder' => 'Unit Measure']) }}
            {!! $errors->first('unit_measure', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" hidden>
            {{ Form::label('Usage:') }}
            {{ Form::text('usage', "", ['class' => 'form-control' . ($errors->has('usage') ? ' is-invalid' : ''), 'placeholder' => 'Usage']) }}
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
        <button type="submit" class="btn btn-primary btn-lg">{{__('Accept')}}</button>
        <!--<a class="btn btn-danger btn-lg" href="{{ route('tool-assigneds.index') }}"> Cancel</a>-->
    </div>
</div>