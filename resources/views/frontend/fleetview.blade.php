<x-frontend-app-layout>

 
    <section class="page-header-two">
        <!-- <div class="page-header-two__bg" style="background-image: url(frontend/assets/images/backgrounds/page-header-bg-1-8.jpg);"></div> -->
        <div class="page-header-two__inner">
            <div class="container">
                <div class="page-header-two__content">
                    <div class="page-header-two__top">
                        <div class="sec-title">
                            <h6 class="sec-title__tagline bw-split-in-right">Car features</h6><!-- /.sec-title__tagline -->
                            <h3 class="sec-title__title bw-split-in-left">{{ $vehicle->vehical_brand  }} {{ $vehicle->vehical_model  }}</h3><!-- /.sec-title__title -->
                        </div><!-- /.sec-title -->
                        <div class="page-header-two__btn">


                        </div><!-- /.page-header-two__btn -->
                    </div><!-- /.page-header-two__top -->
                    <ul class="page-header-two__list list-unstyled">
                        <li><span><i class="icon-check-1"></i>vehicle type </span> <span> : {{ $vehicle->vehical_type  }}</span></li>
                        <li><span><i class="icon-check-1"></i>Fual Type</span> <span> : {{ $vehicle->fualtype  }}</span></li>
                        <li><span><i class="icon-check-1"></i>Availability</span> <span> : {{ $vehicle->avalibility  }}</span></li>
                        <li><span><i class="icon-check-1"></i>car color</span> <span> : {{ $vehicle->vehicle_color  }}</span></li>  
                        <li><span><i class="icon-check-1"></i>Location</span> <span> : {{ $company->city  }}</span></li> 
                    </ul><!-- /.page-header-two__list -->
                </div><!-- / -->
            </div><!-- /.container -->
        </div><!-- /.page-header-two__list -->
    </section><!-- /.page-header-two -->

    <section class="fleet-details__top section-space-top">
        <div class="container">
            <div class="row gutter-y-40">
                <div class="col-lg-8">
                    <div class="sec-title sec-title--two">
                        <h6 class="sec-title__tagline bw-split-in-right">ABOUT THE CAR</h6><!-- /.sec-title__tagline -->
                        <h3 class="sec-title__title bw-split-in-left">CAR OVERVIEW</h3><!-- /.sec-title__title -->
                    </div><!-- /.sec-title -->
                    <p class="fleet-details__top__text">{{ $vehicle->description  }}</p><!-- /.fleet-details__top__text -->
                    <ul class="fleet-details__top__list list-unstyled">
                        <li><i class="icon-check1"></i> Luxurious Fleet</li>
                        <li><i class="icon-check1"></i> Professional Chauffeurs</li>
                        <li><i class="icon-check1"></i> Onboard Amenities</li>
                        <li><i class="icon-check1"></i> Emergency Aid in Your Vehicle</li>
                    </ul><!-- /.fleet-details__top__list -->

                </div><!-- /.col-12 -->
                <div class="col-lg-4">
                    <div class="fleet-details__booking">
                        <div class="fleet-details__booking__top">
                            <div class="sec-title sec-title--two">
                                <h6 class="sec-title__tagline bw-split-in-right">BOOK YOUR DREAM</h6><!-- /.sec-title__tagline -->
                                <h3 class="sec-title__title bw-split-in-left">REQUIREMENTS</h3><!-- /.sec-title__title -->
                            </div><!-- /.sec-title -->
                        </div><!-- /.fleet-details__booking__top -->
                        <div class="fleet-details__booking__content">
                            <ul class="fleet-details__booking__list list-unstyled">
                                <li><i class="icon-check-1"></i>Valid Driving License</li>
                                <li><i class="icon-check-1"></i>Valid ID or Passport</li>
                                <li><i class="icon-check-1"></i> {{ number_format($vehicle->deposit_amount,2)  }} Security Deposit</li>
                                <li><i class="icon-check-1"></i>23 Years Old Minimum Age</li>
                            </ul><!-- /.fleet-details__booking__list -->
                            <div class="fleet-details__booking__price">
                                <span class="fleet-details__booking__price__top">starting form</span>
                                {{ number_format($vehicle->per_day_rental,2)  }}
                                <span class="fleet-details__booking__price__month">/day</span>
                            </div><!-- /.fleet-details__booking__price -->
                            <a href="" class="fleet-details__booking__btn rentol-btn">call to reserve</a><!-- /.fleet-details__booking__btn -->
                            <span style="text-align: center;"><b>{{ $company->contact_no  }} / {{ $company->mobile_number  }}</b></span>
                        </div><!-- /.fleet-details__booking__content -->
                    </div><!-- /.fleet-details__booking -->
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.fleet-details__top -->

    <div class="fleet-details__carousel">
        <div class="fleet-details__thumb">
            <div class="fleet-details__thumb__carousel rentol-slick__carousel" data-slick-options='{
                "slidesToScroll": 1,
                "slidesToShow": 3,
                "asNavFor": ".fleet-details__carousel__inner",
                "autoplay": false,
                "autoplaySpeed": 3000,
                "infinite": true,
                "focusOnSelect": true,
                "dots": false,
                "arrows": false
            }'>

                @foreach ($vehiclephotos as $vehiclephoto)
                <div class="fleet-details__thumb__item">
                    <img src="{{ asset($vehiclephoto->image_url ) }}" alt="image" style="width: 570px;height: 373px;">
                </div><!-- /.fleet-details__thumb__item -->
                @endforeach



            </div><!-- /.fleet-details__thumb__carousel -->
        </div><!-- /.fleet-details__thumb -->
    </div><!-- /.fleet-details__carousel -->



    <section class="booking-car-one section-space">
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



    @include('frontend.includes.footer')
</x-frontend-app-layout>


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