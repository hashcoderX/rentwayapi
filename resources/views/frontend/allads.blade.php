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

<x-frontend-app-layout>
    <section>
        <div class="container">
            <script type="text/javascript">
                atOptions = {
                    'key': '80dfd738b704e7cff0f3cfa2838e99b7',
                    'format': 'iframe',
                    'height': 90,
                    'width': 728,
                    'params': {}
                };
            </script>
            <script type="text/javascript" src="//www.highperformanceformat.com/80dfd738b704e7cff0f3cfa2838e99b7/invoke.js"></script>
            <div class="row fetures_row align-items-center gy-3 mt-3">
                <div class="col-md-3 col-sm-6 text-sm-start text-center location_div" style="display: block;">
                    <div class="icon-text-wrapper d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="icon-pin fs-4"></i>
                        <h5 class="contact-one__item__title mb-0">Location</h5>
                    </div>
                </div>

                <!-- Select Category -->
                <div class="col-md-3 col-sm-6 text-sm-start text-center category_div" style="display:block;">
                    <div class="icon-text-wrapper d-flex align-items-center gap-2" data-bs-toggle="modal" data-bs-target="#categorymodel">
                        <i class="icon-emotions fs-4"></i>
                        <h5 class="contact-one__item__title mb-0">Select Category</h5>
                    </div>
                </div>


                <!-- Search Bar -->
                <div class="col-md-6 col-sm-12">
                    <form class="faq-page-search__form d-flex justify-content-center justify-content-md-end align-items-center" onsubmit="event.preventDefault(); searchByname();">
                        <input type="text" id="adssearchinput" class="form-control me-2" placeholder="Search Here" onkeyup="searchByname()">
                        <button type="button" class="btn btn-primary" onclick="searchByname()" aria-label="Search">
                            <i class="icon-search"></i>
                        </button>
                    </form>
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

    <div class="modal fade" id="categorymodel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                <div class="modal-header" style=" color: balck; padding: 15px 20px; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                    <h5 class="modal-title" id="exampleModalLabel" style="font-size: 18px; font-weight: bold;">Filter By Category</h5>
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
                <div class="col-md-7 col-sm-12 adsviewsection" id="adsviewsection">
                    @foreach ($ads as $ad)
                    <a href="viewadd/{{ $ad->id }}/{{ $ad->title }}" class="ad-card">
                        <div class="row addbody align-items-center">
                            <div class="col-md-3">
                                <div class="image">
                                    @php $images = json_decode($ad->images); @endphp
                                    @if ($images && count($images) > 0)
                                    <img src="{{ asset($images[0]) }}" alt="{{ $ad->title }}">
                                    @endif
                                </div>

                            </div>
                            <div class="col">
                                <div class="ad-content">
                                    <h3 class="addtitle">{{ $ad->title }} - <span>Rs.{{ number_format($ad->price,2)}}</span></h3>
                                    <p class="adddescription">{{ Str::words($ad->description, 10, '...') }}</p>
                                    <p class="adddate">{{ \Carbon\Carbon::parse($ad->date_time)->diffForHumans() }}</p>
                                    <dv class="row">
                                        <div class="col-8">
                                            <p><i class="icon-pin fs-4 "></i>
                                                {{ $ad->city}}
                                            </p>
                                        </div>
                                        <div class="col">
                                            @if($ad->add_type == "free ads")

                                            @elseif($ad->add_type == "top ads")
                                            <img src="{{ asset('frontend/assets/images/badge.png') }}" style="width: 30px;height: auto;text-align: right;">
                                            @elseif($ad->add_type == "bump up")
                                            <img src="{{ asset('frontend/assets/images/badge.png') }}" style="width: 30px;height: auto;text-align: right;">
                                            @endif
                                        </div>
                                    </dv>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center mt-4">
                    {{ $ads->links() }}
                </div>
                <div class="col-md-2 sepadssec">

                    <script type="text/javascript">
                        atOptions = {
                            'key': 'f1da68e424623a79b52a730898c4b225',
                            'format': 'iframe',
                            'height': 600,
                            'width': 160,
                            'params': {}
                        };
                    </script>
                    <script type="text/javascript" src="//www.highperformanceformat.com/f1da68e424623a79b52a730898c4b225/invoke.js"></script>

                </div>
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
            url: "/getadsbyprovince",
            method: "GET",
            data: {
                province: province
            },
            success: function(data) {
                let html = "";
                let baseurl = location.origin + "/";

                function truncateWords(str, wordLimit) {
                    if (!str) return '';
                    let words = str.split(" ");
                    if (words.length <= wordLimit) return str;
                    return words.slice(0, wordLimit).join(" ") + "...";
                }

                data.ads.forEach(ad => {
                    let images = JSON.parse(ad.images || "[]");
                    let image = images.length > 0 ? baseurl + images[0] : baseurl + "default.jpg";
                    let description = truncateWords(ad.description, 10);
                    let badge = "";

                    if (ad.add_type === "top ads" || ad.add_type === "bump up") {
                        badge = `<img src="${baseurl}frontend/assets/images/badge.png" style="width: 30px; height: auto; text-align: right;">`;
                    }

                    html += `
                   <a href="/viewadd/${ad.id}" class="ad-card">
                   <div class="row addbody align-items-center">
                   <div class="col-md-3">
                         <div class="image">
                         <img src="${image}" alt="${ad.title}" />
                         </div>
                         </div>
                         <div class="col">
                         <div class="ad-content">
                         <h3 class="addtitle">${ad.title}</h3>
                         <p class="adddescription">${description}</p>
                         <p class="adddate">${timeAgo(ad.date_time)}</p>
                         <div class="row">
                         <div class="col-8">
                         <p><i class="icon-pin fs-4"></i> ${ad.city}</p>
                         </div>
                         <div class="col">
                         ${badge}
                         </div>
                         </div>
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

    function timeAgo(dateString) {
        const date = new Date(dateString);
        const seconds = Math.floor((new Date() - date) / 1000);

        let interval = Math.floor(seconds / 31536000);
        if (interval >= 1) return interval + " year" + (interval > 1 ? "s" : "") + " ago";

        interval = Math.floor(seconds / 2592000);
        if (interval >= 1) return interval + " month" + (interval > 1 ? "s" : "") + " ago";

        interval = Math.floor(seconds / 86400);
        if (interval >= 1) return interval + " day" + (interval > 1 ? "s" : "") + " ago";

        interval = Math.floor(seconds / 3600);
        if (interval >= 1) return interval + " hour" + (interval > 1 ? "s" : "") + " ago";

        interval = Math.floor(seconds / 60);
        if (interval >= 1) return interval + " minute" + (interval > 1 ? "s" : "") + " ago";

        return "just now";
    }

    function loadByDistric(distric) {
        $.ajax({
            url: "/getadsbydistric",
            method: "GET",
            data: {
                distric: distric
            },
            success: function(data) {
                let html = "";
                let baseurl = location.origin + "/";

                function truncateWords(str, wordLimit) {
                    if (!str) return '';
                    let words = str.split(" ");
                    if (words.length <= wordLimit) return str;
                    return words.slice(0, wordLimit).join(" ") + "...";
                }

                data.ads.forEach(ad => {
                    let images = JSON.parse(ad.images || "[]");
                    let image = images.length > 0 ? baseurl + images[0] : baseurl + "default.jpg";
                    let description = truncateWords(ad.description, 10);
                    let badge = "";

                    if (ad.add_type === "top ads" || ad.add_type === "bump up") {
                        badge = `<img src="${baseurl}frontend/assets/images/badge.png" style="width: 30px; height: auto; text-align: right;">`;
                    }

                    html += `
                   <a href="/viewadd/${ad.id}" class="ad-card">
                   <div class="row addbody align-items-center">
                   <div class="col-md-3">
                         <div class="image">
                         <img src="${image}" alt="${ad.title}" />
                         </div>
                         </div>
                         <div class="col">
                         <div class="ad-content">
                         <h3 class="addtitle">${ad.title}</h3>
                         <p class="adddescription">${description}</p>
                         <p class="adddate">${timeAgo(ad.date_time)}</p>
                         <div class="row">
                         <div class="col-8">
                         <p><i class="icon-pin fs-4"></i> ${ad.city}</p>
                         </div>
                         <div class="col">
                         ${badge}
                         </div>
                         </div>
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
            url: "/getadsbycity",
            method: "GET",
            data: {
                city: city
            },
            success: function(data) {
                let html = "";
                let baseurl = location.origin + "/";

                function truncateWords(str, wordLimit) {
                    if (!str) return '';
                    let words = str.split(" ");
                    if (words.length <= wordLimit) return str;
                    return words.slice(0, wordLimit).join(" ") + "...";
                }

                data.ads.forEach(ad => {
                    let images = JSON.parse(ad.images || "[]");
                    let image = images.length > 0 ? baseurl + images[0] : baseurl + "default.jpg";
                    let description = truncateWords(ad.description, 10);
                    let badge = "";

                    if (ad.add_type === "top ads" || ad.add_type === "bump up") {
                        badge = `<img src="${baseurl}frontend/assets/images/badge.png" style="width: 30px; height: auto; text-align: right;">`;
                    }

                    html += `
                   <a href="/viewadd/${ad.id}" class="ad-card">
                   <div class="row addbody align-items-center">
                   <div class="col-md-3">
                         <div class="image">
                         <img src="${image}" alt="${ad.title}" />
                         </div>
                         </div>
                         <div class="col">
                         <div class="ad-content">
                         <h3 class="addtitle">${ad.title}</h3>
                         <p class="adddescription">${description}</p>
                         <p class="adddate">${timeAgo(ad.date_time)}</p>
                         <div class="row">
                         <div class="col-8">
                         <p><i class="icon-pin fs-4"></i> ${ad.city}</p>
                         </div>
                         <div class="col">
                         ${badge}
                         </div>
                         </div>
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

                function truncateWords(str, wordLimit) {
                    if (!str) return '';
                    let words = str.split(" ");
                    if (words.length <= wordLimit) return str;
                    return words.slice(0, wordLimit).join(" ") + "...";
                }

                data.ads.forEach(ad => {
                    let images = JSON.parse(ad.images || "[]");
                    let image = images.length > 0 ? baseurl + images[0] : baseurl + "default.jpg";
                    let description = truncateWords(ad.description, 10);
                    let badge = "";

                    if (ad.add_type === "top ads" || ad.add_type === "bump up") {
                        badge = `<img src="${baseurl}frontend/assets/images/badge.png" style="width: 30px; height: auto; text-align: right;">`;
                    }

                    html += `
                   <a href="/viewadd/${ad.id}" class="ad-card">
                   <div class="row addbody align-items-center">
                   <div class="col-md-3">
                         <div class="image">
                         <img src="${image}" alt="${ad.title}" />
                         </div>
                         </div>
                         <div class="col">
                         <div class="ad-content">
                         <h3 class="addtitle">${ad.title}</h3>
                         <p class="adddescription">${description}</p>
                         <p class="adddate">${timeAgo(ad.date_time)}</p>
                         <div class="row">
                         <div class="col-8">
                         <p><i class="icon-pin fs-4"></i> ${ad.city}</p>
                         </div>
                         <div class="col">
                         ${badge}
                         </div>
                         </div>
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

    function truncateWords(str, wordLimit) {
        const words = str.split(" ");
        return words.length > wordLimit ?
            words.slice(0, wordLimit).join(" ") + "..." :
            str;
    }


    function searchByname() {
        var searchbyvr = document.getElementById('adssearchinput').value;
        $.ajax({
            url: "/getadsbyany",
            method: "GET",
            data: {
                searchbyvr: searchbyvr
            },
            success: function(data) {
                let html = "";
                let baseurl = location.origin + "/";

                function truncateWords(str, wordLimit) {
                    if (!str) return '';
                    let words = str.split(" ");
                    if (words.length <= wordLimit) return str;
                    return words.slice(0, wordLimit).join(" ") + "...";
                }

                data.ads.forEach(ad => {
                    let images = JSON.parse(ad.images || "[]");
                    let image = images.length > 0 ? baseurl + images[0] : baseurl + "default.jpg";
                    let description = truncateWords(ad.description, 10);
                    let badge = "";

                    if (ad.add_type === "top ads" || ad.add_type === "bump up") {
                        badge = `<img src="${baseurl}frontend/assets/images/badge.png" style="width: 30px; height: auto; text-align: right;">`;
                    }

                    html += `
                   <a href="/viewadd/${ad.id}" class="ad-card">
                   <div class="row addbody align-items-center">
                   <div class="col-md-3">
                         <div class="image">
                         <img src="${image}" alt="${ad.title}" />
                         </div>
                         </div>
                         <div class="col">
                         <div class="ad-content">
                         <h3 class="addtitle">${ad.title}</h3>
                         <p class="adddescription">${description}</p>
                         <p class="adddate">${timeAgo(ad.date_time)}</p>
                         <div class="row">
                         <div class="col-8">
                         <p><i class="icon-pin fs-4"></i> ${ad.city}</p>
                         </div>
                         <div class="col">
                         ${badge}
                         </div>
                         </div>
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