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
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
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
