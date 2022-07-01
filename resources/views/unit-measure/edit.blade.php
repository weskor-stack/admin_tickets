@extends('layouts.app')

@section('template_title')
    Update Unit Measure
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Unit Measure</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('unit-measures.update', $unitMeasure->unit_measure_id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('unit-measure.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
