@extends('layouts.app')

@section('template_title')
    Update Service Order
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Service Order</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('service-orders.update', $serviceOrder->service_order_id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('service-order.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
