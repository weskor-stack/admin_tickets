<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group" hidden>
            {{ Form::label('Servicio') }}
            {{ Form::text('service_id', $service->service_id, ['class' => 'form-control' . ($errors->has('service_id') ? ' is-invalid' : ''), 'placeholder' => 'Service Report Id']) }}
            {!! $errors->first('service_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <div class="form-group">
            <legend>{{ __('Activities implemented') }}</legend>
            {{ Form::textarea('description_activity', $activity->description_activity, ['class' => 'form-control' . ($errors->has('description_activity') ? ' is-invalid' : ''), 'placeholder' => __('Descripction')]) }}
            {!! $errors->first('description_activity', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div>
        <legend>{{ __('Evidence') }} </legend>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            
            <table class=table align="center">
                <tr>
                    <td align="center">
                        <h5>{{ __('Before')}}:</h5>

                        <div class="form-group">
                            <img src="{{ asset('storage').'/'.$activity->previous_evidence }}" id="blah" width="100" height="100" alt="">
                            <input type="file" id="previous_evidence" name="previous_evidence" multiple><br><br>
                            {!! $errors->first('previous_evidence', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </td>
                    <td align="center">
                        <h5>{{ __('After') }}:</h5>
                        <div class="form-group">
                            <img src="{{ asset('storage').'/'.$activity->subsequent_evidence }}" id="blah2" width="100" height="100" alt="">
                            <input type="file" id="subsequent_evidence" name="subsequent_evidence" multiple><br><br>
                            
                            {!! $errors->first('subsequent_evidence', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                    </td>
                    <br>
                </tr>
            </table>
            <script type="text/javascript" src="{{ asset('js/site.js') }}"></script>
        </div>
        <div class="form-group">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <legend>{{ __('Signature') }}</legend>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" />     
            <link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">
            <style>
                .kbw-signature { width: 100%; height: 200px;}
                #sig canvas{ width: 100% !important; height: auto;}
            </style>

            <div>
            <div>
                <div>
                    <div>
                        <div>
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success  alert-dismissible">
                                         
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif
                                <form method="POST" action="{{ route('activities.store') }}">
                                    @csrf
                                    <div class="col-md-12">
                                        <!--<label class="" for="">Firmas de evidencia</label>-->
                                        <br/>
                                        <div id="sig"></div>
                                        <br><br>
                                        <button id="clear" class="btn btn-warning btn-sm">{{ __('Clear')}}</button>
                                        
                                        <textarea id="signature" name="signed" style="display: none"></textarea>
                                        {!! $errors->first('signature', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> 
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
            <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
            <script type="text/javascript">
                var sig = $('#sig').signature({syncField: '#signature', syncFormat: 'PNG'});
                $('#clear').click(function(e) {
                    e.preventDefault();
                    sig.signature('clear');
                    $("#signature").val('');
                });
            </script>
        </div>
        <div class="form-group" hidden>
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', 0) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <br>

    </div>
    <br>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary btn-lg" id="btnEnviar">{{ __('Accept')}}</button>
        <!--<a class="btn btn-danger btn-lg" href="{{ route('services.index') }}"> Cancel</a>-->
    </div>
</div>