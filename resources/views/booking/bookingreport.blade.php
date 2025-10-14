<div class="bookingconfirmationcontainer" id="bookingconfirmationcontainer" style="width: 100%; max-width: 800px; margin: auto; font-family: Arial, sans-serif; border: 1px solid #ddd; padding: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
    <!-- Header -->
    <h3 style="text-align: center; font-size: 1.5rem; margin-top: 30px; margin-bottom: 20px;color: black;"> {{ $company->name }}</h3>
    <h5 style="text-align: center; font-size: 1rem;color: black;">Booking Confirmation</h5>
    <div class="row" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; border-bottom: 1px solid #ddd; padding-bottom: 10px;">
        <div class="col" style="flex: 1; padding: 5px; font-weight: bold;color: black;font-size: 12px; ">Booking No - {{ $booking->id }}</div>
        <div class="col" style="flex: 1; padding: 5px; font-weight: bold; text-align: center;color: black;font-size: 12px;">Generated Time - {{ date('Y-m-d H:i:s') }}</div>
        <div class="col" style="flex: 1; padding: 5px; font-weight: bold; text-align: right;color: black;font-size: 12px;">Name - {{ $customer->full_name }}</div>
    </div>

    <!-- Details Table -->
    <table class="table table-responsive" style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
        <tbody>
            <tr>
                <td style="padding: 10px; border: 1px solid #ddd;">Vehicle No</td>
                <td style="padding: 10px; border: 1px solid #ddd;">{{ $booking->vehicle_no }}</td>
            </tr>
            <tr>
                <td style="padding: 10px; border: 1px solid #ddd;">Vehicle</td>
                <td style="padding: 10px; border: 1px solid #ddd;">{{ $vehicle->vehical_brand }} - {{ $vehicle->vehical_model }} - {{ $vehicle->vehicle_color }}</td>
            </tr>
            <tr>
                <td style="padding: 10px; border: 1px solid #ddd;">Pickup Date</td>
                <td style="padding: 10px; border: 1px solid #ddd;">{{ $booking->book_start_date }} - {{ $booking->pick_time }}</td>
            </tr>
            <tr>
                <td style="padding: 10px; border: 1px solid #ddd;">Return Date</td>
                <td style="padding: 10px; border: 1px solid #ddd;">{{ $booking->return_date }} - {{ $booking->return_time }}</td>
            </tr>
            <tr>
                <td style="padding: 10px; border: 1px solid #ddd;">Confirmation</td>
                <td style="padding: 10px; border: 1px solid #ddd;">{{ $booking->isconfirm }}</td>
            </tr>
            <tr>
                <td style="padding: 10px; border: 1px solid #ddd;">Confirmation Amount</td>
                <td style="padding: 10px; border: 1px solid #ddd;">LKR {{ number_format($booking->confirm_amount) }}</td>
            </tr>
        </tbody>
    </table>
    <div style="padding: 5px;text-align: left;color: black;font-size: 12px;">01.No cash refunds. Sorry for the inconvenience.
    </div>
    <div style="padding: 5px;text-align: left;color: black;font-size: 12px;">02.Changes to booking dates are not permitted. We regret any inconvenience caused
    </div>

</div>



<!-- <button class="btn btn-primary" onclick="printinvoice()">Print Agreement</button> -->