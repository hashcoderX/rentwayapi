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
                        <!-- myvehicles -->
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="forms-sample">
                                        <!-- <div class="form-group">
                                            <label for="exampleInputUsername1">Find By Booking Date</label>
                                            <input type="date" class="form-control" id="find_booking_date" name="find_booking_date" style="color: gray;" onchange="findbookingbydate(this.value)">
                                        </div> -->
                                    </div>
                                    <div class="d-flex flex-row justify-content-between">
                                        <h4 class="card-title mb-1">Pending Advertisment List</h4>
                                        <p class="text-muted mb-1">Request Date</p>
                                        <p class="text-muted mb-1">Important Data Sets</p>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <!-- aaa  -->
                                            @foreach ($allads as $add)
                                            <div class="preview-list">
                                                <div class="preview-item border-bottom">
                                                    <div class="preview-thumbnail">
                                                        <div class="preview-icon bg-primary">
                                                            <i class="mdi mdi-file-document"></i>
                                                        </div>
                                                    </div>
                                                    <div class="preview-item-content d-sm-flex flex-grow">
                                                        <div class="flex-grow">
                                                            <h6 class="preview-subject">{{ $add->title  }}</h6>
                                                            <p class="text-muted mb-0">{{ $add->description  }}</p>
                                                        </div>
                                                        <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                                            <button class="add btn btn-primary mt-2" id="{{ $add->id }}" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="viewadvertisment(this.id)">View Ads</button>
                                                            <button class="add btn btn-danger mt-2" id="" data-bs-toggle="modal" data-bs-target="#cancelBooking" onclick="setbookingid(this.id)">Reject</button>
                                                            <button class="add btn btn-danger mt-2" id="{{ $add->id }}" data-bs-toggle="modal" data-bs-target="#deleteadd" onclick="deleteadssetid(this.id)">Delete</button>
                                                            <button class="add btn btn-primary mt-2" id="{{ $add->id }}" data-bs-toggle="modal" data-bs-target="#editadd" onclick="getadvertismentDetails(this.id)">Edit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach

                                            <!-- aaa  -->
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
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">View Advertisment</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="advertisingview" id="advertisingview">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="color: red;">Close</button>
                    <!-- <button type="button" class="btn btn-primary" onclick="createInvoice()">Create Invoice</button> -->
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteadd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Add</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="adsidfordelete" id="adsidfordelete">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="color: red;">Close</button>
                    <button type="button" class="btn btn-primary" onclick="deleteAdd()">Delete Ads</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editadd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Advertisment</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="login-page__input-box">
                        <div class="login-page__input-box">
                            <label for="exampleInputUsername1">Title</label>
                            <input type="text" id="title" name="title" placeholder="Title" class="form-control">
                        </div>
                        <div class="login-page__input-box">
                            <label for="exampleInputUsername1">Description</label>
                            <textarea name="description" id="description" class="form-control" cols="3" rows="5"></textarea>
                        </div>

                        <div class="login-page__input-box">
                            <label for="exampleInputUsername1">Price</label>
                            <input type="text" id="price" name="price" placeholder="price" class="form-control">
                        </div>

                        <div class="login-page__input-box">
                            <label for="exampleInputUsername1">Province</label>
                            <select name="province" id="province" class="form-control">
                                <option value="">Select Province</option>
                                @foreach ($provinces as $province)
                                <option value="{{ $province->id }}">{{ $province->name_en }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="login-page__input-box">
                            <label for="exampleInputUsername1">District</label>
                            <select name="district" id="district" class="form-control">
                                <option>Select District</option>
                            </select>
                        </div>

                        <div class="login-page__input-box">
                            <label for="exampleInputUsername1">City</label>
                            <select name="city" id="city" class="form-control">
                                <option>Select City</option>
                            </select>
                        </div>

                        <div class="login-page__input-box">
                            <label for="exampleInputUsername1">category</label>
                            <select name="servicetype" id="servicetype" class="form-control">
                                <option value="Ambulance Service">Ambulance Service</option>
                                <option value="Breakdown Service">Breakdown Service</option>
                                <option value="Staff Transport">Staff Transport Service</option>
                                <option value="School Transport">School Transport Service</option>
                            </select>
                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="color: red;">Close</button>
                    <button type="button" class="btn btn-primary" onclick="edit()">Edit</button>
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
    function deleteadssetid(id) {
        document.getElementById('adsidfordelete').innerHTML = id;

    }

    function deleteAdd() {
        var adid = document.getElementById('adsidfordelete').innerHTML;

        $.ajax({
            url: '/deleteadvertisment',
            type: 'GET',
            data: {
                advertismentid: adid,
            },
            success: function(response, status, xhr) {
                if (xhr.status === 200) {
                    location.reload(); // Refresh the page
                }
            },
            error: function(xhr, status, error) {
                console.error('Failed to delete ad:', error);
                alert('Something went wrong. Please try again.');
            }
        });
    }

    function getadvertismentDetails(id) {

        $.ajax({
            url: '/getadvertismentdetails',
            type: 'GET',
            data: {
                advertismentid: id,
            },
            success: function(response, status, xhr) {
                if (xhr.status === 200) {

                }
            },
            error: function(xhr, status, error) {
                console.error('Failed to delete ad:', error);
                alert('Something went wrong. Please try again.');
            }
        });
    }

    function viewadvertisment(id) {

        $.ajax({
            url: '/viewadvertisment',
            type: 'GET',
            data: {
                advertismentid: id,
            },
            success: function(response) {
                if (response.html) {
                    document.querySelector('.advertisingview').innerHTML = response.html;
                }
            }
        });
    }

    function confirmad(id) {
        var data = {
            id: id,
        };

        $.ajax({
            url: '/updatereview',
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

        });
    }

    function refresh() {
        location.reload();
    }
</script>



<script>
        document.getElementById('province').addEventListener('change', function() {
            let provinceId = this.value;

            fetch(`/get-districts/${provinceId}`)
                .then(response => response.json())
                .then(data => {
                    let districtSelect = document.getElementById('district');
                    districtSelect.innerHTML = `<option value="">Select District</option>`;

                    data.forEach(d => {
                        districtSelect.innerHTML += `<option value="${d.id}">${d.name_en}</option>`;
                    });

                    // Clear city dropdown
                    document.getElementById('city').innerHTML = `<option value="">Select City</option>`;
                });
        });

        document.getElementById('district').addEventListener('change', function() {
            let districtId = this.value;

            fetch(`/get-cities/${districtId}`)
                .then(response => response.json())
                .then(data => {
                    let citySelect = document.getElementById('city');
                    citySelect.innerHTML = `<option value="">Select City</option>`;

                    data.forEach(c => {
                        citySelect.innerHTML += `<option value="${c.id}">${c.name_en}</option>`;
                    });
                });
        });
    </script>