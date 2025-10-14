<x-fndashboard-layout>
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
                    <div class="main-slider-one__bg" style="background-image: url(frontend/assets/images/backgrounds/slider-1-1.jpg);"></div>
                    <div class="container-fluid">
                        <div class="row align-items-center gutter-y-60">
                            <div class="col-xl-7">
                                <div class="main-slider-one__content">
                                    <h3 class="main-slider-one__title-one">Find the Perfect Ride</h3>
                                    <div class="main-slider-one__title-middle">Near<span>with</span></div><!-- slider-title-two -->
                                    <div class="main-slider-one__title-two">
                                        <h1 class="main-slider-one__title-two__title">Rentway</h1><!-- / -->
                                        <a class="main-slider-one__title-two__btn" href="/vehicles">
                                            <span>Book A car</span>
                                            <span><i class="icon-up-right-arrow"></i></span>
                                        </a>
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
                                        <a class="main-slider-one__title-two__btn" href="/getrentwaysystem">
                                            <span>Our Rental Managment System</span>
                                            <span><i class="icon-up-right-arrow"></i></span>
                                        </a>
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
                                        <a class="main-slider-one__title-two__btn" href="/getrentwaysystem">
                                            <span>Our Rental Managment System</span>
                                            <span><i class="icon-up-right-arrow"></i></span>
                                        </a>
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
            </div><!-- /.main-slider-one__text-animation__inner -->
        </div><!-- /.main-slider-one__text-animation -->
    </section>
    <!-- main-slider-end -->

    <section class="how-rent-two section-space">
        <div class="container">
            <div class="row gutter-y-30">

                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <a href="/getrentwaysystem">
                        <div class="how-rent-two__item wow fadeInLeft" data-wow-duration="1500ms" data-wow-delay="200ms" style="height: 400px;">
                            <div class="how-rent-two__item__top">
                                <div class="how-rent-two__item__icon">
                                    <i class="icon-car-1"></i>
                                </div>
                            </div>
                            <h4 class="how-rent-two__item__title">Get Rentway System</h4>
                            <p class="how-rent-two__item__text">For Car Rental Providers</p>
                        </div>
                    </a>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <a href="/allads">
                        <div class="how-rent-two__item wow fadeInLeft" data-wow-duration="1500ms" data-wow-delay="800ms">
                            <div class="how-rent-two__item__top">
                                <div class="how-rent-two__item__icon">
                                    <i class="icon-driver"></i>
                                </div>
                            </div>
                            <h4 class="how-rent-two__item__title">All Ads</h4>
                            <p class="how-rent-two__item__text">Find Rental Advertisment </p>
                        </div>
                    </a>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <a href="/getrides">
                        <div class="how-rent-two__item wow fadeInLeft" data-wow-duration="1500ms" data-wow-delay="400ms">
                            <div class="how-rent-two__item__top">
                                <div class="how-rent-two__item__icon">
                                    <i class="icon-car-insurance"></i>
                                </div>
                            </div>
                            <h4 class="how-rent-two__item__title">Get Rides</h4>
                            <p class="how-rent-two__item__text">Book a car and drive with ease!</p>
                        </div>
                    </a>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <a href="/rentyouvehicle">
                        <div class="how-rent-two__item wow fadeInLeft" data-wow-duration="1500ms" data-wow-delay="600ms">
                            <div class="how-rent-two__item__top">
                                <div class="how-rent-two__item__icon">
                                    <i class="icon-car-insurance-1"></i>
                                </div>
                            </div>
                            <h4 class="how-rent-two__item__title">Rent Your Vehicle</h4>
                            <p class="how-rent-two__item__text">Rent your car with seamless delivery!</p>
                        </div>
                    </a>
                </div>

                <!-- <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <a href="/getjob">
                        <div class="how-rent-two__item wow fadeInLeft" data-wow-duration="1500ms" data-wow-delay="800ms">
                            <div class="how-rent-two__item__top">
                                <div class="how-rent-two__item__icon">
                                    <i class="icon-driver"></i>
                                </div>
                            </div>
                            <h4 class="how-rent-two__item__title">Get a Job</h4>
                            <p class="how-rent-two__item__text">Find driving jobs with great flexibility!</p>
                        </div>
                    </a>
                </div> -->


                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <a href="findambulance">
                        <div class="how-rent-two__item wow fadeInLeft" data-wow-duration="1500ms" data-wow-delay="800ms">
                            <div class="how-rent-two__item__top">
                                <div class="how-rent-two__item__icon">
                                    <i class="icon-delivery"></i>
                                </div>
                            </div>
                            <h4 class="how-rent-two__item__title">Find Ambulance</h4>
                            <p class="how-rent-two__item__text">Book an ambulance quickly and easily</p>
                        </div>
                    </a>
                </div>



                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <a href="findbrakdownservice">
                        <div class="how-rent-two__item wow fadeInLeft" data-wow-duration="1500ms" data-wow-delay="800ms">
                            <div class="how-rent-two__item__top">
                                <div class="how-rent-two__item__icon">
                                    <i class="icon-satisfaction"></i>
                                </div>
                            </div>
                            <h4 class="how-rent-two__item__title">Find Brakedown service & Boom Truck</h4>
                            <p class="how-rent-two__item__text">Tow your vehicle anytime</p>
                        </div>
                    </a>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <a href="findstarfftransport">
                        <div class="how-rent-two__item wow fadeInLeft" data-wow-duration="1500ms" data-wow-delay="800ms">
                            <div class="how-rent-two__item__top">
                                <div class="how-rent-two__item__icon">
                                    <i class="icon-distance"></i>
                                </div>
                            </div>
                            <h4 class="how-rent-two__item__title">Find Starf Transport Service</h4>
                            <p class="how-rent-two__item__text">Find trusted staff service with availability.</p>
                        </div>
                    </a>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                    <a href="schooltransport">
                        <div class="how-rent-two__item wow fadeInLeft" data-wow-duration="1500ms" data-wow-delay="800ms">
                            <div class="how-rent-two__item__top">
                                <div class="how-rent-two__item__icon">
                                    <i class="icon-baby-car-seat"></i>
                                </div>
                            </div>
                            <h4 class="how-rent-two__item__title">Find School Transport Service</h4>
                            <p class="how-rent-two__item__text">Easy access to trusted school transport services.</p>
                        </div>
                    </a>
                </div>

            </div>

        </div><!-- /.container -->
        <div class="how-rent-two__element-one">
            <img src="{{ asset('frontend/assets/images/resources/how-1-1.png') }} " alt>
        </div><!-- /.how-rent-two__element-one -->
        <div class="how-rent-two__element-two">
            <img src="{{ asset('frontend/assets/images/resources/how-1-2.png') }} " alt>
        </div><!-- /.how-rent-two__element-one -->
    </section><!-- /.how-rent-two -->

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
                                    <h4 class="booking-car-one__form__title">Open Hire Request</h4>
                                    <p class="booking-car-one__form__text">Save your money and time</p>
                                </div><!-- /.booking-car-one__form__top -->
                                <div class="booking-car-one__form__grid">

                                    <div class="booking-car-one__form__control">
                                        <label><span class=" icon-pin"></span> pickup</label>
                                        <div class="form-one__control">
                                            <input type="text" name="pickuplocation" id="pickuplocation" placeholder="Pickup Location">
                                        </div>
                                    </div><!-- /.booking-car-one__form__control -->
                                    <div class="booking-car-one__form__control">
                                        <label><span class=" icon-pin"></span> drop of</label>
                                        <div class="form-one__control">
                                            <input type="text" name="droplocation" id="droplocation" placeholder="Drop Location">
                                        </div>
                                    </div><!-- /.booking-car-one__form__control -->
                                    <div class="booking-car-one__form__control">
                                        <label><span class="icon-calendar-1"></span>Pickup date</label>
                                        <input class="rentol-datepicker " id="pickupdate" type="text" name="pickupdate" placeholder="12 / 03 / 2024">
                                    </div><!-- /.booking-car-one__form__control -->
                                    <div class="booking-car-one__form__control">
                                        <label><span class="icon-calendar-1"></span>Drop date</label>
                                        <input class="rentol-datepicker " id="dropdate" type="text" name="dropdate" placeholder="12 / 03 / 2024">
                                    </div><!-- /.booking-car-one__form__control -->
                                    <div class="booking-car-one__form__control">
                                        <label><span class="icon-car"></span> Type Of Vehicle</label>
                                        <div class="form-one__control">
                                            <select name="vehicletype" id="vehicletype">
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
                                    </div><!-- /.booking-car-one__form__control -->
                                    <div class="booking-car-one__form__control">
                                        <label><span class="icon-car"></span> Note</label>
                                        <div class="form-one__control">
                                            <input type="text" name="note" id="note" placeholder="Toyota CH-R 2018">
                                        </div>
                                    </div><!-- /.booking-car-one__form__control -->

                                    <div class="booking-car-one__form__control">
                                        <button type="submit" onclick="addBookingRequest()" class="booking-car-one__btn">
                                            <span>Add Hire Request</span>
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



    <section class="explore-our-cars">
        <div class="explore-our-cars__bg" style="background-image: url(assets/images/backgrounds/card-1-1.jpg);"></div><!-- /.explore-our-cars__bg -->

        <div class="explore-our-cars__bottom section-space">
            <div class="container">
                <div class="explore-our-cars__bottom__top">
                    <div class="sec-title sec-title--two text-center">
                        <h6 class="sec-title__tagline bw-split-in-right">EXPLORE OUR CARS</h6><!-- /.sec-title__tagline -->
                        <h3 class="sec-title__title bw-split-in-left">OUR VEHICLE FLEET</h3><!-- /.sec-title__title -->
                    </div><!-- /.sec-title -->
                    <div class="explore-our-cars__bottom__nav-item">
                        <div class="explore-our-cars__bottom__custome-navs"></div><!-- /.explore-our-cars__bottom__custome-navs -->
                    </div><!-- /.explore-our-cars__bottom__nav-item -->
                </div><!-- /.explore-our-cars__top-item -->
            </div><!-- /.container -->
            <div class="explore-our-cars__bottom__inner">
                <div class="explore-our-cars__bottom__carousel rentol-owl__carousel rentol-owl__carousel--with-shadow rentol-owl__carousel--basic-nav owl-carousel owl-theme" data-owl-options='{
					"items": 1,
					"margin": 30,
					"loop": false,
					"smartSpeed": 700,
					"navContainer": ".explore-our-cars__bottom__custome-navs",
					"nav": true,
					"navText": ["<i class=\"icon-arrow-left-2\"></i>","<i class=\"icon-right-2\"></i>"],
					"dots": false,
					"autoplay": false,
					"responsive": {
						"0": {
							"items": 1
						},
						"600": {
							"items": 2,
							"margin": 15
						},
						"768": {
							"items": 2,
							"margin": 15
						},
						"992": {
							"items": 3
						},
						"1199": {
							"items": 3
						},
						"1400": {
							"items": 4
						},
						"1600": {
							"items": 5
						}
					}
				}'>

                    @foreach ($avalibleVehicles as $avalibleVehicle)
                    <div class="explore-our-cars__bottom__item">
                        <div class="explore-our-cars__item">
                            <div class="explore-our-cars__item__image">

                                <img src="{{ asset($avalibleVehicle->firstImage->image_url ?? 'default.jpg') }}" alt="Vehicle Image">
                            </div><!-- /.explore-our-cars__item__image -->
                            <div class="explore-our-cars__content">
                                <div class="rentol-ratings">
                                    <span class="rentol-ratings__icon"> <i class="icon-star"></i> </span><!-- /.rentol-ratings__icon -->
                                    <span class="rentol-ratings__icon"> <i class="icon-star"></i> </span><!-- /.rentol-ratings__icon -->
                                    <span class="rentol-ratings__icon"> <i class="icon-star"></i> </span><!-- /.rentol-ratings__icon -->
                                    <span class="rentol-ratings__icon"> <i class="icon-star"></i> </span><!-- /.rentol-ratings__icon -->
                                    <span class="rentol-ratings__icon"> <i class="icon-star"></i> </span><!-- /.rentol-ratings__icon -->
                                </div><!-- /.product-ratings -->
                                <h4 class="explore-our-cars__item__title"><a href="fleet-details-2.html">{{ $avalibleVehicle->vehical_brand  }} {{ $avalibleVehicle->vehical_model  }}</a></h4><!-- /.explore-our-cars__title -->
                                <p class="explore-our-cars__item__text">{{ $avalibleVehicle->description  }}</p><!-- /.explore-our-cars__text -->
                                <div class="explore-our-cars__content__bottom">
                                    <div class="explore-our-cars__item__price">LKR {{ $avalibleVehicle->per_day_rental }} <span>/day</span></div><!-- /.explore-our-cars__price -->
                                    <a href="/fleetview/{{ $avalibleVehicle->id }}" class="explore-our-cars__item__link"><i class="icon-up-right-arrow"></i></a>
                                </div><!-- /.explore-our-cars__content__bottom -->
                            </div><!-- /.explore-our-cars__content -->
                        </div><!-- /.explore-our-cars__item -->
                    </div><!-- /.explore-our-cars__bottom__item -->
                    @endforeach


                </div><!-- /.explore-our-cars__bottom__carousel -->
            </div><!-- /.explore-our-cars__bottom__inner -->
        </div><!-- /.explore-our-cars__bottom -->
        <div class="explore-our-cars__element">
            <img src="{{ asset('frontend/assets/images/shapes/shape-faq.png') }}" alt>
        </div><!-- /.explore-our-cars__element -->
    </section><!-- /.explore-our-cars -->

    <section class="your-dream-one section-space">
        <div class="container">
            <div class="row gutter-y-40">
                <div class="col-lg-6">
                    <div class="your-dream-one__thumb wow fadeInLeft" data-wow-duration='1500ms' data-wow-delay='500ms'>
                        <div class="your-dream-one__thumb__item">
                            <img src=" {{ asset('frontend/assets/images/about/our-driver-1-2.jpg') }} " alt="image">
                        </div><!-- /.your-dream-one__thumb__item -->
                        <div class="your-dream-one__thumb__item-small">
                            <img src=" {{ asset('frontend/assets/images/about/our-driver-1-1.jpg') }} " alt="image">
                        </div><!-- /.your-dream-one__thumb__item -->
                        <div class="your-dream-one__element-four">
                            <img src=" {{ asset('frontend/assets/images/shapes/truse-1-1.png') }} " alt>
                        </div><!-- /.your-dream-one__element -->
                    </div><!-- /.your-dream-one__thumb -->
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="your-dream-one__container">
                        <div class="sec-title sec-title--two text-start">
                            <h6 class="sec-title__tagline bw-split-in-right">DRIVE YOUR DREAMS</h6><!-- /.sec-title__tagline -->
                            <h3 class="sec-title__title bw-split-in-left">EXPERIENCE FREEDOM ON FOUR WHEELS</h3><!-- /.sec-title__title -->
                        </div><!-- /.sec-title -->
                        <p class="your-dream-one__text wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='500ms'>Experience true freedom on the road with Rentway.lk. Choose from a wide range of vehicles and travel at your own pace. Need a stress-free ride? Our professional drivers are ready to assist. Your journey, your way! </p><!-- /.your-dream-one__text -->
                        <div class="your-dream-one__funfact">
                            <div class="row gutter-y-30">
                                <div class="col-md-6 col-sm-12 wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='500ms'>
                                    <div class="funfact-one__item count-box">
                                        <div class="funfact-one__item__bg" style="background-image: url(frontend/assets/images/resources/funfact-bg-1-1.jpg);"></div><!-- /.funfact-one__item__bg -->
                                        <h3 class="funfact-one__funfact__count">
                                            <span class="count-text" data-stop="1200" data-speed="1500"></span>
                                        </h3><!-- /.funfact-one__funfact__count -->
                                        <p class="funfact-one__funfact__text">Vehicle Fleet</p><!-- /.funfact-one__funfact__text -->
                                        <div class="funfact-one__border__group">
                                            <span></span>
                                            <span></span>
                                        </div><!-- /.funfact-one__border__group -->
                                    </div><!-- /.funfact-one__item -->
                                </div><!-- /.col-md-6 col-sm-12 -->
                                <div class="col-md-6 col-sm-12 wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='500ms'>
                                    <div class="funfact-one__item count-box">
                                        <div class="funfact-one__item__bg" style="background-image: url(frontend/assets/images/resources/funfact-bg-1-2.jpg);"></div><!-- /.funfact-one__item__bg -->
                                        <h3 class="funfact-one__funfact__count">
                                            <span class="count-text" data-stop="5" data-speed="1500"></span>
                                            <span>M+</span>
                                        </h3><!-- /.funfact-one__funfact__count -->
                                        <p class="funfact-one__funfact__text">Kilometer of Drive</p><!-- /.funfact-one__funfact__text -->
                                        <div class="funfact-one__border__group">
                                            <span></span>
                                            <span></span>
                                        </div><!-- /.funfact-one__border__group -->
                                    </div><!-- /.funfact-one__item -->
                                </div><!-- /.col-md-6 col-sm-12 -->
                                <div class="col-md-6 col-sm-12 wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='500ms'>
                                    <div class="funfact-one__item count-box">
                                        <div class="funfact-one__item__bg" style="background-image: url(frontend/assets/images/resources/funfact-bg-1-3.jpg);"></div><!-- /.funfact-one__item__bg -->
                                        <h3 class="funfact-one__funfact__count">
                                            <span class="count-text" data-stop="50" data-speed="1500"></span>
                                            <span>K+</span>
                                        </h3><!-- /.funfact-one__funfact__count -->
                                        <p class="funfact-one__funfact__text">Pickup & Drop</p><!-- /.funfact-one__funfact__text -->
                                        <div class="funfact-one__border__group">
                                            <span></span>
                                            <span></span>
                                        </div><!-- /.funfact-one__border__group -->
                                    </div><!-- /.funfact-one__item -->
                                </div><!-- /.col-md-6 col-sm-12 -->
                                <div class="col-md-6 col-sm-12 wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='500ms'>
                                    <div class="funfact-one__item count-box">
                                        <div class="funfact-one__item__bg" style="background-image: url(frontend/assets/images/resources/funfact-bg-1-4.jpg);"></div><!-- /.funfact-one__item__bg -->
                                        <h3 class="funfact-one__funfact__count">
                                            <span class="count-text" data-stop="20" data-speed="1500"></span>
                                            <span>K+</span>
                                        </h3><!-- /.funfact-one__funfact__count -->
                                        <p class="funfact-one__funfact__text">Booking Reserved</p><!-- /.funfact-one__funfact__text -->
                                        <div class="funfact-one__border__group">
                                            <span></span>
                                            <span></span>
                                        </div><!-- /.funfact-one__border__group -->
                                    </div><!-- /.funfact-one__item -->
                                </div><!-- /.col-xl-3 col-lg-4 -->
                            </div><!-- /.row -->
                        </div><!-- /.your-dream-one__funfact -->
                    </div><!-- /.your-dream-one__container -->
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
        <div class="your-dream-one__element-one">
            <img src="{{ asset('frontend/assets/images/shapes/truse-1-3.png') }} " alt>
        </div><!-- /.your-dream-one__element -->
        <div class="your-dream-one__element-two">
            <img src=" {{ asset('frontend/assets/images/shapes/truse-1-1.png') }} " alt>
        </div><!-- /.your-dream-one__element -->
        <div class="your-dream-one__element-three">
            <img src=" {{ asset('frontend/assets/images/shapes/truse-1-2.png') }} " alt>
        </div><!-- /.your-dream-one__element -->

    </section><!-- /.your-dream -->

    <section class="luxury-car-one luxury-car-one--two section-space">
        <div class="container">
            <div class="row gutter-y-60">
                <div class="col-lg-6">
                    <div class="luxury-car-one__content">
                        <div class="sec-title sec-title--two text-start">
                            <h6 class="sec-title__tagline bw-split-in-right">LUXURY CARS</h6><!-- /.sec-title__tagline -->
                            <h3 class="sec-title__title bw-split-in-left">Ride To Destinations With Maximum Comfort</h3><!-- /.sec-title__title -->
                        </div><!-- /.sec-title -->
                        <p class="luxury-car-one__text wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='100ms'>Experience smooth and stress-free travel with Rentway.lk. Choose from our well-maintained vehicles and enjoy maximum comfort on every journey. Whether short trips or long adventures, ride with ease and confidence! </p><!-- /.luxury-car-one__text -->
                        <div class="luxury-car-one__feature">
                            <div class="luxury-car-one__feature__list wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='100ms'>
                                <div class="luxury-car-one__feature__list__icon">
                                    <i class="icon-check1"></i>
                                </div>
                                <div class="luxury-car-one__feature__list__content">
                                    <h5 class="luxury-car-one__feature__list__title">No Delays</h5>
                                    <p class="luxury-car-one__feature__list__text">With Rentway.lk, enjoy punctual, reliable service with no delays—your time is always respected.</p>
                                </div>
                            </div>
                            <div class="luxury-car-one__feature__list wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='300ms'>
                                <div class="luxury-car-one__feature__list__icon">
                                    <i class="icon-check1"></i>
                                </div>
                                <div class="luxury-car-one__feature__list__content">
                                    <h5 class="luxury-car-one__feature__list__title">High Quality</h5>
                                    <p class="luxury-car-one__feature__list__text">Rentway.lk offers high-quality vehicles, ensuring a smooth, reliable, and comfortable ride every time.</p>
                                </div>
                            </div>
                        </div><!-- /.luxury-car-one__feature -->
                    </div><!-- /.luxury-car-one__content -->
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="luxury-car-one__carousel wow fadeInRight" data-wow-duration='1500ms' data-wow-delay='300ms'>
                        <div class="luxury-car-one__carousel__bg" style="background-image: url(assets/images/resources/car-carousel-bg.png);"></div><!-- /.luxury-car-one__carousel__bg -->
                        <div class="luxury-car-one__carousel__inner rentol-owl__carousel owl-carousel owl-theme" data-owl-options='{
                            "items": 1,
                            "margin": 30,
                            "loop": false,
                            "smartSpeed": 700,
                            "nav": false,
                            "navText": ["<i class=\"icon-right-arrow\"></i>","<i class=\"icon-right-arrow\"></i>"],
                            "dots": true,
                            "autoplay": false
                        }'>
                            <div class="luxury-car-one__item">
                                <img src="{{ asset('frontend/assets/images/resources/car-carousel-1-1.png') }}" alt="image">
                            </div><!-- /.luxury-car-one__item -->
                            <div class="luxury-car-one__item">
                                <img src="{{ asset('frontend/assets/images/resources/car-carousel-1-2.png') }}" alt="image">
                            </div><!-- /.luxury-car-one__item -->
                            <div class="luxury-car-one__item">
                                <img src="{{ asset('frontend/assets/images/resources/car-carousel-1-1.png') }}" alt="image">
                            </div><!-- /.luxury-car-one__item -->
                        </div><!-- /.luxury-car-one__carousel__inner -->
                    </div><!-- /.luxury-car-one__carousel -->
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
        <div class="luxury-car-one__element">
            <img src="{{ asset('frontend/assets/images/shapes/shape-2-2.png') }}" alt>
        </div><!-- /.luxury-car-one__element -->
        <div class="luxury-car-one__element-two">
            <img src="{{ asset('frontend/assets/images/shapes/shape-2-3.png') }}" alt>
        </div><!-- /.luxury-car-one__element -->
    </section><!-- /.luxury-car-one -->

    <section class="asked-question section-space-top asked-question--padding-bottom" id="faq">
        <div class="asked-question__bg" style="background-image: url(frontend/assets/images/shapes/asked-bg.png);"></div><!-- /.asked-question__bg -->

        <div class="container">
            <div class="row gutter-y-40">

            </div><!-- /.row -->
        </div><!-- /.container -->

        <div class="asked-question__element">
            <img src="{{ asset('frontend/assets/images/shapes/shape-faq.png') }}" alt>
        </div><!-- /.asked-question__element -->

    </section><!-- /.asked-question -->

    <section class="fleet-cta fleet-cta--two wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='300ms'>
        <div class="container">
            <div class="fleet-cta__inner">
                <div class="fleet-cta__inner__item">
                    <div class="sec-title">
                        <h6 class="sec-title__tagline bw-split-in-right">Available 24/7</h6><!-- /.sec-title__tagline -->
                        <h3 class="sec-title__title bw-split-in-left">Call Today For Booking</h3><!-- /.sec-title__title -->
                    </div><!-- /.sec-title -->
                </div><!-- /.fleet-cta__inner__item -->
                <div class="fleet-cta__inner__item fleet-cta__inner__item--two">
                    <div class="fleet-cta__inner__item__call">
                        <a href="tel:+88-0123-654-99" class="fleet-cta__call">
                            <div class="fleet-cta__call__icon">
                                <i class="icon-telephone"></i>
                                <i class="ripple"></i>
                            </div>
                            <div class="fleet-cta__call__content">
                                <span class="fleet-cta__call__text">call emergency</span>
                                <h6 class="fleet-cta__call__number">0702932000</h6>
                            </div>
                        </a>
                        <div class="fleet-cta__inner__bg" style="background-image: url(frontend/assets/images/shapes/background-cta.png);"></div><!-- /.fleet-cta__inner__bg -->
                    </div><!-- /.fleet-cta__inner__item__call -->
                </div><!-- /.fleet-cta__inner__item -->
                <div class="fleet-cta__inner__item">
                    <a href="contact.html" class="fleet-cta__inner__btn">
                        <span>Book A car</span>
                        <span><i class="icon-up-right-arrow"></i></span>
                    </a>
                </div><!-- /.fleet-cta__inner__item -->
            </div><!-- /.fleet-cta__inner -->
        </div><!-- /.container -->
    </section><!-- /.fleet-cta -->

    

    <!-- <section class="testimonials-one section-space" id="testimonial">
        <div class="testimonials-one__bg" style="background-image: url(frontend/assets/images/backgrounds/testimonials-bg-2-1.png);"></div>
        <div class="container">
            <div class="testimonials-one__top">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="sec-title sec-title--two text-start">
                            <h6 class="sec-title__tagline bw-split-in-right">our testimonials</h6>
                            <h3 class="sec-title__title bw-split-in-left">what peoples say about <br> rentol</h3>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="testimonials-one__custome-navs"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="testimonials-one__inner">
            <div class="testimonials-one__carousel rentol-owl__carousel rentol-owl__carousel--with-shadow rentol-owl__carousel--basic-nav owl-carousel owl-theme" data-owl-options='{
                "items": 1,
                "margin": 30,
                "loop": true,
                "smartSpeed": 700,
                "navContainer": ".testimonials-one__custome-navs",
                "nav": true,
                "dots": false,
                "navText": ["<span class=\"icon-arrow-left-2\"></span>","<span class=\"icon-arrow-right-2\"></span>"],
                "autoplay": false,
                "responsive": {
                    "0": {
                        "items": 1,
                        "margin": 30
                    },
                    "768": {
                        "items": 1,
                        "margin": 30
                    },
                    "992": {
                        "items": 2,
                        "margin": 30
                    },
                    "1200": {
                        "items": 2,
                        "margin": 30
                    },
                    "1400": {
                        "items": 3,
                        "margin": 30
                    }
                }
            }'>
                <div class="testimonials-one__item">
                    <div class="testimonials-card testimonials-card--one wow fadeInUp" data-wow-duration='000ms' data-wow-delay='200ms'>
                        <div class="testimonials-card__top">
                            <div class="testimonials-card__image">
                                <img src="{{ asset('frontend/assets/images/resources/testi-2-1.jpg') }}" alt="Kathryn Murphy">
                            </div>
                            <div class="testimonials-card__top__video">
                                <a href="https://www.youtube.com/watch?v=h9MbznbxlLc" class="testimonials-card__video video-popup">
                                    <i class="icon-play-buttton"></i>
                                </a>
                            </div>
                        </div>
                        <p class="testimonials-card__text">“Consectetur adipiscing elit. Integer nunc viverra laoreet est the is porta pretium metus aliquam eget maecenas porta is nunc viverra Aenean pulvinar maximus leo ”</p>
                        <div class="testimonials-card__content">
                            <div class="testimonials-card__author">
                                <h4 class="testimonials-card__author__title">Kathryn Murphy</h4>
                                <span class="testimonials-card__author__dec">Web Developer</span>
                            </div>
                            <div class="testimonials-card__rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        <div class="testimonials-card__quite">
                            <i class="icon-quite"></i>
                        </div>
                    </div>
                </div>
                <div class="testimonials-one__item">
                    <div class="testimonials-card testimonials-card--one wow fadeInUp" data-wow-duration='000ms' data-wow-delay='200ms'>
                        <div class="testimonials-card__top">
                            <div class="testimonials-card__image">
                                <img src="{{ asset('frontend/assets/images/resources/testi-2-2.jpg') }} " alt="Kathryn Murphy">
                            </div>
                            <div class="testimonials-card__top__video">
                                <a href="https://www.youtube.com/watch?v=h9MbznbxlLc" class="testimonials-card__video video-popup">
                                    <i class="icon-play-buttton"></i>
                                </a>
                            </div>
                        </div>
                        <p class="testimonials-card__text">“Consectetur adipiscing elit. Integer nunc viverra laoreet est the is porta pretium metus aliquam eget maecenas porta is nunc viverra Aenean pulvinar maximus leo ”</p>
                        <div class="testimonials-card__content">
                            <div class="testimonials-card__author">
                                <h4 class="testimonials-card__author__title">Kathryn Murphy</h4>
                                <span class="testimonials-card__author__dec">Web Developer</span>
                            </div>
                            <div class="testimonials-card__rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        <div class="testimonials-card__quite">
                            <i class="icon-quite"></i>
                        </div>
                    </div>
                </div>
                <div class="testimonials-one__item">
                    <div class="testimonials-card testimonials-card--one wow fadeInUp" data-wow-duration='000ms' data-wow-delay='200ms'>
                        <div class="testimonials-card__top">
                            <div class="testimonials-card__image">
                                <img src="{{ asset('frontend/assets/images/resources/testi-2-3.jpg') }}" alt="Kathryn Murphy">
                            </div>
                            <div class="testimonials-card__top__video">
                                <a href="https://www.youtube.com/watch?v=h9MbznbxlLc" class="testimonials-card__video video-popup">
                                    <i class="icon-play-buttton"></i>
                                </a>
                            </div>
                        </div>
                        <p class="testimonials-card__text">“Consectetur adipiscing elit. Integer nunc viverra laoreet est the is porta pretium metus aliquam eget maecenas porta is nunc viverra Aenean pulvinar maximus leo ”</p>
                        <div class="testimonials-card__content">
                            <div class="testimonials-card__author">
                                <h4 class="testimonials-card__author__title">Kathryn Murphy</h4>
                                <span class="testimonials-card__author__dec">Web Developer</span>
                            </div>
                            <div class="testimonials-card__rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        <div class="testimonials-card__quite">
                            <i class="icon-quite"></i>
                        </div>
                    </div>
                </div>
                <div class="testimonials-one__item">
                    <div class="testimonials-card testimonials-card--one wow fadeInUp" data-wow-duration='000ms' data-wow-delay='200ms'>
                        <div class="testimonials-card__top">
                            <div class="testimonials-card__image">
                                <img src="{{ asset('frontend/assets/images/resources/testi-2-4.jpg') }}" alt="Kathryn Murphy">
                            </div>
                            <div class="testimonials-card__top__video">
                                <a href="https://www.youtube.com/watch?v=h9MbznbxlLc" class="testimonials-card__video video-popup">
                                    <i class="icon-play-buttton"></i>
                                </a>
                            </div>
                        </div>
                        <p class="testimonials-card__text">“Consectetur adipiscing elit. Integer nunc viverra laoreet est the is porta pretium metus aliquam eget maecenas porta is nunc viverra Aenean pulvinar maximus leo ”</p>
                        <div class="testimonials-card__content">
                            <div class="testimonials-card__author">
                                <h4 class="testimonials-card__author__title">Kathryn Murphy</h4>
                                <span class="testimonials-card__author__dec">Web Developer</span>
                            </div>
                            <div class="testimonials-card__rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        <div class="testimonials-card__quite">
                            <i class="icon-quite"></i>
                        </div>
                    </div>
                </div>
                <div class="testimonials-one__item">
                    <div class="testimonials-card testimonials-card--one wow fadeInUp" data-wow-duration='000ms' data-wow-delay='200ms'>
                        <div class="testimonials-card__top">
                            <div class="testimonials-card__image">
                                <img src="{{ asset('frontend/assets/images/resources/testi-2-1.jpg') }}" alt="Kathryn Murphy">
                            </div>
                            <div class="testimonials-card__top__video">
                                <a href="https://www.youtube.com/watch?v=h9MbznbxlLc" class="testimonials-card__video video-popup">
                                    <i class="icon-play-buttton"></i>
                                </a>
                            </div>
                        </div>
                        <p class="testimonials-card__text">“Consectetur adipiscing elit. Integer nunc viverra laoreet est the is porta pretium metus aliquam eget maecenas porta is nunc viverra Aenean pulvinar maximus leo ”</p>
                        <div class="testimonials-card__content">
                            <div class="testimonials-card__author">
                                <h4 class="testimonials-card__author__title">Kathryn Murphy</h4>
                                <span class="testimonials-card__author__dec">Web Developer</span>
                            </div>
                            <div class="testimonials-card__rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        <div class="testimonials-card__quite">
                            <i class="icon-quite"></i>
                        </div>
                    </div>
                </div>
                <div class="testimonials-one__item">
                    <div class="testimonials-card testimonials-card--one wow fadeInUp" data-wow-duration='000ms' data-wow-delay='200ms'>
                        <div class="testimonials-card__top">
                            <div class="testimonials-card__image">
                                <img src="{{ asset('frontend/assets/images/resources/testi-2-2.jpg') }}" alt="Kathryn Murphy">
                            </div>
                            <div class="testimonials-card__top__video">
                                <a href="https://www.youtube.com/watch?v=h9MbznbxlLc" class="testimonials-card__video video-popup">
                                    <i class="icon-play-buttton"></i>
                                </a>
                            </div>
                        </div>
                        <p class="testimonials-card__text">“Consectetur adipiscing elit. Integer nunc viverra laoreet est the is porta pretium metus aliquam eget maecenas porta is nunc viverra Aenean pulvinar maximus leo ”</p>
                        <div class="testimonials-card__content">
                            <div class="testimonials-card__author">
                                <h4 class="testimonials-card__author__title">Kathryn Murphy</h4>
                                <span class="testimonials-card__author__dec">Web Developer</span>
                            </div>
                            <div class="testimonials-card__rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        <div class="testimonials-card__quite">
                            <i class="icon-quite"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="testimonials-one__image">
            <img src="{{ asset('frontend/assets/images/resources/car-2-1.jpg') }}" alt="image">
        </div>
        <div class="testimonials-one__image__line">
            <img src="{{ asset('frontend/assets/images/shapes/line-round.png') }}" alt>
        </div>
    </section> -->

    <!-- <section class="cta-two section-space-top cta-two--two" id="app">
        <div class="container">
            <div class="cta-two__inner">
                <div class="cta-two__bg" style="background-image: url(frontend/assets/images/shapes/card-bg.png);"></div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="cta-two__content">
                            <div class="sec-title sec-title--two text-start">
                                <h6 class="sec-title__tagline bw-split-in-right">download our app</h6>
                                <h3 class="sec-title__title bw-split-in-left">rentol User Friendly App Available</h3>
                            </div>
                            <p class="cta-two__content__text">Aqestic optio amet a ququam saepe aliquid voluate dicta fuga dolor saerror sed earum a magni soluta quam minus dolor dolor sed earum a magni soluta autem dolor error error sit</p>
                            <div class="cta-two__button">
                                <a href="https://play.google.com/store/games?hl=en">
                                    <img src="{{ asset('frontend/assets/images/shapes/paly-store.png') }}" alt="store">
                                </a>
                                <a href="https://www.apple.com/app-store/">
                                    <img src="{{ asset('frontend/assets/images/shapes/app-store.png') }}" alt="store">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cta-two__thumb">
                    <div class="cta-two__thumb__item-one">
                        <img src="{{ asset('frontend/assets/images/resources/card-man.png') }}" alt="image">
                    </div>
                    <div class="cta-two__thumb__item-two">
                        <img src="{{ asset('frontend/assets/images/resources/card-car.png') }}" alt="car">
                    </div>
                    <div class="cta-two__thumb__item-element">
                        <img src="{{ asset('frontend/assets/images/shapes/card-line-1-1.png') }}" alt="car">
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <!-- <section class="blog-six section-space">
        <div class="blog-six__bg" style="background-image: url(frontend/assets/images/shapes/blgo-6-1.png);"></div>
        <div class="container">
            <div class="sec-title sec-title--two text-center">
                <h6 class="sec-title__tagline bw-split-in-right">latest news</h6>
                <h3 class="sec-title__title bw-split-in-left">our latest news</h3>
            </div>
            <div class="row gutter-y-30">
                <div class="col-lg-4 col-md-6">
                    <div class="blog-six__item">
                        <div class="blog-six__item__image">
                            <img src="{{ asset('frontend/assets/images/blog/blog-6-1.jpg') }}" alt="blog image">
                            <a href="blog-details-right.html" class="blog-six__item__image__hover"></a>
                        </div>
                        <div class="blog-six__item__content">
                            <h3 class="blog-six__item__title"><a href="blog-details-right.html">cupidatat nonproident, sunt in culpa qui officia deserunt</a></h3>
                            <ul class="blog-six__item__meta list-unstyled">
                                <li class="blog-six__item__meta__item"><a href="blog-details.html"><i class="icon-user-1"></i>by Admin</a></li>
                                <li class="blog-six__item__meta__item"><a href="blog-details.html"><i class="icon-comment--icon"></i>2 comments</a></li>
                            </ul>
                            <div class="blog-six__item__date">
                                <span>20</span>
                                june
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-six__item">
                        <div class="blog-six__item__image">
                            <img src="{{ asset('frontend/assets/images/blog/blog-6-2.jpg') }}" alt="blog image">
                            <a href="blog-details-right.html" class="blog-six__item__image__hover"></a>
                        </div>
                        <div class="blog-six__item__content">
                            <h3 class="blog-six__item__title"><a href="blog-details-right.html">cupidatat nonproident, sunt in culpa qui officia deserunt</a></h3>
                            <ul class="blog-six__item__meta list-unstyled">
                                <li class="blog-six__item__meta__item"><a href="blog-details.html"><i class="icon-user-1"></i>by Admin</a></li>
                                <li class="blog-six__item__meta__item"><a href="blog-details.html"><i class="icon-comment--icon"></i>2 comments</a></li>
                            </ul>
                            <div class="blog-six__item__date">
                                <span>20</span>
                                june
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-six__item">
                        <div class="blog-six__item__image">
                            <img src="{{ asset('frontend/assets/images/blog/blog-6-3.jpg') }}" alt="blog image">
                            <a href="blog-details-right.html" class="blog-six__item__image__hover"></a>
                        </div>
                        <div class="blog-six__item__content">
                            <h3 class="blog-six__item__title"><a href="blog-details-right.html">cupidatat nonproident, sunt in culpa qui officia deserunt</a></h3>
                            <ul class="blog-six__item__meta list-unstyled">
                                <li class="blog-six__item__meta__item"><a href="blog-details.html"><i class="icon-user-1"></i>by Admin</a></li>
                                <li class="blog-six__item__meta__item"><a href="blog-details.html"><i class="icon-comment--icon"></i>2 comments</a></li>
                            </ul>
                            <div class="blog-six__item__date">
                                <span>20</span>
                                june
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="blog-six__element-one">
            <img src="{{ asset('frontend/assets/images/shapes/blog-angle-1-1.png') }}" alt>
        </div>
        <div class="blog-six__element-two">
            <img src="{{ asset('frontend/assets/images/shapes/blog-angle-1-1.png') }}" alt>
        </div>
    </section> -->

    <div class="client-carousel ">
        <div class="container">
            <div class="client-carousel__one rentol-owl__carousel owl-theme owl-carousel" data-owl-options='{
                "items": 5,
                "margin": 65,
                "smartSpeed": 700,
                "loop":true,
                "autoplay": 6000,
                "nav":false,
                "dots":false,
                "navText": ["<span class=\"icon-arrow-point-to-left\"></span>","<span class=\"icon-arrow-point-to-right\"></span>"],
                "responsive":{
                    "0":{
                        "items":1,
                        "margin": 0
                    },
                    "360":{
                        "items":2,
                        "margin": 30
                    },
                    "575":{
                        "items":3,
                        "margin": 30
                    },
                    "768":{
                        "items":3,
                        "margin": 40
                    },
                    "992":{
                        "items": 4,
                        "margin": 40
                    },
                    "1200":{
                        "items": 5,
                        "margin": 140
                    }
                }
            }'>



                @foreach ($ourcarowners as $ourcarowner)
                <div class="client-carousel__one__item">
                    <img class="client-carousel__one__image" src="{{ asset($ourcarowner->logo ?? 'default.jpg') }}" alt="rentol">
                    <img class="client-carousel__one__hover-image" src="{{ asset($ourcarowner->logo ?? 'default.jpg') }}" alt="rentol">
                </div>
                @endforeach

            </div>
        </div>
    </div>

    @include('frontend.includes.footer')

    <script>
        function addBookingRequest() {
            // Get elements
            var pickuplocation = document.getElementById('pickuplocation');
            var droplocation = document.getElementById('droplocation');
            var pickupdate = document.getElementById('pickupdate');
            var dropdate = document.getElementById('dropdate');
            var vehicletype = document.getElementById('vehicletype');
            var note = document.getElementById('note');

            // Initialize valid flag
            var isValid = true;

            // Helper function to check and set red border
            function checkField(field) {
                if (field.value.trim() === '') {
                    field.style.border = '2px solid red';
                    isValid = false;
                } else {
                    field.style.border = ''; // Reset border if not empty
                }
            }

            // Check each field
            checkField(pickuplocation);
            checkField(droplocation);
            checkField(pickupdate);
            checkField(dropdate);
            checkField(vehicletype);
            checkField(note);

            if (!isValid) {
                alert('Please fill in all the fields.');
            } else {
                // Show the loader
                document.querySelector('.preloader').style.display = 'block';
                $.ajax({
                    url: "/addbookingrequest",
                    method: "POST",
                    data: {
                        pickuplocation: pickuplocation.value,
                        droplocation: droplocation.value,
                        pickupdate: pickupdate.value,
                        dropdate: dropdate.value,
                        vehicletype: vehicletype.value,
                        note: note.value,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        let html = "";
                        if (data.status == 200) {
                            const booking = data.booking;
                            html += `
            <div class='alert alert-success'>
                <strong>Booking Request Successful.!</strong><br>
                Customer: ${booking.customer_name}<br>
                Pickup: ${booking.pickup} on ${booking.pickupdate}<br>
                Dropoff: ${booking.dropof} on ${booking.dopofdate}<br>
                Vehicle Type: ${booking.type_of_vehicle}<br>
                Note: ${booking.note}<br>
                Ref Number: ${booking.id}
            </div>
        `;
                            $('.notification').html(html);
                            document.querySelector('.preloader').style.display = 'none';
                        }
                    },
                    error: function(xhr) {
                        console.error("Error adding booking request:", xhr.responseText);
                    }
                });
            }

            return isValid;
        }
    </script>
</x-fndashboard-layout>