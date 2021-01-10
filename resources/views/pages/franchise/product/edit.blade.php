@extends('layouts.template')

@section('page','Edit Product')
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
                                    action="{{ route('franchise.product.update',$product->id) }}" novalidate
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="raw_material_id1"
                                        value="{{ $productMaterials[0]['id'] }}">
                                    <input type="hidden" name="raw_material_id2"
                                        value="{{ $productMaterials[1]['id'] }}">
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label">Product Name</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror" id="name"
                                                placeholder="Product Name" value="{{ $product->name }}">
                                            @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="category_id" class="col-sm-2 col-form-label">Category Name</label>
                                        <div class="col-sm-6">
                                            <select name="category_id" id="category_id"
                                                class="form-control @error('category_id') is-invalid @enderror">
                                                <option disabled>--Choose Option--</option>
                                                @foreach ($categories as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $item->id == $product->category_id ? 'selected' : '' }}>
                                                    {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="price" class="col-sm-2 col-form-label">Price</label>
                                        <div class="col-sm-6">
                                            <input type="number" name="price"
                                                class="form-control @error('price') is-invalid @enderror" id="price"
                                                placeholder="Product price" value="{{ $product->price }}">
                                            @error('price')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="discount" class="col-sm-2 col-form-label">Discount</label>
                                        <div class="col-sm-6">
                                            <input type="number" name="discount"
                                                class="form-control @error('discount') is-invalid @enderror"
                                                id="discount" placeholder="Product discount"
                                                value="{{ $product->discount }}">
                                            @error('discount')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="final_price" class="col-sm-2 col-form-label">Final Price</label>
                                        <div class="col-sm-6">
                                            <input type="number" name="final_price"
                                                class="form-control @error('final_price') is-invalid @enderror"
                                                id="final_price" disabled readonly value="{{ $product->final_price }}">

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label">Stock Name</label>
                                        <div class="col-sm-6">
                                            <select name="material_id1" id="material_id1"
                                                class="form-control @error('material_id1') is-invalid @enderror">
                                                <option disabled>--Choose Option--</option>
                                                @foreach ($materials as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $item->id == $productMaterials[0]['id'] ? 'selected' : '' }}>
                                                    {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('material_id1')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label">Stock Name</label>
                                        <div class="col-sm-6">
                                            <select name="material_id2" id="material_id2"
                                                class="form-control @error('material_id2') is-invalid @enderror">
                                                <option disabled>--Choose Option--</option>
                                                <option value="{{ $productMaterials[1]['raw_material']['id'] }}">
                                                    {{ $productMaterials[1]['raw_material']['name'] }}</option>
                                            </select>
                                            @error('material_id2')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="image" class="col-sm-2 col-form-label">Image</label>
                                        <div class="col-sm-6">
                                            <input type="file" name="image"
                                                class="form-control @error('image') is-invalid @enderror" id="image"
                                                placeholder="Product image" value="{{ old('image') }}">
                                            @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="information" class="col-sm-2 col-form-label">Information</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="information"
                                                class="form-control @error('information') is-invalid @enderror"
                                                id="information" placeholder="Product information"
                                                value="{{$product->information }}">
                                            @error('information')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <label for="">*Catatan : Kosongkan input gambar jika tidak ingin mengganti
                                                gambar product</label>
                                        </div>
                                    </div>
                                    <input type="submit" name="submit" value="Update Product"
                                        class="btn btn-primary btn-sm">
                                    <a href="{{ route('franchise.product.index') }}"
                                        class="btn btn-dark btn-sm">Back</a>
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
        categories = [];
        $('#material_id1').change(function(){
            $('#material_id2').removeAttr('disabled');
            createOptionElement($(this).val());
        });

        function createOptionElement(value){
            option = '';
            categories.forEach((item,i)=>{
                if(value != item.id){
                    option += `<option value="${item.id}">${item.name}</option>`
                }
            });
            $('#material_id2').html(option);
        }
        getMaterials();
        function getMaterials(){
            $.ajax({
                url : `{{ route('franchise.product.get_materials') }}`,
                method : 'get',
                dataType : 'json',
                async : false,
                success: function(response){
                    categories = response;
                }
            });
        }
        $('#price').keyup(function(){
            discount = $('#discount').val();
            final_price = $(this).val() - discount;
            $('#final_price').val(final_price);
        });
        $('#discount').keyup(function(){
            price = $('#price').val();
            final_price = price - $(this).val();
            $('#final_price').val(final_price);
        });
    });
</script>
@endpush
