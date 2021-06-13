@extends('layouts.template')

@section('page','Employee Report')
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
                                        <option value="year"
                                            {{ request()->get('filter_by') == "year" ? 'selected' : '' }}>
                                            Year</option>
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


                                <div class="col-md-3" style="display: none;" id="year-form" style="display: none;">
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
                            <div class="col-md-12">
                                <div class="table-wrap">
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Employee Name</th>
                                                    <th>Date</th>
                                                    <th>Salary</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $sub=0;
                                                @endphp
                                                @foreach ($salaries as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->employee->name }}</td>
                                                    <td>{{ $item->month }} / {{ $item->year }}</td>
                                                    <td>@currency($item->salary)</td>
                                                </tr>
                                                @php
                                                $sub +=$item->salary
                                                @endphp
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <td colspan="2">Total</td>
                                                <td colspan="2">@currency($sub)</td>
                                            </tfoot>
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
                $('#year-form').css('display','none');
            }else if(value == "year"){
                $('#year-form').css('display','block');
                $('#employee-form').css('display','none');

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
            let url = `{{ url('franchise/employees/salary-reports/pdf?filter_by=${filter}&year=${year}&employee=${employee}') }}`;
            const parseResult = new DOMParser().parseFromString(url, "text/html");
            const parsedUrl = parseResult.documentElement.textContent;
            window.open(parsedUrl,'_blank');
        });
    });
</script>
@endpush
