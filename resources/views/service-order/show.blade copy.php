@extends('layouts.app')

@section('template_title')
    {{ $serviceOrder->name ?? 'Show Service Order' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Datos de la orden de servicio</span>
                        </div>
                        <div class="float-right">
                            <br>
                            <a class="btn btn-primary" href="{{ route('service-orders.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>No. de la orden del servicio:</strong>
                            {{ $serviceOrder->service_order_id }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha asignada:</strong>
                            {{ $serviceOrder->date_order }}
                        </div>
                        <div class="form-group">
                            <strong>Ticket:</strong>
                            {{ $serviceOrder->ticket->customer->name }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo de mantenimiento:</strong>
                            {{ $serviceOrder->typemaintenance->name }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo de servicio:</strong>
                            {{ $serviceOrder->typeservice->name }}
                        </div>
                        <div class="form-group">
                            <strong>Estado de la orden:</strong>
                            {{ $serviceOrder->orderstatus->name }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $serviceOrder->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha de registro:</strong>
                            {{ $serviceOrder->date_registration }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
