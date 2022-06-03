@extends('layouts.app')

@section('template_title')
    {{ $ticket->name ?? 'Show Ticket' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ticket {{ $ticket->ticket_id }}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tickets.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Ticket:</strong>
                            {{ $ticket->ticket_id }}
                        </div>
                        <div class="form-group">
                            <strong>Subject:</strong>
                            {{ $ticket->subject }}
                        </div>
                        <div class="form-group">
                            <strong>Problem:</strong>
                            {{ $ticket->problem }}
                        </div>
                        <div class="form-group">
                            <strong>Date of Ticket:</strong>
                            {{ $ticket->date_ticket }}
                        </div>
                        <div class="form-group">
                            <strong>Ticket status:</strong>
                            {{ $ticket->ticketStatus->name }}
                        </div>
                        <div class="form-group">
                            <strong>Customer:</strong>
                            {{ $ticket->customer->name }}
                        </div>
                        <div class="form-group">
                            <strong>Contact:</strong>
                            {{ $ticket->contact->name }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $ticket->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Date Registration:</strong>
                            {{ $ticket->date_registration }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
