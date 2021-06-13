@extends('layouts.template')

@section('page','Report Per Product')
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
                                <div class="col-md-3">
                                    <select name="year" id="year"
                                        class="form-control @error('year') is-invalid @enderror">
                                        @foreach ($year as $item)
                                        <option value="{{ $item->year }}"
                                            {{ request()->get('year') == $item->year ? 'selected' : '' }}>
                                            {{ $item->year }}</option>
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
                                                <th>Product Name</th>
                                                <th>Amount</th>
                                                <th>Price</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $total=0;
                                            @endphp
                                            @foreach ($products as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>
                                                    @php
                                                    $amount = 0;
                                                    $price = 0;
                                                    @endphp
                                                    @foreach ($item->orderDetails as $row)
                                                    @php
                                                    $amount += $row->quantity;
                                                    $price += $row->subtotal;
                                                    @endphp
                                                    @endforeach
                                                    {{ $amount }}
                                                </td>
                                                <td>@currency($price)</td>
                                                <td>
                                                    <a target="_blank"
                                                        href="{{ route('franchise.report.per_product',$item->id) . '?month='.request()->get('month') .'&year='.request()->get('month') }} "
                                                        class="btn btn-success">Report</a>
                                                </td>
                                            </tr>
                                            @php
                                            $total += $price
                                            @endphp
                                            @endforeach
                                        </tbody>
                                        <thead>
                                            <td colspan="3">
                                                <center><b>Total</b></center>
                                            </td>
                                            <td colspan="2"><b>@currency($total)</b></td>
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
            let url = `{{ url('franchise/reports/pdf?month=${month}&year=${year}&limit=${limit}') }}`;
            const parseResult = new DOMParser().parseFromString(url, "text/html");
            const parsedUrl = parseResult.documentElement.textContent;
            window.open(parsedUrl,'_blank');
        });
    });
</script>
@endpush
