@extends('layouts.app')

@section('template_title')
    Update Service Report
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Service Report</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('service-reports.update', $serviceReport->service_report_id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('service-report.form2')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
