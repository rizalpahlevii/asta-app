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
                                <span class="d-block font-15 text-dark font-weight-500">Users</span>
                            </div>
                            <div>
                                <span class="text-success font-14 font-weight-500">+10%</span>
                            </div>
                        </div>
                        <div class="text-center">
                            <span class="d-block display-4 text-dark mb-5">36.1K</span>
                            <small class="d-block">172,458 Target Users</small>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-5">
                            <div>
                                <span class="d-block font-15 text-dark font-weight-500">Campaign
                                    Leads</span>
                            </div>
                            <div>
                                <span class="text-success font-14 font-weight-500">+12.5%</span>
                            </div>
                        </div>
                        <div class="text-center">
                            <span class="d-block display-4 text-dark mb-5"><span
                                    class="counter-anim">168,856</span></span>
                            <small class="d-block">472,458 Targeted</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-5">
                            <div>
                                <span class="d-block font-15 text-dark font-weight-500">New
                                    Contacts</span>
                            </div>
                            <div>
                                <span class="text-warning font-14 font-weight-500">-2.8%</span>
                            </div>
                        </div>
                        <div class="text-center">
                            <span class="d-block display-4 text-dark mb-5">73</span>
                            <small class="d-block">100 Targeted</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-5">
                            <div>
                                <span class="d-block font-15 text-dark font-weight-500">Win/Loss
                                    Ratio</span>
                            </div>
                            <div>
                                <span class="text-danger font-14 font-weight-500">-75%</span>
                            </div>
                        </div>
                        <div class="text-center">
                            <span class="d-block display-4 text-dark mb-5">48:65</span>
                            <small class="d-block">42:32 Targeted</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
