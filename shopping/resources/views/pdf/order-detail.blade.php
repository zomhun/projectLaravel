<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body {
        font-family: DejaVu Sans;

        .table {
            border: 1px solid black;
        }


    }
    </style>
</head>

<body>

    <p style="text-align: center;"><strong>Purchase Order</strong></p>
    <table border="1" width="100%" align="center">
        <tbody>
            <tr>
                <td valign="top" align="center" width="296">
                    <p class="p0">Buyer information</p>
                </td>
                <td valign="top" width="296">
                    <p class="p0">consignee information</p>
                </td>
            </tr>
            <tr>
                <td valign="top"  width="296">
                    <p class="p0">name : {{$order->cus->name}}  </p>
                </td>
                <td valign="top" width="296">
                    <p class="p0">name : {{$order->name}}</p>
                </td>
            </tr>
            <tr>
                <td valign="top" width="296">
                    <p class="p0">Email : {{$order->cus->email}}</p>
                </td>
                <td valign="top" width="296">
                    <p class="p0">Email : {{$order->email}}</p>
                </td>
            </tr>
            <tr>
                <td valign="top" width="296">
                    <p class="p0">phone number : {{$order->cus->phone}}</p>
                </td>
                <td valign="top" width="296">
                    <p class="p0">phone number : {{$order->phone}}</p>
                </td>
            </tr>
            <tr>
                <td valign="top" width="296">
                    <p class="p0">address : {{$order->cus->address}}</p>
                </td>
                <td valign="top" width="296">
                    <p class="p0">address : {{$order->address}}</p>
                </td>
            </tr>
        </tbody>
    </table>
    
    </div>
    <h3>Order details information</h3>
    <hr>
    <table border="1" width="100%" align="center">
    <thead>
        <tr>
            <td valign="top" width="117">
                <p class="p0"><strong>Product Code</strong></p>
            </td>
            <td valign="top" width="219">
                <p class="p0"><strong>Product Name</strong></p>
            </td>
            <td valign="top" width="81">
                <p class="p0"><strong>Quantity Ordered</strong></p>
            </td>
            <td valign="top" width="84">
                <p class="p0"><strong>Unit Price</strong></p>
            </td>
            <td valign="top" width="93">
                <p class="p0"><strong>Total</strong></p>
            </td>
        </tr>
    </thead>
        <tbody>
            @foreach($order->details as $item)
            <tr>
                <td>{{$item->prod->id}}</td>
                <td>{{$item->prod->pro_name}}</td>
                <td>{{$item->quantity}}</td>
                <td>{{$item->price}} $</td>
                <td>{{$item->quantity * $item->price}} $</td>
            </tr>
            @endforeach
            <th>
            <td>Total</td><td></td><td></td>

                <td >{{$order->getTotal()}} $</td>
            </th>
        </tbody>
            


    
    </table>

</body>

</html>