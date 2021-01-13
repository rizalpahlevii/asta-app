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
                                <span class="d-block font-15 text-dark font-weight-500">Order Count</span>
                            </div>
                            <div>
                                <select name="type-count-order" id="type-count-order"
                                    class="form-controlform-control custom-select form-control custom-select-sm ">
                                    <option value="all">All time</option>
                                    <option value="15">15 Days</option>
                                    <option value="30">30 Days</option>
                                    <option value="60">60 Days</option>
                                    <option value="90">90 Days</option>
                                    <option value="90">120 Days</option>
                                </select>
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <span class="d-block display-4 text-dark mb-5" id="load-order-count">{{ $order }}</span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-5">
                            <div>
                                <span class="d-block font-15 text-dark font-weight-500">Supplier</span>
                            </div>
                        </div>
                        <div class="text-center mt-3 mb-3">
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
                                <span class="d-block font-15 text-dark font-weight-500">Product</span>
                            </div>
                        </div>
                        <div class="text-center mt-3 mb-3">
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
                                <span class="d-block font-15 text-dark font-weight-500">Income</span>
                            </div>
                        </div>
                        <div class="text-center mt-3 mb-3">
                            <span class="d-block display-4 text-dark mb-5">
                                @currency($income)
                            </span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-xl-12">
        <section class="hk-sec-wrapper">
            <div class="d-flex justify-content-between mb-5">
                <div>
                    <span class="d-block font-15 text-dark font-weight-500">Order Count</span>
                </div>
                <div>
                    <select name="type-count-order" id="type-count-order-chart"
                        class="form-controlform-control custom-select form-control custom-select-sm ">
                        <option value="all">All time</option>
                        <option value="15">15 Days</option>
                        <option value="30">30 Days</option>
                        <option value="60">60 Days</option>
                        <option value="90">90 Days</option>
                        <option value="90">120 Days</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div id="m_chart_2" class="" style="height:294px;"></div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
@push('style')
<!-- Morris Charts CSS -->
<link href="{{ asset('admin_template') }}/vendors/morris.js/morris.css" rel="stylesheet" type="text/css" />

@endpush
@push('script')
<script src="{{ asset('admin_template') }}/vendors/echarts/dist/echarts-en.min.js"></script>

<script src="{{ asset('admin_template') }}/vendors/raphael/raphael.min.js"></script>
<script src="{{ asset('admin_template') }}/vendors/morris.js/morris.min.js"></script>
<script>
    $(document).ready(function(){
        loadChart("all");
        $('#type-count-order').change(function(){
            url = `{{ route('franchise.dashboard.get_data') }}?order_count=${$(this).val()}`
            $.ajax({
                url : url,
                method: 'get',
                dataType: 'json',
                success: function(response){
                    $('#load-order-count').text(response);
                }
            });
        });
        $('#type-count-order-chart').change(function(){
            loadChart($(this).val());
        });
        function loadChart(param){
            $('#m_chart_2').html('');
            url = `{{ route('franchise.dashboard.get_chart_data') }}?order_count=${param}`;
            $.ajax({
                url : url,
                method : 'get',
                dataType : 'json',
                success:function(response){
                    Morris.Line({
                        element: 'm_chart_2',
                        data: response,
                        xkey: 'order_date',
                        ykeys: ['total'],
                        labels: ['Order Count'],
                        pointSize: 3,
                        fillOpacity: 0,
                        lineWidth:2,
                        pointFillColors:['#fff'],
                        pointStrokeColors:['#00acf0'],
                        behaveLikeLine: true,
                        hideHover: 'auto',
                        gridLineColor: '#eaecec',
                        lineColors: ['#00acf0'],
                        resize: true,
                        smooth:true,
                        gridTextColor:'#5e7d8a',
                        gridTextFamily:"Inherit",
                        xLabels : "day"
                    });
                }
            });
        }
    });
</script>
@endpush
