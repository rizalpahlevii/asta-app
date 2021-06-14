@extends('layouts.template')

@section('page','Reports')
@section('content')
<div class="hk-pg-header">
    <h4 class="hk-pg-title">@yield('page')</h4>
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="hk-row">
            <div class="col-lg-12 col-md-12">
                <div class="card card-sm">
                    <div class="card-body">
                        <form action="">

                            <div class="row">
                                <div class="col-md-2">
                                    <select name="filter_by" id="filter_by" class="form-control">
                                        <option disabled selected>Choose Option</option>
                                        <option value="employee"
                                            {{ request()->get('filter_by') == "employee" ? 'selected' : '' }}>Employee
                                        </option>
                                        <option value="date"
                                            {{ request()->get('filter_by') == "date" ? 'selected' : '' }}>
                                            Date</option>
                                        <option value="month"
                                            {{ request()->get('filter_by') == "month" ? 'selected' : '' }}>
                                            Month</option>
                                        <option value="year"
                                            {{ request()->get('filter_by') == "year" ? 'selected' : '' }}>
                                            Year</option>
                                    </select>
                                </div>

                                <div class="col-md-4" id="date-form" style="display: none;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="date" name="start" id="start" class="form-control"
                                                placeholder="Start" value="{{ request()->get('start') }}">

                                        </div>
                                        <div class="col-md-6">
                                            <input type="date" name="end" id="end" class="form-control"
                                                placeholder="End" value="{{ request()->get('end') }}">

                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-3" id="month-form" style="display: none;">
                                    <select name="month" id="month"
                                        class="form-control @error('month') is-invalid @enderror">
                                        <option value="01" {{ request()->get('month') == '01' ? 'selected' : '' }}>
                                            January</option>
                                        <option value="02" {{ request()->get('month') == '02' ? 'selected' : '' }}>
                                            February</option>
                                        <option value="03" {{ request()->get('month') == '03' ? 'selected' : '' }}>
                                            March
                                        </option>
                                        <option value="04" {{ request()->get('month') == '04' ? 'selected' : '' }}>
                                            Aprril</option>
                                        <option value="05" {{ request()->get('month') == '05' ? 'selected' : '' }}>
                                            May
                                        </option>
                                        <option value="06" {{ request()->get('month') == '06' ? 'selected' : '' }}>
                                            June
                                        </option>
                                        <option value="07" {{ request()->get('month') == '07' ? 'selected' : '' }}>
                                            July
                                        </option>
                                        <option value="08" {{ request()->get('month') == '08' ? 'selected' : '' }}>
                                            August</option>
                                        <option value="09" {{ request()->get('month') == '09' ? 'selected' : '' }}>
                                            September</option>
                                        <option value="10" {{ request()->get('month') == '10' ? 'selected' : '' }}>
                                            October</option>
                                        <option value="11" {{ request()->get('month') == '11' ? 'selected' : '' }}>
                                            November</option>
                                        <option value="12" {{ request()->get('month') == '12' ? 'selected' : '' }}>
                                            December</option>
                                    </select>

                                </div>

                                <div class="col-md-3" id="year-form" style="display: none;">
                                    <select name="year" id="year"
                                        class="form-control @error('year') is-invalid @enderror">
                                        @foreach ($year as $item)
                                        <option value="{{ $item->year }}"
                                            {{ $item->year == request()->get('year') ? 'selected' : '' }}>
                                            {{ $item->year }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3" id="employee-form" style="display: none;">
                                    <select name="employee" id="employee"
                                        class="form-control @error('employee') is-invalid @enderror">
                                        @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}"
                                            {{ $employee->id == request()->get('employee') ? 'selected' : '' }}>
                                            {{ $employee->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="col-md-3">
                                    <select name="limit" id="limit"
                                        class="form-control @error('limit') is-invalid @enderror">
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                        <option value="40">40</option>
                                        <option value="100">100</option>
                                    </select>
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
    </div>
    <div class="col-xl-12">
        <div class="hk-row">
            <div class="col-lg-12 col-md-12">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm">
                                <div class="table-wrap">
                                    <table class="table" id="datable_1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Order Date</th>
                                                <th>Normal Price</th>
                                                <th>Discount</th>
                                                <th>Voucher Discount</th>
                                                <th>Total Pay</th>
                                                <th>Employee</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $total=0;
                                            @endphp
                                            @foreach ($orders as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->order_date }} {{ $item->created_at->format('H:i') }}</td>
                                                <td>@currency($item->normal_price)</td>
                                                <td>@currency($item->discount )</td>
                                                <td>@currency($item->voucher_discount )</td>
                                                <td>@currency($item->total_pay )</td>
                                                <td>{{  $item->employee->name}}</td>
                                            </tr>
                                            @php
                                            $total +=$item->total_pay
                                            @endphp
                                            @endforeach
                                        </tbody>
                                        <thead>
                                            <td colspan="4">
                                                <center><b>Total</b></center>
                                            </td>
                                            <td colspan="3"><b>
                                                    <center>@currency($total)</center>
                                                </b></td>
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
@endsection
@push('style')
<link href="{{ asset('admin_template') }}/vendors/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('admin_template') }}/vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css"
    rel="stylesheet" type="text/css" />

@endpush
@push('script')

<script src="{{ asset('admin_template') }}/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('admin_template') }}/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('admin_template') }}/vendors/datatables.net-dt/js/dataTables.dataTables.min.js"></script>

<script src="{{ asset('admin_template') }}/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('admin_template') }}/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('admin_template') }}/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script>
    $(document).ready(function(){
        value = $('#filter_by').val();
        if(value == "employee"){
            $('#employee-form').css('display','block');
            $('#date-form').css('display','none');
            $('#month-form').css('display','none');
            $('#year-form').css('display','none');
        }else if(value == "date"){
            $('#date-form').css('display','block');
            $('#employee-form').css('display','none');
            $('#month-form').css('display','none');
            $('#year-form').css('display','none');
        }else if(value == "month"){
            $('#month-form').css('display','block');
            $('#employee-form').css('display','none');
            $('#date-form').css('display','none');
            $('#year-form').css('display','none');
        }else if(value == "year"){
            $('#year-form').css('display','block');
            $('#employee-form').css('display','none');
            $('#month-form').css('display','none');
            $('#date-form').css('display','none');
        }
        $('#filter_by').change(function(){
            value = $(this).val();
            if(value == "employee"){
                $('#employee-form').css('display','block');
                $('#date-form').css('display','none');
                $('#month-form').css('display','none');
                $('#year-form').css('display','none');
            }else if(value == "date"){
                $('#date-form').css('display','block');
                $('#employee-form').css('display','none');
                $('#month-form').css('display','none');
                $('#year-form').css('display','none');
            }else if(value == "month"){
                $('#month-form').css('display','block');
                $('#employee-form').css('display','none');
                $('#date-form').css('display','none');
                $('#year-form').css('display','none');
            }else if(value == "year"){
                $('#year-form').css('display','block');
                $('#employee-form').css('display','none');
                $('#month-form').css('display','none');
                $('#date-form').css('display','none');
            }
        });
        $('#datable_1').DataTable({
            responsive: true,
            autoWidth: false,
            searching : false,
            language: {
                search: "",
                searchPlaceholder: "Search",
                sLengthMenu: "_MENU_items"
            }
        });
        $('#pdf').click(function(){
            filter = $('#filter_by').val();
            start = $('#start').val();
            end = $('#end').val();
            employee = $('#employee').val();
            month = $('#month').val();
            year = $('#year').val();
            limit = $('#limit').val();
            let url = `{{ url('franchise/reports/transactions/pdf?filter_by=${filter}&month=${month}&year=${year}&employee=${employee}&start=${start}&end=${end}&limit=${limit}') }}`;
            const parseResult = new DOMParser().parseFromString(url, "text/html");
            const parsedUrl = parseResult.documentElement.textContent;
            window.open(parsedUrl,'_blank');
        });
    });
</script>
@endpush
