<x-frontend-app-layout>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <style>
        .location-list,
        .nested-list {
            list-style: none;
            padding-left: 0;
            margin-left: 0;
        }

        .nested-list {
            display: none;
            padding-left: 15px;
            margin-top: 5px;
        }

        .location-toggle {
            cursor: pointer;
            display: inline-block;
            padding: 5px 0;
            color: #333;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .location-toggle:hover {
            color: #007bff;
        }

        .nested-list li {
            padding: 2px 0;
            color: #555;
            font-size: 14px;
        }
    </style>

    <section class="product section-space">
        <div class="container">
            <div class="row gutter-y-60">
                <div class="col-lg-9">
                    <div class="product__info-top">
                        <div class="product__showing-text-box">
                            <p class="product__showing-text">
                                Showing {{ $avalibleVehicles->firstItem() }}–{{ $avalibleVehicles->lastItem() }} of {{ $avalibleVehicles->total() }} Results
                            </p>
                        </div>
                        <!-- <div class="product__showing-sort">
                            <select class="selectpicker" aria-label="Sort by popular">
                                <option selected>default shorting</option>
                                <option value="2">Sort by price</option>
                                <option value="3">Sort by ratings</option>
                            </select>
                        </div> -->
                    </div>

                    <div class="row gutter-y-30 vehicle_container">
                        @foreach ($avalibleVehicles as $avalibleVehicle)

                        <a href="fleetview/{{ $avalibleVehicle->id }}" class="ad-card">
                            <div class="row addbody align-items-center">
                                <div class="col-md-3">
                                    <div class="image">
                                        <img src="{{ asset($avalibleVehicle->firstImage->image_url ?? 'default.jpg') }}">
                                    </div>

                                </div>
                                <div class="col">
                                    <div class="ad-content">
                                        <h3 class="addtitle">{{ $avalibleVehicle->vehical_brand  }} {{ $avalibleVehicle->vehical_model  }}</h3>
                                       
                                    </div>
                                </div>
                            </div>
                        </a>


                        @endforeach


                        <div class="col-12">
                            <ul class="post-pagination justify-content-center">
                                {{ $avalibleVehicles->links('pagination::bootstrap-4') }}
                            </ul>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.col-lg-9 -->
                <div class="col-lg-3">
                    <aside class="product__sidebar">
                        <!-- <div class="product__search-box product__sidebar__item wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="150ms">
                            <form action="#" class="product__search">
                                <input type="text" placeholder="Search Items">
                                <button type="submit" aria-label="earch submit">
                                    <span class="icon-search"></span>
                                </button>
                            </form>
                        </div> -->

                        <!-- <div class="product__price-ranger product__sidebar__item wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="150ms">
                            <h3 class="product__sidebar__title">Date Range</h3>
                            <form action="#" class="price-ranger">
                                <div class="ranger-min-max-block">
                                    <input type="text" id="dateRangePicker" placeholder="12 / 03 / 2024" class="min max" style="width: 100%; padding: 10px; font-size: 14px; box-sizing: border-box;" onchange="checkvehicleAvalibility(this.value)">
                                </div>
                            </form>
                        </div> -->

                        <div class="product__price-ranger product__sidebar__item wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="150ms">
                            <h3 class="product__sidebar__title">Filter By Location</h3>
                            <ul class="location-list">
                                @foreach ($provinces as $province)
                                <li>
                                    <strong class="location-toggle" onclick="toggleList('districts-{{ $province->id }}')">
                                        <label onclick="loadByProvince('{{ $province->name_en }}')"> {{ $province->name_en }}</label>

                                    </strong>
                                    <ul id="districts-{{ $province->id }}" class="nested-list">
                                        @foreach ($province->districts as $district)
                                        <li>
                                            <span class="location-toggle" onclick="toggleList('cities-{{ $district->id }}')">
                                                <label onclick="loadByDistric('{{ $district->name_en }}')"> {{ $district->name_en }}</label>
                                            </span>
                                            <ul id="cities-{{ $district->id }}" class="nested-list">
                                                @foreach ($district->cities as $city)
                                                <li>
                                                    <label onclick="loadByCity(' {{ $city->name_en }}')"> {{ $city->name_en }}</label>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="product__categories product__sidebar__item wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="150ms">
                            <h3 class="product__sidebar__title product__categories__title">Categories</h3>
                            <ul class="list-unstyled">
                                <li><a href="products-right.html"><span class="product-categories__icon"><i class="icon-right-arrow"></i></span> Rent a car</a></li>
                                <li><a href="products-right.html"><span class="product-categories__icon"><i class="icon-right-arrow"></i></span> Rent a bike</a></li>
                                <li><a href="products-right.html"><span class="product-categories__icon"><i class="icon-right-arrow"></i></span> Ambulanse</a></li>
                                <li><a href="products-right.html"><span class="product-categories__icon"><i class="icon-right-arrow"></i></span> Carrier/Heavy Service</a></li>
                                <li><a href="products-right.html"><span class="product-categories__icon"><i class="icon-right-arrow"></i></span> Transport Service</a></li>
                            </ul>
                        </div><!-- /.category-widget -->
                    </aside><!-- /.shop-sidebar -->
                </div><!-- /.col-lg-3 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.product-page -->

    @include('frontend.includes.footer')

</x-frontend-app-layout>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    $(function() {
        $('#dateRangePicker').daterangepicker({
            opens: 'left',
            autoUpdateInput: false, // this is important
            locale: {
                cancelLabel: 'Clear',
                format: 'MM/DD/YYYY'
            }
        }, function(start, end, label) {
            // Set the input field with the selected range as a string
            $('#dateRangePicker').val(start.format('MM/DD/YYYY') + ' - ' + end.format('MM/DD/YYYY'));
        });

        // Optional: Clear input on cancel
        $('#dateRangePicker').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });
    });

    flatpickr("#dateRangePicker", {
        mode: "range",
        dateFormat: "Y-m-d",
        onClose: function(selectedDates, dateStr, instance) {
            console.log("Selected date range: ", dateStr);
            // You can trigger filtering logic here
        }
    });
</script>

<script>
    function toggleList(id) {
        const el = document.getElementById(id);
        el.style.display = el.style.display === 'none' ? 'block' : 'none';
    }

    function loadByProvince(province) {
        $.ajax({
            url: "/getvehicledetailsbyprovince",
            method: "GET",
            data: {
                province: province,
            },
            success: function(data) {
                let html = "";
                var baseurl = location.protocol + "//" + location.hostname + (location.port ? ":" + location.port : "") + "/";

                data.vehicle.forEach(company => {
                    if (company.vehicles && company.vehicles.length > 0) {
                        company.vehicles.forEach(vehicle => {
                            console.log(vehicle.latest_image); // should log a single object, not array

                            const imagePath = vehicle.latest_image?.image_url ?
                                baseurl + vehicle.latest_image.image_url :
                                baseurl + "default.jpg";

                            html += `
                <div class="col-lg-4 col-sm-6">
                    <div class="product__item wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='200ms'>
                        <div class="product__item__image">
                            <img src="${imagePath}" alt="">
                        </div>
                        <div class="product__item__content">
                            <div class="rentol-ratings">
                                <span class="rentol-ratings__icon"><i class="icon-star"></i></span>
                                <span class="rentol-ratings__icon"><i class="icon-star"></i></span>
                                <span class="rentol-ratings__icon"><i class="icon-star"></i></span>
                                <span class="rentol-ratings__icon"><i class="icon-star"></i></span>
                                <span class="rentol-ratings__icon"><i class="icon-star"></i></span>
                            </div>
                            <h4 class="product__item__title">
                                <a href="/fleetview/${vehicle.id}">
                                    ${vehicle.vehical_brand ?? ''} ${vehicle.vehical_model ?? ''}
                                </a>
                            </h4>
                            <div class="product__item__price">
                                LKR ${new Intl.NumberFormat('en-LK', {
                                    style: 'decimal',
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                }).format(vehicle.per_day_rental)}
                            </div>
                            <a href="/fleetview/${vehicle.id}" class="rentol-btn rentol-btn--submite">
                                <span>Book</span>
                            </a>
                        </div>
                    </div>
                </div>
            `;
                        });
                    }
                });

                $('.vehicle_container').html(html);
            },
            error: function(xhr) {
                console.error("Error loading vehicles:", xhr.responseText);
            }
        });
    }

    function loadByDistric(distric) {
        $.ajax({
            url: "/getvehicledetailsbydistric",
            method: "GET",
            data: {
                distric: distric,
            },
            success: function(data) {
                let html = "";
                var baseurl = location.protocol + "//" + location.hostname + (location.port ? ":" + location.port : "") + "/";

                data.vehicle.forEach(company => {
                    if (company.vehicles && company.vehicles.length > 0) {
                        company.vehicles.forEach(vehicle => {
                            console.log(vehicle.latest_image); // should log a single object, not array

                            const imagePath = vehicle.latest_image?.image_url ?
                                baseurl + vehicle.latest_image.image_url :
                                baseurl + "default.jpg";

                            html += `
                <div class="col-lg-4 col-sm-6">
                    <div class="product__item wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='200ms'>
                        <div class="product__item__image">
                            <img src="${imagePath}" alt="">
                        </div>
                        <div class="product__item__content">
                            <div class="rentol-ratings">
                                <span class="rentol-ratings__icon"><i class="icon-star"></i></span>
                                <span class="rentol-ratings__icon"><i class="icon-star"></i></span>
                                <span class="rentol-ratings__icon"><i class="icon-star"></i></span>
                                <span class="rentol-ratings__icon"><i class="icon-star"></i></span>
                                <span class="rentol-ratings__icon"><i class="icon-star"></i></span>
                            </div>
                            <h4 class="product__item__title">
                                <a href="/fleetview/${vehicle.id}">
                                    ${vehicle.vehical_brand ?? ''} ${vehicle.vehical_model ?? ''}
                                </a>
                            </h4>
                            <div class="product__item__price">
                                LKR ${new Intl.NumberFormat('en-LK', {
                                    style: 'decimal',
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                }).format(vehicle.per_day_rental)}
                            </div>
                            <a href="/fleetview/${vehicle.id}" class="rentol-btn rentol-btn--submite">
                                <span>Book</span>
                            </a>
                        </div>
                    </div>
                </div>
            `;
                        });
                    }
                });

                $('.vehicle_container').html(html);
            },
            error: function(xhr) {
                console.error("Error loading vehicles:", xhr.responseText);
            }
        });
    }

    function loadByCity(city) {
        $.ajax({
            url: "/getvehicledetailsbycity",
            method: "GET",
            data: {
                city: city,
            },
            success: function(data) {
                let html = "";
                var baseurl = location.protocol + "//" + location.hostname + (location.port ? ":" + location.port : "") + "/";

                data.vehicle.forEach(company => {
                    if (company.vehicles && company.vehicles.length > 0) {
                        company.vehicles.forEach(vehicle => {
                            console.log(vehicle.latest_image); // should log a single object, not array

                            const imagePath = vehicle.latest_image?.image_url ?
                                baseurl + vehicle.latest_image.image_url :
                                baseurl + "default.jpg";

                            html += `
                <div class="col-lg-4 col-sm-6">
                    <div class="product__item wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='200ms'>
                        <div class="product__item__image">
                            <img src="${imagePath}" alt="">
                        </div>
                        <div class="product__item__content">
                            <div class="rentol-ratings">
                                <span class="rentol-ratings__icon"><i class="icon-star"></i></span>
                                <span class="rentol-ratings__icon"><i class="icon-star"></i></span>
                                <span class="rentol-ratings__icon"><i class="icon-star"></i></span>
                                <span class="rentol-ratings__icon"><i class="icon-star"></i></span>
                                <span class="rentol-ratings__icon"><i class="icon-star"></i></span>
                            </div>
                            <h4 class="product__item__title">
                                <a href="/fleetview/${vehicle.id}">
                                    ${vehicle.vehical_brand ?? ''} ${vehicle.vehical_model ?? ''}
                                </a>
                            </h4>
                            <div class="product__item__price">
                                LKR ${new Intl.NumberFormat('en-LK', {
                                    style: 'decimal',
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                }).format(vehicle.per_day_rental)}
                            </div>
                            <a href="/fleetview/${vehicle.id}" class="rentol-btn rentol-btn--submite">
                                <span>Book</span>
                            </a>
                        </div>
                    </div>
                </div>
            `;
                        });
                    }
                });

                $('.vehicle_container').html(html);
            },
            error: function(xhr) {
                console.error("Error loading vehicles:", xhr.responseText);
            }
        });
    }

    function checkvehicleAvalibility(value) {
        // Example input: "2025-04-01 to 2025-04-06"
        const dates = value.split(' to ');
        const startDate = dates[0]?.trim();
        const endDate = dates[1]?.trim();

        if (startDate && endDate) {
            $.ajax({
                url: "/getvehicledetailsbydaterange",
                method: "GET",
                data: {
                    startDate: startDate,
                    endDate: endDate,
                },
                success: function(data) {
                    let html = "";
                    var baseurl = location.protocol + "//" + location.hostname + (location.port ? ":" + location.port : "") + "/";

                    data.vehicle.forEach(company => {
                        if (company.vehicles && company.vehicles.length > 0) {
                            company.vehicles.forEach(vehicle => {
                                console.log(vehicle.latest_image); // should log a single object, not array

                                const imagePath = vehicle.latest_image?.image_url ?
                                    baseurl + vehicle.latest_image.image_url :
                                    baseurl + "default.jpg";

                                html += `
                <div class="col-lg-4 col-sm-6">
                    <div class="product__item wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='200ms'>
                        <div class="product__item__image">
                            <img src="${imagePath}" alt="">
                        </div>
                        <div class="product__item__content">
                            <div class="rentol-ratings">
                                <span class="rentol-ratings__icon"><i class="icon-star"></i></span>
                                <span class="rentol-ratings__icon"><i class="icon-star"></i></span>
                                <span class="rentol-ratings__icon"><i class="icon-star"></i></span>
                                <span class="rentol-ratings__icon"><i class="icon-star"></i></span>
                                <span class="rentol-ratings__icon"><i class="icon-star"></i></span>
                            </div>
                            <h4 class="product__item__title">
                                <a href="/fleetview/${vehicle.id}">
                                    ${vehicle.vehical_brand ?? ''} ${vehicle.vehical_model ?? ''}
                                </a>
                            </h4>
                            <div class="product__item__price">
                                LKR ${new Intl.NumberFormat('en-LK', {
                                    style: 'decimal',
                                    minimumFractionDigits: 2,
                                    maximumFractionDigits: 2
                                }).format(vehicle.per_day_rental)}
                            </div>
                            <a href="/fleetview/${vehicle.id}" class="rentol-btn rentol-btn--submite">
                                <span>Book</span>
                            </a>
                        </div>
                    </div>
                </div>
            `;
                            });
                        }
                    });

                    $('.vehicle_container').html(html);
                },
                error: function(xhr) {
                    console.error("Error loading vehicles:", xhr.responseText);
                }
            });
        } else {
            console.log('no');
        }

        // You can now use these for AJAX or further validation
    }
</script>