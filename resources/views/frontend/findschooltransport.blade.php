<x-frontend-app-layout>
    <style>
        /* Small devices */
        @media (max-width: 575.98px) {
            .adsviewsection {
                display: block;
                width: 100%;
            }

            .locations_container {

                display: none;

            }

            .sepadssec {
                display: block;
            }
        }

        /* Tablets */
        @media (min-width: 576px) and (max-width: 991.98px) {
            .adsviewsection {
                display: block;
                width: 100%;
            }

            .locations_container {

                display: none;

            }

            .sepadssec {
                display: block;
            }

            .modal-dialog {
                max-width: 80%;
            }


        }

        /* Surface Pro and Small laptops */
        @media (min-width: 992px) and (max-width: 1199.98px) {
            .adsviewsection {
                display: block;
                width: 100%;
            }

            .locations_container {

                display: none;

            }

            .sepadssec {
                display: block;
            }
        }

        /* Big Laptops */
        @media (min-width: 1200px) {
            .adsviewsection {
                display: block;
            }

            .locations_container {
                width: auto;
            }

            .sepadssec {
                display: block;
            }
        }
    </style>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 text-sm-start text-center location_div">
                    <div class="icon-text-wrapper d-flex flex-column align-items-center align-items-sm-start" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="icon-pin fs-4 mb-1"></i>
                        <h5 class="contact-one__item__title mb-0">Location</h5>
                    </div>
                </div>

                <!-- Select Category -->
                <div class="col-md-3 col-sm-6 text-sm-start text-center category_div">
                    <div class="icon-text-wrapper d-flex flex-column align-items-center align-items-sm-start" data-bs-toggle="modal" data-bs-target="#categorymodel">
                        <i class="icon-emotions fs-4 mb-1"></i>
                        <h5 class="contact-one__item__title mb-0">Select Category</h5>
                    </div>
                </div>
                <div class="col-md-6">
                    <div action="#" class="faq-page-search__form wow fadeInUp animated" data-wow-duration="1500ms" data-wow-delay="300ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 300ms; animation-name: fadeInUp;">
                        <input type="text" id="adssearchinput" placeholder="Search Here" onkeyup="searchByname()">
                        <button type="button" class="faq-page-search__form__btn" aria-label="search submit" onclick="searchByname()">
                            <i class="icon-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                <div class="modal-header" style=" color: balck; padding: 15px 20px; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                    <h5 class="modal-title" id="exampleModalLabel" style="font-size: 18px; font-weight: bold;">Filter By Location</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: transparent; border: none; font-size: 18px; color: white;"></button>
                </div>
                <div class="modal-body" style="padding: 20px;background-image: url(frontend/assets/images/shapes/contact-shape-1-1.png);">
                    <ul class="location-list" style="list-style-type: none; padding-left: 0;">
                        @foreach ($provinces as $province)
                        <li style="margin-bottom: 15px;">
                            <strong class="location-toggle" onclick="toggleList('districts-{{ $province->id }}')" style="cursor: pointer; display: block; font-size: 12px; color:rgb(20, 20, 20);">
                                <label onclick="loadByProvince('{{ $province->name_en }}')" style="text-decoration: none;"> {{ $province->name_en }}</label>
                            </strong>
                            <ul id="districts-{{ $province->id }}" class="nested-list" style="display: none; padding-left: 20px; margin-top: 5px;">
                                @foreach ($province->districts as $district)
                                <li style="margin-bottom: 10px;">
                                    <span class="location-toggle" onclick="toggleList('cities-{{ $district->id }}')" style="cursor: pointer; display: block; font-size: 12px; color: #555;">
                                        <label onclick="loadByDistric('{{ $district->name_en }}')" style="text-decoration: none;"> {{ $district->name_en }}</label>
                                    </span>
                                    <ul id="cities-{{ $district->id }}" class="nested-list" style="display: none; padding-left: 20px;">
                                        @foreach ($district->cities as $city)
                                        <li style="margin-bottom: 5px;">
                                            <label onclick="loadByCity(' {{ $city->name_en }}')" style="font-size: 12px; color: #777;"> {{ $city->name_en }}</label>
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
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="categorymodel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                <div class="modal-header" style=" color: balck; padding: 15px 20px; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                    <h5 class="modal-title" id="exampleModalLabel" style="font-size: 18px; font-weight: bold;">Filter By Location</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color: transparent; border: none; font-size: 18px; color: white;"></button>
                </div>
                <div class="modal-body" style="padding: 20px;background-image: url(frontend/assets/images/shapes/contact-shape-1-1.png);">
                    <ul class="location-list">

                        <li>
                            <strong>
                                <label onclick="loadByType('general')"> General Ads</label>
                            </strong>
                        </li>
                        <li>
                            <strong>
                                <label onclick="loadByType('Staff Transport')"> Staff Service</label>
                            </strong>
                        </li>

                        <li>
                            <strong>
                                <label onclick="loadByType('Ambulance Service')"> Ambulance Service</label>
                            </strong>
                        </li>

                        <li>
                            <strong>
                                <label onclick="loadByType('Breakdown Service')"> Breakdown Service</label>
                            </strong>
                        </li>

                        <li>
                            <strong>
                                <label onclick="loadByType('School Transport')"> School Transport</label>
                            </strong>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-3 locations_container">
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

                    <div class="product__price-ranger product__sidebar__item wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="150ms">
                        <h3 class="product__sidebar__title">Filter By Service</h3>
                        <ul class="location-list">

                            <li>
                                <strong>
                                    <label onclick="loadByType('general')"> General Ads</label>
                                </strong>
                            </li>
                            <li>
                                <strong>
                                    <label onclick="loadByType('Staff Transport')"> Staff Service</label>
                                </strong>
                            </li>

                            <li>
                                <strong>
                                    <label onclick="loadByType('Ambulance Service')"> Ambulance Service</label>
                                </strong>
                            </li>

                            <li>
                                <strong>
                                    <label onclick="loadByType('Breakdown Service')"> Breakdown Service</label>
                                </strong>
                            </li>

                            <li>
                                <strong>
                                    <label onclick="loadByType('School Transport')"> School Transport</label>
                                </strong>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="col-md-7 adsviewsection" id="adsviewsection">
                    @foreach ($ads as $ad)
                    <a href="viewadd/{{ $ad->id }}" class="ad-card">
                        <div class="row addbody align-items-center">
                            <div class="col-md-3">
                                <div class="image">
                                    @php $images = json_decode($ad->images); @endphp
                                    @if ($images && count($images) > 0)
                                    <img src="{{ asset($images[0]) }}" alt="rentol">
                                    @endif
                                </div>

                            </div>
                            <div class="col">
                                <div class="ad-content">
                                    <h3 class="addtitle">{{ $ad->title }}</h3>
                                    <p class="adddescription">{{ $ad->description }}</p>
                                    <p class="adddate">{{ $ad->date_time }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>

    </section>

    @include('frontend.includes.footer')


</x-frontend-app-layout>

<script>
    function toggleList(id) {
        const el = document.getElementById(id);
        el.style.display = el.style.display === 'none' ? 'block' : 'none';
    }

    function loadByProvince(province) {
        $.ajax({
            url: "/getadsbyprovince_s_service",
            method: "GET",
            data: {
                province: province
            },
            success: function(data) {
                let html = "";
                let baseurl = location.origin + "/";

                data.ads.forEach(ad => {
                    let images = JSON.parse(ad.images || "[]");
                    let image = images.length > 0 ? baseurl + images[0] : baseurl + "default.jpg";

                    html += `
                        <a href="/viewadd/${ad.id}" class="ad-card">
                            <div class="row addbody align-items-center">
                                <div class="col-md-3">
                                    <div class="image">
                                        <img src="${image}" alt="rentol" />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="ad-content">
                                        <h3 class="addtitle">${ad.title}</h3>
                                        <p class="adddescription">${ad.description}</p>
                                        <p class="adddate">${ad.date_time}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    `;
                });

                $('.adsviewsection').html(html);
            },
            error: function(xhr) {
                console.error("Error loading ads:", xhr.responseText);
            }
        });
    }

    function loadByDistric(distric) {
        $.ajax({
            url: "/getadsbydistric_s_service",
            method: "GET",
            data: {
                distric: distric
            },
            success: function(data) {
                let html = "";
                let baseurl = location.origin + "/";

                data.ads.forEach(ad => {
                    let images = JSON.parse(ad.images || "[]");
                    let image = images.length > 0 ? baseurl + images[0] : baseurl + "default.jpg";

                    html += `
                        <a href="/viewadd/${ad.id}" class="ad-card">
                            <div class="row addbody align-items-center">
                                <div class="col-md-3">
                                    <div class="image">
                                        <img src="${image}" alt="rentol" />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="ad-content">
                                        <h3 class="addtitle">${ad.title}</h3>
                                        <p class="adddescription">${ad.description}</p>
                                        <p class="adddate">${ad.date_time}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    `;
                });

                $('.adsviewsection').html(html);
            },
            error: function(xhr) {
                console.error("Error loading ads:", xhr.responseText);
            }
        });
    }

    function loadByCity(city) {
        $.ajax({
            url: "/getadsbycity_s_service",
            method: "GET",
            data: {
                city: city
            },
            success: function(data) {
                let html = "";
                let baseurl = location.origin + "/";

                data.ads.forEach(ad => {
                    let images = JSON.parse(ad.images || "[]");
                    let image = images.length > 0 ? baseurl + images[0] : baseurl + "default.jpg";

                    html += `
                        <a href="/viewadd/${ad.id}" class="ad-card">
                            <div class="row addbody align-items-center">
                                <div class="col-md-3">
                                    <div class="image">
                                        <img src="${image}" alt="rentol" />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="ad-content">
                                        <h3 class="addtitle">${ad.title}</h3>
                                        <p class="adddescription">${ad.description}</p>
                                        <p class="adddate">${ad.date_time}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    `;
                });

                $('.adsviewsection').html(html);
            },
            error: function(xhr) {
                console.error("Error loading ads:", xhr.responseText);
            }
        });
    }

    function loadByType(type) {

        $.ajax({
            url: "/getadsbytype",
            method: "GET",
            data: {
                type: type
            },
            success: function(data) {
                let html = "";
                let baseurl = location.origin + "/";

                data.ads.forEach(ad => {
                    let images = JSON.parse(ad.images || "[]");
                    let image = images.length > 0 ? baseurl + images[0] : baseurl + "default.jpg";

                    html += `
                        <a href="/viewadd/${ad.id}" class="ad-card">
                            <div class="row addbody align-items-center">
                                <div class="col-md-3">
                                    <div class="image">
                                        <img src="${image}" alt="rentol" />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="ad-content">
                                        <h3 class="addtitle">${ad.title}</h3>
                                        <p class="adddescription">${ad.description}</p>
                                        <p class="adddate">${ad.date_time}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    `;
                });

                $('.adsviewsection').html(html);
            },
            error: function(xhr) {
                console.error("Error loading ads:", xhr.responseText);
            }
        });
    }


    function searchByname() {
        var searchbyvr = document.getElementById('adssearchinput').value;
        $.ajax({
            url: "/getadsbyany_s_service",
            method: "GET",
            data: {
                searchbyvr: searchbyvr
            },
            success: function(data) {
                let html = "";
                let baseurl = location.origin + "/";

                data.ads.forEach(ad => {
                    let images = JSON.parse(ad.images || "[]");
                    let image = images.length > 0 ? baseurl + images[0] : baseurl + "default.jpg";

                    html += `
                        <a href="/viewadd/${ad.id}" class="ad-card">
                            <div class="row addbody align-items-center">
                                <div class="col-md-3">
                                    <div class="image">
                                        <img src="${image}" alt="rentol" />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="ad-content">
                                        <h3 class="addtitle">${ad.title}</h3>
                                        <p class="adddescription">${ad.description}</p>
                                        <p class="adddate">${ad.date_time}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    `;
                });

                $('.adsviewsection').html(html);
            },
            error: function(xhr) {
                console.error("Error loading ads:", xhr.responseText);
            }
        });
    }
</script>