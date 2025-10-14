<x-frontend-app-layout>
    <!-- Login Start -->
    <section class="login-page">
        <div class="container">
            <div class="row gutter-y-30 align-items-center">

                <div class="col-xl-12">
                    <div class="login-page__right wow fadeInRight" data-wow-duration='1500ms' data-wow-delay='500ms'>
                        <div class="login-page__login-box">
                            <div class="login-page__content">
                                <div class="login-page__logo">
                                    <a href="/"> <img src="maincompanylogo/logo.png" width="169" height="60" alt="logo"> </a>
                                </div>
                                <h2 class="login-page__title">Advertizer Registration</h2>
                                <div class="contact-form-validated form-one mt-5">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="login-page__group">
                                                <div class="login-page__input-box">
                                                    <label for="name">Company / Your Name</label>
                                                    <input type="text" id="companyname" name="companyname" placeholder="Comapny Name Or Your Name">
                                                </div>

                                                <div class="login-page__input-box">
                                                    <label for="exampleInputEmail1">Address Line One</label>
                                                    <input type="text" name="address" id="address" placeholder="Address Line One">
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
                                                        @foreach ($cities as $city)
                                                        <option>Select City</option>
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
                                                    <label for="exampleInputUsername1">Whatsapp Number</label>
                                                    <input type="text" id="phone_number" name="phone_number" class="form-control">
                                                </div>
                                                <div class="login-page__input-box">
                                                    <label for="exampleInputUsername1">Mobile Number</label>
                                                    <input class="form-control" type="text" id="mobile_number" style="color: gray;">
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
                                                <div class="login-page__input-box mt-3">
                                                    <div class="login-page__input-box__btn">
                                                        <button type="button" class="rentol-btn" onclick="registerCompany()">Register</button>
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
    function showLoader() {
        $('.preloader').fadeIn();
    }

    function hideLoader() {
        $('.preloader').fadeOut();
    }


    function registerCompany() {
        var companyname = $('#companyname').val();
        var address = $('#address').val();
        var ownername = $('#ownername').val();
        var phone_number = $('#phone_number').val();
        var mobile_number = $('#mobile_number').val();
        var province = $('#province').val();
        var district = $('#district').val();
        var city = $('#city').val();
        var email = $('#email').val();
        var password = $('#password').val();

        if (companyname === "" || address === "" || ownername === "" || phone_number === "" || mobile_number === "" || email === "" || password === "") {
            alert("Please fill in all the required fields.");
            return;
        } else {
            var data = {
                companyname: companyname,
                regno: '',
                address: address,
                ownername: ownername,
                phone_number: phone_number,
                mobile_number: mobile_number,
                currency: '',
                email: email,
                password: password,
                province: province,
                district: district,
                city: city,
            };

            showLoader(); // Show loader before AJAX

            $.ajax({
                url: '/registercompanyforadvertizing',
                type: 'POST',
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.status == 200) {
                        // window.location.href = '/advertizerlogin';
                        signin(email,password);
                    } else {
                        refresh();
                    }
                    // alert('Booking saved successfully!');
                    // Optionally, you can perform further actions like redirecting the user or clearing the form

                },
                complete: function() {
                    hideLoader(); // Hide loader after AJAX
                }
            });
        }
    }


    function signin(email,password) {
       

        if (email === "" || password === "") {
            alert("Please fill in both email and password.");
            return;
        }

        $.ajax({
            url: "/advertizerlogin",
            type: "POST",
            data: {
                email: email,
                password: password
            },
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    window.location.href = response.redirect; // ✅ dynamic redirection
                } else {
                    alert(response.message);
                }
            }
        });
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