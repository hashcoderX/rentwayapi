<x-frontend-app-layout>

    <style>
        .explore-our-cars__item {
            padding: 0;
            margin: 0;
            border: none;
            /* Ensures no border adds extra space */
        }

        .explore-our-cars__bottom__item {
            padding: 0;
            margin: 0;
        }

        .explore-our-cars__item__image {
            padding: 0;
            margin: 0;
            width: 100%;
            height: 100%;
            display: flex;
            /* Ensures the image fits inside properly */
        }

        .explore-our-cars__item__image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Ensures the image fills the space */
            display: block;
            /* Removes extra spacing under the image */
        }
    </style>

    <section class="main-slider-one" id="home">
        <div class="main-slider-one__carousel rentol-owl__carousel owl-carousel" data-owl-options='{
			"loop": true,
			"animateOut": "fadeOut",
			"animateIn": "fadeIn",
			"items": 1,
			"autoplay": true,
			"autoplayTimeout": 7000,
			"smartSpeed": 1000,
			"nav": false,
			"navText": ["<span class=\"icon-left-arrow\"></span>","<span class=\"icon-right-arrow\"></span>"],
			"dots": true,
			"margin": 0
	    }'>
            <div class="item">
                <div class="main-slider-one__item">
                    <div class="main-slider-one__bg" style="background-image: url(frontend/assets/images/backgrounds/backend1.jpg);"></div>
                    <div class="container-fluid">
                        <div class="row align-items-center gutter-y-60">
                            <div class="col-xl-7">
                                <div class="main-slider-one__content">
                                    <h3 class="main-slider-one__title-one">The perfect software solution</h3>
                                    <div class="main-slider-one__title-middle">tailored<span>for</span></div><!-- slider-title-two -->
                                    <div class="main-slider-one__title-two">
                                        <h1 class="main-slider-one__title-two__title">Rent-A-Car business owners.</h1><!-- / -->

                                    </div><!-- slider-title-two -->
                                </div>
                            </div><!-- /.col-lg-7 -->
                            <div class="col-xl-5">
                                <div class="main-slider-one__video">
                                    <a href="https://www.youtube.com/watch?v=h9MbznbxlLc" class="video-popup">
                                        <span class="ripple"></span>
                                        <i class="icon-play-buttton"></i>
                                    </a>
                                </div><!-- /.main-slider-one__video -->
                            </div><!-- /.col-lg-7 -->
                        </div><!-- /.row -->
                    </div><!-- /.container -->
                </div>
            </div>
            <div class="item">
                <div class="main-slider-one__item">
                    <div class="main-slider-one__bg" style="background-image: url(frontend/assets/images/backgrounds/slider-2-1.jpg);"></div>
                    <div class="container-fluid">
                        <div class="row align-items-center gutter-y-60">
                            <div class="col-xl-7">
                                <div class="main-slider-one__content">
                                    <h3 class="main-slider-one__title-one">Boost Your </h3>
                                    <div class="main-slider-one__title-middle"> Car <span>Rental</span></div><!-- slider-title-two -->
                                    <div class="main-slider-one__title-two">
                                        <h1 class="main-slider-one__title-two__title">with Rentway</h1><!-- / -->

                                    </div><!-- slider-title-two -->
                                </div>
                            </div><!-- /.col-lg-7 -->
                            <div class="col-xl-5">
                                <div class="main-slider-one__video">
                                    <a href="https://www.youtube.com/watch?v=h9MbznbxlLc" class="video-popup">
                                        <span class="ripple"></span>
                                        <i class="icon-play-buttton"></i>
                                    </a>
                                </div><!-- /.main-slider-one__video -->
                            </div><!-- /.col-lg-7 -->
                        </div><!-- /.row -->
                    </div><!-- /.container -->
                </div>
            </div>
            <div class="item">
                <div class="main-slider-one__item">
                    <div class="main-slider-one__bg" style="background-image: url(frontend/assets/images/backgrounds/slider-2-2.jpg);"></div>
                    <div class="container-fluid">
                        <div class="row align-items-center gutter-y-60">
                            <div class="col-xl-7">
                                <div class="main-slider-one__content">
                                    <h3 class="main-slider-one__title-one">Rentway – The Future of </h3>
                                    <div class="main-slider-one__title-middle"> Car <span>Rental </span></div><!-- slider-title-two -->
                                    <div class="main-slider-one__title-two">
                                        <h1 class="main-slider-one__title-two__title">Management</h1><!-- / -->

                                    </div><!-- slider-title-two -->
                                </div>
                            </div><!-- /.col-lg-7 -->
                            <div class="col-xl-5">
                                <div class="main-slider-one__video">
                                    <a href="https://www.youtube.com/watch?v=h9MbznbxlLc" class="video-popup">
                                        <span class="ripple"></span>
                                        <i class="icon-play-buttton"></i>
                                    </a>
                                </div><!-- /.main-slider-one__video -->
                            </div><!-- /.col-lg-7 -->
                        </div><!-- /.row -->
                    </div><!-- /.container -->
                </div>
            </div>
        </div>
        <div class="main-slider-one__text-animation">
            <div class="main-slider-one__text-animation__inner">
                <span class="main-slider-one__text-animation__text">Software </span><!-- /.main-slider-one__text-animation__item -->
                <span class="main-slider-one__text-animation__text">car</span><!-- /.main-slider-one__text-animation__item -->
                <span class="main-slider-one__text-animation__text">rental</span><!-- /.main-slider-one__text-animation__item -->
                <span class="main-slider-one__text-animation__text">affordable</span><!-- /.main-slider-one__text-animation__item -->
                <span class="main-slider-one__text-animation__text">rates</span><!-- /.main-slider-one__text-animation__item -->
                <span class="main-slider-one__text-animation__text">Worldwide</span><!-- /.main-slider-one__text-animation__item -->
                <span class="main-slider-one__text-animation__text">Managment</span><!-- /.main-slider-one__text-animation__item -->
                <span class="main-slider-one__text-animation__text">car</span><!-- /.main-slider-one__text-animation__item -->
                <span class="main-slider-one__text-animation__text">affordable</span><!-- /.main-slider-one__text-animation__item -->
                <span class="main-slider-one__text-animation__text">Worldwide</span><!-- /.main-slider-one__text-animation__item -->
                <span class="main-slider-one__text-animation__text">Premium</span><!-- /.main-slider-one__text-animation__item -->
                <span class="main-slider-one__text-animation__text">Premium </span><!-- /.main-slider-one__text-animation__item -->
                <span class="main-slider-one__text-animation__text">car</span><!-- /.main-slider-one__text-animation__item -->
                <span class="main-slider-one__text-animation__text">rental</span><!-- /.main-slider-one__text-animation__item -->
                <span class="main-slider-one__text-animation__text">affordable</span><!-- /.main-slider-one__text-animation__item -->
                <span class="main-slider-one__text-animation__text">rates</span><!-- /.main-slider-one__text-animation__item -->
                <span class="main-slider-one__text-animation__text">Worldwide</span><!-- /.main-slider-one__text-animation__item -->
                <span class="main-slider-one__text-animation__text">Premium</span><!-- /.main-slider-one__text-animation__item -->
                <span class="main-slider-one__text-animation__text">car</span><!-- /.main-slider-one__text-animation__item -->
                <span class="main-slider-one__text-animation__text">affordable</span><!-- /.main-slider-one__text-animation__item -->
                <span class="main-slider-one__text-animation__text">Worldwide</span><!-- /.main-slider-one__text-animation__item -->
                <span class="main-slider-one__text-animation__text">Premium</span><!-- /.main-slider-one__text-animation__item -->
                <span class="main-slider-one__text-animation__text">Premium </span><!-- /.main-slider-one__text-animation__item -->
                <span class="main-slider-one__text-animation__text">car</span><!-- /.main-slider-one__text-animation__item -->
                <span class="main-slider-one__text-animation__text">rental</span><!-- /.main-slider-one__text-animation__item -->
                <span class="main-slider-one__text-animation__text">affordable</span><!-- /.main-slider-one__text-animation__item -->
                <span class="main-slider-one__text-animation__text">rates</span><!-- /.main-slider-one__text-animation__item -->
                <span class="main-slider-one__text-animation__text">Worldwide</span><!-- /.main-slider-one__text-animation__item -->
                <span class="main-slider-one__text-animation__text">Premium</span><!-- /.main-slider-one__text-animation__item -->
                <span class="main-slider-one__text-animation__text">car</span><!-- /.main-slider-one__text-animation__item -->
                <span class="main-slider-one__text-animation__text">affordable</span><!-- /.main-slider-one__text-animation__item -->
                <span class="main-slider-one__text-animation__text">Worldwide</span><!-- /.main-slider-one__text-animation__item -->
                <span class="main-slider-one__text-animation__text">Premium</span><!-- /.main-slider-one__text-animation__item -->
                <span class="main-slider-one__text-animation__text">Premium </span><!-- /.main-slider-one__text-animation__item -->
                <span class="main-slider-one__text-animation__text">car</span><!-- /.main-slider-one__text-animation__item -->
                <span class="main-slider-one__text-animation__text">rental</span><!-- /.main-slider-one__text-animation__item -->
                <span class="main-slider-one__text-animation__text">affordable</span><!-- /.main-slider-one__text-animation__item -->
                <span class="main-slider-one__text-animation__text">rates</span><!-- /.main-slider-one__text-animation__item -->
                <span class="main-slider-one__text-animation__text">Worldwide</span><!-- /.main-slider-one__text-animation__item -->
                <span class="main-slider-one__text-animation__text">Software</span><!-- /.main-slider-one__text-animation__item -->
                <span class="main-slider-one__text-animation__text">car</span><!-- /.main-slider-one__text-animation__item -->
                <span class="main-slider-one__text-animation__text">affordable</span><!-- /.main-slider-one__text-animation__item -->
                <span class="main-slider-one__text-animation__text">Worldwide</span><!-- /.main-slider-one__text-animation__item -->
                <span class="main-slider-one__text-animation__text">Premium</span><!-- /.main-slider-one__text-animation__item -->
            </div><!-- /.main-slider-one__text-animation__inner -->
        </div><!-- /.main-slider-one__text-animation -->
    </section>
    <!-- main-slider-end -->

    <section class="booking-car-one bg-transparent wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='500ms'>
        <div class="booking-car-one__inner">
            <div class="booking-car-one__bg" style="background-image: url(frontend/assets/images/backgrounds/car-bg.png);"></div><!-- /.booking-car-one__bg -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="notification" id="notification"></div>
                        <div class="booking-car-one__content">
                            <div class="booking-car-one__form">
                                <div class="booking-car-one__form__top">
                                    <h4 class="booking-car-one__form__title">Sign Up as a Rent-A-Car Service Provider</h4>
                                    <p class="booking-car-one__form__text">Update your business details securely and efficiently.</p>
                                </div><!-- /.booking-car-one__form__top -->
                                <div class="booking-car-one__form__grid">
                                    <div class="booking-car-one__form__control">
                                        <label><span class="icon-touch"></span> Company Name</label>
                                        <div class="form-one__control">
                                            <input type="text" name="companyname" id="companyname" placeholder="Company Name">
                                        </div>
                                    </div><!-- /.booking-car-one__form__control -->
                                    <div class="booking-car-one__form__control">
                                        <label><span class=" icon-pin"></span> Address</label>
                                        <div class="form-one__control">
                                            <input type="text" name="droplocation" id="address" name="address" placeholder="Address">
                                        </div>
                                    </div><!-- /.booking-car-one__form__control -->
                                    <div class="booking-car-one__form__control">
                                        <label><span class=" icon-pin"></span> Province</label>
                                        <div class="form-one__control">
                                            <select name="province" id="province">
                                                <option value="">Select Province</option>
                                                @foreach ($provinces as $province)
                                                <option value="{{ $province->id }}">{{ $province->name_en }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div><!-- /.booking-car-one__form__control -->
                                    <div class="booking-car-one__form__control">
                                        <label><span class=" icon-pin"></span> District</label>
                                        <div class="form-one__control">
                                            <select name="district" id="district">
                                                <option>Select District</option>
                                            </select>
                                        </div>
                                    </div><!-- /.booking-car-one__form__control -->
                                    <div class="booking-car-one__form__control">
                                        <label><span class=" icon-pin"></span> City</label>
                                        <div class="form-one__control">
                                            <select name="city" id="city">
                                                <option>Select City</option>
                                            </select>
                                        </div>
                                    </div><!-- /.booking-car-one__form__control -->

                                    <div class="booking-car-one__form__control">
                                        <label><span class="icon-user-1"></span>Owner name</label>
                                        <input id="ownername" type="text" name="ownername" placeholder="Udara madumal">
                                    </div><!-- /.booking-car-one__form__control -->

                                    <div class="booking-car-one__form__control">
                                        <label><span class="icon-user-1"></span>Phone Number</label>
                                        <input id="phone_number" type="text" name="phone_number" placeholder="0713370393">
                                    </div><!-- /.booking-car-one__form__control -->

                                    <div class="booking-car-one__form__control">
                                        <label><span class="icon-user-1"></span>Whats App Number</label>
                                        <input id="mobile_number" type="text" name="mobile_number" placeholder="0713370393">
                                    </div><!-- /.booking-car-one__form__control -->


                                    <div class="booking-car-one__form__control">
                                        <label><span class="icon-dollar"></span> Currency</label>
                                        <div class="form-one__control">
                                            <select name="vehicletype" id="vehicletype">
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
                                    </div><!-- /.booking-car-one__form__control -->

                                    <div class="booking-car-one__form__control">
                                        <label><span class="icon-user-1"></span>Email</label>
                                        <input id="email" type="email" name="email" placeholder="udsrentacar@gmail.com">
                                    </div><!-- /.booking-car-one__form__control -->

                                    <div class="booking-car-one__form__control">
                                        <label><span class="icon-user-1"></span>Password</label>
                                        <input id="password" type="password" name="password" placeholder="*******">
                                    </div><!-- /.booking-car-one__form__control -->

                                    <div class="booking-car-one__form__control">
                                        <label><span class="icon-user-1"></span>Re-Password</label>
                                        <input id="repassword" type="password" name="repassword" placeholder="*******">
                                    </div><!-- /.booking-car-one__form__control -->

                                    <div class="booking-car-one__form__control">
                                        <button type="button" onclick="registerCompany()" class="booking-car-one__btn">
                                            <span>Register</span>
                                            <span><i class="icon-up-right-arrow"></i></span>
                                        </button>
                                    </div><!-- /.booking-car-one__form__control -->
                                </div><!-- /.booking-car-one__form__grid -->
                            </div>
                        </div><!-- /.booking-car-one__content -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
                <div class="booking-car-one__man">
                    <img src=" {{ asset('frontend/assets/images/resources/man-1-1.png') }} " alt="image man">
                </div><!-- /.booking-car-one__man -->
                <div class="booking-car-one__element">
                    <img src=" {{ asset('frontend/assets/images/shapes/details-shape.png') }} " alt="image man">
                </div><!-- /.booking-car-one__man -->
            </div><!-- /.container -->
        </div><!-- /.booking-car-one__inner -->
    </section><!-- /.booking-car-one -->

    @include('frontend.includes.footer')

</x-frontend-app-layout>



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
        var repassword = $('#repassword').val();

        // Check for empty required fields
        if (
            companyname === "" || address === "" || ownername === "" ||
            phone_number === "" || mobile_number === "" ||
            currency === "" || email === "" || password === "" || repassword === ""
        ) {
            alert("Please fill in all the required fields.");
            return;
        }

        // Check if passwords match
        if (password !== repassword) {
            alert("Passwords do not match.");
            $('#repassword').focus();
            return;
        }

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

        document.querySelector('.preloader').style.display = 'block';

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
                    document.querySelector('.preloader').style.display = 'none';
                } else {
                    refresh();
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