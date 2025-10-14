<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Include jsPDF and html2canvas libraries -->
</head>

<body>

    <div class="bill" id="bill" style="margin-top: 50px; position: relative;">
        <div class="lablecontainer" id="lablecontainer">
            <label style="color: black; font-size: 3em; position: absolute; top: 50px; left: 50px; z-index: 2;">

            </label>


        </div>
        @foreach ($agreements as $index => $agreement)
        <div style="position: relative; display: block; margin-bottom: 20px;z-index: -1;">
            <img src="{{ asset($agreement->agreement_image) }}" alt="Agreement Image {{ $index + 1 }}"
                style="width: {{ $agreement->p_width }}mm; height: {{ $agreement->p_height }}mm; display: {{ $agreement->display }}">
        </div>
        @endforeach
    </div>

    <!-- Label Positioned on Top of the First Image -->


    <button class="btn btn-primary" onclick="printagreement()" style="left: 100px; margin-top: 20px;">Print Agreement</button>
</body>

</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const veriableData = @json($variables);
        const invoiceData = @json($invoice);
        const customerData = @json($customer);
        const vehicalData = @json($vehical);
        const bookingData = @json($bookingDetails);
        const companyData = @json($company);

        const now = new Date();

        // Custom Date Format: YYYY-MM-DD
        const year = now.getFullYear();
        const month = String(now.getMonth() + 1).padStart(2, '0');
        const day = String(now.getDate()).padStart(2, '0');
        const formattedDate = `${year}-${month}-${day}`;

        // Custom Time Format: HH:MM:SS
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');
        const formattedTime = `${hours}:${minutes}:${seconds}`;

        function displayVariables() {
            const container = document.getElementById('lablecontainer');
            if (!container) return; // Check if container exists

            container.innerHTML = ""; // Clear existing labels

            if (Array.isArray(veriableData) && veriableData.length > 0) {
                veriableData.forEach(item => {
                    const label = document.createElement('label');

                    label.innerText = item.value; // Display the value from JSON
                    label.style.position = "absolute";
                    label.style.top = `${item.element_top_possition}px`;
                    label.style.left = `${item.element_left_possition}px`;
                    label.style.color = "black";
                    label.style.fontSize = "14px";
                    label.id = item.value; // Set the ID dynamically
                    label.classList = item.value;

                    var value = item.value;

                    container.appendChild(label);

                    if (value === "year") {
                        // Code to execute if "date" is selected
                        document.querySelectorAll('.year').forEach(el => el.innerHTML = year);
                    }
                    if (value === "month") {
                        // Code to execute if "date" is selected
                        document.querySelectorAll('.month').forEach(el => el.innerHTML = month);
                    }
                    if (value === "day") {
                        // Code to execute if "date" is selected
                        document.querySelectorAll('.day').forEach(el => el.innerHTML = day);
                    }
                    if (value === "date") {
                        // Code to execute if "date" is selected
                        document.querySelectorAll('.date').forEach(el => el.innerHTML = formattedDate);
                    }
                    if (value === "date_time") {
                        // Code to execute if "date_time" is selected
                        document.querySelectorAll('.date_time').forEach(el => el.innerHTML = formattedDate + ' ' + formattedTime);
                    }
                    if (value === "id") {
                        // Code to execute if "id" is selected
                        document.querySelectorAll('.id').forEach(el => el.innerHTML = invoiceData.id);
                    }
                    if (value === "user_id") {
                        // Code to execute if "user_id" is selected 
                        document.querySelectorAll('.user_id').forEach(el => el.innerHTML = invoiceData.user_id);

                    }
                    if (value === "company_id") {
                        // Code to execute if "company_id" is selected
                        document.querySelectorAll('.company_id').forEach(el => el.innerHTML = invoiceData.company_id);
                    }

                    if (value === "guarantor_id") {
                        // Code to execute if "guarantor_id" is selected
                        document.querySelectorAll('.guarantor_id').forEach(el => el.innerHTML = invoiceData.guarantor_id);
                    }
                    if (value === "bookingid") {
                        // Code to execute if "bookingid" is selected
                        document.querySelectorAll('.bookingid').forEach(el => el.innerHTML = invoiceData.bookingid);
                    }
                    if (value === "customername") {
                        // Code to execute if "customername" is selected
                        // document.querySelector('.customername').innerHTML = invoiceData.customername;
                        document.querySelectorAll('.customername').forEach(el => el.innerHTML = invoiceData.customername);
                    }
                    if (value === "starting_meeter") {
                        // Code to execute if "starting_meeter" is selected
                        document.querySelectorAll('.starting_meeter').forEach(el => el.innerHTML = invoiceData.starting_meeter);
                    }
                    if (value === "endmeeter") {
                        // Code to execute if "endmeeter" is selected
                        document.querySelectorAll('.endmeeter').forEach(el => el.innerHTML = invoiceData.endmeeter);
                    }
                    if (value === "type_of_rent") {
                        // Code to execute if "type_of_rent" is selected
                        document.querySelectorAll('.type_of_rent').forEach(el => el.innerHTML = invoiceData.type_of_rent);
                    }
                    if (value === "addtional_mile_chargers") {
                        // Code to execute if "addtional_mile_chargers" is selected
                        document.querySelectorAll('.addtional_mile_chargers').forEach(el => el.innerHTML = invoiceData.addtional_mile_chargers);
                    }
                    if (value === "vehicle_no") {
                        // Code to execute if "vehicle_no" is selected
                        document.querySelectorAll('.vehicle_no').forEach(el => el.innerHTML = invoiceData.vehicle_no);

                    }
                    if (value === "extra_charges") {
                        // Code to execute if "extra_charges" is selected
                        document.querySelectorAll('.extra_charges').forEach(el => el.innerHTML = invoiceData.extra_charges);
                    }
                    if (value === "extra_for_description") {
                        // Code to execute if "extra_for_description" is selected
                        document.querySelectorAll('.extra_for_description').forEach(el => el.innerHTML = invoiceData.extra_for_description);
                    }
                    if (value === "description") {
                        // Code to execute if "description" is selected
                        document.querySelectorAll('.description').forEach(el => el.innerHTML = invoiceData.description);
                    }
                    if (value === "advance_charge") {
                        // Code to execute if "advance_charge" is selected
                        document.querySelectorAll('.advance_charge').forEach(el => el.innerHTML = invoiceData.advance_charge);
                    }
                    if (value === "total_bill") {
                        // Code to execute if "total_bill" is selected
                        document.querySelectorAll('.total_bill').forEach(el => el.innerHTML = invoiceData.total_bill);
                    }
                    if (value === "discount") {
                        // Code to execute if "discount" is selected
                        document.querySelectorAll('.discount').forEach(el => el.innerHTML = invoiceData.discount);
                    }
                    if (value === "repair_deduction") {
                        // Code to execute if "repair_deduction" is selected
                        document.querySelectorAll('.repair_deduction').forEach(el => el.innerHTML = invoiceData.repair_deduction);
                    }
                    if (value === "net_total") {
                        // Code to execute if "net_total" is selected
                        document.querySelectorAll('.net_total').forEach(el => el.innerHTML = invoiceData.net_total);
                    }
                    if (value === "paidamount") {
                        // Code to execute if "paidamount" is selected
                        document.querySelectorAll('.paidamount').forEach(el => el.innerHTML = invoiceData.paidamount);
                    }
                    if (value === "balance") {
                        // Code to execute if "balance" is selected
                        document.querySelectorAll('.balance').forEach(el => el.innerHTML = invoiceData.balance);
                    }
                    if (value === "invoice_date") {
                        // Code to execute if "invoice_date" is selected
                        document.querySelectorAll('.invoice_date').forEach(el => el.innerHTML = invoiceData.invoice_date);
                    }
                    if (value === "invoice_status") {
                        // Code to execute if "invoice_status" is selected
                        document.querySelectorAll('.invoice_status').forEach(el => el.innerHTML = invoiceData.invoice_status);
                    }
                    if (value === "invoice_compleat_date") {
                        // Code to execute if "invoice_compleat_date" is selected
                        document.querySelectorAll('.invoice_compleat_date').forEach(el => el.innerHTML = invoiceData.invoice_compleat_date);
                    }
                    if (value === "issue_type") {
                        // Code to execute if "issue_type" is selected
                        document.querySelectorAll('.issue_type').forEach(el => el.innerHTML = invoiceData.issue_type);

                    }
                    if (value === "extra_drive_amount") {
                        // Code to execute if "extra_drive_amount" is selected
                        document.querySelectorAll('.extra_drive_amount').forEach(el => el.innerHTML = invoiceData.extra_drive_amount);
                    }
                    if (value === "extramillege") {
                        // Code to execute if "extramillege" is selected
                        document.querySelectorAll('.extramillege').forEach(el => el.innerHTML = invoiceData.extramillege);
                    }
                    if (value === "totaldrivedistance") {
                        // Code to execute if "totaldrivedistance" is selected
                        document.querySelectorAll('.totaldrivedistance').forEach(el => el.innerHTML = invoiceData.totaldrivedistance);
                    }
                    if (value === "bamount") {
                        // Code to execute if "bamount" is selected
                        document.querySelectorAll('.bamount').forEach(el => el.innerHTML = invoiceData.bamount);
                    }
                    if (value === "expected_discount") {
                        // Code to execute if "expected_discount" is selected
                        document.querySelectorAll('.expected_discount').forEach(el => el.innerHTML = invoiceData.expected_discount);
                    }
                    if (value === "deliverycharges") {
                        // Code to execute if "deliverycharges" is selected
                        document.querySelectorAll('.deliverycharges').forEach(el => el.innerHTML = invoiceData.deliverycharges);
                    }
                    if (value === "firstpayment") {
                        // Code to execute if "firstpayment" is selected
                        document.querySelectorAll('.firstpayment').forEach(el => el.innerHTML = invoiceData.firstpayment);
                    }
                    if (value === "fual_level") {
                        // Code to execute if "fual_level" is selected
                        document.querySelectorAll('.fual_level').forEach(el => el.innerHTML = invoiceData.fual_level);
                    }
                    if (value === "date_count") {
                        // Code to execute if "date_count" is selected
                        document.querySelectorAll('.date_count').forEach(el => el.innerHTML = invoiceData.date_count);
                    }
                    if (value === "rate") {
                        // Code to execute if "rate" is selected
                        document.querySelectorAll('.rate').forEach(el => el.innerHTML = invoiceData.rate);
                    }
                    if (value === "deside_total") {
                        // Code to execute if "deside_total" is selected
                        document.querySelectorAll('.deside_total').forEach(el => el.innerHTML = invoiceData.deside_total);
                    }
                    if (value === "free_issued_duration") {
                        // Code to execute if "free_issued_duration" is selected
                        document.querySelectorAll('.free_issued_duration').forEach(el => el.innerHTML = invoiceData.free_issued_duration);
                    }
                    if (value === "first_payment_balance") {
                        // Code to execute if "first_payment_balance" is selected
                        document.querySelectorAll('.first_payment_balance').forEach(el => el.innerHTML = invoiceData.first_payment_balance);
                    }
                    if (value === "delivery_payment_balance") {
                        // Code to execute if "delivery_payment_balance" is selected
                        document.querySelectorAll('.delivery_payment_balance').forEach(el => el.innerHTML = invoiceData.delivery_payment_balance);
                    }
                    if (value == "full_name") {
                        document.querySelectorAll('.full_name').forEach(el => el.innerHTML = customerData.full_name);
                    }

                    if (value === "reg_date") {
                        // Code to execute if "reg_date" is selected
                        document.querySelectorAll('.reg_date').forEach(el => el.innerHTML = customerData.reg_date);
                    }
                    if (value === "nic") {
                        // Code to execute if "nic" is selected
                        document.querySelectorAll('.nic').forEach(el => el.innerHTML = customerData.nic);
                    }
                    if (value === "drivinglicenseno") {
                        // Code to execute if "drivinglicenseno" is selected
                        document.querySelectorAll('.drivinglicenseno').forEach(el => el.innerHTML = customerData.drivinglicenseno);
                    }
                    if (value === "telephone_no") {
                        // Code to execute if "telephone_no" is selected
                        document.querySelectorAll('.telephone_no').forEach(el => el.innerHTML = customerData.telephone_no);
                    }
                    if (value === "driving_licen_photo") {
                        // Code to execute if "driving_licen_photo" is selected
                        document.querySelectorAll('.driving_licen_photo').forEach(el => el.innerHTML = customerData.driving_licen_photo);
                    }
                    if (value === "livingvarification") {
                        // Code to execute if "livingvarification" is selected
                        document.querySelectorAll('.livingvarification').forEach(el => el.innerHTML = customerData.livingvarification);
                    }
                    if (value === "customer_photo") {
                        // Code to execute if "customer_photo" is selected
                        document.querySelectorAll('.customer_photo').forEach(el => el.innerHTML = customerData.customer_photo);
                    }
                    if (value === "p_address") {
                        // Code to execute if "p_address" is selected
                        document.querySelectorAll('.p_address').forEach(el => el.innerHTML = customerData.p_address);
                    }
                    if (value === "t_address") {
                        // Code to execute if "t_address" is selected
                        document.querySelectorAll('.t_address').forEach(el => el.innerHTML = customerData.t_address);
                    }
                    if (value === "vehical_no") {
                        // Code to execute if "vehical_no" is selected
                        document.querySelectorAll('.vehical_no').forEach(el => el.innerHTML = vehicalData.vehical_no);
                    }
                    if (value === "vehical_type") {
                        // Code to execute if "vehical_type" is selected
                        document.querySelectorAll('.vehical_type').forEach(el => el.innerHTML = vehicalData.vehical_type);
                    }
                    if (value === "vehical_brand") {
                        // Code to execute if "vehical_brand" is selected
                        document.querySelectorAll('.vehical_brand').forEach(el => el.innerHTML = vehicalData.vehical_brand);
                    }
                    if (value === "body_type") {
                        // Code to execute if "body_type" is selected
                        document.querySelectorAll('.body_type').forEach(el => el.innerHTML = vehicalData.body_type);
                    }
                    if (value === "vehical_model") {
                        // Code to execute if "vehical_model" is selected
                        document.querySelectorAll('.vehical_model').forEach(el => el.innerHTML = vehicalData.vehical_model);
                    }
                    if (value === "vehicle_color") {
                        // Code to execute if "vehicle_color" is selected
                        document.querySelectorAll('.vehicle_color').forEach(el => el.innerHTML = vehicalData.vehicle_color);
                    }
                    if (value === "fualtype") {
                        // Code to execute if "fualtype" is selected
                        document.querySelectorAll('.fualtype').forEach(el => el.innerHTML = vehicalData.fualtype);
                    }
                    if (value === "meeter") {
                        // Code to execute if "meeter" is selected
                        document.querySelectorAll('.meeter').forEach(el => el.innerHTML = vehicalData.meeter);
                    }
                    if (value === "licen_exp") {
                        // Code to execute if "licen_exp" is selected
                        document.querySelectorAll('.licen_exp').forEach(el => el.innerHTML = vehicalData.licen_exp);
                    }
                    if (value === "insurence_exp") {
                        // Code to execute if "insurence_exp" is selected
                        document.querySelectorAll('.insurence_exp').forEach(el => el.innerHTML = vehicalData.insurence_exp);
                    }
                    if (value === "per_day_rental") {
                        // Code to execute if "per_day_rental" is selected
                        document.querySelectorAll('.per_day_rental').forEach(el => el.innerHTML = vehicalData.per_day_rental);
                    }
                    if (value === "per_week_rental") {
                        // Code to execute if "per_week_rental" is selected
                        document.querySelectorAll('.per_week_rental').forEach(el => el.innerHTML = vehicalData.per_week_rental);
                    }
                    if (value === "per_month_rental") {
                        // Code to execute if "per_month_rental" is selected
                        document.querySelectorAll('.per_month_rental').forEach(el => el.innerHTML = vehicalData.per_month_rental);
                    }
                    if (value === "per_year_rental") {
                        // Code to execute if "per_year_rental" is selected
                        document.querySelectorAll('.per_year_rental').forEach(el => el.innerHTML = vehicalData.per_year_rental);
                    }
                    if (value === "per_day_free_duration") {
                        // Code to execute if "per_day_free_duration" is selected
                        document.querySelectorAll('.per_day_free_duration').forEach(el => el.innerHTML = vehicalData.per_day_free_duration);
                    }
                    if (value === "per_week_free_duration") {
                        // Code to execute if "per_week_free_duration" is selected
                        document.querySelectorAll('.per_week_free_duration').forEach(el => el.innerHTML = vehicalData.per_week_free_duration);
                    }
                    if (value === "per_month_free_duration") {
                        // Code to execute if "per_month_free_duration" is selected
                        document.querySelectorAll('.per_month_free_duration').forEach(el => el.innerHTML = vehicalData.per_month_free_duration);
                    }
                    if (value === "per_year_free_duration") {
                        // Code to execute if "per_year_free_duration" is selected
                        document.querySelectorAll('.per_year_free_duration').forEach(el => el.innerHTML = vehicalData.per_year_free_duration);
                    }
                    if (value === "addtional_per_mile_cost") {
                        // Code to execute if "addtional_per_mile_cost" is selected
                        document.querySelectorAll('.addtional_per_mile_cost').forEach(el => el.innerHTML = vehicalData.addtional_per_mile_cost);
                    }
                    if (value === "deposit_amount") {
                        // Code to execute if "deposit_amount" is selected
                        document.querySelectorAll('.deposit_amount').forEach(el => el.innerHTML = vehicalData.deposit_amount);
                    }
                    if (value === "avalibility") {
                        // Code to execute if "avalibility" is selected
                        document.querySelectorAll('.avalibility').forEach(el => el.innerHTML = vehicalData.avalibility);
                    }
                    if (value === "revenuelicence") {
                        // Code to execute if "revenuelicence" is selected
                        document.querySelectorAll('.revenuelicence').forEach(el => el.innerHTML = vehicalData.revenuelicence);
                    }
                    if (value === "insurance_card") {
                        // Code to execute if "insurance_card" is selected
                        document.querySelectorAll('.insurance_card').forEach(el => el.innerHTML = vehicalData.insurance_card);
                    }
                    if (value === "emission_certificate") {
                        // Code to execute if "emission_certificate" is selected
                        document.querySelectorAll('.emission_certificate').forEach(el => el.innerHTML = vehicalData.emission_certificate);
                    }
                    if (value === "spare_wheel") {
                        // Code to execute if "spare_wheel" is selected
                        document.querySelectorAll('.spare_wheel').forEach(el => el.innerHTML = vehicalData.spare_wheel);
                    }
                    if (value === "jack") {
                        // Code to execute if "jack" is selected
                        document.querySelectorAll('.jack').forEach(el => el.innerHTML = vehicalData.jack);
                    }
                    if (value === "wheel_brush") {
                        // Code to execute if "wheel_brush" is selected
                        document.querySelectorAll('.wheel_brush').forEach(el => el.innerHTML = vehicalData.wheel_brush);
                    }
                    if (value === "book_start_date") {
                        // Code to execute if "book_start_date" is selected
                        document.querySelectorAll('.book_start_date').forEach(el => el.innerHTML = bookingData.book_start_date);
                    }
                    if (value === "pick_time") {
                        // Code to execute if "pick_time" is selected
                        document.querySelectorAll('.pick_time').forEach(el => el.innerHTML = bookingData.pick_time);
                    }
                    if (value === "pick_location") {
                        // Code to execute if "pick_location" is selected
                        document.querySelectorAll('.pick_location').forEach(el => el.innerHTML = bookingData.pick_location);
                    }
                    if (value === "wheretogo") {
                        // Code to execute if "wheretogo" is selected
                        document.querySelectorAll('.wheretogo').forEach(el => el.innerHTML = bookingData.wheretogo);
                    }
                    if (value === "return_date") {
                        // Code to execute if "return_date" is selected
                        document.querySelectorAll('.return_date').forEach(el => el.innerHTML = bookingData.return_date);
                    }
                    if (value === "return_time") {
                        // Code to execute if "return_time" is selected
                        document.querySelectorAll('.return_time').forEach(el => el.innerHTML = bookingData.return_time);
                    }
                    if (value === "return_location") {
                        // Code to execute if "return_location" is selected
                        document.querySelectorAll('.return_location').forEach(el => el.innerHTML = bookingData.return_location);
                    }
                    if (value === "book_time") {
                        // Code to execute if "book_time" is selected
                        document.querySelectorAll('.book_time').forEach(el => el.innerHTML = bookingData.book_time);
                    }
                    if (value === "isdriver") {
                        // Code to execute if "isdriver" is selected
                        document.querySelectorAll('.isdriver').forEach(el => el.innerHTML = bookingData.isdriver);
                    }
                    if (value === "hire_location") {
                        // Code to execute if "hire_location" is selected
                        document.querySelectorAll('.hire_location').forEach(el => el.innerHTML = bookingData.hire_location);
                    }
                    if (value === "status") {
                        // Code to execute if "status" is selected
                        document.querySelectorAll('.status').forEach(el => el.innerHTML = bookingData.status);
                    }
                    if (value === "note") {
                        // Code to execute if "note" is selected
                        document.querySelectorAll('.note').forEach(el => el.innerHTML = bookingData.note);
                    }
                    if (value === "witnessname") {
                        // Code to execute if "witnessname" is selected
                        document.querySelectorAll('.witnessname').forEach(el => el.innerHTML = bookingData.witnessname);
                    }
                    if (value === "witness_p_address") {
                        // Code to execute if "witness_p_address" is selected
                        document.querySelectorAll('.witness_p_address').forEach(el => el.innerHTML = bookingData.witness_p_address);
                    }
                    if (value === "witnessnic") {
                        // Code to execute if "witnessnic" is selected
                        document.querySelectorAll('.witnessnic').forEach(el => el.innerHTML = bookingData.witnessnic);
                    }
                    if (value === "witnesstelephone") {
                        // Code to execute if "witnesstelephone" is selected
                        document.querySelectorAll('.witnesstelephone').forEach(el => el.innerHTML = bookingData.witnesstelephone);
                    }
                    if (value === "isconfirm") {
                        // Code to execute if "isconfirm" is selected
                        document.querySelectorAll('.isconfirm').forEach(el => el.innerHTML = bookingData.isconfirm);
                    }
                    if (value === "confirm_amount") {
                        // Code to execute if "confirm_amount" is selected
                        document.querySelectorAll('.confirm_amount').forEach(el => el.innerHTML = bookingData.confirm_amount);
                    }
                });
            } else {
                container.innerHTML = "<p>No data found.</p>";
            }

            // ✅ Set values using JSON data


        }


        displayVariables(); // Call the function
    });
</script>


<script>
    function printagreement() {
        var content = document.getElementById('bill').innerHTML;

        // Open a new window
        var printWindow = window.open('', '_blank', 'width=720,height=auto');
        printWindow.document.open();
        printWindow.document.write(`
        <html>
            <head>
                <title>Print Agreement</title>
                <style>
                    /* Add custom styles for printing */
                    body {
                        font-family: Arial, sans-serif;
                        margin: 0;
                        padding: 0;
                    }
                    .img-fluid {
                        position: absolute;
                        z-index: -1;
                        top: 0;
                        left: 0;
                        width: 720px;
                        height: auto;
                    }
                    .bill {
                        position: relative;
                        width: 720px;
                        height: auto;
                    }
                </style>
            </head>
            <body>
                <div class="bill">
                    ${content} 
                </div>
                
            </body>
        </html>
    `);

        // Wait for the content to load before printing
        printWindow.document.close();
        printWindow.onload = function() {
            printWindow.print();
            // printWindow.close();
        };
    }
</script>



<!-- Add this to your HTML file to include jQuery -->