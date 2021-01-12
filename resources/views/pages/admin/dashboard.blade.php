@extends('layouts.template')
@section('page','Dashboard')
@section('content')
<!-- Row -->
<div class="row">
    <div class="col-xl-12">
        <div class="hk-row">
            <div class="col-lg-3 col-md-6">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-5">
                            <div>
                                <span class="d-block font-15 text-dark font-weight-500">Franchise</span>
                            </div>

                        </div>
                        <div class="text-center">
                            <span class="d-block display-4 text-dark mb-5">
                                <span class="counter-anim">{{ $franchise }}</span>
                            </span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-5">
                            <div>
                                <span class="d-block font-15 text-dark font-weight-500">
                                    Supplier
                                </span>
                            </div>

                        </div>
                        <div class="text-center">
                            <span class="d-block display-4 text-dark mb-5">
                                <span class="counter-anim">{{ $supplier }}</span>
                            </span>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-5">
                            <div>
                                <span class="d-block font-15 text-dark font-weight-500">
                                    All Income
                                </span>
                            </div>

                        </div>
                        <div class="text-center">
                            <span class="d-block display-4 text-dark mb-5">
                                <span>@currency($income)</span>
                            </span>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
