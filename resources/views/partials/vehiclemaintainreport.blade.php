@php
use Carbon\Carbon;

@endphp

<div class="row">

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th> Maintain Date </th>
                    <th> Expenses Topic </th>
                    <th> Description </th>
                    <th> Total Amount </th>
                </tr>
            </thead>
            <tbody>
                @php
                $totalSum = 0;
                @endphp
                @foreach ($vehiclemaintains as $vehiclemaintain)
                <tr>
                    <td> {{ $vehiclemaintain->date_time }} </td>
                    <td> {{ $vehiclemaintain->expenses_type }} </td>
                    <td> {{ $vehiclemaintain->description }} </td>
                    <td> {{ number_format($vehiclemaintain->amount,2) }} </td>
                </tr>
                @php
                $totalSum += $vehiclemaintain->amount;
                @endphp
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" style="text-align:right;"><strong>Total:</strong></td>
                    <td><strong>{{ number_format($totalSum,2) }}</strong></td>
                </tr>
            </tfoot>
        </table>
    </div>

</div>