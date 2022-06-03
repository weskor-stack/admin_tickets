@extends('layouts.app')

@section('template_title')
    Update Ticket Status
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar estado del Ticket</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('ticket-statuses.update', $ticketStatus->status_ticket_id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('ticket-status.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
