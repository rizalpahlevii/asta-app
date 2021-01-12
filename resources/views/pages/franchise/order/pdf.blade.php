<div style="width:280px;height:auto;top:-100px;">
    <div style="width:100%;padding:6px 4px;border-bottom:dashed 1px #333;text-align:center">

        <div class="form-group">
            <small>{{ auth()->user()->franchise->name }}</small><br>
            <small>Tgl : {{$order->created_at}}</small><br>
            <small>Kasir : {{ $order->employee->name }}</small>
        </div>
    </div>
    <div style="width:100%;padding:6px 4px;border-bottom:dashed 1px #333;">
        <table style="width:100%;font-size:12px;">
            <tr style="border-bottom:dashed 1px #333;">
                <th>Product</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Final Price</th>
                <th>Qty</th>
                <th>Sub</th>
            </tr>
            @php
            $subtotal=0;
            @endphp
            @foreach ($order->orderDetails as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>@currency($item->price) </td>
                <td>@currency($item->discount)</td>
                <td>@currency($item->final_price) </td>
                <td>{{ $item->quantity }}</td>
                <td> @currency($item->subtotal)</td>
            </tr>
            @php
            $subtotal +=$item->subtotal;
            @endphp
            @endforeach
        </table>
    </div>
    <div style="width:100%;padding:6px 4px;margin-top:2px;">
        <table style="width:100%;font-size: 12px">
            <tr>
                <td>Subtotal Product</td>
                <td>:</td>
                <td>@currency($subtotal) </td>
            </tr>
            <tr>
                <td>Discount</td>
                <td>:</td>
                <td style="border-bottom:dashed 1px #333">@currency($order->discount)
                </td>
            </tr>
            <tr>
                <td>Discount</td>
                <td>:</td>
                <td style="border-bottom:dashed 1px #333">@currency($order->voucher_discount)
                </td>
            </tr>
            <tr>
                <td>Grandtotal</td>
                <td>:</td>
                <td style="border-bottom:dashed 1px #333">@currency($order->total_pay)
                </td>
            </tr>
            <tr>
                <td>Pay</td>
                <td>:</td>
                <td>@currency($order->pay)
                </td>
            </tr>
        </table>
    </div>
    <div style="width:100%;text-align:center;margin:2px 0;border-top:dashed 1px #333;">
        <span style="font-size: 12px;">TERIMA KASIH ATAS KUNJUNGAN ANDA</span><br>
    </div>
</div>
<style media="screen">
    table tr th {
        margin: 0 0 10px 0;
    }
</style>
