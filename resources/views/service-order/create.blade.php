@extends('layouts.app')

@section('template_title')
    Create Service Order
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create order</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('service-orders.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('service-order.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
