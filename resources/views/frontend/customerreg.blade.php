<x-frontend-app-layout>
    <!-- Login Start -->
    <section class="login-page">
        <div class="container">
            <div class="row gutter-y-30 align-items-center">
                <div class="col-xl-6 loginimg">
                    <div class="login-page__left wow fadeInLeft" data-wow-duration='1500ms' data-wow-delay='500ms'>
                        <div class="login-page__thumb real-image">
                            <img src="frontend/assets/images/resources/login-1-1.jpg" alt="login image">
                        </div>
                        <div class="login-page__thumb-two">
                            <img src="frontend/assets/images/resources/login-s-1-1.png" alt="rentol image">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="login-page__right wow fadeInRight" data-wow-duration='1500ms' data-wow-delay='500ms'>
                        <div class="login-page__login-box">
                            <div class="login-page__content">
                                <div class="login-page__logo">
                                    <a href="/"> <img src="maincompanylogo/logo.png" width="169" height="60" alt="logo"> </a>
                                </div>
                                <h2 class="login-page__title">Nice to see you again</h2>
                                <div class="contact-form-validated form-one mt-5">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="login-page__group">
                                                <div class="login-page__input-box">
                                                    <label for="name">Name</label>
                                                    <input type="text" id="customername" name="customername" placeholder="Customer Name">
                                                </div>

                                                <div class="login-page__input-box">
                                                    <label for="exampleInputEmail1">Address Line One</label>
                                                    <input type="text" name="c_address" id="c_address" placeholder="Address Line One">
                                                </div>




                                                <div class="login-page__input-box">
                                                    <label for="exampleInputUsername1">Province</label>
                                                    <select name="c_province" id="c_province" class="form-control">
                                                        <option value="">Select Province</option>
                                                        @foreach ($provinces as $province)
                                                        <option value="{{ $province->id }}">{{ $province->name_en }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="login-page__input-box">
                                                    <label for="exampleInputUsername1">District</label>
                                                    <select name="c_district" id="c_district" class="form-control">
                                                        <option>Select District</option>
                                                    </select>
                                                </div>

                                                <div class="login-page__input-box">
                                                    <label for="exampleInputUsername1">City</label>
                                                    <select name="c_city" id="c_city" class="form-control">
                                                        @foreach ($cities as $city)
                                                        <option>Select City</option>
                                                        @endforeach
                                                    </select>
                                                </div>


                                                <div class="login-page__input-box">
                                                    <label for="exampleInputUsername1">NIC / Passport ID / Driving Licen No</label>
                                                    <input class="form-control" type="text" id="nic" style="color: gray;">
                                                </div>
                                                <div class="login-page__input-box">
                                                    <label for="exampleInputUsername1">Mobile Number</label>
                                                    <input class="form-control" type="text" id="c_mobile_number" style="color: gray;">
                                                </div>
                                                <div class="login-page__input-box">
                                                    <div class="login-page__input-box">
                                                        <label for="exampleInputUsername1">Email</label>
                                                        <input type="email" id="c_email" name="c_email" style="color: gray;" placeholder="Add your Email">
                                                    </div>
                                                    <div class="login-page__input-box">
                                                        <label for="password">Password</label>
                                                        <input type="password" placeholder="Enter Password" id="c_password" class="login-page__password">
                                                        <span class="toggle-password pass-field-icon fa fa-fw fa-eye-slash"></span>
                                                    </div>
                                                </div>

                                                <div class="login-page__input-box">
                                                    <div class="login-page__input-box__btn mt-3">
                                                        <button type="button" class="rentol-btn" onclick="registerCustomer()">Register</button>
                                                    </div>
                                                    <div class="login-page__input-box__btn">
                                                        <button type="submit" class="rentol-btn rentol-btn__google"><img src="frontend/assets/images/shapes/google.png" alt> Or sign in with Google</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- Login End -->
    @include('frontend.includes.footer')
</x-frontend-app-layout>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // Register Customer
    function showLoader() {
        $('.preloader').fadeIn();
    }

    function hideLoader() {
        $('.preloader').fadeOut();
    }

    function registerCustomer() {
        var customername = $('#customername').val();
        var c_address = $('#c_address').val();
        var c_province = $('#c_province').val();
        var c_district = $('#c_district').val();
        var c_city = $('#c_city').val();
        var c_mobile_number = $('#c_mobile_number').val();
        var c_email = $('#c_email').val();
        var c_password = $('#c_password').val();
        var nic = $('#nic').val();

        var permentAddress = c_address + "," + c_city;
        var tempAddress = c_address + "," + c_city;

        if (customername === "" || c_address === "" || c_province === "" || c_district === "" || c_city === "" || c_mobile_number === "" || c_email === "" || c_password === "") {
            alert("Please fill in all the required fields.");
            return;
        }

        var data = {
            customername: customername,
            address: c_address,
            province: c_province,
            district: c_district,
            city: c_city,
            telephone_number: c_mobile_number,
            c_email: c_email,
            c_password: c_password,
            p_address: permentAddress,
            t_address: tempAddress,
            telephone_number_two: '',
            telephone_number_three: '',
            telephone_number_four: '',
            nic: nic,
        };

        showLoader(); // Show loader before AJAX

        $.ajax({
            url: '/registerwebcustomer',
            type: 'POST',
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.status == 200) {
                    window.location.href = '/customerlogin';
                } else {
                    refresh(); // Your refresh function
                }
            },
            
            complete: function() {
                hideLoader(); // Hide loader after AJAX
            }
        });
    }
</script>

<script>
    document.getElementById('c_province').addEventListener('change', function() {
        let provinceId = this.value;

        fetch(`/get-districts/${provinceId}`)
            .then(response => response.json())
            .then(data => {
                let districtSelect = document.getElementById('c_district');
                districtSelect.innerHTML = `<option value="">Select District</option>`;

                data.forEach(d => {
                    districtSelect.innerHTML += `<option value="${d.id}">${d.name_en}</option>`;
                });

                // Clear city dropdown
                document.getElementById('c_city').innerHTML = `<option value="">Select City</option>`;
            });
    });

    document.getElementById('c_district').addEventListener('change', function() {
        let districtId = this.value;

        fetch(`/get-cities/${districtId}`)
            .then(response => response.json())
            .then(data => {
                let citySelect = document.getElementById('c_city');
                citySelect.innerHTML = `<option value="">Select City</option>`;

                data.forEach(c => {
                    citySelect.innerHTML += `<option value="${c.id}">${c.name_en}</option>`;
                });
            });
    });
</script>