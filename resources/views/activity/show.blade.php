@extends('layouts.app')

@section('template_title')
    {{ $activity->name ?? 'Show Activity' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Actividad</span>
                        </div>
                        <br>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('activities.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Reporte del servicio:</strong><br>
                            {{ $activity->service_id }}
                        </div>
                        <div class="form-group">
                            <strong>Description Activity:</strong><br>
                            {{ $activity->description_activity }}
                        </div>
                        <div class="form-group">
                            <strong>Previous Evidence:</strong><br>
                            <img src="{{ asset('app/public').'/'.$activity->previous_evidence }}" width="300" height="300" alt="">  
                            <?php echo (asset('app/public').'/'.$activity->previous_evidence) ?>
                        </div>
                        <div class="form-group">
                            <strong>Subsequent Evidence:</strong><br>
                            <img src="{{ asset('app/public').'/'.$activity->subsequent_evidence }}" width="300" height="300" alt=""> 
                        </div>
                        <div class="form-group">
                            <strong>Signature Evidence:</strong><br>
                            <img src="{{  $activity->signature_evidence }}" width="100%" height="300" alt="">
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong><br>
                            {{ $activity->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Date Registration:</strong><br>
                            {{ $activity->date_registration }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
