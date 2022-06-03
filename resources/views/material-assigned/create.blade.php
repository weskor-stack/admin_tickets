@extends('layouts.app')

@section('template_title')
    Create Material Assigned
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Add material</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('material-assigneds.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('material-assigned.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
