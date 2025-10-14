<x-app-layout>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        <div class="leftsidebar">

            @include('layouts.leftsidebar')
        </div>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('layouts.mainnavbar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row">
                        <div class="col-md-4 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Advertise Service Base</h4>
                                    <div class="notificationdisplay" id="notificationdisplay"></div>
                                    <div class="forms-sample">
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Vehicle Brand <span class="acspan">*</span></label>
                                            <select name="vehicle_brand" id="vehicle_brand" class="form-control">
                                                <option value="Toyota">Toyota</option>
                                                <option value="Nissan">Nissan</option>
                                                <option value="Suzuki">Suzuki</option>
                                                <option value="Honda">Honda</option>
                                                <option value="Mitsubishi">Mitsubishi</option>
                                                <option value="Mercedes_Benz">Mercedes Benz</option>
                                                <option value="Bmw">BMW</option>
                                                <option value="Land Rover">Land Rover</option>
                                                <option value="kia">Kia</option>
                                                <option value="Audi">Audi</option>
                                                <option value="Micro">Micro</option>
                                                <option value="Mahindra">Mahindra</option>
                                                <option value="hyundai">Hyundai</option>
                                                <option value="Daihatsu">Daihatsu</option>
                                                <option value="Peugeot">Peugeot</option>
                                                <option value="Perodua">Perodua</option>
                                                <option value="MG">MG</option>
                                                <option value="DFSK">DFSK</option>
                                                <option value="Mazda">Mazda</option>
                                                <option value="Ford">Ford</option>
                                                <option value="Maruti Suzuki">Maruti Suzuki</option>
                                                <option value="Tata">Tata</option>
                                                <option value="Volkswagen">Volkswagen</option>
                                                <option value="Jaguar">Jaguar</option>
                                                <option value="Renault">Renault</option>
                                                <option value="Porsche">Porsche</option>
                                                <option value="Mini">Mini</option>
                                                <option value="Isuzu">Isuzu</option>
                                                <option value="Morris">Morris</option>
                                                <option value="Chevrolet">Chevrolet</option>
                                                <option value="Datsun">Datsun</option>
                                                <option value="Daewoo">Daewoo</option>
                                                <option value="Proton">Proton</option>
                                                <option value="Ssang Yong">Ssang Yong</option>
                                                <option value="Austin">Austin</option>
                                                <option value="Jeep">Jeep</option>
                                                <option value="Zotye">Zotye</option>
                                                <option value="Subaru">Subaru</option>
                                                <option value="Fiat">Fiat</option>
                                                <option value="Lexus">Lexus</option>
                                                <option value="Tesla">Tesla</option>
                                                <option value="Alfa Romeo">Alfa Romeo</option>
                                                <option value="Maruti">Maruti</option>
                                                <option value="Aston Martin">Aston Martin</option>
                                                <option value="Chery">Chery</option>
                                                <option value="GMC">GMC</option>
                                                <option value="Maserati">Maserati</option>
                                                <option value="Rover">Rover</option>
                                                <option value="Volvo">Volvo</option>
                                                <option value="TVS">TVS</option>
                                                <option value="Hero">Hero</option>
                                                <option value="Bajaj">Bajaj</option>
                                                <option value="Yamaha">Yamaha</option>
                                                <option value="Kawasaki">Kawasaki</option>
                                                <option value="Ktm">KTM</option>
                                                <option value="Bayliner">Bayliner</option>
                                                <option value="Beneteau">Beneteau</option>
                                                <option value="Boston Whaler">Boston Whaler</option>
                                                <option value="Chaparral">Chaparral</option>
                                                <option value="Grady-White">Grady-White</option>
                                                <option value="Sea Ray">Sea Ray</option>
                                                <option value="Azimut">Azimut</option>
                                                <option value="Bennington">Bennington</option>
                                                <option value="Bertrams">Bertram</option>
                                                <option value="ALVA Yachts">ALVA Yachts</option>
                                                <option value="EICHER">EICHER</option>
                                                <option value="JCB">JCB</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="forms-sample">
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">NIC</label> <span id="blacklistnotofication"></span>
                                            <input type="text" class="form-control" id="nic" name="nic" style="color: gray;">
                                            <button class="btn btn-primary" onclick="findcustomerDetails()">Find</button>
                                        </div>
                                    </div>

                                    <div class="forms-sample">
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Contact No <span class="acspan">*</span></label>
                                            <input type="number" class="form-control" id="contactno" name="contactno" style="color: gray;">
                                        </div>
                                    </div>

                                    <div class="forms-sample">
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Select Hire Type</label>
                                            <select name="hiretypr" id="hiretypr" class="form-control" onchange="sethiretype(this.value)">
                                                <option value="without_driver">Without Driver</option>
                                                <option value="with_driver">With Driver</option>
                                                <option value="hire">Hire</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="forms-sample">
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Select Vehicle <span class="acspan">*</span></label>
                                            <select name="vehicleno" id="vehicleno" class="form-control" onchange="checkiscompleteProfile(this.value)">
                                                <option>Select Vehicle</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="forms-sample">
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Booking Start Date <span class="acspan">*</span></label>
                                            <input type="date" class="form-control" id="booking_start_date" name="booking_start_date" style="color: gray;">
                                        </div>
                                    </div>

                                    <div class="forms-sample">
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Pick Time <span class="acspan">*</span></label>
                                            <input type="time" class="form-control" id="picktime" name="picktime" style="color: gray;">
                                        </div>
                                    </div>

                                    <div class="forms-sample">
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Pick Location </label>
                                            <input type="text" class="form-control" id="picklocation" name="picklocation" style="color: gray;">
                                        </div>
                                    </div>

                                    <div class="forms-sample">
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Where to go?</label>
                                            <input type="text" class="form-control" id="wheretogo" name="wheretogo" style="color: gray;">
                                        </div>
                                    </div>

                                    <div class="forms-sample">
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Return Date <span class="acspan">*</span></label>
                                            <input type="date" class="form-control" id="booking_return_date" name="booking_return_date" style="color: gray;">
                                        </div>
                                    </div>

                                    <div class="forms-sample">
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Return Time <span class="acspan">*</span></label>
                                            <input type="time" class="form-control" id="booking_return_time" name="booking_return_time" style="color: gray;">
                                        </div>
                                    </div>

                                    <div class="forms-sample">
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Return Location</label>
                                            <input type="text" class="form-control" id="booking_return_location" name="booking_return_location" style="color: gray;">
                                        </div>
                                    </div>

                                    <div class="forms-sample">
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Is Confirm</label>
                                            <select name="isconfirm" id="isconfirm" class="form-control" onchange="selectConfirmation(this.value)">
                                                <option value="not_yet">Not Yet</option>
                                                <option value="confirmed">Confirmed</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="forms-sample">
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Confirmation Payment Amount</label>
                                            <input type="number" class="form-control" id="confirmation_amount" name="confirmation_amount" style="color: gray;">
                                        </div>
                                    </div>

                                    <div class="forms-sample">
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Hire Description</label>
                                            <textarea name="note" id="note" cols="30" rows="10" class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <button class="btn btn-dark">Cancel</button>
                                    <button type="button" class="btn btn-primary mr-2" onclick="savebooking()" id="appoingmentsavebtn">Save</button>
                                </div>
                            </div>
                        </div>

                        <!-- myvehicles -->
                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="forms-sample">
                                        <!-- <div class="form-group">
                                            <label for="exampleInputUsername1">Find By Booking Date</label>
                                            <input type="date" class="form-control" id="find_booking_date" name="find_booking_date" style="color: gray;" onchange="findbookingbydate(this.value)">
                                        </div> -->
                                    </div>
                                    <div class="d-flex flex-row justify-content-between">
                                        <h4 class="card-title mb-1">Booking List</h4>
                                        <p class="text-muted mb-1">Booking Date & Time</p>
                                        <p class="text-muted mb-1">Important Data Sets</p>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">

                                        </div>
                                        <!-- <a href="/vehiclelist" class="btn btn-outline-primary btn-fw">Load All Vehicle</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <!-- footer   -->

                <!-- End Footer  -->
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">View Booking</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="bookingindetails" id="bookingindetails">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="color: red;">Close</button>
                    <!-- <button type="button" class="btn btn-primary" onclick="createInvoice()">Create Invoice</button> -->
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="cancelBooking" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cancel Booking</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="bookingidforcancel" id="bookingidforcancel" style="display: none;">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="color: red;">Close</button>
                    <button type="button" class="btn btn-primary" onclick="cancelBooking()">Cancel Booking</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="genaratereport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Booking Confirmation Report</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="bookingconfirmation" id="bookingconfirmation">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="color: red;">Close</button>
                    <button type="button" class="btn btn-primary" onclick="printBookingReport()">Print Report</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="responseModal" tabindex="-1" role="dialog" aria-labelledby="responseModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="responseModalLabel">Vehicle Check</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modalMessage">
                    <!-- Response message will be inserted here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="color: red;" onclick="refresh()">Close</button>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>


<!-- Modal -->


<script>
    document.getElementById("phone_number").addEventListener("input", function() {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>

<script>
    function printBookingReport() {
        // Get the content to be converted into a PDF
        var content = document.getElementById('bookingconfirmationcontainer');

        // Set options for the PDF generation
        var options = {
            margin: 1,
            filename: 'Booking_Report.pdf',
            image: {
                type: 'jpeg',
                quality: 0.98
            },
            html2canvas: {
                scale: 2
            },
            jsPDF: {
                unit: 'in',
                format: 'letter',
                orientation: 'portrait'
            }
        };

        // Generate the PDF
        html2pdf().set(options).from(content).save();
    }
</script>



<script>
    function savebooking() {
        var customername = $('#customername').val();
        var nic = $('#nic').val();
        var contactno = $('#contactno').val();
        var vehicleno = $('#vehicleno').val();
        var booking_start_date = $('#booking_start_date').val();
        var picktime = $('#picktime').val();
        var picklocation = $('#picklocation').val();
        var wheretogo = $('#wheretogo').val();
        var booking_return_date = $('#booking_return_date').val();
        var booking_return_time = $('#booking_return_time').val();
        var booking_return_location = $('#booking_return_location').val();
        var hiretypr = $('#hiretypr').val();
        var note = $('#note').val();
        var isconfirm = $('#isconfirm').val();
        var confirmation_amount = $('#confirmation_amount').val();

        if (customername === "" || contactno === "" || vehicleno === "" || booking_start_date === "" || picktime === "" || booking_return_date === "" || booking_return_time === "") {
            alert("Please fill in all the required fields.");
            return;
        } else {
            var data = {
                customername: customername,
                nic: nic,
                contactno: contactno,
                vehicleno: vehicleno,
                booking_start_date: booking_start_date,
                picktime: picktime,
                picklocation: picklocation,
                wheretogo: wheretogo,
                booking_return_date: booking_return_date,
                booking_return_time: booking_return_time,
                booking_return_location: booking_return_location,
                hiretypr: hiretypr,
                note: note,
                isconfirm: isconfirm,
                confirmation_amount: confirmation_amount,
            };

            $.ajax({
                url: '/addbooking',
                type: 'POST',
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {

                    if (response.code == '203') {
                        alert('Already have some booking');
                    } else {
                        refresh();
                    }
                    // alert('Booking saved successfully!');
                    // Optionally, you can perform further actions like redirecting the user or clearing the form

                },
                error: function(xhr, status, error) {
                    console.error(error);
                    alert('An error occurred while saving the booking. Please try again.');
                }
            });
        }
    }

    function sethiretype(value) {

    }

    function selectConfirmation(value) {
        if (value == 'not_yet') {

        }
        if (value == 'confirmed') {

        }
    }

    function genaratereport(bookingid) {
        $.ajax({
            url: '/getbookingdetailforprint',
            type: 'GET',
            data: {
                bookingid: bookingid,
            },
            success: function(response) {
                if (response.html) {
                    document.querySelector('.bookingconfirmation').innerHTML = response.html;
                }
            }
        });
    }



    function checkiscompleteProfile(vehicalno) {
        $.ajax({
            url: '/ischeckcompletevehicle',
            type: 'GET',
            data: {
                vehicalno: vehicalno,
            },
            success: function(response) {
                if (response.message == 'verified') {
                    $('#modalMessage').text('Vehicle is verified and complete.');
                    document.getElementById('appoingmentsavebtn').style.display = 'block';
                    document.getElementById('notificationdisplay').style.display = 'none';
                } else {
                    $('#modalMessage').text(response.message);
                    $('#responseModal').modal('show');
                    document.getElementById('appoingmentsavebtn').style.display = 'none';
                    document.getElementById('notificationdisplay').innerHTML = "The selected vehicle is incompleted.select another one.";
                    document.getElementById('notificationdisplay').style.backgroundColor = "red";
                    document.getElementById('notificationdisplay').style.color = "white";
                }

            }
        });
    }


    function viewbooking(id) {
        $.ajax({
            url: '/getbookingdetails',
            type: 'GET',
            data: {
                bookingid: id,

            },
            success: function(response) {
                if (response.html) {
                    document.querySelector('.bookingindetails').innerHTML = response.html;
                }
            }
        });
    }

    function refresh() {
        location.reload();
    }

    function setbookingid(bookingid) {
        document.getElementById('bookingidforcancel').innerHTML = bookingid;
    }

    function cancelBooking() {
        var bookingid = document.getElementById('bookingidforcancel').innerHTML;

        $.ajax({
            url: '/cancelbooking',
            type: 'GET',
            data: {
                bookingid: bookingid,

            },
            success: function(response) {
                refresh();
            }
        });
    }

    function findcustomerDetails() {
        var nic = document.getElementById('nic').value;

        $.ajax({
            url: '/getcustomerdetails',
            type: 'GET',
            data: {
                nic: nic,
            },
            success: function(response) {
                if (response.customer) {
                    // Populate the input fields with customer details
                    document.getElementById('customername').value = response.customer.full_name;
                    document.getElementById('contactno').value = response.customer.telephone_no;
                    //message
                    document.getElementById('blacklistnotofication').innerHTML = response.message;
                } else {
                    // Display an error message if the customer is not found
                    // alert("No customer found.");
                    document.getElementById('notificationdisplay').innerHTML = response.error || "No customer found.";
                    document.getElementById('notificationdisplay').style.color = "white";
                    document.getElementById('notificationdisplay').style.backgroundColor = "red";
                    document.getElementById('notificationdisplay').style.padding = "10px";
                }
            },
            error: function(xhr, status, error) {
                // Handle any errors that occurred during the AJAX request
                console.error("Error occurred: " + error);
                document.getElementById('notificationdisplay').innerHTML = "An error occurred while fetching customer details.";
                document.getElementById('notificationdisplay').style.color = "white";
                document.getElementById('notificationdisplay').style.backgroundColor = "red";
                document.getElementById('notificationdisplay').style.padding = "10px";
            }
        });

    }
</script>