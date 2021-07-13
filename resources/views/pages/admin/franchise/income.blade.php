@extends('layouts.template')

@section('page','Franchise Income : ' . $franchise->name)
@section('content')
<div class="hk-pg-header">
    <h4 class="hk-pg-title">@yield('page')</h4>

</div>
<div class="row">
    <input type="hidden" value="{{ $franchise->id }}" id="franchise_id">
    <div class="col-md-12 mb-3">
        <div class="card card-sm">
            <div class="card-body">
                <form action="" method="GET">

                    <div class="row">
                        <div class="col-md-3">
                            <select name="filter_by" id="filter_by" class="form-control">
                                <option disabled selected>Choose Option</option>

                                <option value="date" {{ request()->get('filter_by') == "date" ? 'selected' : '' }}>
                                    Date</option>
                                <option value="month" {{ request()->get('filter_by') == "month" ? 'selected' : '' }}>
                                    Month</option>
                                <option value="year" {{ request()->get('filter_by') == "year" ? 'selected' : '' }}>
                                    Year</option>
                            </select>
                        </div>
                        <div class="col-md-3 year-form" style="display: none;">
                            <select name="year" id="year" class="form-control @error('year') is-invalid @enderror">
                                @foreach ($year as $item)
                                <option value="{{ $item->year }}">{{ $item->year }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 month-form" style="display: none;">
                            <select name="month" id="month" class="form-control @error('month') is-invalid @enderror">
                                <option value="01" {{ request()->get('month')=="01" ? "selected":""}}>Jan
                                </option>
                                <option value="02" {{ request()->get('month')=="02" ? "selected":""}}>Feb
                                </option>
                                <option value="03" {{ request()->get('month')=="03" ? "selected":""}}>Mar
                                </option>
                                <option value="04" {{ request()->get('month')=="04" ? "selected":""}}>Apr
                                </option>
                                <option value="05" {{ request()->get('month')=="05" ? "selected":""}}>May
                                </option>
                                <option value="06" {{ request()->get('month')=="06" ? "selected":""}}>Jun
                                </option>
                                <option value="07" {{ request()->get('month')=="07" ? "selected":""}}>Jul
                                </option>
                                <option value="08" {{ request()->get('month')=="08" ? "selected":""}}>Aug
                                </option>
                                <option value="09" {{ request()->get('month')=="09" ? "selected":""}}>Sep
                                </option>
                                <option value="10" {{ request()->get('month')=="10" ? "selected":""}}>Oct
                                </option>
                                <option value="11" {{ request()->get('month')=="11" ? "selected":""}}>Nov
                                </option>
                                <option value="12" {{ request()->get('month')=="12" ? "selected":""}}>Dec
                                </option>
                            </select>
                        </div>

                        <div class="col-md-3 date-form" style="display: none;">
                            <input type="date" value="{{ request()->get('start') }}" class="form-control" name="start"
                                id="start">
                        </div>

                        <div class="col-md-3 date-form" style="display: none;">
                            <input type="date" value="{{ request()->get('end') }}" class="form-control" name="end"
                                id="end">
                        </div>


                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary btn-rouded">Search</button>

                            <a href="#" id="pdf" class="btn btn-primary btn-rouded">Export PDF</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="hk-row">
            <div class="col-lg-12 col-md-12">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-wrap">
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Date</th>
                                                    <th>Franchise Name</th>
                                                    <th>Owner Name</th>
                                                    <th>Address</th>
                                                    <th>Income</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $total = 0;
                                                @endphp
                                                @foreach ($data as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->month }} {{ $item->year }}</td>
                                                    <td>{{ $franchise->name }}</td>
                                                    <td>{{ $franchise->owner_name }}</td>
                                                    <td>{{ $franchise->address }}</td>
                                                    <td>@currency($item->income)</td>

                                                </tr>
                                                @php
                                                $total +=$item->income;
                                                @endphp
                                                @endforeach

                                            </tbody>
                                            <thead>
                                                <td colspan="3">
                                                    <center>Total</center>
                                                </td>
                                                <td colspan="3">
                                                    <center>@currency($total)</center>
                                                </td>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
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
        $('#pdf').click(function(){

            if($('#year').val() == ""){
                alert('Year Empty');
                return;
            }
            franchiseId = $('#franchise_id').val();
            year = $('#year').val();
            month = $('#month').val();
            year = $('#year').val();
            start = $('#start').val();
            end = $('#end').val();

            filterBy = $('#filter_by').val();
            let url = `{{ url('backoffice/franchises/${franchiseId}/income/pdf?filter_by=${filterBy}&year=${year}&month=${month}&start=${start}&end=${end}') }}`;
            const parseResult = new DOMParser().parseFromString(url, "text/html");
            const parsedUrl = parseResult.documentElement.textContent;
            window.open(parsedUrl,'_blank');
        });


        value = $('#filter_by').val();
        if(value == "date"){
            $('.date-form').css('display','block');
            $('.month-form').css('display','none');
            $('.year-form').css('display','none');
        }else if(value == "month"){
            $('.date-form').css('display','none');
            $('.month-form').css('display','block');
            $('.year-form').css('display','block');
        }else if(value == "year"){
            $('.year-form').css('display','block');
            $('.month-form').css('display','none');
            $('.date-form').css('display','none');
        }

        $('#filter_by').change(function(){
            value = $(this).val();
            if(value == "date"){
                $('.date-form').css('display','block');
                $('.month-form').css('display','none');
                $('.year-form').css('display','none');
            }else if(value == "month"){
                $('.date-form').css('display','none');
                $('.month-form').css('display','block');
                $('.year-form').css('display','block');
            }else if(value == "year"){
                $('.year-form').css('display','block');
                $('.month-form').css('display','none');
                $('.date-form').css('display','none');
            }
        });


    });
</script>
@endpush
