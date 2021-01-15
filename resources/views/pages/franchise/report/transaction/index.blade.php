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
                                <div class="col-md-3">
                                    <select name="month" id="month"
                                        class="form-control @error('month') is-invalid @enderror">
                                        <option value="01">January</option>
                                        <option value="02">February</option>
                                        <option value="03">March</option>
                                        <option value="04">Aprril</option>
                                        <option value="05">May</option>
                                        <option value="06">June</option>
                                        <option value="07">July</option>
                                        <option value="08">August</option>
                                        <option value="09">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">Decemmber</option>
                                    </select>

                                </div>
                                <div class="col-md-3">
                                    <select name="year" id="year"
                                        class="form-control @error('year') is-invalid @enderror">
                                        @foreach ($year as $item)
                                        <option value="{{ $item->year }}">{{ $item->year }}</option>
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
                                                <td>{{ $item->order_date }}</td>
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
        $('#datable_1').DataTable({
            responsive: true,
            autoWidth: false,
            searching : false,
            language: { search: "",
            searchPlaceholder: "Search",
            sLengthMenu: "_MENU_items"

            }
        });
        $('#pdf').click(function(){
            if($('#month').val() == ""){
                alert('Month Empty');
                return;
            }
            if($('#year').val() == ""){
                alert('Month Empty');
                return;
            }
            month = $('#month').val();
            year = $('#year').val();
            limit = $('#limit').val();
            let url = `{{ url('franchise/reports/transactions/pdf?month=${month}&year=${year}&limit=${limit}') }}`;
            const parseResult = new DOMParser().parseFromString(url, "text/html");
            const parsedUrl = parseResult.documentElement.textContent;
            window.open(parsedUrl,'_blank');
        });
    });
</script>
@endpush
