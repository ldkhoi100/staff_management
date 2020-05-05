<base href="{{ asset('') }}">

<div marginheight="0" marginwidth="0" style="background:#f0f0f0">
    <div id="wrapper" style="background-color:#f0f0f0">
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600"
            style="margin:0 auto;width:600px!important;min-width:600px!important" class="container">
            <tbody>
                <tr>
                    <td align="center" valign="middle" style="background:#ffffff">
                        <table style="width:580px;border-bottom:1px solid #ff3333" cellpadding="0" cellspacing="0"
                            border="0">
                            <tbody>
                                <tr>
                                    <td align="left" valign="middle" style="width:500px;height:60px">
                                        <a href="#" style="border:0" target="_blank" width="130" height="35"
                                            style="display:block;border:0px">
                                            <img src="https://cdn.dribbble.com/users/2465388/screenshots/7049307/media/d6c94ca1a563eab0109f6693cdfb9d28.jpg"
                                                height="100" width="115" style="display:block;border:0px;float: left;">
                                            <b style="float: left;line-height: 100px;color: red;font-size: 20px;">Fashion
                                                Store</b>
                                        </a>
                                    </td>
                                    <td align="right" valign="middle" style="padding-right:15px">
                                        <a href="" style="border:0">
                                            <img src="https://i.pinimg.com/originals/3d/f3/28/3df32837cfee56b14e5f390f7f7fa2ad.jpg"
                                                height="70" width="100" style="display:block;border:0px">
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="middle" style="background:#ffffff">
                        <table style="width:580px" cellpadding="0" cellspacing="0" border="0">
                            <tbody>
                                <tr>
                                    <td align="left" valign="middle"
                                        style="font-family:Arial,Helvetica,sans-serif;font-size:24px;color:#ff3333;text-transform:uppercase;font-weight:bold;padding:25px 10px 15px 10px">
                                        Notice of successful orders
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" valign="middle"
                                        style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;padding:0 10px 20px 10px;line-height:17px">
                                        Hi {{ $order->customers->name }},
                                        <br> Thank you for shopping at Fashion Store
                                        <br>
                                        <br> Your order is
                                        <b> waiting shop</b>
                                        <b> confirm</b> (within 24h)
                                        <br> We will inform <b>order status</b> in the next email.
                                        <br> Please check your email regularly.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="middle" style="background:#ffffff">
                        <table style="width:580px;border:1px solid #ff3333;border-top:3px solid #ff3333" cellpadding="0"
                            cellspacing="0" border="0">
                            <tbody>
                                <tr>
                                    <td colspan="2" align="left" valign="top"
                                        style="font-family:Arial,Helvetica,sans-serif;font-size:14px;color:#666666;padding:10px 10px 20px 15px;line-height:17px">
                                        <b>Your order #</b>
                                        <a href="#" style="color:#ed2324;font-weight:bold;text-decoration:none"
                                            target="_blank">{{ $order->id }}
                                        </a>
                                        <span
                                            style="font-size:12px">{{ date("M d, Y H:i", strtotime($order->created_at)) }}</span>
                                    </td>
                                </tr>

                                @foreach ($orderdetail as $item)

                                <tr>
                                    <td align="left" valign="top" style="width:120px;padding-left:15px">

                                        <a href="{{ url('/shop/detail/' . Str::slug($item->products->name)) }}"
                                            style="border:0">

                                            <img src="{{ $message->embed(public_path() . "/img/products/" . $item->products->image1) }}"
                                                height="120" width="85" style="display:block;border:0px">
                                        </a>
                                    </td>
                                    <td align="left" valign="top">
                                        <table style="width:100%" cellpadding="0" cellspacing="0" border="0">
                                            <tbody>
                                                <tr>
                                                    <td align="left" valign="top"
                                                        style="width:120px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;padding-left:15px;padding-right:10px;line-height:20px;padding-bottom:5px">
                                                        <b>Products</b>
                                                    </td>
                                                    <td align="left" valign="top"
                                                        style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-bottom:5px">
                                                        :</td>
                                                    <td align="left" valign="top"
                                                        style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-left:10px;padding-bottom:5px">

                                                        <a href="{{ url('/shop/detail/' . Str::slug($item->products->name)) }}"
                                                            style="color:#115fff;text-decoration:none" target="_blank">
                                                            {{ $item->name_products }}
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" valign="top"
                                                        style="width:120px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;padding-left:15px;padding-right:10px;line-height:20px;padding-bottom:5px">
                                                        <b>Information order:</b>
                                                    </td>
                                                    <td align="left" valign="top"
                                                        style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-bottom:5px">
                                                        :</td>
                                                    <td align="left" valign="top"
                                                        style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-left:10px;padding-bottom:5px">
                                                        Quantity: {{ $item->quantity  }}
                                                        - Size:
                                                        @if($item->size == 1)
                                                        {{ " S" }}
                                                        @elseif($item->size == 2)
                                                        {{ " M" }}
                                                        @elseif($item->size == 3)
                                                        {{ " L" }}
                                                        @elseif($item->size == 4)
                                                        {{ " XL" }}
                                                        @else
                                                        {{ $item->size }}
                                                        @endif
                                                        - Id product: SKU00{{ $item->id }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" valign="top"
                                                        style="width:120px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-left:15px;padding-right:10px;padding-bottom:5px">
                                                        <b>Total payment:</b>
                                                    </td>
                                                    <td align="left" valign="top"
                                                        style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-bottom:5px">
                                                        :</td>
                                                    <td align="left" valign="top"
                                                        style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-left:10px;padding-bottom:5px">
                                                        ${{ number_format($item->total_price, 2) }} &nbsp;

                                                        @if(($item->unit_price * $item->quantity) > $item->total_price)
                                                        <span
                                                            style="text-decoration: line-through; font-size: 11px; font-weight:400; color: #b2b2b2;">
                                                            ${{ number_format($item->unit_price * $item->quantity, 2) }}
                                                        </span>
                                                        @endif

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left" valign="top"
                                                        style="width:120px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-left:15px;padding-right:10px;padding-bottom:5px">
                                                        <b>Receiver: </b>
                                                    </td>
                                                    <td align="left" valign="top"
                                                        style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-bottom:5px">
                                                        :</td>
                                                    <td align="left" valign="top"
                                                        style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-left:10px;padding-bottom:5px">
                                                        <b>{{ $order->customers->name }}</b> -
                                                        +84 {{ $order->customers->phone }}
                                                        <br>
                                                        {{ $order->customers->address }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>


                                @endforeach

                                <tr>
                                    <td colspan="2" align="center" valign="top"
                                        style="padding-top:20px;padding-bottom:20px;border-bottom:1px solid #ebebeb">
                                        <a href="{{ route('find.bills', Crypt::encrypt($order->id)) }}"
                                            style="border:0px" target="_blank">
                                            <img src="https://i.imgur.com/f92hL68.jpg" height="29" width="191"
                                                alt="Order detail" style="border:0px">
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="middle" style="background:#ffffff;padding-top:20px">
                        <table style="width:500px" cellpadding="0" cellspacing="0" border="0">
                            <tbody>
                                <tr>
                                    <td align="center" valign="middle"
                                        style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;line-height:20px;padding-bottom:5px">
                                        This is an automated mail from the system. Please do not reply to this email.
                                        <br> If you have any questions or need help, please visit
                                        <b
                                            style="font-family:Arial,Helvetica,sans-serif;font-size:13px;text-decoration:none;font-weight:bold">
                                            Help center</b> our address:
                                        <a href="#"
                                            style="font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#0066cc;text-decoration:none;font-weight:bold"
                                            target="_blank">
                                            fashion.com
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>