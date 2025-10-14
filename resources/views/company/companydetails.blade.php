<x-app-layout>

    <style>
        .disabled {
            opacity: 0.5;
            /* Adjust the opacity as desired */
            pointer-events: none;
            /* Prevent pointer events */
        }
    </style>

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
                                    <!-- <h4 class="card-title">Our Employees</h4> -->
                                    <div class="table-responsive">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Company</h4>

                                                <div class="preview-item border-bottom mt-4">

                                                    <div class="preview-item-content d-flex flex-grow">
                                                        <div class="flex-grow">
                                                            <div class="d-flex d-md-block d-xl-flex justify-content-between">
                                                                <h6 class="preview-subject">{{ $company->name }}</h6>

                                                            </div>

                                                        </div>
                                                    </div>


                                                </div>






                                            </div>
                                        </div>



                                    </div>
                                </div>

                                <div class="p-10">
                                    <div id="companyid"> {{ $company->id }} </div>
                                    <div id="cmpanycode"> {{ $company->company_code }} </div>
                                    <div id="regno">{{ $company->reg_no }}</div>
                                    <div id="registerdate">{{ $company->register_date }}</div>
                                    <div id="companyemail">{{ $company->email }}</div>
                                    <div id="companyaddress">{{ $company->address }}</div>
                                    <div id="contactno">{{ $company->contact_no }} / {{ $company->mobile_number }}</div>
                                </div>

                                <table class="table table-responsive">
                                    <tr>
                                        <th>User Name</th>
                                        <th>Type</th>
                                    </tr>

                                    @foreach($userlists as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->usertype }}</td>
                                    </tr>
                                    @endforeach
                                </table>

                                <div class="buttons mt-2 p-10">
                                    <button class="btn btn-danger" onclick="resetdata()">Reset Data</button>
                                    <button class="btn btn-danger" onclick="systemDeactive()">Deactive</button>
                                    <button class="btn btn-success" onclick="systemActive()">Active</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 grid-margin stretch-card">

                            <div class="card">
                                <div class="d-flex flex-row justify-content-between">
                                    <h4 class="card-title p-2">Billing History</h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-dark">
                                        <thead>
                                            <tr>
                                                <th> # id</th>
                                                <th> Date </th>
                                                <th> Amount </th>
                                                <th> Drive Distance </th>
                                            </tr>
                                        </thead>
                                        <tbody>



                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
</x-app-layout>

<script>
    function refresh() {
        location.reload();
    }

    function resetdata() {
        var companyid = document.getElementById('companyid').textContent.trim(); // safer than innerHTML

        if (!companyid) {
            alert("Company ID not found!");
            return;
        }

        if (confirm("Are you sure you want to reset all data for this company? This action cannot be undone.")) {
            $.ajax({
                url: '/resetcompanydata',
                type: 'GET',
                data: {
                    companyid: companyid
                },
                success: function(response) {
                    alert("Company data reset successfully!");
                    location.reload();
                },
                error: function(xhr) {
                    alert("An error occurred: " + xhr.responseText);
                }
            });
        }
    }

    function systemDeactive() {

        var companyid = document.getElementById('companyid').textContent.trim(); // safer than innerHTML

        if (!companyid) {
            alert("Company ID not found!");
            return;
        }
        if (confirm("Are you sure you want to Deactive  this company? This action cannot be undone.")) {
            $.ajax({
                url: '/updatecompanystatus',
                type: 'GET',
                data: {
                    companyid: companyid,
                    status: 'deactive',
                },
                success: function(response) {
                    alert("Company data reset successfully!");
                    location.reload();
                },
                error: function(xhr) {
                    alert("An error occurred: " + xhr.responseText);
                }
            });
        }

    }


    function systemActive() {

        var companyid = document.getElementById('companyid').textContent.trim(); // safer than innerHTML

        if (!companyid) {
            alert("Company ID not found!");
            return;
        }
        if (confirm("Are you sure you want to Deactive  this company? This action cannot be undone.")) {
            $.ajax({
                url: '/updatecompanystatus',
                type: 'GET',
                data: {
                    companyid: companyid,
                    status: 'active',
                },
                success: function(response) {
                    alert("Company data reset successfully!");
                    location.reload();
                },
                error: function(xhr) {
                    alert("An error occurred: " + xhr.responseText);
                }
            });
        }

    }
</script>