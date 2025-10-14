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
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <!-- <h4 class="card-title">Our Employees</h4> -->



                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th> Vehicle No </th>
                                                    <th> Description </th>
                                                    <th> Licen Exp </th>
                                                    <th> Insurence Exp </th>
                                                    <th> Per Day rental </th>
                                                    <th> Meeter </th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($vehicles as $vehicle)
                                                <tr>
                                                    <td>{{ $vehicle->vehical_no }}</td>
                                                    <td>{{ $vehicle->vehical_brand }} - {{ $vehicle->vehical_model }}</td>
                                                    <td>{{ $vehicle->licen_exp }}</td>
                                                    <td>{{ $vehicle->insurence_exp }}</td>
                                                    <td>{{ number_format($vehicle->per_day_rental,2) }}</td>
                                                    <td>{{ $vehicle->meeter }} Km</td>
                                                    <td>
                                                        <a href="/vehicledetails/{{ $vehicle->id }}" class="btn btn-primary">More Details</a>
                                                        <a id="{{ $vehicle->id }}" onclick="getVehicleDetails(this.id)" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editvehicle">Edit</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div>
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

    <!-- Modal -->
    <div class="modal fade" id="editvehicle" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group" style="display: none;">
                        <label for="exampleInputUsername1">Vehical ID</label>
                        <input type="text" class="form-control" id="vehicle_id" name="vehicle_id" style="color: gray;">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Vehical No</label>
                        <input type="text" class="form-control" id="vehicle_no" name="vehicle_no" style="color: gray;" placeholder="CDF9090">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Vehicle Type</label>
                        <select name="vehicle_type" id="vehicle_type" class="form-control" style="color: gray;">
                            <option value="bicycle">Bicycle</option>
                            <option value="motorcycle">Motorcycle</option>
                            <option value="three_wheel">Three Wheel</option>
                            <option value="cars">Cars</option>
                            <option value="jeep">Jeep</option>
                            <option value="suv">SUV</option>
                            <option value="lorries_trucks">Lorries & Trucks</option>
                            <option value="vans">Van</option>
                            <option value="maintain_servie_vehicle">Maintain & Service Vehicle</option>
                            <option value="bus">Bus</option>
                            <option value="heavy_duty">Heavy Duty</option>
                            <option value="tractors">Tractors</option>
                            <option value="boats_water_transport">Boats & Water Transport</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Body Type</label>
                        <select name="body_type" id="body_type" class="form-control" style="color: gray;">
                            <option value="Standard">Standard</option>
                            <option value="Scooter">Scooter</option>
                            <option value="Supermoto">Supermoto</option>
                            <option value="Hatchback">Hatchback</option>
                            <option value="Saloon">Saloon</option>
                            <option value="SUV/4x4">SUV/4x4</option>
                            <option value="Station Wagon">Station Wagon</option>
                            <option value="Coupe/Sports">Lorries & Trucks</option>
                            <option value="MPV">MPV</option>
                            <option value="Convertible">Convertible</option>
                            <option value="Boat">Boat</option>
                            <option value="Speed Boat">Speed Boat</option>
                            <option value="Yachts">Yachts</option>
                            <option value="Ships">Ships</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Vehicle Brand</label>
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

                    <!-- <div class="form-group">
                        <label for="exampleInputEmail1">Transmission</label>
                        <select name="transmission" id="transmission" class="form-control" style="color: gray;">
                            <option value="Automatic">Automatic</option>
                            <option value="Manual">Manual</option>
                            <option value="Tiptronic">Tiptronic</option>
                            <option value="Other Transmission">Other Transmission</option>
                        </select>
                    </div> -->

                    <div class="form-group">
                        <label for="exampleInputEmail1">Vehicle Model</label>
                        <input type="text" class="form-control" id="model_vehicle" name="model_vehicle" placeholder="Wegon R 2016" style="color: gray;">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Color</label>
                        <input type="text" class="form-control" id="color" name="color" placeholder="Color" style="color: gray;">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Fual Type</label>
                        <select name="fualtype" id="fualtype" class="form-control">
                            <option value="petrol">Petrol</option>
                            <option value="diesel">Diesel</option>
                            <option value="hybrid">Hybrid</option>
                            <option value="electric">Electric</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputUsername1">Meeter Reading</label>
                        <input type="text" class="form-control" id="meeter_reading" name="meeter_reading" placeholder="12500" style="color: gray;">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">License Expiration Date</label>
                        <input type="date" class="form-control" id="licen_expire_date" name="licen_expire_date" style="color: gray;">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUsername1">Insurence Expiration Date</label>
                        <input type="date" class="form-control" id="insurence_expire_date" name="insurence_expire_date" style="color: gray;">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="color: red;">Close</button>
                    <button type="button" class="btn btn-primary" onclick="saveChanges()">Save changes</button>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

<script>
    function refresh() {
        location.reload();
    }

    function getVehicleDetails(vehicleid) {
        $.ajax({
            url: '/getcardetail',
            type: 'GET',
            data: {
                vehicleid: vehicleid,
            },
            success: function(response) {
                document.getElementById('vehicle_id').value = response.vehicledetails.id;
                document.getElementById('vehicle_no').value = response.vehicledetails.vehical_no;
                document.getElementById('vehicle_type').value = response.vehicledetails.vehical_type;
                document.getElementById('body_type').value = response.vehicledetails.body_type;
                document.getElementById('vehicle_brand').value = response.vehicledetails.vehical_brand;
                document.getElementById('model_vehicle').value = response.vehicledetails.vehical_model;
                document.getElementById('color').value = response.vehicledetails.vehicle_color;
                document.getElementById('fualtype').value = response.vehicledetails.fualtype;
                document.getElementById('meeter_reading').value = response.vehicledetails.meeter;
                document.getElementById('licen_expire_date').value = response.vehicledetails.licen_exp;
                document.getElementById('insurence_expire_date').value = response.vehicledetails.insurence_exp;
            }
        });
    }

    function saveChanges() {
        var vehicleId = document.getElementById('vehicle_id').value;
        var vehicleNo = document.getElementById('vehicle_no').value;
        var vehicle_type = document.getElementById('vehicle_type').value;
        var body_type = document.getElementById('body_type').value;
        var vehicle_brand = document.getElementById('vehicle_brand').value;
        var model_vehicle = document.getElementById('model_vehicle').value;
        var color = document.getElementById('color').value;
        var fualtype = document.getElementById('fualtype').value;
        var meeter_reading = document.getElementById('meeter_reading').value;
        var licen_expire_date = document.getElementById('licen_expire_date').value;
        var insurence_expire_date = document.getElementById('insurence_expire_date').value;

        var data = {
            vehicleId: vehicleId,
            vehicleNo: vehicleNo,
            vehicle_type: vehicle_type,
            body_type: body_type,
            vehicle_brand: vehicle_brand,
            model_vehicle: model_vehicle,
            color: color,
            fualtype: fualtype,
            meeter_reading: meeter_reading,
            licen_expire_date: licen_expire_date,
            insurence_expire_date: insurence_expire_date,
        };

        $.ajax({
            url: '/updatevehiclebasic',
            type: 'POST',
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                location.reload();
            },
            error: function(xhr, status, error) {
                // Handle error response
                console.error(error);
                // Optionally, you can display an error message to the user
            }
        });
    }
</script>