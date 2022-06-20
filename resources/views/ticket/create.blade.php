@extends('layouts.app')

@section('template_title')
    Create Ticket
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create Ticket')}}</span>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="{{ route('tickets.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('ticket.form')

                        </form>
                        
                        @include('ticket.modal.contact')
                        @include('ticket.modal.customer')
                    </div>
                    <div hidden>
                    @include('dropdown')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
