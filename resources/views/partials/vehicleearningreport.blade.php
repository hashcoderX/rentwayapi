@php
use Carbon\Carbon;

@endphp

<div class="row">

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th> Income Date </th>
                    
                    <th> Total Amount </th>
                    <th> Discounts </th>
                    <th> Net Total </th>
                </tr>
            </thead>
            <tbody>
                @php
                $totalSum = 0;
                $totalDiscount = 0;
                $totalNetamount = 0;
                @endphp
                @foreach ($vehicleearnings as $vehicleearning)
                <tr>
                    <td> {{ $vehicleearning->invoice_date }} </td>
                    <td> {{ number_format($vehicleearning->total_bill + $vehicleearning->firstpayment,2) }} </td>
                    <td> {{ number_format($vehicleearning->discount,2) }} </td>
                    <td> {{ number_format($vehicleearning->net_total + $vehicleearning->firstpayment,2) }} </td>
                </tr>
                @php
                $totalSum += $vehicleearning->total_bill + $vehicleearning->firstpayment;
                $totalDiscount += $vehicleearning->discount;
                $totalNetamount += $vehicleearning->net_total + $vehicleearning->firstpayment;
                @endphp
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="1" style="text-align:right;"><strong>Total:</strong></td>
                    <td><strong>{{ number_format($totalSum,2) }}</strong></td>
                    <td><strong>{{ number_format($totalDiscount,2) }}</strong></td>
                    <td><strong>{{ number_format($totalNetamount,2) }}</strong></td>
                </tr>
            </tfoot>
        </table>
    </div>

</div>