<x-frontend-app-layout>
    <section class="login-page">
        <div class="container">
            <div class="row gutter-y-30 ">

                <div class="col-xl-12">
                    <div class="login-page__right wow fadeInRight" data-wow-duration='1500ms' data-wow-delay='500ms'>
                        <div class="login-page__login-box">
                            <div class="login-page__content">
                                <div class="login-page__logo">
                                    <a href="/backend"> <img src="maincompanylogo/logo.png" width="169" height="60" alt="logo"> </a>
                                </div>



                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true" style="color: #f2af1e;">For System Users</button>
                                    </li>
                                    <!-- <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false" style="color: #f2af1e;">For Advertising</button>
                                    </li> -->
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false" style="color: #f2af1e;">For Customer</button>
                                    </li>

                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                        <!-- <h2 class="login-page__title">Nice to see you</h2> -->
                                        <div class="contact-form-validated form-one mt-5">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="login-page__group">
                                                        <div class="login-page__input-box">
                                                            <label for="name">Company / Your Name</label>
                                                            <input type="text" id="companyname" name="companyname" placeholder="Comapny Name Or Your Name">
                                                        </div>
                                                        <div class="login-page__input-box">
                                                            <label for="name">Register No</label>
                                                            <input type="text" id="regno" name="regno" placeholder="Reg No">
                                                        </div>
                                                        <div class="login-page__input-box">
                                                            <label for="exampleInputEmail1">Address Line One</label>
                                                            <input type="text" name="address" id="address" placeholder="Address Line One">
                                                        </div>

                                                        <div class="login-page__input-box">
                                                            <label for="exampleInputUsername1">Province</label>
                                                            <select name="province" id="province" class="form-control">
                                                                @foreach ($provinces as $province)
                                                                <option value="{{ $province->name_en  }}">{{ $province->name_en  }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="login-page__input-box">
                                                            <label for="exampleInputUsername1">District</label>
                                                            <select name="district" id="district" class="form-control">
                                                                @foreach ($districts as $district)
                                                                <option value="{{ $district->name_en  }}">{{ $district->name_en  }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="login-page__input-box">
                                                            <label for="exampleInputUsername1">City</label>
                                                            <select name="city" id="city" class="form-control">
                                                                @foreach ($cities as $city)
                                                                <option value="{{ $city->name_en  }}">{{ $city->name_en  }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="login-page__input-box">
                                                        <div class="login-page__input-box">
                                                            <label for="exampleInputUsername1">Ownername</label>
                                                            <input type="text" id="ownername" name="ownername" placeholder="Mr Rasika" class="form-control">
                                                        </div>
                                                        <div class="login-page__input-box">
                                                            <label for="exampleInputUsername1">Land Line</label>
                                                            <input type="text" id="phone_number" name="phone_number" class="form-control">
                                                        </div>
                                                        <div class="login-page__input-box">
                                                            <label for="exampleInputUsername1">Mobile Number</label>
                                                            <input class="form-control" type="text" id="mobile_number" style="color: gray;">
                                                        </div>
                                                        <div class="login-page__input-box">
                                                            <label for="exampleInputUsername1">Main Currency</label>
                                                            <select name="currency" id="currency" class="form-control" style="color: gray;">
                                                                <option value="USD">United States Dollar (USD)</option>
                                                                <option value="EUR">Euro (EUR)</option>
                                                                <option value="GBP">British Pound Sterling (GBP)</option>
                                                                <option value="AUD">Australian Dollar (AUD)</option>
                                                                <option value="CAD">Canadian Dollar (CAD)</option>
                                                                <option value="JPY">Japanese Yen (JPY)</option>
                                                                <option value="CNY">Chinese Yuan (CNY)</option>
                                                                <option value="INR">Indian Rupee (INR)</option>
                                                                <option value="LKR">Sri Lankan Rupee (LKR)</option>
                                                                <option value="CHF">Swiss Franc (CHF)</option>
                                                                <option value="NZD">New Zealand Dollar (NZD)</option>
                                                                <option value="SGD">Singapore Dollar (SGD)</option>
                                                                <option value="HKD">Hong Kong Dollar (HKD)</option>
                                                                <option value="ZAR">South African Rand (ZAR)</option>
                                                                <option value="SEK">Swedish Krona (SEK)</option>
                                                                <option value="NOK">Norwegian Krone (NOK)</option>
                                                                <option value="DKK">Danish Krone (DKK)</option>
                                                                <option value="RUB">Russian Ruble (RUB)</option>
                                                                <option value="BRL">Brazilian Real (BRL)</option>
                                                                <option value="MXN">Mexican Peso (MXN)</option>
                                                            </select>
                                                        </div>
                                                        <div class="login-page__input-box">
                                                            <label for="exampleInputUsername1">Email</label>
                                                            <input type="email" id="email" name="email" style="color: gray;" placeholder="Add your Email">
                                                        </div>
                                                        <div class="login-page__input-box">
                                                            <label for="password">Password</label>
                                                            <input type="password" placeholder="Enter Password" id="password" class="login-page__password">
                                                            <span class="toggle-password pass-field-icon fa fa-fw fa-eye-slash"></span>
                                                        </div>
                                                        <div class="login-page__input-box__btn">
                                                            <button type="button" class="rentol-btn" onclick="registerCompany()">Register</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                                        <div class="contact-form-validated form-one mt-5">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="login-page__group">
                                                        <div class="login-page__input-box">
                                                            <label for="name">Company/Your Name</label>
                                                            <input type="text" id="advertising_companyname" name="advertising_companyname" placeholder="Comapny Name Or Your Name">
                                                        </div>

                                                        <div class="login-page__input-box">
                                                            <label for="exampleInputUsername1">Contact Numbers</label>
                                                            <input class="form-control" type="text" id="advertising_mobile_number">
                                                        </div>




                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="login-page__input-box">

                                                        <div class="login-page__input-box">
                                                            <label for="exampleInputUsername1">Email</label>
                                                            <input type="email" id="advertising_p_email" name="advertising_p_email" class="form-control" placeholder="Add your Email">
                                                        </div>
                                                        <div class="login-page__input-box">
                                                            <label for="password">Password</label>
                                                            <input type="password" placeholder="Enter Password" id="advertising_password" class="login-page__password">
                                                            <span class="toggle-password pass-field-icon fa fa-fw fa-eye-slash"></span>
                                                        </div>
                                                        <div class="login-page__input-box__btn">
                                                            <button type="button" class="rentol-btn" onclick="registerCompany()">Register</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                                        <div class="contact-form-validated form-one mt-5">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="login-page__group">
                                                        <div class="login-page__input-box">
                                                            <label for="name">Name</label>
                                                            <input type="text" id="customername" name="customername" placeholder="Customer Name">
                                                        </div>

                                                        <div class="login-page__input-box">
                                                            <label for="exampleInputUsername1">Province</label>
                                                            <select name="c_province" id="c_province" class="form-control">
                                                                @foreach ($provinces as $province)
                                                                <option value="{{ $province->name_en  }}">{{ $province->name_en  }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="login-page__input-box">
                                                            <label for="exampleInputUsername1">District</label>
                                                            <select name="c_district" id="c_district" class="form-control">
                                                                @foreach ($districts as $district)
                                                                <option value="{{ $district->name_en  }}">{{ $district->name_en  }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="login-page__input-box">
                                                            <label for="exampleInputEmail1">Address Line One</label>
                                                            <input type="text" name="c_address" id="c_address" placeholder="Address Line One">
                                                        </div>


                                                        <div class="login-page__input-box">
                                                            <label for="exampleInputUsername1">City</label>
                                                            <select name="c_city" id="c_city" class="form-control">
                                                                @foreach ($cities as $city)
                                                                <option value="{{ $city->name_en  }}">{{ $city->name_en  }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
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
                                                        <div class="login-page__input-box__btn mt-3">
                                                            <button type="button" class="rentol-btn" onclick="registerCustomer()">Register</button>
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
            </div>
        </div>
    </section>




    
</x-frontend-app-layout>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function registerCompany() {
        var companyname = $('#companyname').val();
        var regno = $('#regno').val();
        var address = $('#address').val();
        var ownername = $('#ownername').val();
        var phone_number = $('#phone_number').val();
        var mobile_number = $('#mobile_number').val();
        var province = $('#province').val();
        var district = $('#district').val();
        var city = $('#city').val();
        var currency = $('#currency').val();
        var email = $('#email').val();
        var password = $('#password').val();

        if (companyname === "" || address === "" || ownername === "" || phone_number === "" || mobile_number === "" || currency === "" || email === "" || password === "") {
            alert("Please fill in all the required fields.");
            return;
        } else {
            var data = {
                companyname: companyname,
                regno: regno,
                address: address,
                ownername: ownername,
                phone_number: phone_number,
                mobile_number: mobile_number,
                currency: currency,
                email: email,
                password: password,
                province: province,
                district: district,
                city: city,
            };

            $.ajax({
                url: '/registercompany',
                type: 'POST',
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.status == 200) {
                        window.location.href = '/backend';
                    } else {
                        refresh();
                    }
                    // alert('Booking saved successfully!');
                    // Optionally, you can perform further actions like redirecting the user or clearing the form

                }
            });
        }
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

        var permentAddress = c_address + "," + c_city;
        var tempAddress = c_address + "," + c_city;

        var nic = $('#nic').val();

        if (customername === "" || c_address === "" || c_province === "" || c_district === "" || c_city === "" || c_mobile_number === "" || c_email === "" || c_password === "") {
            alert("Please fill in all the required fields.");
            return;
        } else {
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
                        refresh();
                    }
                    // alert('Booking saved successfully!');
                    // Optionally, you can perform further actions like redirecting the user or clearing the form

                }
            });
        }
    }
</script>