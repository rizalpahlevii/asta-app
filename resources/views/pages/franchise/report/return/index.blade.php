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
                                    <input type="date" name="start" id="start" value="{{ request()->get('start') }}"
                                        class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <input type="date" name="end" id="end" class="form-control"
                                        value="{{ request()->get('end') }}">
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
                                                <th>Stock Name</th>
                                                <th>Date</th>
                                                <th>Amount Of Return</th>
                                                <th>Supplier</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($returns as $return)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $return->rawMaterial->name }}</td>
                                                <td>{{ $return->date }}</td>
                                                <td>{{ $return->amount }}</td>
                                                <td>{{ $return->rawMaterial->supplier->name }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
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
            let url = `{{ url('franchise/reports/returns/pdf?filter_by=${filter}&start=${start}&end=${end}&limit=${limit}') }}`;
            const parseResult = new DOMParser().parseFromString(url, "text/html");
            const parsedUrl = parseResult.documentElement.textContent;
            window.open(parsedUrl,'_blank');
        });
    });
</script>
@endpush
