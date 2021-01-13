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
                            <select name="year" id="year" class="form-control @error('year') is-invalid @enderror">
                                @foreach ($year as $item)
                                <option value="{{ $item->year }}">{{ $item->year }}</option>
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
            let url = `{{ url('backoffice/franchises/${franchiseId}/income/pdf?year=${year}') }}`;
            const parseResult = new DOMParser().parseFromString(url, "text/html");
            const parsedUrl = parseResult.documentElement.textContent;
            window.open(parsedUrl,'_blank');
        });
    });
</script>
@endpush
