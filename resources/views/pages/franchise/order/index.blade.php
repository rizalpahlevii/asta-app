@extends('layouts.template')

@section('page','Order')
@section('content')
<div class="hk-pg-header">
    <h4 class="hk-pg-title">@yield('page')</h4>

</div>
<div class="row">
    <input type="hidden" id="franchise_id" value="{{ auth()->user()->franchise->id }}">
    <div class="col-md-6">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="ion ion-ios-search"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Search product...." aria-label="Username"
                    aria-describedby="basic-addon1" id="keyword">
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <select name="employee_id" id="employee_id" class="form-control">
                @foreach ($employees as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="hk-row">
            <div class="col-lg-9 col-md-9">
                <div class="row" id="load-products">

                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between ">
                            <div>
                                <span class="d-block font-15 text-dark font-weight-400">Detail Order</span>
                            </div>
                        </div>
                        <hr>
                        <div class="">
                            <div>
                                <table style="width: 100%;" id="load-cart-product">

                                </table>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between ">
                            <div>
                                <span class="d-block font-15 text-dark font-weight-400">Normal Price</span>
                            </div>
                            <div>
                                <span class="d-block font-15 text-dark font-weight-500" id="load-normal-price"> </span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between ">
                            <div>
                                <span class="d-block font-15 text-dark font-weight-400">Discount</span>
                            </div>
                            <div>
                                <span class="d-block font-15 text-dark font-weight-500" id="load-discount">
                                </span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between ">
                            <div>
                                <span class="d-block font-15 text-dark font-weight-400">Voucher Discount</span>
                            </div>
                            <div>
                                <span class="d-block font-15 text-dark font-weight-500" id="load-voucher-discount">
                                </span>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between ">
                            <input type="hidden" id="order_value">
                            <div>
                                <span class="d-block font-15 text-dark font-weight-400">Total</span>
                            </div>
                            <div>
                                <span class="d-block font-18 text-dark font-weight-700" id="load-total"></span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <div>
                                <span class="d-block font-15 text-dark font-weight-400">Have a Voucher ? </span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <div>
                                <input type="hidden" class="form-control" name="voucher_id" id="voucher_id">
                                <input type="hidden" class="form-control" name="voucher_value" id="voucher_value">
                                <input type="text" class="form-control" name="voucher" id="voucher">
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <div>
                                <a href="#" class="d-block font-12 text-center" id="use-voucher">Use the voucher</a>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <div>

                                <input type="text" class="form-control" name="pay" id="pay" placeholder="Pay">
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <div>
                                <button class="btn btn-block btn-primary btn-rouded" id="btn-pay">Pay & Print
                                    Struk</button>
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
<!-- Toastr CSS -->
<link href="{{ asset('admin_template') }}/vendors/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet"
    type="text/css">
<style>
    .myImg {
        width: 300px;
        height: 150px;
        object-fit: cover
    }
</style>

@endpush
@push('script')
<script src="{{ asset('admin_template') }}/vendors/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
<script>
    $(document).ready(function(){
        cart = [];
        order_data = {};
        if(localStorage.cart){
            cart = JSON.parse(localStorage.cart);
            showCart();
        }
        if(localStorage.order_data){
            order_data = JSON.parse(localStorage.order_data);
            loadKotak();
        }

        getProducts();
        function getProducts(keyword = ""){
            console.log(keyword);
            url = `{{ route('franchise.order.get_products') }}?keyword=${keyword}`;
            $.ajax({
                async : false,
                url : url,
                method : 'get',
                dataType : 'json',
                success:function(response){
                    showProducts(response);
                }
            });
        }
        function showProducts(products){
            html ='';
            products.forEach((item,i)=>{
                image = `{{ asset('images') }}/${item.image}`;
                html += `<div class="col-md-4">
                        <div class="card card-sm">
                            <div class="card-body">

                                <div class="justify-content">
                                    <img src="${image}" alt="" class="img-fluid myImg">
                                </div>
                                <div class="d-flex justify-content-between mb-5">
                                    <div>
                                        <span class="d-block font-15 text-dark font-weight-500">${item.name}</span>
                                        <span
                                            class="d-block font-15 text-dark font-weight-400">`+convertToRupiah(item.final_price)+`</span>
                                    </div>
                                </div>
                                <div class="d-flex float-right mb-5">
                                    <button class="badge badge-light btn-minus mr-2" data-id="${item.id}" data-name="${item.name}" data-price="${item.price}" data-discount="${item.discount}" data-final-price="${item.final_price}">-</button>
                                    <button class="badge badge-light btn-plus ml-3"  data-id="${item.id}" data-name="${item.name}" data-price="${item.price}" data-discount="${item.discount}" data-final-price="${item.final_price}">+</button>
                                </div>

                            </div>
                        </div>
                    </div>`
            });
            loadKotak();
            $('#load-products').html(html);
        }
        $('#keyword').keyup(function(){
            getProducts($(this).val());
        });
        function convertToRupiah(angka)
        {
            var rupiah = '';
            var angkarev = angka.toString().split('').reverse().join('');
            for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
            return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
        }
        function getProductQuantity(product_id){

        }
        function showCart(){
            if(cart.length == 0){
                row = ''
            }else{
                var row = '';
                for (var i in cart ){
                    if(cart[i].franchise_id == $('#franchise_id').val()){
                        var item = cart[i];
                        row += `
                            <tr>
                                <td class="font-13 text-dark font-weight-400" style="width: 50%;">${item.name}</td>
                                <td class=" font-13 text-dark font-weight-400" style="width: 50%;"
                                                align="right">${item.quantity}x</td>
                            </tr>
                        `;
                    }
                }
            }
            loadKotak();
            $('#load-cart-product').html(row);
        }
        function addToCart(product_id,name,price,discount,final_price){
            for (var i in cart){
                if(cart[i].franchise_id == $('#franchise_id').val()){
                    if(cart[i].product_id == product_id){
                        cart[i].quantity = parseInt(cart[i].jumlah) + 1;
                        cart[i].subtotal = parseInt(cart[i].final_price) * parseInt(cart[i].quantity);
                        cart[i].subtotal_discount = parseInt(cart[i].discount) * parseInt(cart[i].quantity);
                        showCart();
                        saveCart();
                        return;
                    }
                }
            }

            const item = {
                product_id : product_id,
                name : name,
                price : price,
                quantity : 1,
                discount : discount,
                final_price : final_price,
                subtotal : final_price * 1,
                subtotal_discount : discount * 1

            }
            cart.push(item);
            saveCart();
            showCart()
        }
        function saveCart(){
            if(window.localStorage){
                localStorage.order_data = JSON.stringify(order_data);
                localStorage.cart = JSON.stringify(cart);
            }
        }
        $(document).on('click','.btn-minus',function(){
            minusCart($(this).data('id'));
        });
        $(document).on('click','.btn-plus',function(){
            plusCart($(this).data('id'),$(this).data('name'),$(this).data('price'),$(this).data('discount'),$(this).data('final-price'));
        });
        function minusCart(product_id){
            for (var i in cart ) {
                if(cart[i].franchise_id == $('#franchise_id').val()){

                    if(cart[i].product_id == product_id){
                        if( cart[i].quantity == 1){
                            cart.splice(i,1);
                        }else{
                            cart[i].quantity = parseInt(cart[i].quantity) - 1;
                            cart[i].subtotal = parseInt(cart[i].final_price) * parseInt(cart[i].quantity);
                            cart[i].subtotal_discount = parseInt(cart[i].discount) * parseInt(cart[i].quantity);
                        }
                        saveCart();

                    }
                }
            }
            showCart();
        }
        function loadKotak(){
            if(cart.length == 0 ){
                $('#load-normal-price').text(convertToRupiah(0));
                $('#load-discount').text(convertToRupiah(0));
                $('#load-voucher-discount').text(convertToRupiah(0));
                $('#load-total').text(convertToRupiah(0));
                return;
            }
            var normal_price = 0;
            var subtotal_discount = 0;
            var total = 0;
            for (var i in cart){
                if(cart[i].franchise_id == $('#franchise_id').val()){
                    normal_price += cart[i].price  * cart[i].quantity;
                    total += cart[i].subtotal ;
                    subtotal_discount += cart[i].subtotal_discount;
                }
            }
            if(order_data.use_voucher === true){
                $('#voucher_value').val(order_data.voucher_value);
                $('#voucher_id').val(order_data.voucher_id);
                total = parseInt(total) -  parseInt(order_data.voucher_value);
                $('#load-voucher-discount').text(convertToRupiah(order_data.voucher_value));
            }
            $('#order_value').val(total);
            $('#load-normal-price').text(convertToRupiah(normal_price));
            $('#load-discount').text(convertToRupiah(subtotal_discount));
            $('#load-total').text(convertToRupiah(total));
        }
        function plusCart(product_id,name,price,discount,final_price){
            for (var i in cart ) {
                if(cart[i].franchise_id == $('#franchise_id').val()){
                    if(cart[i].product_id == product_id){
                        cart[i].quantity += 1;
                        cart[i].subtotal = parseInt(cart[i].final_price) * parseInt(cart[i].quantity);
                        cart[i].subtotal_discount = parseInt(cart[i].discount) * parseInt(cart[i].quantity);
                        saveCart();
                        showCart();
                        return;
                    }
                }
            }
            const item = {
                product_id : product_id,
                name : name,
                price : price,
                quantity : 1,
                discount : discount,
                franchise_id : $('#franchise_id').val(),
                final_price : final_price,
                subtotal : parseInt(final_price) * parseInt(1),
                subtotal_discount : parseInt(discount) * 1

            }
            cart.push(item);
            saveCart();
            showCart()
        }
        function useVoucher(voucher_id,voucher_value){
            Object.assign(order_data,
            {
                use_voucher:true,
                voucher_id:voucher_id,
                voucher_value : voucher_value
            });
            saveCart();
            loadKotak();
        }
        $('#use-voucher').click(function(){
            if($('#voucher').val() == ""){
                alert('Voucher form empty! Please input Voucher Code');
            }else{

                $.ajax({
                    url : `{{ route('franchise.order.check_voucher') }}?code=${$('#voucher').val()}`,
                    method : 'post',
                    dataType : 'json',
                    data : {
                        code : $('#voucher').val(),
                        order_value :$('#order_value').val()
                    },
                    success : function(response){
                        alert(response.message);
                        if(response.status){
                            $('#voucher_id').val(voucher.id);
                            $('#voucher_value').val(response.data.nominal_value);
                            $('#load-voucher-discount').text(convertToRupiah(response.data.nominal_value));
                            useVoucher(response.data.id,response.data.nominal_value);
                        }
                    }
                });
            }
        });
        $('#btn-pay').click(function(){
            pay = $('#pay').val();
            order_value = $('#order_value').val();
            if(pay < order_value){
                alert('Pembayaran Kurang!');
                return;
            }
            $.ajax({
                url : `{{ route('franchise.order.save_order') }}`,
                method : 'post',
                dataType: 'json',
                data : {
                    products : cart,
                    order_data : order_data,
                    pay : $('#pay').val(),
                    employee_id : $('#employee_id').val()
                },
                success:function(response){
                    if(response.status == true){
                        alert(response.message);
                        localStorage.removeItem('cart');
                        localStorage.removeItem('order_data');
                        url = `{{ route('franchise.order.struk',':id') }}`;
                        url = url.replace(':id',response.data.id);
                        window.open(url);
                        location.href = `{{ route('franchise.order.index') }}`;
                    }else{
                        alert('Error transaction');
                    }
                }
            });
        });
    });
</script>
@endpush
