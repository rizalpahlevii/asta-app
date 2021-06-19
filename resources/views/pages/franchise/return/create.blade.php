@extends('layouts.template')

@section('page','Create Return')
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
                        <div class="row">
                            <div class="col-md-12">
                                <form method="POST" class="needs-validations"
                                    action="{{ route('franchise.return.store') }}" novalidate>
                                    @csrf

                                    <div class="form-group row">
                                        <label for="date" class="col-sm-2 col-form-label">Date</label>
                                        <div class="col-sm-6">
                                            <input type="date" name="date"
                                                class="form-control @error('date') is-invalid @enderror" id="date"
                                                placeholder="date" value="{{ old('date') }}">
                                            @error('date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="raw_material_id" class="col-sm-2 col-form-label">Stock Name</label>
                                        <div class="col-sm-6">
                                            <select name="raw_material_id" id="raw_material_id"
                                                class="form-control  @error('raw_material_id') is-invalid @enderror">
                                                <option disabled selected>--Choose Option--</option>
                                                @foreach ($rawMaterials as $rawMaterial)
                                                <option value="{{ $rawMaterial->id }}">
                                                    {{ $rawMaterial->name }}</option>
                                                @endforeach
                                            </select>

                                            @error('supplier_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="order_date" class="col-sm-2 col-form-label">Order Date</label>
                                        <div class="col-sm-6">
                                            <select name="order_date" id="order_date"
                                                class="form-control  @error('order_date') is-invalid @enderror">
                                                <option disabled selected>--Choose Option--</option>

                                            </select>

                                            @error('order_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="amount_order" class="col-sm-2 col-form-label">Amount Order</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="amount_order"
                                                class="form-control @error('amount_order') is-invalid @enderror"
                                                id="amount_order" placeholder="Amount Order"
                                                value="{{ old('amount_order') }}" readonly>
                                            @error('amount_order')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="amount_return" class="col-sm-2 col-form-label">Amount Of
                                            Return</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="amount_return"
                                                class="form-control @error('amount_return') is-invalid @enderror"
                                                id="amount_return" placeholder="Amount Order"
                                                value="{{ old('amount_return') }}">
                                            @error('amount_return')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>


                                    <input type="submit" name="submit" value="Create Return "
                                        class="btn btn-primary btn-sm">
                                    <a href="{{ route('franchise.return.index') }}" class="btn btn-dark btn-sm">Back</a>
                                </form>
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
        $('#raw_material_id').change(function(){
            url = `{{ url('/franchise/returns/get-material/:id') }}`;
            url = url.replace(':id',$(this).val());
            $.ajax({
                url :url,
                method : 'get',
                dataType:'json',
                success:function(response){
                    option = `<option disabled selected>--Choose Option--</option>`;
                    if(Object.keys(response).length > 0){
                        response.forEach((item,i)=>{
                            option += `<option value="${item.date}" data-amount="${item.stock}">${item.date}</option>`;
                        });
                    }
                    $('#order_date').html(option);
                }
            });
        });
        $('#order_date').change(function(){
            $('#amount_order').val($(this).find('option:selected').data('amount'));
        });
    });
</script>
@endpush
