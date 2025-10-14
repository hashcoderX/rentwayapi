<x-frontend-app-layout>
    <style>
        .ad-card {
            display: block;
            text-decoration: none;
            color: inherit;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            background-color: #fff;
            transition: box-shadow 0.3s;
        }

        .ad-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .addbody {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 15px;
        }

        .image img {
            width: 100%;
            height: auto;
            border-radius: 8px;

        }

        .ad-content {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .addtitle {
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 8px;
            color: #222;
        }

        .adddescription {
            font-size: 1rem;
            color: #555;
            margin-bottom: 6px;
        }

        .adddate {
            font-size: 0.85rem;
            color: #888;
        }

        .icon-text-wrapper {
            display: flex;
            align-items: center;
            gap: 10px;
            /* space between icon and text */
        }

        .icon-text-wrapper i {
            font-size: 20px;
            color: #444;
        }

        .contact-one__item__title {
            margin: 0;
            font-size: 18px;
            color: #222;
        }
    </style>

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

        .location-list li {
            padding-top: 20px;
        }
    </style>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-3 location_div">
                    <div class="icon-text-wrapper mt-3" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-name: fadeInLeft;">
                        <i class="icon-pin"></i>
                        <h5 class="contact-one__item__title">Location</h5>
                    </div>

                </div>
                <div class="col-md-3 category_div">
                    <div class="icon-text-wrapper mt-3" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-name: fadeInLeft;">
                        <i class="icon-emotions"></i>
                        <h5 class="contact-one__item__title">Select Category</h5>
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
            url: "/getadsbyprovince_brakedown",
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
            url: "/getadsbydistric_brakedown",
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
            url: "/getadsbycity_brakedown",
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
            url: "/getadsbyany_brakedown",
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