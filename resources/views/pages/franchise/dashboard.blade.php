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

        </div>
    </div>
</div>
@endsection
@push('script')
<script>
    $(document).ready(function(){
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
    });
</script>
@endpush
